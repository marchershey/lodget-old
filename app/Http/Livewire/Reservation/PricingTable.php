<?php

namespace App\Http\Livewire\Reservation;

use Livewire\Component;

class PricingTable extends Component
{
    public $reservation;
    public $pricing;

    public function render()
    {
        return view('livewire.reservation.pricing-table');
    }

    public function mount($reservation)
    {
        $this->reservation = $reservation;
    }

    public function load()
    {
        $this->pricing = $this->reservation->pricing();

        // dd($this->pricing);
        # code...
    }
}
