@props(['xdata', 'title', 'desc'])
<div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" x-show="newPropertySlideover" x-cloak>
    <!-- Background backdrop, show/hide based on slide-over state. -->
    <div class="fixed inset-0 bg-black/75 overscroll-contain"></div>

    <div class="absolute inset-y-0 right-0 w-full h-full max-w-md">
        <div class="flex flex-col h-full bg-white">
            <div class="px-4 py-6 bg-primary-dark sm:px-6">
                <div class="flex justify-between">
                    <h2 class="text-lg font-medium text-white" id="slide-over-title">{{ $title }}</h2>
                    <button x-on:click="{{ $xdata }} = false">
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div>
                    <p class="mr-10 text-sm text-primary-muted">{{ $desc }}</p>
                </div>
            </div>
            <div class="h-full px-4 py-6 overflow-y-auto sm:px-6 overscroll-contain">
                {{ $slot }}
            </div>
            <div class="flex items-center justify-end px-4 py-6 bg-gray-100">
                <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2" x-on:click="{{ $xdata }} = false">Cancel</button>
                {{ $submit ?? '' }}
            </div>
        </div>
    </div>

    {{-- <div class="fixed inset-0 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="fixed inset-y-0 right-0 flex max-w-full pointer-events-none sm:pl-16">
                <div class="w-screen max-w-md pointer-events-auto">
                    <div class="flex flex-col h-full bg-white divide-y divide-gray-200 shadow-xl" x-on:click.away="{{ $xdata }} = false">
                        <div class="relative flex-1 h-0 overflow-y-auto">
                            <div class="sticky top-0 px-4 py-6 bg-primary-dark sm:px-6">
                                <div class="flex items-center justify-between">
                                    <h2 class="text-lg font-medium text-white" id="slide-over-title">{{ $title }}</h2>
                                    <div class="flex items-center ml-3 h-7">
                                        <button type="button" class="rounded-md text-primary-muted bg-primary-dark hover:text-white focus:outline-none focus:ring-2 focus:ring-white" x-on:click="{{ $xdata }} = false">
                                            <span class="sr-only">Close panel</span>
                                            <!-- Heroicon name: outline/x -->
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <p class="text-sm text-primary-muted">{{ $desc }}</p>
                                </div>
                            </div>
                            <div class="flex flex-col justify-between flex-1">
                                <div class="px-4 divide-y divide-gray-200 sm:px-6">
                                    <div class="pt-6 pb-5 space-y-6">
                                        {{ $slot }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end flex-shrink-0 px-4 py-4 bg-gray-50">
                            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2" x-on:click="{{ $xdata }} = false">Cancel</button>
                            {{ $submit ?? '' }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> --}}
</div>
