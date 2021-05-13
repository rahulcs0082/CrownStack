<?php

namespace CrownStack\CameraStore\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerTableSeeder extends Seeder
{   
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->delete();

        DB::table('customers')->insert([
            'id'         => 1,
            'first_name' => 'test',
            'last_name'  => 'demo',
            'email'      => 'test@gmail.com',
            'password'   => bcrypt(123456)
        ]);
    }
}