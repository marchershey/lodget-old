@php
    $mainMenuItems = [
        'Dashboard' => 'host.dashboard',
        'Reservations' => 'host.reservations',
        'Guests' => 'host.test',
    ];
    
    $profileMenuItems = [
        'Your Profile' => 'host.test',
        'Settings' => 'host.test',
    ];
@endphp

<div class="min-h-full" x-data="{ mobileMenuOpen: false }">
    <nav class="bg-gray-800">
        <div class="px-4 mx-auto max-w-screen-laptop sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="font-semibold tracking-wider text-white uppercase">
                            {{ config('app.name') }}
                        </h1>
                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-baseline ml-10 space-x-4">
                            @foreach ($mainMenuItems as $text => $route)
                                <a href="{{ route($route) }}" class="px-3 py-2 text-sm font-medium rounded-md hover:bg-gray-700 {{ request()->routeIs($route) ? 'bg-gray-900 text-white' : 'text-muted hover:text-white ' }}" aria-current="page">{{ $text }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end flex-shrink-0 space-x-2">
                    {{-- Notifications button --}}
                    <div>
                        <button type="button" class="p-2 rounded-full text-muted hover:text-white hover:bg-gray-700 hover:ring-2 hover:ring-gray-600">
                            <span class="sr-only">View notifications</span>
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </button>
                    </div>

                    {{-- Profile button (desktop) --}}
                    <div x-data="{ profileMenuOpen: false }" class="relative hidden laptop:block">
                        <div class="flex items-center">
                            <button x-on:click="profileMenuOpen = !profileMenuOpen" type="button" class="rounded-full hover:ring-2 hover:ring-white">
                                <img class="rounded-full w-9 h-9" src="https://ui-avatars.com/api/?name={{ auth()->user()->first_name }}+{{ auth()->user()->last_name }}&background=1d4ed8&color=fff&rounded=true&format=svg&bold=true" alt="">
                            </button>
                        </div>

                        <div x-show="profileMenuOpen" x-cloak class="absolute right-0 z-10 w-56 mt-2 origin-top-right">
                            <div class="overflow-hidden text-sm bg-white divide-y rounded-lg shadow-lg ring-1 ring-gray-300">
                                <div class="px-4 py-2 text-xs">
                                    Signed in as
                                    <span class="font-medium">{{ auth()->user()->fullName() }}</span>
                                    <span>({{ auth()->user()->email }})</span>
                                </div>
                                <div class="">
                                    @foreach ($profileMenuItems as $text => $route)
                                        <a href="{{ route($route) }}" class="block px-4 py-2 focus-visible:outline-none focus-visible:bg-gray-100 {{ request()->routeIs($route) ? 'bg-gray-100' : 'hover:bg-gray-100' }}">{{ $text }}</a>
                                    @endforeach
                                    <a href="{{ route('auth.logout') }}" class="block px-4 py-2 text-red-500 hover:bg-gray-100 focus-visible:outline-none focus-visible:bg-gray-100">Sign out</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Mobile menu button (mobile) --}}
                    <div class="md:hidden">
                        <button x-on:click="mobileMenuOpen = !mobileMenuOpen" type="button" class="p-2 text-muted">
                            <span class="sr-only">Open main menu</span>
                            <svg x-show="!mobileMenuOpen" class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <svg x-show="mobileMenuOpen" x-cloak class="block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div x-show="mobileMenuOpen" x-cloak class="md:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                @foreach ($mainMenuItems as $text => $route)
                    <a href="{{ route($route) }}" class="block px-3 py-2 text-base font-medium rounded-md {{ request()->routeIs($route) ? 'bg-gray-900 text-white' : 'text-muted' }}" aria-current="page">{{ $text }}</a>
                @endforeach
            </div>
            <div class="pt-4 pb-3 border-t border-gray-700">
                <div class="flex items-center px-5">
                    <div class="flex-shrink-0">
                        <img class="w-10 h-10 rounded-full" src="https://ui-avatars.com/api/?name={{ auth()->user()->first_name }}+{{ auth()->user()->last_name }}&background=1d4ed8&color=fff&rounded=true&format=svg&bold=true" alt="">

                    </div>
                    <div class="ml-3">
                        <div class="text-base font-medium text-white">{{ auth()->user()->fullName() }}</div>
                        <div class="text-sm font-medium text-muted">{{ auth()->user()->email }}</div>
                    </div>
                </div>
                <div class="px-2 mt-3 space-y-1">
                    @foreach ($profileMenuItems as $text => $route)
                        <a href="{{ route($route) }}" class="block px-3 py-2 text-base font-medium rounded-md {{ request()->routeIs($route) ? 'bg-gray-900 text-white' : 'text-muted hover:text-white ' }}">{{ $text }}</a>
                    @endforeach
                    <a href="#" class="block px-3 py-2 text-base font-medium text-red-500 rounded-md hover:bg-gray-700 hover:text-white">Sign out</a>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-white shadow-sm">
        <div class="px-4 py-4 mx-auto max-w-screen-laptop sm:px-6 lg:px-8">
            <h1 class="text-lg font-semibold leading-6 text-gray-900">Dashboard</h1>
        </div>
    </header>
    <main>
        <div class="py-6 mx-auto max-w-screen-laptop sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
</div>
