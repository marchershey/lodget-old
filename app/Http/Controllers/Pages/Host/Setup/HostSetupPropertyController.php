<?php

namespace App\Http\Controllers\Pages\Host\Setup;

use App\Models\Property;
use App\Models\PropertyType;
use App\Rules\AlphaSpace;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class HostSetupPropertyController extends Component
{
    use WireToast;
    public $property;

    // Page data
    public $step;
    public $data_property_types = [];

    protected function rules()
    {
        return [
            // Basic Information
            'property.name' => ['required', 'max:100', new AlphaSpace],
            'property.address.street' => ['required', 'max:100', 'regex:/(^[-0-9A-Za-z.,\/ ]+$)/'],
            'property.address.city' => ['required', 'max:100', new AlphaSpace],
            'property.address.state' => ['required', 'size:2', 'alpha'],
            'property.address.zip' => ['required', 'numeric', 'regex:/^[0-9]{5}(?:-[0-9]{4})?$/'],
            // Property Details
            'property.details.type' => ['required'],
            // Rooms & Spaces
            'property.bedrooms' => ['required_without:property.areas'],
            'property.bedrooms.*.name' => ['required'],
            'property.bedrooms.*.beds' => ['required'],
            'property.bedrooms.*.beds.*.bed_type' => ['required'],
            'property.areas' => ['required_without:property.bedrooms'],
            'property.areas.*.name' => ['required'],
            'property.areas.*.beds' => ['required'],
            'property.areas.*.beds.*.bed_type' => ['required'],
            'property.bathrooms' => ['required'],
            'property.bathrooms.*.name' => ['required'],
            'property.bathrooms.*.bath_type' => ['required'],
            // Amenities
            // Photos
            // Pricing
        ];
    }

    protected function attributes()
    {
        return [
            // Basic information
            'property.name' => 'Property Name',
            'property.address.street' => 'Street Address',
            'property.address.city' => 'City',
            'property.address.state' => 'State',
            'property.address.zip' => 'Zip / Postal Code',
            // Property Details
            'property.details.type' => 'Property Type',
            // Rooms & Spaces
            'property.bedrooms' => 'Bedrooms',
            'property.bedrooms.*.name' => 'Bedroom Name',
            'property.bedrooms.*.beds.*.bed_type' => 'Bed Type',
            'property.areas' => 'Areas',
            'property.areas.*.name' => 'Area Name',
            'property.areas.*.beds.*.bed_type' => 'Bed Type',
            'property.bathrooms' => 'Bathrooms',
            'property.bathrooms.*.name' => 'Bathroom Name',
            'property.bathrooms.*.bath_type' => 'Bath Type',
            // Amenities
            // Photos
            // Pricing
        ];
    }

    public function render()
    {
        return view('pages.host.setup.property');
    }

    public function mount()
    {
        $this->step = 4;
    }

    public function load()
    {
        $this->loadDevData();

        $this->loadPageData();
    }

    /**
     * Load development dummy data
     */
    public function loadDevData()
    {
        /**
         * Basic Information
         */

        $this->property['name'] = "Ohana Burnside";
        $this->property['address'] = [
            'street' => '123 address ave',
            'city' => 'lexington',
            'state' => 'KY',
            'zip' => '10001',
        ];

        /**
         * Property Details
         */

        $this->property['details'] = [
            'type' => 19,
        ];

        /**
         * Rooms & Spaces
         */

        // Bedrooms
        $this->property['bedrooms'][] = [
            'name' => 'Master Bedroom',
            'beds' => [
                [
                    'bed_type' => 'King',
                ],
            ],
        ];

        // Bathrooms
        $this->property['bathrooms'][] = [
            'name' => 'Master Bathroom',
            'bath_type' => 'Full',
        ];
    }

    /**
     * Load Page Data
     */
    public function loadPageData()
    {
        // Property Details
        foreach (PropertyType::all()->sortBy('name') as $property_type) {
            $this->data_property_types[$property_type->id] = ucFirst($property_type->name);
        }
        $this->data_property_types = collect($this->data_property_types);
    }

    public function updated($field, $value)
    {
        $this->resetValidation($field);

        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    $error = $validator->errors()->first();
                    toast()->danger($error, 'Error')->push();
                }
            });
        })->validateOnly($field, $this->rules(), [], $this->attributes());
    }

    public function goNext()
    {
        // Basic information
        if ($this->step == 1) {
            $this->withValidator(function (Validator $validator) {
                $validator->after(function ($validator) {
                    if (count($validator->errors()) > 0) {
                        // $error = $validator->errors()->first();
                        // toast()->danger($error, 'Error')->push();
                        toast()->danger('Please fix the following errors.', 'Uh oh!')->push();
                    }
                });
            })->validate([
                'property.name' => ['required', 'max:100', new AlphaSpace],
                'property.address.street' => ['required', 'max:100', 'regex:/(^[-0-9A-Za-z.,\/ ]+$)/'],
                'property.address.city' => ['required', 'max:100', new AlphaSpace],
                'property.address.state' => ['required', 'size:2', 'alpha'],
                'property.address.zip' => ['required', 'numeric', 'regex:/^[0-9]{5}(?:-[0-9]{4})?$/'],
            ], [], $this->attributes());
        }

        // Property Details
        if ($this->step == 2) {
            $this->withValidator(function (Validator $validator) {
                $validator->after(function ($validator) {
                    if (count($validator->errors()) > 0) {
                        // $error = $validator->errors()->first();
                        // toast()->danger($error, 'Error')->push();
                        toast()->danger('Please fix the following errors.', 'Uh oh!')->push();
                    }
                });
            })->validate([
                'property.details.type' => ['required'],
            ], [], $this->attributes());
        }

        // Rooms & Spaces
        if ($this->step == 3) {
            $this->withValidator(function (Validator $validator) {
                $validator->after(function ($validator) {
                    foreach ($validator->errors()->all() as $error) {
                        toast()->danger($error)->push();
                    }
                });
            })->validate([
                'property.bedrooms' => ['required_without:property.areas'],
                'property.bedrooms.*.name' => ['required'],
                'property.bedrooms.*.beds' => ['required'],
                'property.bedrooms.*.beds.*.bed_type' => ['required'],

                'property.areas' => ['required_without:property.bedrooms'],
                'property.areas.*.name' => ['required'],
                'property.areas.*.beds' => ['required'],
                'property.areas.*.beds.*.bed_type' => ['required'],

                'property.bathrooms' => ['required'],
                'property.bathrooms.*.name' => ['required'],
                'property.bathrooms.*.bath_type' => ['required'],
            ], [
                'property.bedrooms.required_without' => 'At least one bedroom is required unless you have added a common area.',
                'property.bedrooms.*.name.required' => 'You must name this bedroom.',
                'property.bedrooms.*.beds.required' => 'Each bedroom must have at least one bed.',
                'property.bedrooms.*.beds.*.bed_type.required' => 'A bed type is required.',

                'property.areas.required_without' => 'At least one common area is required unless you have added a bedroom.',
                'property.areas.*.name.required' => 'You must name this area.',
                'property.areas.*.beds.required' => 'Each area must have at least one bed.',
                'property.areas.*.beds.*.bed_type.required' => 'A bed type is required.',

                'property.bathrooms.required' => 'At least one bathroom is required.',
                'property.bathrooms.*.name.required' => 'Bath Name is required.',
                'property.bathrooms.*.bath_type.required' => 'Bath Type is required.',
            ], $this->attributes());
        }

        // if()

        // Amenities
        // Photos
        // Pricing
        // Publish

        $this->step++;
    }

    public function goBack()
    {
        $this->step--;
    }

    public function addRoom($roomType)
    {
        $this->property[$roomType][] = [];
    }

    public function removeRoom($roomType, $roomKey)
    {
        unset($this->property[$roomType][$roomKey]);
    }

    public function addBed($roomType, $roomKey)
    {
        $this->resetValidation();
        $this->property[$roomType][$roomKey]['beds'][] = [];
    }

    public function removeBed($roomType, $roomKey, $bedKey)
    {
        unset($this->property[$roomType][$roomKey]['beds'][$bedKey]);
    }
}
