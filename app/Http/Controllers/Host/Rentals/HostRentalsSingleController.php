<?php

namespace App\Http\Controllers\Host\Rentals;

use App\Models\Rental;
use Livewire\Component;

class HostRentalsSingleController extends Component
{
    public $rental;

    public function render()
    {
        return view('pages.host.rentals.host-rentals-single');
    }

    public function mount($slug): void
    {
        $this->rental = Rental::find($slug);
    }
}
