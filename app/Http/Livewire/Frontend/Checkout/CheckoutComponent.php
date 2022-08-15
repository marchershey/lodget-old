<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Helpers\Currency;
use Laravel\Cashier\Cashier;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;
use Stripe\SetupIntent;
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
    public $address;
    public $unit;
    public $city;
    public $state;
    public $zip;
    public $setDefaultPaymentMethod = true;

    // payment methods
    public $payment_methods = [];
    public $default_payment_method;
    // stripe
    public $stripe_client_secret;

    public $test;

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
        $this->reservation = $reservation;
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

    public function initPaymentMethods()
    {
        // does guest have any payment methods?
        if ($this->user->hasPaymentMethod()) {
            // get all payment methods
            $this->payment_methods = $this->user->paymentMethods()->toArray();
            // does guest have a default payment method (most likely)
            if ($this->user->hasDefaultPaymentMethod()) {
                $this->default_payment_method = $this->user->defaultPaymentMethod()->toArray();
            }
        } else {
            toast()->debug('does not have default payment method')->push();
        }
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

        // Create Setup intent & get client secret
        $this->stripe_client_secret = $this->user->createSetupIntent([
            'customer' => $this->user->stripe_id,
            'payment_method_types' => ['card'],
            // 'capture_method' => 'manual',
            // 'setup_future_usage' => 'off_session',
        ])->client_secret;

        // Mount the stripe card element
        $this->dispatchBrowserEvent('initStripeCardElement');
    }

    public function addNewPaymentMethod($setupIntent)
    {
        toast()->debug($setupIntent)->push();

        if ($this->setDefaultPaymentMethod) {
            $this->user->updateDefaultPaymentMethod($setupIntent['payment_method']);
        }
        # code...
    }

    public function updateDefaultPaymentMethod($paymentMethodId)
    {
        $this->user->updateDefaultPaymentMethod($paymentMethodId);
        $this->default_payment_method = $this->user->defaultPaymentMethod()->toArray();
    }

    public function validateBillingDetails()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                $count = count($validator->errors());
                if ($count > 0) {
                    $error = $validator->errors()->first();
                    toast()->danger($error . ($count > 1 ? ' and ' . $count . ' more errors to fix.' : $count), 'Error')->push();
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































    // public function validateUserData()
    // {
    //     $this->withValidator(function (Validator $validator) {
    //         $validator->after(function ($validator) {
    //             $count = count($validator->errors());
    //             if ($count > 0) {
    //                 $error = $validator->errors()->first();
    //                 toast()->danger($error . ($count > 1 ? ' and ' . $count . ' more errors to fix.' : $count), 'Error')->push();
    //             }
    //         });
    //     })->validate();
    //     return true;
    // }

    // // handles the error thrown by stripe
    // public function handleErrors($error)
    // {
    //     $this->resetValidation();

    //     $this->addError($error['code'], $error['message']);
    //     toast()->danger($error['message'], 'Error')->push();
    // }

    // public function finalize($setupIntent)
    // {
    //     // Save user data
    //     $this->user->address = $this->address;
    //     $this->user->unit = $this->unit;
    //     $this->user->city = $this->city;
    //     $this->user->state = $this->state;
    //     $this->user->zip = $this->zip;
    //     $this->user->save();

    //     // Update User's Stripe data
    //     $this->user->updateStripeCustomer([
    //         'address' => [
    //             'city' => $this->city,
    //             'country' => 'US',
    //             'line1' => $this->address,
    //             'line2' => $this->unit,
    //             'postal_code' => $this->zip,
    //             'state' => $this->state,
    //         ]
    //     ]);

    //     // Update user's default payment method
    //     $this->user->updateDefaultPaymentMethod($setupIntent['payment_method']);

    //     // // Create payment hold
    //     // try {
    //     //     $paymentIntent = $this->user->charge(Currency::toPennies($this->pricing_total), $this->user->defaultPaymentMethod()->id, [
    //     //         'off_session' => true,
    //     //         'confirm' => true,

    //     //         'statement_descriptor' => Str::limit($this->property->name . ' ' . $this->property->address_city . ' ' . $this->property->address_state, 22, ''),
    //     //         'description' => 'RES#' . $this->reservation->id,
    //     //         // 'statement_descriptor_suffix' => 'defg',
    //     //         'payment_method_options' => [
    //     //             'card' => [
    //     //                 'capture_method' => 'manual',
    //     //             ],
    //     //         ],
    //     //     ]);
    //     // } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {
    //     //     if ($e->payment->requiresPaymentMethod()) {
    //     //         // ...
    //     //         toast()->danger('User doesn\'t have payment method...')->push();
    //     //         return;
    //     //     } elseif ($e->payment->requiresConfirmation()) {
    //     //         // ...
    //     //         toast()->danger('Requires Authentication')->push();
    //     //         return;
    //     //     }
    //     // } catch (\Stripe\Exception\CardException $e) {
    //     //     // Since it's a decline, \Stripe\Exception\CardException will be caught
    //     //     toast()->danger($e->getError()->message)->push();
    //     //     return;
    //     // } catch (\Stripe\Exception\RateLimitException $e) {
    //     //     // Too many requests made to the API too quickly
    //     //     toast()->danger($e->getError()->message)->push();
    //     //     return;
    //     // } catch (\Stripe\Exception\InvalidRequestException $e) {
    //     //     // Invalid parameters were supplied to Stripe's API
    //     //     toast()->danger($e->getError()->message)->push();
    //     //     return;
    //     // } catch (\Stripe\Exception\AuthenticationException $e) {
    //     //     // Authentication with Stripe's API failed
    //     //     // (maybe you changed API keys recently)
    //     //     toast()->danger($e->getError()->message)->push();
    //     //     return;
    //     // } catch (\Stripe\Exception\ApiConnectionException $e) {
    //     //     // Network communication with Stripe failed
    //     //     toast()->danger($e->getError()->message)->push();
    //     //     return;
    //     // } catch (\Stripe\Exception\ApiErrorException $e) {
    //     //     // Display a very generic error to the user, and maybe send
    //     //     // yourself an email
    //     //     toast()->danger($e->getError()->message)->push();
    //     //     return;
    //     // } catch (\Exception $e) {
    //     //     // Something else happened, completely unrelated to Stripe
    //     //     toast()->danger($e->getMessage())->push();
    //     //     return;
    //     // }

    //     // Create a payment
    //     // $payment = new Payment();
    //     // $payment->reservation_id = $this->reservation->id;
    //     // $payment->user_id = $this->user->id;
    //     // $payment->status = 'pending';
    //     // $payment->payment_intent = $paymentIntent->id;
    //     // $payment->base_price = $this->pricing_base;
    //     // $payment->fees = $this->pricing_fees;
    //     // $payment->tax_price = $this->pricing_tax;
    //     // $payment->total_cents = Currency::toPennies($this->pricing_total);
    //     // $payment->save();


    //     // Update Reservation's status
    //     // $this->reservation->status = 'pending';
    //     // $this->reservation->payment_id = $payment->id;
    //     // $this->reservation->save();

    //     // Send Reservation Created Email to guest
    //     // Mail::to($this->user->email)->queue(new \App\Mail\Guests\Reservations\ReservationCreatedEmail($this->reservation));

    //     toast()->success('done')->push();

    //     // return redirect('/success/' . $this->reservation->slug);
    // }

    // public function updatedSelectedPaymentMethod($value)
    // {
    //     toast()->debug($value)->push();
    // }

    // public function test()
    // {
    //     toast()->debug($this->selected_payment_method)->push();
    // }
}
