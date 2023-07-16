<div class="mt-10" x-data="{ open: false }" wire:init="load">

    @if ($showButton)
        <button wire:loading.remove wire:target="load" x-on:click="open = true" type="button" class="flex items-center justify-center w-full px-8 py-3 text-base font-medium text-white border border-transparent rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-primary">Select Dates</button>
    @else
        <div class="flex justify-center" wire:loading.flex wire:target="load">
            <svg class="w-[50px] h-[50px] text-muted animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>
    @endif


    <!-- This example requires Tailwind CSS v2.0+ -->
    <div x-show="open" x-cloak class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-900/75"></div>

        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="relative flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                <div x-on:click.away="open = false" class="relative w-full px-4 pt-5 pb-4 text-left bg-gray-100 rounded-lg sm:my-8 sm:max-w-sm sm:w-full sm:p-6">
                    <div class="absolute z-50 -top-2 -right-2">
                        <button x-on:click="open = false" class="p-1 bg-gray-100 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="z-0 @error('checkin') border-red-500 @enderror @error('checkout') border-red-500 @enderror">
                        <div wire:ignore>
                            <input type="hidden" id="datepicker">
                        </div>
                    </div>
                    <div x-data="{
                        value: $wire.entangle('guests'),
                        step: 1,
                        min: 1,
                        max: 16,
                        add() { this.value = (this.addDisabled) ? (this.value + this.step) : this.value },
                        subtract() { this.value = (this.subtractDisabled) ? (this.value - this.step) : this.value },
                        addDisabled() { return this.value >= this.max },
                        subtractDisabled() { return this.value <= this.min }
                    }" class="w-full my-5">
                        <label for="guests" class="flex items-center justify-between w-full space-x-5">
                            <div class="flex flex-col">
                                <span class="text-sm font-semibold @error('guests') text-red-500 @enderror">Guests</span>
                                <span class="text-xs text-muted">How many guests will be staying?</span>
                            </div>
                            <div class="focus-within:ring-primary focus-within:border-primary group mt-1 flex w-full max-w-[150px] overflow-hidden rounded-md border border-gray-300 focus-within:ring-1 sm:text-sm @error('guests') border-red-500 @enderror">
                                <button type="button" x-on:click="subtract()" x-bind:disabled="subtractDisabled" class="px-3 mr-px text-gray-600 bg-gray-100 border-r border-gray-300 focus-within:ring-1 focus:ring-0 focus-visible:border-primary focus-visible:bg-primary focus-visible:text-white focus-visible:outline-none focus-visible:ring-primary active:bg-primary active:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </button>
                                <input x-model.value="value" type="text" id="guests" class="w-full border-none px-1 py-1.5 text-center bg-gray-50 group-focus-within:bg-white focus:outline-none focus:ring-0" tabindex="-1" readonly />
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
                    <div class="flex flex-col mt-5 space-y-5 sm:mt-6">
                        <button wire:click="checkout()" type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">Request Reservation</button>
                        <button wire:click="clearDates()" class="w-full bg-gray-100 rounded-md text-muted">Clear Dates</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('calendar-init', async event => {
            console.log(event.detail.checkins);
            console.log(event.detail.disabled);
            console.log(event.detail.checkouts);
            window.datepicker = new HotelDatepicker(document.getElementById('datepicker'), {
                inline: true,
                selectForward: false,
                minNights: {{ $property->min_nights }},
                // minNights: 1,
                showTopbar: false,
                startDate: new Date(),
                noCheckInDates: event.detail.checkins,
                noCheckOutDates: event.detail.checkouts,
                disabledDates: event.detail.disabled,
                enableCheckout: false,
                hoveringTooltip: function(nights, startTime, hoverTime) {
                    // return false;
                    return nights + ' nights';
                },
                onSelectRange: function(a) {
                    @this.updateDates(this.getValue())
                }
            });
        })
    </script>
@endpush
