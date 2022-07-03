<?php

namespace App\Http\Livewire\Host\Properties;

use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;
use Livewire\WithFileUploads;

class EditPropertyForm extends Component
{
    use WithFileUploads, WireToast;

    public $property;
    public $stagedPhotos;

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
        return view('livewire.host.properties.edit-property-form');
    }

    public function loadProperty()
    {
        $this->name = $this->property->name;
        $this->street = $this->property->street;
        $this->city = $this->property->city;
        $this->state = $this->property->state;
        $this->zip = $this->property->zip;
        $this->type = $this->property->type;
        $this->guests = $this->property->guests;
        $this->beds = $this->property->beds;
        $this->bedrooms = $this->property->bedrooms;
        $this->bathrooms = $this->property->bathrooms;
        $this->headline = $this->property->headline;
        $this->description = $this->property->description;
    }
}
