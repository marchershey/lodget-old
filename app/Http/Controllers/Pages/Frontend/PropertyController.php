<?php

namespace App\Http\Controllers\Pages\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    /**
     * Return the Property Page view.
     *
     * @return \Illuminate\View\View
     */
    public function view(Property $property)
    {
        return view('pages.frontend.property', ['property' => $property]);
    }
}
