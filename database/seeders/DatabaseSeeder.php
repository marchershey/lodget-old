<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            Users\RoleAndPermissionSeeder::class,
            Users\UserSeeder::class,

            // Properties
            Properties\PropertyTypesSeeder::class,
            Properties\AmenitiesSeeder::class,
        ]);
    }
}
