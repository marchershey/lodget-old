<?php

namespace App\Http\Controllers\Host\Rentals\Components;

use App\Models\Rental;
use Livewire\Component;

class SingleOverviewComponent extends Component
{
    public $rental;

    public function render()
    {
        return view('pages.host.rentals.components.single-overview-component');
    }

    public function mount(Rental $rental): void
    {
        $this->rental = $rental;
    }
}
