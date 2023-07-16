<x-layouts.minimal>
    {{-- header / logo --}}
    <div class="flex flex-col items-center space-y-3">
        <div>
            <span class="font-bold tracking-widest uppercase text-primary">{{ config('app.name') }}</span>
        </div>

        <div>
            <h1 class="text-2xl font-semibold">Sign into your account</h1>
        </div>
    </div>

    {{-- form --}}
    <form class="space-y-6" wire:submit.prevent="submitAuthentication">
        <div>
            <label for="email" class="input-label">Email address</label>
            <div class="mt-2">
                <input wire:model="email" id="email" name="email" type="email" autocomplete="email" required class="input-text">
            </div>
        </div>

        <div>
            <label for="password" class="input-label">Password</label>
            <div class="mt-2">
                <input wire:model='password' id="password" name="password" type="password" autocomplete="current-password" required class="input-text">
            </div>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input wire:model='remember' id="remember-me" name="remember-me" type="checkbox" class="input-checkbox">
                <label for="remember-me" class="input-checkbox-label">Stay signed in</label>
            </div>

            <div class="leading-6">
                <a href="#" class="text-sm link">Reset password</a>
            </div>
        </div>

        <div>
            {{-- <button type="submit" class="flex justify-center w-full px-3 py-3 text-sm font-medium leading-6 text-white rounded-md shadow-sm bg-primary hover:bg-primary-dark focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button> --}}
            <button type="submit" class="button button-primary">Sign in</button>
        </div>

        <div>
            <a class="button button-link" href="{{ route('auth.register') }}">I don't have an account</a>
        </div>
    </form>
</x-layouts.minimal>
