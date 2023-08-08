<nav class="flex flex-col flex-1 px-6 pb-4">
    <ul role="list" class="flex flex-col flex-1 gap-y-7">
        <li>
            <ul role="list" class="-mx-2 space-y-1">
                <li>
                    <a href="{{ route('host.dashboard') }}" class="flex px-4 py-2 -mx-4 text-sm font-medium leading-6 group gap-x-3 {{ request()->routeIs('host.dashboard') ? 'bg-primary text-white' : 'text-muted hover:bg-gray-800 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 shrink-0" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                            <path d="M14 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                            <path d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                            <path d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z"></path>
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('host.test') }}" class="flex px-4 py-2 -mx-4 text-sm font-medium leading-6 group gap-x-3 {{ request()->routeIs('host.test') ? 'bg-primary text-white' : 'text-muted hover:bg-gray-800 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 shrink-0" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                            <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                            <path d="M9 12l.01 0"></path>
                            <path d="M13 12l2 0"></path>
                            <path d="M9 16l.01 0"></path>
                            <path d="M13 16l2 0"></path>
                        </svg>
                        Reservations
                    </a>
                </li>
                <li>
                    <a href="#" class="flex px-4 py-2 -mx-4 text-sm font-medium leading-6 group gap-x-3 {{ request()->routeIs('host.test') ? 'bg-primary text-white' : 'text-muted hover:bg-gray-800 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 shrink-0" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z"></path>
                            <path d="M16 3v4"></path>
                            <path d="M8 3v4"></path>
                            <path d="M4 11h16"></path>
                            <path d="M11 15h1"></path>
                            <path d="M12 15v3"></path>
                        </svg>
                        Calendar
                    </a>
                </li>
                <li>
                    <a href="{{ route('host.rentals.index') }}" class="flex px-4 py-2 -mx-4 text-sm font-medium leading-6 group gap-x-3 {{ request()->routeIs('host.rentals') ? 'bg-primary text-white' : 'text-muted hover:bg-gray-800 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 shrink-0" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8"></path>
                            <path d="M13 7l0 .01"></path>
                            <path d="M17 7l0 .01"></path>
                            <path d="M17 11l0 .01"></path>
                            <path d="M17 15l0 .01"></path>
                        </svg>
                        Rentals
                    </a>
                </li>
                <li>
                    <a href="{{ route('host.test') }}" class="flex px-4 py-2 -mx-4 text-sm font-medium leading-6 group gap-x-3 {{ request()->routeIs('host.test') ? 'bg-primary text-white' : 'text-muted hover:bg-gray-800 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 shrink-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                        </svg>
                        Guests
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <div class="text-xs font-medium leading-6 text-gray-400">Your teams</div>
            <ul role="list" class="mt-2 -mx-2 space-y-1">
                <li>
                    <!-- Current: "bg-gray-800 text-white", Default: "text-gray-400 hover:text-white hover:bg-gray-800" -->
                    <a href="#" class="flex p-2 text-sm font-medium leading-6 text-gray-400 rounded-md hover:text-white hover:bg-gray-800 group gap-x-3">
                        <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white">H</span>
                        <span class="truncate">Heroicons</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex p-2 text-sm font-medium leading-6 text-gray-400 rounded-md hover:text-white hover:bg-gray-800 group gap-x-3">
                        <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white">T</span>
                        <span class="truncate">Tailwind Labs</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex p-2 text-sm font-medium leading-6 text-gray-400 rounded-md hover:text-white hover:bg-gray-800 group gap-x-3">
                        <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-700 bg-gray-800 text-[0.625rem] font-medium text-gray-400 group-hover:text-white">W</span>
                        <span class="truncate">Workcatioasdfn</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="mt-auto">
            <ul role="list" class="-mx-2 space-y-1">
                <li>
                    <a href="{{ route('host.settings') }}" class="flex px-4 py-2 -mx-4 text-sm font-medium leading-6 group gap-x-3 {{ request()->routeIs('host.settings') ? 'bg-primary text-white' : 'text-muted hover:bg-gray-800 hover:text-white' }}">
                        <svg class="w-6 h-6 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Settings
                    </a>
                </li>
                <li>
                    <a href="{{ route('auth.logout') }}" class="flex px-4 py-2 -mx-4 text-sm font-medium leading-6 group gap-x-3 {{ request()->routeIs('auth.logout') ? 'bg-primary text-white' : 'text-muted hover:bg-gray-800 hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 shrink-0" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2"></path>
                            <path d="M15 12h-12l3 -3"></path>
                            <path d="M6 15l-3 -3"></path>
                        </svg>
                        Logout
                    </a>
                </li>
            </ul>
        </li>
        {{-- <li class="mt-auto">
            <a href="{{ route('auth.logout') }}" class="flex p-2 text-sm font-medium leading-6 text-gray-400 rounded-md hover:text-white hover:bg-gray-800 group gap-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 shrink-0" width="40" height="40" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M10 8v-2a2 2 0 0 1 2 -2h7a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-7a2 2 0 0 1 -2 -2v-2"></path>
                    <path d="M15 12h-12l3 -3"></path>
                    <path d="M6 15l-3 -3"></path>
                </svg>
                Logout
            </a>
        </li> --}}
    </ul>
</nav>
{{-- </div> --}}
