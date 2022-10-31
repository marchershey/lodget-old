<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAmenityGroup extends Model
{
    use HasFactory;

    public function amenities()
    {
        return $this->hasMany(PropertyAmenity::class, 'group_id');
    }
}
