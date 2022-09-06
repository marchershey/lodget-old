<?php

namespace App\Http\Controllers\Pages\Host;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public $reservation;

    public function view(Reservation $reservation)
    {
        return view('pages.host.reservation', ['reservation' => $reservation]);
    }
}
