<div class="flex flex-col gap-5" x-data="guestActionButtons">

    {{-- Cancel --}}
    {{-- @if ($reservation->status != 'canceled' && $reservation->status != 'active' && $reservation->status != 'completed') --}}
    @if ($reservation->status != 'canceled')
        <div>
            <button x-on:click="openCancelModal" class="w-full text-red-500">Cancel Reservation</button>
        </div>
        {{-- Cancel Modal --}}
        <div x-show="cancelModal" x-cloak>
            <x-modal title="Cancel Reservation" show="cancelModal" close="closeCancelModal()">
                <div>
                    You are about to cancel your reservation for <span class="font-semibold">{{ $reservation->property->name }}</span>. If you cancel, the dates you reserved may not be available in the future.
                </div>
                <div class="mt-2">
                    If you're ready to cancel, press the <span class="font-semibold">Cancel Reservation</span> button and the reservation will be canceled. If you made any payments, your funds will be refunded and should return to your account in the next 1-3 business days.
                </div>
                <div class="mt-2">
                    @error('cancel_reason')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <x-slot:buttons>
                    <button x-on:click="closeCancelModal" class="button button-light">Nevermind</button>
                    <button wire:loading.attr="disabled" wire:click="cancelReservation" class="button button-red">
                        <span wire:loading wire:target="cancelReservation">
                            <svg class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                        <span>Cancel Reservation</span>
                    </button>
                </x-slot:buttons>
            </x-modal>
        </div>
    @endif
</div>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('guestActionButtons', () => ({
                // Cancel
                cancelModal: false,
                openCancelModal() {
                    this.cancelModal = true
                },
                closeCancelModal() {
                    this.cancelModal = false;
                }
            }))
        })
    </script>
@endpush
