<?php

namespace App\Http\Livewire\Host\Reservations;

use Illuminate\Validation\Validator;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class ActionButtons extends Component
{
    use WireToast;

    public $reservation;

    // Cancelation
    public $cancel_reason;

    public function render()
    {
        return view('livewire.host.reservations.action-buttons');
    }

    public function mount($reservation)
    {
        $this->reservation = $reservation;
    }

    public function approveReservation()
    {
        // Payment
        // Set the payment
        $payment = $this->reservation->payment;

        // Is there a payment?
        if ($payment && $payment->status == "hold") {

            // Capture the payment
            try {
                \Stripe\Stripe::setApiKey(config('stripe.secret'));
                $intent = \Stripe\PaymentIntent::retrieve($payment->stripe_payment_id);
                $intent->capture(['amount_to_capture' => $payment->total]);
            } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {
                if ($e->payment->requiresPaymentMethod()) {
                    toast()->danger('User doesn\'t have payment method...')->push();
                    return;
                } elseif ($e->payment->requiresConfirmation()) {
                    toast()->danger('Requires Authentication')->push();
                    return;
                }
            } catch (\Stripe\Exception\CardException $e) {
                // Since it's a decline, \Stripe\Exception\CardException will be caught
                $this->dispatch('log', ['message' => $e->getError()]);
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

            // Update the payment status
            $payment->status = 'captured';
            $payment->save();
        }

        // set status to approved
        $this->reservation->status = 'approved';
        $this->reservation->status_by = auth()->user()->id;
        $this->reservation->save();

        // Redirect
        return redirect()->route('host.reservation', $this->reservation->slug);
    }

    public function cancelReservation()
    {
        $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    toast()->danger('Please fix the error(s) below.', 'Validation Error')->push();
                }
            });
        })->validate([
            'cancel_reason' => ['max:255']
        ], [
            'cancel_reason.max' => 'Reason must be less than 255 characters.',
        ]);

        // Update reservation status
        $this->reservation->status = 'canceled';
        $this->reservation->status_by = auth()->user()->id;
        $this->reservation->status_reason = $this->cancel_reason;
        $this->reservation->save();

        // Cancel / Release the funds back to the customer
        // Does the reservation have a payment?
        if ($this->reservation->payment) {
            $payment = $this->reservation->payment;

            // what is the status of the payment?
            $status = $payment->status;

            // if the payment is on hold, reverse it
            if ($status == 'hold') {
                try {
                    $stripe = new \Stripe\StripeClient(config('stripe.secret'));
                    $stripe->paymentIntents->cancel(
                        $this->reservation->payment->stripe_payment_id,
                        []
                    );
                } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {
                    if ($e->payment->requiresPaymentMethod()) {
                        toast()->danger('User doesn\'t have payment method...')->push();
                        return;
                    } elseif ($e->payment->requiresConfirmation()) {
                        toast()->danger('Requires Authentication')->push();
                        return;
                    }
                } catch (\Stripe\Exception\CardException $e) {
                    // Since it's a decline, \Stripe\Exception\CardException will be caught
                    $this->dispatch('log', ['message' => $e->getError()]);
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
            }

            // If the payment is captured, let's deal with that later.
            if ($status == 'captured') {
                try {
                    $stripe = new \Stripe\StripeClient(config('stripe.secret'));

                    $stripe->refunds->create([
                        'payment_intent' => $this->reservation->payment->stripe_payment_id
                    ]);
                } catch (\Laravel\Cashier\Exceptions\IncompletePayment $e) {
                    if ($e->payment->requiresPaymentMethod()) {
                        toast()->danger('User doesn\'t have payment method...')->push();
                        return;
                    } elseif ($e->payment->requiresConfirmation()) {
                        toast()->danger('Requires Authentication')->push();
                        return;
                    }
                } catch (\Stripe\Exception\CardException $e) {
                    // Since it's a decline, \Stripe\Exception\CardException will be caught
                    $this->dispatch('log', ['message' => $e->getError()]);
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
            }

            // Update the payment satus
            $payment = $this->reservation->payment;
            $payment->status = 'returned';
            $payment->save();
        }

        // Send emails to Host/Guest

        // Notification
        toast()->success('Reservation was successfully canceled')->pushOnNextPage();

        // Redirect
        return redirect()->route('host.reservations');
    }

    public function reject()
    {
        // 
    }
}
