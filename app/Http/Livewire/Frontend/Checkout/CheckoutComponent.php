<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Helpers\Currency;
use App\Models\Payment;
use App\Models\PaymentFee;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;
use Usernotnull\Toast\Concerns\WireToast;

class CheckoutComponent extends Component
{
    use WireToast;

    // pricing details
    public $base_rate;
    public $tax_rate;
    public $fees;
    public $total;

    // new payment method
    public $first_name;
    public $last_name;
    public $email;
    public $address;
    public $unit;
    public $city;
    public $state;
    public $zip;
    public $ip;
    public $setDefaultPaymentMethod;

    // payment methods
    public $payment_methods = [];
    public $default_payment_method;

    // stripe
    public $stripe_client_secret;

    public $agree;

    protected $rules = [
        'address' => 'required|max:100',
        'unit' => 'nullable|max:10',
        'city' => 'required|max:100',
        'state' => 'required|max:2',
        'zip' => 'required|numeric',
    ];

    public function render()
    {
        return view('livewire.frontend.checkout.checkout-component');
    }

    public function mount($reservation)
    {
        $this->user = auth()->user();
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->reservation = $reservation;

        // assign this reservation to the guest
        if (!$this->reservation->user_id) {
            $this->reservation->user_id = $this->user->id;
            $this->reservation->save();
        }
    }

    public function hydrate()
    {
        if (Payment::where('reservation_id', $this->reservation->id)->exists()) {
            return redirect('/dashboard');
        }
    }

    public function updated($propertyName, $propertyValue)
    {
        $this->resetValidation($propertyName);

        if ($propertyValue) {
            $this->withValidator(function (Validator $validator) {
                $validator->after(function ($validator) {
                    if (count($validator->errors()) > 0) {
                        $error = $validator->errors()->first();
                        toast()->danger($error, 'Error')->push();
                    }
                });
            })->validateOnly($propertyName);
        }
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
    }

    // Payment Methods
    public function initPaymentMethods()
    {
        $this->user->updateDefaultPaymentMethodFromStripe();

        if ($this->user->hasDefaultPaymentMethod() && $this->user->defaultPaymentMethod()) {
            $this->default_payment_method = $this->user->defaultPaymentMethod()->toArray();
        }

        if ($this->default_payment_method) {
            $this->selected_payment_method = $this->default_payment_method;
        }
    }

