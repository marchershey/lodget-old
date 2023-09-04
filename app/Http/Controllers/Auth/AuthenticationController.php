<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class AuthenticationController extends Component
{
    // use WireToast;

    public $email;
    public $password;
    public $remember = false;

    /**
     * Return the authentication view
     * 
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('pages.auth.login');
    }

    /**
     * Attempt to authenticate the exsiting user.
     *
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function submitAuthentication()
    {
        // Validate user data
        $validated = $this->withValidator(function (Validator $validator) {
            $validator->after(function ($validator) {
                if (count($validator->errors()) > 0) {
                    $error = $validator->errors()->first();
                    toast()->danger($error, 'Validation Error')->push();
                }
            });
        })->validate([
            'email' => 'required|string|min:3|max:100|exists:users,email|email:filter,rfc,spoof,dns',
            'password' => ['required', Password::min(8)],
            'remember' => 'boolean',
        ], [
            // 'email.*' => 'Invalid email address.',
            'password.*' => 'Invalid password',
            'remember.*' => 'Please refresh the page and try again.',
        ]);

        // authenticate
        if ($user = Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']], (isset($validated['remember']) ? true : false))) {
            return redirect()->intended(route('dashboard'));
        } else {
            toast()->danger('The provided credentials do not match our records.', 'Authentication Error')->push();
            return;
        }
    }
}
