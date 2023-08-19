<?php

namespace App\Http\Controllers\Host\Rentals\Components;

use App\Models\Rental;
use Livewire\Component;

class RentalsListComponent extends Component
{
    public $rentals;

    public function render()
    {
        return view('pages.host.rentals.components.rentals-list-component');
    }

    public function loadRentalsList(): void
    {
        $this->rentals = Rental::all();
    }
}
