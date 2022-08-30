@if ($type === 'info')
    <div class="p-4 rounded-md bg-blue-50">
        <div class="flex">
            <div class="flex-shrink-0">
                <!-- Heroicon name: mini/check-circle -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-blue-400" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                    <polyline points="11 12 12 12 12 16 13 16"></polyline>
                </svg>
            </div>
            <div class="flex flex-col my-1 ml-3 space-y-2 text-blue-800">
                {{ $slot }}
            </div>
        </div>
    </div>
@elseif ($type === 'warning')
    <div class="p-4 rounded-md bg-yellow-50">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-yellow-400" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
            </div>
            <div class="flex flex-col my-1 ml-3 space-y-2 text-yellow-800">
                {{ $slot }}
            </div>
        </div>
    </div>
@elseif($type === 'error')
    <div class="p-4 rounded-md bg-red-50">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-red-400" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <path d="M10 10l4 4m0 -4l-4 4"></path>
                </svg>
            </div>
            <div class="flex flex-col my-1 ml-3 space-y-2 text-red-800">
                {{ $slot }}
            </div>
        </div>
    </div>
@endif
