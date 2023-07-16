## Installation

-   _To be completed_

## Notes

### Error Codes

#### Stripe

-   Generic error (2) -

## Models

### Reservation

-   **Table Structure:**
    -   `id` -
    -   `slug` _(string)_ - The slug/id of the reservation
    -   `user_id` _(integer)_ - The owner of the reservation
    -   `property_id` _(integer)_ - The property the reservation is for
    -   `checkin` _(string)_ - The check in date _(YYYY-MM-DD)_
    -   `checkout` _(string)_ - The check out date _(YYYY-MM-DD)_
    -   `nights` _(string)_ - Number of nights the guest has selected
    -   `guests` _(integer)_ - The number of guests
    -   `status` _(string)_ - The current status of the reservation
        -   `nopayment` - awaiting guest payment
        -   `pending` - payment on hold, awaiting approval from host
        -   `canceled` - canceled by guest or host
        -   ~~`denied` - rejected by host~~
        -   `approved` - approved by host
        -   `active` - guest has checked in and is currently staying at the property
        -   `completed` - guest has checked out and has left the property
    -   `status_by` _(string)_ - The id of the guest/host who last changed the status
    -   `status_reason` _(string)_ - A short description on why the status was changed, normally to desc cancellation

#### Payments

-   **Table Structure:**
    -   `reservation_id` _(string)_ - the reservation this payment belongs to
    -   `user_id` _(string)_ - the user this payment was created by
    -   `status` _(string)_ _(default: hold)_ - The current status of the payment
        -   `hold` - funds waiting to be captured
        -   `returned` - funds released from hold
        -   `captured` - funds captured (aka paid)
        -   `refunded` - funds that have been captured have been refunded
    -   `stripe_payment_id` -
    -   `base_rate` -
    -   `average_rate` -
    -   `tax_rate` -
    -   `total` -
