<?php

namespace Database\Seeders\Users;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\User::create([
            'first_name' => 'Marc',
            'last_name' => 'Hershey',
            'email' => 'admin@demo.com',
            'password' => '$2y$10$Ub07PVNZMtbV3rA04/FOoOnCGdY7wcFxQSE8ifYlRd2CgdtUmbkDC',
            'registered_ip' => '0.0.0.0',
        ]);

        $admin->assignRole('admin');

        $numOfHosts = 10;
        $numOfGuests = 10;

        for ($x = 0; $x <= $numOfHosts; $x++) {
            $num = rand();
            $host = \App\Models\User::create([
                'first_name' => 'Host #' . $num,
                'last_name' => 'User',
                'email' => $num . '@demo.com',
                'password' => '$2y$10$Ub07PVNZMtbV3rA04/FOoOnCGdY7wcFxQSE8ifYlRd2CgdtUmbkDC',
                'registered_ip' => '0.0.0.0',
            ]);
            $host->assignRole('host');
        }

        for ($x = 0; $x <= $numOfGuests; $x++) {
            $num = rand();
            $guest = \App\Models\User::create([
                'first_name' => 'Guest #' . $num,
                'last_name' => 'User',
                'email' => $num . '@demo.com',
                'password' => '$2y$10$Ub07PVNZMtbV3rA04/FOoOnCGdY7wcFxQSE8ifYlRd2CgdtUmbkDC',
                'registered_ip' => '0.0.0.0',
            ]);
            $guest->assignRole('guest');
        }
    }
}
