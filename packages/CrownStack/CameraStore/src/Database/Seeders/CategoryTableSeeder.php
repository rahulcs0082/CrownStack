<?php

namespace CrownStack\CameraStore\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{   
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        DB::table('categories')->insert([
            'id'     => 1,
            'name'   => 'Nikon',
            'type'   => 'Mirrorless',
            'model'  => 2021
        ]);
    }
}