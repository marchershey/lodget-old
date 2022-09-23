<div class="z-[99] fixed top-0 right-0 max-w-md w-full sm:w-auto" x-data='ToastComponent($wire)' @mouseleave="scheduleRemovalWithOlder()">
    <template x-for="toast in toasts.filter((a)=>a)" :key="toast.index">
        <div @mouseenter="cancelRemovalWithNewer(toast.index)" @mouseleave="scheduleRemovalWithOlder(toast.index)" @click="remove(toast.index)" x-show="toast.show===1" x-transition:enter="ease-out duration-200 transition" x-transition:enter-start="-translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-init="$nextTick(() => { toast.show = 1 })">
            @include('tall-toasts::includes.content')
        </div>
    </template>
</div>
