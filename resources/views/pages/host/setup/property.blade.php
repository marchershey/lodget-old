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

        <div x-show="step == 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="hidden" x-cloak class="spacing">
            <div class="panel padding spacing">
                <div>
                    <h2 class="panel-heading">Property Details</h2>
                    <p class="panel-desc">What does your property have to offer?</p>
                </div>
                <div class="form">
                    <div class="col-span-full laptop:col-span-3">
                        @if ($property_types)
                            <x-forms.select label="Property Type" model="property.type" :options="$property_types" />
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <div class="flex flex-row-reverse items-center justify-between">
            <button x-show="nextButton" x-cloak x-on:click="goNext" type="button" class="button button-dark">Continue</button>
            <button x-show="saveButton" x-cloak x-on:click="save" type="button" class="button button-dark">Publish Property</button>
            <button x-show="backButton" x-cloak x-on:click="goBack" type="button" class="button button-dark">Back</button>
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
