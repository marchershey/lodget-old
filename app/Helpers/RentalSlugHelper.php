<?php

namespace App\Helpers;

class RentalSlugHelper
{
    public static function generate($rentalName)
    {
        $slug = \Illuminate\Support\Str::slug($rentalName);
        $newSlug = $slug;

        $n = 1;
        while (\App\Models\Rental::whereSlug($newSlug)->exists()) {
            $newSlug = \Illuminate\Support\Str::slug($slug . '-' . $n++);
        }

        return $newSlug;
    }
}
