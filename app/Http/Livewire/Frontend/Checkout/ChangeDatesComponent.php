<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Reservation;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Arr;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class ChangeDatesComponent extends Component
{
    use WireToast;

    // states
    public $showButton = false;
    public $datesSelected = false;

    // properties
    public $reservation;
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
        return view('livewire.frontend.checkout.change-dates-component');
    }

    public function mount($reservation)
    {
        $this->reservation = $reservation;
        $this->property = $reservation->property;
    }

    public function load()
    {
        $this->guests = $this->reservation->guests;

        $reservations = Reservation::where('property_id', $this->property->id)
            ->where('status', 'pending')
            ->orWhere('status', 'approved')
            ->orWhere('status', 'active')
            ->orWhere('status', 'completed')
            ->get(['checkin', 'checkout'])->toArray();

        $checkins = [];
        $checkouts = [];
        $disabled = [];

        foreach ($reservations as $reservation) {
            $checkins[] = $reservation['checkin'];
            $checkouts[] = $reservation['checkout'];

            // $range = CarbonPeriod::create(Carbon::parse($reservation['checkin'])->addDay(), Carbon::parse($reservation['checkout'])->subDay());
            $range = CarbonPeriod::create(Carbon::parse($reservation['checkin'])->addDay(), Carbon::parse($reservation['checkout'])->subDay());

            foreach ($range as $date) {
                $disabled[] = $date->format('Y-m-d');
            }
        }

        // sometimes two reservations will go back to back, which our calendar doesn't like. 
        // We need to get the dates in checkin/checkout that are the same, and add it to the disabled range.
        $matches = Arr::flatten(array_intersect($checkins, $checkouts));

        foreach ($matches as $match) {
            toast()->debug($match)->push();
            if (($key = array_search($match, $checkins)) !== false) {
                unset($checkins[$key]);
            }
            if (($key = array_search($match, $checkouts)) !== false) {
                unset($checkouts[$key]);
            }
        }

        $this->dispatch('calendar-init', ['checkins' => Arr::flatten($checkins), 'checkouts' => Arr::flatten($checkouts), 'disabled' => Arr::flatten($disabled), 'checkin' => $this->reservation->checkin, 'checkout' => $this->reservation->checkout]);
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

    public function updateReservation()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    $error = $validator->errors()->first();
                    toast()->danger($error, 'Error')->push();
                }
            });
        })->validate();

        $reservation = $this->reservation;
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
