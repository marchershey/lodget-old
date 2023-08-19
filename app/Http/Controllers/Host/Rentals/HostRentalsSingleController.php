<?php

namespace App\Http\Controllers\Host\Rentals;

use App\Models\Rental;
use Livewire\Component;

class HostRentalsSingleController extends Component
{
    public $slug;
    public $rental;

    public function render()
    {
        return view('pages.host.rentals.host-rentals-single');
    }

    public function mount($slug): void
    {
        $this->slug = $slug;
    }

    public function load(): void
    {
        $this->rental = Rental::where('slug', $this->slug)->first();
    }
}
