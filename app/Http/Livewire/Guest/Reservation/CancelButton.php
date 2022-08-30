<?php

namespace App\Http\Livewire\Guest\Reservation;

use Livewire\Component;

class CancelButton extends Component
{
    public $reservation;

    public function render()
    {
        return view('livewire.guest.reservation.cancel-button');
    }

    public function mount($reservation)
    {
        $this->reservation = $reservation;
    }

    public function cancelReservation()
    {
        $this->reservation->status = 'cancelled';
        $this->reservation->save();

        toast()->success('Your reservation has been cancelled')->pushOnNextPage();

        return redirect()->route('guest.dashboard');
    }
}
