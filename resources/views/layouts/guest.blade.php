<x-layouts.base>
    <div class="min-h-screen bg-gray-100" x-data="{ menu: false }">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a href="{{ route('dashboard') }}">
                                <x-logo theme="dark" :showName="true" iconSize="w-6 h-6" />
                            </a>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <a href="{{ route('guest.dashboard') }}" class="px-3 py-2 text-sm font-medium {{ request()->is('guest/dashboard') ? 'text-white bg-gray-900 rounded-md' : 'text-gray-300 rounded-md hover:bg-gray-700 hover:text-white' }}" aria-current="page">Dashboard</a>
                                <a href="#" class="px-3 py-2 text-sm font-medium {{ request()->is('guest/reservations') ? 'text-white bg-gray-900 rounded-md' : 'text-gray-300 rounded-md hover:bg-gray-700 hover:text-white' }}">Reservations</a>
                                <a href="#" class="px-3 py-2 text-sm font-medium {{ request()->is('guest/support') ? 'text-white bg-gray-900 rounded-md' : 'text-gray-300 rounded-md hover:bg-gray-700 hover:text-white' }}">Support</a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <button type="button" class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                <span class="sr-only">View notifications</span>
                                <!-- Heroicon name: outline/bell -->
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>

                            <!-- Profile dropdown -->
                            <div class="relative ml-3" x-data="{ profile: false }">
                                <div>
                                    <button type="button" class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true" x-on:click="profile = !profile">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ auth()->user()->first_name }}+{{ auth()->user()->last_name }}&background=3b82f6&color=ffffff&bold=false&format=svg" alt="">
                                    </button>
                                </div>
                                <div class="absolute right-0 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" x-show="profile" x-cloak x-on:click.away="profile = false">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    <a href="{{ route('guest.profile') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                    <a href="{{ route('auth.logout') }}" class="block px-4 py-2 text-sm text-red-500" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="-mr-2 flex md:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false" x-on:click="menu = !menu">
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" x-show="!menu">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true" x-show="menu" x-cloak>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="md:hidden" id="mobile-menu" x-show="menu" x-cloak>
                <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="{{ route('guest.dashboard') }}" class="block px-3 py-2 text-base font-medium {{ request()->is('guest/dashboard') ? 'text-white bg-gray-900 rounded-md' : 'text-gray-300 rounded-md hover:bg-gray-700 hover:text-white' }}" aria-current="page">Dashboard</a>
                    <a href="#" class="block px-3 py-2 text-base font-medium {{ request()->is('guest/reservations') ? 'text-white bg-gray-900 rounded-md' : 'text-gray-300 rounded-md hover:bg-gray-700 hover:text-white' }}">Reservations</a>
                    <a href="#" class="block px-3 py-2 text-base font-medium {{ request()->is('guest/support') ? 'text-white bg-gray-900 rounded-md' : 'text-gray-300 rounded-md hover:bg-gray-700 hover:text-white' }}">Support</a>
                </div>
                <div class="border-t border-gray-700 pt-4 pb-3">
                    <div class="flex items-center px-5">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ auth()->user()->first_name }}+{{ auth()->user()->last_name }}&background=3b82f6&color=ffffff&bold=false&format=svg" alt="">
                        </div>
                        <div class="ml-3">
                            <div class="text-base font-medium capitalize text-white">{{ auth()->user()->fullName() }}</div>
                            <div class="text-sm font-medium text-gray-400">{{ auth()->user()->email }}</div>
                        </div>
                        <button type="button" class="ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                            <span class="sr-only">View notifications</span>
                            <!-- Heroicon name: outline/bell -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-3 space-y-1 px-2">
                        <a href="{{ route('guest.profile') }}" class="block px-3 py-2 text-base font-medium {{ request()->is('guest/profile') ? 'text-white bg-gray-900 rounded-md' : 'text-gray-300 rounded-md hover:bg-gray-700 hover:text-white' }}">Your Profile</a>
                        <a href="{{ route('auth.logout') }}" class="block rounded-md px-3 py-2 text-base font-medium text-red-500 hover:bg-gray-700 hover:text-white">Sign out</a>
                    </div>
                </div>
            </div>
        </nav>

        <header class="bg-white shadow-sm">
            <div class="mx-auto max-w-6xl px-4 py-4 sm:px-6 lg:px-8">
                <h1 class="text-lg font-semibold leading-6 text-gray-900">{{ $pageTitle }}</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-6xl py-6 sm:px-6 lg:px-8">
                <!-- Replace with your content -->
                {{ $slot }}
                <!-- /End replace -->
            </div>
        </main>
    </div>


</x-layouts.base>
