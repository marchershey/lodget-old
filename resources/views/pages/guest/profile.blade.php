<x-layouts.guest pageTitle="Your Profile">

    <div class="panel-spacing">

        @if ($errors->any())
            <div class="rounded-md bg-red-100 p-4">
                <h3 class="font-medium text-red-800">Please correct the following issue(s):</h3>
                <div class="mt-2 text-red-700">
                    <ul role="list" class="list-disc space-y-1 pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @elseif(session('status'))
            <div class="rounded-md bg-green-100 p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-green-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="ml-3 flex-1 md:flex md:justify-between">
                        <p class="text-green-700">{{ session('status') }}</p>
                    </div>
                </div>
            </div>
        @else
            <div class="rounded-md bg-blue-100 p-4">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-blue-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3 flex-1 md:flex md:justify-between">
                        <p class="text-blue-700"><span class="font-medium">Please note:</span> Your personal information will never be shared publicly. It is solely used for communication between you and the hosts.</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="panel">
            <h1 class="panel-heading">Basic Information</h1>
            <form action="{{ route('guest.profile.submit-profile') }}" method="POST">
                @csrf
                <div class="panel-body">
                    <div class="flex w-full space-x-5">
                        <div class="w-full">
                            <label for="first_name" class="input-label @error('first_name') input-label-error @enderror">First Name</label>
                            <div class="mt-1">
                                <input type="text" name="first_name" id="first_name" class="input capitalize" value="{{ old('first_name') ?? $user->first_name }}">
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="last_name" class="input-label @error('last_name') input-label-error @enderror">Last Name</label>
                            <div class="mt-1">
                                <input type="text" name="last_name" id="last_name" class="input capitalize" value="{{ old('last_name') ?? $user->last_name }}">
                            </div>
                        </div>
                    </div>
                    {{-- Email Address --}}
                    <div>
                        <label for="email" class="input-label @error('email') input-label-error @enderror">Email Address</label>
                        <div class="mt-1">
                            <input type="email" name="email" id="email" class="input lowercase" value="{{ old('email') ?? $user->email }}">
                        </div>
                    </div>
                    <div class="panel-action-spacing">
                        <button type="submit" class="button w-auto">Update Profile</button>
                        <a href="/dashboard" class="button button-light w-auto">Cancel</a>
                    </div>
                </div>
            </form>
        </div>

        <div class="panel">
            <h1 class="panel-heading">Change Password</h1>
            <form action="{{ route('guest.profile.submit-password') }}" method="POST">
                @csrf
                {{-- Password --}}
                <div class="panel-body">

                    <div class="flex space-x-5">
                        <div class="w-full">
                            <label for="current_password" class="input-label @error('current_password') input-label-error @enderror">Current Password</label>
                            <div class="mt-1">
                                <input type="password" name="current_password" id="current_password" class="input">
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="new_password" class="input-label @error('new_password') input-label-error @enderror">New Password</label>
                            <div class="mt-1">
                                <input type="password" name="new_password" id="new_password" class="input">
                            </div>
                        </div>
                    </div>
                    <div class="panel-action-spacing">
                        <button type="submit" class="button w-auto">Update Password</button>
                        <a href="/dashboard" class="button button-light w-auto">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.guest>
