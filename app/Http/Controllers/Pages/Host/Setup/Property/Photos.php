<?php

namespace App\Http\Controllers\Pages\Host\Setup\Property;

use Illuminate\Validation\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Usernotnull\Toast\Concerns\WireToast;

class Photos extends Component
{
    use WithFileUploads, WireToast;

    public $photos = [];
    public $size = 0;

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
            'photos.*.max' => 'Size cannot exceed 12mb.',
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
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    toast()->danger('Please fix the error(s) below.', 'Validation Error')->push();
                }
            });
        })->validate($this->rules(), $this->messages(), $this->attributes());

        // upload photos
        foreach ($this->photos as $photo) {



            dd($photo->store('property/images', 'public'));

            // dd($photo);
        }
    }
}
