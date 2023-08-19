<x-layouts.host x-data="{ addRentalSlideoverVisible: false }">

    <livewire:host.rentals.components.add-rental-component />

    <div class="page-container" :class="addRentalSlideoverVisible && 'overflow-hidden'">

        {{-- Page Heading --}}
        <div class="page-heading">
            {{-- Page Title --}}
            <div class="flex items-center justify-between">
                <h1 class="page-title">
                    Rentals
                </h1>
                <button x-on:click="addRentalSlideoverVisible = true" class="w-auto button button-primary">Add Rental</button>
            </div>
        </div>

        {{-- Content --}}
        <div class="page-content-container">
            <div class="page-content">
                <div class="page-padding-x-only-mobile">
                    {{-- Rentals Grid --}}
                    <livewire:host.rentals.components.rentals-list-component />
                </div>

            </div>
        </div>
    </div>

</x-layouts.host>
