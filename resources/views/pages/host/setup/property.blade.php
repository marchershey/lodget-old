<x-layouts.host hideNavigation>
    <div wire:init="load"></div>

    <div class="padding spacing" x-data="app()">
        <div>
            <h1 class="page-heading">Property Setup <span x-text="step"></span></h1>
            <p class="page-desc">Fill out the information below to add your first property</p>
        </div>


        <div x-show="step == 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="hidden" x-cloak class="spacing">
            <div class="panel spacing">
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
                        {{-- <x-forms.select label="State" model="property.address.state" :options="['AK' => 'Alaska', 'AZ' => 'Arizona', 'AR' => 'Arkansas', 'CA' => 'California', 'CO' => 'Colorado', 'CT' => 'Connecticut', 'DE' => 'Delaware', 'DC' => 'District Of Columbia', 'FL' => 'Florida', 'GA' => 'Georgia', 'HI' => 'Hawaii', 'ID' => 'Idaho', 'IL' => 'Illinois', 'IN' => 'Indiana', 'IA' => 'Iowa', 'KS' => 'Kansas', 'KY' => 'Kentucky', 'LA' => 'Louisiana', 'ME' => 'Maine', 'MD' => 'Maryland', 'MA' => 'Massachusetts', 'MI' => 'Michigan', 'MN' => 'Minnesota', 'MS' => 'Mississippi', 'MO' => 'Missouri', 'MT' => 'Montana', 'NE' => 'Nebraska', 'NV' => 'Nevada', 'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico', 'NY' => 'New York', 'NC' => 'North Carolina', 'ND' => 'North Dakota', 'OH' => 'Ohio', 'OK' => 'Oklahoma', 'OR' => 'Oregon', 'PA' => 'Pennsylvania', 'RI' => 'Rhode Island', 'SC' => 'South Carolina', 'SD' => 'South Dakota', 'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah', 'VT' => 'Vermont', 'VA' => 'Virginia', 'WA' => 'Washington', 'WV' => 'West Virginia', 'WI' => 'Wisconsin', 'WY' => 'Wyoming']" /> --}}
                    </div>
                    <div class="col-span-full laptop:col-span-2">
                        <x-forms.text label="Zip / Postal Code" model="property.address.zip" />
                    </div>
                </div>
            </div>
        </div>

        <div x-show="step == 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="hidden" x-cloak class="spacing">
            <div class="panel spacing">
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
            <button x-show="saveButton" x-cloak x-on:click="save" type="button" class="button button-dark">Save Property</button>
            <button x-show="backButton" x-cloak x-on:click="goBack" type="button" class="button button-dark">Back</button>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('app', () => ({
                    step: @entangle('step'),
                    nextButton() {
                        return (this.step < 3) ? true : false
                    },
                    backButton() {
                        return (this.step > 1) ? true : false
                    },
                    saveButton() {
                        return (this.step === 3) ? true : false
                    },
                    goNext() {
                        @this.goNext()
                    },
                    goBack() {
                        this.step--
                    }
                }))
            })
        </script>
    @endpush

</x-layouts.host>
