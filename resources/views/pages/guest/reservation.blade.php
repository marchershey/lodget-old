<x-layouts.guest pageTitle="Reservation">

    <div class="flex flex-col space-y-5">
        <div class="flex items-center justify-between">
            <div class="flex flex-col">
                <h1 class="text-2xl font-semibold">{{ $reservation->property->name }}</h1>
                <span class="text-sm text-muted">ID: {{ $reservation->slug }}</span>
            </div>
            <div class="flex space-x-5">
                <button class="button whitespace-nowrap">Check in</button>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-5">
            <div class="col-span-2 panel-spacing">
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
                            @if ($reservation->status === 'pending')
                                <hr class="-mx-5 col-span-full">
                                <div class="col-span-full">
                                    <x-alert type="info">
                                        <span class="font-medium">Reservation Pending</span>
                                        <span>Your reservation request is currently pending. Once approved, this page will update with all the information you need. If you have any questions, feel free to reach out to us below.</span>
                                    </x-alert>
                                </div>
                            @elseif ($reservation->status === 'approved')
                            @endif
                        </div>
                    </div>
                </div>

                <div class="panel">
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
                </div>
            </div>

            <div class="panel-spacing">
                <div class="panel">
                    <h1 class="panel-heading">Pricing Details</h1>
                    <div class="panel-body">
                        <livewire:reservation.pricing-table :reservation="$reservation" />
                    </div>
                </div>
                <livewire:guest.reservation.cancel-button :reservation="$reservation" />
            </div>
        </div>

    </div>

</x-layouts.guest>
