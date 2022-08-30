<div wire:init="load">
    @if (count($reservations) > 0)
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
    @else
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mx-auto text-gray-300" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                <line x1="16" y1="3" x2="16" y2="7"></line>
                <line x1="8" y1="3" x2="8" y2="7"></line>
                <line x1="4" y1="11" x2="20" y2="11"></line>
                <line x1="10" y1="16" x2="14" y2="16"></line>
                <line x1="12" y1="14" x2="12" y2="18"></line>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No projects</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by creating a new project.</p>
            <div class="mt-6">
                <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <!-- Heroicon name: mini/plus -->
                    <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    New Project
                </button>
            </div>
        </div>

    @endif

</div>
