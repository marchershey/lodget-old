<div class="z-[99] fixed top-0 right-0 w-full max-w-md" x-data='ToastComponent($wire)' @mouseleave="scheduleRemovalWithOlder()">
    <template x-for="toast in toasts.filter((a)=>a)" :key="toast.index">
        <div @mouseenter="cancelRemovalWithNewer(toast.index)" @mouseleave="scheduleRemovalWithOlder(toast.index)" @click="remove(toast.index)" x-show="toast.show===1" x-transition:enter="transform ease-out duration-300 transition" x-transition:enter-start="-translate-y-10 opacity-0 sm:translate-y-0 sm:translate-x-10" x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-init="$nextTick(() => { toast.show = 1 })">
            @include('tall-toasts::includes.content')
        </div>
    </template>
</div>
