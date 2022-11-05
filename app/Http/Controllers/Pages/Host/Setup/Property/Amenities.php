<?php

namespace App\Http\Controllers\Pages\Host\Setup\Property;

use App\Models\Amenity;
use Livewire\Component;

class Amenities extends Component
{
    public $amenities;
    public $selected_amenities = [];

    protected $listeners = ['loadAmenities' => 'load'];

    public function render()
    {
        return view('pages.host.setup.property.amenities');
    }

    public function load()
    {
        $this->amenities = Amenity::where('primary', true)->get();
    }

    public function submit()
    {
        $this->emitUp('nextPage', ['amenities' => $this->selected_amenities]);
    }
}
