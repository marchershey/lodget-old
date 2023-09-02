<?php

namespace App\Livewire\Guest\Reservation;

use Livewire\Component;

class ActionButtons extends Component
{
    public $reservation;

    // Cancelation
    public $cancel_reason;

    public function render()
    {
        return view('livewire.guest.reservation.action-buttons');
    }

    public function mount($reservation)
    {
        $this->reservation = $reservation;
    }

    public function cancelReservation()
    {
        // Update reservation status
        $this->reservation->status = 'canceled';
        $this->reservation->status_by = auth()->user()->id;
        $this->reservation->status_reason = "Canceled by guest.";
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
                    $this->disapt('log', ['message' => $e->getError()]);
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
                toast()->warning('Payment has been captured. Please manually refund the customer')->pushOnNextPage();
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
        return redirect()->route('guest.reservation', $this->reservation->slug);
    }
}
