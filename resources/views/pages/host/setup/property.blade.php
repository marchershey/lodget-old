<x-layouts.host hideNavigation x-data="app">
    <div wire:init="load"></div>

    @section('sidebar-title', 'Setup')
    @section('sidebar')

        <nav class="padding">
            <ol class="space-y-5">
                <li class="relative">
                    <div class="absolute top-5 left-2 -ml-px mt-0.5 h-full w-0.5 bg-gray-300" :class="isCompleted(1) && '!bg-black'" aria-hidden="true"></div>
                    <a href="#" class="group">
                        <div class="flex items-center space-x-5">
                            <div class="flex items-center justify-center w-4 h-4 rounded-full" :class="isActive(1) || isCompleted(1) ? 'bg-black' : 'bg-gray-300'">
                                <svg x-show="isCompleted(1)" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                            <div :class="isActive(1) && 'font-semibold'">Basic Information</div>
                        </div>
                    </a>
                </li>
                <li class="relative">
                    <div class="absolute top-5 left-2 -ml-px mt-0.5 h-full w-0.5 bg-gray-300" :class="isCompleted(2) && '!bg-black'" aria-hidden="true"></div>
                    <a href="#" class="group">
                        <div class="flex items-center space-x-5">
                            <div class="flex items-center justify-center w-4 h-4 rounded-full" :class="isActive(2) || isCompleted(2) ? 'bg-black' : 'bg-gray-300'">
                                <svg x-show="isCompleted(2)" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                            <div :class="isActive(2) && 'font-semibold'">Property Details</div>
                        </div>
                    </a>
                </li>
                <li class="relative">
                    <div class="absolute top-5 left-2 -ml-px mt-0.5 h-full w-0.5 bg-gray-300" :class="isCompleted(3) && '!bg-black'" aria-hidden="true"></div>
                    <a href="#" class="group">
                        <div class="flex items-center space-x-5">
                            <div class="flex items-center justify-center w-4 h-4 rounded-full" :class="isActive(3) || isCompleted(3) ? 'bg-black' : 'bg-gray-300'">
                                <svg x-show="isCompleted(3)" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                            <div :class="isActive(3) && 'font-semibold'">Rooms & Spaces</div>
                        </div>
                    </a>
                </li>
                <li class="relative">
                    <div class="absolute top-5 left-2 -ml-px mt-0.5 h-full w-0.5 bg-gray-300" :class="isCompleted(4) && '!bg-black'" aria-hidden="true"></div>
                    <a href="#" class="group">
                        <div class="flex items-center space-x-5">
                            <div class="flex items-center justify-center w-4 h-4 rounded-full" :class="isActive(4) || isCompleted(4) ? 'bg-black' : 'bg-gray-300'">
                                <svg x-show="isCompleted(4)" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                            <div :class="isActive(4) && 'font-semibold'">Amenities</div>
                        </div>
                    </a>
                </li>
                <li class="relative">
                    <div class="absolute top-5 left-2 -ml-px mt-0.5 h-full w-0.5 bg-gray-300" :class="isCompleted(5) && '!bg-black'" aria-hidden="true"></div>
                    <a href="#" class="group">
                        <div class="flex items-center space-x-5">
                            <div class="flex items-center justify-center w-4 h-4 rounded-full" :class="isActive(5) || isCompleted(5) ? 'bg-black' : 'bg-gray-300'">
                                <svg x-show="isCompleted(5)" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                            <div :class="isActive(5) && 'font-semibold'">Photos</div>
                        </div>
                    </a>
                </li>
                <li class="relative">
                    <div class="absolute top-5 left-2 -ml-px mt-0.5 h-full w-0.5 bg-gray-300" :class="isCompleted(6) && '!bg-black'" aria-hidden="true"></div>
                    <a href="#" class="group">
                        <div class="flex items-center space-x-5">
                            <div class="flex items-center justify-center w-4 h-4 rounded-full" :class="isActive(6) || isCompleted(6) ? 'bg-black' : 'bg-gray-300'">
                                <svg x-show="isCompleted(6)" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                            <div :class="isActive(6) && 'font-semibold'">Pricing</div>
                        </div>
                    </a>
                </li>
                <li class="relative">
                    <a href="#" class="group">
                        <div class="flex items-center space-x-5">
                            <div class="flex items-center justify-center w-4 h-4 rounded-full" :class="isActive(7) || isCompleted(6) ? 'bg-black' : 'bg-gray-300'">
                                <svg x-show="isCompleted(7)" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                            <div :class="isActive(7) && 'font-semibold'">Publish</div>
                        </div>
                    </a>
                </li>
            </ol>
        </nav>

    @endsection

    <div class="padding spacing">
        <div>
            <h1 class="page-heading">Property Setup</h1>
            <p class="page-desc">Before we can continue, let's add your very first property!</p>
        </div>

        {{-- Basic Information --}}
        <div x-show="step == 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="hidden" x-cloak class="spacing">
            <div class="panel padding spacing">
                <div>
                    <h2 class="panel-heading">Basic Information</h2>
                    <p class="panel-desc">The basic information about your property</p>
                </div>
                <div class="form">
                    <div class="col-span-full laptop:col-span-4">
                        <x-forms.text label="Property Name" model="property.name" />
                    </div>
                    <div class="col-span-full">
                        <x-forms.text label="Street Address" model="property.address.street" />
                    </div>
                    <div class="col-span-full laptop:col-span-2">
                        <x-forms.text label="City" model="property.address.city" />
                    </div>
                    <div class="col-span-full laptop:col-span-2">
                        {{-- <x-forms.text label="State" model="property.address.state" /> --}}
                        <x-forms.select label="State" model="property.address.state" :options="['AK' => 'Alaska', 'AZ' => 'Arizona', 'AR' => 'Arkansas', 'CA' => 'California', 'CO' => 'Colorado', 'CT' => 'Connecticut', 'DE' => 'Delaware', 'DC' => 'District Of Columbia', 'FL' => 'Florida', 'GA' => 'Georgia', 'HI' => 'Hawaii', 'ID' => 'Idaho', 'IL' => 'Illinois', 'IN' => 'Indiana', 'IA' => 'Iowa', 'KS' => 'Kansas', 'KY' => 'Kentucky', 'LA' => 'Louisiana', 'ME' => 'Maine', 'MD' => 'Maryland', 'MA' => 'Massachusetts', 'MI' => 'Michigan', 'MN' => 'Minnesota', 'MS' => 'Mississippi', 'MO' => 'Missouri', 'MT' => 'Montana', 'NE' => 'Nebraska', 'NV' => 'Nevada', 'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico', 'NY' => 'New York', 'NC' => 'North Carolina', 'ND' => 'North Dakota', 'OH' => 'Ohio', 'OK' => 'Oklahoma', 'OR' => 'Oregon', 'PA' => 'Pennsylvania', 'RI' => 'Rhode Island', 'SC' => 'South Carolina', 'SD' => 'South Dakota', 'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah', 'VT' => 'Vermont', 'VA' => 'Virginia', 'WA' => 'Washington', 'WV' => 'West Virginia', 'WI' => 'Wisconsin', 'WY' => 'Wyoming']" />
                    </div>
                    <div class="col-span-full laptop:col-span-2">
                        <x-forms.text label="Zip / Postal Code" model="property.address.zip" />
                    </div>
                </div>
            </div>
        </div>

        {{-- Property Details --}}
        <div x-show="step == 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="hidden" x-cloak class="spacing">
            <div class="panel padding spacing">
                <div>
                    <h2 class="panel-heading">Property Details</h2>
                    <p class="panel-desc">What does your property have to offer?</p>
                </div>
                <div class="form">
                    <div class="col-span-full laptop:col-span-3">
                        @if ($data_property_types)
                            <x-forms.select label="Property Type" model="property.details.type" :options="$data_property_types" />
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Rooms & Spaces --}}
        <div x-show="step == 3" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="hidden" x-cloak class="spacing">
            <div class="panel padding spacing">
                <div>
                    <h2 class="panel-heading">Rooms & Spaces</h2>
                    <p class="panel-desc">Add all of the rooms that are included in your guest's visit.</p>
                </div>

                <div class="spacing-sm">
                    <div>
                        <h3 class="title @error('property.bedrooms') text-red-500 @enderror">Bedrooms</h3>
                        <span class="subtitle">Add all of the bedrooms your property has to offer</span>
                    </div>
                    @if (isset($property['bedrooms']))
                        <div class="flex flex-col space-y-3">
                            @foreach ($property['bedrooms'] as $roomKey => $room)
                                <div class="flex flex-col card card-dark padding gap">
                                    <div class="">
                                        <x-forms.text label="Bedroom Name" desc="Master Bedroom, Guest Bedroom, Upstairs Kids Room, etc..." model="property.bedrooms.{{ $roomKey }}.name" class="input-light" />
                                    </div>
                                    @if (isset($property['bedrooms'][$roomKey]['beds']) && count($property['bedrooms'][$roomKey]['beds']) > 0)
                                        <div class="grid grid-cols-1 tablet:grid-cols-2 gap">
                                            @foreach ($property['bedrooms'][$roomKey]['beds'] as $bedKey => $bed)
                                                <div class="flex items-end space-x-2">
                                                    <div class="w-full">
                                                        <x-forms.select class="bg-white" label="Bed" model="property.bedrooms.{{ $roomKey }}.beds.{{ $bedKey }}.bed_type" :options="['Cali King' => 'Cali King', 'King' => 'King', 'Queen' => 'Queen', 'Full' => 'Full', 'Twin XL' => 'Twin XL', 'Twin' => 'Twin', 'Crib' => 'Crib', 'Futon' => 'Futon', 'Bunk beds' => 'Bunk beds', 'Sleeper sofa' => 'Sleeper sofa']" />
                                                    </div>
                                                    <div class="mb-0.5">
                                                        <button wire:click="removeBed('bedrooms', {{ $roomKey }}, {{ $bedKey }})">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-muted hover:text-red-500" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="flex justify-between">
                                        <button wire:click="addBed('bedrooms', {{ $roomKey }})" class="button button-sm button-white @error('property.bedrooms.' . $roomKey . '.beds') bg-red-100 border-red-500 @enderror">Add bed</button>
                                        <button wire:click="removeRoom('bedrooms', {{ $roomKey }})" class="button button-sm button-white">Remove bedroom</button>
                                    </div>
                                    <div class="space-y-2">
                                        <button wire:click="removeRoom('bedrooms', {{ $roomKey }})" class="button button-white">Remove bedroom</button>
                                        <button wire:click="removeRoom('bedrooms', {{ $roomKey }})" class="button button-sm button-white">Remove bedroom</button>
                                        <button wire:click="removeRoom('bedrooms', {{ $roomKey }})" class="button button-xs button-white">Remove bedroom</button>
                                    </div>
                                    @error('property.bedrooms.' . $roomKey . '.beds')
                                        <div class="text-sm text-red-500">
                                            {{ $errors->first('property.bedrooms.' . $roomKey . '.beds') }}
                                        </div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div>
                        <button wire:click="addRoom('bedrooms')" class="button button-light button-sm">Add bedroom</button>
                    </div>

                    @error('property.bedrooms')
                        <div class="text-red-500">
                            {{ $errors->first('property.bedrooms') }}
                        </div>
                    @enderror
                </div>

                <hr>

                <div class="spacing-sm">
                    <div>
                        <h3 class="title @error('property.areas') text-red-500 @enderror">Other common areas</h3>
                        <span class="subtitle">Common areas are any rooms that offer sleeping arragements that are not a dedicated sleeping area</span>
                    </div>
                    @if (isset($property['areas']))
                        <div class="flex flex-col space-y-3">
                            @foreach ($property['areas'] as $roomKey => $room)
                                <div class="flex flex-col card card-dark padding gap">
                                    <div class="">
                                        <x-forms.text label="Area Name" desc="Living room, Basement living room, Loft, etc..." model="property.areas.{{ $roomKey }}.name" class="input-light" />
                                    </div>
                                    @if (isset($property['areas'][$roomKey]['beds']) && count($property['areas'][$roomKey]['beds']) > 0)
                                        <div class="grid grid-cols-1 tablet:grid-cols-2 gap">
                                            @foreach ($property['areas'][$roomKey]['beds'] as $bedKey => $bed)
                                                <div class="flex items-end space-x-2">
                                                    <div class="w-full">
                                                        <x-forms.select class="bg-white" label="Bed" model="property.areas.{{ $roomKey }}.beds.{{ $bedKey }}.bed_type" :options="['Cali King' => 'Cali King', 'King' => 'King', 'Queen' => 'Queen', 'Full' => 'Full', 'Twin XL' => 'Twin XL', 'Twin' => 'Twin', 'Crib' => 'Crib', 'Futon' => 'Futon', 'Bunk beds' => 'Bunk beds', 'Sleeper sofa' => 'Sleeper sofa']" />
                                                    </div>
                                                    <div class="mb-0.5">
                                                        <button wire:click="removeBed('areas', {{ $roomKey }}, {{ $bedKey }})">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-muted hover:text-red-500" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="flex justify-between">
                                        <button wire:click="addBed('areas', {{ $roomKey }})" class="button button-sm button-white @error('property.areas.' . $roomKey . '.beds') bg-red-100 border-red-500 @enderror">Add bed</button>
                                        <button wire:click="removeRoom('areas', {{ $roomKey }})" class="button button-sm button-white">Remove area</button>
                                    </div>
                                    @error('property.areas.' . $roomKey . '.beds')
                                        <div class="text-sm text-red-500">
                                            {{ $errors->first('property.areas.' . $roomKey . '.beds') }}
                                        </div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div>
                        <button wire:click="addRoom('areas')" class="button button-light button-sm">Add area</button>
                    </div>

                    @error('property.areas')
                        <div class="text-red-500">
                            {{ $errors->first('property.areas') }}
                        </div>
                    @enderror
                </div>

                <hr>

                <div class="spacing-sm">
                    <div>
                        <h3 class="title @error('property.bathrooms') text-red-500 @enderror">Bathrooms</h3>
                        <span class="subtitle">Add all of the bathrooms this property has to offer</span>
                    </div>
                    @if (isset($property['bathrooms']))
                        <div class="flex flex-col space-y-3">
                            @foreach ($property['bathrooms'] as $roomKey => $room)
                                <div class="flex flex-col card card-dark padding gap">
                                    <div class="grid grid-cols-2 gap">
                                        <x-forms.text label="Bathroom Name" desc="Master Bath, Outside shower, etc..." model="property.bathrooms.{{ $roomKey }}.name" class="input-light" />
                                        <x-forms.select label="Bath Type" model="property.bathrooms.{{ $roomKey }}.bath_type" class="bg-white" :options="['Shower' => 'Shower', 'Half' => 'Half', 'Full' => 'Full']" />
                                    </div>
                                    <div class="flex justify-between">
                                        <button wire:click="removeRoom('bathrooms', {{ $roomKey }})" class="button button-sm button-white">Remove bathroom</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div>
                        <button wire:click="addRoom('bathrooms')" class="button button-light button-sm">Add Bathroom</button>
                    </div>
                    @error('property.bathrooms')
                        <div class="text-red-500">
                            {{ $errors->first('property.bathrooms') }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Property Details --}}
        <div x-show="step == 4" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="hidden" x-cloak class="spacing">
            <div class="panel padding spacing">
                <div>
                    <h2 class="panel-heading">Amenities</h2>
                    <p class="panel-desc">Describe what your property has to offer by adding some of these top amenities. You'll be able to add more after publishing your property.</p>
                </div>
                <fieldset>
                    <div class="border-gray-200 divide-y divide-gray-200">
                        <label class="relative flex items-start py-4">
                            <div class="flex-1 min-w-0 text-sm">
                                <div for="person-1" class="font-medium text-gray-700 select-none">Annette Black</div>
                            </div>
                            <div class="flex items-center h-5 ml-3">
                                <input id="person-1" name="person-1" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            </div>
                        </label>
                    </div>
                </fieldset>
            </div>
        </div>



        <div class="flex flex-row-reverse items-center justify-between">
            <button x-show="nextButton" x-cloak x-on:click="goNext" type="button" class="button button-dark">Continue</button>
            <button x-show="saveButton" x-cloak x-on:click="save" type="button" class="button button-dark">Publish Property</button>
            <button x-show="backButton" x-cloak x-on:click="goBack" type="button" class="button button-white">Go back</button>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('app', () => ({
                    step: @entangle('step'),
                    nextButton() {
                        return (this.step < 7) ? true : false
                    },
                    backButton() {
                        return (this.step > 1) ? true : false
                    },
                    saveButton() {
                        return (this.step === 7) ? true : false
                    },
                    goNext() {
                        @this.goNext()
                    },
                    goBack() {
                        this.step--
                    },
                    isActive(step) {
                        return this.step == step
                    },
                    isCompleted(step) {
                        return this.step > step
                    }
                }))
            })
        </script>
    @endpush

</x-layouts.host>
