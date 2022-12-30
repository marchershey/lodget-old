<?php

namespace App\Http\Controllers\Pages\Host\Setup\Property;

use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Publish extends Component
{
    use WireToast;

    public $property;

    protected $listeners = ['loadPublish' => 'load'];

    public function render()
    {
        return view('pages.host.setup.property.publish');
    }

    public function load($property)
    {
        $this->property = $property;

        if (app()->environment() == 'local') {
            // $this->loadDevData();
        }
    }

    public function loadDevData()
    {
        $this->property = [
            'name' => 'Ohana Burnside',
            'address' => '123 Address Ave',
            'city' => 'Lexington',
            'state' => 'KY',
            'zip' => '10001',
            'type' => [
                'id' => 19,
                'name' => 'house',
            ],
            'rooms' => [
                'bedrooms' => [
                    [
                        'name' => 'Master Bedroom',
                        'beds' => [
                            [
                                'bed_type' => 'King',
                            ],
                        ],
                    ],
                    [
                        'name' => 'Guest Bedroom',
                        'beds' => [
                            [
                                'bed_type' => 'Queen'
                            ],
                            [
                                'bed_type' => 'King'
                            ],
                        ]
                    ]
                ],
                'spaces' => [
                    [
                        'name' => 'Living Room',
                        'beds' => [
                            [
                                'bed_type' => 'Sleeper Sofa',
                            ],
                        ],
                    ],
                ],
                'bathrooms' => [
                    [
                        'name' => 'Master Bath',
                        'bath_type' => 'Full Bath'
                    ]
                ],
            ],
            'amenities' => [
                [
                    'id' => 71,
                    'name' => 'Washing Machine',
                ],
                [
                    'id' => 75,
                    'name' => 'Pool',
                ],
                [
                    'id' => 79,
                    'name' => 'Hot Tub',
                ],
            ],
            'photos' => [
                "dev-property-0.png",
                "dev-property-1.png",
                "dev-property-2.png",
                "dev-property-3.png",
                "dev-property-4.png",
                "dev-property-5.png",
                "dev-property-6.png",
                "dev-property-7.png",
                "dev-property-8.png",
                "dev-property-9.png",
            ],
            'pricing' => [
                'base_rate' => '38900',
                'tax_rate' => '2',
                'fees' => [
                    [
                        'name' => 'Cleaning Fee',
                        'amount' => "12500",
                        'type' => 'fixed',
                    ],
                    [
                        'name' => 'Admin Fee',
                        'amount' => '5',
                        'type' => 'percentage',
                    ],
                ],
            ],
            'options' => [
                'min_nights' => '3',
            ],
        ];
    }

    public function publish()
    {
        dd($this->property);
    }
}
