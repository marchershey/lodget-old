<?php

namespace App\Http\Controllers\Pages\Host;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class Properties extends Controller
{
    /**
     * Return the Host Properties view.
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        $properties = Property::all();

        return view('pages.host.properties', ['properties' => $properties]);
    }

    /**
     * Return the Host Properties Edit view.
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $property = Property::findOrFail($id);

        return view('pages.host.properties-edit', ['property' => $property]);
    }
}
