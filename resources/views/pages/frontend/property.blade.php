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
                    <section class="splide" aria-label="Splide/Alpine.js Carousel Example">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach ($property->photos as $photo)
                                    <li class="flex flex-col items-center justify-center pb-8 splide__slide">
                                        <img class="w-full rounded-xl" src="/storage/{{ $photo->path }}" alt="placeholder image">
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>

                </div>
                <div class="flex flex-col space-y-5 lg:col-span-5">
                    <div>
                        <span class="inline px-2 py-0.5 rounded-lg text-muted text-sm bg-gray-100">{{ $property->type }}</span>
                        <h1 class="text-3xl font-semibold">{{ $property->name }}</h1>
                        <h3 class="text-lg text-muted">{{ $property->headline }}</h3>
                    </div>

                    <div>
                        <button id="open-datepicker-button" class="button">Book Now</button>
                        <input type="text" id="hotel-datepicker" class="hidden">
                        <div id="test"></div>
                        <script>
                            window.addEventListener('load', function() {
                                var datepicker = new HotelDatepicker(document.getElementById('hotel-datepicker'), {
                                    selectForward: true,
                                    enableCheckout: true,
                                    disabledDates: [
                                        '2022-07-11 - 2022-07-13',
                                    ]
                                });
                                var open_datepicker_button = document.getElementById('open-datepicker-button');

                                open_datepicker_button.addEventListener('click', open_datepicker_function);

                                function open_datepicker_function() {
                                    console.log('Open!');
                                    datepicker.open();
                                }
                            })








                            // window.addEventListener('load', function() {
                            //     var hotelcal = new HotelDatepicker(
                            //         document.getElementById("hotel-datepicker"), {
                            //             'container': document.getElementById("test")
                            //         }
                            //     );
                            // })

                            // function open_datepicker() {
                            //     hotelcal.open()
                            // }
                        </script>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium">About this place</h3>
                        <div class="text-muted">
                            {{ $property->description }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.frontend>
