<?php

namespace App\Http\Livewire\Host\Properties;

use App\Models\Property;
use App\Models\PropertyAmenity;
use App\Models\PropertyPhoto;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Usernotnull\Toast\Concerns\WireToast;

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

    // rates & fees
    public $rate;
    public $tax;
    public $fees = [];

    // Options
    public $visible;

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
        $this->guests = (int) $this->property->guests;
        $this->beds = (int) $this->property->beds;
        $this->bedrooms = (int) $this->property->bedrooms;
        $this->bathrooms = (float) $this->property->bathrooms;
        $this->headline = $this->property->headline;
        $this->description = $this->property->description;

        // Options
        $this->visible = (bool) $this->property->visible;

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
    public function removeAmenity($key)
    {
        unset($this->amenities[$key]);
    }

    public function addFee()
    {
        $this->fees[] = [];
    }
    public function removeFee($key)
    {
        unset($this->fees[$key]);
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

        $property = Property::findOrFail($this->property->id);
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

        // options
        $property->visible = $this->visible;

        if ($property->save()) {
            toast()->success(ucwords($this->name) . ' was successfully updated!')->pushOnNextPage();
            return redirect()->route('host.properties');
        } else {
            toast()->danger('Oops, something went wrong on our end. Refresh the page and try again.', 'Server Error')->push();
        }
    }
}
