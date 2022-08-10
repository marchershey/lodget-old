<?php

namespace App\Http\Livewire\Frontend\Property;

use App\Models\Property;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;
use App\Models\Reservation;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Str;

class ReservationComponent extends Component
{
    use WireToast;

    // states
    public $showButton = false;
    public $datesSelected = false;

    // properties
    public $property;
    public $dates;
    public $checkin;
    public $checkout;
    public $nights;
    public $guests = 0;

    protected $rules = [
        'checkin' => 'required|date|before:checkout',
        'checkout' => 'required|date|after:checkin',
        'guests' => 'required|numeric|min:1|max:16',
    ];

    public function render()
    {
        return view('livewire.frontend.property.reservation-component');
    }

    public function mount(Property $property)
    {
        $this->property = $property;
    }

    public function load()
    {
        $this->showModal = true;

        // get reserved dates
        $reservations = Reservation::where('property_id', $this->property->id)->where('approved', true)->get(['checkin', 'checkout'])->toArray();

        $checkins = [];
        $checkouts = [];
        $disabled = [];

        foreach ($reservations as $reservation) {
            $checkins[] = $reservation['checkin'];
            $checkouts[] = $reservation['checkout'];

            // $range = CarbonPeriod::create(Carbon::parse($reservation['checkin'])->addDay(), Carbon::parse($reservation['checkout'])->subDay());
            $range = CarbonPeriod::create($reservation['checkin'], Carbon::parse($reservation['checkout'])->subDay());

            foreach ($range as $date) {
                $disabled[] = $date->format('Y-m-d');
            }
        }

        $this->dispatchBrowserEvent('calendar-init', ['checkins' => $checkins, 'checkouts' => $checkouts, 'disabled' => $disabled]);

        $this->showButton = true;
    }

    public function updated($field, $value)
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    $error = $validator->errors()->first();
                    toast()->danger($error, 'Error')->push();
                }
            });
        })->validateOnly($field);
    }

    public function updateDates($selectedDates)
    {
        if (!empty($selectedDates)) {
            $this->dates = explode(" - ", $selectedDates);
            $this->checkin = $this->dates[0];
            $this->checkout = $this->dates[1];
        } else {
            $this->datesSelected = false;
        }
    }

    public function checkout()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    $error = $validator->errors()->first();
                    toast()->danger($error, 'Error')->push();
                }
            });
        })->validate();

        $reservation = new Reservation();
        $reservation->slug = \App\Helpers\ReservationSlugHelper::generate();
        $reservation->property_id = $this->property->id;
        $reservation->checkin = $this->checkin;
        $reservation->checkout = $this->checkout;
        $reservation->nights = Carbon::parse($this->checkin)->diffInDays($this->checkout);
        $reservation->guests = $this->guests;

        if ($reservation->save()) {
            return redirect()->route('frontend.checkout', ['reservation' => $reservation->slug]);
        } else {
            toast()->danger('Please refresh the page and try again.', 'Server Error')->push();
        }
    }
}
