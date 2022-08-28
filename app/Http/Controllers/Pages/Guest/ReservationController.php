<?php

namespace App\Http\Controllers\Pages\Guest;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Return the User Profile view.
     *
     * @return \Illuminate\View\View
     */
    public function view(Reservation $reservation)
    {
        return view('pages.guest.reservation', ['reservation' => $reservation]);
    }
}
