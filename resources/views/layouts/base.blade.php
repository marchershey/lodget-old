<!DOCTYPE html>
<html lang="en" class="bg-whtie">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>{{ config('app.name') }}</title>
    @toastScripts
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles />
</head>

<body class="font-inter">
    <livewire:toasts />

    {{ $slot }}

    <div class="fixed bottom-0 left-0 z-50 flex px-2 text-xs bg-gray-200">
        <span class="block tablet:hidden">mobile</span>
        <span class="hidden tablet:block laptop:hidden">tablet</span>
        <span class="hidden laptop:block desktop:hidden">laptop</span>
        <span class="hidden desktop:block">desktop</span>
        <span class="block sm:hidden">(xs)</span>
        <span class="hidden sm:block md:hidden">(sm)</span>
        <span class="hidden md:block lg:hidden">(md)</span>
        <span class="hidden lg:block xl:hidden">(lg)</span>
        <span class="hidden xl:block 2xl:hidden">(xl)</span>
        <span class="hidden 2xl:block">(2xl)</span>
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
