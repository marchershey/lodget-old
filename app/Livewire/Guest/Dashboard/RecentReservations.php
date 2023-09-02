<?php

namespace App\Livewire\Guest\Dashboard;

use App\Models\Reservation;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class RecentReservations extends Component
{
    use WireToast;

    public $reservations = [];
    public $selected_reservation;

    public function render()
    {
        return view('livewire.guest.dashboard.recent-reservations');
    }

    public function load()
    {
        $this->reservations = Reservation::where('user_id', auth()->user()->id)->where('status', '!=', 'cancelled')->get();
    }
}
