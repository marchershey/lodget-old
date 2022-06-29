<x-layouts.base>
    <!-- Background color split screen for large screens -->
    <div class="fixed top-0 left-0 w-1/2 h-full bg-white" aria-hidden="true"></div>
    <div class="fixed top-0 right-0 w-1/2 h-full bg-gray-50" aria-hidden="true"></div>
    <div class="relative flex flex-col min-h-screen">
        <!-- Navbar -->
        <nav class="flex-shrink-0 bg-primary">
            <div class="px-2 mx-auto max-w-7xl sm:px-4 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <!-- Logo section -->
                    <div class="flex items-center px-2 lg:px-0 xl:w-64">
                        <div class="flex-shrink-0">
                            <img class="w-auto h-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-300.svg" alt="Workflow">
                        </div>
                    </div>

                    <!-- Search section -->
                    <div class="flex justify-center flex-1 lg:justify-end">
                        <div class="w-full px-2 lg:px-6">
                            <label for="search" class="sr-only">Search projects</label>
                            <div class="relative text-indigo-200 focus-within:text-gray-400">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <!-- Heroicon name: solid/search -->
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input id="search" name="search" class="block w-full py-2 pl-10 pr-3 leading-5 text-indigo-100 placeholder-indigo-200 bg-indigo-400 bg-opacity-25 border border-transparent rounded-md focus:outline-none focus:bg-white focus:ring-0 focus:placeholder-gray-400 focus:text-gray-900 sm:text-sm" placeholder="Search projects" type="search">
                            </div>
                        </div>
                    </div>
                    <div class="flex lg:hidden">
                        <!-- Mobile menu button -->
                        <button type="button" class="inline-flex items-center justify-center p-2 text-indigo-400 rounded-md bg-primary hover:text-white hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <!--
              Icon when menu is closed.

              Heroicon name: outline/menu-alt-1

              Menu open: "hidden", Menu closed: "block"
            -->
                            <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                            <!--
              Icon when menu is open.

              Heroicon name: outline/x

              Menu open: "block", Menu closed: "hidden"
            -->
                            <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <!-- Links section -->
                    <div class="hidden lg:block lg:w-80">
                        <div class="flex items-center justify-end">
                            <div class="flex">
                                <a href="#" class="px-3 py-2 text-sm font-medium text-indigo-200 rounded-md hover:text-white">Documentation</a>
                                <a href="#" class="px-3 py-2 text-sm font-medium text-indigo-200 rounded-md hover:text-white">Support</a>
                            </div>
                            <!-- Profile dropdown -->
                            <div class="relative flex-shrink-0 ml-4">
                                <div>
                                    <button type="button" class="flex text-sm text-white bg-indigo-700 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-indigo-700 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=256&h=256&q=80" alt="">
                                    </button>
                                </div>

                                <!--
                Dropdown menu, show/hide based on menu state.

                Entering: "transition ease-out duration-100"
                  From: "transform opacity-0 scale-95"
                  To: "transform opacity-100 scale-100"
                Leaving: "transition ease-in duration-75"
                  From: "transform opacity-100 scale-100"
                  To: "transform opacity-0 scale-95"
              -->
                                <div class="absolute right-0 z-10 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">View Profile</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="lg:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3">
                    <a href="#" class="block px-3 py-2 text-base font-medium text-white bg-indigo-800 rounded-md">Dashboard</a>
                    <a href="#" class="block px-3 py-2 mt-1 text-base font-medium text-indigo-200 rounded-md hover:text-indigo-100 hover:bg-primary">Support</a>
                </div>
                <div class="pt-4 pb-3 border-t border-indigo-800">
                    <div class="px-2">
                        <a href="#" class="block px-3 py-2 text-base font-medium text-indigo-200 rounded-md hover:text-indigo-100 hover:bg-primary">Your Profile</a>
                        <a href="#" class="block px-3 py-2 mt-1 text-base font-medium text-indigo-200 rounded-md hover:text-indigo-100 hover:bg-primary">Settings</a>
                        <a href="#" class="block px-3 py-2 mt-1 text-base font-medium text-indigo-200 rounded-md hover:text-indigo-100 hover:bg-primary">Sign out</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- 3 column wrapper -->
        <div class="flex-grow w-full mx-auto max-w-7xl xl:px-8 lg:flex">
            <!-- Left sidebar & main wrapper -->
            <div class="flex-1 min-w-0 bg-white xl:flex">
                <div class="bg-white border-b border-gray-200 xl:border-b-0 xl:flex-shrink-0 xl:w-64 xl:border-r xl:border-gray-200">
                    <div class="h-full py-6 pl-4 pr-6 sm:pl-6 lg:pl-8 xl:pl-0">
                        <!-- Start left column area -->
                        <div class="relative h-full" style="min-height: 12rem">
                            <div class="absolute inset-0 border-2 border-gray-200 border-dashed rounded-lg"></div>
                        </div>
                        <!-- End left column area -->
                    </div>
                </div>

                <div class="bg-white lg:min-w-0 lg:flex-1">
                    <div class="h-full px-4 py-6 sm:px-6 lg:px-8">
                        <!-- Start main area-->
                        <div class="relative h-full" style="min-height: 36rem">
                            <div class="absolute inset-0 border-2 border-gray-200 border-dashed rounded-lg"></div>
                        </div>
                        <!-- End main area -->
                    </div>
                </div>
            </div>

            <div class="pr-4 bg-gray-50 sm:pr-6 lg:pr-8 lg:flex-shrink-0 lg:border-l lg:border-gray-200 xl:pr-0">
                <div class="h-full py-6 pl-6 lg:w-80">
                    <!-- Start right column area -->
                    <div class="relative h-full" style="min-height: 16rem">
                        <div class="absolute inset-0 border-2 border-gray-200 border-dashed rounded-lg"></div>
                    </div>
                    <!-- End right column area -->
                </div>
            </div>
        </div>
    </div>

</x-layouts.base>
