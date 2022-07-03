<?php

namespace App\Http\Controllers\Pages\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class Index extends Controller
{
    /**
     * Return the Landing Page view.
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        $properties = Property::where('visible', true)->get();
        return view('pages.frontend.index', ['properties' => $properties]);
    }
}
