<x-layouts.host>

    <div class="panel-spacing">
        <div class="panel">
            <h1 class="panel-heading">Reservation Details</h1>
            <div class="panel-body">
                <div class="grid grid-cols-3 gap-y-5">
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
                        <span class="truncate">{{ $reservation->user->birthdate }} (39)</span>
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
