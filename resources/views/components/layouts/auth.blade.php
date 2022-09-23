<div class="flex flex-col justify-between h-full">
    <div class="flex-none w-full max-w-md min-h-screen p-5 mx-auto">
        {{ $slot }}
    </div>

    <div class="flex flex-col items-center w-full p-3 text-sm tracking-wide bg-gray-100 text-muted">
        <span>{{ config('app.name') }}</span>
    </div>
</div>
