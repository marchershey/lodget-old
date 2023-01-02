<x-layouts.host>
    <x-slot:aside>
        <div class="panel panel-body p-0">
            <table>
                <tbody class="divide-y divide-gray-200 text-xs">
                    <tr>
                        <td class="p-2"><span class="whitespace-nowrap rounded-full bg-gray-100 px-2 py-1 text-xs font-medium text-gray-900">No Payment</span></td>
                        <td class="p-2">Awaiting payment from guest</td>
                    </tr>
                    <tr>
                        <td class="p-2"><span class="rounded-full bg-yellow-100 px-2 py-1 text-xs font-medium text-yellow-900">Pending</span></td>
                        <td class="p-2">Awaiting approval from the host</td>
                    </tr>
                    <tr>
                        <td class="p-2"><span class="rounded-full bg-gray-200 px-2 py-1 text-xs font-medium text-gray-900">Canceled</span></td>
                        <td class="p-2">The guest canceled the reservation</td>
                    </tr>
                    <tr>
                        <td class="p-2"><span class="rounded-full bg-red-100 px-2 py-1 text-xs font-medium text-red-900">Rejected</span></td>
                        <td class="p-2">The host rejected the reservation</td>
                    </tr>
                    <tr>
                        <td class="p-2"><span class="rounded-full bg-purple-100 px-2 py-1 text-xs font-medium text-purple-900">Approved</span></td>
                        <td class="p-2">Host approved reservation, awaiting guest to arrive</td>
                    </tr>
                    <tr>
                        <td class="p-2"><span class="rounded-full bg-blue-100 px-2 py-1 text-xs font-medium text-blue-900">Active</span></td>
                        <td class="p-2">The guest is currently staying at the property</td>
                    </tr>
                    <tr>
                        <td class="p-2"><span class="rounded-full bg-green-100 px-2 py-1 text-xs font-medium text-green-900">Completed</span></td>
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
