<x-layouts.frontend>
    <div class="bg-white">
        <div class="mx-auto px-4 py-16 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <!-- Property -->
            <div class="lg:grid lg:grid-cols-7 lg:grid-rows-1 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">

                <!-- Property images -->
                <div class="lg:col-span-4 lg:row-end-1">
                    <div class="splide" aria-label="Splide/Alpine.js Carousel Example">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($property->photos as $photo)
                                    <li class="splide__slide relative w-full">
                                        <div class="aspect-w-10 aspect-h-7 focus-within:ring-primary group block w-full overflow-hidden rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                                            <img src="/storage/{{ $photo->path }}" alt="" class="pointer-events-none object-cover">
                                            <button type="button" class="absolute inset-0 focus:outline-none">
                                                <span class="sr-only">View details for IMG_4985.HEIC</span>
                                            </button>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Property details -->
                <div class="mx-auto mt-14 max-w-2xl sm:mt-16 lg:col-span-3 lg:row-span-2 lg:row-end-2 lg:mt-0 lg:max-w-none">
                    <div class="flex flex-col-reverse">
                        <div class="mt-4">
                            <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">{{ $property->name }}</h1>
                            <h2 id="information-heading" class="sr-only">Property information</h2>
                            <p class="mt-2 text-sm text-gray-500">{{ $property->headline }}</p>
                        </div>

                        <div>
                            <h3 class="sr-only">Reviews</h3>
                            <div class="flex items-center space-x-2">
                                <svg class="h-6 w-6 flex-shrink-0 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>

                                <span class="font-medium">5.0</span>
                                <span class="text-sm">(2 reviews)</span>
                            </div>
                            <p class="sr-only">5 out of 5 stars</p>
                        </div>
                    </div>

                    {{-- Description --}}
                    <div x-data="{ open: false }">
                        <p class="line-clamp-6 mt-6 text-gray-500" x-on:click="open = !open" :class="open ? 'line-clamp-none' : 'line-clamp-6'">{{ $property->description }}</p>
                    </div>

                    {{-- Reservation Component --}}
                    <livewire:frontend.property.reservation-component :property="$property" />

                    {{-- Amenities --}}
                    <div class="mt-10 border-t border-gray-200 pt-10">
                        <h3 class="text-sm font-medium text-gray-900">Amenities</h3>
                        <div class="prose-sm prose mt-4 text-gray-500">
                            <ul role="list" class="grid grid-cols-2">
                                @foreach ($property->amenities->take(10) as $amenity)
                                    <li>{{ $amenity->text }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- Social icons --}}
                    <div class="mt-10 border-t border-gray-200 pt-10">
                        <h3 class="text-sm font-medium text-gray-900">Share</h3>
                        <ul role="list" class="mt-4 flex items-center space-x-6">
                            <li>
                                <a href="#" class="flex h-6 w-6 items-center justify-center text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Share on Facebook</span>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M20 10c0-5.523-4.477-10-10-10S0 4.477 0 10c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V10h2.54V7.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V10h2.773l-.443 2.89h-2.33v6.988C16.343 19.128 20 14.991 20 10z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex h-6 w-6 items-center justify-center text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Share on Instagram</span>
                                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex h-6 w-6 items-center justify-center text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Share on Twitter</span>
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path d="M6.29 18.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0020 3.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.073 4.073 0 01.8 7.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 010 16.407a11.616 11.616 0 006.29 1.84" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mx-auto mt-16 w-full max-w-2xl lg:col-span-4 lg:mt-0 lg:max-w-none">
                    <div>
                        <div class="border-b border-gray-200">
                            <div class="-mb-px flex space-x-8" aria-orientation="horizontal" role="tablist">
                                <!-- Selected: "border-indigo-600 text-indigo-600", Not Selected: "border-transparent text-gray-700 hover:text-gray-800 hover:border-gray-300" -->
                                <button id="tab-reviews" class="whitespace-nowrap border-b-2 border-transparent py-6 text-sm font-medium text-gray-700 hover:border-gray-300 hover:text-gray-800" aria-controls="tab-panel-reviews" role="tab" type="button">Customer Reviews</button>
                                <button id="tab-faq" class="whitespace-nowrap border-b-2 border-transparent py-6 text-sm font-medium text-gray-700 hover:border-gray-300 hover:text-gray-800" aria-controls="tab-panel-faq" role="tab" type="button">FAQ</button>
                                <button id="tab-license" class="whitespace-nowrap border-b-2 border-transparent py-6 text-sm font-medium text-gray-700 hover:border-gray-300 hover:text-gray-800" aria-controls="tab-panel-license" role="tab" type="button">License</button>
                            </div>
                        </div>

                        <!-- 'Customer Reviews' panel, show/hide based on tab state -->
                        <div id="tab-panel-reviews" class="-mb-10" aria-labelledby="tab-reviews" role="tabpanel" tabindex="0">
                            <h3 class="sr-only">Customer Reviews</h3>

                            <div class="flex space-x-4 text-sm text-gray-500">
                                <div class="flex-none py-10">
                                    <img src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-100">
                                </div>
                                <div class="py-10">
                                    <h3 class="font-medium text-gray-900">Emily Selman</h3>
                                    <p><time datetime="2021-07-16">July 16, 2021</time></p>

                                    <div class="mt-4 flex items-center">
                                        <!--
                      Heroicon name: solid/star
  
                      Active: "text-yellow-400", Default: "text-gray-300"
                    -->
                                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>

                                        <!-- Heroicon name: solid/star -->
                                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>

                                        <!-- Heroicon name: solid/star -->
                                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>

                                        <!-- Heroicon name: solid/star -->
                                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>

                                        <!-- Heroicon name: solid/star -->
                                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                    <p class="sr-only">5 out of 5 stars</p>

                                    <div class="prose-sm prose mt-4 max-w-none text-gray-500">
                                        <p>This icon pack is just what I need for my latest project. There's an icon for just about anything I could ever need. Love the playful look!</p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex space-x-4 text-sm text-gray-500">
                                <div class="flex-none py-10">
                                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=256&h=256&q=80" alt="" class="h-10 w-10 rounded-full bg-gray-100">
                                </div>
                                <div class="border-t border-gray-200 py-10">
                                    <h3 class="font-medium text-gray-900">Hector Gibbons</h3>
                                    <p><time datetime="2021-07-12">July 12, 2021</time></p>

                                    <div class="mt-4 flex items-center">
                                        <!--
                      Heroicon name: solid/star
  
                      Active: "text-yellow-400", Default: "text-gray-300"
                    -->
                                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>

                                        <!-- Heroicon name: solid/star -->
                                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>

                                        <!-- Heroicon name: solid/star -->
                                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>

                                        <!-- Heroicon name: solid/star -->
                                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>

                                        <!-- Heroicon name: solid/star -->
                                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                    <p class="sr-only">5 out of 5 stars</p>

                                    <div class="prose-sm prose mt-4 max-w-none text-gray-500">
                                        <p>Blown away by how polished this icon pack is. Everything looks so consistent and each SVG is optimized out of the box so I can use it directly with confidence. It would take me several hours to create a single icon this good, so it's a steal at this price.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- More reviews... -->
                        </div>

                        <!-- 'FAQ' panel, show/hide based on tab state -->
                        <div id="tab-panel-faq" class="text-sm text-gray-500" aria-labelledby="tab-faq" role="tabpanel" tabindex="0">
                            <h3 class="sr-only">Frequently Asked Questions</h3>

                            <dl>
                                <dt class="mt-10 font-medium text-gray-900">What format are these icons?</dt>
                                <dd class="prose-sm prose mt-2 max-w-none text-gray-500">
                                    <p>The icons are in SVG (Scalable Vector Graphic) format. They can be imported into your design tool of choice and used directly in code.</p>
                                </dd>

                                <dt class="mt-10 font-medium text-gray-900">Can I use the icons at different sizes?</dt>
                                <dd class="prose-sm prose mt-2 max-w-none text-gray-500">
                                    <p>Yes. The icons are drawn on a 24 x 24 pixel grid, but the icons can be scaled to different sizes as needed. We don&#039;t recommend going smaller than 20 x 20 or larger than 64 x 64 to retain legibility and visual balance.</p>
                                </dd>

                                <!-- More FAQs... -->
                            </dl>
                        </div>

                        <!-- 'License' panel, show/hide based on tab state -->
                        <div id="tab-panel-license" class="pt-10" aria-labelledby="tab-license" role="tabpanel" tabindex="0">
                            <h3 class="sr-only">License</h3>

                            <div class="prose-sm prose max-w-none text-gray-500">
                                <h4>Overview</h4>

                                <p>For personal and professional use. You cannot resell or redistribute these icons in their original or modified state.</p>

                                <ul role="list">
                                    <li>You're allowed to use the icons in unlimited projects.</li>
                                    <li>Attribution is not required to use the icons.</li>
                                </ul>

                                <h4>What you can do with it</h4>

                                <ul role="list">
                                    <li>Use them freely in your personal and professional work.</li>
                                    <li>Make them your own. Change the colors to suit your project or brand.</li>
                                </ul>

                                <h4>What you can't do with it</h4>

                                <ul role="list">
                                    <li>Don't be greedy. Selling or distributing these icons in their original or modified state is prohibited.</li>
                                    <li>Don't be evil. These icons cannot be used on websites or applications that promote illegal or immoral beliefs or activities.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            window.addEventListener('load', function() {
                new Splide('.splide', {
                    perPage: 1,
                    gap: '0.5rem',
                    // breakpoints: {
                    //     640: {
                    //         perPage: 1,
                    //     },
                    // },
                }).mount()
            });
        </script>
    @endpush
</x-layouts.frontend>
