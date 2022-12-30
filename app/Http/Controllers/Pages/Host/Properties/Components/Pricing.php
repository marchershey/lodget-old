<?php

namespace App\Http\Controllers\Pages\Host\Properties\Components;

use Cknow\Money\Money;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Pricing extends Component
{
    use WireToast;

    public $property;

    protected $listeners = ['loadPricing' => 'load'];

    protected function rules()
    {
        return [
            'property.pricing.base_rate' => ['required', 'numeric', 'regex:/^(?!0,00|0)(?:\d{1,3}(?:[,]\d{3})*|(?:\d+))(?:[.,]\d{2})?$/'],
            'property.pricing.tax_rate' => ['required', 'integer', 'max:99', 'min:0'],
            'property.pricing.fees' => [''],
            'property.pricing.fees.*.name' => ['required'],
            'property.pricing.fees.*.amount' => ['required', 'numeric'],
            'property.pricing.fees.*.type' => ['required'],
        ];
    }

    protected function messages()
    {
        return [
            'property.pricing.base_rate.required' => 'The base rate is required.',
            'property.pricing.base_rate.numeric' => 'The base rate is invalid.',
            'property.pricing.base_rate.regex' => 'The base rate is invalid (regex).',

            // 'property.pricing.min_nights.required' => 'Minimum nights is required.',
            // 'property.pricing.min_nights.integer' => 'Minumum nights must be whole number.',

            'property.pricing.tax_rate.required' => 'The tax rate is required.',
            'property.pricing.tax_rate.integer' => 'The tax rate must be numeric (0-99).',

            'property.pricing.fees.*.name.required' => 'Fee name is required.',

            'property.pricing.fees.*.amount.required' => 'Amount is required.',
            'property.pricing.fees.*.amount.numeric' => 'Amount must be numeric.',
            'property.pricing.fees.*.amount.regex' => 'Amount is invalid.',

            'property.pricing.fees.*.type.required' => 'Fee type is required.',

        ];
    }

    protected function attributes()
    {
        return [];
    }

    public function render()
    {
        return view('pages.host.setup.property.pricing');
    }

    public function load()
    {
        if (app()->environment() == 'local') {
            $this->loadDevData();
        } else {
            $this->property['pricing']['fees'] = [];
        }
    }

    public function loadDevData()
    {
        $this->property['pricing'] = [
            'base_rate' => Money::USD(300.00)->formatByDecimal(),
            'tax_rate' => 7,
            'fees' => [
                [
                    'name' => 'Cleaning Fee',
                    'type' => 'fixed',
                    'amount' => Money::USD(175.00)->formatByDecimal(),
                ],
            ],
        ];
    }

    function is_numeric_with_commas($value)
    {
        $value = str_replace(',', '', $value);
        return is_numeric($value) && floatval($value) == $value;
    }

    public function updatedProperty($value, $property)
    {
        $property = explode('.', $property);

        // Format the Nightly Base Rate
        if ($property[1] == 'base_rate') {
            if ($this->is_numeric_with_commas($value)) {
                $this->property['pricing']['base_rate'] = Money::USD($value)->formatByDecimal();
            } else {
                $this->property['pricing']['base_rate'] = null;
            }
            return;
        }

        // Fees
        if ($property[1] == 'fees') {
            // Set the Fee Key
            $key = $property[2];

            // If the Fee Type is changed, clear the amount if it's set
            if ($property[3] == 'type' && isset($this->property['pricing']['fees'][$key]['amount'])) {
                $this->property['pricing']['fees'][$key]['amount'] = null;
                return;
            }

            // Format fixed fees
            // Grab the fee
            $fee = $this->property['pricing']['fees'][$key];
            if ($property[3] == 'amount' && $fee['type'] == 'fixed') {
                if ($this->is_numeric_with_commas($value)) {
                    $this->property['pricing']['fees'][$key]['amount'] = Money::USD($value)->formatByDecimal();
                } else {
                    $this->property['pricing']['fees'][$key]['amount'] = null;
                }
                return;
            }
        }
    }

    public function addFee()
    {
        $this->property['pricing']['fees'][] = [];
    }

    public function removeFee($fee_key)
    {
        unset($this->property['pricing']['fees'][$fee_key]);
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