    public function validateBillingDetails()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                $count = count($validator->errors());
                if ($count > 0) {
                    $error = $validator->errors()->first();
                    toast()->danger($error . ($count > 1 ? ' and ' . $count - 1 . ' more ' . Str::plural('error', $count - 1) . ' to fix.' : ''), 'Error')->push();
                }
            });
        })->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'unit' => 'nullable',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required'
        ]);

        return true;
    }

    public function loadPaymentMethods()
    {
        unset($this->payment_methods);

        if ($this->user->hasPaymentMethod()) {
            $this->payment_methods = $this->user->paymentMethods()->sortBy('created')->toArray();
        }
    }

    public function clearPaymentMethods()
    {
        unset($this->payment_methods);
    }

    public function addedNewPaymentMethod($payment_method_id)
    {
        // check if guest wants to update default payment method
        if ($this->setDefaultPaymentMethod) {
            $this->updateDefaultPaymentMethod($payment_method_id);
        }

        $this->user->address = $this->address;
        $this->user->unit = $this->unit;
        $this->user->city = $this->city;
        $this->user->state = $this->state;
        $this->user->zip = $this->zip;
        $this->user->save();

        // submit to stripe

    }

    public function deletePaymentMethod($payment_method_id)
    {

        $payment_method = $this->user->findPaymentMethod($payment_method_id);
        $payment_method->delete();

        $this->loadPaymentMethods();

        if (isset($this->payment_methods)) {
            if ($this->default_payment_method['id'] == $payment_method_id) {
                if (count($this->payment_methods) > 0) {
                    $this->updateDefaultPaymentMethod($this->payment_methods[0]['id']);
                } else {
                    unset($this->default_payment_method);
                    $this->dispatchBrowserEvent('close');
                }
            }
        } else {
            unset($this->default_payment_method);
            $this->dispatchBrowserEvent('close');
        }
    }

    public function updateDefaultPaymentMethod($payment_method_id)
    {
        $this->user->updateDefaultPaymentMethod($payment_method_id);
        $this->default_payment_method = $this->user->defaultPaymentMethod()->toArray();
    }

    public function initNewPaymentMethod()
    {
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->address = $this->user->address;
        $this->unit = $this->user->unit;
        $this->city = $this->user->city;
        $this->state = $this->user->state;
        $this->zip = $this->user->zip;

        $this->setDefaultPaymentMethod = true;

        // Create Setup intent & get client secret
        $this->stripe_client_secret = $this->user->createSetupIntent([
            'customer' => $this->user->stripe_id,
            'payment_method_types' => ['card'],
        ])->client_secret;
    }

    // handles the error thrown by stripe
    public function handleErrors($error)
    {
        $this->resetValidation();

        $this->addError($error['code'], $error['message']);
        toast()->danger($error['message'], 'Error')->push();
    }

    public function finalize()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                $count = count($validator->errors());
                if ($count > 0) {
                    $error = $validator->errors()->first();
                    toast()->danger($error . ($count > 1 ? ' and ' . $count - 1 . ' more ' . Str::plural('error', $count - 1) . ' to fix.' : ''), 'Error')->push();
                }
            });
        })->validate([
            'agree' => 'required',
        ], [
            'agree.required' => 'Please confirm the agreement.',
        ]);


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


        // Create payment hold
        try {
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $payment_intent = $stripe->paymentIntents->create([
                'customer' => $this->default_payment_method['customer'],
                'payment_method' => $this->default_payment_method['id'],
                'amount' => Currency::toPennies($this->total),
                'currency' => 'usd',
                'off_session' => true,
                'confirm' => true,
                'description' => $this->reservation->property->name . ' -- ' . $this->reservation->checkin . '/' . $this->reservation->checkout,
                'statement_descriptor_suffix' => Str::upper(Str::limit($this->reservation->property->name, 22, '')),
                'statement_descriptor' => strtoupper(Str::limit(config('app.name') . '-' . $this->reservation->property->city . '-' . $this->reservation->property->state, 22, '')),

                'payment_method_options' => [
                    'card' => [
                        'capture_method' => 'manual',
                    ],
                ],

                'metadata' => [
                    'reservation_id' => $this->reservation->id,
                ],
            ], [
                'idempotency_key' => $this->reservation->slug,
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
            toast()->danger('There was an error. Please go back and try again. (2)')->push();
            return;
        } catch (\Exception $e) {
            // Something else happened, completely unrelated to Stripe
            toast()->danger('There was an error. Please go back and try again.')->push();
            return;
        }

        if (Payment::where('stripe_payment_id', $payment_intent->id)->exists()) {
            return redirect('/dashobard');
        }

        // Create a new payment
        $payment = new Payment();
        $payment->reservation_id = $this->reservation->id;
        $payment->user_id = $this->user->id;
        $payment->stripe_payment_id = $payment_intent->id;
        $payment->amount = Currency::toPennies($this->total);
        $payment->save();

        // Attach fees to payment
        if ($this->fees) {
            foreach ($this->fees as $fee) {
                $payment_fee = new PaymentFee();
                $payment_fee->payment_id = $payment->id;
                $payment_fee->name = $fee['name'];
                $payment_fee->amount = Currency::toPennies($fee['amount']);
                $payment_fee->save();
            }
        }


        // // Update Reservation
        // $this->reservation->status = 'pending';
        // $this->reservation->payment_id = $payment->id;
        // $this->reservation->save();

        // Send Reservation Created Email to guest
        // Mail::to($this->user->email)->queue(new \App\Mail\Guests\Reservations\ReservationCreatedEmail($this->reservation));

        return redirect()->route('guest.reservation', [$this->reservation->slug]);
    }
}
