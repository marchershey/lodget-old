<?php

namespace App\Http\Controllers\Host\Rentals;

use Livewire\Component;

class HostRentalsIndexController extends Component
{
    public $title;

    public function render()
    {
        return view('pages.host.rentals.host-rentals-index');
    }

    function mount(): void
    {
        $this->title = "Loading...";
    }

    function blah(): void
    {
        dd('test');
    }
}
