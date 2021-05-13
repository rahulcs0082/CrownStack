<?php

use Illuminate\Database\Seeder;
use CrownStack\CameraStore\Database\Seeders\DatabaseSeeder as CameraStoreSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CameraStoreSeeder::class);
    }
}
