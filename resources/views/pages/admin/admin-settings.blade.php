<x-layouts.admin class="container-lg" x-data="app">

    <div>
        @section('sidebar-title', 'Settings')
        @section('sidebar')
            <nav class="sidebar-menu">
                <a x-on:click="setActive('properties')" class="sidebar-menu-item" :class="isActive('properties') && 'sidebar-menu-item-active'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
                    </svg>
                    <h1>Properties</h1>
                </a>
            </nav>
        @endsection

        <div x-show="isActive('settings')" x-cloak>
            <div class="padding">
                <div>
                    <h1 class="page-heading">Settings</h1>
                    <p class="page-desc">Edit application settings</p>
                </div>
            </div>
        </div>

        <div x-show="isActive('properties')" x-cloak>
            <div class="padding spacing">
                <h1 class="page-heading">Properties</h1>

                <livewire:pages.admin.settings.properties.property-types />
            </div>
        </div>

    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('app', () => ({
                    activeSection: null,
                    init() {
                        this.setActive('properties')
                    },
                    setActive(section) {
                        this.activeSection = section
                        @this.load(section);
                    },
                    isActive(section) {
                        return section == this.activeSection ? true : false
                    }
                }))
            })
        </script>
    @endpush
</x-layouts.admin>
