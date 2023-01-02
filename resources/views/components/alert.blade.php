@if ($type === 'success')
    <div class="rounded-md border border-green-400 bg-green-100 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <path d="M9 12l2 2l4 -4"></path>
                </svg>
            </div>
            <div class="my-1 ml-3 flex flex-col space-y-2 text-green-800">
                {{ $slot }}
            </div>
        </div>
    </div>
@elseif ($type === 'info')
    <div class="rounded-md bg-blue-50 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <!-- Heroicon name: mini/check-circle -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-400" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    <polyline points="11 12 12 12 12 16 13 16"></polyline>
                </svg>
            </div>
            <div class="my-1 ml-3 flex flex-col space-y-2 text-blue-800">
                {{ $slot }}
            </div>
        </div>
    </div>
@elseif ($type === 'warning')
    <div class="rounded-md bg-yellow-50 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-yellow-400" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
            </div>
            <div class="my-1 ml-3 flex flex-col space-y-2 text-yellow-800">
                {{ $slot }}
            </div>
        </div>
    </div>
@elseif($type === 'error')
    <div class="rounded-md bg-red-50 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-400" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <path d="M10 10l4 4m0 -4l-4 4"></path>
                </svg>
            </div>
            <div class="my-1 ml-3 flex flex-col space-y-2 text-red-800">
                {{ $slot }}
            </div>
        </div>
    </div>
@else
    <div class="rounded-md bg-gray-100 p-4">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
            </div>
            <div class="my-1 ml-3 flex flex-col space-y-2 text-gray-800">
                {{ $slot }}
            </div>
        </div>
    </div>
@endif
