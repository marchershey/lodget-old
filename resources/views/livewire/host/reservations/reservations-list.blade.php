<div class="panel-spacing" wire:init="load">

    <div class="panel">
        <div class="p-0 panel-body">
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
                            <tr class="cursor-pointer group" onclick="window.location='{{ route('host.reservation', [$reservation->slug]) }}'">
                                <td class="px-5 py-3 group-hover:bg-gray-50">
                                    <div class="flex flex-col">
                                        <div class="flex items-center">
                                            <div class="relative flex w-3 h-3 mr-2">
                                                <span class="absolute inline-flex w-full h-full rounded-full opacity-75 animate-ping bg-primary"></span>
                                                <span class="w-3 h-3 rounded-full bg-primary"></span>
                                            </div>
                                            <span class="font-medium">{{ $reservation->user->fullName() }}</span>
                                        </div>
                                        <span class="text-sm text-muted">{{ $reservation->property->name }}</span>
                                    </div>
                                </td>
                                <td class="px-5 py-3 group-hover:bg-gray-50">
                                    <div class="flex flex-col">
                                        <div class="flex space-x-1">
                                            <span class="font-medium">{{ Carbon\Carbon::parse($reservation->checkin)->format('M jS') }}</span>
                                            <span class="text-muted">to</span>
                                            <span class="font-medium">{{ Carbon\Carbon::parse($reservation->checkout)->format('M jS') }}</span>
                                        </div>
                                        <div class="flex items-center space-x-5 text-sm text-muted">
                                            <div class="flex items-center">
                                                <span class="mt-0.5">{{ $reservation->nights }}</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                                                </svg>
                                            </div>
                                            <div class="flex items-center">
                                                <span class="mt-0.5">{{ $reservation->guests }}</span>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                        <span class="px-2 py-1 text-xs font-medium text-gray-900 bg-gray-100 rounded-full">No Payment</span>
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
                                </td>
                                <td class="px-5 py-3 group-hover:bg-gray-50">
                                    <div class="flex items-center justify-end">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-400" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                                <div class="w-full h-6 bg-gray-100 rounded-lg animate-pulse"></div>
                            </td>
                            <td class="px-5 py-2">
                                <div class="w-full h-6 bg-gray-100 rounded-lg animate-pulse"></div>
                            </td>
                            <td class="px-5 py-2">
                                <div class="w-full h-6 bg-gray-100 rounded-lg animate-pulse"></div>
                            </td>
                            <td class="px-5 py-2">
                                <div class="w-full h-6 bg-gray-100 rounded-lg animate-pulse"></div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
