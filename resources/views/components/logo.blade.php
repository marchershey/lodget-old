@if ($theme == 'light')
    <div class="flex items-center space-x-3">
        <div class="inline-block p-2 text-{{ $iconTextColor }} rounded-full bg-{{ $iconBgColor }}">
            <svg class="{{ $iconSize }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd"></path>
            </svg>
        </div>
        @if ($showText)
            <div class="flex text-{{ $textSize }} font-semibold tracking-tight">
                <span class="text-primary">Serrate</span>
                <span>Rentals</span>
            </div>
        @endif
    </div>
@else
    <div class="flex items-center space-x-3">
        <div class="inline-block p-2 text-{{ $iconTextColor }} rounded-full bg-{{ $iconBgColor }}">
            <svg class="{{ $iconSize }}" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd"></path>
            </svg>
        </div>
        @if ($showText)
            <div class="flex text-{{ $textSize }} font-semibold tracking-tight">
                <span class="text-primary">Serrate</span>
                <span class="text-white">Rentals</span>
            </div>
        @endif
    </div>
@endif
