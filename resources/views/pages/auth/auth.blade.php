<x-layouts.auth>

    <form wire:submit.prevent="submit" class="flex flex-col mt-5 space-y-10">
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
            <h1 class="page-heading">Hello there.</h1>
            <p class="page-desc">To continue, enter your email address below.</p>
        </div>
        <div class="flex flex-col space-y-8">
            <div>
                <x-forms.text label="Email Address" model="email" />
            </div>
            @if ($authState == 'login')
                <div>
                    <x-forms.text label="Password" model="password" />
                </div>
            @elseif($authState == 'register')
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <x-forms.text label="First Name" model="first_name" class="capitalize" />
                    </div>
                    <div>
                        <x-forms.text label="Last Name" model="last_name" class="capitalize" />
                    </div>
                </div>
                <div>
                    <x-forms.text label="New Password" model="password" desc="Passwords must be at least 6 characters long" />
                </div>
                <div>
                    <x-forms.text label="Confirm Password" model="password_confirmation" desc="Type your password in again to confirm" />
                </div>
                <hr>
                <div class="text-sm italic">
                    By clicking the Continue button and creating an account with us, you state that you are at 18 years of age or older and you have read and agree to our <span class="text-link">Terms of Service</span>, <span class="text-link">Rental Agreement</span>, and our <span class="text-link">Privacy Policy</span>.
                </div>
            @endif
        </div>
        <div class="flex flex-col">
            <div wire:loading.delay.remove>
                <button type="submit" class="button button-dark button-full">Continue</button>
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
