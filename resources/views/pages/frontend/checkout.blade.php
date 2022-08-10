<x-layouts.minimal>
    <div class="flex flex-col w-full max-w-xl space-y-10 md:p-8" wire:init="load">

        {{-- Logo --}}
        <div class="flex justify-center mt-10">
            <a href="{{ route('frontend.index') }}">
                <x-logo />
            </a>
        </div>

        <livewire:frontend.checkout.checkout-component :reservation="$reservation" />

    </div>
</x-layouts.minimal>
