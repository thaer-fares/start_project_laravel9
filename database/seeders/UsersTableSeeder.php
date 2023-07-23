<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Admin',
                'username' => '123456789',
                'email' => 'Admin@yahoo.com',
                'email_verified_at' => NULL,
                'password' => Hash::make('123456789'),
                'remember_token' => '',
                'status' => 'active'
            ),
        ));


    }
}
