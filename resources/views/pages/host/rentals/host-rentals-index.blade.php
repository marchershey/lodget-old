<x-layouts.host x-data="{ addRentalSlideoverVisible: false }">

    <div class="page-container" :class="addRentalSlideoverVisible && 'overflow-hidden'">

        {{-- Page Heading --}}
        <div class="page-heading">
            {{-- Page Title --}}
            <div class="flex items-center justify-between">
                <h1 class="page-title">
                    Rentals
                </h1>
                <button x-on:click="addRentalSlideoverVisible = true" class="w-auto button button-primary">
                    <svg class="-ml-0.5 mr-1.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                    Add Rental
                </button>
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

    {{-- Add Rental Slideover --}}
    <x-slideover title="Add Rental" desc="Fill out the form below to add a new rental. Please note that all fields are required." alpineId="addRentalSlideoverVisible" action="submit" actionText="Add Rental">
        <livewire:host.rentals.components.add-rental-component />
    </x-slideover>

</x-layouts.host>
