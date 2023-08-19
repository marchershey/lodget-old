<?php

namespace App\Models;

use Cknow\Money\Casts\MoneyDecimalCast;
use Cknow\Money\Casts\MoneyIntegerCast;
use Cknow\Money\Casts\MoneyStringCast;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'summary',
        'type',
        'capacity',
        'address_street',
        'address_city',
        'address_state',
        'address_zip',
        'base_rate',
        'minimum_nights',
        'slug',
    ];

    protected $casts = [
        'base_rate' => MoneyIntegerCast::class,

    ];

    public static function boot()
    {
        parent::boot();

        // slug
        static::creating(function ($rental) {
            $slug = \App\Helpers\RentalSlugHelper::generate($rental->name);
            $rental->slug = $slug;
        });
    }
}
