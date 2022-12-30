<?php

namespace App\Http\Controllers\Pages\Host\Properties;

use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Models\PropertyPhoto;
use App\Models\PropertyPricing;
use App\Models\PropertyRoom;
use Livewire\Component;
use Throwable;
use Usernotnull\Toast\Concerns\WireToast;

class AddProperty extends Component
{
    use WireToast;

    public $page = 0;
    public $property = [];

    protected $listeners = ['setPage', 'nextPage', 'prevPage', 'publish'];

    public function render()
    {
        return view('pages.host.properties.add-property');
    }

    public function setPage($page)
    {
        // This fires "updatedPage()"
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

    public function publish($property)
    {
        $this->property = array_merge($this->property, $property);

        // dd($this->property);

        // First, create a new property model
        $new_property = new Property();

        // Add the basic data
        $new_property->name = $this->property['name'];
        $new_property->address = $this->property['address'];
        $new_property->city = $this->property['city'];
        $new_property->state = $this->property['state'];
        $new_property->zip = $this->property['zip'];
        $new_property->type_id = $this->property['type']['id'];
        $new_property->host_id = auth()->user()->id;

        // Options
        $new_property->min_nights = $this->property['options']['min_nights'];

        try {
            $new_property->save();
        } catch (Throwable $e) {
            if (app()->environment() == 'local') {
                toast()->danger($e->getMessage(), 'Error')->push();
            } else {
                toast()->danger('Please refresh the page and try again.', 'Oops! Something went wrong...')->push();
            }
            return false;
        }

        // Property Rooms
        foreach ($this->property['rooms'] as $room_type => $rooms) {
            foreach ($rooms as $room) {
                $new_room = new PropertyRoom();
                $new_room->property_id = $new_property->id;
                $new_room->room_type = $room_type;
                $new_room->name = $room['name'];
                $new_room->beds = $room['beds'] ?? [];

                try {
                    $new_room->save();
                } catch (Throwable $e) {
                    if (app()->environment() == 'local') {
                        toast()->danger($e->getMessage(), 'Error')->push();
                    } else {
                        toast()->danger('Please refresh the page and try again.', 'Oops! Something went wrong...')->push();
                    }
                    return false;
                }
            }
        }

        // Amenities
        foreach ($this->property['amenities'] as $amenity) {
            $new_amenity = new PropertyAmenity();
            $new_amenity->property_id = $new_property->id;
            $new_amenity->amenity_id = $amenity['id'];
            try {
                $new_amenity->save();
            } catch (Throwable $e) {
                if (app()->environment() == 'local') {
                    toast()->danger($e->getMessage(), 'Error')->push();
                } else {
                    toast()->danger('Please refresh the page and try again.', 'Oops! Something went wrong...')->push();
                }
                return false;
            }
        }

        // Photos
        foreach ($this->property['photos'] as $photo) {
            $new_photo = new PropertyPhoto();
            $new_photo->property_id = $new_property->id;
            $new_photo->host_id = auth()->user()->id;
            $new_photo->path = $photo;
            try {
                $new_photo->save();
            } catch (Throwable $e) {
                if (app()->environment() == 'local') {
                    toast()->danger($e->getMessage(), 'Error')->push();
                } else {
                    toast()->danger('Please refresh the page and try again.', 'Oops! Something went wrong...')->push();
                }
                return false;
            }
        }

        // Pricing
        $new_pricing = new PropertyPricing();
        $new_pricing->property_id = $new_property->id;
        $new_pricing->base_rate = $this->property['pricing']['base_rate'];
        $new_pricing->tax_rate = $this->property['pricing']['tax_rate'];
        $new_pricing->fees = $this->property['pricing']['fees'];
        try {
            $new_pricing->save();
        } catch (Throwable $e) {
            if (app()->environment() == 'local') {
                toast()->danger($e->getMessage(), 'Error')->push();
            } else {
                toast()->danger('Please refresh the page and try again.', 'Oops! Something went wrong...')->push();
            }
            return false;
        }

        // Redirect to properties page
        return redirect()->route('host.property.index');
    }
}
