<?php

namespace App\Http\Livewire\Host\Reservations;

use App\Models\Reservation;
use Livewire\Component;

class ReservationsList extends Component
{
    public $reservations;

    public function render()
    {
        return view('livewire.host.reservations.reservations-list');
    }

    public function load()
    {
        $this->reservations = Reservation::all();
    }
}
