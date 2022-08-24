<div wire:init="load">
    @if ($reservations)
        <div class="-my-5 divide-y">
            {{-- <div class="flex justify-between px-5 py-2 -mx-5 text-sm bg-gray-100">
                <div>Property</div>
                <div class="mr-12">Status</div>
            </div> --}}
            @foreach ($reservations as $reservation)
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="9 6 15 12 9 18"></polyline>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <div class="flex justify-center">
        <div role="dialog" aria-modal="true" class="fixed inset-0 z-10 overflow-y-auto">
            <div class="fixed inset-0 bg-gray-700 bg-opacity-75"></div>
            <div class="relative flex items-end justify-center min-h-screen sm:items-center">
                <div class="w-full max-w-lg m-0">
                    <div class="shadow-2xl panel">
                        <h1 class="panel-heading">asdf</h1>

                        <div class="panel-body">
                            <div>
                                hello
                            </div>
                            <div>
                                @if (isset($buttons))
                                    {{ $buttons }}
                                @else
                                    <button class="button button-light">Close</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
