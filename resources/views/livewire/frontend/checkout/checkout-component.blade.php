<div>

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

    <div class="panel" wire:init="pricing">
        <h1 class="panel-heading">Pricing Details</h1>

        {{-- Pricing loading --}}
        <div class="items-center justify-center" wire:loading.flex wire:target="pricing">
            <svg class="w-10 h-10 text-muted animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>

        @if ($total != 0)
            <div class="flex flex-col space-y-1 text-sm text-muted" wire:loading.remove wire:target="pricing">
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
                    <span>${{ number_format($total, 2) }}</span>
                </div>
            </div>
        @endif
    </div>

    <div class="panel" wire:init="billing">
        <h1 class="panel-heading">Billing Details</h1>

        <div>
            <div wire:ignore id="card-element" class="px-3 py-2 font-sans border border-gray-300 rounded-md font-base"></div>

        </div>
    </div>

</div>

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        window.addEventListener('setupStripeCardElement', event => {
            window.stripe = Stripe('{{ env('STRIPE_KEY') }}');
            window.cardElement = stripe.elements().create('card', {
                style: {
                    base: {
                        fontSize: "16px",
                        color: "#374151",
                        "::placeholder": {
                            color: "#d1d5db"
                        }
                    }
                }
            });
            cardElement.mount('#card-element');
        });
    </script>
@endpush
