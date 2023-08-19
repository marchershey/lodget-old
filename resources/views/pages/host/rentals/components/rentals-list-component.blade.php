<div wire:init="loadRentalsList">
    @if ($rentals)
        <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
            @foreach ($rentals as $rental)
                <li class="relative group hover:cursor-pointer">
                    <div class="absolute top-0 z-10 w-full pointer-events-none">
                        <div class="flex items-center justify-between p-2 laptop:p-3">
                            <div>
                                <span class="text-xs label label-red">Not Active</span>
                                <span class="hidden text-xs label label-green">Active</span>
                            </div>
                            {{-- <div class="pointer-events-auto">
                                <button type="button" class="p-0.5 z-20 rounded-full bg-white/50 hover:bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 laptop:w-6 laptop:h-6 text-muted" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                        <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                        <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                    </svg>
                                </button>
                                <div class="absolute right-0 z-10 w-40 mt-1 mr-2 origin-top-right bg-white rounded-md shadow-xl ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                    <div class="py-1" role="none">
                                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                        <a href="#" class="flex items-center px-4 py-2 space-x-2 text-xs hover:bg-gray-100" role="menuitem" tabindex="-1" id="menu-item-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4"></path>
                                                <path d="M13.5 6.5l4 4"></path>
                                            </svg>
                                            <span>Edit</span>
                                        </a>
                                        <a href="#" class="flex items-center px-4 py-2 space-x-2 text-xs hover:bg-red-500 hover:text-white" role="menuitem" tabindex="-1" id="menu-item-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 7l16 0"></path>
                                                <path d="M10 11l0 6"></path>
                                                <path d="M14 11l0 6"></path>
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                            </svg>
                                            <span>Delete</span>
                                        </a>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <a href="{{ route('host.rentals.single', $rental->slug) }}">
                        <div class="block p-0 space-y-0 overflow-hidden rounded-lg card">
                            <div class="block w-full overflow-hidden aspect-h-7 aspect-w-10 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                                <div class="flex items-center justify-center w-full h-full bg-gray-200/70">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 text-muted" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M15 8h.01"></path>
                                        <path d="M12 3c7.2 0 9 1.8 9 9s-1.8 9 -9 9s-9 -1.8 -9 -9s1.8 -9 9 -9z"></path>
                                        <path d="M3.5 15.5l4.5 -4.5c.928 -.893 2.072 -.893 3 0l5 5"></path>
                                        <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l2.5 2.5"></path>
                                    </svg>
                                </div>
                                {{-- <img src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80" alt="" class="object-cover pointer-events-none laptop:group-hover:opacity-75"> --}}
                            </div>
                            <div class="p-2">
                                <p class="block text-sm font-medium truncate laptop:text-base">{{ $rental->name }}</p>
                                <p class="block text-xs laptop:text-sm text-muted">{{ $rental->base_rate->format() }} / night</p>
                            </div>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
