<x-layouts.host :asideTop="true">

    <div>
        <x-slot:aside>
            <div class="px-5 sm:px-0" x-data="{ newPropertySlideover: false }">
                <button class="button" x-on:click="newPropertySlideover = true">Add New Property</button>

                @livewire('host.properties.new-property-form')
            </div>
        </x-slot:aside>

        <div class="panel">

            <!-- This example requires Tailwind CSS v2.0+ -->
            @if (count($properties) == 0)
                <div class="text-center">
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No Properties</h3>
                    <p class="mt-1 text-sm text-gray-500">Get started by adding your first property.</p>
                </div>
            @else
                <div class="flex flex-col">
                    <div class="-mx-4 -my-4 overflow-x-auto">
                        <div class="inline-block min-w-full align-middle">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr class="text-left">
                                        <th scope="col" class="px-4 py-2 font-medium">Property</th>
                                        <th scope="col" class="px-4 py-2 font-medium">Location</th>
                                        <th scope="col" class="px-4 py-2 font-medium">Status</th>
                                        <th scope="col" class="px-4 py-2 font-medium"></th>
                                    </tr>
                                </thead>
                                <tbody class="overflow-x-auto divide-y divide-gray-200">
                                    @foreach ($properties as $property)
                                        <tr class="cursor-pointer hover:bg-gray-50 group" onclick="window.location='{{ route('host.properties.edit', ['id' => $property->id]) }}';">
                                            <td class="px-4 py-4 whitespace-nowrap">{{ $property->name }}</td>
                                            <td class="px-4 py-4 whitespace-nowrap">{{ $property->city }}, {{ $property->state }}</td>
                                            <td class="px-4 py-4 font-semibold whitespace-nowrap">{!! $property->visible ? '<span class="text-green-600">Visible</span>' : '<span class="text-red-600">Hidden</span>' !!}</td>
                                            <td class="px-4 py-4 text-right whitespace-nowrap">
                                                <a href="#" class="link">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <!-- More people... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif


        </div>
    </div>
</x-layouts.host>
