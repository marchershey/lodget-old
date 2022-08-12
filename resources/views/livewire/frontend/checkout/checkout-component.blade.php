<div class="py-10">

    {{-- Loading --}}

    {{-- <div wire:loading.flex wire:target="load">
        <div class="w-full panel animate-pulse">
            <div class="grid grid-cols-3 gap-x-5">
                <div class="w-full bg-gray-200 rounded-lg aspect-w-10 aspect-h-7"></div>
                <div class="flex flex-col col-span-2 gap-2 mt-1">
                    <div class="w-2/3 h-4 bg-gray-200 rounded"></div>
                    <div class="w-full h-4 bg-gray-200 rounded"></div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="panel">
        <div class="grid grid-cols-3 gap-5">
            <div class="col-span-1">
                <div class="block w-full overflow-hidden bg-gray-100 rounded-lg group aspect-w-10 aspect-h-7 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500">
                    <img src="/storage/{{ $reservation->property->photos()->first()->path }}" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
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

        {{-- Dates --}}
        <div>
            <div class="flex items-center justify-between">
                <span class="font-medium">Dates</span>
                <span class="text-sm link">Change</span>
            </div>
            <div>
                <span class="text-sm">{{ Carbon\Carbon::parse($reservation->checkin)->format('M jS') }} - {{ Carbon\Carbon::parse($reservation->checkout)->format('M jS') }}</span>
            </div>
        </div>

        {{-- Guests --}}
        <div>
            <div class="flex items-center justify-between">
                <span class="font-medium">Guests</span>
                <span class="text-sm link">Change</span>
            </div>
            <div>
                <span class="text-sm">{{ $reservation->guests }} {{ Illuminate\Support\Str::plural('guest', $reservation->guests) }}</span>
            </div>
        </div>
    </div>

    <div class="panel" wire:init="calcPricing">
        <h1 class="panel-heading">Pricing Details</h1>

        {{-- Pricing loading --}}
        <div class="items-center justify-center" wire:loading.flex wire:target="calcPricing">
            <svg class="w-10 h-10 text-muted animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>

        @if ($total != 0)
            <div class="flex flex-col space-y-1 text-sm text-muted" wire:loading.remove wire:target="calcPricing">
                <div class="flex justify-between">
                    <span>${{ $reservation->property->default_rate }} x {{ $reservation->nights }} nights</span>
                    <span>${{ number_format($base_rate, 2) }}</span>
                </div>
                @if ($fees)
                    @foreach ($fees as $fee)
                        <div class="flex justify-between">
                            <span>{{ $fee['name'] }}</span>
                            <span>${{ number_format($fee['amount'], 2) }}</span>
                        </div>
                    @endforeach
                @endif
                <div class="flex justify-between">
                    <span>Taxes</span>
                    <span>${{ number_format($tax_rate, 2) }}</span>
                </div>
                <div class="flex justify-between text-base font-medium text-gray-800">
                    <span>Total</span>
                    <span>${{ $total }}</span>
                </div>
            </div>
        @endif
    </div>

    <div class="panel">
        <h1 class="panel-heading">Billing Details</h1>

        <div class="items-center justify-center" wire:loading.flex wire:target="setupBilling">
            <svg class="w-10 h-10 text-muted animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>

        @if ($total != 0)
            <div wire:init="" x-data="checkout" wire:loading.remove wire:target="setupBilling">
                <form @submit.prevent="submitForm" class="flex flex-col space-y-5">

                    <div class="grid grid-cols-2 gap-x-3">
                        <label class="label col-span-full">Full Name</label>
                        <div>
                            <input type="email" name="email" id="email" class="input" placeholder="First name">
                        </div>
                        <div>
                            <input type="text" name="password" id="password" class="input" placeholder="Last name">
                        </div>
                    </div>

                    <div>
                        <label class="label">Address</label>
                        <div class="grid grid-cols-3 gap-x-3 gap-y-1">
                            <div class="col-span-full">
                                <input type="text" class="input" placeholder="Street address">
                            </div>
                            <div class="col-span-full">
                                <input type="text" class="input" placeholder="City">
                            </div>
                            <div class="col-span-2">
                                <input type="text" class="input" placeholder="State">
                            </div>
                            <div>
                                <input type="text" class="input" placeholder="Zip">
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block label">Card details</label>
                        <span class="text-sm text-muted">To help keep you safe and to maintain PCI compliance, . </span>
                    </div>


                    <hr>
                    <div class="grid grid-cols-12 gap-3">
                        <div>
                            <label class="label" for="email">Email</label>
                            <div class="mt-1">
                                <input type="email" name="email" id="email" class="block w-full text-gray-800 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Card number">
                            </div>
                        </div>
                        <div>
                            <label for="password" class="input-label">Password</label>
                            <div class="mt-1">
                                <input type="text" name="password" id="password" class="pl-8 input" placeholder="Card number">
                            </div>
                        </div>

                        {{-- <x-forms.text wireId="unit" label="Unit" class="col-span-3" />
                        <x-forms.text wireId="city" label="City" class="col-span-full" />
                        <x-forms.select wireId="state" label="State" class="col-span-8" :options="['AL' => 'Alabama', 'AK' => 'Alaska', 'AZ' => 'Arizona', 'AR' => 'Arkansas', 'CA' => 'California', 'CO' => 'Colorado', 'CT' => 'Connecticut', 'DE' => 'Delaware', 'DC' => 'District of Columbia', 'FL' => 'Florida', 'GA' => 'Georgia', 'HI' => 'Hawaii', 'ID' => 'Idaho', 'IL' => 'Illinois', 'IN' => 'Indiana', 'IA' => 'Iowa', 'KS' => 'Kansas', 'KY' => 'Kentucky', 'LA' => 'Louisiana', 'ME' => 'Maine', 'MD' => 'Maryland', 'MA' => 'Massachusetts', 'MI' => 'Michigan', 'MN' => 'Minnesota', 'MS' => 'Mississippi', 'MO' => 'Missouri', 'MT' => 'Montana', 'NE' => 'Nebraska', 'NV' => 'Nevada', 'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico', 'NY' => 'New York', 'NC' => 'North Carolina', 'ND' => 'North Dakota', 'OH' => 'Ohio', 'OK' => 'Oklahoma', 'OR' => 'Oregon', 'PA' => 'Pennsylvania', 'RI' => 'Rhode Island', 'SC' => 'South Carolina', 'SD' => 'South Dakota', 'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah', 'VT' => 'Vermont', 'VA' => 'Virginia', 'WA' => 'Washington', 'WV' => 'West Virginia', 'WI' => 'Wisconsin', 'WY' => 'Wyoming']" />
                        <x-forms.text wireId="zip" label="Zip" inputType="tel" inputClass="zip-code" class="col-span-4" /> --}}
                    </div>
                    <div>
                        <span class="label">Card details</span>
                        <div wire:ignore id="card-element" class=""></div>
                    </div>
                    <p class="mt-2 text-xs italic text-muted">By confirming this reservation, you are authorizing us to place a ${{ $total }} hold on your card for up to 7 days until the reservation has been approved or rejected. If your reservation has yet to be approved or rejected within 7 days, the transaction will be cancelled and the funds will be released back to you. If your reservation is rejected, the transaction will also be cancelled and the funds will be released back to you as well.</p>
                    <button type="sumbit" type="button" class="w-full button button-primary">Confirm Reservation</button>
                    {{-- <div x-show="!loading">
                    </div> --}}
                    {{-- <div class="flex justify-center" x-show="loading" x-clock>
                        <svg class="h-[36px] w-[36px] animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div> --}}
                    <p class="mt-2 text-xs italic text-muted"><strong>Please note:</strong> To help us keep you 100% safe online and to maintain PCI compliance, your billing details are handled by <strong>Stripe.com</strong>. We never see your billing details, nor will our servers ever save your billing details. Check out our <span class="text-link">Privacy Policy</span> for more information.</p>
                </form>
            </div>
        @endif
    </div>

</div>

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        window.addEventListener('stripeSetup', event => {
            window.stripe = Stripe('{{ env('STRIPE_KEY') }}');
            window.cardElement = stripe.elements({
                fonts: [{
                    cssSrc: 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600'
                }]
            }).create('card', {
                style: {
                    base: {
                        fontSize: "15px",
                        color: "#1e293b",
                        borderColor: "#cbd5e1",
                        "::placeholder": {
                            color: "#64748b"
                        },
                        fontFamily: 'Montserrat'
                    }
                }
            });
            cardElement.mount('#card-element');
        });

        document.addEventListener('alpine:init', () => {
            Alpine.data('checkout', () => ({
                loading: false,
                async submitForm() {
                    console.log('test');
                    const {
                        error
                    } = await stripe.confirmSetup({
                        //`Elements` instance that was used to create the Payment Element
                        elements,
                        confirmParams: {
                            return_url: 'https://example.com/account/payments/setup-complete',
                        }
                    });

                    if (error) {
                        // This point will only be reached if there is an immediate error when
                        // confirming the payment. Show error to your customer (for example, payment
                        // details incomplete)
                        const messageContainer = document.querySelector('#error-message');
                        messageContainer.textContent = error.message;
                    } else {
                        Toast.success('test')
                        // Your customer will be redirected to your `return_url`. For some payment
                        // methods like iDEAL, your customer will be redirected to an intermediate
                        // site first to authorize the payment, then redirected to the `return_url`.
                    }
                }
            }))
        })

        window.addEventListener('log', event => {
            console.log(event.detail.message);
        });
    </script>
@endpush
