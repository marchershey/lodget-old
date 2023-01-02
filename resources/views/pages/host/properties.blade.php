<x-layouts.host>

    @if (count($properties) == 0)
        <div class="panel panel-body">
            <div class="text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-300" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M21 12l-9 -9l-9 9h2v7a2 2 0 0 0 2 2h4.7"></path>
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2"></path>
                    <circle cx="18" cy="18" r="3"></circle>
                    <path d="M20.2 20.2l1.8 1.8"></path>
                </svg>
                <h3 class="mt-2 text-lg font-medium">No Properties found</h3>
                <p class="text-muted mt-1">Get started by adding your first property.</p>
                <div class="mt-6">
                    <button type="button" class="bg-primary hover:bg-primary-dark inline-flex items-center rounded-md border border-transparent px-4 py-2 text-sm font-medium text-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <!-- Heroicon name: mini/plus -->
                        <svg class="mr-2 -ml-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                        </svg>
                        Add Property
                    </button>
                </div>
            </div>
        </div>
    @else
        <div class="grid grid-cols-3 gap-5">
            @foreach ($properties as $property)
                <a href="{{ route('host.properties.edit', ['property' => $property->slug]) }}" class="block overflow-hidden rounded-lg border bg-white">
                    <div class="aspect-w-10 aspect-h-6">
                        @if ($property->photos->first())
                            <img class="object-cover" src="/storage/{{ $property->photos->first()->path ?? '' }}" alt="">
                        @else
                            <div class="flex h-full w-full items-center justify-center bg-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-200" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <line x1="3" y1="3" x2="21" y2="21"></line>
                                    <line x1="15" y1="8" x2="15.01" y2="8"></line>
                                    <path d="M19.121 19.122a3 3 0 0 1 -2.121 .878h-10a3 3 0 0 1 -3 -3v-10c0 -.833 .34 -1.587 .888 -2.131m3.112 -.869h9a3 3 0 0 1 3 3v9"></path>
                                    <path d="M4 15l4 -4c.928 -.893 2.072 -.893 3 0l5 5"></path>
                                    <path d="M16.32 12.34c.577 -.059 1.162 .162 1.68 .66l2 2"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex items-center justify-between p-2">
                        <div>
                            <h3 class="truncate text-sm font-medium">{{ $property->name }}</h3>
                            <span>{{ $property->base_rate }}</span>
                        </div>
                        <div class="text-xs">{!! $property->isVisible() ? '<span class="rounded bg-green-100 px-1 py-0.5 text-green-800">Visible</span>' : '<span class="rounded bg-red-100 px-1 py-0.5 text-red-800">Hidden</span>' !!}</div>
                    </div>
                </a>
            @endforeach

            <div x-data x-on:click="$dispatch('opennewpropertyslideover')" class="group flex h-full w-full cursor-pointer flex-col items-center justify-center space-y-3 rounded-lg border-[3px] border-dashed border-gray-200 hover:border-gray-300 hover:bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-primary mx-auto h-12 w-12 text-gray-300" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M21 12l-9 -9l-9 9h2v7a2 2 0 0 0 2 2h4.7"></path>
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2"></path>
                    <circle cx="18" cy="18" r="3"></circle>
                    <path d="M20.2 20.2l1.8 1.8"></path>
                </svg>
                <h3 class="group-hover:text-muted mt-2 font-medium text-gray-400">Add Property</h3>
            </div>
        </div>
    @endif

    <x-slot:aside>
        <div class="px-5 sm:px-0" x-data="{ newPropertySlideover: false }" @opennewpropertyslideover.window="newPropertySlideover = true">
            <button class="button" x-on:click="newPropertySlideover = true">Add New Property</button>

            @livewire('host.properties.new-property-form')
        </div>
    </x-slot:aside>
</x-layouts.host>
