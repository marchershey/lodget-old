<div class="flex justify-center">

    <div role="dialog" aria-modal="true" class="fixed inset-0 z-10 overflow-y-auto">
        <div class="fixed inset-0 bg-black bg-opacity-50"></div>

        <div class="relative flex min-h-screen items-end justify-center sm:items-center">
            <div class="m-0 w-full max-w-lg">
                <div class="panel">
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
                                <button x-on:click="{{ $closeFunction }}" class="button button-light">Close</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
