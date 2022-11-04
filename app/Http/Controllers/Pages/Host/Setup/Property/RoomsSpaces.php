<?php

namespace App\Http\Controllers\Pages\Host\Setup\Property;

use Illuminate\Support\Str;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class RoomsSpaces extends Component
{
    use WireToast;

    public $property;
    public $active_room;

    protected $listeners = ['loadRoomsSpaces' => 'load'];

    protected function rules()
    {
        return [
            // Bedrooms
            'property.rooms.bedrooms' => ['required_without:property.rooms.spaces'],
            'property.rooms.bedrooms.*.name' => ['required'],
            'property.rooms.bedrooms.*.beds' => ['required', 'array'],

            // Spaces
            'property.rooms.spaces' => ['required_without:property.rooms.bedrooms'],
            'property.rooms.spaces.*.name' => ['required'],
            'property.rooms.spaces.*.beds' => ['required', 'array'],

            // Bathrooms
            'property.rooms.bathrooms' => ['required'],
            'property.rooms.bathrooms.*.name' => ['required'],
            'property.rooms.bathrooms.*.bath_type' => ['required'],
        ];
    }

    protected function messages()
    {
        return [
            // Bedrooms
            'property.rooms.bedrooms.required_without' => 'At least one bedroom is required unless you add a space.',
            'property.rooms.bedrooms.*.name.required' => 'Bedroom name is required.',
            'property.rooms.bedrooms.*.beds.required' => 'Each room must have at least one bed.',
            'property.rooms.bedrooms.*.beds.array' => 'Please refresh the page and try again.',

            // Spaces
            'property.rooms.spaces.required_without' => 'At least one space is required unless you add a bedroom.',
            'property.rooms.spaces.*.name.required' => 'Space name is required.',
            'property.rooms.spaces.*.beds.required' => 'Each room must have at least one bed.',
            'property.rooms.spaces.*.beds.array' => 'Please refresh the page and try again.',

            // Bathrooms
            'property.rooms.bathrooms.required' => 'At least one bathroom is required.',
            'property.rooms.bethrooms.*.name' => 'Bathroom name is required.',
            'property.rooms.bethrooms.*.bath_type' => 'Bath Type is required.',


            // Active Room
            'active_room.name.required' => 'Room name is required.',
            'active_room.beds.required_if' => 'Each room must have at least one bed.',
            'active_room.bath_type.required_if' => 'Bath type is required.',
        ];
    }

    protected function attributes()
    {
        return [
            // 
        ];
    }

    public function render()
    {
        return view('pages.host.setup.property.rooms-spaces');
    }

    public function updated($field, $value)
    {
        $this->resetValidation($field);
    }

    public function load()
    {
        $this->loadDevData();

        $this->active_room = [
            'action' => 'add',
            'room_type' => '',
        ];
    }

    public function loadDevData()
    {
        $this->property['rooms'] = [
            'bedrooms' => [
                [
                    'name' => 'Master Bedroom',
                    'beds' => [
                        ['bed_type' => 'King',]
                    ],
                ], [
                    'name' => 'Guest Bedroom',
                    'beds' => [
                        ['bed_type' => 'Queen',],
                        ['bed_type' => 'King',],
                    ],
                ],
            ],
            'spaces' => [
                [
                    'name' => 'Living room',
                    'beds' => [
                        ['bed_type' => 'Sleeper Sofa'],
                    ]
                ]
            ],
            'bathrooms' => [
                [
                    'name' => 'Master Bath',
                    'bath_type' => 'Full Bath',
                ]

            ]
        ];
    }

    public function submit()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    toast()->danger('Please fix the error(s) below.', 'Validation Error')->push();
                    toast()->danger($validator->errors()->first(), 'Validation Error')->push();
                }
            });
        })->validate($this->rules(), $this->messages(), $this->attributes());

        $this->emitUp('nextPage', $this->property);
    }

    public function resetActiveRoom()
    {
        $this->active_room = [];
    }

    public function addBed($bed_type)
    {
        $this->active_room['beds'][] = [
            'bed_type' => $bed_type
        ];
    }

    public function removeBed($bed_key)
    {
        unset($this->active_room['beds'][$bed_key]);
    }

    public function initAddRoom($room_type)
    {
        $this->resetValidation();

        $this->active_room = [
            'action' => 'add',
            'room_type' => Str::singular($room_type),
        ];
    }

    public function addRoom($room_type)
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    toast()->danger('Please fix the error(s) below.', 'Validation Error')->push();
                }
            });
        })->validate([
            'active_room.name' => ['required'],
            'active_room.beds' => ['required_if:active_room.room_type,space', 'required_if:active_room.room_type,bedroom', 'array'],
            'active_room.bath_type' => ['required_if:active_room.room_type,bathroom'],
        ], $this->messages(), $this->attributes());

        $this->property['rooms'][Str::plural($room_type)][] = $this->active_room;

        return true;
    }

    public function initUpdateRoom($room_type, $room_key)
    {
        $this->resetValidation();

        $this->active_room = $this->property['rooms'][Str::plural($room_type)][$room_key];

        $this->active_room['key'] = $room_key;
        $this->active_room['action'] = 'update';
        $this->active_room['room_type'] = Str::singular($room_type);
    }

    public function updateRoom($room_type, $room_key)
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    toast()->danger('Please fix the error(s) below.', 'Validation Error')->push();
                }
            });
        })->validate([
            'active_room.name' => ['required'],
            'active_room.beds' => ['required_if:active_room.room_type,space', 'required_if:active_room.room_type,bedroom', 'array'],
            'active_room.bath_type' => ['required_if:active_room.room_type,bathroom'],
        ], $this->messages(), $this->attributes());

        $this->property['rooms'][Str::plural($room_type)][$room_key] = $this->active_room;

        return true;
    }

    public function deleteRoom($room_type, $room_key)
    {
        unset($this->property['rooms'][Str::plural($room_type)][$room_key]);
    }
}
