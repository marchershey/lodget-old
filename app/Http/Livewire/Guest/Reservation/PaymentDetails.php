<?php

namespace App\Http\Livewire\Guest\Reservation;

use Livewire\Component;

class PaymentDetails extends Component
{
    public $reservation;
    public $payment;
    public $fees;
    public $total;

    public function render()
    {
        return view('livewire.guest.reservation.payment-details');
    }

    public function mount($reservation)
    {
        $this->reservation = $reservation;
    }

    public function load()
    {
        // load data
        $this->payment = $this->reservation->payment;
        $this->payment_method = auth()->user()->findPaymentMethod($this->payment->stripe_payment_id);
        $this->fees = $this->payment->fees->toArray();

        $this->total = $this->payment->amount;
    }

    public function loadPayment()
    {
        $this->transaction = $this->reservation->transaction;
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
}
