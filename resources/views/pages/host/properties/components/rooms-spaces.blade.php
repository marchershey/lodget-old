<div class="spacing" x-data="hostSetupPropertyRoomsSpaces">
    @if (isset($active_room))
        <div class="panel padding spacing">
            <div>
                <h2 class="panel-heading">Rooms & Spaces</h2>
                <p class="panel-desc">Add all of the rooms that are included in your guest's visit.</p>
            </div>
            {{-- Bedrooms --}}
            <div class="spacing-sm">
                <div>
                    <h3 class="title @error('property.rooms.bedrooms') text-red-500 @enderror">Bedrooms</h3>
                    @error('property.rooms.bedrooms')
                        <p class="text-red-500 subtitle">{{ $errors->first('property.rooms.bedrooms') }}</p>
                    @else
                        <p class="subtitle">Add all of the bedrooms your property has to offer.</p>
                    @enderror
                </div>

                <div class="spacing-sm">
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
                                        <div class="relative" x-data="{ open: false }">
                                            <div>
                                                <button x-on:click="open = !open" class="p-2 -mr-2 text-muted" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="19" r="1"></circle>
                                                        <circle cx="12" cy="5" r="1"></circle>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div x-cloak x-show="open" x-on:click.away="open = false" class="absolute right-0 z-10 w-32 origin-top-right bg-white border rounded-lg shadow-xl">
                                                <ul x-on:click="open = false" class="text-sm divide-y">
                                                    <li class="px-4 py-2 cursor-pointer hover:bg-gray-50">
                                                        <div x-on:click="initUpdateRoom('bedroom', {{ $room_key }})" class="flex items-center space-x-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-muted" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                                <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                                            </svg>
                                                            <span class="">Edit</span>
                                                        </div>
                                                    </li>
                                                    <li class="px-4 py-2 cursor-pointer hover:bg-gray-50">
                                                        <div x-on:click="deleteRoom('bedroom', {{ $room_key }})" class="flex items-center space-x-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-500" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <line x1="4" y1="7" x2="20" y2="7"></line>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                            </svg>
                                                            <span class="">Delete</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div>
                        <button x-on:click="initAddRoom('bedroom')" type="button" class="button-light button button-full">Add bedroom</button>
                    </div>
                </div>
            </div>

            {{-- Spaces --}}
            <div class="spacing-sm">
                <div>
                    <h3 class="title @error('property.rooms.spaces') text-red-500 @enderror">Spaces</h3>
                    @error('property.rooms.spaces')
                        <p class="text-red-500 subtitle">{{ $errors->first('property.rooms.spaces') }}</p>
                    @else
                        <p class="subtitle">Add any spaces that offer sleeping arrangements that is not a bedroom, such as a living room, loft, etc.</p>
                    @enderror
                </div>

                <div class="spacing-sm">
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
                                        <div class="relative" x-data="{ open: false }">
                                            <div>
                                                <button x-on:click="open = !open" class="p-2 -mr-2 text-muted" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="19" r="1"></circle>
                                                        <circle cx="12" cy="5" r="1"></circle>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div x-cloak x-show="open" x-on:click.away="open = false" class="absolute right-0 z-10 w-32 origin-top-right bg-white border rounded-lg shadow-xl">
                                                <ul x-on:click="open = false" class="text-sm divide-y">
                                                    <li class="px-4 py-2 cursor-pointer hover:bg-gray-50">
                                                        <div x-on:click="initUpdateRoom('space', {{ $room_key }})" class="flex items-center space-x-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-muted" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                                <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                                            </svg>
                                                            <span class="">Edit</span>
                                                        </div>
                                                    </li>
                                                    <li class="px-4 py-2 cursor-pointer hover:bg-gray-50">
                                                        <div x-on:click="deleteRoom('space', {{ $room_key }})" class="flex items-center space-x-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-500" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <line x1="4" y1="7" x2="20" y2="7"></line>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                            </svg>
                                                            <span class="">Delete</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div>
                        <button x-on:click="initAddRoom('spaces')" type="button" class="button-light button button-full">Add space</button>
                    </div>
                </div>
            </div>

            {{-- Bathrooms --}}
            <div class="spacing-sm">
                <div>
                    <h3 class="title @error('property.rooms.bathrooms') text-red-500 @enderror">Bathrooms</h3>
                    @error('property.rooms.bathrooms')
                        <p class="text-red-500 subtitle">{{ $errors->first('property.rooms.bathrooms') }}</p>
                    @else
                        <p class="subtitle">Add all of the bathrooms your property has to offer.</p>
                    @enderror
                </div>

                <div class="spacing-sm">
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
                                        <div class="relative" x-data="{ open: false }">
                                            <div>
                                                <button x-on:click="open = !open" class="p-2 -mr-2 text-muted" type="button">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="19" r="1"></circle>
                                                        <circle cx="12" cy="5" r="1"></circle>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div x-cloak x-show="open" x-on:click.away="open = false" class="absolute right-0 z-10 w-32 origin-top-right bg-white border rounded-lg shadow-xl">
                                                <ul x-on:click="open = false" class="text-sm divide-y">
                                                    <li class="px-4 py-2 cursor-pointer hover:bg-gray-50">
                                                        <div x-on:click="initUpdateRoom('bathroom', {{ $room_key }})" class="flex items-center space-x-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-muted" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                                <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                                                            </svg>
                                                            <span class="">Edit</span>
                                                        </div>
                                                    </li>
                                                    <li class="px-4 py-2 cursor-pointer hover:bg-gray-50">
                                                        <div x-on:click="deleteRoom('bathroom', {{ $room_key }})" class="flex items-center space-x-2">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-red-500" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <line x1="4" y1="7" x2="20" y2="7"></line>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                            </svg>
                                                            <span class="">Delete</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div>
                        <button x-on:click="initAddRoom('bathroom')" type="button" class="button-light button button-full">Add bathroom</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-row-reverse items-center justify-between">
            <button wire:click="submit" type="submit" class="button button-dark">Continue</button>
            <button wire:click="$emit('prevPage')" type="submit" class="button button-light">Go back</button>
        </div>

        <div x-cloak x-show="roomModal">
            <x-modal showFunction="roomModal" closeFunction="closeRoomModal">
                <div class="form">
                    <div class="col-span-full">
                        <x-forms.text label="{{ ucfirst($active_room['room_type']) }} Name" model="active_room.name" />
                    </div>

                    @if ($active_room['room_type'] == 'bathroom')
                        <div class="col-span-full">
                            <x-forms.select label="Bath Type" model="active_room.bath_type" :options="['Full Bath' => 'Full Bath', 'Half Bath' => 'Half Bath', 'Shower' => 'Shower']" />
                        </div>
                    @else
                        {{-- Add bed button --}}
                        <div class="col-span-full">
                            <div>
                                <h3 class="mb-1 title @error('active_room.beds') text-red-500 @enderror">Beds</h3>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @if (isset($active_room['beds']))
                                    @foreach ($active_room['beds'] as $bed_key => $bed)
                                        <button type="button" wire:click="removeBed({{ $bed_key }})" class="cursor-pointer button button-sm button-light">{{ $bed['bed_type'] }}</button>
                                    @endforeach
                                @endif
                                <div x-data="{ open: false }" wire:key="add_bed">
                                    <div>
                                        <button x-on:click="open = true" type="button" class="flex items-center button button-sm button-light" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                            <span>
                                                Add bed
                                            </span>
                                            <!-- Heroicon name: mini/chevron-down -->
                                            <svg class="w-5 h-5 text-muted" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div x-cloak x-show="open" x-on:click.away="open = false" class="absolute inset-0 z-30 w-auto overflow-y-auto bg-white">
                                        <div class="sticky top-0 px-4 py-2 font-semibold bg-white border-b">
                                            <div class="flex items-center justify-between">
                                                <div>Select a bed size...</div>
                                                <button x-on:click="open = false" class="absolute top-0 right-0 z-30 p-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-muted" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div x-on:click="open = false" class="flex flex-col divide-y">
                                            <div wire:click="addBed('Cali King')" class="px-4 py-2 cursor-pointer hover:bg-gray-50">Cali King</div>
                                            <div wire:click="addBed('King')" class="px-4 py-2 cursor-pointer hover:bg-gray-50">King</div>
                                            <div wire:click="addBed('Queen')" class="px-4 py-2 cursor-pointer hover:bg-gray-50">Queen</div>
                                            <div wire:click="addBed('Full')" class="px-4 py-2 cursor-pointer hover:bg-gray-50">Full</div>
                                            <div wire:click="addBed('Twin XL')" class="px-4 py-2 cursor-pointer hover:bg-gray-50">Twin XL</div>
                                            <div wire:click="addBed('Twin')" class="px-4 py-2 cursor-pointer hover:bg-gray-50">Twin</div>
                                            <div wire:click="addBed('Crib')" class="px-4 py-2 cursor-pointer hover:bg-gray-50">Crib</div>
                                            <div wire:click="addBed('Futon')" class="px-4 py-2 cursor-pointer hover:bg-gray-50">Futon</div>
                                            <div wire:click="addBed('Bunk Bed')" class="px-4 py-2 cursor-pointer hover:bg-gray-50">Bunk Bed</div>
                                            <div wire:click="addBed('Sleeper Sofa')" class="px-4 py-2 cursor-pointer hover:bg-gray-50">Sleeper Sofa</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('active_room.beds')
                                <div class="text-red-500 input-desc ">
                                    {{ $errors->first('active_room.beds') }}
                                </div>
                            @enderror
                        </div>
                    @endif
                    <div class="col-span-full">
                        @if (isset($active_room['action']))
                            @if ($active_room['action'] == 'add')
                                <button wire:key="test" x-on:click="addRoom('{{ $active_room['room_type'] }}')" type="button" class="button-light button button-full">Add a {{ $active_room['room_type'] }}</button>
                            @elseif($active_room['action'] == 'update')
                                <button wire:key="test2" x-on:click="updateRoom('{{ $active_room['room_type'] }}', {{ $active_room['key'] }})" type="button" class="button-light button button-full">Update {{ $active_room['room_type'] }}</button>
                            @endif
                        @endif
                    </div>
                </div>
            </x-modal>
        </div>
    @endif
</div>


@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('hostSetupPropertyRoomsSpaces', () => ({
                roomModal: false,

                openRoomModal() {
                    this.roomModal = true
                },
                closeRoomModal() {
                    this.roomModal = false
                },

                initAddRoom(room_type) {
                    @this.initAddRoom(room_type)
                    this.openRoomModal()
                },
                async addRoom(room_type) {
                    var success = await @this.addRoom(room_type)
                    if (success) this.closeRoomModal();
                },
                initUpdateRoom(room_type, room_key) {
                    @this.initUpdateRoom(room_type, room_key)
                    this.openRoomModal()
                },
                async updateRoom(room_type, room_key) {
                    var success = await @this.updateRoom(room_type, room_key)
                    if (success) this.closeRoomModal();
                },
                deleteRoom(room_type, room_key) {
                    @this.deleteRoom(room_type, room_key);
                }
            }))
        })
    </script>
@endpush
