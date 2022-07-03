<x-layouts.host :asideTop="true">

    <div>
        <x-slot:aside>
            <div x-data="{ newPropertySlideover: false }">
                <button class="w-full button" x-on:click="newPropertySlideover = true">Add New Property</button>
                <button class="w-full mt-5 button" x-on:click="Toast.success('Next, click on the property to add more details, such as photos and aminities!', 'Ohana Burnside was successfully added!')">Test button</button>

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
                                            <td class="px-4 py-2 whitespace-nowrap">{{ $property->name }}</td>
                                            <td class="px-4 py-2 whitespace-nowrap">{{ $property->city }}, {{ $property->state }}</td>
                                            <td class="px-4 py-2 whitespace-nowrap">Visible</td>
                                            <td class="px-4 py-2 text-right whitespace-nowrap">
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
