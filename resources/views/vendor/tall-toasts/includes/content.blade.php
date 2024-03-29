<div class="p-3 mx-4 my-4 mb-5 text-gray-800 bg-white border border-gray-300 rounded-lg shadow-2xl sm:mx-6" x-bind:class="{
    'bg-blue-50': toast.type === 'info',
    'bg-green-50': toast.type === 'success',
    'bg-yellow-50': toast.type === 'warning',
    'bg-red-50': toast.type === 'danger'
}">
    <div class="flex items-center space-x-3">
        <div>
            @include('tall-toasts::includes.icon')
        </div>
        <div class="w-full">
            <div class="text-lg font-medium leading-5" x-html="toast.title" x-show="toast.title !== undefined" :class="{ 'mb-3': toast.title }"></div>
            <div class="leading-5" x-show="toast.message !== undefined" x-html="toast.message"></div>
        </div>
        <div>
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </div>
    </div>
    {{-- content --}}
    {{-- close --}}
</div>
