<?php

namespace App\Helpers;

class PropertySlugHelper
{
      public static function generate($propertyName)
      {
            $slug = \Illuminate\Support\Str::slug($propertyName);
            $newSlug = $slug;

            $n = 1;
            while (\App\Models\Property::whereSlug($newSlug)->exists()) {
                  $newSlug = \Illuminate\Support\Str::slug($slug . '-' . $n++);
            }

            return $newSlug;
      }
}
