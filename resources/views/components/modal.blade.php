<div x-show="{{ $show }}" x-cloak class="flex justify-center">

    <div role="dialog" aria-modal="true" class="fixed inset-0 z-10 overflow-y-auto">
        <div class="fixed inset-0 bg-black bg-opacity-50"></div>

        <div class="relative flex items-end justify-center min-h-screen sm:items-center">
            <div class="w-full max-w-lg m-0">
                <div x-on:click.away="{{ $close }}" class="panel">
                    @if ($title)
                        <h1 class="panel-heading">{{ $title }}</h1>
                    @endif

                    <div class="panel-body">
                        <div>
                            {{ $slot }}
                        </div>
                        <div class="flex gap-5">
                            @if (isset($buttons))
                                {{ $buttons }}
                            @else
                                <button x-on:click="{{ $close }}" class="button button-light">Close</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
