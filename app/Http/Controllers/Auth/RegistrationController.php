<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class RegistrationController extends Component
{
    // use WireToast;

    public $first_name = "Marc";
    public $last_name = "Hershey";
    public $email = "marc@email.com";
    public $password = "password";
    public $password_confirmation = "password";
    public $birthdate = "1980-07-13";
    public $agreement;


    /**
     * Return the registration view
     * 
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('pages.auth.registration');
    }

    function load(): void
    {
    }

    /**
     * Attempt to create the new user account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function submitRegistration(Request $request)
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
            'first_name' => 'required|string|min:3|max:100|alpha_dash',
            'last_name' => 'required|string|min:3|max:100|alpha_dash',
            'email' => 'required|string|min:3|max:100|unique:users,email|email:filter,rfc,spoof,dns',
            'password' => ['required', Password::min(8)],
            'birthdate' => 'required|date|before:-25 years',
            'agreement' => 'accepted',
        ], [
            'birthdate.before' => 'Sorry, but you are too young to use our service.',
            'agreement.accepted' => 'You did not accept our terms and conditions.',
        ]);

        // create and save user to database
        $user = new User();
        $user->first_name = ucfirst($validated['first_name']);
        $user->last_name = ucfirst($validated['last_name']);
        $user->email = strtolower($validated['email']);
        $user->password = Hash::make($validated['password']);
        $user->birthdate = $validated['birthdate'];
        $user->save();

        // Create stripe customer
        $user->createAsStripeCustomer([
            'name' => $user->first_name . ' ' . $user->last_name,
            'email' => $user->email,
            'metadata' => [
                'user_id' => $user->id,
            ],
        ]);

        // Authenticate user
        $user = Auth::loginUsingId($user->id);

        // send welcome email
        // Mail::to($user->email)->queue(new \App\Mail\WelcomeUserMail($user->first_name));

        // redirect
        return redirect()->intended(route('dashboard'));
    }
}
