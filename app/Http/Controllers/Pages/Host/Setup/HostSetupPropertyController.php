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
    public $step;
    public $property;
    public $property_types = [];

    protected function rules()
    {
        return [
            'property.name' => ['required', 'max:100', new AlphaSpace],
            'property.address.street' => ['required', 'max:100', 'regex:/(^[-0-9A-Za-z.,\/ ]+$)/'],
            'property.address.city' => ['required', 'max:100', new AlphaSpace],
            'property.address.state' => ['required', 'size:2', 'alpha'],
            'property.address.zip' => ['required', 'numeric', 'regex:/^[0-9]{5}(?:-[0-9]{4})?$/'],
        ];
    }

    protected function attributes()
    {
        return [
            'property.name' => 'Property Name',
            'property.address.street' => 'Street Address',
            'property.address.city' => 'City',
            'property.address.state' => 'State',
            'property.address.zip' => 'Zip / Postal Code',
        ];
    }

    public function render()
    {
        return view('pages.host.setup.property');
    }

    public function mount()
    {
        $this->step = 2;
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
                'property.type' => ['required'],
            ], [], $this->attributes());
        }

        // if ($this->step == 3) {
        //     $this->withValidator(function (Validator $validator) {
        //         $validator->after(function ($validator) {
        //             if (count($validator->errors()) > 0) {
        //                 // $error = $validator->errors()->first();
        //                 // toast()->danger($error, 'Error')->push();
        //                 toast()->danger('Please fix the following errors.', 'Uh oh!')->push();
        //             }
        //         });
        //     })->validate([
        //         //
        //     ], [], $this->attributes());
        // }

        $this->step++;
    }

    public function goBack()
    {
        $this->step--;
    }

    public function load()
    {
        $this->loadPropertyTypes();
    }

    /**
     * Property Types
     */
    public function loadPropertyTypes()
    {
        foreach (PropertyType::all()->sortBy('name') as $property_type) {
            $this->property_types[$property_type->id] = ucFirst($property_type->name);
        }

        $this->property_types = collect($this->property_types);
    }
}
