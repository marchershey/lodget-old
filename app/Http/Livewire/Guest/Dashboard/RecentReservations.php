<?php

namespace App\Http\Livewire\Guest\Dashboard;

use App\Models\Reservation;
use Livewire\Component;

class RecentReservations extends Component
{
    public $reservations;
    public $selected_reservation;

    public function render()
    {
        return view('livewire.guest.dashboard.recent-reservations');
    }

    public function load()
    {
        $this->reservations = Reservation::where('user_id', auth()->user()->id)->get();
        // sleep(2);
    }

    public function selectedReservation($reservation_id)
    {
        //
    }
}
