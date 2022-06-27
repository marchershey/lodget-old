<x-layouts.frontend>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="relative h-full bg-gray-100" x-data="{ mobileMenu: false }" :class="mobileMenu ? 'overflow-hidden' : 'overflow-y-auto'">
        <div class="hidden sm:block sm:absolute sm:inset-y-0 sm:h-full sm:w-full" aria-hidden="true">
            <div class="relative h-full max-w-4xl mx-auto">
                <svg class="absolute transform right-full translate-y-1/4 translate-x-1/4 lg:translate-x-1/2" width="404" height="784" fill="none" viewBox="0 0 404 784">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="784" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                </svg>
                <svg class="absolute transform left-full -translate-y-3/4 -translate-x-1/4 md:-translate-y-1/2 lg:-translate-x-1/2" width="404" height="784" fill="none" viewBox="0 0 404 784">
                    <defs>
                        <pattern id="5d0dd344-b041-4d26-bec4-8d33ea57ec9b" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="784" fill="url(#5d0dd344-b041-4d26-bec4-8d33ea57ec9b)" />
                </svg>
            </div>
        </div>

        <div class="relative flex flex-col pt-6 pb-16 space-y-16 sm:pb-24 sm:space-y-24">
            <div>
                {{-- Desktop menu --}}
                <div class="max-w-4xl px-4 mx-auto sm:px-6">
                    <nav class="relative flex items-center justify-between sm:h-10 md:justify-center" aria-label="Global">
                        <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
                            <div class="flex items-center justify-between w-full md:w-auto">
                                {{-- Logo --}}
                                <a href="{{ route('frontend.index') }}">
                                    <x-logo iconSize="w-6 h-6" />
                                </a>
                                {{-- Mobile menu button --}}
                                <div class="flex items-center -mr-2 md:hidden">
                                    <button type="button" class="inline-flex items-center justify-center p-2 text-gray-400 bg-gray-100 rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary" aria-expanded="false" x-on:click="mobileMenu = true">
                                        <span class="sr-only">Open main menu</span>
                                        <!-- Heroicon name: outline/menu -->
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:flex md:space-x-10">
                            <a href="#properties" class="font-medium text-gray-500 hover:text-gray-900">Properties</a>
                            <a href="#contact" class="font-medium text-gray-500 hover:text-gray-900">Get in touch</a>
                        </div>
                        <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0">
                            <span class="inline-flex rounded-md shadow">
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 text-base font-medium bg-white border border-transparent rounded-md text-primary hover:bg-gray-50"> Guest Portal </a>
                            </span>
                        </div>
                    </nav>
                </div>


                {{-- Mobile Menu --}}
                <div class="absolute inset-x-0 top-0 z-10 p-2 transition origin-top-right transform bg-black bg-opacity-50 h-view md:hidden" x-show="mobileMenu" x-cloak>
                    <div class="overflow-hidden bg-white rounded-lg shadow-md ring-1 ring-black ring-opacity-5" x-on:click.away="mobileMenu = false">
                        <div class="flex items-center justify-between px-5 pt-4">
                            <div>
                                <x-logo iconSize="h-6 w-6" />
                            </div>
                            <div class="-mr-2">
                                <button type="button" class="inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary" x-on:click="mobileMenu = false">
                                    <span class="sr-only">Close menu</span>
                                    <!-- Heroicon name: outline/x -->
                                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="px-2 pt-2 pb-3">
                            <a href="#properties" class="block px-3 py-2 text-lg font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50" x-on:click="mobileMenu = false">Properties</a>
                            <a href="#contact" class="block px-3 py-2 text-lg font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50" x-on:click="mobileMenu = false">Get in touch</a>
                        </div>
                        <a href="{{ route('dashboard') }}" class="block w-full p-4 text-lg font-medium text-center text-primary bg-gray-50 hover:bg-gray-100"> Guest Portal </a>
                    </div>
                </div>
            </div>

            {{-- <section class="flex flex-col px-4 mx-auto">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Find your next </span>
                        <span class="block text-primary xl:inline">vacation home</span>
                    </h1>
                    <p class="max-w-md mx-auto mt-3 text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">Let us make your next adventure even more memorable by showing you our vacation homes with welcoming atmospheres.</p>
                    <div class="max-w-md mx-auto mt-5 sm:flex sm:justify-center md:mt-8">
                        <div class="rounded-md shadow">
                            <a href="#" class="flex items-center justify-center w-full px-8 py-3 text-base font-medium text-white border border-transparent rounded-md bg-primary hover:bg-primary-dark md:py-4 md:text-lg md:px-10"> View Properties </a>
                        </div>
                        <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                            <a href="#" class="flex items-center justify-center w-full px-8 py-3 text-base font-medium bg-white border border-transparent rounded-md text-primary hover:bg-gray-50 md:py-4 md:text-lg md:px-10"> Get in touch </a>
                        </div>
                    </div>
                </div>
            </section> --}}

            <div class="pt-16 bg-white lg:py-24">
                <div class="pb-16 bg-indigo-600 lg:pb-0 lg:z-10 lg:relative">
                    <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-8">
                        <div class="relative lg:-mt-8">
                            <div class="max-w-md px-4 mx-auto sm:max-w-3xl sm:px-6 lg:p-0 lg:h-full">
                                <div class="overflow-hidden shadow-xl aspect-w-10 aspect-h-6 rounded-xl sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full">
                                    <img class="object-cover lg:h-full lg:w-full" src="https://images.unsplash.com/photo-1520333789090-1afc82db536a?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=2102&amp;q=80" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="mt-12 lg:m-0 lg:col-span-2 lg:pl-8">
                            <div class="max-w-md px-4 mx-auto sm:max-w-2xl sm:px-6 lg:px-0 lg:py-20 lg:max-w-none">
                                <blockquote>
                                    <div>
                                        <svg class="w-12 h-12 text-white opacity-25" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                                            <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z"></path>
                                        </svg>
                                        <p class="mt-6 text-2xl font-medium text-white">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed urna nulla vitae laoreet augue. Amet feugiat est integer dolor auctor adipiscing nunc urna, sit.
                                        </p>
                                    </div>
                                    <footer class="mt-6">
                                        <p class="text-base font-medium text-white">Judith Black</p>
                                        <p class="text-base font-medium text-indigo-100">CEO at PureInsights</p>
                                    </footer>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section>
                <div class="bg-white">
                    <div class="pb-16 bg-primary lg:pb-0 lg:z-10 lg:relative">
                        <div class="lg:mx-auto lg:max-w-4xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-8">
                            <div class="relative lg:-my-8">
                                {{-- <div aria-hidden="true" class="absolute inset-x-0 top-0 bg-white h-1/2 lg:hidden"></div> --}}
                                <div class="max-w-md px-4 mx-auto sm:max-w-3xl sm:px-6 lg:p-0 lg:h-full">
                                    <div class="overflow-hidden shadow-xl aspect-w-10 aspect-h-6 rounded-xl sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full">
                                        <img class="object-cover lg:h-full lg:w-full" src="https://images.unsplash.com/photo-1520333789090-1afc82db536a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2102&q=80" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-12 lg:m-0 lg:col-span-2 lg:pl-8">
                                <div class="max-w-md px-4 mx-auto sm:max-w-2xl sm:px-6 lg:px-0 lg:py-20 lg:max-w-none">
                                    <blockquote>
                                        <div>
                                            <svg class="w-12 h-12 text-white opacity-25" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                                                <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                                            </svg>
                                            <p class="mt-6 text-2xl font-medium text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed urna nulla vitae laoreet augue. Amet feugiat est integer dolor auctor adipiscing nunc urna, sit.</p>
                                        </div>
                                        <footer class="mt-6">
                                            <p class="text-base font-medium text-white">Judith Black</p>
                                            <p class="text-base font-medium text-indigo-100">CEO at PureInsights</p>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="bg-white">
                <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8 lg:py-24">
                    <div class="space-y-12 lg:grid lg:grid-cols-3 lg:gap-8 lg:space-y-0">
                        <div class="space-y-5 sm:space-y-4">
                            <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl">Meet your hosts</h2>
                            <p class="text-xl text-gray-500">Take a second to meet your hosts</p>
                        </div>
                        <div class="lg:col-span-2">
                            <ul role="list" class="space-y-12 sm:divide-y sm:divide-gray-200 sm:space-y-0 sm:-mt-8 lg:gap-x-8 lg:space-y-0">
                                <li class="sm:py-8">
                                    <div class="space-y-4 sm:grid sm:grid-cols-3 sm:items-start sm:gap-6 sm:space-y-0">
                                        <div class="aspect-w-3 aspect-h-2 sm:aspect-w-3 sm:aspect-h-4">
                                            <img class="object-cover rounded-lg shadow-lg" src="https://i.imgur.com/Ikrh2kh.png" alt="">
                                        </div>
                                        <div class="sm:col-span-2">
                                            <div class="space-y-4">
                                                <div class="space-y-1 text-lg font-medium leading-6">
                                                    <h3>Rob & Erin Serrate</h3>
                                                    <p class="text-indigo-600">Serrate Rentals</p>
                                                </div>
                                                <div class="text-lg">
                                                    <p class="text-gray-500">Ultricies massa malesuada viverra cras lobortis. Tempor orci hac ligula dapibus mauris sit ut eu. Eget turpis urna maecenas cras. Nisl dictum.</p>
                                                </div>
                                                {{-- <ul role="list" class="flex space-x-5">
                                                    <li>
                                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                                            <span class="sr-only">Twitter</span>
                                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                                <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                                            </svg>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="text-gray-400 hover:text-gray-500">
                                                            <span class="sr-only">LinkedIn</span>
                                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M16.338 16.338H13.67V12.16c0-.995-.017-2.277-1.387-2.277-1.39 0-1.601 1.086-1.601 2.207v4.248H8.014v-8.59h2.559v1.174h.037c.356-.675 1.227-1.387 2.526-1.387 2.703 0 3.203 1.778 3.203 4.092v4.711zM5.005 6.575a1.548 1.548 0 11-.003-3.096 1.548 1.548 0 01.003 3.096zm-1.337 9.763H6.34v-8.59H3.667v8.59zM17.668 1H2.328C1.595 1 1 1.581 1 2.298v15.403C1 18.418 1.595 19 2.328 19h15.34c.734 0 1.332-.582 1.332-1.299V2.298C19 1.581 18.402 1 17.668 1z" clip-rule="evenodd" />
                                                            </svg>
                                                        </a>
                                                    </li>
                                                </ul> --}}
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- More people... -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-layouts.frontend>
