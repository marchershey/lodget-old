<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Helpers\Currency;
use Laravel\Cashier\Cashier;
use Livewire\Component;
use Illuminate\Support\Str;

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
    protected $stripe;
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
    }

    public function calcPricing()
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

        // set the total 
        $this->total = number_format($total, 2);
        $this->dispatchBrowserEvent('log', 'Total: ' . $this->base_rate);
    }

    public function setupBilling()
    {
        // Create Stripe Customer
        $this->stripe_customer = $this->user->asStripeCustomer();

        // // Create Setup intent
        // $this->stripe_intent = $this->user->createSetupIntent([
        //     'customer' => $this->stripe_customer->id,
        //     'payment_method_types' => ['card'],
        //     // 'capture_method' => 'manual',
        //     // 'setup_future_usage' => 'off_session',
        // ]);

        // // Get client secret
        // $this->stripe_client_secret = $this->stripe_intent->client_secret;

        // Mount the stripe card element
        $this->dispatchBrowserEvent('setupStripeCardElement');
    }

    public function finalize($setupIntent)
    {
        // Save user data
        $this->user->address = $this->address;
        $this->user->unit = $this->unit;
        $this->user->city = $this->city;
        $this->user->state = $this->state;
        $this->user->zip = $this->zip;
        $this->user->save();

        // Update User's Stripe data
        $this->user->updateStripeCustomer([
            'address' => [
                'city' => $this->city,
                'country' => 'US',
                'line1' => $this->address,
                'line2' => $this->unit,
                'postal_code' => $this->zip,
                'state' => $this->state,
            ]
        ]);

        // Update user's default payment method
        $this->user->updateDefaultPaymentMethod($setupIntent['payment_method']);

        // Create payment hold
        try {
            $paymentIntent = $this->user->charge(Currency::toPennies($this->pricing_total), $this->user->defaultPaymentMethod()->id, [
                'off_session' => true,
                'confirm' => true,

                'statement_descriptor' => Str::limit($this->property->name . ' ' . $this->property->address_city . ' ' . $this->property->address_state, 22, ''),
                'description' => 'RES#' . $this->reservation->id,
                // 'statement_descriptor_suffix' => 'defg',
                'payment_method_options' => [
                    'card' => [
                        'capture_method' => 'manual',
                    ],
                ],
            ]);
        } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {
            if ($e->payment->requiresPaymentMethod()) {
                // ...
                toast()->danger('User doesn\'t have payment method...')->push();
                return;
            } elseif ($e->payment->requiresConfirmation()) {
                // ...
                toast()->danger('Requires Authentication')->push();
                return;
            }
        } catch (\Stripe\Exception\CardException $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            toast()->danger($e->getError()->message)->push();
            return;
        } catch (\Stripe\Exception\RateLimitException $e) {
            // Too many requests made to the API too quickly
            toast()->danger($e->getError()->message)->push();
            return;
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // Invalid parameters were supplied to Stripe's API
            toast()->danger($e->getError()->message)->push();
            return;
        } catch (\Stripe\Exception\AuthenticationException $e) {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
            toast()->danger($e->getError()->message)->push();
            return;
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            // Network communication with Stripe failed
            toast()->danger($e->getError()->message)->push();
            return;
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Display a very generic error to the user, and maybe send
            // yourself an email
            toast()->danger($e->getError()->message)->push();
            return;
        } catch (\Exception $e) {
            // Something else happened, completely unrelated to Stripe
            toast()->danger($e->getMessage())->push();
            return;
        }

        // Create a payment
        $payment = new Payment();
        $payment->reservation_id = $this->reservation->id;
        $payment->user_id = $this->user->id;
        $payment->status = 'pending';
        $payment->payment_intent = $paymentIntent->id;
        $payment->base_price = $this->pricing_base;
        $payment->fees = $this->pricing_fees;
        $payment->tax_price = $this->pricing_tax;
        $payment->total_cents = Currency::toPennies($this->pricing_total);
        $payment->save();


        // Update Reservation's status
        $this->reservation->status = 'pending';
        $this->reservation->payment_id = $payment->id;
        $this->reservation->save();

        // Send Reservation Created Email to guest
        Mail::to($this->user->email)->queue(new \App\Mail\Guests\Reservations\ReservationCreatedEmail($this->reservation));


        return redirect('/success/' . $this->reservation->slug);
    }
}
