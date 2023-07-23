<?php

namespace App\Libs;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Ajax
{
    public static function request($api_name, $method = 'GET', $body = ''){
        $client = new Client();
//        dd($body);
        $api_key = '0fd0797d2edb8442283c83774';
//        $api_key = '0fd0797d2edb8442283c83774';
        $api_link = 'https://www.qoyod.com/api/2.0';
        $headers = [
            'API-KEY' => $api_key,
            'Content-Type' => 'application/json'
        ];
        $request = new Request($method, $api_link .'/' . $api_name, $headers, $body);
        $res = $client->sendAsync($request)->wait();
        $result = json_decode($res->getBody());
        return $result;
    }
}
