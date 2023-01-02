<div class="panel-spacing" wire:init="load">

    <div class="panel">
        <div class="panel-body p-0">
            <table class="">
                <thead class="text-sm font-medium text-gray-500 border-b border-gray-200 bg-gray-50">
                    <tr>
                        <td class="px-5 py-2">Reservation</td>
                        <td class="px-5 py-2">Dates</td>
                        <td class="px-5 py-2 text-center">Status</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @if ($reservations)
                        @foreach ($reservations as $reservation)
                            <tr class="group cursor-pointer" onclick="window.location='{{ route('host.reservation', [$reservation->slug]) }}'">
                                <td class="px-5 py-3 group-hover:bg-gray-50">
                                    <div class="flex flex-col">
                                        <div class="flex items-center">
                                            <div class="relative mr-2 flex h-3 w-3">
                                                <span class="bg-primary absolute inline-flex h-full w-full animate-ping rounded-full opacity-75"></span>
                                                <span class="bg-primary h-3 w-3 rounded-full"></span>
                                            </div>
                                            <span class="font-medium">{{ $reservation->user->fullName() }}</span>
                                        </div>
                                        <span class="text-muted text-sm">{{ $reservation->property->name }}</span>
                                    </div>
                                </td>
                                <td class="px-5 py-3 group-hover:bg-gray-50">
                                    <div class="flex flex-col">
                                        <div class="flex space-x-1">
                                            <span class="font-medium">{{ Carbon\Carbon::parse($reservation->checkin)->format('M jS') }}</span>
                                            <span class="text-muted">to</span>
                                            <span class="font-medium">{{ Carbon\Carbon::parse($reservation->checkout)->format('M jS') }}</span>
                                        </div>
                                        <div class="text-muted flex items-center space-x-5 text-sm">
                                            <div class="flex items-center">
                                                <span class="mt-0.5">{{ $reservation->nights }}</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                                                </svg>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="mt-0.5">{{ $reservation->guests }}</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="9" cy="7" r="4"></circle>
                                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                                </svg>
                                            </div>
                                            {{-- <span>{{ $reservation->nights }}</span>
                                            <span>{{ $reservation->guests }} guests</span> --}}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-3 text-center group-hover:bg-gray-50">
                                    @if ($reservation->status === 'nopayment')
                                        <span class="rounded-full bg-gray-100 px-2 py-1 text-xs font-medium text-gray-900">No Payment</span>
                                    @elseif ($reservation->status === 'pending')
                                        <span class="rounded-full bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-900">Pending</span>
                                    @elseif($reservation->status === 'canceled')
                                        <span class="rounded-full bg-gray-100 px-2 py-1 text-xs font-medium text-gray-900">Canceled</span>
                                    @elseif ($reservation->status === 'rejected')
                                        <span class="rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-900">Rejected</span>
                                    @elseif ($reservation->status === 'approved')
                                        <span class="rounded-full bg-purple-100 px-2 py-1 text-xs font-medium text-purple-900">Approved</span>
                                    @elseif ($reservation->status === 'active')
                                        <span class="rounded-full bg-blue-100 px-2 py-1 text-xs font-medium text-blue-900">Active</span>
                                    @elseif ($reservation->status === 'completed')
                                        <span class="rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-900">Completed</span>
                                    @endif
                                </td>
                                <td class="px-5 py-3 group-hover:bg-gray-50">
                                    <div class="flex items-center justify-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <polyline points="9 6 15 12 9 18"></polyline>
                                        </svg>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="px-5 py-2">
                                <div class="h-6 w-full animate-pulse rounded-lg bg-gray-100"></div>
                            </td>
                            <td class="px-5 py-2">
                                <div class="h-6 w-full animate-pulse rounded-lg bg-gray-100"></div>
                            </td>
                            <td class="px-5 py-2">
                                <div class="h-6 w-full animate-pulse rounded-lg bg-gray-100"></div>
                            </td>
                            <td class="px-5 py-2">
                                <div class="h-6 w-full animate-pulse rounded-lg bg-gray-100"></div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
