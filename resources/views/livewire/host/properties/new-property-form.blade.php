<div x-show="newPropertySlideover">
    <div wire:init>
        asdf
    </div>
</div>


<x-slideover xdata="newPropertySlideover" title="New Property" desc="Get started by filling in the information below to add your new property.">
    <div>
        <div class="flex flex-col space-y-8">

            {{-- Property Information --}}
            <div class="flex flex-col space-y-3">
                <h3 class="panel-heading">Property Information</h3>
                {{-- Name --}}
                <div>
                    <label for="name" class="input-label">Property Name</label>
                    <input type="text" id="name" class="input" wire:model="name">
                </div>

                {{-- Address --}}
                <div>
                    <label for="street" class="input-label">Street Address</label>
                    <input type="text" id="street" class="input" wire:model="street">
                </div>
                <div>
                    <label for="city" class="input-label">City</label>
                    <input type="text" id="city" class="input" wire:model="city">
                </div>
                <div>
                    <label for="state" class="input-label">State</label>
                    <select id="state" class="truncate input" wire:model="state">
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
                    <label for="zip" class="input-label">Zip</label>
                    <input type="text" id="zip" class="input" wire:model="zip">
                </div>
            </div>

            {{-- Property Details --}}
            <div class="flex flex-col space-y-3">
                <h3 class="panel-heading">Property Details</h3>
                <div class="space-y-2">
                    <label for="type" class="input-label">Property Type</label>
                    <select id="type" class="input" wire:model="type">
                        <option>House</option>
                        <option>Apartment</option>
                        <option>Cabin</option>
                        <option>Villa</option>
                        <option>Townhouse</option>
                        <option>Cottage</option>
                        <option>Bungalow</option>
                        <option>Houseboat</option>
                        <option>Hut</option>
                        <option>Farm</option>
                        <option>Dome</option>
                        <option>Chalet</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-5">
                    <div x-data="{
                        value: $wire.entangle('guests'),
                        step: 1,
                        min: 1,
                        max: 99,
                        add() { this.value = (this.addDisabled) ? (this.value + this.step) : this.value },
                        subtract() { this.value = (this.subtractDisabled) ? (this.value - this.step) : this.value },
                        addDisabled() { return this.value >= this.max },
                        subtractDisabled() { return this.value <= this.min }
                    }">
                        <label for="guests">
                            <span class="text-sm font-medium text-gray-700">Guests</span>
                            <div class="focus-within:ring-primary focus-within:border-primary mt-1 flex w-full max-w-[200px] overflow-hidden rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm">
                                <button type="button" x-on:click="subtract()" x-bind:disabled="subtractDisabled" class="px-3 mr-px text-gray-600 bg-gray-100 border-r border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-primary focus-visible:bg-primary focus-visible:text-white focus-visible:outline-none focus-visible:ring-primary active:bg-primary active:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </button>
                                <input x-model.value="value" type="text" id="guests" class="w-full border-none px-3 py-1.5 text-center focus:outline-none focus:ring-0" tabindex="-1" readonly />
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
                            <span class="text-sm font-medium text-gray-700">Beds</span>
                            <div class="focus-within:ring-primary focus-within:border-primary mt-1 flex w-full max-w-[200px] overflow-hidden rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm">
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
                            <span class="text-sm font-medium text-gray-700">Bedrooms</span>
                            <div class="focus-within:ring-primary focus-within:border-primary mt-1 flex w-full max-w-[200px] overflow-hidden rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm">
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
                            <span class="text-sm font-medium text-gray-700">Bathrooms</span>
                            <div class="focus-within:ring-primary focus-within:border-primary mt-1 flex w-full max-w-[200px] overflow-hidden rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm">
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
    </div>

    <x-slot:submit>
        <button wire:click="submit" type="submit" class="inline-flex justify-center px-4 py-2 ml-4 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">Save</button>
    </x-slot:submit>
</x-slideover>
