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
    public $selected_property_type;
    public $default_types;

    protected $listeners = ['loadDetails' => 'load'];

    protected function rules()
    {
        return [
            'selected_property_type' => ['required', 'integer'],
        ];
    }

    protected function messages()
    {
        return [
            'selected_property_type.required' => 'Property Type is required.',
            'selected_property_type.integer' => 'Property Type is invalid.',
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
        if (app()->environment() == 'local') {
            $this->loadDevData();
        }

        foreach (PropertyType::all()->sortBy('name') as $type) {
            $this->default_types[$type->id] = ucFirst($type->name);
        }
    }

    public function loadDevData()
    {
        $this->selected_property_type = 19;
        $this->updatedSelectedPropertyType(19);
    }

    public function updatedSelectedPropertyType($propertyTypeId)
    {
        // when user selects a property type, update the TYPE property to refect the model.
        $type = PropertyType::find($propertyTypeId);
        $this->property['type'] = $type;
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
