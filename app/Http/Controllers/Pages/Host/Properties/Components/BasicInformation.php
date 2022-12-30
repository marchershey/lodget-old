<?php

namespace App\Http\Controllers\Pages\Host\Properties\Components;

use App\Rules\AlphaSpace;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class BasicInformation extends Component
{
    use WireToast;

    public $property;

    protected $listeners = ['loadBasicInformation' => 'load'];

    protected function rules()
    {
        return [
            'property.name' => ['required', 'max:100', new AlphaSpace],
            'property.address' => ['required', 'max:100', 'regex:/(^[-0-9A-Za-z.,\/ ]+$)/'],
            'property.city' => ['required', 'max:100', new AlphaSpace],
            'property.state' => ['required', 'size:2', 'alpha'],
            'property.zip' => ['required', 'numeric', 'regex:/^[0-9]{5}(?:-[0-9]{4})?$/'],
        ];
    }

    protected function messages()
    {
        return [
            'property.name.required' => 'Property name is required.',
            'property.name.max' => 'Property name is too long. (100 max)',

            'property.address.required' => 'Street address is required.',
            'property.address.max' => 'Street address is too long. (100 max)',
            'property.address.regex' => 'Street address is invalid.',

            'property.city.required' => 'The city is required.',
            'property.city.max' => 'The city is too long. (100 max)',

            'property.state.required' => 'The state is required.',
            'property.state.size' => 'The state is invalid.',
            'property.state.alpha' => 'The state is invalid.',

            'property.zip.required' => 'The zip code is required.',
            'property.zip.numeric' => 'The zip code is invalid.',
            'property.zip.regex' => 'The zip is invalid.',
        ];
    }

    protected function attributes()
    {
        return [
            'property.name' => 'Property Name',
            'property.address' => 'Street Address',
            'property.city' => 'City',
            'property.state' => 'State',
            'property.zip' => 'Zip / Postal Code',
        ];
    }

    public function render()
    {
        return view('pages.host.setup.property.basic-information');
    }

    public function load()
    {
        if (app()->environment() == 'local') {
            $this->loadDevData();
        }

        // Loading not needed
    }

    public function loadDevData()
    {
        $this->property = [
            'name' => 'Ohana Burnside',
            'address' => '123 Address Ave',
            'city' => 'Lexington',
            'state' => 'KY',
            'zip' => '10001',
        ];
    }

    public function submit()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    toast()->danger('Please fix the error(s) below.', 'Validation Error')->push();
                }
            });
        })->validate($this->rules(), $this->messages(), $this->attributes());

        $this->emitUp('nextPage', $this->property);
    }
}
