@props(['hideNavigation' => false])

<div class="flex h-full bg-gray-100" x-data="{ mobileMenu: false }">
    <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
    <div x-show="mobileMenu" x-cloak class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

        <div class="fixed inset-0 z-40 flex">
            <div class="relative flex flex-col flex-1 w-full max-w-xs bg-white focus:outline-none">
                <div class="absolute top-0 right-0 pt-4 -mr-12">
                    <button x-on:click="mobileMenu = false" type="button" class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Close sidebar</span>
                        <!-- Heroicon name: outline/x-mark -->
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="pt-5 pb-4">
                    <div class="flex items-center flex-shrink-0 px-4">
                        <img class="w-auto h-8" src="https://tailwindui.com/img/logos/mark.svg?color=gray&shade=600" alt="Your Company">
                    </div>
                    <nav aria-label="Sidebar" class="mt-5">
                        <div class="px-2 space-y-1">
                            <a href="#" class="flex items-center p-2 text-base font-medium text-gray-600 rounded-md group hover:bg-gray-50 hover:text-gray-900">
                                <!-- Heroicon name: outline/home -->
                                <svg class="w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                Home
                            </a>

                            <a href="#" class="flex items-center p-2 text-base font-medium text-gray-600 rounded-md group hover:bg-gray-50 hover:text-gray-900">
                                <!-- Heroicon name: outline/fire -->
                                <svg class="w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0112 21 8.25 8.25 0 016.038 7.048 8.287 8.287 0 009 9.6a8.983 8.983 0 013.361-6.867 8.21 8.21 0 003 2.48z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 18a3.75 3.75 0 00.495-7.467 5.99 5.99 0 00-1.925 3.546 5.974 5.974 0 01-2.133-1A3.75 3.75 0 0012 18z" />
                                </svg>
                                Trending
                            </a>

                            <a href="#" class="flex items-center p-2 text-base font-medium text-gray-600 rounded-md group hover:bg-gray-50 hover:text-gray-900">
                                <!-- Heroicon name: outline/bookmark-square -->
                                <svg class="w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                                </svg>
                                Bookmarks
                            </a>

                            <a href="#" class="flex items-center p-2 text-base font-medium text-gray-600 rounded-md group hover:bg-gray-50 hover:text-gray-900">
                                <!-- Heroicon name: outline/inbox -->
                                <svg class="w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                                </svg>
                                Messages
                            </a>

                            <a href="#" class="flex items-center p-2 text-base font-medium text-gray-600 rounded-md group hover:bg-gray-50 hover:text-gray-900">
                                <!-- Heroicon name: outline/user -->
                                <svg class="w-6 h-6 mr-4 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                </svg>
                                Profile
                            </a>
                        </div>
                    </nav>
                </div>
                <div class="flex flex-shrink-0 p-4 border-t border-gray-200">
                    <a href="#" class="flex-shrink-0 block group">
                        <div class="flex items-center">
                            <div>
                                <img class="inline-block w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            </div>
                            <div class="ml-3">
                                <p class="text-base font-medium text-gray-700 group-hover:text-gray-900">Emily Selman</p>
                                <p class="text-sm font-medium text-gray-500 group-hover:text-gray-700">Account Settings</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="flex-shrink-0 w-14" aria-hidden="true">
                <!-- Force sidebar to shrink to fit close icon -->
            </div>
        </div>
    </div>

    <!-- Static sidebar for desktop -->
    @if ($hideNavigation === false)
        <div class="hidden lg:flex lg:flex-shrink-0">
            <div class="flex flex-col w-28">
                <div class="flex flex-col flex-1 min-h-0 overflow-y-auto bg-gray-800">
                    <div class="flex-1">
                        <div class="flex items-center justify-center py-4 bg-gray-900">
                            <img class="w-auto h-8" src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="Your Company">
                        </div>
                        <nav aria-label="Sidebar" class="flex flex-col items-center px-2 py-6 space-y-3">
                            <a href="{{ route('host.dashboard') }}" class="flex flex-col items-center w-full p-4 space-y-2 text-gray-200 rounded-lg hover:bg-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="12" cy="13" r="2"></circle>
                                    <line x1="13.45" y1="11.55" x2="15.5" y2="9.5"></line>
                                    <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
                                </svg>
                                <span class="text-xs">Dashboard</span>
                            </a>
                            <a href="{{ route('host.dashboard') }}" class="flex flex-col items-center w-full p-4 space-y-2 text-gray-200 rounded-lg hover:bg-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                    <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                                    <line x1="9" y1="12" x2="9.01" y2="12"></line>
                                    <line x1="13" y1="12" x2="15" y2="12"></line>
                                    <line x1="9" y1="16" x2="9.01" y2="16"></line>
                                    <line x1="13" y1="16" x2="15" y2="16"></line>
                                </svg>
                                <span class="text-xs">Reservations</span>
                            </a>
                            <a href="{{ route('host.dashboard') }}" class="flex flex-col items-center w-full p-4 space-y-2 text-gray-200 rounded-lg hover:bg-gray-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="transparent" fill="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M19 2H9c-1.103 0-2 .897-2 2v5.586l-4.707 4.707A1 1 0 0 0 3 16v5a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V4c0-1.103-.897-2-2-2zm-8 18H5v-5.586l3-3 3 3V20zm8 0h-6v-4a.999.999 0 0 0 .707-1.707L9 9.586V4h10v16z"></path>
                                    <path d="M11 6h2v2h-2zm4 0h2v2h-2zm0 4.031h2V12h-2zM15 14h2v2h-2zm-8 1h2v2H7z"></path>
                                </svg>
                                <span class="text-xs">Properties</span>
                            </a>
                        </nav>
                    </div>
                    <div class="flex flex-shrink-0 pb-5">
                        <a href="#" class="flex-shrink-0 w-full">
                            <img class="block w-10 h-10 mx-auto rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <div class="sr-only">
                                <p>Emily Selman</p>
                                <p>Account settings</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="flex flex-col flex-1 min-w-0 overflow-hidden">
        <!-- Mobile top navigation -->
        <div class="bg-gray-800">
            <div class="container">
                <div class="flex items-center justify-between px-4 py-2 sm:px-6 lg:px-8 lg:hidden">
                    <div>
                        <img class="w-auto h-8" src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="Your Company">
                    </div>
                    <div>
                        <button x-on:click="mobileMenu = true" type="button" class="inline-flex items-center justify-center w-12 h-12 -mr-3 text-white bg-gray-800 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                            <span class="sr-only">Open sidebar</span>
                            <!-- Heroicon name: outline/bars-3 -->
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <main class="flex flex-1 overflow-hidden" {{ $attributes }}>
            <!-- Primary column -->
            <section aria-labelledby="primary-heading" class="flex flex-col flex-1 h-full min-w-0 overflow-y-auto lg:order-last">
                <div class="container my-10 {{ $attributes->get('class') }}">
                    {{ $slot }}
                </div>
            </section>

            <!-- Secondary column (hidden on smaller screens) -->
            @hasSection('sidebar')
                <aside class="hidden lg:order-first lg:block lg:flex-shrink-0">
                    <div class="sidebar">
                        @hasSection('sidebar-title')
                            <div class="sidebar-title">
                                @yield('sidebar-title')
                            </div>
                        @endif

                        @yield('sidebar')
                    </div>
                </aside>
            @endif
        </main>
    </div>
</div>
