<x-layouts.host x-data="{ addRentalSlideoverVisible: true }">

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
                    <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                        <li class="relative group hover:cursor-pointer">
                            <div class="absolute top-0 z-10 w-full">
                                <div class="flex items-center justify-between p-2 laptop:p-3">
                                    <span class="text-xs laptop:text-sm label label-green">Active</span>
                                    <button type="button" class="p-0.5 rounded-full bg-white/50 hover:bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 laptop:w-6 laptop:h-6 text-muted" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                            <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                            <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <a href="#" class="block p-0 space-y-0 overflow-hidden rounded-lg card">
                                <div class="block w-full overflow-hidden bg-gray-100 aspect-h-7 aspect-w-10 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                                    <img src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80" alt="" class="object-cover pointer-events-none laptop:group-hover:opacity-75">
                                </div>
                                <div class="p-2">
                                    <p class="block text-sm font-medium truncate laptop:text-base">Ohana Burnside</p>
                                    <p class="block text-xs pointer-events-none laptop:text-sm text-muted">$350 / night</p>
                                </div>
                            </a>
                        </li>

                        <!-- More files... -->
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <livewire:host.rentals.components.add-rental-component />

</x-layouts.host>
