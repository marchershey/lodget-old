<div x-on:close-slideover="{{ $alpineId }} = false" x-cloak x-show="{{ $alpineId }}" class="relative z-20" aria-labelledby="slide-over-title" role="dialog" aria-modal="true" {{ $attributes }}>
    <!-- Background backdrop, show/hide based on slide-over state. -->
    <div wire:click="$emit('cancel')" class="fixed inset-0 backdrop-blur-md bg-black/50"></div>

    <div class="fixed overflow-hidden">
        <div class="absolute overflow-hidden">
            <div class="fixed inset-y-0 right-0 flex max-w-full pointer-events-none pt-14 laptop:pt-0">
                <div class="w-screen max-w-md pointer-events-auto">
                    <div class="flex flex-col h-full bg-gray-100 shadow-2xl">
                        <div class="flex flex-col flex-1 min-h-0 overflow-y-scroll overscroll-none">
                            {{-- Slideover Heading --}}
                            <div class="page-heading page-padding bg-primary">
                                {{-- Title / Close Button --}}
                                <div class="flex items-center justify-between">
                                    <h1 class="text-white page-title">
                                        {{ $title }}
                                    </h1>
                                    <button wire:click="$emit('cancel')" class="text-primary-lighter hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" width="40" height="40" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M18 6l-12 12"></path>
                                            <path d="M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                                {{-- Desc --}}
                                @if ($desc)
                                    <p class="text-sm text-primary-lighter">{{ $desc }}</p>
                                @endif
                            </div>

                            {{-- Content --}}
                            <div class="relative flex-1 pb-12 page-padding-x">
                                {{ $slot }}
                            </div>
                        </div>
                        <div class="flex justify-between flex-shrink-0 bg-white border-t page-padding-sm">
                            <button wire:click="$emit('cancel')" class="button-sm laptop:button button-muted" type="button">Cancel</button>
                            <button wire:click="$emit('{{ $action }}')" wire:loading.attr="disabled" wire:target="{{ $action }}" class="button-sm laptop:button button-primary" type="button">
                                <svg wire:loading wire:target="{{ $action }}" class="w-5 h-5 mr-3 -ml-1 text-white animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                {{ $actionText }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
