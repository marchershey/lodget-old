<?php

namespace App\Http\Controllers\Host\Rentals\Components;

use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class SinglePhotosComponent extends Component
{
    // use WireToast;

    public function render()
    {
        return view('pages.host.rentals.components.single-photos-component');
    }

    public function load(): void
    {
        toast()->debug('tes')->push();
    }
}
