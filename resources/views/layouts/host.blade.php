@props(['title'])

{{-- Page --}}
<div class="flex h-screen text-white">
    {{-- Sidebar --}}
    <div class="h-full bg-gray-100 border-r w-72">

    </div>

    {{-- Content --}}

    <div class="">
        <ul role="list" class="divide-y divide-gray-100">
            <li class="flex justify-between py-5 gap-x-6">
                <div class="flex gap-x-4">
                    <img class="flex-none w-12 h-12 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div class="flex-auto min-w-0">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Leslie Alexander</p>
                        <p class="mt-1 text-xs leading-5 text-gray-500 truncate">leslie.alexander@example.com</p>
                    </div>
                </div>
                <div class="hidden sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Co-Founder / CEO</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
                </div>
            </li>
            <li class="flex justify-between py-5 gap-x-6">
                <div class="flex gap-x-4">
                    <img class="flex-none w-12 h-12 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div class="flex-auto min-w-0">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Michael Foster</p>
                        <p class="mt-1 text-xs leading-5 text-gray-500 truncate">michael.foster@example.com</p>
                    </div>
                </div>
                <div class="hidden sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Co-Founder / CTO</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
                </div>
            </li>
            <li class="flex justify-between py-5 gap-x-6">
                <div class="flex gap-x-4">
                    <img class="flex-none w-12 h-12 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div class="flex-auto min-w-0">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Dries Vincent</p>
                        <p class="mt-1 text-xs leading-5 text-gray-500 truncate">dries.vincent@example.com</p>
                    </div>
                </div>
                <div class="hidden sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Business Relations</p>
                    <div class="mt-1 flex items-center gap-x-1.5">
                        <div class="flex-none p-1 rounded-full bg-emerald-500/20">
                            <div class="h-1.5 w-1.5 rounded-full bg-emerald-500"></div>
                        </div>
                        <p class="text-xs leading-5 text-gray-500">Online</p>
                    </div>
                </div>
            </li>
            <li class="flex justify-between py-5 gap-x-6">
                <div class="flex gap-x-4">
                    <img class="flex-none w-12 h-12 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div class="flex-auto min-w-0">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Lindsay Walton</p>
                        <p class="mt-1 text-xs leading-5 text-gray-500 truncate">lindsay.walton@example.com</p>
                    </div>
                </div>
                <div class="hidden sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Front-end Developer</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
                </div>
            </li>
            <li class="flex justify-between py-5 gap-x-6">
                <div class="flex gap-x-4">
                    <img class="flex-none w-12 h-12 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div class="flex-auto min-w-0">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Courtney Henry</p>
                        <p class="mt-1 text-xs leading-5 text-gray-500 truncate">courtney.henry@example.com</p>
                    </div>
                </div>
                <div class="hidden sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Designer</p>
                    <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time datetime="2023-01-23T13:23Z">3h ago</time></p>
                </div>
            </li>
            <li class="flex justify-between py-5 gap-x-6">
                <div class="flex gap-x-4">
                    <img class="flex-none w-12 h-12 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div class="flex-auto min-w-0">
                        <p class="text-sm font-semibold leading-6 text-gray-900">Tom Cook</p>
                        <p class="mt-1 text-xs leading-5 text-gray-500 truncate">tom.cook@example.com</p>
                    </div>
                </div>
                <div class="hidden sm:flex sm:flex-col sm:items-end">
                    <p class="text-sm leading-6 text-gray-900">Director of Product</p>
                    <div class="mt-1 flex items-center gap-x-1.5">
                        <div class="flex-none p-1 rounded-full bg-emerald-500/20">
                            <div class="h-1.5 w-1.5 rounded-full bg-emerald-500"></div>
                        </div>
                        <p class="text-xs leading-5 text-gray-500">Online</p>
                    </div>
                </div>
            </li>
        </ul>

    </div>

</div>

