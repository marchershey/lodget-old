<div class="panel" wire:init="load">
    <h1 class="panel-heading">Payment Details</h1>
    <div class="panel-body">
        {{-- <div class="mb-5 flex cursor-pointer items-center justify-between rounded border border-gray-300 bg-gray-50 px-4 py-2">
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
                    <span class="text-muted text-xs">Expires {{ $default_payment_method['card']['exp_month'] }}/{{ $default_payment_method['card']['exp_year'] }}</span>
                </div>
            </div>

            <div>
                <button type="button" class="text-primary p-2 text-xs">Change</button>
            </div>
        </div> --}}


        @if ($total != 0)
            <div class="text-muted flex flex-col space-y-1 text-sm" wire:loading.remove wire:target="calcPricing">
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
        @else
            <div class="flex animate-pulse flex-col space-y-2">
                <div class="flex justify-between">
                    <div class="h-4 w-[100px] rounded bg-gray-200"></div>
                    <div class="h-4 w-[80px] rounded bg-gray-200"></div>
                </div>
                <div class="flex justify-between">
                    <div class="h-4 w-[50px] rounded bg-gray-200"></div>
                    <div class="h-4 w-[70px] rounded bg-gray-200"></div>
                </div>
                <div class="flex justify-between">
                    <div class="h-4 w-[80px] rounded bg-gray-200"></div>
                    <div class="h-4 w-[110px] rounded bg-gray-200"></div>
                </div>
            </div>
        @endif
    </div>
</div>
