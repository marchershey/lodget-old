<?php

namespace App\Http\Livewire\Host\Properties;

use App\Models\Property;
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


    public function render()
    {
        return view('livewire.host.properties.new-property-form');
    }

    public function submit()
    {
        // toast()->success('This is a test message!')->push();
        // $validated = 

        // $property = new Property();
        // $property->name = $this->name;
        // $property->street = $this->street;
        // $property->city = $this->city;
        // $property->state = $this->state;
        // $property->zip = $this->zip;
        // $property->type = $this->type;
        // $property->guests = $this->guests;
        // $property->beds = $this->beds;
        // $property->bedrooms = $this->bedrooms;
        // $property->bathrooms = $this->bathrooms;
        // $property->save();


    }
}
