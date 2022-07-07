<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'first_name' => 'Demo',
            'last_name' => 'User',
            'email' => 'demo@email.com',
            'password' => '$2y$10$Ub07PVNZMtbV3rA04/FOoOnCGdY7wcFxQSE8ifYlRd2CgdtUmbkDC', // password
            'active' => '1',
            'type' => 'host',
        ]);

        \App\Models\Property::create([
            'name' => 'Ohana Burnside',
            'street' => '123 Address Ave',
            'city' => 'Lexington',
            'state' => 'KY',
            'zip' => '40004',
            'type' => 'House',
            'guests' => '1',
            'beds' => '2',
            'bedrooms' => '3',
            'bathrooms' => '3.5',
            'headline' => '',
            'description' => '',
            'active' => 1,
        ]);
    }
}
