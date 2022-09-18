<?php

namespace App\Http\Livewire\Host\Reservations;

use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class ActionButtons extends Component
{
    use WireToast;

    public $reservation;

    public function render()
    {
        return view('livewire.host.reservations.action-buttons');
    }

    public function mount($reservation)
    {
        $this->reservation = $reservation;
    }

    public function approve()
    {
        // charge the card on file
        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $intent = \Stripe\PaymentIntent::retrieve($this->reservation->payment->stripe_payment_id);
            $intent->capture(['amount_to_capture' => $this->reservation->payment->total]);

            // $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            // $intent = $stripe->paymentIntents->create([
            //     'payment_method' => 'pm_card_authenticationRequiredOnSetup',
            //     'amount' => 500,
            //     'currency' => 'usd',
            //     'off_session' => true,
            //     'confirm' => true,
            //     'payment_method_options' => [
            //         'card' => [
            //             'capture_method' => 'manual',
            //         ],
            //     ],
            // ]);
            // $intent->capture(['amount_to_capture' => 500]);
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
            $this->dispatchBrowserEvent('log', ['message' => $e->getError()]);
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

        dd($intent);

        // set status to approved


        // email host
        // email guest

    }

    public function reject()
    {
        // 
    }
}
