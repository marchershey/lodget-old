<x-layouts.minimal>
    <div class="flex flex-col max-w-lg p-8 space-y-10">

        {{-- Logo --}}
        <div class="flex justify-center mt-10">
            <a href="{{ route('frontend.index') }}">
                <x-logo />
            </a>
        </div>

        {{-- Title and description --}}
        <div class="text-center">
            <h1 class="text-2xl font-semibold">Create an account</h1>
            <span class="block mt-2 text-sm text-muted">Fill out the form below to create your account.</span>
        </div>

        {{-- Validation --}}
        @if ($errors->any())
            <div class="p-3 rounded-md bg-red-50">
                <h3 class="text-sm font-medium text-red-800">Please correct the following issue(s):</h3>
                <div class="mt-2 text-xs text-red-700">
                    <ul role="list" class="pl-5 space-y-1 list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- form --}}
        <form method="POST" action="{{ route('auth.register.submit') }}">
            @csrf
            <div class="flex flex-col space-y-5">
                {{-- Name --}}
                <div class="flex space-x-5">
                    <div>
                        <label for="first_name" class="input-label @error('first_name') input-label-error @enderror">First Name</label>
                        <div class="mt-1">
                            <input type="text" name="first_name" id="first_name" class="capitalize input" value="{{ old('first_name') }}">
                        </div>
                    </div>
                    <div>
                        <label for="last_name" class="input-label @error('last_name') input-label-error @enderror">Last Name</label>
                        <div class="mt-1">
                            <input type="text" name="last_name" id="last_name" class="capitalize input" value="{{ old('last_name') }}">
                        </div>
                    </div>
                </div>
                {{-- Email Address --}}
                <div>
                    <label for="email" class="input-label @error('email') input-label-error @enderror">Email Address</label>
                    <div class="mt-1">
                        <input type="email" name="email" id="email" class="lowercase input" value="{{ old('email') }}">
                    </div>
                </div>
                {{-- Password --}}
                <div>
                    <label for="password" class="input-label @error('password') input-label-error @enderror">Password</label>
                    <div class="mt-1">
                        <input type="password" name="password" id="password" class="input">
                    </div>
                    <span class="input-desc">Must have at least 8 characters</span>
                </div>
                {{-- Sumbit button --}}
                <div>
                    <button type="submit" class="button">Register</button>
                    <div class="mt-5 text-center">
                        <span class="block text-sm text-muted">Already have an account? <a href="{{ route('auth.login') }}" class="link">Sign in</a></span>
                    </div>
                </div>
                {{-- Terms --}}
                <div>
                    <span class="block text-xs text-muted">By clicking Register, you agree that you have read and accepted our <a href="#" class="link">Terms of Use</a> and <a href="#" class="link">Privacy Policy</a></span>
                </div>
            </div>
        </form>
    </div>
</x-layouts.minimal>
