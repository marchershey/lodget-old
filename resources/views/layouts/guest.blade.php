<x-layouts.base>
    <div class="min-h-screen bg-gray-100" x-data="{ menu: false }">
        <nav class="bg-gray-800">
            <div class="max-w-4xl px-4 mx-auto sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('dashboard') }}">
                                <x-logo theme="dark" :showName="true" iconSize="w-6 h-6" />
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <div class="flex items-baseline ml-10 space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="{{ route('guest.dashboard') }}" class="px-3 py-2 text-sm font-medium {{ request()->is('guest/dashboard') ? 'text-white bg-gray-900 rounded-md' : 'text-gray-300 rounded-md hover:bg-gray-700 hover:text-white' }}" aria-current="page">Dashboard</a>
                                <a href="#" class="px-3 py-2 text-sm font-medium {{ request()->is('guest/reservations') ? 'text-white bg-gray-900 rounded-md' : 'text-gray-300 rounded-md hover:bg-gray-700 hover:text-white' }}">Reservations</a>
                                <a href="#" class="px-3 py-2 text-sm font-medium {{ request()->is('guest/support') ? 'text-white bg-gray-900 rounded-md' : 'text-gray-300 rounded-md hover:bg-gray-700 hover:text-white' }}">Support</a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-center ml-4 md:ml-6">
                            <button type="button" class="p-1 text-gray-400 bg-gray-800 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                                <span class="sr-only">View notifications</span>
                                <!-- Heroicon name: outline/bell -->
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>

                            <!-- Profile dropdown -->
                            <div class="relative ml-3" x-data="{ profile: false }">
                                <div>
                                    <button type="button" class="flex items-center max-w-xs text-sm text-white bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true" x-on:click="profile = !profile">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?name={{ auth()->user()->first_name }}+{{ auth()->user()->last_name }}&background=3b82f6&color=ffffff&bold=false&format=svg" alt="">
                                    </button>
                                </div>
                                <div class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" x-show="profile" x-cloak x-on:click.away="profile = false">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    <a href="{{ route('guest.profile') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                    <a href="{{ route('auth.logout') }}" class="block px-4 py-2 text-sm text-red-500" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mr-2 md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" class="inline-flex items-center justify-center p-2 text-gray-400 bg-gray-800 rounded-md hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false" x-on:click="menu = !menu">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" x-show="!menu">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" x-show="menu" x-cloak>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu" x-show="menu" x-cloak>
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="{{ route('guest.dashboard') }}" class="block px-3 py-2 text-base font-medium {{ request()->is('guest/dashboard') ? 'text-white bg-gray-900 rounded-md' : 'text-gray-300 rounded-md hover:bg-gray-700 hover:text-white' }}" aria-current="page">Dashboard</a>
                    <a href="#" class="block px-3 py-2 text-base font-medium {{ request()->is('guest/reservations') ? 'text-white bg-gray-900 rounded-md' : 'text-gray-300 rounded-md hover:bg-gray-700 hover:text-white' }}">Reservations</a>
                    <a href="#" class="block px-3 py-2 text-base font-medium {{ request()->is('guest/support') ? 'text-white bg-gray-900 rounded-md' : 'text-gray-300 rounded-md hover:bg-gray-700 hover:text-white' }}">Support</a>
                </div>
                <div class="pt-4 pb-3 border-t border-gray-700">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-full" src="https://ui-avatars.com/api/?name={{ auth()->user()->first_name }}+{{ auth()->user()->last_name }}&background=3b82f6&color=ffffff&bold=false&format=svg" alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium text-white capitalize">{{ auth()->user()->fullName() }}</div>
                            <div class="text-sm font-medium text-gray-400">{{ auth()->user()->email }}</div>
                        </div>
                        <button type="button" class="flex-shrink-0 p-1 ml-auto text-gray-400 bg-gray-800 rounded-full hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                            <span class="sr-only">View notifications</span>
                            <!-- Heroicon name: outline/bell -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>
                    </div>
                    <div class="px-2 mt-3 space-y-1">
                        <a href="{{ route('guest.profile') }}" class="block px-3 py-2 text-base font-medium {{ request()->is('guest/profile') ? 'text-white bg-gray-900 rounded-md' : 'text-gray-300 rounded-md hover:bg-gray-700 hover:text-white' }}">Your Profile</a>
                        <a href="{{ route('auth.logout') }}" class="block px-3 py-2 text-base font-medium text-red-500 rounded-md hover:text-white hover:bg-gray-700">Sign out</a>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow-sm">
            <div class="max-w-4xl px-4 py-4 mx-auto sm:px-6 lg:px-8">
                <h1 class="text-lg font-semibold leading-6 text-gray-900">{{ $pageTitle }}</h1>
            </div>
        </header>
        <main>
            <div class="max-w-4xl py-6 mx-auto sm:px-6 lg:px-8">
                <!-- Replace with your content -->
                {{ $slot }}
                <!-- /End replace -->
            </div>
        </main>
    </div>


</x-layouts.base>
