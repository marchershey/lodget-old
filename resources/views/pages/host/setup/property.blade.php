<x-layouts.host hideNavigation x-data="hostSetupProperty">

    @section('sidebar-title', 'Setup')
    @section('sidebar')

        <nav class="padding">
            <ol class="space-y-5">
                <li class="relative">
                    <div class="absolute top-5 left-2 -ml-px mt-0.5 h-full w-0.5 bg-gray-300" :class="isCompleted(1) && '!bg-black'" aria-hidden="true"></div>
                    <a href="#" class="group">
                        <div class="flex items-center space-x-5">
                            <div class="flex items-center justify-center w-4 h-4 rounded-full" :class="isActive(1) || isCompleted(1) ? 'bg-black' : 'bg-gray-300'">
                                <svg x-show="isCompleted(1)" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                            <div :class="isActive(1) && 'font-semibold'">Basic Information</div>
                        </div>
                    </a>
                </li>
                <li class="relative">
                    <div class="absolute top-5 left-2 -ml-px mt-0.5 h-full w-0.5 bg-gray-300" :class="isCompleted(2) && '!bg-black'" aria-hidden="true"></div>
                    <a href="#" class="group">
                        <div class="flex items-center space-x-5">
                            <div class="flex items-center justify-center w-4 h-4 rounded-full" :class="isActive(2) || isCompleted(2) ? 'bg-black' : 'bg-gray-300'">
                                <svg x-show="isCompleted(2)" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                            <div :class="isActive(2) && 'font-semibold'">Property Details</div>
                        </div>
                    </a>
                </li>
                <li class="relative">
                    <div class="absolute top-5 left-2 -ml-px mt-0.5 h-full w-0.5 bg-gray-300" :class="isCompleted(3) && '!bg-black'" aria-hidden="true"></div>
                    <a href="#" class="group">
                        <div class="flex items-center space-x-5">
                            <div class="flex items-center justify-center w-4 h-4 rounded-full" :class="isActive(3) || isCompleted(3) ? 'bg-black' : 'bg-gray-300'">
                                <svg x-show="isCompleted(3)" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                            <div :class="isActive(3) && 'font-semibold'">Rooms & Spaces</div>
                        </div>
                    </a>
                </li>
                <li class="relative">
                    <div class="absolute top-5 left-2 -ml-px mt-0.5 h-full w-0.5 bg-gray-300" :class="isCompleted(4) && '!bg-black'" aria-hidden="true"></div>
                    <a href="#" class="group">
                        <div class="flex items-center space-x-5">
                            <div class="flex items-center justify-center w-4 h-4 rounded-full" :class="isActive(4) || isCompleted(4) ? 'bg-black' : 'bg-gray-300'">
                                <svg x-show="isCompleted(4)" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                            <div :class="isActive(4) && 'font-semibold'">Amenities</div>
                        </div>
                    </a>
                </li>
                <li class="relative">
                    <div class="absolute top-5 left-2 -ml-px mt-0.5 h-full w-0.5 bg-gray-300" :class="isCompleted(5) && '!bg-black'" aria-hidden="true"></div>
                    <a href="#" class="group">
                        <div class="flex items-center space-x-5">
                            <div class="flex items-center justify-center w-4 h-4 rounded-full" :class="isActive(5) || isCompleted(5) ? 'bg-black' : 'bg-gray-300'">
                                <svg x-show="isCompleted(5)" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                            <div :class="isActive(5) && 'font-semibold'">Photos</div>
                        </div>
                    </a>
                </li>
                <li class="relative">
                    <div class="absolute top-5 left-2 -ml-px mt-0.5 h-full w-0.5 bg-gray-300" :class="isCompleted(6) && '!bg-black'" aria-hidden="true"></div>
                    <a href="#" class="group">
                        <div class="flex items-center space-x-5">
                            <div class="flex items-center justify-center w-4 h-4 rounded-full" :class="isActive(6) || isCompleted(6) ? 'bg-black' : 'bg-gray-300'">
                                <svg x-show="isCompleted(6)" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                            <div :class="isActive(6) && 'font-semibold'">Pricing</div>
                        </div>
                    </a>
                </li>
                <li class="relative">
                    <a href="#" class="group">
                        <div class="flex items-center space-x-5">
                            <div class="flex items-center justify-center w-4 h-4 rounded-full" :class="isActive(7) || isCompleted(6) ? 'bg-black' : 'bg-gray-300'">
                                <svg x-show="isCompleted(7)" x-cloak xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M5 12l5 5l10 -10"></path>
                                </svg>
                            </div>
                            <div :class="isActive(7) && 'font-semibold'">Publish</div>
                        </div>
                    </a>
                </li>
            </ol>
        </nav>

    @endsection

    <div class="padding spacing">
        <div>
            <h1 class="page-heading">Property Setup</h1>
            <p class="page-desc">Before we can continue, let's add your very first property!</p>
        </div>

        {{-- Basic Information --}}
        <div x-show="page == 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="hidden" x-cloak>
            <livewire:pages.host.setup.property.basic-information />
        </div>

        {{-- Property Details --}}
        <div x-show="page == 2" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="hidden" x-cloak>
            <livewire:pages.host.setup.property.details />
        </div>

        {{-- Rooms & Spaces --}}
        <div x-show="page == 3" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="hidden" x-cloak>
            <livewire:pages.host.setup.property.rooms-spaces />
        </div>

        {{-- Amenities --}}
        <div x-show="page == 4" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="hidden" x-cloak>
            <livewire:pages.host.setup.property.amenities />
        </div>

        {{-- Photos --}}
        <div x-show="page == 5" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="hidden" x-cloak>
            <livewire:pages.host.setup.property.photos />
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('hostSetupProperty', () => ({
                    page: @entangle('page'),
                    init() {
                        this.page = 5
                    },
                    isActive(page) {
                        return this.page == page
                    },
                    isCompleted(page) {
                        return this.page > page
                    }
                }))
            })
        </script>
    @endpush

</x-layouts.host>
