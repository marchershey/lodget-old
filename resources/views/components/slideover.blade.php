@props(['xdata', 'title', 'desc'])
<div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" x-show="newPropertySlideover" x-cloak>
    <!-- Background backdrop, show/hide based on slide-over state. -->
    <div class="fixed inset-0 overscroll-contain bg-black/75" x-on:click="{{ $xdata }} = false"></div>

    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full sm:pl-16">
        <div class="pointer-events-auto w-screen max-w-md">
            <div class="flex h-full flex-col divide-y divide-gray-200 bg-white shadow-xl">
                <div class="relative h-0 flex-1 overflow-y-auto">
                    <div class="bg-primary-dark sticky top-0 px-4 py-6 sm:px-6">
                        <div class="flex items-center justify-between">
                            <h2 class="text-lg font-medium text-white" id="slide-over-title">{{ $title }}</h2>
                            <div class="ml-3 flex h-7 items-center">
                                <button type="button" class="text-primary-muted bg-primary-dark rounded-md hover:text-white focus:outline-none focus:ring-2 focus:ring-white" x-on:click="{{ $xdata }} = false">
                                    <span class="sr-only">Close panel</span>
                                    <!-- Heroicon name: outline/x -->
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="mt-1">
                            <p class="text-primary-muted text-sm">{{ $desc }}</p>
                        </div>
                    </div>
                    <div class="flex flex-1 flex-col justify-between">
                        <div class="divide-y divide-gray-200 px-4 sm:px-6">
                            <div class="space-y-6 pt-6 pb-5">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-shrink-0 justify-end bg-gray-50 px-4 py-4">
                    <button type="button" class="focus:ring-primary rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2" x-on:click="{{ $xdata }} = false">Cancel</button>
                    {{ $submit ?? '' }}
                </div>
            </div>

        </div>
    </div>
</div>
