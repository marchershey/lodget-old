<x-layouts.host>
    <x-slot:aside>
        <div class="p-0 panel panel-body">
            <table>
                <tbody class="text-xs divide-y divide-gray-200">
                    <tr>
                        <td class="p-2"><span class="px-2 py-1 text-xs font-medium text-yellow-900 bg-yellow-100 rounded-full">Pending</span></td>
                        <td class="p-2">Awaiting approval from the host</td>
                    </tr>
                    <tr>
                        <td class="p-2"><span class="px-2 py-1 text-xs font-medium text-gray-900 bg-gray-200 rounded-full">Cancelled</span></td>
                        <td class="p-2">The guest cancelled the reservation</td>
                    </tr>
                    <tr>
                        <td class="p-2"><span class="px-2 py-1 text-xs font-medium text-red-900 bg-red-100 rounded-full">Rejected</span></td>
                        <td class="p-2">The host rejected the reservation</td>
                    </tr>
                    <tr>
                        <td class="p-2"><span class="px-2 py-1 text-xs font-medium text-purple-900 bg-purple-100 rounded-full">Approved</span></td>
                        <td class="p-2">Host approved reservation, awaiting guest to arrive</td>
                    </tr>
                    <tr>
                        <td class="p-2"><span class="px-2 py-1 text-xs font-medium text-blue-900 bg-blue-100 rounded-full">Active</span></td>
                        <td class="p-2">The guest is currently staying at the property</td>
                    </tr>
                    <tr>
                        <td class="p-2"><span class="px-2 py-1 text-xs font-medium text-green-900 bg-green-100 rounded-full">Completed</span></td>
                        <td class="p-2">The guest has completed their stay</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </x-slot:aside>

    <div>
        <livewire:host.reservations.reservations-list />
    </div>


</x-layouts.host>
