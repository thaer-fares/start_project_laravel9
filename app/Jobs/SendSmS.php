<?php

namespace App\Jobs;

use App\Models\SmsLog;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendSmS /*implements ShouldQueue*/
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $message, $number;

    public function __construct($message, $number)
    {
        $this->message = $message;
        $this->number = $number;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (env('APP_ENV') != 'local') {
            $sms = $this->send_sms($this->message, $this->number);
        }

        Log::info('sms application send: ' . $sms);
        SmsLog::create([
            'log' => $sms
        ]);
        /*if ($sms->status == 'success_send') {
            SMSLog::create([
                'receiver_id' => $this->receiver_id,
                'receiver_mobile' => $this->number,
                'semester_no' => $currentSemester->semester_no,
                'subject_code' => $this->subject_code,
                'receiver_type_id' => $this->constants['receiver_type_id'],
                'message_type_id' => $this->constants['message_type_id'],
                'sender' => $this->constants['sender'],
                'description' => $this->constants['description'],
                'message' => $this->message
            ]);
        }*/
    }

    function send_sms($message, $number)
    {
        $firstCharacter = substr($number, 0, 1);
        if ($firstCharacter != '0') {
            $number = '0' . $number;
        }

        $username = env('SMS_USERNAME');
        $password = env('SMS_PASSWORD');
        $title = 'نظام المدارس الشرعية';
        $sender_name = 'school-wakf';
        $response = Http::get('https://rasel.eapp.gov.ps/getway/c_api/send/' . $username . '/' . $password . '/' . $sender_name . '/sms/' . $number . '/' . $title . '/' . $message);
        return $response->body();
    }
}
