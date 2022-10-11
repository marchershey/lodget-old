<?php

namespace Database\Seeders\Property;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PropertyTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'apartment',
            'barn',
            'bed & breakfast',
            'boat',
            'building',
            'bungalow',
            'cabin',
            'campground',
            'caravan',
            'castle',
            'chalet',
            'country house',
            'condo',
            'corporate apartment',
            'cottage',
            'estate',
            'farmhouse',
            'hotel',
            'house',
            'house boat',
            'lodge',
            'mobile home',
            'recreational vehicle',
            'resort',
            'studio',
            'suite',
            'tower',
            'townhome',
            'villa',
            'yacht'
        ];

        foreach ($types as $type) {
            \App\Models\PropertyType::create(['name' => $type]);
        }
    }
}
