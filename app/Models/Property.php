<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        // slug
        static::creating(function ($property) {
            $slug = \App\Helpers\PropertySlugHelper::generate($property->name);
            $property->slug = $slug;
        });
    }

    public function slug()
    {
        return \Illuminate\Support\Str::slug($this->name);
    }

    public function photos()
    {
        return $this->hasMany(PropertyPhoto::class)->orderBy('order');
    }

    public function amenities()
    {
        return $this->hasMany(PropertyAmenity::class);
    }

    public function isVisible()
    {
        // is property set to active?
        if (!$this->active) {
            return false;
        }

        // does the property have photos?
        if (count($this->photos()->get()) == 0) {
            return false;
        }

        return true;
    }
}
