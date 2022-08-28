<div wire:init="load">
    @if ($reservations)
        <div class="-my-5 divide-y">
            @foreach ($reservations as $reservation)
                <a href="{{ route('guest.reservation', [$reservation->slug]) }}">
                    <div class="px-5 py-3 -mx-5 cursor-pointer hover:bg-gray-50">
                        <div class="grid w-full grid-cols-3">
                            <div class="flex items-center space-x-5">
                                <div class="w-12 h-12 bg-center bg-cover rounded-full shadow-lg ring-1 ring-gray-400" style="background-image: url(/storage/{{ $reservation->property->photos()->first()->path }})"></div>
                                <div>
                                    <h2 class="text-lg">{{ $reservation->property->name }}</h2>
                                    <span class="text-sm text-muted">{{ $reservation->property->city }}, {{ $reservation->property->state }}</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-center">
                                <span class="text-muted">{{ Carbon\Carbon::parse($reservation->checkin)->format('M jS') }} - {{ Carbon\Carbon::parse($reservation->checkout)->format('M jS') }}</span>
                            </div>
                            <div class="flex items-center justify-end space-x-2">
                                <div class="px-2 py-1 text-sm text-yellow-800 capitalize bg-yellow-200 rounded-lg">
                                    {{ $reservation->status }}
                                </div>
                                <div>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <polyline points="9 6 15 12 9 18"></polyline>
                                        </svg>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endif

</div>
