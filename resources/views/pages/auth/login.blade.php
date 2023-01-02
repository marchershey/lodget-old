<x-layouts.minimal>
    <div class="flex w-full max-w-md flex-col space-y-10 md:p-8">

        {{-- Logo --}}
        <div class="mt-10 flex justify-center">
            <a href="{{ route('frontend.index') }}">
                <x-logo />
            </a>
        </div>

        {{-- Title and description --}}
        <div class="text-center">
            <h1 class="text-2xl font-semibold">Sign into your account</h1>
        </div>

        {{-- Validation --}}
        @if ($errors->any())
            <div class="rounded-md bg-red-50 p-3">
                <h3 class="text-sm font-medium text-red-800">Error:</h3>
                <div class="mt-2 text-xs text-red-700">
                    <ul role="list" class="list-disc space-y-1 pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- form --}}
        <form method="POST" action="{{ route('auth.login.submit') }}">
            @csrf
            <div class="flex flex-col space-y-5 bg-white p-5">
                {{-- Email Address --}}
                <div>
                    <label for="email" class="input-label @error('email') input-label-error @enderror">Email Address</label>
                    <div class="mt-1">
                        <input type="email" name="email" id="email" class="input lowercase" value="{{ old('email') }}">
                    </div>
                </div>
                {{-- Password --}}
                <div>
                    <label for="password" class="input-label @error('password') input-label-error @enderror">Password</label>
                    <div class="mt-1">
                        <input type="password" name="password" id="password" class="input">
                    </div>
                </div>
                {{-- Remember me & password help --}}
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" class="checkbox" checked>
                        <label for="remember" class="input-label ml-2 font-normal"> Stay signed in </label>
                    </div>
                    <div>
                        <a href="#" class="link text-sm">Reset password</a>
                    </div>
                </div>
                {{-- Sumbit button --}}
                <div>
                    <button type="submit" class="button">Sign in</button>
                    <div class="mt-5 text-center">
                        <span class="text-muted block text-sm">Don't have an account yet? <a href="{{ route('auth.register') }}" class="link">Create one</a></span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layouts.minimal>
