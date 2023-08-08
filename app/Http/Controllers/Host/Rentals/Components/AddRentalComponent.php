<?php

namespace App\Http\Controllers\Host\Rentals\Components;

use Livewire\Component;

class AddRentalComponent extends Component
{
    public $name;
    public $address_street;
    public $address_city;
    public $address_state;
    public $address_zip;

    public function render()
    {
        return view('pages.host.rentals.components.add-rental-component');
    }
}