<div x-data="{ sidebarVisible: false, asideVisible: false }" class="flex hidden h-full">

    {{-- Content --}}
    <div class="relative flex flex-col flex-1 min-w-0 overflow-hidden laptop:flex-row">

        {{-- Topbar --}}
        <div class="flex flex-col">

            <div class="flex items-center justify-between px-4 bg-gray-900">

                {{-- Left (mobile menu button) --}}
                <div class="flex items-center laptop:hidden">
                    <button x-show="!sidebarVisible" x-on:click="sidebarVisible = true" type="button" class="-m-2.5 p-2.5 text-muted">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                    <button x-show="sidebarVisible" x-cloak x-on:click="sidebarVisible = false" type="button" class="-m-2.5 p-2.5 text-muted">
                        <span class="sr-only">Close sidebar</span>
                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M18 6l-12 12"></path>
                            <path d="M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                {{-- Center (logo) --}}
                <div class="flex items-center justify-center w-64 lg:bg-gray-900 lg:-mx-4 h-14">
                    <div class="flex items-center justify-center space-x-4">
                        <div class="p-1.5 text-white rounded-full bg-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M16.555 3.843l3.602 3.602a2.877 2.877 0 0 1 0 4.069l-2.643 2.643a2.877 2.877 0 0 1 -4.069 0l-.301 -.301l-6.558 6.558a2 2 0 0 1 -1.239 .578l-.175 .008h-1.172a1 1 0 0 1 -.993 -.883l-.007 -.117v-1.172a2 2 0 0 1 .467 -1.284l.119 -.13l.414 -.414h2v-2h2v-2l2.144 -2.144l-.301 -.301a2.877 2.877 0 0 1 0 -4.069l2.643 -2.643a2.877 2.877 0 0 1 4.069 0z"></path>
                                <path d="M15 9h.01"></path>
                            </svg>
                        </div>
                        <div class="flex flex-1 space-x-4">
                            <div class="flex items-center space-x-2">
                                <h1 class="text-2xl font-bold tracking-wider text-white uppercase">
                                    {{ config('app.name') }}
                                </h1>
                                <div class="px-2 py-0.5 text-xs rounded-lg bg-primary">
                                    <span class="font-medium text-white">{{ config('app.build') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right side (notifications) --}}
                <div class="flex items-center laptop:hidden">
                    <button type="button" class="p-3 -m-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-muted" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
                            <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                        </svg>
                    </button>
                    {{-- <button type="button" class="p-3 -m-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M17.451 2.344a1 1 0 0 1 1.41 -.099a12.05 12.05 0 0 1 3.048 4.064a1 1 0 1 1 -1.818 .836a10.05 10.05 0 0 0 -2.54 -3.39a1 1 0 0 1 -.1 -1.41z" stroke-width="0" fill="currentColor"></path>
                            <path d="M5.136 2.245a1 1 0 0 1 1.312 1.51a10.05 10.05 0 0 0 -2.54 3.39a1 1 0 1 1 -1.817 -.835a12.05 12.05 0 0 1 3.045 -4.065z" stroke-width="0" fill="currentColor"></path>
                            <path d="M14.235 19c.865 0 1.322 1.024 .745 1.668a3.992 3.992 0 0 1 -2.98 1.332a3.992 3.992 0 0 1 -2.98 -1.332c-.552 -.616 -.158 -1.579 .634 -1.661l.11 -.006h4.471z" stroke-width="0" fill="currentColor"></path>
                            <path d="M12 2c1.358 0 2.506 .903 2.875 2.141l.046 .171l.008 .043a8.013 8.013 0 0 1 4.024 6.069l.028 .287l.019 .289v2.931l.021 .136a3 3 0 0 0 1.143 1.847l.167 .117l.162 .099c.86 .487 .56 1.766 -.377 1.864l-.116 .006h-16c-1.028 0 -1.387 -1.364 -.493 -1.87a3 3 0 0 0 1.472 -2.063l.021 -.143l.001 -2.97a8 8 0 0 1 3.821 -6.454l.248 -.146l.01 -.043a3.003 3.003 0 0 1 2.562 -2.29l.182 -.017l.176 -.004z" stroke-width="0" fill="currentColor"></path>
                        </svg>
                    </button> --}}
                </div>
            </div>

            {{-- Sidebar --}}
            <div :class="sidebarVisible ? '!flex lg:static' : 'hidden lg:flex'" class="absolute inset-0 z-10 hidden w-full pt-4 bg-gray-900 lg:w-64 lg:static lg:flex lg:flex-1 mt-14 lg:mt-0">
                <x-layouts.host-sidebar-menu />
            </div>
        </div>

        {{-- Main content --}}
        <div x-data="{ asideVisible: false }" class="relative flex flex-col flex-1">

            <div class="w-full bg-white page-padding-x">
                <h1 class="text-xl font-semibold">
                    {{ $title }}
                </h1>
            </div>
            <main class="page-padding">
                {{ $slot }}
            </main>


            {{-- @hasSection('aside')
                <div class="flex py-3 bg-white border-b page-padding-x laptop:hidden">
                    <div x-show="!asideVisible">
                        <button x-on:click="asideVisible = true" type="button" class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2 text-muted" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M5 12l14 0"></path>
                                <path d="M5 12l6 6"></path>
                                <path d="M5 12l6 -6"></path>
                            </svg>
                            <span class="font-medium">Settings Menu</span>
                        </button>
                    </div>
                </div>
            @endif --}}



            {{-- <div class="flex h-full laptop:relative">
                @hasSection('aside')
                    <div :class="asideVisible ? '!block !w-full' : 'hidden laptop:block'" class="absolute inset-0 hidden w-56 h-full bg-white border-r laptop:block">
                        <div class="page-padding">
                            @yield('aside')
                        </div>
                    </div>
                @endif

                <main>
                    {{ $slot }}
                </main>

            </div> --}}


        </div>
    </div>
</div>
