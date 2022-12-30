<?php

namespace App\Http\Controllers\Pages\Host\Setup;

use App\Models\AmenityGroup;
use App\Models\Property;
use App\Models\PropertyType;
use App\Rules\AlphaSpace;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class HostSetupPropertyController extends Component
{
    use WireToast;

    public $page = 0;
    public $property = [];

    protected $listeners = ['setPage', 'nextPage', 'prevPage', 'publish'];

    public function render()
    {
        return view('pages.host.setup.property');
    }

    public function setPage($page)
    {
        $this->syncInput('page', $this->page);
    }

    public function nextPage($data)
    {
        $this->property = array_merge($this->property, $data);

        $this->setPage($this->page++);
    }

    public function prevPage()
    {
        $this->setPage($this->page--);
    }

    public function updatedPage($page)
    {
        switch ($page) {
            case 1:
                // Basic information
                $this->emit('loadBasicInformation');
                break;
            case 2:
                // property details
                $this->emit('loadDetails');
                break;
            case 3:
                // Rooms & spaces
                $this->emit('loadRoomsSpaces');
                break;
            case 4:
                // Amenities
                $this->emit('loadAmenities');
                break;
            case 5:
                // Photos
                $this->emit('loadPhotos');
                break;
            case 6:
                // Pricing
                $this->emit('loadPricing');
                break;
            case 7:
                // Options
                $this->emit('loadOptions');
                break;
            case 8:
                // Publish
                $this->emit('loadPublish', $this->property);
                break;
        }

        // scroll to top
        $this->dispatchBrowserEvent('scroll');
    }

    public function publish()
    {
        dd($this->property);
    }
}
