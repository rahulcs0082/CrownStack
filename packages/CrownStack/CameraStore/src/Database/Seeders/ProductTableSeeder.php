<?php

namespace CrownStack\CameraStore\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{   
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();

        DB::table('products')->insert([
            'id'          => 1,
            'name'        => 'Nikon D850',
            'category'    => 'Nikon',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'price'       => 100
        ]);
    }
}