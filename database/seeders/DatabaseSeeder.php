<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::create([
            'first_name' => 'Marc',
            'last_name' => 'Hershey',
            'email' => 'marc@hershey.co',
            'birthdate' => \Carbon\Carbon::now()->subYears(25)->format('Y-m-d'),
            'password' => '$2y$10$Ub07PVNZMtbV3rA04/FOoOnCGdY7wcFxQSE8ifYlRd2CgdtUmbkDC', // password
            'type' => 'host',
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
