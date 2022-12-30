<div class="spacing">
    <div class="panel padding spacing">
        <div>
            <h2 class="panel-heading">Property Overview</h2>
            <p class="panel-desc">Here is an overview of your property. Please go over it and double check everything.</p>
        </div>
        <div class="border rounded bg-gray-50 padding-sm">
            <div class="grid grid-cols-4 gap">
                <div class="block w-full overflow-hidden bg-gray-100 rounded group aspect-w-10 aspect-h-7">
                    <img src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80" alt="" class="object-cover pointer-events-none">
                </div>
                <div class="col-span-3">
                    <div class="flex flex-col justify-between h-full">
                        <div>
                            <h1 class="text-2xl font-semibold">Ohana Burnside</h1>
                            <h3 class="text-muted">{{ $property['city'] ?? 'NOT SET' }}, {{ $property['state'] ?? 'NOT SET' }}</h3>
                        </div>
                        <div class="flex items-end space-x-5 text-muted-dark ">
                            <div class="flex space-x-2">
                                <span class="mt-px font-bold">2</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 7v11m0 -4h18m0 4v-8a2 2 0 0 0 -2 -2h-8v6"></path>
                                    <circle cx="7" cy="10" r="1"></circle>
                                </svg>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="mt-px font-bold">2</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" width="40" height="40" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel padding spacing">
        <h2 class="panel-heading">Basic Information</h2>
        <table class="table table-no-x-padding">
            <tr>
                <td class="font-semibold">Property Name</td>
                <td class="text-right capitalize">{{ $property['name'] ?? 'NOT SET' }}</td>
            </tr>
            <tr>
                <td class="font-semibold">Street Address</td>
                <td class="text-right capitalize">{{ $property['address'] ?? 'NOT SET' }}</td>
            </tr>
            <tr>
                <td class="font-semibold">City</td>
                <td class="text-right capitalize">{{ $property['city'] ?? 'NOT SET' }}</td>
            </tr>
            <tr>
                <td class="font-semibold">State</td>
                <td class="text-right uppercase">{{ $property['state'] ?? 'NOT SET' }}</td>
            </tr>
            <tr>
                <td class="font-semibold">Zip / Postal Code</td>
                <td class="text-right">{{ $property['zip'] ?? 'NOT SET' }}</td>
            </tr>
        </table>
    </div>

    <div class="panel padding spacing">
        <h2 class="panel-heading">Property Details</h2>
        <table class="table table-no-x-padding">
            <tr>
                <td class="font-semibold">Property Type:</td>
                <td class="text-right capitalize">{{ $property['type']['name'] ?? 'NOT SET' }}</td>
            </tr>
        </table>
    </div>

    <div class="panel padding spacing">
        <h2 class="panel-heading">Rooms & Spaces</h2>
        <div class="spacing-sm">
            <h3 class="title">Bedrooms</h3>
            @if (isset($property['rooms']['bedrooms']) && count($property['rooms']['bedrooms']) > 0)
                <div class="grid grid-cols-1 tablet:grid-cols-2 gap">
                    @foreach ($property['rooms']['bedrooms'] as $room_key => $room)
                        <div class="border rounded bg-gray-50 padding-sm">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0 text-muted-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M3 7v11m0 -4h18m0 4v-8a2 2 0 0 0 -2 -2h-8v6"></path>
                                        <circle cx="7" cy="10" r="1"></circle>
                                    </svg>
                                </div>
                                <div class="flex flex-col w-full space-y-1">
                                    <div class="text-sm font-semibold">{{ $room['name'] }}</div>
                                    <div class="flex flex-wrap gap-2">
                                        @if (isset($room['beds']))
                                            @foreach ($room['beds'] as $bed)
                                                <div class="bg-gray-100 button button-xs">{{ $bed['bed_type'] }}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center alert alert-gray">You didn't add any bedrooms.</div>
            @endif
        </div>
        <div class="spacing-sm">
            <h3 class="title">Spaces</h3>
            @if (isset($property['rooms']['spaces']) && count($property['rooms']['spaces']) > 0)
                <div class="grid grid-cols-1 tablet:grid-cols-2 gap">
                    @foreach ($property['rooms']['spaces'] as $room_key => $room)
                        <div class="border rounded bg-gray-50 padding-sm">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0 text-muted-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 11a2 2 0 0 1 2 2v1h12v-1a2 2 0 1 1 4 0v5a1 1 0 0 1 -1 1h-18a1 1 0 0 1 -1 -1v-5a2 2 0 0 1 2 -2z"></path>
                                        <path d="M4 11v-3a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v3"></path>
                                        <path d="M12 5v9"></path>
                                    </svg>
                                </div>
                                <div class="flex flex-col w-full space-y-1">
                                    <div class="text-sm font-semibold">{{ $room['name'] }}</div>
                                    <div class="flex flex-wrap gap-2">
                                        @if (isset($room['beds']))
                                            @foreach ($room['beds'] as $bed)
                                                <div class="bg-gray-100 button button-xs">{{ $bed['bed_type'] }}</div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center alert alert-gray">You didn't add any spaces.</div>
            @endif
        </div>
        <div class="spacing-sm">
            <h3 class="title">Bathrooms</h3>
            @if (isset($property['rooms']['bathrooms']) && count($property['rooms']['bathrooms']) > 0)
                <div class="grid grid-cols-1 tablet:grid-cols-2 gap">
                    @foreach ($property['rooms']['bathrooms'] as $room_key => $room)
                        <div class="border rounded bg-gray-50 padding-sm">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0 text-muted-light">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 12h16a1 1 0 0 1 1 1v3a4 4 0 0 1 -4 4h-10a4 4 0 0 1 -4 -4v-3a1 1 0 0 1 1 -1z"></path>
                                        <path d="M6 12v-7a2 2 0 0 1 2 -2h3v2.25"></path>
                                        <path d="M4 21l1 -1.5"></path>
                                        <path d="M20 21l-1 -1.5"></path>
                                    </svg>
                                </div>
                                <div class="flex flex-col w-full space-y-1">
                                    <div class="text-sm font-semibold">{{ $room['name'] }}</div>
                                    <div class="text-xs text-muted">{{ $room['bath_type'] }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center alert alert-gray">You didn't add any bathrooms.</div>
            @endif
        </div>
    </div>

    <div class="panel padding spacing">
        <h2 class="panel-heading">Amenities</h2>
        <div class="flex flex-wrap gap-5">
            @if (isset($property['amenities']))
                @foreach ($property['amenities'] as $amenity)
                    <div class="capitalize badge badge-gray">{{ $amenity['name'] }}</div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="panel padding spacing">
        <h2 class="panel-heading">Photos</h2>
        @if (isset($property['photos']))
            <ul role="list" class="grid grid-cols-3 gap-5">
                @foreach ($property['photos'] as $key => $photo)
                    <li class="relative">
                        <div class="block w-full overflow-hidden bg-gray-100 rounded-lg group aspect-w-10 aspect-h-7 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                            <img src="/storage/{{ $photo[0] }}" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <div class="panel padding spacing">
        <h2 class="panel-heading">Pricing & Fees</h2>
        <table class="table table-no-x-padding">
            <tr>
                <td class="font-semibold">Nightly Base Rate:</td>
                <td class="text-right">{{ money($property['pricing']['base_rate'] ?? 0) }}</td>
            </tr>
            <tr>
                <td class="font-semibold">Tax Rate:</td>
                <td class="text-right">{{ $property['pricing']['tax_rate'] ?? 'NOT SET' }}</td>
            </tr>
            <tr>
                <td class="font-semibold">Fees:</td>
                <td class="text-right">
                    <ul>
                        @if (isset($property['pricing']['fees']))
                            @foreach ($property['pricing']['fees'] as $fee)
                                <li>
                                    <span class="font-medium">{{ $fee['name'] }}:</span>
                                    <span>{{ money($fee['amount'] ?? 0) }}</span>
                                    <span>{{ $fee['type'] }}</span>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </td>
            </tr>
        </table>
    </div>

    <div class="panel padding spacing">
        <h2 class="panel-heading">Options</h2>
        <table class="table table-no-x-padding">
            <tr>
                <td class="font-semibold">Minimum Nights:</td>
                <td class="text-right">{{ $property['options']['min_nights'] ?? 'NOT SET' }}</td>
            </tr>
        </table>
    </div>

    <div class="text-center alert alert-yellow">If you need to make any changes, please press the <span class="font-bold">GO BACK</span> button.</div>

    <div class="flex flex-row-reverse items-center justify-between">
        <button wire:click="$emit('publish')" type="submit" class="button button-dark">Publish</button>
        <button wire:click="$emit('prevPage')" type="submit" class="button button-light">Go back</button>
    </div>
</div>
