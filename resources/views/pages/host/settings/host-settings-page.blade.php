<x-layouts.host>

    <div x-data x-tabs default-index="1" class="page-container">

        {{-- Page Heading --}}
        <div class="page-heading">
            {{-- Page Title --}}
            <h1 class="page-title">
                Settings
            </h1>

            {{-- Page Submenu --}}
            <div class="page-submenu-container">
                <nav x-tabs:list class="page-submenu" aria-label="Tabs">
                    <!-- Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                    <button x-tabs:tab type="button" :class="$tab.isSelected && 'menu-item-active'" class="menu-item">General</button>
                    <button x-tabs:tab type="button" :class="$tab.isSelected && 'menu-item-active'" class="menu-item">Rentals</button>
                    <button x-tabs:tab type="button" :class="$tab.isSelected && 'menu-item-active'" class="menu-item">Messaging</button>
                    <button x-tabs:tab type="button" :class="$tab.isSelected && 'menu-item-active'" class="menu-item">Billing</button>
                    <button x-tabs:tab type="button" :class="$tab.isSelected && 'menu-item-active'" class="menu-item">Guests</button>
                </nav>
            </div>
        </div>



        {{-- Content (tabs) --}}
        <div x-tabs:panels class="page-content-container">

            {{-- General --}}
            <div x-tabs:panel class="page-content">
                hello
            </div>

            {{-- Rentals --}}
            <div x-tabs:panel x-cloak class="page-content">
                {{-- Rental Policies --}}
                <livewire:host.settings.components.rentals.rental-policies-component />
                <livewire:host.settings.components.rentals.rental-fees-component />
            </div>

            {{-- Messaging --}}
            <div x-tabs:panel x-cloak>
                Messaging
            </div>

            {{-- Billing --}}
            <div x-tabs:panel x-cloak>
                Billing
            </div>

            {{-- Guests --}}
            <div x-tabs:panel x-cloak>
                Guests
            </div>
        </div>
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
