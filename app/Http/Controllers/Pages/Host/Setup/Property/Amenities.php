<?php

namespace App\Http\Controllers\Pages\Host\Setup\Property;

use App\Models\Amenity;
use App\Models\AmenityGroup;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Amenities extends Component
{
    use WireToast;

    public $amenities;


    protected $listeners = ['loadAmenities' => 'load'];

    public function render()
    {
        return view('pages.host.setup.property.amenities');
    }

    public function load()
    {
        $this->amenities = Amenity::where('primary', true)->get();
    }
}
