<?php

namespace App\Http\Controllers\Pages\Host\Setup\Property;

use App\Models\Amenity;
use Livewire\Component;

class Amenities extends Component
{
    public $property;
    public $primary_amenities = [];

    protected $listeners = ['loadAmenities' => 'load'];

    public function render()
    {
        return view('pages.host.setup.property.amenities');
    }

    public function load()
    {
        // Why do we need this? 
        $this->property['amenities'] = [];

        $this->primary_amenities = Amenity::where('primary', true)->get();
    }

    public function submit()
    {
        // No validation required

        $this->emitUp('nextPage', $this->property);
    }
}
