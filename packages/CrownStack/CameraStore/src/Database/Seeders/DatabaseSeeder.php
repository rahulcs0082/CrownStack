<?php

namespace CrownStack\CameraStore\Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(CustomerTableSeeder::class);
    }
}