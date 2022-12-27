<?php

namespace App\Http\Controllers\Pages\Host\Setup\Property;

use App\Models\PropertyType;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Details extends Component
{
    use WireToast;

    public $property;
    public $default_types;

    protected $listeners = ['loadDetails' => 'load'];

    protected function rules()
    {
        return [
            'property.type' => ['required', 'integer'],
        ];
    }

    protected function messages()
    {
        return [
            'property.type.required' => 'Property Type is required.',
            'property.type.integer' => 'Property Type is invalid.',
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
        return view('pages.host.setup.property.details');
    }

    public function load()
    {
        $this->loadDevData();

        foreach (PropertyType::all()->sortBy('name') as $type) {
            $this->default_types[$type->id] = ucFirst($type->name);
        }
    }

    public function loadDevData()
    {
        $this->property['type'] = 1;
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
