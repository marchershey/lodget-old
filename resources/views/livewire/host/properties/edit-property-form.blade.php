<div class="flex flex-col space-y-5" wire:init="loadProperty()">

    @if ($noPhotoWarning)
        <div class="p-5 text-yellow-800 border border-yellow-200 rounded-lg bg-yellow-50">
            <span class="font-semibold">Warning!</span> Your property is hidden because you have not added any photos.
        </div>
    @endif

    <div class="panel-spacing">
        <div class="panel">
            <h3 class="panel-heading">Property Information</h3>
            <div class="panel-body">
                {{-- Name --}}
                <div>
                    <label for="name" class="input-label @error('name') text-red-500 @enderror">Property Name</label>
                    <input type="text" id="name" class="input capitalize @error('name') bg-red-50 border-red-500 @enderror" wire:model.live.blur="name">
                </div>

                {{-- Address --}}
                <div class="grid grid-cols-2 gap-y-3 gap-x-5">
                    <div class="col-span-2">
                        <label for="street" class="input-label @error('street') text-red-500 @enderror">Street Address</label>
                        <input type="text" id="street" class="input capitalize @error('street') bg-red-50 border-red-500 @enderror" wire:model.live.blur="street">
                    </div>
                    <div class="col-span-2">
                        <label for="city" class="input-label @error('city') text-red-500 @enderror">City</label>
                        <input type="text" id="city" class="input capitalize @error('city') bg-red-50 border-red-500 @enderror" wire:model.live.blur="city">
                    </div>
                    <div>
                        <label for="state" class="input-label @error('state') text-red-500 @enderror">State</label>
                        <select id="state" class="truncate input @error('state') bg-red-50 border-red-500 @enderror" wire:model.live="state">
                            <option value=""></option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <div>
                        <label for="zip" class="input-label @error('zip') text-red-500 @enderror">Zip</label>
                        <input type="text" id="zip" class="input @error('zip') bg-red-50 border-red-500 @enderror" wire:model.live.blur="zip">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Property Details --}}
    <div class="panel">
        <h3 class="panel-heading">Property Details</h3>
        <div class="panel-body">
            <div class="space-y-2">
                <label for="type" class="input-label @error('type') text-red-500 @enderror">Property Type</label>
                <select id="type" class="input @error('type') bg-red-50 border-red-500 @enderror" wire:model.live="type">
                    <option value=""></option>
                    <option value="House">House</option>
                    <option value="Apartment">Apartment</option>
                    <option value="Cabin">Cabin</option>
                    <option value="Villa">Villa</option>
                    <option value="Townhouse">Townhouse</option>
                    <option value="Cottage">Cottage</option>
                    <option value="Bungalow">Bungalow</option>
                    <option value="Houseboat">Houseboat</option>
                    <option value="Hut">Hut</option>
                    <option value="Farm">Farm</option>
                    <option value="Dome">Dome</option>
                    <option value="Chalet">Chalet</option>
                </select>
            </div>
            <div class="grid grid-cols-2 gap-5 xl:grid-cols-4">
                <div x-data="{
                    value: @entangle('guests').live,
                    step: 1,
                    min: 0,
                    max: 99,
                    add() { this.value = (this.addDisabled) ? (this.value + this.step) : this.value },
                    subtract() { this.value = (this.subtractDisabled) ? (this.value - this.step) : this.value },
                    addDisabled() { return this.value >= this.max },
                    subtractDisabled() { return this.value <= this.min }
                }">
                    <label for="guests">
                        <span class="text-sm font-medium text-gray-700 @error('guests') text-red-500 @enderror">Guests</span>
                        <div class="focus-within:ring-primary focus-within:border-primary mt-1 flex w-full max-w-[200px] overflow-hidden group rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm @error('guests') border-red-500 @enderror">
                            <button type="button" x-on:click="subtract()" x-bind:disabled="subtractDisabled" class="px-3 mr-px text-gray-600 bg-gray-100 border-r border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-primary focus-visible:bg-primary focus-visible:text-white focus-visible:outline-none focus-visible:ring-primary active:bg-primary active:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <input x-model.value="value" type="text" id="guests" class="w-full border-none px-3 py-1.5 text-center focus:outline-none bg-gray-50 group-focus-within:bg-white focus:ring-0 @error('guests') bg-red-50 @enderror" tabindex="-1" readonly />
                            <button type="button" x-on:click="add()" x-bind:disabled="addDisabled" class="px-3 text-gray-600 bg-gray-100 border-l border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-primary focus-visible:bg-primary focus-visible:text-white focus-visible:outline-none focus-visible:ring-primary active:bg-primary active:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                    </label>
                </div>
                <div x-data="{
                    value: $wire.$entangle('beds', true),
                    step: 1,
                    min: 0,
                    max: 99,
                    add() { this.value = (this.addDisabled) ? (this.value + this.step) : this.value },
                    subtract() { this.value = (this.subtractDisabled) ? (this.value - this.step) : this.value },
                    addDisabled() { return this.value >= this.max },
                    subtractDisabled() { return this.value <= this.min }
                }">
                    <label for="beds">
                        <span class="text-sm font-medium text-gray-700 @error('beds') text-red-500 @enderror">Beds</span>
                        <div class="focus-within:ring-primary group focus-within:border-primary mt-1 flex w-full max-w-[200px] overflow-hidden rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm @error('beds') border-red-500 @enderror">
                            <button type="button" x-on:click="subtract()" x-bind:disabled="subtractDisabled" class="px-3 mr-px text-gray-600 bg-gray-100 border-r border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-primary focus-visible:bg-primary focus-visible:text-white focus-visible:outline-none focus-visible:ring-primary active:bg-primary active:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <input x-model.value="value" type="text" id="beds" class="w-full border-none px-3 py-1.5 text-center bg-gray-50 group-focus-within:bg-white focus:outline-none focus:ring-0" tabindex="-1" readonly />
                            <button type="button" x-on:click="add()" x-bind:disabled="addDisabled" class="px-3 text-gray-600 bg-gray-100 border-l border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-primary focus-visible:bg-primary focus-visible:text-white focus-visible:outline-none focus-visible:ring-primary active:bg-primary active:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                    </label>
                </div>
                <div x-data="{
                    value: $wire.$entangle('bedrooms', true),
                    step: 1,
                    min: 0,
                    max: 99,
                    add() { this.value = (this.addDisabled) ? (this.value + this.step) : this.value },
                    subtract() { this.value = (this.subtractDisabled) ? (this.value - this.step) : this.value },
                    addDisabled() { return this.value >= this.max },
                    subtractDisabled() { return this.value <= this.min }
                }">
                    <label for="bedrooms">
                        <span class="text-sm font-medium text-gray-700 @error('bedrooms') text-red-500 @enderror">Bedrooms</span>
                        <div class="focus-within:ring-primary focus-within:border-primary group mt-1 flex w-full max-w-[200px] overflow-hidden rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm @error('bedrooms') border-red-500 @enderror">
                            <button type="button" x-on:click="subtract()" x-bind:disabled="subtractDisabled" class="px-3 mr-px text-gray-600 bg-gray-100 border-r border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-primary focus-visible:bg-primary focus-visible:text-white focus-visible:outline-none focus-visible:ring-primary active:bg-primary active:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <input x-model.value="value" type="text" id="bedrooms" class="w-full border-none px-3 py-1.5 text-center bg-gray-50 group-focus-within:bg-white focus:outline-none focus:ring-0" tabindex="-1" readonly />
                            <button type="button" x-on:click="add()" x-bind:disabled="addDisabled" class="px-3 text-gray-600 bg-gray-100 border-l border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-primary focus-visible:bg-primary focus-visible:text-white focus-visible:outline-none focus-visible:ring-primary active:bg-primary active:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                    </label>
                </div>
                <div x-data="{
                    value: $wire.$entangle('bathrooms', true),
                    step: 0.5,
                    min: 0,
                    max: 99,
                    add() { this.value = (this.addDisabled) ? (this.value + this.step) : this.value },
                    subtract() { this.value = (this.subtractDisabled) ? (this.value - this.step) : this.value },
                    addDisabled() { return this.value >= this.max },
                    subtractDisabled() { return this.value <= this.min }
                }">
                    <label for="bathrooms">
                        <span class="text-sm font-medium text-gray-700 @error('bathrooms') text-red-500 @enderror">Bathrooms</span>
                        <div class="focus-within:ring-primary focus-within:border-primary mt-1 flex group w-full max-w-[200px] overflow-hidden rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm @error('bathrooms') border-red-500 @enderror">
                            <button type="button" x-on:click="subtract()" x-bind:disabled="subtractDisabled" class="px-3 mr-px text-gray-600 bg-gray-100 border-r border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-primary focus-visible:bg-primary focus-visible:text-white focus-visible:outline-none focus-visible:ring-primary active:bg-primary active:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <input x-model.value="value" type="text" id="bathrooms" class="w-full border-none bg-gray-50 group-focus-within:bg-white px-3 py-1.5 text-center focus:outline-none focus:ring-0" tabindex="-1" readonly />
                            <button type="button" x-on:click="add()" x-bind:disabled="addDisabled" class="px-3 text-gray-600 bg-gray-100 border-l border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-primary focus-visible:bg-primary focus-visible:text-white focus-visible:outline-none focus-visible:ring-primary active:bg-primary active:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>

    {{-- Photos --}}
    <div class="panel">
        <h3 class="panel-heading">Photos</h3>
        <div class="panel-body">
            <div class="flex items-center whitespace-nowrap">
                <label for="file-upload">
                    <input wire:model.live="stagedPhotos" id="photo-upload" type="file" accept="image/png, image/jpeg" class="sr-only" multiple>
                    <button type="button" onclick="document.getElementById('photo-upload').click()" class="button">
                        <span>Select Photos</span>
                    </button>
                </label>
            </div>

            @if ($stagedPhotos)
                <div class="p-5 space-y-5 bg-gray-100 border border-gray-200 rounded-lg">
                    <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($stagedPhotos as $key => $photo)
                            <div wire:key="staged-photo-{{ $key }}" wire:click="deleteStagedPhoto({{ $key }})" class="block w-full overflow-hidden bg-gray-100 rounded-lg cursor-pointer group aspect-w-10 aspect-h-7">
                                <img src="{{ $photo->temporaryUrl() }}" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if ($uploadedPhotos)
                <div class="grid grid-cols-2 gap-3 sm:grid-cols-3 md:grid-cols-2 lg:grid-cols-3 focus-visible:outline-none">
                    @foreach ($uploadedPhotos as $key => $photo)
                        <div wire:key="uploaded-photo-{{ $key }}" class="relative bg-gray-100 border border-gray-200 rounded-lg focus-visible:outline-none" data-photo-id="{{ $photo['id'] }}">
                            <div class="block w-full overflow-hidden bg-gray-100 rounded-t-lg group aspect-w-10 aspect-h-7">
                                <img src="/storage/{{ $photo['path'] }}" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                            </div>
                            <div x-data="{ open: false }" class="flex items-center justify-between p-2">
                                <div class="font-medium truncate pointer-events-none">
                                    <p class="block text-sm truncate">{{ $photo['name'] }}</p>
                                    <p class="block text-xs text-muted">{{ number_format($photo['size'] / 1e6, 2) }}MB</p>
                                </div>
                                <div class="relative inline-block text-left">
                                    <div x-on:click="open = !open">
                                        <button type="button" class="flex items-center text-muted-light hover:text-red-500 focus:outline-none" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                            <span class="sr-only">Open options</span>
                                            <!-- Heroicon name: solid/dots-vertical -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="4" y1="7" x2="20" y2="7"></line>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div x-show="open" x-cloak x-on:click="open = false" x-on:click.away="open = false" class="absolute right-0 z-10 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                        <div wire:click="deleteUploadedPhoto({{ $key }}, {{ $photo['id'] }})" class="flex items-center px-4 py-2 space-x-2 text-sm text-red-500 cursor-pointer select-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="4" y1="7" x2="20" y2="7"></line>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                            </svg>
                                            <span>Delete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-xs text-muted">
                    <strong>Note:</strong> To reorder the photos, simply drag the photo to a new position.
                </div>
            @endif
        </div>
    </div>

    {{-- Amenities --}}
    <div class="panel">
        <h3 class="panel-heading">Amenities</h3>
        <div class="panel-body">
            <form wire:submit="addAmenity" class="grid grid-cols-2 gap-5">
                <div class="w-full">
                    <input wire:model.live="amenity" type="text" class="mt-0 input" placeholder="Type amenities name here...">
                </div>
                <button type="submit" class="w-auto button whitespace-nowrap button-light">Add Amenities</button>
            </form>

            @if ($amenities)
                <div class="flex flex-col space-y-3">
                    <div class="flex items-center space-x-3">
                        @foreach ($amenities as $key => $amenity)
                            <div wire:click="removeAmenity({{ $key }})" class="inline-flex items-center px-2 py-1 border border-gray-200 rounded-lg cursor-pointer bg-gray-50 hover:bg-red-50 hover:border-red-200">
                                <span class="mt-px">{{ $amenity }}</span>
                            </div>
                        @endforeach
                    </div>
                    <span class="text-sm text-muted"><span class="font-medium">Note:</span> Click on an amenity to remove it.</span>
                </div>
            @endif
        </div>
    </div>

    {{-- Rates & fees --}}
    <div class="panel">
        <h3 class="panel-heading">Rates & Fees</h3>
        <div class="panel-body">
            <div class="flex items-center justify-between" x-data="{ active: @entangle('active').live }">
                <span class="flex flex-col flex-grow w-full">
                    <span class="text-sm font-medium text-gray-900" id="availability-label">Nightly Rate</span>
                    <span class="text-sm text-gray-500" id="availability-description">Amount to charge per night</span>
                </span>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <span class="text-gray-500 sm:text-sm"> $ </span>
                    </div>
                    <input wire:model.live="default_rate" type="text" name="rate" id="rate" class="pl-6 mt-0 input" placeholder="0.00">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <span class="text-gray-500 sm:text-sm"> USD </span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="flex items-center justify-between" x-data="{ active: @entangle('active').live }">
                <span class="flex flex-col flex-grow w-full">
                    <span class="text-sm font-medium text-gray-900" id="availability-label">Tax Rate</span>
                    <span class="text-sm text-gray-500" id="availability-description">The percentage to charge for tax</span>
                </span>
                <div class="relative">
                    <input wire:model.live="default_tax" type="text" name="tax" id="tax" class="pr-6 mt-0 text-right input" placeholder="0">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <span class="text-gray-500 sm:text-sm" id="tax-icon"> % </span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="flex items-center justify-between" x-data="{ active: @entangle('active').live }">
                <span class="flex flex-col flex-grow w-full">
                    <span class="text-sm font-medium text-gray-900" id="availability-label">Security Deposit</span>
                    <span class="text-sm text-gray-500" id="availability-description">Amount to charge for security deposit</span>
                </span>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <span class="text-gray-500 sm:text-sm"> $ </span>
                    </div>
                    <input wire:model.live="deposit" type="text" name="rate" id="rate" class="pl-6 mt-0 input" placeholder="0.00">
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <span class="text-gray-500 sm:text-sm"> USD </span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="flex items-center justify-between" x-data="{ active: @entangle('active').live }">
                <span class="flex flex-col flex-grow w-full">
                    <span class="text-sm font-medium text-gray-900" id="availability-label">Rates Calendar</span>
                    <span class="text-sm text-gray-500" id="availability-description">Edit the rates on specific days</span>
                </span>
                <livewire:host.properties.rates-calendar :property="$property" />
            </div>
            <hr>
            <div class="flex items-center justify-between" x-data="{ active: @entangle('active').live }">
                <span class="flex flex-col flex-grow w-full">
                    <span class="text-sm font-medium text-gray-900" id="availability-label">Additonal Fees</span>
                    <span class="text-sm text-gray-500" id="availability-description">Add any additional fees to charge the guest</span>
                </span>
                <div>
                    <button class="button whitespace-nowrap button-light" wire:click="addFee">Add additional fees</button>
                </div>
            </div>
            @if (count($fees) > 0)
                <div class="flex flex-col space-y-3">
                    <hr>
                    <x-alert type="warning">
                        <div><span class="font-medium">Warning.</span> Percentage fees are applied towards the total base rate only.</div>
                    </x-alert>
                    @foreach ($fees as $key => $fee)
                        <div class="grid grid-cols-4 mb-2 gap-x-5" wire:key="fees-{{ $key }}">
                            <div>
                                <label for="fees-{{ $key }}-name" class="input-label">Name</label>
                                <input wire:model.live="fees.{{ $key }}.name" type="text" id="fees-{{ $key }}-name" class="input" placeholder="Fee name">
                            </div>
                            <div>
                                <label for="fees-{{ $key }}-amount" class="input-label">Amount</label>
                                <div class="relative mt-1">
                                    @if ($fees[$key]['type'] == 'fixed')
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm"> $ </span>
                                        </div>
                                        <input wire:model.live="fees.{{ $key }}.amount" type="text" name="fees-{{ $key }}-amount" id="fees-{{ $key }}-amount" class="pl-6 input" placeholder="0.00">
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <span class="text-gray-500 sm:text-sm"> USD </span>
                                        </div>
                                    @else
                                        <div class="relative mt-1">
                                            <input wire:model.live="fees.{{ $key }}.amount" type="text" name="fees-{{ $key }}-amount" id="fees-{{ $key }}-amount" class="pr-6 input" placeholder="0">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm"> % </span>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div>
                                <label for="fees-{{ $key }}-type" class="input-label">Type</label>
                                <div class="flex mt-4 space-x-4">
                                    <div class="flex items-center">
                                        <input wire:model.live="fees.{{ $key }}.type" value="fixed" id="fees-{{ $key }}-type-fixed" name="fees-{{ $key }}-type" type="radio" class="w-4 h-4 border-gray-300 text-primary focus:ring-primary">
                                        <label for="fees-{{ $key }}-type-fixed" class="block ml-3 text-sm font-medium text-gray-700"> Fixed </label>
                                    </div>

                                    <div class="flex items-center">
                                        <input wire:model.live="fees.{{ $key }}.type" value="percentage" id="fees-{{ $key }}-type-percentage" name="fees-{{ $key }}-type" type="radio" class="w-4 h-4 border-gray-300 text-primary focus:ring-primary">
                                        <label for="fees-{{ $key }}-type-percentage" class="block ml-3 text-sm font-medium text-gray-700"> Percentage </label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex items-center justify-end mt-7">
                                <button wire:click="removeFee({{ $key }})">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    {{-- Listing --}}
    <div class="panel">
        <h3 class="panel-heading">Listing Information</h3>
        <div class="panel-body">
            <div>
                <label for="headline" class="input-label @error('headline') text-red-500 @enderror">Headline</label>
                <input type="text" id="headline" class="input @error('headline') bg-red-50 border-red-500 @enderror" wire:model.live.blur="headline">
            </div>
            <div>
                <label for="description" class="input-label @error('description') text-red-500 @enderror">Description</label>
                <textarea rows="6" id="description" class="input @error('description') bg-red-50 border-red-500 @enderror" wire:model.live.blur="description"></textarea>
            </div>
        </div>
    </div>

    {{-- Options --}}
    <div class="panel">
        <h3 class="panel-heading">Options</h3>
        <div class="panel-body">
            <div class="flex items-center justify-between" x-data="{ active: @entangle('active').live }">
                <span class="flex flex-col flex-grow">
                    <span class="text-sm font-medium text-gray-900" id="availability-label">Active</span>
                    <span class="text-sm text-gray-500" id="availability-description">Choose whether this property is visible to guests or not.</span>
                </span>
                <button x-on:click="active = !active" :class="active ? 'bg-primary' : 'bg-gray-200'" type="button" class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer w-11 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary" role="switch" aria-checked="false" aria-labelledby="availability-label" aria-describedby="availability-description">
                    <span :class="active ? 'translate-x-5' : 'translate-x-0'" aria-hidden="true" class="inline-block w-5 h-5 transition duration-200 ease-in-out transform bg-white rounded-full shadow pointer-events-none ring-0"></span>
                </button>
            </div>
            <hr>
            <div class="flex items-center justify-between" x-data="{ active: @entangle('active').live }">
                <span class="flex flex-col flex-grow w-full">
                    <span class="text-sm font-medium text-gray-900" id="availability-label">Property Slug</span>
                    <span class="text-sm text-gray-500" id="availability-description">Change the property's URL slug</span>
                </span>
                <input wire:model.live="slug" type="text" class="input">
            </div>
            <hr>
            <div x-data="{
                value: $wire.$entangle('min_nights', true),
                step: 1,
                min: 1,
                max: 99,
                add() { this.value = (this.addDisabled) ? (this.value + this.step) : this.value },
                subtract() { this.value = (this.subtractDisabled) ? (this.value - this.step) : this.value },
                addDisabled() { return this.value >= this.max },
                subtractDisabled() { return this.value <= this.min }
            }">
                <div class="flex items-center justify-between" x-data="{ active: @entangle('active').live }">
                    <span class="flex flex-col flex-grow w-full">
                        <span class="text-sm font-medium text-gray-900" id="availability-label">Minimum Nights</span>
                        <span class="text-sm text-gray-500" id="availability-description">Require guests to stay a certain number of nights</span>
                    </span>
                    <div class="focus-within:ring-primary group focus-within:border-primary mt-1 flex w-full max-w-[200px] overflow-hidden rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm @error('beds') border-red-500 @enderror">
                        <button type="button" x-on:click="subtract()" x-bind:disabled="subtractDisabled" class="px-3 mr-px text-gray-600 bg-gray-100 border-r border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-primary focus-visible:bg-primary focus-visible:text-white focus-visible:outline-none focus-visible:ring-primary active:bg-primary active:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </button>
                        <input x-model.value="value" type="text" id="beds" class="w-full border-none px-3 py-1.5 text-center bg-gray-50 group-focus-within:bg-white focus:outline-none focus:ring-0" tabindex="-1" readonly />
                        <button type="button" x-on:click="add()" x-bind:disabled="addDisabled" class="px-3 text-gray-600 bg-gray-100 border-l border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-primary focus-visible:bg-primary focus-visible:text-white focus-visible:outline-none focus-visible:ring-primary active:bg-primary active:text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-between">
        <a href="{{ route('host.properties') }}" class="w-auto button button-light" wire:click="submit">Cancel</a>
        <button class="w-auto button" wire:click="submit">Update Property</button>
    </div>
</div>
