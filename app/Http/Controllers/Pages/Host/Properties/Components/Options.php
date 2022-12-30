<?php

namespace App\Http\Controllers\Pages\Host\Properties\Components;

use Illuminate\Validation\Validator;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Options extends Component
{
    use WireToast;

    public $property;

    protected $listeners = ['loadOptions' => 'load'];

    protected function rules()
    {
        return [
            'property.options.min_nights' => ['required', 'integer'],
        ];
    }

    protected function messages()
    {
        return [
            'property.options.min_nights.required' => 'Minimum nights is required.',
            'property.options.min_nights.integer' => 'Minimum nights is invalid.',
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
        return view('pages.host.setup.property.options');
    }

    public function load()
    {
        if (app()->environment() == 'local') {
            $this->loadDevData();
        }
    }

    public function loadDevData()
    {
        $this->property['options']['min_nights'] = 3;
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
