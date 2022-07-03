<?php

namespace App\Http\Livewire\Host\Properties;

use App\Models\PropertyAmenity;
use App\Models\PropertyPhoto;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;
use Livewire\WithFileUploads;

class EditPropertyForm extends Component
{
    use WithFileUploads, WireToast;

    public $property;

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
    public $stagedPhotos;
    public $uploadedPhotos;
    public $amenity;
    public $amenities = [];

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

        // load photos
        if ($photos = $this->property->photos()->get(['id', 'name', 'size', 'path'])->toArray()) {
            $this->uploadedPhotos = $photos;
        }

        // load amenities
        if ($amenities = $this->property->amenities()->get(['id', 'text'])->toArray()) {
            foreach ($amenities as $amenity) {
                $this->amenities[$amenity['id']] = $amenity['text'];
            }
        }
    }

    public function deleteStagedPhoto($key)
    {
        unset($this->stagedPhotos[$key]);
    }

    public function deleteUploadedPhoto($key, $id)
    {
        unset($this->uploadedPhotos[$key]);
        $photo = PropertyPhoto::find($id);
        $photo->delete();
        toast()->success('Photo deleted succeesfully!')->push();
    }

    public function addAmenity()
    {
        if ($this->amenity != null) {
            if (!in_array($this->amenity, $this->amenities)) {
                $this->amenities[] = $this->amenity;
                $this->amenity = "";
            } else {
                $this->amenity = "";
            }
        }
    }
    public function removeAmenity($id)
    {
        unset($this->amenities[$id]);
    }

    public function submit()
    {
        // Photos
        if ($this->stagedPhotos) {

            // get sort/order number from last photo
            $lastOrder = PropertyPhoto::where('property_id', $this->property->id)->get('order')->last()->order ?? 0;

            foreach ($this->stagedPhotos as $stagedPhoto) {
                // increase last order
                $lastOrder++;

                // upload photo
                $path = $stagedPhoto->store('photos', 'public');

                // store photo in database
                $photo = new PropertyPhoto();
                $photo->property_id = $this->property->id;
                $photo->user_id = 1;
                $photo->name = $stagedPhoto->getClientOriginalName();
                $photo->size = $stagedPhoto->getSize();
                $photo->mime = $stagedPhoto->getMimeType();
                $photo->path = $path;
                $photo->order = $lastOrder;
                $photo->save();
            }
        }

        // Amenities
        // delete all amenities
        foreach ($this->property->amenities as $amenity) {
            $amenity->delete();
        }
        // re-add current amenities
        if ($this->amenities) {
            foreach ($this->amenities as $text) {
                $amenity = new PropertyAmenity();
                $amenity->text = $text;
                $amenity->property_id = $this->property->id;
                $amenity->user_id = 1;
                $amenity->save();
            }
        }

        toast()->success($this->name . ' was updated successfully!')->push();
        // toast()->success($this->name . ' was updated successfully!')->pushOnNextPage();
        // return redirect()->route('host.properties.edit', ['id' => $this->property->id]);
    }
}
