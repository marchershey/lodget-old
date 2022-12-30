<?php

namespace App\Http\Controllers\Pages\Host\Properties\Components;

use App\Models\PropertyPhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Usernotnull\Toast\Concerns\WireToast;

class Photos extends Component
{
    use WithFileUploads, WireToast;

    public $property;
    public $photos = [];
    public $size = 0; // describe this

    protected $listeners = ['loadPhotos' => 'load'];

    protected function rules()
    {
        return [
            'photos' => ['required_if:property,null'],
            'photos.*' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:20488'],
        ];
    }

    protected function messages()
    {
        return [
            'photos.required_if' => 'You need to add at least one image.',
            'photos.*.max' => 'This photo\'s file size is too large. Photo size cannot exceed 12mb.',
        ];
    }

    protected function attributes()
    {
        return [
            'photos.*.max' => 'asdf',
        ];
    }

    public function render()
    {
        return view('pages.host.properties.components.photos');
    }

    public function load()
    {
        if (app()->environment() == 'local') {
            $this->loadDevData();
        } else {
            $this->property['photos'] = [];
        }
    }

    public function loadDevData()
    {
        // https://imgur.com/a/2FhNrj7
        // External images to download if local photos are not available.
        $external_images = [
            'https://i.imgur.com/wAy4vKv.png',
            'https://i.imgur.com/Ln0Ap0k.png',
            'https://i.imgur.com/ikY2Afj.png',
            'https://i.imgur.com/E9CNLLq.png',
            'https://i.imgur.com/Gn1zp5M.png',
            'https://i.imgur.com/QGUSeop.png',
            'https://i.imgur.com/p5GB5VD.png',
            'https://i.imgur.com/MIxfzXx.png',
            'https://i.imgur.com/DEertti.jpg',
            'https://i.imgur.com/vazCnSc.jpg',
        ];

        // Local images to try to use.
        $local_images = [
            'dev-property-0.png',
            'dev-property-1.png',
            'dev-property-2.png',
            'dev-property-3.png',
            'dev-property-4.png',
            'dev-property-5.png',
            'dev-property-6.png',
            'dev-property-7.png',
            'dev-property-8.png',
            'dev-property-9.png',
        ];

        // Do any of the local files exist? Just check the first one.
        if (Storage::disk('public')->exists('dev-property-1.png')) {
            toast()->info('Local files exist!')->push();
            // They do exist -- Assign the public images to this property.
            foreach ($local_images as $filename) {
                $this->property['photos'][] = $filename;
            }
        } else {
            toast()->info('Local files do not exist. Downloading demo photos...')->push();
            // They do not exist -- Download the external images, assign them to this property
            foreach ($external_images as $image_key => $image_url) {
                $filename = 'dev-property-' . $image_key . '.png';
                Storage::disk('public')->put($filename, file_get_contents($image_url));

                $this->property['photos'][] = $filename;
            }
        }

        toast()->success('Photos added successfully!')->push();
    }

    public function updatedPhotos($value)
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    toast()->danger('Please fix the error(s) below.', 'Validation Error')->push();
                }
            });
        })->validate($this->rules(), $this->messages(), $this->attributes());


        $this->calcTotalSize();
    }

    public function calcTotalSize()
    {
        $size = 0;
        foreach ($this->photos as $photo) {
            $size += $photo->getSize();
        }

        // KB to MB
        $this->size = round($size /= 1024, 2);
    }

    public function deletePhoto($photo_key)
    {
        unset($this->photos[$photo_key]);
    }

    public function submit()
    {
        // validate
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    toast()->danger('You need to either resolve the invalid photo, or remove it.', 'Validation Error')->push();
                }
            });
        })->validate($this->rules(), $this->messages(), $this->attributes());

        // do not use demo photos if user uploads photos
        // check if user uploaded photos
        if ($this->photos) {
            // remove all demo photos
            $this->property = [];

            // upload user photos
            foreach ($this->photos as $photo) {
                $path = $photo->storePublicly('', 'public');
                $this->property['photos'][] = $path;
            }
        }

        $this->emitUp('nextPage', $this->property);
    }
}
