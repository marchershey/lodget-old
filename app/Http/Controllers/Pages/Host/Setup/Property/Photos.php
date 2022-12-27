<?php

namespace App\Http\Controllers\Pages\Host\Setup\Property;

use App\Models\PropertyPhoto;
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
            'photos' => ['required'],
            'photos.*' => ['image', 'mimes:jpg,jpeg,png,gif', 'max:20488'],
        ];
    }

    protected function messages()
    {
        return [
            'photos.required' => 'You need to add at least one image.',
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
        return view('pages.host.setup.property.photos');
    }

    public function load()
    {
        $this->property['photos'] = [];
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

        // upload photos
        foreach ($this->photos as $photo) {
            $path = $photo->store('property/photos', 'public', $this->rules());

            $this->property['photos'][] = $path;
        }

        $this->emitUp('nextPage', $this->property);
    }
}
