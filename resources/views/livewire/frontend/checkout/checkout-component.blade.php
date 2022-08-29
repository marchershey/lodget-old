<div class="py-10">

    <div class="panel-spacing">
        <div class="panel panel-body">
            <div class="grid grid-cols-3 gap-5">
                <div class="col-span-1">
                    <div class="block w-full overflow-hidden bg-gray-100 rounded-lg group aspect-w-10 aspect-h-7">
                        <img src="/storage/{{ $reservation->property->photos()->first()->path }}" alt="" class="object-cover pointer-events-none">
                    </div>
                </div>
                <div class="flex flex-col justify-between col-span-2">
                    <div class="flex flex-col">
                        <h1 class="text-xl font-semibold truncate">{{ $reservation->property->name }}</h1>
                        <p class="text-sm line-clamp-2 text-muted">{{ $reservation->property->headline }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel">
            <h1 class="panel-heading">Your Trip</h1>
            <div class="panel-body">
                {{-- Dates --}}
                <div class="flex items-center justify-between">
                    <div class="flex flex-col">
                        <span class="font-medium">Dates</span>
                        <span class="text-sm">{{ Carbon\Carbon::parse($reservation->checkin)->format('M jS') }} - {{ Carbon\Carbon::parse($reservation->checkout)->format('M jS') }}</span>
                    </div>
                    <div>
                        <span class="text-sm link">Change</span>
                    </div>
                </div>
                {{-- Guests --}}
                <div class="flex items-center justify-between">
                    <div class="flex flex-col">
                        <span class="font-medium">Guests</span>
                        <span class="text-sm">{{ $reservation->guests }} {{ Illuminate\Support\Str::plural('guest', $reservation->guests) }}</span>
                    </div>
                    <div>
                        <span class="text-sm link">Change</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel" wire:init="calcPricing">
            <h1 class="panel-heading">Pricing Details</h1>
            <div class="panel-body">
                <div>
                    <div class="items-center justify-center" wire:loading.flex wire:target="calcPricing">
                        <svg class="w-10 h-10 text-muted animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                    @if ($total != 0)
                        <div class="flex flex-col space-y-1 text-muted" wire:loading.remove wire:target="calcPricing">
                            <div class="flex justify-between">
                                <span>@money($default_rate) x {{ $reservation->nights }} nights</span>
                                <span>@money($base_rate)</span>
                            </div>
                            @if ($fees)
                                @foreach ($fees as $fee)
                                    <div class="flex justify-between">
                                        <span>{{ $fee['name'] }}</span>
                                        <span>@money($fee['amount'])</span>
                                    </div>
                                @endforeach
                            @endif
                            <div class="flex justify-between">
                                <span>Taxes</span>
                                <span>@money($tax_rate)</span>
                            </div>
                            <div class="flex justify-between text-base font-medium text-gray-800">
                                <span>Total</span>
                                <span>@money($total)</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="panel" wire:init="initPaymentMethods">
            <h1 class="panel-heading">Payment Method</h1>
            <div class="panel-body">
                <div>
                    <div class="items-center justify-center mb-5" wire:loading.flex wire:target="initPaymentMethods">
                        <svg class="w-10 h-10 text-muted animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>

                    <div x-data="paymentMethods">
                        {{-- Default/Active Payment Method --}}
                        @if ($default_payment_method)
                            <div x-on:click="open_paymentMethodsModal" class="flex items-center justify-between px-4 py-2 mb-5 border border-gray-300 rounded cursor-pointer bg-gray-50">
                                <div class="flex items-center space-x-5">
                                    <div class="">
                                        @if ($default_payment_method['card']['brand'] == 'visa' || $default_payment_method['card']['brand'] == 'mastercard' || $default_payment_method['card']['brand'] == 'amex' || $default_payment_method['card']['brand'] == 'discover')
                                            <img src="/img/{{ $default_payment_method['card']['brand'] }}.svg" class="w-12">
                                        @else
                                            <img src="/img/generic.svg" alt="{{ $default_payment_method['card']['brand'] }}" class="w-12">
                                        @endif
                                    </div>
                                    <div class="flex flex-col text-sm">
                                        <span class="text-sm">Ending with {{ $default_payment_method['card']['last4'] }}</span>
                                        <span class="text-xs text-muted">Expires {{ $default_payment_method['card']['exp_month'] }}/{{ $default_payment_method['card']['exp_year'] }}</span>
                                    </div>
                                </div>

                                <div>
                                    <button type="button" class="p-2 text-xs text-primary">Change</button>
                                </div>
                            </div>
                        @endif

                        {{-- Add payment method button --}}
                        <button x-on:click="open_newPaymentMethodModal" class="button button-light">Add new payment method</button>


                        {{-- Payment method modal --}}
                        <div x-show="paymentMethodsModal" style="display: none" x-on:keydown.escape.prevent.stop="close_paymentMethodsModal" @close.window="close_paymentMethodsModal" role="dialog" aria-modal="true" class="fixed inset-0 z-10 overflow-y-auto">
                            <div x-show="paymentMethodsModal" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50"></div>
                            <div x-show="paymentMethodsModal" x-transition.opacity x-on:click="close_paymentMethodsModal" class="relative flex items-end justify-center min-h-screen sm:items-center">
                                <div x-on:click.stop class="relative w-full max-w-lg">

                                    {{-- Close button --}}
                                    <div class="absolute top-0 right-0 mx-3 my-5 cursor-pointer">
                                        <svg x-on:click="close_paymentMethodsModal" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-muted" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </div>

                                    <div class="panel">
                                        <h1 class="panel-heading">Select Payment Method</h1>
                                        <div class="panel-body">

                                            <div class="items-center justify-center" wire:loading.flex wire:target="loadPaymentMethods">
                                                <svg class="w-10 h-10 text-muted animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                </svg>
                                            </div>

                                            @if ($payment_methods)
                                                <div class="flex flex-col gap-y-3">
                                                    @foreach ($payment_methods as $key => $payment_method)
                                                        <div wire:key="pm-{{ $key }}-{{ rand() }}" class="flex items-center justify-between cursor-pointer border border-gray-300 rounded bg-gray-50 @if ($payment_method['id'] == $default_payment_method['id']) ring-2 ring-primary bg-blue-50 cursor-default @endif">
                                                            <div wire:key="pm-update-{{ $key }}-{{ rand() }}" @if ($payment_method['id'] != $default_payment_method['id']) wire:click="updateDefaultPaymentMethod('{{ $payment_method['id'] }}')" @endif class="flex items-center w-full px-4 py-2 space-x-5">
                                                                <div class="">
                                                                    @if ($payment_method['card']['brand'] === 'visa' || $payment_method['card']['brand'] == 'mastercard' || $payment_method['card']['brand'] == 'amex' || $payment_method['card']['brand'] == 'discover')
                                                                        <img src="/img/{{ $payment_method['card']['brand'] }}.svg" class="w-12">
                                                                    @else
                                                                        <img src="/img/generic.svg" alt="{{ $payment_method['card']['brand'] }}" class="w-12">
                                                                    @endif
                                                                </div>
                                                                <div class="flex flex-col text-sm">
                                                                    <div class="flex">
                                                                        <span class="text-sm">Ending with {{ $payment_method['card']['last4'] }}</span>
                                                                    </div>
                                                                    <span class="text-xs text-muted">Expires {{ $payment_method['card']['exp_month'] }}/{{ $payment_method['card']['exp_year'] }}</span>
                                                                </div>
                                                            </div>

                                                            <div class="flex items-center px-2 py-2">
                                                                {{-- update loader --}}
                                                                <div wire:loading wire:target="updateDefaultPaymentMethod('{{ $payment_method['id'] }}')">
                                                                    <svg class="w-6 h-6 text-muted animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                                    </svg>
                                                                </div>

                                                                {{-- Delete button --}}
                                                                <div class="" wire:key="pm-delete-{{ $key }}-{{ rand() }}" wire:click="deletePaymentMethod('{{ $payment_method['id'] }}')">
                                                                    <div wire:loading wire:target="deletePaymentMethod('{{ $payment_method['id'] }}')">
                                                                        <svg class="w-6 h-6 text-muted animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                                        </svg>
                                                                    </div>
                                                                    <div wire:loading.remove wire:target="deletePaymentMethod('{{ $payment_method['id'] }}')">
                                                                        <button type="button" class="p-2 text-xs text-red-500">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                                <line x1="4" y1="7" x2="20" y2="7"></line>
                                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                                            </svg>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- New payment method modal --}}
                        <div class="flex justify-center">

                            <div x-show="newPaymentMethodModal" style="display: none" x-on:keydown.escape.prevent.stop="close_newPaymentMethodModal" role="dialog" aria-modal="true" class="fixed inset-0 z-10 overflow-y-auto">
                                <div x-show="newPaymentMethodModal" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50"></div>

                                <div x-show="newPaymentMethodModal" x-transition.opacity x-on:click="close_newPaymentMethodModal" class="relative flex items-end justify-center min-h-screen sm:items-center">
                                    <div x-on:click.stop class="w-full max-w-lg m-0">

                                        <form class="panel" @submit.prevent="submit_newPaymentMethod">
                                            <h1 class="panel-heading">Add Payment Method</h1>
                                            <div class="panel-body">
                                                <p class="text-muted">To add a new payment method, fill out your billing information below.</p>

                                                {{-- <div class="flex flex-col space-y-5" wire:loading.class="opacity-25" wire:target="initNewPaymentMethod"> --}}
                                                <div class="flex flex-col space-y-5" :class="newPaymentMethodLoading && 'opacity-25'">
                                                    <div class="grid grid-cols-2 gap-x-3">
                                                        <label class="label col-span-full">Full Name</label>
                                                        <div>
                                                            {{-- <input wire:model.debounce.500ms="first_name" type="text" class="capitalize input" placeholder="First name" wire:loading.attr="disabled" wire:target="initNewPaymentMethod"> --}}
                                                            <input wire:model.debounce.500ms="first_name" type="text" class="capitalize input" placeholder="First name" :disabled="newPaymentMethodLoading">
                                                        </div>
                                                        <div>
                                                            <input wire:model.debounce.500ms="last_name" type="text" class="capitalize input" placeholder="Last name" :disabled="newPaymentMethodLoading">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label class="label">Address</label>
                                                        <div class="grid grid-cols-12 gap-x-3 gap-y-1">
                                                            <div class="col-span-9">
                                                                <input wire:model.debounce.500ms="address" type="text" class="capitalize input @error('address') bg-red-100 border-red-500 text-red-800 @enderror" placeholder="Street address" :disabled="newPaymentMethodLoading">
                                                            </div>
                                                            <div class="col-span-3">
                                                                <input wire:model.debounce.500ms="unit" type="text" class="capitalize input @error('unit') bg-red-100 border-red-500 text-red-800 @enderror" placeholder="Unit" :disabled="newPaymentMethodLoading">
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-5">
                                                                <input wire:model.debounce.500ms="city" type="text" class="capitalize input @error('city') bg-red-100 border-red-500 text-red-800 @enderror" placeholder="City" :disabled="newPaymentMethodLoading">
                                                            </div>
                                                            <div class="col-span-8 sm:col-span-4">
                                                                <select wire:model.debounce.500ms="state" class="input @error('state') bg-red-100 border-red-500 text-red-800 @enderror" :disabled="newPaymentMethodLoading">
                                                                    <option value="" selected hidden>State...</option>
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
                                                            <div class="col-span-4 sm:col-span-3">
                                                                <input wire:model.debounce.500ms="zip" type="text" class="input @error('zip') bg-red-100 border-red-500 text-red-800 @enderror" placeholder="Zip" :disabled="newPaymentMethodLoading">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label class="label col-span-full">Card Details</label>
                                                        <div class="h-[44px] border border-gray-300 input px-4 py-3 @error('incomplete_number') border-red-500 @enderror @error('invalid_number') border-red-500 @enderror @error('incomplete_expiry') border-red-500 @enderror @error('invalid_expiry_month_past') border-red-500 @enderror @error('invalid_expiry_year_past') border-red-500 @enderror  @error('incomplete_cvc') border-red-500 @enderror @error('incomplete_zip') border-red-500 @enderror">
                                                            <div id="card-element" wire:ignore></div>
                                                        </div>
                                                    </div>

                                                    @if ($default_payment_method)
                                                        <div x-data="{ value: @entangle('setDefaultPaymentMethod') }" class="flex items-center justify-between cursor-pointer">
                                                            <span @click="$refs.toggle.click(); $refs.toggle.focus()" class="flex flex-col flex-grow">
                                                                <span class="label" id="availability-label">Set as default payment method</span>
                                                            </span>
                                                            <button x-ref="toggle" @click="value = ! value" type="button" class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer w-11 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary" role="switch" aria-checked="false" aria-labelledby="availability-label" aria-describedby="availability-description" :class="value ? 'bg-primary' : 'bg-gray-200'">
                                                                <span aria-hidden="true" class="inline-block w-5 h-5 transition duration-200 ease-in-out transform bg-white rounded-full shadow pointer-events-none ring-0" :class="value ? 'translate-x-5' : 'translate-x-0'"></span>
                                                            </button>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div>

                                                    <div class="flex justify-between">
                                                        <button x-on:click="close_newPaymentMethodModal" type="button" class="w-auto button button-light">Cancel</button>
                                                        <div>
                                                            <div x-show="newPaymentMethodLoading" class="items-center">
                                                                <svg class="w-8 h-8 mr-8 text-muted animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                                                </svg>
                                                            </div>
                                                            <button x-show="!newPaymentMethodLoading" type="submit" class="w-auto button">Add payment method</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($default_payment_method)
            <div class="flex flex-col space-y-5 bg-transparent border-none panel">
                <div class="relative flex items-start">
                    <div class="flex items-center h-7">
                        <input wire:model="agree" id="agree" type="checkbox" class="w-5 h-5 border-gray-300 rounded text-primary focus:ring-primary">
                    </div>
                    <div class="ml-3">
                        <label for="agree" class="block text-sm text-muted @error('agree') !text-red-500 @enderror">By checking this box, you agree to allow {{ config('app.name') }} to place a ${{ $total }} hold on your card for up to 7 days. Once your reservation has been approved, the hold will be captured and your funds will be transfered out of your account. If your reservation request is neither approved or cancelled within 7 days, the funds will be released back to you.</label>
                    </div>
                </div>
                <div>
                    <button wire:click="finalize" class="w-full button">Submit Reservation</button>
                </div>
            </div>
        @endif

    </div>

