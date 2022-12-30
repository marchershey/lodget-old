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
        // $this->property = $property;

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
                ['property/photos/znqc4TehyX2AIQ8vdqUQRyYzJoKN8qA2UHJ7jPrz.jpg']
            ],
            'pricing' => [
                'base_rate' => '389',
                'tax_rate' => '2',
                'fees' => [
                    [
                        'name' => 'Cleaning Fee',
                        'amount' => "125",
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

    // "pricing" => array:3 [▼
    //     "fees" => array:2 [▼
    //       0 => array:3 [▼
    //         "name" => "Cleaning Fee"
    //         "amount" => "125"
    //         "type" => "fixed"
    //       ]
    //       1 => array:3 [▼
    //         "name" => "Admin Fee"
    //         "amount" => "5"
    //         "type" => "percent"
    //       ]
    //     ]
    //     "base_rate" => "1.00"
    //     "tax_rate" => "2"
    //   ]

    // "amenities" => array:3 [▼
    //     0 => "13"
    //     1 => "16"
    //     2 => "75"
    //   ]
}

// ^ array:11 [▼
//   "name" => "Ohana Burnside"
//   "address" => "123 Address Ave"
//   "city" => "Lexington"
//   "state" => "KY"
//   "zip" => "10001"
//   "type" => array:4 [▼
//     "id" => 19
//     "name" => "house"
//     "created_at" => "2022-12-28T03:36:25.000000Z"
//     "updated_at" => "2022-12-28T03:36:25.000000Z"
//   ]
//   "rooms" => array:3 [▼
//     "bedrooms" => array:2 [▼
//       0 => array:2 [▼
//         "name" => "Master Bedroom"
//         "beds" => array:1 [▼
//           0 => array:1 [▼
//             "bed_type" => "King"
//           ]
//         ]
//       ]
//       1 => array:2 [▼
//         "name" => "Guest Bedroom"
//         "beds" => array:2 [▼
//           0 => array:1 [▼
//             "bed_type" => "Queen"
//           ]
//           1 => array:1 [▼
//             "bed_type" => "King"
//           ]
//         ]
//       ]
//     ]
//     "spaces" => array:1 [▼
//       0 => array:2 [▼
//         "name" => "Living room"
//         "beds" => array:1 [▼
//           0 => array:1 [▼
//             "bed_type" => "Sleeper Sofa"
//           ]
//         ]
//       ]
//     ]
//     "bathrooms" => array:1 [▼
//       0 => array:2 [▼
//         "name" => "Master Bath"
//         "bath_type" => "Full Bath"
//       ]
//     ]
//   ]
//   "amenities" => array:3 [▼
//     0 => "13"
//     1 => "16"
//     2 => "75"
//   ]
//   "photos" => array:1 [▼
//     0 => "property/photos/acLJCfsESANQhtTyUzUMlnhf2EaBEpb3aS4iGMJI.jpg"
//   ]
//   "pricing" => array:3 [▼
//     "fees" => array:2 [▼
//       0 => array:3 [▼
//         "name" => "Cleaning Fee"
//         "amount" => "125"
//         "type" => "fixed"
//       ]
//       1 => array:3 [▼
//         "name" => "Admin Fee"
//         "amount" => "5"
//         "type" => "percent"
//       ]
//     ]
//     "base_rate" => "1.00"
//     "tax_rate" => "2"
//   ]
//   "options" => array:1 [▼
//     "min_nights" => "3"
//   ]
// ]