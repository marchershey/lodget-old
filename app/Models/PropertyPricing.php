<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyPricing extends Model
{
    use HasFactory;

    protected $casts = [
        'fees' => 'array', // Will convarted to (Array)
    ];
}