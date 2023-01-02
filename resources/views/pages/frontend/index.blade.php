<x-layouts.frontend>
    {{-- property search --}}
    <section class="h-view-minus-navbar flex w-full items-center justify-center bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1591825729269-caeb344f6df2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8')">

        <div class="frontend-container mx-auto max-w-2xl">
            <div class="panel panel-body bg-white/90">
                <div class="text-center">
                    <h1 class="text-2xl font-semibold uppercase text-gray-800">Book your perfect family vacation</h1>
                    <span class="text-muted">Search through our properties below</span>
                </div>
                <div class="flex flex-col gap-5">
                    <input type="text" name="" id="" class="input bg-white text-center" placeholder="Search the property name or location">
                    <button class="button">Search</button>
                </div>
            </div>
        </div>
    </section>

    {{-- Newsletter --}}
    <section class="frontend-section">
        <div class="bg-white">
            <div class="relative sm:py-16">
                <div aria-hidden="true" class="hidden sm:block">
                    <div class="absolute inset-y-0 left-0 w-1/2 rounded-r-3xl bg-gray-200"></div>
                    <svg class="absolute top-8 left-1/2 -ml-3" width="404" height="392" fill="none" viewBox="0 0 404 392">
                        <defs>
                            <pattern id="8228f071-bcee-4ec8-905a-2a059a2cc4fb" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="392" fill="url(#8228f071-bcee-4ec8-905a-2a059a2cc4fb)" />
                    </svg>
                </div>
                <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
                    <div class="bg-primary relative overflow-hidden rounded-2xl px-6 py-10 shadow-xl sm:px-12 sm:py-20">
                        <div aria-hidden="true" class="absolute inset-0 -mt-72 sm:-mt-32 md:mt-0">
                            <svg class="absolute inset-0 h-full w-full" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 1463 360">
                                <path class="text-primary-dark text-opacity-40" fill="currentColor" d="M-82.673 72l1761.849 472.086-134.327 501.315-1761.85-472.086z" />
                                <path class="text-primary-dark text-opacity-40" fill="currentColor" d="M-217.088 544.086L1544.761 72l134.327 501.316-1761.849 472.086z" />
                            </svg>
                        </div>
                        <div class="relative">
                            <div class="sm:text-center">
                                <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">Sign up for our newsletter</h2>
                                <p class="mx-auto mt-6 max-w-2xl text-lg text-indigo-200">We occasionally share information about new properties, discounted rates, or important travel tips to our guests. If you would like to stay in the loop, join our newsletter!</p>
                            </div>
                            <form action="#" class="mt-12 sm:mx-auto sm:flex sm:max-w-lg">
                                <div class="min-w-0 flex-1">
                                    <label for="cta-email" class="sr-only">Email address</label>
                                    <input id="cta-email" type="email" class="focus:ring-offset-primary block w-full rounded-md border border-transparent px-5 py-3 text-base text-gray-900 placeholder-gray-500 shadow-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2" placeholder="Enter your email">
                                </div>
                                <div class="mt-4 sm:mt-0 sm:ml-3">
                                    <button type="submit" class="bg-primary-light hover:bg-primary-dark focus:ring-offset-primary block w-full rounded-md border border-transparent px-5 py-3 text-base font-medium text-white shadow focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 sm:px-10">Notify me</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- meet your hosts --}}
    <section class="frontend-section">
        <div class="frontend-section-heading">
            <h1 class="mb-2 text-4xl font-bold text-gray-800">Meet your hosts</h1>
            <span class="text-muted text-lg">Let us introduce ourselves</span>
        </div>

        <div class="mt-20 bg-white">
            <div class="bg-primary pb-16 lg:relative lg:z-10 lg:pb-0">
                <div class="lg:mx-auto lg:grid lg:max-w-7xl lg:grid-cols-3 lg:gap-8 lg:px-8">
                    <div class="relative lg:-my-8">
                        <div aria-hidden="true" class="absolute inset-x-0 top-0 h-1/2 bg-white lg:hidden"></div>
                        <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:h-full lg:p-0">
                            <div class="aspect-w-10 aspect-h-6 sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none overflow-hidden rounded-xl shadow-xl lg:h-full">
                                <img class="object-cover lg:h-full lg:w-full" src="https://i.imgur.com/Ikrh2kh.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="mt-12 lg:col-span-2 lg:m-0 lg:pl-8">
                        <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0 lg:py-20">
                            <blockquote class="font-medium text-white">
                                <div>
                                    <svg class="h-12 w-12 opacity-25" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                                        <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                                    </svg>
                                    <p class="mt-6 text-2xl">Creating new memories is very important to us, so our commitment is to ensure you will do the same with your family when you stay with us!</p>
                                    {{-- <p class="mt-6 text-2xl font-medium text-white">Our goal is to ensure that your stay with us is memorable, because making memories with family is very important to us.</p> --}}
                                </div>
                                <footer class="mt-6 text-lg">
                                    <p class="">Rob & Erin Serrate</p>
                                    <p class="text-primary-muted">{{ config('app.name') }}</p>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Properties --}}
    <section class="frontend-section" id="properties">
        <div class="frontend-section-heading">
            <h1 class="mb-2 text-4xl font-bold text-gray-800">Our Properties</h1>
            <span class="text-muted text-lg">Check out some of our most popular properties</span>
        </div>

        <div class="w-full px-5 lg:mx-auto lg:max-w-7xl lg:px-8">
            <ul role="list" class="grid w-full grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6">
                @if ($properties)
                    @foreach ($properties as $property)
                        @if (isset($property->photos()->first()->path))
                            <a href="{{ route('frontend.property', ['property' => $property]) }}">
                                <li class="group relative cursor-pointer rounded-lg border border-gray-200 bg-gray-100 p-5 hover:scale-105">
                                    <div class="aspect-w-10 aspect-h-7 block w-full overflow-hidden rounded-lg bg-gray-100">
                                        <img src="/storage/{{ $property->photos()->first()->path }}" alt="" class="pointer-events-none object-cover group-hover:opacity-75">
                                        <button type="button" class="absolute inset-0 focus:outline-none">
                                            <span class="sr-only">View details for IMG_4985.HEIC</span>
                                        </button>
                                    </div>
                                    <p class="mt-2 block text-xl font-semibold">{{ $property->name }}</p>
                                    <p class="pointer-events-none block font-medium text-gray-500">$399 per night</p>
                                </li>
                            </a>
                        @endif
                    @endforeach

                    <li class="cursor-pointer rounded-lg border border-gray-200 bg-gray-100 p-5 hover:scale-105">
                        <div class="flex h-full flex-col items-center justify-center space-y-5">
                            <svg class="text-primary h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                            <h3 class="text-center text-xl font-medium">View all properties...</h3>
                        </div>

                    </li>
                @endif
            </ul>

        </div>
    </section>

    {{-- contact form --}}
    <section class="frontend-section">
        <div class="bg-white">
            <div class="relative sm:py-16">
                <div aria-hidden="true" class="hidden sm:block">
                    <div class="absolute inset-y-0 right-0 w-1/2 rounded-l-3xl bg-gray-200"></div>
                    <svg class="absolute top-8 right-1/2 -ml-3" width="404" height="392" fill="none" viewBox="0 0 404 392">
                        <defs>
                            <pattern id="8228f071-bcee-4ec8-905a-2a059a2cc4fb" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"></rect>
                            </pattern>
                        </defs>
                        <rect width="404" height="392" fill="url(#8228f071-bcee-4ec8-905a-2a059a2cc4fb)"></rect>
                    </svg>
                </div>
                <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8">
                    <div class="bg-primary relative overflow-hidden rounded-2xl px-6 py-10 shadow-xl sm:px-12 sm:py-20">
                        <div aria-hidden="true" class="absolute inset-0 -mt-72 sm:-mt-32 md:mt-0">
                            <svg class="absolute inset-0 h-full w-full" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 1463 360">
                                <path class="text-primary-dark text-opacity-40" fill="currentColor" d="M-82.673 72l1761.849 472.086-134.327 501.315-1761.85-472.086z"></path>
                                <path class="text-primary-dark text-opacity-40" fill="currentColor" d="M-217.088 544.086L1544.761 72l134.327 501.316-1761.849 472.086z"></path>
                            </svg>
                        </div>
                        <div class="relative">
                            <div class="sm:text-center">
                                <h2 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">Get in touch</h2>
                                <p class="mx-auto mt-6 max-w-2xl text-lg text-indigo-200">Have a question or concern before staying with us? Fill out the form below and we will reach out as soon as possible!</p>
                            </div>
                            <form action="#" class="mt-12 sm:mx-auto sm:flex sm:max-w-lg">
                                <div class="grid w-full grid-cols-2 gap-5">
                                    <div>
                                        <label for="" class="input-label text-blue-50">First Name</label>
                                        <input id="cta-email" type="text" class="focus:ring-offset-primary mt-2 block w-full rounded-md border border-transparent px-5 py-3 text-base text-gray-900 placeholder-gray-500 shadow-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2" placeholder="First name">
                                    </div>
                                    <div>
                                        <label for="" class="input-label text-blue-50">Last Name</label>
                                        <input id="cta-email" type="text" class="focus:ring-offset-primary mt-2 block w-full rounded-md border border-transparent px-5 py-3 text-base text-gray-900 placeholder-gray-500 shadow-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2" placeholder="Last name">
                                    </div>
                                    <div>
                                        <label for="" class="input-label text-blue-50">Email Address</label>
                                        <input id="cta-email" type="email" class="focus:ring-offset-primary mt-2 block w-full rounded-md border border-transparent px-5 py-3 text-base text-gray-900 placeholder-gray-500 shadow-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2" placeholder="Email address">
                                    </div>
                                    <div>
                                        <div class="flex items-end justify-between">
                                            <label for="" class="input-label text-blue-50">Phone Number</label>
                                            <span class="text-xs text-blue-200">Optional</span>
                                        </div>
                                        <input id="cta-email" type="tel" class="focus:ring-offset-primary mt-2 block w-full rounded-md border border-transparent px-5 py-3 text-base text-gray-900 placeholder-gray-500 shadow-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2" placeholder="Phone number">
                                    </div>
                                    <div class="col-span-full">
                                        <label for="" class="input-label text-blue-50">Subject</label>
                                        <input id="cta-email" type="text" class="focus:ring-offset-primary mt-2 block w-full rounded-md border border-transparent px-5 py-3 text-base text-gray-900 placeholder-gray-500 shadow-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2" placeholder="Subject">
                                    </div>
                                    <div class="col-span-full">
                                        <label for="" class="input-label text-blue-50">Message</label>
                                        <textarea id="cta-email" class="focus:ring-offset-primary mt-2 block w-full rounded-md border border-transparent px-5 py-3 text-base text-gray-900 placeholder-gray-500 shadow-sm focus:border-transparent focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2" placeholder="Enter your message here..."></textarea>
                                    </div>
                                    <div class="col-span-full">
                                        <button class="button bg-blue-800 px-5 py-3 text-base hover:bg-blue-500">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.frontend>
