<x-layouts.minimal>
    <div class="flex flex-col w-full max-w-md space-y-10 md:p-8">

        {{-- Logo --}}
        <div class="flex justify-center mt-10">
            <a href="{{ route('frontend.index') }}">
                <x-logo />
            </a>
        </div>

        {{-- Title and description --}}
        <div class="text-center">
            <h1 class="text-2xl font-semibold">Sign into your account</h1>
        </div>

    </div>
</x-layouts.minimal>
