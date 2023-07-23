<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Admin',
                'guard_name' => 'admin',
                'status' => 1,
                'created_at' => '2020-08-30 10:16:44',
                'updated_at' => '2020-08-30 10:16:44',
            ),
        ));
        
        
    }
}