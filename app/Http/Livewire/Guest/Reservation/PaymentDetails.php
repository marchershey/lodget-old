<?php

namespace App\Http\Livewire\Guest\Reservation;

use App\Helpers\Currency;
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
        // $this->payment_method = auth()->user()->findPaymentMethod($this->payment->stripe_payment_id);
        // $this->base_rate = Currency::toDollars($this->payment->base_rate);
        // $this->tax_rate = Currency::toDollars($this->payment->tax_rate);
        $fees = $this->payment->fees->toArray();
        foreach ($fees as $fee) {
            $this->fees[] = [
                'name' => $fee['name'],
                'amount' => Currency::toDollars($fee['amount']),
            ];
        }
        $this->total = Currency::toDollars($this->payment->total);
    }
}
