<x-layouts.minimal>
    {{-- header / logo --}}
    <div class="flex flex-col items-center space-y-10">
        <x-logo dark />
        <div>
            <h1 class="text-2xl font-semibold">Create an account</h1>
        </div>
    </div>

    {{-- form --}}
    <form class="space-y-6" wire:submit.prevent="submitRegistration()">
        <div class="flex space-x-3">
            <div>
                <label for="first_name" class="input-label">First name</label>
                <input wire:model="first_name" id="first_name" name="first_name" type="text" autocomplete="first_name" class="capitalize input-text" required>
            </div>
            <div>
                <label for="last_name" class="input-label">Last name</label>
                <input wire:model="last_name" id="last_name" name="last_name" type="text" autocomplete="last_name" class="capitalize input-text" required>
            </div>
        </div>

        <div>
            <label for="email" class="input-label">Email address</label>
            <input wire:model="email" id="email" name="email" type="email" autocomplete="email" class="input-text" required>
        </div>

        <div>
            <label for="password" class="input-label">Password</label>
            <input wire:model="password" id="password" name="password" type="password" autocomplete="current-password" class="input-text" required>
        </div>
        <div>
            <label for="password" class="input-label">Confirm password</label>
            <input wire:model="password_confirmation" id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password" class="input-text" required>
        </div>

        <div>
            <label for="birthdate" class="input-label">Birthdate</label>
            <input wire:model="birthdate" id="birthdate" name="birthdate" type="date" autocomplete="birthdate" class="input-text" required>
        </div>

        <div>
            <span class="input-desc">We require your birthdate to ensure you meet the age requirement to use our service. Your privacy matters to us. Rest assured, we never share, sell, or disclose your personal information to any third parties. Your data is kept secure and confidential.</span>
        </div>

        <div>
            <span class="input-desc">By checking the box below and continuing to create your account, you acknowledge and agree to our <a href="#" class="link">terms of service</a>, <a href="#" class="link">privacy policy</a>, and <a href="#" class="link">rental agreement</a>. These documents outline the guidelines, rules, and obligations governing your use of our services. We encourage you to review them carefully to understand your rights and responsibilities. If you have any questions or concerns, please don't hesitate to reach out by <a href="#" class="link">contacting us</a>.</span>
        </div>

        <div class="flex items-center">
            <input wire:model="agreement" id="agreement" name="agreement" type="checkbox" class="input-checkbox">
            <label for="agreement" class="input-checkbox-label"> I acknowledge and agree to the <a href="#" class="link">Terms of Service</a>, <a href="#" class="link">Privacy Policy</a>, and <a href="#" class="link">Rental Agreement</a>.</label>
        </div>

        <div>
            <button wire:loading.remove wire:target="submitRegistration" type="submit" class="button button-primary">Create account</button>
            <button wire:loading wire:target="submitRegistration" type="button" class="button">
                <div class="flex justify-center">
                    <svg class="w-6 h-6 text-muted animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
            </button>
        </div>

        <div>
            <a class="button button-link" href="{{ route('auth.login') }}">I already have an account</a>
        </div>
    </form>
</x-layouts.minimal>
