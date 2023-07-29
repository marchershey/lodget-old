<?php

namespace App\Http\Controllers\Pages\Host;

use Livewire\Component;

class HostRentalsController extends Component
{
    public $title;

    public function render()
    {
        return view('pages.host.host-rental');
    }

    function mount(): void
    {
        $this->title = "Loading...";
    }
}
