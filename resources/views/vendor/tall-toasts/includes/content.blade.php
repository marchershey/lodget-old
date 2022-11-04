{{-- <div class="hidden">

    <div class="flex items-center bg-white border border-gray-300 shadow-2xl cursor-pointer tablet:rounded-lg h-[64px]" x-bind:class="{
        'bg-blue-50 text-blue-900': toast.type === 'info',
        'bg-green-50 text-green-800': toast.type === 'success',
        'bg-yellow-50 text-yellow-700': toast.type === 'warning',
        'bg-red-50 text-red-700': toast.type === 'danger'
        'bg-red-50 text-red-700': toast.type === 'confirm'
    }">
        <div class="flex items-center space-x-4">
            <div class="flex items-center">
                @include('tall-toasts::includes.icon')
            </div>
            <div class="w-full">
                <div class="text-sm font-semibold" x-html="toast.title" x-show="toast.title !== undefined"></div>
                <div class="text-xs !leading-tight sm:text-base" x-show="toast.message !== undefined" x-html="toast.message"></div>
            </div>
            <div class="flex items-center">
                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
    </div>
</div> --}}


<div class="bg-white border border-gray-300 shadow-lg laptop:rounded-lg laptop:m-5 laptop:shadow-2xl" x-bind:class="{
    'text-blue-600': toast.type === 'info',
    'text-green-600': toast.type === 'success',
    'text-yellow-600': toast.type === 'warning',
    'text-red-600': toast.type === 'danger'
}">
    <div class="container">
        <div class="flex items-center justify-between space-x-3 h-[64px] padding laptop:h-auto laptop:p-4 laptop:space-x-4">
            <div class="flex items-center">
                @include('tall-toasts::includes.icon')
            </div>
            <div class="w-full">
                <div class="text-sm font-semibold laptop:text-base" x-html="toast.title" x-show="toast.title !== undefined"></div>
                <div class="text-xs !leading-tight text-gray-600 laptop:text-sm" x-show="toast.message !== undefined" x-html="toast.message"></div>
            </div>
            <div class="flex items-center">
                <svg class="w-4 h-4 text-muted" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>
    </div>
</div>
