<div wire:init="load">
    @if (count($reservations) > 0)
        <div class="-m-5 overflow-hidden">
            <ul role="list" class="divide-y divide-gray-200">

                @foreach ($reservations as $reservation)
                    <li>
                        <a href="{{ route('guest.reservation', [$reservation->slug]) }}" class="block hover:bg-gray-50">
                            <div class="flex items-center px-4 py-4 sm:px-6">
                                <div class="flex items-center flex-1 min-w-0">
                                    <div class="flex-shrink-0">
                                        <div class="w-12 h-12 bg-center bg-cover rounded-full shadow-lg ring-1 ring-gray-400" style="background-image: url(/storage/{{ $reservation->property->photos()->first()->path }})"></div>
                                    </div>
                                    <div class="flex-1 min-w-0 px-4 md:grid md:grid-cols-2 md:gap-4">
                                        <div>
                                            <p class="text-lg truncate">{{ $reservation->property->name }}</p>
                                            <p class="flex items-center text-sm text-gray-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="12" cy="11" r="3"></circle>
                                                    <path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z"></path>
                                                </svg>
                                                <span class="truncate">{{ $reservation->property->city }}, {{ $reservation->property->state }}</span>
                                            </p>
                                        </div>
                                        {{-- <div class="hidden md:block"> --}}
                                        <div class="flex items-center justify-between mt-5 text-sm md:block md:mt-0 text-muted">
                                            <p class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <rect x="4" y="5" width="16" height="16" rx="2"></rect>
                                                    <line x1="16" y1="3" x2="16" y2="7"></line>
                                                    <line x1="8" y1="3" x2="8" y2="7"></line>
                                                    <line x1="4" y1="11" x2="20" y2="11"></line>
                                                    <line x1="11" y1="15" x2="12" y2="15"></line>
                                                    <line x1="12" y1="15" x2="12" y2="18"></line>
                                                </svg>
                                                {{ Carbon\Carbon::parse($reservation->checkin)->format('M jS') }} - {{ Carbon\Carbon::parse($reservation->checkout)->format('M jS') }}
                                            </p>
                                            <p class="flex items-center md:mt-2">
                                                @if ($reservation->status === 'nopayment')
                                                    <span class="px-2 py-1 text-xs font-medium text-gray-900 bg-gray-100 rounded-full">Payment Needed</span>
                                                @elseif ($reservation->status === 'pending')
                                                    <span class="px-2 py-1 text-xs font-medium text-yellow-900 bg-yellow-100 rounded-full">Pending</span>
                                                @elseif($reservation->status === 'canceled')
                                                    <span class="px-2 py-1 text-xs font-medium text-gray-900 bg-gray-100 rounded-full">Canceled</span>
                                                @elseif ($reservation->status === 'rejected')
                                                    <span class="px-2 py-1 text-xs font-medium text-red-900 bg-red-100 rounded-full">Rejected</span>
                                                @elseif ($reservation->status === 'approved')
                                                    <span class="px-2 py-1 text-xs font-medium text-purple-900 bg-purple-100 rounded-full">Approved</span>
                                                @elseif ($reservation->status === 'active')
                                                    <span class="px-2 py-1 text-xs font-medium text-blue-900 bg-blue-100 rounded-full">Active</span>
                                                @elseif ($reservation->status === 'completed')
                                                    <span class="px-2 py-1 text-xs font-medium text-green-900 bg-green-100 rounded-full">Completed</span>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <!-- Heroicon name: mini/chevron-right -->
                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
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
            <h3 class="mt-2 text-sm font-medium text-gray-900">No reservation found</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by reserving your first stay with us.</p>
            <div class="mt-6">
                <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
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
