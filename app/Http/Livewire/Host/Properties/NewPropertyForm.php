<?php

namespace App\Http\Livewire\Host\Properties;

use App\Models\Property;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class NewPropertyForm extends Component
{
    use WireToast;

    public $name;
    public $street;
    public $city;
    public $state;
    public $zip;
    public $type;
    public $guests = 1;
    public $beds = 0;
    public $bedrooms = 0;
    public $bathrooms = 0;
    public $headline;
    public $description;

    protected $rules = [
        'name' => 'required|string|max:250',
        'street' => 'required|string|max:250',
        'city' => 'required|string|max:250',
        'state' => 'required|string|max:250',
        'zip' => 'required|integer|regex:/\b\d{5}\b/',
        'type' => 'required|string|max:100',
        'guests' => 'required|integer|min:1',
        'beds' => 'required|integer|min:0',
        'bedrooms' => 'required|integer|min:0',
        'bathrooms' => 'required|min:0',
    ];

    public function render()
    {
        return view('livewire.host.properties.new-property-form');
    }

    public function updated($property, $value)
    {
        // toast()->debug($value, $property)->push();

        $this->resetValidation($property);
        if ($value) {
            $this->withValidator(function (Validator $validator) {
                $validator->after(function ($validator) {
                    if (count($validator->errors()) > 0) {
                        $error = $validator->errors()->first();
                        toast()->danger($error)->push();
                    }
                });
            })->validateOnly($property);;
        }
    }

    public function submit()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    $error = $validator->errors()->first();
                    toast()->danger($error, 'Error')->push();
                }
            });
        })->validate();

        $property = new Property();
        $property->name = (string) ucwords($this->name);
        $property->street = (string) ucwords($this->street);
        $property->city = (string) ucwords($this->city);
        $property->state = (string) strtoupper($this->state);
        $property->zip = (int) $this->zip;
        $property->type = (string) ucwords($this->type);
        $property->guests = (int) $this->guests;
        $property->beds = (int) $this->beds;
        $property->bedrooms = (int) $this->bedrooms;
        $property->bathrooms = (string) $this->bathrooms;

        // $property->slug = \App\Helpers\PropertySlugHelper::generate($property->name);

        if ($property->save()) {
            toast()->success('Next, click on the property to add more details, such as photos and aminities!', ucwords($this->name) . ' was successfully added!')->pushOnNextPage();
            return redirect()->route('host.properties');
        } else {
            toast()->danger('Oops, something went wrong on our end. Refresh the page and try again.', 'Server Error')->push();
        }
    }
}
