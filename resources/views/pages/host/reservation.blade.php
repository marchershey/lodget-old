<x-layouts.host>

    <div class="panel-spacing">
        <div class="panel">
            <h1 class="panel-heading">Reservation Details</h1>
            <div class="panel-body">
                <div class="grid grid-cols-3 gap-y-5">
                    @if ($reservation->status === 'nopayment')
                        <div class="col-span-full">
                            <x-alert type="warning">
                                <span class="font-medium">Reservation Pending Payment</span>
                                <span>
                                    We are waiting for {{ $reservation->user->first_name }} to send a payment for this reservation.
                                </span>
                                <span>
                                    They created this reservation {{ Carbon\Carbon::parse($reservation->created_at)->diffForHumans() }}.
                                </span>
                            </x-alert>
                        </div>
                    @elseif ($reservation->status === 'pending')
                        <div class="flex flex-col gap-5 col-span-full">
                            <x-alert type="info">
                                <span class="font-medium">Reservation Pending</span>
                                <span>Your reservation request is currently pending.</span>
                            </x-alert>
                            <x-alert>
                                <span class="font-medium">Please note...</span>
                                <span class="text-sm">Once your application is approved, this page will update with the address and check-in information. On the day of your reservation, there will be a <b>Check In</b> button that will appear to check in once you arrive at the property.</span>
                                <span class="text-sm">Also to note, if your reservation is not approved/denied within 7 days, your funds will be released.</span>
                            </x-alert>
                        </div>
                    @elseif ($reservation->status === 'canceled')
                        <div class="col-span-full">
                            <x-alert>
                                <span class="font-medium">Reservation canceled</span>
                                @if ($reservation->status_change_user->type == 'host')
                                    <span>The reservation was canceled by the host.</span>
                                    @if ($reservation->status_reason)
                                        <span>Reason: <em>{{ $reservation->status_reason }}</em></span>
                                    @endif
                                @else
                                    <span>The guest canceled the reservation.</span>
                                @endif
                            </x-alert>
                        </div>
                    @elseif ($reservation->status === 'approved')
                        <div class="col-span-full">
                            <x-alert type="info">
                                <span class="font-medium">Reservation approved, awaiting check in.</span>
                                <span class="text-sm">You have approved {{ $reservation->user->first_name }} to stay at {{ $reservation->property->name }}. On check-in day, the guest will need to check in once they arrive at the property. When they check in, they will receive an email with instructions on how to enter the property.</span>
                            </x-alert>
                        </div>
                    @elseif ($reservation->status === 'active')

                    @elseif ($reservation->status === 'completed')
                    @endif
                    <hr class="-mx-5 col-span-full">
                    <div class="flex flex-col">
                        <span class="font-medium">Check-in</span>
                        <span class="">{{ Carbon\Carbon::parse($reservation->checkin)->format('D, M jS, Y') }}</span>
                        <span>12:00 PM</span>
                    </div>
                    <div class="flex flex-col pl-5 border-l-2">
                        <span class="font-medium">Checkout</span>
                        <span class="">{{ Carbon\Carbon::parse($reservation->checkout)->format('D, M jS, Y') }}</span>
                        <span>12:00 PM</span>
                    </div>
                    <div class="flex flex-col pl-5 border-l-2">
                        <span class="font-medium">Guests</span>
                        <span class="">{{ $reservation->guests }} {{ Str::plural('adult', $reservation->guests) }}</span>
                        <span class="">0 {{ Str::plural('kids', 0) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <h1 class="panel-heading">Guest Information</h1>
            <div class="panel-body">
                <div class="grid grid-cols-2 gap-5">
                    <div class="flex flex-col">
                        <span class="text-sm text-muted">Name</span>
                        <span>{{ $reservation->user->fullName() }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-muted">Email Address</span>
                        <span class="truncate">{{ $reservation->user->email }}</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-muted">Birthdate</span>
                        <span class="truncate">Not available</span>
                        {{-- <span class="truncate">{{ $reservation->user->birthdate }} (39)</span> --}}
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm text-muted">Created Account</span>
                        <span class="truncate">{{ Carbon\Carbon::parse($reservation->user->created_at)->format('M jS, Y \a\t g:i A') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <h1 class="panel-heading">Pricing Details</h1>
            <div class="panel-body">
                <livewire:reservation.pricing-table :reservation="$reservation" />
            </div>
        </div>

        <div class="panel">
            <h1 class="panel-heading">Payment Details</h1>
            <div class="panel-body">
                @if ($reservation->payment)
                    yes
                @else
                    <x-alert>
                        Guest has not paid for this reservation
                    </x-alert>
                @endif
            </div>
        </div>

    </div>


    <x-slot:aside>
        <div class="panel-spacing">

            <a href="{{ route('host.reservations') }}" class="button button-light">
                <svg class="w-6 h-6 text-muted" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
                <span>
                    Go back
                </span>
            </a>

            <livewire:host.reservations.action-buttons :reservation="$reservation" />

        </div>
    </x-slot:aside>
</x-layouts.host>
