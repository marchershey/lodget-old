<div class="flex flex-col justify-between h-full overflow-y-auto bg-white">
    <div class="flex-none w-full max-w-md p-5 mx-auto">
        {{ $slot }}
    </div>

    <div class="flex justify-center p-2 text-xs text-muted">
        <x-layouts.footer />
    </div>
</div>
