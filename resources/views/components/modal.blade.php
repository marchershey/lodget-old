{{-- <div x-on:keydown.escape.prevent.stop="{{ $alpineId }} = false" role="dialog" aria-modal="true" x-id="['modal-title']" :aria-labelledby="$id('modal-title')" class="fixed inset-0 z-10 overflow-y-auto">
    <!-- Overlay -->
    <div x-show="{{ $alpineId }}" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50"></div>

    <!-- Panel -->
    <div x-show="{{ $alpineId }}" x-transition x-on:click="{{ $alpineId }} = false" class="relative flex items-center justify-center min-h-screen p-4">
        <div x-on:click.stop x-trap.noscroll.inert="{{ $alpineId }}" class="relative w-full max-w-2xl p-12 overflow-y-auto bg-white shadow-lg rounded-xl">
            <!-- Title -->
            <h2 class="text-3xl font-bold" :id="$id('modal-title')">{{ $title }}</h2>

            <!-- Content -->
            <p class="mt-2 text-gray-600">Are you sure you want to learn how to create an awesome modal?</p>

            <!-- Buttons -->
            <div class="flex mt-8 space-x-2">
                <button type="button" x-on:click="{{ $alpineId }} = false" class="rounded-md border border-gray-200 bg-white px-5 py-2.5">
                    Confirm
                </button>

                <button type="button" x-on:click="{{ $alpineId }} = false" class="rounded-md border border-gray-200 bg-white px-5 py-2.5">
                    Cancel
                </button>
            </div>
        </div>
    </div>
</div> --}}


<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
            <div class="relative px-4 pt-5 pb-4 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
                <div>
                    <div class="flex items-center justify-center w-12 h-12 mx-auto bg-green-100 rounded-full">
                        <!-- Heroicon name: outline/check -->
                        <svg class="w-6 h-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Payment successful</h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur amet labore.</p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6">
                    <button type="button" class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm">Go back to dashboard</button>
                </div>
            </div>
        </div>
    </div>
</div>
