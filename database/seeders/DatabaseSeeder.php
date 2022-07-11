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
            'headline' => 'Work from Lake, Fast Internet, Weekly Discount, Kid Friendly, Private Resort',
            'description' => 'Beautiful lake view nestled in the heart of the Daniel Boone National Forest by Lake Cumberland! Spacious 3 bedroom home with bonus basement sleeping area has large hot tub under screened in, covered porch and is located in a private gated resort community with multiple pools, tennis courts, walking/ATV trails- all within 1 mile of a boat ramp.  New furniture with new TVs in every bedroom, basement game room with bar and poker table, jacuzzi in master bedroom.  Nearby attractions include a state park with golf, Burnside Marina, Cumberland Falls, South Fork Scenic Railway and just a short trip to Somerset for a drive-in movie or water park.  The gated resort includes multiple swimming pools (1 in the property\'s gate) along with tennis courts.',
            'active' => 1,
        ]);
    }
}
