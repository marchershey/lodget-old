<x-layouts.host>

    <div class="flex flex-col items-center space-y-6">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 mx-auto text-gray-300" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M20.136 11.136l-8.136 -8.136l-9 9h2v7a2 2 0 0 0 2 2h7"></path>
                <path d="M9 21v-6a2 2 0 0 1 2 -2h2c.467 0 .896 .16 1.236 .428"></path>
                <path d="M19 22v.01"></path>
                <path d="M19 19a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483"></path>
            </svg>
        </div>
        <div class="text-center">
            <h3 class="mb-1 font-medium">You don't have any properties yet</h3>
            <p class="text-sm text-muted">Get started by adding your first rental.</p>
        </div>
        <div>
            <button x-data x-on:click="$dispatch('openRentalSlideover')" type="button" class="button button-primary">
                <svg class="-ml-1.5 mr-1.5 h-6 w-6" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
                Add Rental
            </button>
        </div>
    </div>

    <div class="inset-0 z-10 flex hidden overflow-hidden">
        {{-- Overlay --}}
        <div class="fixed inset-0 bg-gray-900 bg-opacity-60"></div>

        {{-- Panel --}}
        <div class="fixed inset-y-0 right-0 w-full max-w-lg">
            <div class="w-full h-full">
                <div class="flex flex-col justify-between h-full overflow-y-auto bg-white shadow-lg">

                </div>
            </div>
        </div>

    </div>

    <div x-data="{ open: true }" class="flex justify-center hidden">
        <!-- Trigger -->
        <span x-on:click="open = true">
            <button type="button" class="bg-white px-5 py-2.5 rounded-md shadow">
                Open slideover
            </button>
        </span>

        <!-- Slideover -->
        <div x-dialog x-model="open" style="display: none" class="fixed inset-0 z-10 overflow-hidden">
            <!-- Overlay -->
            <div x-dialog:overlay x-transition.opacity class="fixed inset-0 bg-black bg-opacity-60"></div>

            <!-- Panel -->
            <div class="fixed inset-y-0 right-0 w-full max-w-lg">
                <div x-dialog:panel x-transition:enter="transition ease-out duration-300" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="w-full h-full">
                    <div class="flex flex-col justify-between h-full overflow-y-auto bg-white shadow-lg">
                        <!-- Close Button -->
                        <div class="absolute top-0 right-0 pt-4 pr-4">
                            <button type="button" @click="$dialog.close()" class="p-2 text-gray-600 rounded-lg bg-gray-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2">
                                <span class="sr-only">Close slideover</span>

                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <!-- Body -->
                        <div class="p-8">
                            <!-- Title -->
                            <h2 x-dialog:title class="text-3xl font-bold">Slideover Title</h2>

                            <!-- Content -->
                            <p class="flex-1 mt-4 text-gray-600">Your slideout text and content goes here.</p>
                        </div>

                        <!-- Footer -->
                        <div class="flex justify-end p-4 space-x-2 bg-gray-50">
                            <button type="button" x-on:click="$dialog.close()" class="text-gray-600 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 rounded-lg px-5 py-2.5">
                                Close
                            </button>

                            <button type="button" x-on:click="$dialog.close()" class="bg-slate-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 focus-visible:ring-offset-2 px-5 py-2.5 rounded-lg text-white">
                                Take Action
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-layouts.host>
