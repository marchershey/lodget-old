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
        $properties = Property::where('active', true)->take(2)->get();
        return view('pages.frontend.index', ['properties' => $properties]);
    }
}
