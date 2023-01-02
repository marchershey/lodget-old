<div class="flex flex-col gap-5" x-data="hostActionButtons">

    {{-- Approve/Reject --}}
    @if ($reservation->status == 'pending')
        <div wire:loading.remove wire:target="approve" class="flex w-full gap-5">
            <button x-on:click="openPendingApproveModal" class="button button-green">Approve</button>
        </div>

        {{-- Approve Modal --}}
        <div x-show="pendingApproveModal" x-cloak>
            <x-modal title="Are you sure?" showFunction="pendingApproveModal" closeFunction="closePendingApproveModal()">
                <div>
                    You are about to approve this reservation, which will capture the <span class="font-semibold">@money($reservation->payment->total ?? 0)</span> hold on the customer's card.
                </div>
                <x-slot:buttons>
                    <button x-on:click="closePendingApproveModal" class="button button-light">Nevermind</button>
                    <button wire:loading.attr="disabled" wire:click="approveReservation" class="button button-green">
                        <span wire:loading wire:target="approveReservation">
                            <svg class="mr-3 -ml-1 h-5 w-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </span>
                        <span>Approve Reservation</span>
                    </button>
                </x-slot:buttons>
            </x-modal>
        </div>
    @endif

    {{-- Cancel --}}
    {{-- @if ($reservation->status != 'canceled' && $reservation->status != 'active' && $reservation->status != 'completed') --}}
    @if ($reservation->status != 'canceled')
        <div>
            <button x-on:click="openCancelModal" class="w-full text-red-500">Cancel Reservation</button>
        </div>
        {{-- Cancel Modal --}}
        <div x-show="cancelModal" x-cloak>
            <x-modal title="Cancel Reservation" showFunction="cancelModal" closeFunction="closeCancelModal()">
                <div>
                    You are about to cancel this reservation for <span class="font-semibold">{{ $reservation->user->fullName() }}</span>, which will release the <span class="font-semibold">@money($reservation->payment->total ?? 0)</span> hold on {{ $reservation->user->first_name }}'s card.
                </div>
                <div class="mt-5">
                    <label for="street" class="input-label @error('cancel_reason') text-red-500 @enderror">Reason (optional)</label>
                    <input type="text" id="street" class="input @error('cancel_reason') bg-red-50 border-red-500 @enderror" wire:model.lazy="cancel_reason">
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
                            <svg class="mr-3 -ml-1 h-5 w-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
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
            Alpine.data('hostActionButtons', () => ({
                // Pending
                pendingApproveModal: false,
                pendingRejectModal: false,
                closePendingApproveModal() {
                    this.pendingApproveModal = false;
                },
                openPendingApproveModal() {
                    this.pendingApproveModal = true;
                },

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
