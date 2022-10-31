<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @toastScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles />
</head>

<body>
    @env('local')
    <div class="absolute bottom-0 z-50 w-full text-xs font-medium text-center">
        <span class="mobile">MOBILE</span>
        <span class="tablet">TABLET</span>
        <span class="laptop">LAPTOP</span>
        <span class="desktop">DESKTOP</span>
    </div>
    @endenv

    <livewire:toasts />
    {{ $slot }}
    <livewire:scripts />

    @stack('modals')
    @stack('slideovers')
    @stack('scripts')
</body>

</html>
