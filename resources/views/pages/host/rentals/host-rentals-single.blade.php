<x-layouts.host class="relative">
    <div wire:init="load" class="h-full">
        @if ($rental)
            <div x-data x-tabs default-index="0" class="page-container">
                {{-- Page Heading --}}
                <div class="page-heading">

                    {{-- Page Title --}}
                    <h1 class="page-title">
                        {{ $rental->name ?? '' }}
                    </h1>

                    {{-- Page Tabs --}}
                    <div class="page-submenu-container">
                        <nav x-tabs:list class="page-submenu" aria-label="Tabs">
                            <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                            <button x-tabs:tab type="button" :class="$tab.isSelected && 'menu-item-active'" class="menu-item">Overview</button>
                            <button x-tabs:tab type="button" :class="$tab.isSelected && 'menu-item-active'" class="menu-item">Photos</button>
                            <button x-tabs:tab type="button" :class="$tab.isSelected && 'menu-item-active'" class="menu-item">Rates</button>
                            <button x-tabs:tab type="button" :class="$tab.isSelected && 'menu-item-active'" class="menu-item">Reservations</button>
                            <button x-tabs:tab type="button" :class="$tab.isSelected && 'menu-item-active'" class="menu-item">Instructions</button>
                            <button x-tabs:tab type="button" :class="$tab.isSelected && 'menu-item-active'" class="menu-item">Settings</button>
                        </nav>
                    </div>
                </div>

                {{-- Content (tabs) --}}
                <div x-tabs:panels class="page-content-container">

                    {{-- General --}}
                    <div x-tabs:panel class="page-content">
                        <livewire:host.rentals.components.single-overview-component rental="{{ $rental->id }}" />
                    </div>

                    {{-- Photos --}}
                    <div x-tabs:panel class="page-content">
                        <livewire:host.rentals.components.single-overview-component rental="{{ $rental->id }}" />
                        {{-- <livewire:host.rentals.components.single-photos-component rentalId="{{ $rental->id }}" /> --}}
                    </div>
                </div>
            </div>
        @else
            <div class="flex items-center justify-center h-full">
                <svg class="w-12 h-12 text-muted animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        @endif
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('tabs', () => ({
                    activeTab: 'general',
                    isSelected(tab) {
                        return this.activeTab === tab;
                    },
                }))
            })
        </script>
    @endpush

</x-layouts.host>
