<?php

namespace App\Http\Livewire\Host\Properties;

use App\Models\PropertyRate;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class RatesCalendar extends Component
{
    use WireToast;

    public $property;
    public $start_date;
    public $end_date;
    public $new_rate;
    public $events;

    public function render()
    {
        return view('livewire.host.properties.rates-calendar');
    }

    public function mount($property)
    {
        $this->property = $property;
    }

    public function getRate($date)
    {
        $rate = PropertyRate::where('date', Carbon::parse($date)->format('Y-m-d'))->first();

        if ($rate) {
            return number_format(substr($rate->amount, 0, -2));
        } else {
            return number_format(substr($this->property->default_rate, 0, -2));
        }
    }

    public function hasRateChange($date)
    {
        $date = Carbon::parse($date)->format('Y-m-d');

        if (PropertyRate::where('date', $date)->exists()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateRate()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                $error = $validator->errors()->first();
                if ($error) toast()->danger($error)->push();
            });
        })->validate([
            'new_rate' => 'integer|nullable',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $dateRange = Carbon::parse($this->start_date)->toPeriod($this->end_date);

        // format dates
        foreach ($dateRange as $key => $date) {
            // formatting
            $date = Carbon::parse($date)->format('Y-m-d');

            // if there is an existing rate for this date, delete it
            $existingRate = PropertyRate::where('date', $date)->first();
            if ($existingRate) {
                $existingRate->delete();
            }

            // save the new rate only if new_rate is set
            if ($this->new_rate && money($this->new_rate, 'USD', true)->getAmount() != $this->property->default_rate) {
                $propertyRate = new PropertyRate();
                $propertyRate->property_id = $this->property->id;
                $propertyRate->date = $date;
                $propertyRate->amount = money($this->new_rate, 'USD', true)->getAmount();
                $propertyRate->save();
            }
        }

        // update calendar
        $this->dispatchBrowserEvent('update');

        toast()->success('The new rates have been successfully saved!')->push();
    }
}
