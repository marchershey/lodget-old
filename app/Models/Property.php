<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public function photos()
    {
        return $this->hasMany(PropertyPhoto::class)->orderBy('order');
    }

    public function amenities()
    {
        return $this->hasMany(PropertyAmenity::class);
    }
}
