<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>{{ config('app.name') }}</title>
    @toastScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles />
</head>

<body class="relative h-full bg-gray-50">
    <livewire:toasts />
    <div class="h-full">
        {{ $slot }}
    </div>


    @stack('modals')
    @stack('scripts')

    <script>
        window.addEventListener('log', event => {
            console.log(event.detail.message);
        })
    </script>
    @livewireScripts
</body>

</html>
