<?php

namespace App\Models;

use Carbon\Carbon;
use Cknow\Money\Money;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function pricing()
    {
        // declare total
        $total = (int) 0;

        // default nightly and tax rate
        $default_nightly_rate = (int) $this->property->default_rate;
        $default_tax_rate = (int) $this->property->default_tax;

        // Nightly rates
        $nights = [];
        $range = Carbon::parse($this->checkin)->toPeriod($this->checkout);
        foreach ($range as $date) {
            // remove the last date
            if ($date != $range->last()) {
                // format the date
                $date = $date->format('Y-m-d');

                // add the adjusted rate for this date if there is one, if not add the default rate 
                if ($adjusted_rate = PropertyRate::where('date', $date)->first()) {
                    $amount = (int) $adjusted_rate['amount'];
                } else {
                    $amount = (int) $default_nightly_rate;
                }

                // add date to an array of each date with it's amount
                $nights[] = [
                    'date' => $date,
                    'amount' => $amount,
                ];

                // add to average to calculate nightly average rate
                $averages[] = $amount;
            }
        }

        // Nightly average
        $average_rate = array_sum($averages) / count($averages);

        // Base rate
        $base_rate = (int) 0;
        foreach ($nights as $night) {
            $base_rate += $night['amount'];
        }

        // Update total
        $total = $base_rate;

        // Fees
        $fees = [];
        foreach ($this->property->fees as $fee) {
            $name = $fee['name'];
            $amount = ($fee['type'] === 'percentage') ? (int) Money::USD($base_rate)->multiply($fee['amount'] / 100)->getAmount() : $fee['amount'];

            $fees[] = [
                'name' => $name,
                'amount' => $amount,
            ];

            // Update total
            $total += $amount;
        }

        // Tax
        $tax = Money::USD($total)->multiply($default_tax_rate / 100)->getAmount();

        // Update total
        $total += $tax;

        return [
            'default_nightly_rate' => $default_nightly_rate,
            'default_tax_rate' => $default_tax_rate,

            'base_rate' => $base_rate,
            'average_rate' => $average_rate,
            'nights' => $nights,
            'fees' => $fees,
            'tax_rate' => $tax,
            'total' => $total,
        ];
    }
}
