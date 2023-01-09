<x-layouts.guest pageTitle="Reservation">

    <div class="panel-spacing">

        {{-- Page Header --}}
        <div class="md:flex md:items-center md:justify-between md:space-x-5 padding">
            <div class="flex items-center space-x-5">
                <div class="flex-shrink-0">
                    <div class="relative">
                        <div class="w-16 h-16 bg-center bg-cover rounded-full shadow-lg ring-1 ring-gray-400" style="background-image: url(/storage/{{ $reservation->property->photos()->first()->path }})"></div>
                        <span class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></span>
                    </div>
                </div>
                <div>
                    <h1 class="text-2xl font-bold">{{ $reservation->property->name }}</h1>
                    <p class="text-sm text-muted">{{ $reservation->property->city }}, {{ $reservation->property->state }}</p>
                </div>
            </div>

            {{-- <div class="flex flex-col-reverse mt-6 space-y-4 space-y-reverse justify-stretch sm:flex-row-reverse sm:justify-end sm:space-y-0 sm:space-x-3 sm:space-x-reverse md:mt-0 md:flex-row md:space-x-3">
                <button type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-100">Disqualify</button>
                <button type="button" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-gray-100">Advance to offer</button>
            </div> --}}
        </div>

        <div class="grid grid-cols-1 gap-y-5 lg:gap-5 lg:grid-cols-3">
            <div class="col-span-2">
                <div class="panel">
                    <div>
                        <h1 class="panel-heading">Reservation Details</h1>
                    </div>
                    <div class="panel-body">
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                            <div class="flex flex-col">
                                <span class="text-muted">Check in</span>
                                <span>{{ Carbon\Carbon::parse($reservation->checkin)->format('D, M jS, Y') }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-muted">Check out</span>
                                <span>{{ Carbon\Carbon::parse($reservation->checkout)->format('D, M jS, Y') }}</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-muted">Guests</span>
                                <span class="">{{ $reservation->guests }} {{ Str::plural('guest', $reservation->guests) }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-5 border-t">
                        @if ($reservation->status === 'nopayment')
                            <div class="col-span-full">
                                <x-alert type="warning">
                                    <span class="font-medium">Reservation Pending Payment</span>
                                    <span>Your reservation is currently pending payment. Please add a payment as soon as possible to ensure the dates you requested are available. Dates are not reserved until a payment has been added.</span>
                                </x-alert>
                            </div>
                        @elseif ($reservation->status === 'pending')
                            <div class="flex flex-col gap-5 col-span-full">
                                <x-alert type="info">
                                    <span class="font-medium">Reservation Pending</span>
                                    <span class="text-sm">Once your application is approved, this page will update with the address and check-in information. On the day of your reservation, there will be a <b>Check In</b> button that will appear to check in once you arrive at the property.</span>
                                    <span class="text-sm">Don't worry, if your reservation is not approved/denied within 7 days, your funds will be released automatically.</span>
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
                                        <span>You have successfully canceled the reservation.</span>
                                    @endif
                                </x-alert>
                            </div>
                        @elseif ($reservation->status === 'approved')
                            <div class="col-span-full">
                                <x-alert type="success">
                                    <span class="font-medium">Reservation Approved!</span>
                                    <span>Congratulations! Your reservation has been approved and your dates have been reserved. You have received an email with instructions on the next steps. Please come back to this page once you arrive at {{ $reservation->property->name }}.</span>
                                </x-alert>
                            </div>
                        @elseif ($reservation->status === 'active')

                        @elseif ($reservation->status === 'completed')
                        @endif
                    </div>
                </div>
            </div>

            <div class="flex flex-col space-y-5">
                <div class="panel">
                    <h1 class="panel-heading">Pricing Details</h1>
                    <div class="panel-body">
                        <livewire:reservation.pricing-table :reservation="$reservation" />
                    </div>
                </div>

                <livewire:guest.reservation.action-buttons :reservation="$reservation" />
            </div>

        </div>
    </div>

    <div class="hidden panel-spacing">
        <div class="flex items-center justify-between padding">
            <div>
                <h1 class="text-2xl font-semibold">{{ $reservation->property->name }}</h1>
                <span class="text-sm text-muted">ID: {{ $reservation->slug }}</span>
            </div>
            <div class="flex space-x-5">
                @if ($reservation->status == 'nopayment')
                    <a href="{{ route('frontend.checkout', $reservation->slug) }}" class="button whitespace-nowrap">Add Payment</a>
                @elseif($reservation->status == 'pending')

                @elseif($reservation->status == 'canceled')

                @elseif($reservation->status == 'rejected')

                @elseif($reservation->status == 'approved')

                @elseif($reservation->status == 'active')

                @elseif($reservation->status == 'completed')
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
            <div class="panel md:col-span-2">
                <h1 class="panel-heading">Reservation Details</h1>
                <div class="panel-body">
                    <div class="grid grid-cols-3 gap-y-5">
                        @if ($reservation->status === 'nopayment')
                            <div class="col-span-full">
                                <x-alert type="warning">
                                    <span class="font-medium">Reservation Pending Payment</span>
                                    <span>Your reservation is currently pending payment. Please add a payment as soon as possible to ensure the dates you requested are available. Dates are not reserved until a payment has been added.</span>
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
                                    <span class="text-sm">Don't worry, if your reservation is not approved/denied within 7 days, your funds will be released automatically.</span>
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
                                        <span>You have successfully canceled the reservation.</span>
                                    @endif
                                </x-alert>
                            </div>
                        @elseif ($reservation->status === 'approved')
                            <div class="col-span-full">
                                <x-alert type="success">
                                    <span class="font-medium">Reservation Approved!</span>
                                    <span>Congratulations! Your reservation has been approved and your dates have been reserved. You have received an email with instructions on the next steps. Please come back to this page once you arrive at {{ $reservation->property->name }}.</span>
                                </x-alert>
                            </div>
                        @elseif ($reservation->status === 'active')

                        @elseif ($reservation->status === 'completed')
                        @endif
                        <hr class="-mx-5 col-span-full">

                        <div class="grid grid-cols-2 gap-5 col-span-full">
                            <div class="flex flex-col">
                                <span class="font-medium">Check-in</span>
                                <span class="">{{ Carbon\Carbon::parse($reservation->checkin)->format('D, M jS, Y') }}</span>
                                <span>12:00 PM</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="font-medium">Checkout</span>
                                <span class="">{{ Carbon\Carbon::parse($reservation->checkout)->format('D, M jS, Y') }}</span>
                                <span>12:00 PM</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="font-medium">Guests</span>
                                <span class="">{{ $reservation->guests }} {{ Str::plural('adult', $reservation->guests) }}</span>
                                <span class="">0 {{ Str::plural('kids', 0) }}</span>
                            </div>
                        </div>

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

            <div class="panel-spacing">
                <div class="panel">
                    <h1 class="panel-heading">Pricing Details</h1>
                    <div class="panel-body">
                        <livewire:reservation.pricing-table :reservation="$reservation" />
                    </div>
                </div>

                <livewire:guest.reservation.action-buttons :reservation="$reservation" />
            </div>
        </div>
    </div>

    <hr class="my-10">
    <div class="flex flex-col hidden space-y-5">
        <div class="flex items-center justify-between">
            <div class="flex flex-col">
                <h1 class="text-2xl font-semibold">{{ $reservation->property->name }}</h1>
                <span class="text-sm text-muted">ID: {{ $reservation->slug }}</span>
            </div>
            <div class="flex space-x-5">
                @if ($reservation->status == 'nopayment')
                    <a href="{{ route('frontend.checkout', $reservation->slug) }}" class="button whitespace-nowrap">Add Payment</a>
                @elseif($reservation->status == 'pending')

                @elseif($reservation->status == 'canceled')

                @elseif($reservation->status == 'rejected')

                @elseif($reservation->status == 'approved')

                @elseif($reservation->status == 'active')

                @elseif($reservation->status == 'completed')
                @endif
            </div>
        </div>

        <div class="grid grid-cols-3 gap-5">
            <div class="col-span-2 panel-spacing">
                <div class="panel">
                    <h1 class="panel-heading">Reservation Details</h1>
                    <div class="panel-body">
                        <div class="grid grid-cols-3 gap-y-5">
                            @if ($reservation->status === 'nopayment')
                                <div class="col-span-full">
                                    <x-alert type="warning">
                                        <span class="font-medium">Reservation Pending Payment</span>
                                        <span>Your reservation is currently pending payment. Please add a payment as soon as possible to ensure the dates you requested are available. Dates are not reserved until a payment has been added.</span>
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
                                        <span class="text-sm">Don't worry, if your reservation is not approved/denied within 7 days, your funds will be released automatically.</span>
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
                                            <span>You have successfully canceled the reservation.</span>
                                        @endif
                                    </x-alert>
                                </div>
                            @elseif ($reservation->status === 'approved')
                                <div class="col-span-full">
                                    <x-alert type="success">
                                        <span class="font-medium">Reservation Approved!</span>
                                        <span>Congratulations! Your reservation has been approved and your dates have been reserved. You have received an email with instructions on the next steps. Please come back to this page once you arrive at {{ $reservation->property->name }}.</span>
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

                {{-- <div class="panel">
                    <h1 class="panel-heading">Messages</h1>
                    <div class="panel-body">
                        <div>
                            <div class="mb-2 text-sm italic">
                                <span class="font-semibold text-primary">Rob Serrate</span> said:
                            </div>
                            <div class="p-3 bg-gray-100 rounded-lg">
                                Hey! If you need anything, please feel free to reach out at any time!
                            </div>
                        </div>
                        <div>
                            <div class="mb-2 text-sm italic">
                                <span class="font-semibold">You</span> said:
                            </div>
                            <div class="p-3 bg-gray-100 rounded-lg">
                                Yeah, can you call me really quick?
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 panel-body">
                        <div class="mt-1">
                            <textarea rows="4" name="comment" id="comment" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-primary focus:border-primary sm:text-sm" placeholder="Type your message here..."></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button class="w-auto button">Send</button>
                        </div>
                    </div>
                </div> --}}
            </div>

            <div class="panel-spacing">
                <div class="panel">
                    <h1 class="panel-heading">Pricing Details</h1>
                    <div class="panel-body">
                        <livewire:reservation.pricing-table :reservation="$reservation" />
                    </div>
                </div>

                <livewire:guest.reservation.action-buttons :reservation="$reservation" />
            </div>
        </div>

    </div>

</x-layouts.guest>
