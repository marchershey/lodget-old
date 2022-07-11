<?php

namespace App\Helpers;

class ReservationSlugHelper
{
    public static function generate($slug = null)
    {
        if (!isset($slug)) {
            $slug = \Illuminate\Support\Str::uuid();
        }

        while (\App\Models\Reservation::whereSlug($slug)->exists()) {
            $slug = \Illuminate\Support\Str::uuid();
        }

        return $slug;
    }
}
