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


<div x-on:keydown.escape.prevent.stop="{{ $closeFunction }}" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div x-show="{{ $showFunction }}" x-transition.opacity class="fixed inset-0 transition-opacity bg-gray-800 bg-opacity-75"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
            <div x-show="{{ $showFunction }}" x-transition x-on:click.away="{{ $closeFunction }}" class="relative w-full overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:max-w-sm padding laptop:p-6">
                <button x-on:click="{{ $closeFunction }}" class="absolute top-0 right-0 z-30 p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-muted" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
                <div>
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</div>
