<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Reservation;
use Livewire\Component;

class CheckoutComponent extends Component
{
    // states
    public $loading = true;

    public $user;
    public $reservation;
    public $nights;
    public $base_rate;
    public $tax_rate;
    public $fees;
    public $total;

    // Stripe data
    protected $stripe_customer;
    protected $stripe_intent;
    public $stripe_client_secret;

    public function render()
    {
        return view('livewire.frontend.checkout.checkout-component');
    }

    public function mount($reservation)
    {
        $this->user = auth()->user();
        $this->reservation = $reservation;

        // $this->calcTotal();
    }

    public function pricing()
    {
        $total = "0";

        // base rate
        // here is where you will need to add a variable rate when possible.
        $this->base_rate = $this->reservation->property->default_rate * $this->reservation->nights;
        $total = $total + $this->base_rate;

        // fees
        foreach ($this->reservation->property->fees as $fee) {
            $name = $fee['name'];
            $amount = ($fee['type'] === 'percentage' ? ($fee['amount'] / 100) * $this->base_rate : $fee['amount']);
            $total = $total + $amount;

            $this->fees[] = [
                'name' => $name,
                'amount' => $amount,
            ];
        }

        // tax rate
        $this->tax_rate = ($this->reservation->property->default_tax / 100) * $total;
        $total = $total + $this->tax_rate;

        $this->total = $total;
    }

    public function billing()
    {
        // Create Stripe Customer
        $this->stripe_customer = $this->user->createOrGetStripeCustomer(
            // [
            //     'metadata' => [
            //         // 'birthdate' => $this->user->birthdate,
            //     ]
            // ]
        );

        // Create Setup intent
        $this->stripe_intent = $this->user->createSetupIntent([
            'customer' => $this->stripe_customer->id,
            'payment_method_types' => ['card'],
            // 'capture_method' => 'manual',
            // 'setup_future_usage' => 'off_session',
        ]);

        // Get client secret
        $this->stripe_client_secret = $this->stripe_intent->client_secret;

        // Mount the stripe card element
        $this->dispatchBrowserEvent('setupStripeCardElement');
    }
}
