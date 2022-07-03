<div class="flex flex-col space-y-5" wire:init="loadProperty()">

    {{-- Property information --}}
    <div class="w-full panel">
        <div class="flex flex-col w-full space-y-3">
            <h3 class="panel-heading">Property Information</h3>
            {{-- Name --}}
            <div>
                <label for="name" class="input-label @error('name') text-red-500 @enderror">Property Name</label>
                <input type="text" id="name" class="input capitalize @error('name') bg-red-50 border-red-500 @enderror" wire:model.lazy="name">
            </div>

            {{-- Address --}}
            <div class="grid grid-cols-2 gap-y-3 gap-x-5">
                <div class="col-span-2">
                    <label for="street" class="input-label @error('street') text-red-500 @enderror">Street Address</label>
                    <input type="text" id="street" class="input capitalize @error('street') bg-red-50 border-red-500 @enderror" wire:model.lazy="street">
                </div>
                <div class="col-span-2">
                    <label for="city" class="input-label @error('city') text-red-500 @enderror">City</label>
                    <input type="text" id="city" class="input capitalize @error('city') bg-red-50 border-red-500 @enderror" wire:model.lazy="city">
                </div>
                <div>
                    <label for="state" class="input-label @error('state') text-red-500 @enderror">State</label>
                    <select id="state" class="truncate input @error('state') bg-red-50 border-red-500 @enderror" wire:model="state">
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
                    <input type="text" id="zip" class="input @error('zip') bg-red-50 border-red-500 @enderror" wire:model.lazy="zip">
                </div>
            </div>
        </div>
    </div>

    <div class="w-full panel">
        <div class="flex flex-col space-y-3">

            <h3 class="panel-heading">Property Details</h3>
            <div class="space-y-2">
                <label for="type" class="input-label @error('type') text-red-500 @enderror">Property Type</label>
                <select id="type" class="input @error('type') bg-red-50 border-red-500 @enderror" wire:model="type">
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
                    value: $wire.entangle('guests'),
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
                        <div class="focus-within:ring-primary focus-within:border-primary mt-1 flex w-full max-w-[200px] overflow-hidden rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm @error('guests') border-red-500 @enderror">
                            <button type="button" x-on:click="subtract()" x-bind:disabled="subtractDisabled" class="px-3 mr-px text-gray-600 bg-gray-100 border-r border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-primary focus-visible:bg-primary focus-visible:text-white focus-visible:outline-none focus-visible:ring-primary active:bg-primary active:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <input x-model.value="value" type="text" id="guests" class="w-full border-none px-3 py-1.5 text-center focus:outline-none focus:ring-0 @error('guests') bg-red-50 @enderror" tabindex="-1" readonly />
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
                    value: $wire.entangle('beds'),
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
                        <div class="focus-within:ring-primary focus-within:border-primary mt-1 flex w-full max-w-[200px] overflow-hidden rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm @error('beds') border-red-500 @enderror">
                            <button type="button" x-on:click="subtract()" x-bind:disabled="subtractDisabled" class="px-3 mr-px text-gray-600 bg-gray-100 border-r border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-primary focus-visible:bg-primary focus-visible:text-white focus-visible:outline-none focus-visible:ring-primary active:bg-primary active:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <input x-model.value="value" type="text" id="beds" class="w-full border-none px-3 py-1.5 text-center focus:outline-none focus:ring-0" tabindex="-1" readonly />
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
                    value: $wire.entangle('bedrooms'),
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
                        <div class="focus-within:ring-primary focus-within:border-primary mt-1 flex w-full max-w-[200px] overflow-hidden rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm @error('bedrooms') border-red-500 @enderror">
                            <button type="button" x-on:click="subtract()" x-bind:disabled="subtractDisabled" class="px-3 mr-px text-gray-600 bg-gray-100 border-r border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-primary focus-visible:bg-primary focus-visible:text-white focus-visible:outline-none focus-visible:ring-primary active:bg-primary active:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <input x-model.value="value" type="text" id="bedrooms" class="w-full border-none px-3 py-1.5 text-center focus:outline-none focus:ring-0" tabindex="-1" readonly />
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
                    value: $wire.entangle('bathrooms'),
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
                        <div class="focus-within:ring-primary focus-within:border-primary mt-1 flex w-full max-w-[200px] overflow-hidden rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm @error('bathrooms') border-red-500 @enderror">
                            <button type="button" x-on:click="subtract()" x-bind:disabled="subtractDisabled" class="px-3 mr-px text-gray-600 bg-gray-100 border-r border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-primary focus-visible:bg-primary focus-visible:text-white focus-visible:outline-none focus-visible:ring-primary active:bg-primary active:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                            </button>
                            <input x-model.value="value" type="text" id="bathrooms" class="w-full border-none px-3 py-1.5 text-center focus:outline-none focus:ring-0" tabindex="-1" readonly />
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

    <div class="w-full panel">
        <div class="flex flex-col space-y-3">
            <h3 class="panel-heading">Photos</h3>
            <div class="flex items-center whitespace-nowrap">
                <label x-show="!isUploading" for="file-upload">
                    <input wire:model="stagedPhotos" id="photo-upload" type="file" accept="image/png, image/jpeg" class="sr-only" multiple>
                    <button type="button" onclick="document.getElementById('photo-upload').click()" class="button button-gray">
                        <span>Select Photos</span>
                    </button>
                </label>

                <div x-show="isUploading" x-cloak class="flex items-center w-full space-x-5">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3 -ml-1 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="text-gray-200" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="text-primary/80" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <div class="text-sm font-medium text-gray-700">Uploading...</div>
                    </div>
                    <!-- Progress Bar -->
                    <div x-show="isUploading" x-cloak class="relative w-full h-5 overflow-hidden bg-gray-200 rounded-full">
                        <div class="absolute h-full p-1 overflow-hidden text-xs font-medium leading-none text-center text-white bg-blue-600 rounded-l-full whitespace-nowrap" :style="{ 'width': progress + '%' }"><span x-text="progress" class=""></span>%</div>
                    </div>
                </div>
            </div>

            @if ($stagedPhotos)
                <div class="p-5 space-y-5 bg-gray-100 rounded-lg">
                    <div class="grid grid-cols-3 gap-2 sm:grid-cols-4 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-4">
                        @foreach ($stagedPhotos as $key => $photo)
                            <div wire:click="removeStagedPhoto({{ $key }})" class="block w-full overflow-hidden bg-gray-100 rounded-lg cursor-pointer group aspect-w-10 aspect-h-7 draggable--handle">
                                <img src="{{ $photo->temporaryUrl() }}" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                            </div>
                        @endforeach
                    </div>
                    <div class="text-xs text-muted">
                        <strong>Note:</strong> Click/Tap a photo to delete it. Also, you need to save these photos before you can reorder them.
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
