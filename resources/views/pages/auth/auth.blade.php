<x-layouts.auth>

    <form wire:submit.prevent="submit" class="flex flex-col mt-16 space-y-10">
        <div>
            <button wire:click="goBack" type="button" class="p-0 button">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1"></path>
                </svg>
                <span>Go back</span>
            </button>
        </div>
        <div>
            <h1 class="text-4xl font-black">Hello there.</h1>
            <p class="font-medium">To continue, enter your email address below.</p>
        </div>
        <div class="flex flex-col space-y-8">
            <div>
                <label for="email" class="input-label @error('email') text-red-500 @enderror">Email Address</label>
                <input wire:model.lazy="email" type="text" class="input">
            </div>
            @if ($authState == 'login')
                <div>
                    <label for="password" class="input-label @error('password') text-red-500 @enderror">Password</label>
                    <input wire:model.lazy="password" wire:loading.delay.attr="disabled" type="password" class="input">
                </div>
            @elseif($authState == 'register')
                <div>
                    <label for="password" class="input-label @error('password') text-red-500 @enderror">New Password</label>
                    <input wire:model.lazy="password" wire:loading.delay.attr="disabled" type="password" class="input" autocomplete="password">
                    <p class="input-desc">Passwords must be at least 6 characters long.</p>
                </div>
                <div>
                    <label for="password_confirmation" class="input-label @error('password') text-red-500 @enderror">Confirm Password</label>
                    <input wire:model.lazy="password_confirmation" wire:loading.delay.attr="disabled" type="password" class="input" autocomplete="password_confirmation">
                    <p class="input-desc">Type your password in again to confirm.</p>
                </div>
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label for="first_name" class="input-label @error('first_name') text-red-500 @enderror">First Name</label>
                        <input wire:model.lazy="first_name" wire:loading.delay.attr="disabled" type="text" class="capitalize input" autocomplete="first-name">
                    </div>
                    <div>
                        <label for="last_name" class="input-label @error('last_name') text-red-500 @enderror">Last Name</label>
                        <input wire:model.lazy="last_name" wire:loading.delay.attr="disabled" type="text" class="capitalize input" autocomplete="last-name">
                    </div>
                </div>
                <hr>
                <div class="text-sm italic">
                    By clicking the Continue button and creating an account with us, you state that you are at 18 years of age or older and you have read and agree to our <span class="text-link">Terms of Service</span>, <span class="text-link">Rental Agreement</span>, and our <span class="text-link">Privacy Policy</span>.
                </div>
            @endif
        </div>
        <div class="flex flex-col">
            <div wire:loading.delay.remove>
                <button type="submit" class="button button-black button-full">Continue</button>
            </div>
            <div wire:loading.delay>
                <div class="flex justify-center">
                    <svg class="w-[40px] h-[40px] text-muted animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </form>

</x-layouts.auth>
