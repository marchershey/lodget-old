<?php

namespace App\Http\Controllers\Pages\Host\Properties\Components;

use App\Models\Amenity;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Amenities extends Component
{
    use WireToast;

    public $property;
    public $primary_amenities = [];
    public $selected_amenities = [];

    protected $listeners = ['loadAmenities' => 'load'];

    public function render()
    {
        return view('pages.host.properties.components.amenities');
    }

    public function load()
    {
        $this->property['amenities'] = [];

        if (app()->environment() == 'local') {
            $this->loadDevData();
        }

        $this->primary_amenities = Amenity::where('primary', true)->get();
    }

    public function loadDevData()
    {
        $this->selected_amenities = [2, 16, 71, 120];
    }

    public function submit()
    {
        // Load the actual amenity model
        foreach ($this->selected_amenities as $key => $amenity) {
            $this->property['amenities'][$key] = Amenity::find($amenity);
        }

        $this->emitUp('nextPage', $this->property);
    }
}
