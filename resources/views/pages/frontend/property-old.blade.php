<x-layouts.frontend>

    <section class="frontend-section">
        <div class="frontend-spacing">
            <div class="grid grid-cols-1 gap-10 lg:grid-cols-12">

                <div class="md:col-span-7">
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
                    <section class="flex flex-col space-y-10">
                        {{-- Slider --}}
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
                        <div>
                            <h3 class="text-lg font-medium">About this place</h3>
                            <div class="text-muted">
                                {{ $property->description }}
                            </div>
                        </div>
                    </section>


                </div>

                <div class="flex flex-col space-y-5 lg:col-span-5">
                    <div>
                        <span class="inline px-2 py-0.5 rounded-lg text-muted text-sm bg-gray-100">{{ $property->type }}</span>
                        <h1 class="text-3xl font-semibold">{{ $property->name }}</h1>
                        <h3 class="text-lg text-muted">{{ $property->headline }}</h3>
                    </div>
                    <livewire:frontend.property.reservation-component :property="$property" />
                </div>
            </div>
        </div>
    </section>
</x-layouts.frontend>

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
