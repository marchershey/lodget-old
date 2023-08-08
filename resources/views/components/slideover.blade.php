<div x-cloak x-show="{{ $alpineId }}" class="relative z-20" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
    <!-- Background backdrop, show/hide based on slide-over state. -->
    <div x-on:click="{{ $alpineId }} = false" class="fixed inset-0 backdrop-blur-md bg-black/50"></div>

    <div class="fixed overflow-hidden">
        <div class="absolute overflow-hidden">
            <div class="fixed inset-y-0 right-0 flex max-w-full pointer-events-none pt-14 laptop:pt-0">
                <div class="w-screen max-w-md pointer-events-auto">
                    <div class="flex flex-col h-full bg-gray-100 shadow-2xl">
                        <div class="flex flex-col flex-1 min-h-0 overflow-y-scroll overscroll-none">
                            {{-- Slideover Heading --}}
                            <div class="page-heading page-padding">
                                {{-- Title / Close Button --}}
                                <div class="flex items-center justify-between">
                                    <h1 class="page-title">
                                        {{ $title }}
                                    </h1>
                                    <button x-on:click="{{ $alpineId }} = false" class="text-muted hover:text-muted-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M18 6l-12 12"></path>
                                            <path d="M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                                {{-- Desc --}}
                                @if ($desc)
                                    <p class="text-sm text-muted">{{ $desc }}</p>
                                @endif
                            </div>

                            {{-- Content --}}
                            <div class="relative flex-1 pb-12 page-padding-x">
                                {{ $slot }}
                            </div>
                        </div>
                        <div class="flex justify-between flex-shrink-0 bg-white border-t page-padding-sm">
                            <button x-on:click="{{ $alpineId }} = false" class="button-sm laptop:button button-muted">Cancel</button>
                            <button class="button-sm laptop:button button-primary">Add Rental</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
