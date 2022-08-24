<div class="flex justify-center">

    <div role="dialog" aria-modal="true" class="fixed inset-0 z-10 overflow-y-auto">
        <div class="fixed inset-0 bg-black bg-opacity-50"></div>

        <div class="relative flex items-end justify-center min-h-screen sm:items-center">
            <div class="w-full max-w-lg m-0">
                <div class="panel">
                    <h1 class="panel-heading">hello</h1>

                    <div class="panel-body">
                        <div>
                            hello
                        </div>
                        <div>
                            @if (isset($buttons))
                                {{ $buttons }}
                            @else
                                <button class="button button-light">Close</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
