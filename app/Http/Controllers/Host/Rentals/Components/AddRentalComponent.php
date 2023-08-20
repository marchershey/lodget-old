<?php

namespace App\Http\Controllers\Host\Rentals\Components;

use App\Models\Rental;
use App\Rules\AlphaNumSpace;
use App\Rules\AlphaSpace;
use Cknow\Money\Money;
use Cknow\Money\Rules\Currency;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Livewire\Redirector;
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

    // Need to have this for the slideover buttons to work
    protected $listeners = ['submit', 'cancel'];


    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:60', new AlphaSpace],
            'summary' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string'],
            'capacity' => ['required', 'integer', 'min:1', 'max:99'],
            'address_street' => ['required', 'string', 'max:46', new AlphaNumSpace],
            'address_city' => ['required', 'string', 'max:35', new AlphaSpace],
            'address_state' => ['required', 'string', 'size:2'],
            'address_zip' => ['required', 'regex:/^[0-9]{5}$/'],
            'base_rate' => ['required', new \Cknow\Money\Rules\Money()],
            'minimum_nights' => ['required', 'integer', 'min:1', 'max:99'],
        ];
    }

    public function render()
    {
        return view('pages.host.rentals.components.add-rental-component');
    }

    /**
     * Initial load of the component. 
     * Any data that is needed when the component is pulled here.
     * @return void
     */
    public function load(): void
    {
        if (app()->isLocal()) {
            $this->fill([
                'name' => 'Ohana Burnside',
                'summary' => 'This is a summary of Ohana Burnside',
                'type' => 'House',
                'capacity' => 12,
                'address_street' => '123 Address Ave',
                'address_city' => 'City Name',
                'address_state' => 'KY',
                'address_zip' => '10001',
                'base_rate' => money(35000)->format(),
                'minimum_nights' => 3,
            ]);
        }
    }

    /**
     * This is functions is called once a property is updated.
     * @param mixed $property
     * @param mixed $value
     * @return void
     */
    public function updated($property, $value): void
    {
        // Only validate a field if the value is not null
        if ($value) {
            $this->validateOnly($property);
        } else {
            // Since the value is null, clear the property's validation
            // $this->resetValidation($property);
            return;
        }
    }

    public function submit(): Redirector|null
    {

        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    toast()->danger('You will need to correct the error(s) below before continuing.', 'Validation Error')->push();
                    toast()->debug($validator->errors()->first())->push();
                }
            });
        })->validate($this->rules());

        try {
            $newRental = new Rental();
            $newRental->name = $this->name;
            $newRental->summary = $this->summary;
            $newRental->type = $this->type;
            $newRental->capacity = $this->capacity;
            $newRental->address_street = $this->address_street;
            $newRental->address_city = $this->address_city;
            $newRental->address_state = $this->address_state;
            $newRental->address_zip = $this->address_zip;
            $newRental->base_rate = Money::USD($this->base_rate, true)->getAmount();
            $newRental->minimum_nights = $this->minimum_nights;
            $newRental->save();
        } catch (\Throwable $t) {
            if (app()->environment() == 'local') {
                toast()->danger($t->getMessage(), 'Error')->push();
            } else {
                toast()->danger('Please refresh the page and try again.', 'Oops! Something went wrong...')->push();
            }
            return null;
        }

        // SEND MAIL

        toast()->success('Your rental has been successfully added!')->pushOnNextPage();

        return redirect()->route('host.rentals.single', $newRental->slug);
    }

    public function cancel(): void
    {
        $this->reset();
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('close-slideover');
    }
}
