<?php

namespace App\Http\Controllers\Pages\Admin\Settings\Properties;

use App\Models\PropertyType;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Throwable;
use Usernotnull\Toast\Concerns\WireToast;

class PropertyTypes extends Component
{
    use WireToast;

    public $property_types = [];
    public $new_property_type;

    protected $listeners = ['loadPropertyTypes' => 'load'];

    protected function rules()
    {
        return [
            'new_property_type' => ['required', 'max:20', 'unique:property_types,name']
        ];
    }

    protected function messages()
    {
        return [
            'new_property_type' => [
                'required' => 'The Property Type Name is required',
                'max' => 'The Property Type can only be 20 characters',
                'unique' => 'That Property Type already exists'
            ],
        ];
    }

    public function render()
    {
        return view('pages.admin.settings.properties.property-types');
    }

    public function load()
    {
        $this->property_types = PropertyType::all()->sortBy('name');
    }

    public function addNewPropertyType()
    {
        if (!$this->new_property_type) {
            return;
        }

        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    $error = $validator->errors()->first();
                    toast()->danger($error)->push();
                }
            });
        })->validate();

        try {
            PropertyType::create(['name' => strtolower($this->new_property_type)]);
        } catch (Throwable $e) {
            toast()->danger($e->getMessage())->push();
            toast()->danger('Please refresh the page and try again.', 'Server Error')->push();
        }

        $this->new_property_type = null;
        $this->load();
    }

    public function delete($id)
    {
        try {
            $property_type = PropertyType::find($id);
            $property_type->delete();
        } catch (Throwable $e) {
            toast()->danger('Please refresh the page and try again.', 'Server Error')->push();
            return;
        }

        $this->load();
    }
}
