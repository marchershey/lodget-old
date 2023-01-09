<x-layouts.frontend>

    <div class="px-4 py-16 mx-auto sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
        <!-- Property -->
        <div class="lg:grid lg:grid-rows-1 lg:grid-cols-7 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">

            <!-- Property images -->
            <div class="flex flex-col space-y-10 lg:row-end-1 lg:col-span-4">
                <div class="splide" aria-label="Splide/Alpine.js Carousel Example">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach ($property->photos as $photo)
                                <li class="relative w-full splide__slide">
                                    <div class="block w-full overflow-hidden bg-gray-100 rounded-lg group aspect-w-10 aspect-h-7 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-primary">
                                        <img src="/storage/{{ $photo->path }}" alt="" class="object-cover pointer-events-none">
                                        <button type="button" class="absolute inset-0 focus:outline-none">
                                            <span class="sr-only">View details for IMG_4985.HEIC</span>
                                        </button>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="flex flex-wrap gap-3">
                    @foreach ($property->amenities as $amenity)
                        <span class="px-3 py-1 text-sm bg-gray-100 border rounded-lg">
                            {{ $amenity->text }}
                        </span>
                    @endforeach
                </div>
            </div>

            <!-- Property details -->
            <div class="max-w-2xl mx-auto mt-14 sm:mt-16 lg:max-w-none lg:mt-0 lg:row-end-2 lg:row-span-2 lg:col-span-3">
                <div class="flex flex-col-reverse">
                    <div class="mt-4">
                        <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">{{ $property->name }}</h1>
                        <h2 id="information-heading" class="sr-only">Property information</h2>
                        <p class="mt-2 text-sm text-gray-500">{{ $property->headline }}</p>
                    </div>

                    <div>
                        <h3 class="sr-only">Reviews</h3>
                        <div class="flex items-center space-x-2">
                            <svg class="flex-shrink-0 w-6 h-6 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
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
                    <p class="mt-6 text-gray-500 line-clamp-6" x-on:click="open = !open" :class="open ? 'line-clamp-none' : 'line-clamp-6'">{{ $property->description }}</p>
                </div>

                {{-- Reservation Component --}}
                <livewire:frontend.property.reservation-component :property="$property" />

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            window.addEventListener('load', function() {
                new Splide('.splide', {
                    perPage: 1,
                    gap: '0.5rem',
                }).mount()
            });
        </script>
    @endpush
</x-layouts.frontend>
