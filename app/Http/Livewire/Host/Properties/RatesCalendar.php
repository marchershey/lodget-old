<?php

namespace App\Http\Livewire\Host\Properties;

use Livewire\Component;

class RatesCalendar extends Component
{
    public $property;

    public function render()
    {
        return view('livewire.host.properties.rates-calendar');
    }

    public function mount($property)
    {
        $this->property = $property;
    }
}
