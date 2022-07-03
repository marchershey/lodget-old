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
    }
}
