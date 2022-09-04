<?php

namespace App\Http\Livewire\Host\Properties;

use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class RatesCalendar extends Component
{
    use WireToast;

    public $property;
    public $startDate;
    public $endDate;

    public function render()
    {
        return view('livewire.host.properties.rates-calendar');
    }

    public function mount($property)
    {
        $this->property = $property;
    }

    public function test()
    {
        //
    }
}
