<x-layouts.minimal>
    <div class="flex w-full max-w-xl flex-col space-y-10 md:p-8" wire:init="load">

        {{-- Logo --}}
        <div class="mt-10 flex justify-center">
            <a href="{{ route('frontend.index') }}">
                <x-logo />
            </a>
        </div>

        <livewire:frontend.checkout.checkout-component :reservation="$reservation" />

    </div>
</x-layouts.minimal>
