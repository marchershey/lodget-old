<?php

namespace App\Http\Controllers\Host\Rentals\Components;

use Cknow\Money\Money;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class AddRentalComponent extends Component
{
    use WireToast;
    // Overview
    public $name;
    public $summary;
    public $type;
    public $capacity = 0;

    // Location
    public $address_street;
    public $address_city;
    public $address_state;
    public $address_zip;

    // Rates
    public $base_rate = 0;
    public $minimum_nights = 0;

    public function render()
    {
        return view('pages.host.rentals.components.add-rental-component');
    }

    function load(): void
    {
        $this->base_rate = money(35000)->format();
    }

    function submit(): void
    {
        sleep(2);
        toast()->debug('done')->push();
    }

    function cancel(): void
    {
        $this->reset();
        $this->dispatchBrowserEvent('close-slideover');
    }
}
