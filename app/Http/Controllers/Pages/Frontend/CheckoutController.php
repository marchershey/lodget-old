<?php

namespace App\Http\Controllers\Pages\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Reservation;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Return the Landing Page view.
     *
     * @return \Illuminate\View\View
     */
    public function view(Reservation $reservation)
    {
        return view('pages.frontend.checkout', ['reservation' => $reservation]);
    }
}
