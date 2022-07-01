<x-layouts.host :asideTop="true" x-data="{ addProperty: true }">

    <div>
        <x-slot:aside>
            <button class="w-full button" x-on:click="addProperty = true">Add New Property</button>
        </x-slot:aside>

        <div class="panel"></div>

        <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" x-show="addProperty" x-cloak>
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 bg-black/75 overscroll-contain"></div>

            <div class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="fixed inset-y-0 right-0 flex max-w-full pointer-events-none sm:pl-16">
                        <!--
                Slide-over panel, show/hide based on slide-over state.
      
                Entering: "transform transition ease-in-out duration-500 sm:duration-700"
                  From: "translate-x-full"
                  To: "translate-x-0"
                Leaving: "transform transition ease-in-out duration-500 sm:duration-700"
                  From: "translate-x-0"
                  To: "translate-x-full"
              -->
                        <div class="w-screen max-w-md pointer-events-auto">
                            <form class="flex flex-col h-full bg-white divide-y divide-gray-200 shadow-xl">
                                <div class="flex-1 h-0 overflow-y-auto">
                                    <div class="px-4 py-6 bg-primary-dark sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <h2 class="text-lg font-medium text-white" id="slide-over-title">New Property</h2>
                                            <div class="flex items-center ml-3 h-7">
                                                <button type="button" class="rounded-md text-primary-muted bg-primary-dark hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                                                    <span class="sr-only">Close panel</span>
                                                    <!-- Heroicon name: outline/x -->
                                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-1">
                                            <p class="text-sm text-primary-muted">Get started by filling in the information below to add your new property.</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col justify-between flex-1">
                                        <div class="px-4 divide-y divide-gray-200 sm:px-6">
                                            <div class="pt-6 pb-5 space-y-6">
                                                <h3 class="panel-heading">Property Information</h3>
                                                <div>
                                                    <label for="" class="input-label">Property Name</label>
                                                    <input type="text" name="" id="" class="input">
                                                </div>
                                                <div>
                                                    <label for="" class="input-label">Street Address</label>
                                                    <input type="text" name="" id="" class="input">
                                                </div>


                                                <h3 class="panel-heading">Property Details</h3>
                                                <div class="space-y-2">
                                                    <label for="type" class="input-label">Property Type</label>
                                                    <select id="type" name="type" class="input">
                                                        <option>Full house</option>
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
                                                    <p class="ml-1 input-desc">This will be used as a badge for your property listing card.</p>
                                                </div>
                                                <div class="grid grid-cols-2 gap-5">
                                                    <div x-data="{
                                                        value: 1,
                                                        step: 1,
                                                        min: 1,
                                                        max: 5,
                                                        add() { this.value = (this.addDisabled) ? (this.value + this.step) : this.value },
                                                        subtract() { this.value = (this.subtractDisabled) ? (this.value - this.step) : this.value },
                                                        addDisabled() { return this.value >= this.max },
                                                        subtractDisabled() { return this.value <= this.min }
                                                    }">
                                                        <label for="asdf">
                                                            <span class="text-sm font-medium text-gray-700">Guests</span>
                                                            <div class="focus-within:ring-primary focus-within:border-primary mt-1 flex w-full max-w-[200px] overflow-hidden rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm">
                                                                <button type="button" x-on:click="subtract()" x-bind:disabled="subtractDisabled" class="px-3 mr-px text-gray-600 bg-gray-100 border-r border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-blue-600 focus-visible:bg-blue-600 focus-visible:text-white focus-visible:outline-none focus-visible:ring-blue-600 active:bg-blue-600 active:text-white">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                    </svg>
                                                                </button>
                                                                <input x-model.value="value" type="text" name="asdf" id="asdf" class="w-full border-none px-3 py-1.5 text-center focus:outline-none focus:ring-0" tabindex="-1" readonly />
                                                                <button type="button" x-on:click="add()" x-bind:disabled="addDisabled" class="px-3 text-gray-600 bg-gray-100 border-l border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-blue-600 focus-visible:bg-blue-600 focus-visible:text-white focus-visible:outline-none focus-visible:ring-blue-600 active:bg-blue-600 active:text-white">
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
                                                        value: 1,
                                                        step: 1,
                                                        min: 1,
                                                        max: 5,
                                                        add() { this.value = (this.addDisabled) ? (this.value + this.step) : this.value },
                                                        subtract() { this.value = (this.subtractDisabled) ? (this.value - this.step) : this.value },
                                                        addDisabled() { return this.value >= this.max },
                                                        subtractDisabled() { return this.value <= this.min }
                                                    }">
                                                        <label for="asdf">
                                                            <span class="text-sm font-medium text-gray-700">Beds</span>
                                                            <div class="focus-within:ring-primary focus-within:border-primary mt-1 flex w-full max-w-[200px] overflow-hidden rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm">
                                                                <button type="button" x-on:click="subtract()" x-bind:disabled="subtractDisabled" class="px-3 mr-px text-gray-600 bg-gray-100 border-r border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-blue-600 focus-visible:bg-blue-600 focus-visible:text-white focus-visible:outline-none focus-visible:ring-blue-600 active:bg-blue-600 active:text-white">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                    </svg>
                                                                </button>
                                                                <input x-model.value="value" type="text" name="asdf" id="asdf" class="w-full border-none px-3 py-1.5 text-center focus:outline-none focus:ring-0" tabindex="-1" readonly />
                                                                <button type="button" x-on:click="add()" x-bind:disabled="addDisabled" class="px-3 text-gray-600 bg-gray-100 border-l border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-blue-600 focus-visible:bg-blue-600 focus-visible:text-white focus-visible:outline-none focus-visible:ring-blue-600 active:bg-blue-600 active:text-white">
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
                                                        value: 1,
                                                        step: 1,
                                                        min: 1,
                                                        max: 5,
                                                        add() { this.value = (this.addDisabled) ? (this.value + this.step) : this.value },
                                                        subtract() { this.value = (this.subtractDisabled) ? (this.value - this.step) : this.value },
                                                        addDisabled() { return this.value >= this.max },
                                                        subtractDisabled() { return this.value <= this.min }
                                                    }">
                                                        <label for="asdf">
                                                            <span class="text-sm font-medium text-gray-700">Bedrooms</span>
                                                            <div class="focus-within:ring-primary focus-within:border-primary mt-1 flex w-full max-w-[200px] overflow-hidden rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm">
                                                                <button type="button" x-on:click="subtract()" x-bind:disabled="subtractDisabled" class="px-3 mr-px text-gray-600 bg-gray-100 border-r border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-blue-600 focus-visible:bg-blue-600 focus-visible:text-white focus-visible:outline-none focus-visible:ring-blue-600 active:bg-blue-600 active:text-white">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                    </svg>
                                                                </button>
                                                                <input x-model.value="value" type="text" name="asdf" id="asdf" class="w-full border-none px-3 py-1.5 text-center focus:outline-none focus:ring-0" tabindex="-1" readonly />
                                                                <button type="button" x-on:click="add()" x-bind:disabled="addDisabled" class="px-3 text-gray-600 bg-gray-100 border-l border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-blue-600 focus-visible:bg-blue-600 focus-visible:text-white focus-visible:outline-none focus-visible:ring-blue-600 active:bg-blue-600 active:text-white">
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
                                                        value: 1,
                                                        step: 1,
                                                        min: 1,
                                                        max: 5,
                                                        add() { this.value = (this.addDisabled) ? (this.value + this.step) : this.value },
                                                        subtract() { this.value = (this.subtractDisabled) ? (this.value - this.step) : this.value },
                                                        addDisabled() { return this.value >= this.max },
                                                        subtractDisabled() { return this.value <= this.min }
                                                    }">
                                                        <label for="asdf">
                                                            <span class="text-sm font-medium text-gray-700">Bathrooms</span>
                                                            <div class="focus-within:ring-primary focus-within:border-primary mt-1 flex w-full max-w-[200px] overflow-hidden rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm">
                                                                <button type="button" x-on:click="subtract()" x-bind:disabled="subtractDisabled" class="px-3 mr-px text-gray-600 bg-gray-100 border-r border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-blue-600 focus-visible:bg-blue-600 focus-visible:text-white focus-visible:outline-none focus-visible:ring-blue-600 active:bg-blue-600 active:text-white">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                                    </svg>
                                                                </button>
                                                                <input x-model.value="value" type="text" name="asdf" id="asdf" class="w-full border-none px-3 py-1.5 text-center focus:outline-none focus:ring-0" tabindex="-1" readonly />
                                                                <button type="button" x-on:click="add()" x-bind:disabled="addDisabled" class="px-3 text-gray-600 bg-gray-100 border-l border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-blue-600 focus-visible:bg-blue-600 focus-visible:text-white focus-visible:outline-none focus-visible:ring-blue-600 active:bg-blue-600 active:text-white">
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

                                                <h3 class="panel-heading">Property Details</h3>
                                                <div>
                                                    <label for="project-name" class="block text-sm font-medium text-gray-900"> Project name </label>
                                                    <div class="mt-1">
                                                        <input type="text" name="project-name" id="project-name" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="description" class="block text-sm font-medium text-gray-900"> Description </label>
                                                    <div class="mt-1">
                                                        <textarea id="description" name="description" rows="4" class="block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-end flex-shrink-0 px-4 py-4">
                                    <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2" x-on:click="addProperty = false">Cancel</button>
                                    <button type="submit" class="inline-flex justify-center px-4 py-2 ml-4 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layouts.host>