</div>

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('paymentMethods', () => ({
                paymentMethodsModal: false,
                newPaymentMethodModal: false,
                newPaymentMethodLoading: false,
                // Payment methods
                async open_paymentMethodsModal() {
                    this.paymentMethodsModal = true;
                    await @this.loadPaymentMethods();
                },
                async close_paymentMethodsModal() {
                    // THIS NEEDS IT'S OWN COMPONENT
                    this.paymentMethodsModal = false;
                    await @this.clearPaymentMethods();
                },

                // New payment method
                async open_newPaymentMethodModal() {
                    this.newPaymentMethodLoading = true;
                    this.newPaymentMethodModal = true;
                    this.initStripeElement();
                    await @this.initNewPaymentMethod();
                    this.newPaymentMethodLoading = false;
                },
                async close_newPaymentMethodModal() {
                    this.newPaymentMethodLoading = true;
                    this.newPaymentMethodModal = false;
                    cardElement.destroy();
                    this.newPaymentMethodLoading = false;
                },
                async initStripeElement() {
                    window.stripe = Stripe('{{ env('STRIPE_KEY') }}');
                    window.cardElement = await stripe.elements({
                        fonts: [{
                            cssSrc: 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600'
                        }]
                    }).create('card', {
                        style: {
                            base: {
                                fontSize: "15px",
                                fontWeight: "400",
                                iconColor: '#2563eb',
                                color: '#334155',
                                letterSpacing: "-0.3px",
                                '::placeholder': {
                                    color: '#6b7280',
                                },
                                fontFamily: 'Montserrat'
                            }
                        }
                    });
                    cardElement.mount('#card-element');
                },
                async submit_newPaymentMethod() {
                    this.newPaymentMethodLoading = true;
                    if (await @this.validateBillingDetails()) {
                        const {
                            setupIntent,
                            error
                        } = await stripe.confirmCardSetup(
                            @this.stripe_client_secret, {
                                payment_method: {
                                    card: cardElement,
                                    billing_details: {
                                        name: @this.first_name + ' ' + @this.last_name,
                                        email: @this.users.email,
                                        address: {
                                            line1: @this.address,
                                            line2: @this.unit,
                                            city: @this.city,
                                            state: @this.state,
                                            postal_code: @this.zip,
                                        },
                                    }
                                }
                            }
                        )
                        if (error) {
                            @this.handleErrors(error);
                        } else {
                            await @this.addedNewPaymentMethod(setupIntent.payment_method);
                            await @this.clearPaymentMethods();
                            this.close_newPaymentMethodModal();
                            this.open_paymentMethodsModal();
                        }
                    }

                    this.newPaymentMethodLoading = false;
                },

            }))
        })

        window.addEventListener('initStripeCardElement', event => {
            window.stripe = Stripe('{{ env('STRIPE_KEY') }}');
            window.cardElement = stripe.elements({
                fonts: [{
                    cssSrc: 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600'
                }]
            }).create('card', {
                style: {
                    base: {
                        fontSize: "15px",
                        fontWeight: "400",
                        iconColor: '#2563eb',
                        color: '#334155',
                        letterSpacing: "-0.3px",
                        '::placeholder': {
                            color: '#6b7280',
                        },
                        fontFamily: 'Montserrat'
                    }
                }
            });
            cardElement.mount('#card-element');
        });
    </script>
@endpush
