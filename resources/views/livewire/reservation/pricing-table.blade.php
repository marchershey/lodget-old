<div wire:init="load">
    <div class="items-center justify-center" wire:loading.flex wire:target="load">
        <svg class="w-10 h-10 text-muted animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </div>
    @if ($pricing)
        <div x-data="{ datesVisible: false }" class="flex flex-col space-y-3 text-muted">
            <div class="flex justify-between">
                <div class="flex space-x-2">
                    <span>@money($pricing['average_rate']) x {{ count($pricing['nights']) }} nights</span>
                    <button x-on:click="datesVisible = !datesVisible" x-text="datesVisible ? 'View less' : 'View more'" class="text-xs link"></button>
                </div>
                <span>@money($pricing['base_rate'])</span>
            </div>
            <div class="flex flex-col text-sm bg-gray-100 rounded" x-show="datesVisible">
                @foreach ($pricing['nights'] as $rate)
                    <div class="flex justify-between px-3 py-1">
                        <span>{{ Carbon\Carbon::parse($rate['date'])->format('M jS') }}</span>
                        <span>${{ number_format(substr($rate['amount'], 0, -2)) }}</span>
                    </div>
                @endforeach
            </div>
            @foreach ($pricing['fees'] as $fee)
                <div class="flex justify-between">
                    <span>{{ $fee['name'] }}</span>
                    <span>@money($fee['amount'])</span>
                </div>
            @endforeach
            <div class="flex justify-between">
                <span>Tax ({{ $pricing['default_tax_rate'] }}%)</span>
                <span>@money($pricing['tax_rate'])</span>
            </div>
            <div class="flex justify-between text-base font-semibold text-gray-800">
                <span>Total</span>
                <span>@money($pricing['total'])</span>
            </div>
        </div>
    @endif
</div>
