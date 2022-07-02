<x-layouts.base>
    <div class="min-h-full">
        <header class="bg-white shadow-sm lg:static lg:overflow-y-visible" x-data="{ mobileMenu: false }">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="relative flex justify-between xl:grid xl:grid-cols-12 lg:gap-8">
                    <div class="flex md:absolute md:left-0 md:inset-y-0 lg:static xl:col-span-2">
                        <div class="flex items-center flex-shrink-0">
                            <a href="#">
                                <x-logo :showText="false" iconSize="w-6 h-6" />
                            </a>
                        </div>
                    </div>
                    <div class="flex-1 min-w-0 md:px-8 lg:px-0 xl:col-span-7">
                        <div class="flex items-center px-6 py-4 md:max-w-3xl md:mx-auto lg:max-w-none lg:mx-0 xl:px-0">
                            <div class="w-full">
                                <label for="search" class="sr-only">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <!-- Heroicon name: solid/search -->
                                        <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input id="search" name="search" class="block w-full py-2 pl-10 pr-3 text-sm placeholder-gray-500 bg-white border border-gray-300 rounded-md focus:outline-none focus:text-gray-900 focus:placeholder-gray-400 focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm" placeholder="Search" type="search">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center md:absolute md:right-0 md:inset-y-0 lg:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" class="inline-flex items-center justify-center p-2 -mx-2 text-gray-400 rounded-md hover:bg-gray-100 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary" aria-expanded="false">
                            <span class="sr-only">Open menu</span>
                            <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" x-show="!mobileMenu" x-on:click="mobileMenu = true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" x-show="mobileMenu" x-cloak x-on:click="mobileMenu = false">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="hidden lg:flex lg:items-center lg:justify-end xl:col-span-3">

                        {{-- Property Selector --}}
                        {{-- <div class="relative inline-block text-left" x-data="{ open: false }">
                            <div>
                                <button type="button" class="flex items-center py-2 space-x-2 hover:underline text-muted" id="menu-button" aria-expanded="true" aria-haspopup="true" x-on:click="open = !open">
                                    <span class="text-sm font-medium">
                                        Ohana Burnside
                                    </span>
                                    <svg class="w-4 h-4 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="absolute right-0 z-10 w-56 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" x-show="open" x-cloak x-on:click.away="open = false">
                                <div class="py-1" role="none">
                                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-0">Ohana Burnside</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-0">Ohana Burnside</a>
                                    <hr>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="menu-item-2">Add New Property...</a>
                                </div>
                            </div>
                        </div> --}}

                        {{-- Notifications --}}
                        <a href="#" class="flex-shrink-0 p-1 ml-5 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            <span class="sr-only">View notifications</span>
                            <!-- Heroicon name: outline/bell -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </a>

                        <!-- Profile dropdown -->
                        <div class="relative flex-shrink-0 ml-5" x-data="{ profileMenu: false }">
                            <div>
                                <button type="button" class="flex bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary" id="user-menu-button" aria-expanded="false" aria-haspopup="true" x-on:click="profileMenu = !profileMenu">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name={{ auth()->user()->first_name }}+{{ auth()->user()->last_name }}&background=2563eb&color=ffffff&bold=false&format=svg" alt="">
                                </button>
                            </div>
                            <div class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" x-show="profileMenu" x-cloak x-on:click.away="profileMenu = false">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                <a href="{{ route('auth.logout') }}" class="block px-4 py-2 text-sm text-red-500" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                            </div>
                        </div>

                        <a href="#" class="inline-flex items-center px-4 py-2 ml-6 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"> Quick Add </a>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <nav class="lg:hidden" aria-label="Global" x-show="mobileMenu" x-cloak x-on:click.away="mobileMenu = false">
                <div class="max-w-3xl px-2 pt-2 pb-3 mx-auto space-y-1 sm:px-4">
                    <!-- Current: "bg-gray-100 text-gray-900", Default: "hover:bg-gray-50" -->
                    <a href="#" aria-current="page" class="block px-3 py-2 text-base font-medium text-gray-900 bg-gray-100 rounded-md">Home</a>
                    <a href="#" class="block px-3 py-2 text-base font-medium rounded-md hover:bg-gray-50">Popular</a>
                    <a href="#" class="block px-3 py-2 text-base font-medium rounded-md hover:bg-gray-50">Communities</a>
                    <a href="#" class="block px-3 py-2 text-base font-medium rounded-md hover:bg-gray-50">Trending</a>
                </div>
                <div class="pt-4 border-t border-gray-200">
                    <div class="flex items-center max-w-3xl px-4 mx-auto sm:px-6">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-full" src="https://ui-avatars.com/api/?name={{ auth()->user()->first_name }}+{{ auth()->user()->last_name }}&background=2563eb&color=ffffff&bold=false&format=svg" alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-white capitalize">{{ auth()->user()->fullName() }}</div>
                            <div class="text-sm font-medium text-gray-400">{{ auth()->user()->email }}</div>
                        </div>
                        <button type="button" class="flex-shrink-0 p-1 ml-auto text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            <span class="sr-only">View notifications</span>
                            <!-- Heroicon name: outline/bell -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>
                    </div>
                    <div class="max-w-3xl px-2 mx-auto mt-3 space-y-1 sm:px-4">
                        <a href="#" class="block px-3 py-2 text-base font-medium text-gray-500 rounded-md hover:bg-gray-50 hover:text-gray-900">Your Profile</a>
                        <a href="#" class="block px-3 py-2 text-base font-medium text-gray-500 rounded-md hover:bg-gray-50 hover:text-gray-900">Settings</a>
                        <a href="#" class="block px-3 py-2 text-base font-medium text-gray-500 rounded-md hover:bg-gray-50 hover:text-gray-900">Sign out</a>
                    </div>
                </div>

                <div class="max-w-3xl px-4 mx-auto mt-6 sm:px-6">
                    <a href="#" class="flex items-center justify-center w-full px-4 py-2 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-primary hover:bg-primary-dark"> New Post </a>

                    <div class="flex justify-center mt-6">
                        <a href="#" class="text-base font-medium text-gray-900 hover:underline"> Go Premium </a>
                    </div>
                </div>
            </nav>
        </header>

        <div class="py-10">
            <div class="grid max-w-3xl grid-cols-1 mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid-cols-12 lg:gap-8" {{ $attributes }}>

                {{-- Navigation (left sidebar) --}}
                <div class="hidden lg:block lg:col-span-3 xl:col-span-2">
                    <nav aria-label="Sidebar" class="sticky divide-y divide-gray-300 top-4">
                        <div class="pb-8 space-y-1">
                            <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-600 hover:bg-gray-50" -->
                            <a href="{{ route('host.dashboard') }}" class="flex items-center px-3 py-2 text-sm font-medium text-gray-900 rounded-md group" aria-current="page">
                                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-gray-500" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 4h6v8h-6z"></path>
                                    <path d="M4 16h6v4h-6z"></path>
                                    <path d="M14 12h6v8h-6z"></path>
                                    <path d="M14 4h6v4h-6z"></path>
                                </svg>
                                <span class="font-bold truncate"> Dashboard </span>
                            </a>

                            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-50 group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-gray-400 group-hover:text-gray-500" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                    <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                                    <line x1="9" y1="12" x2="9.01" y2="12"></line>
                                    <line x1="13" y1="12" x2="15" y2="12"></line>
                                    <line x1="9" y1="16" x2="9.01" y2="16"></line>
                                    <line x1="13" y1="16" x2="15" y2="16"></line>
                                </svg>
                                <span class="truncate"> Reservations </span>
                            </a>

                            <a href="{{ route('host.properties') }}" class="flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-50 group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-gray-400 group-hover:text-gray-500" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="3" y1="21" x2="21" y2="21"></line>
                                    <path d="M4 21v-11l2.5 -4.5l5.5 -2.5l5.5 2.5l2.5 4.5v11"></path>
                                    <circle cx="12" cy="9" r="2"></circle>
                                    <path d="M9 21v-5a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v5"></path>
                                </svg>
                                <span class="truncate"> Properties </span>
                            </a>

                            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-600 rounded-md hover:bg-gray-50 group">
                                <!-- Heroicon name: outline/trending-up -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 mr-3 -ml-1 text-gray-400 group-hover:text-gray-500" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                <span class="truncate"> Settings </span>
                            </a>
                        </div>
                    </nav>
                </div>

                <main class="md:col-span-6 xl:col-span-7">
                    {{ $slot }}
                </main>

                @if (isset($aside))
                    <aside class="md:col-span-3 xl:col-span-3 @if ($asideTop) order-first lg:order-last @endif">
                        {{ $aside }}
                    </aside>
                @endif
            </div>
        </div>
    </div>

</x-layouts.base>
