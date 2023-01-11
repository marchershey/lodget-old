<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class RegistrationController extends Controller
{
    /**
     * Return the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        return view('pages.auth.register');
    }

    /**
     * Attempt to create the new user account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submit(Request $request)
    {
        // validate data
        $validated = $request->validate([
            'first_name' => 'required|string|min:3|max:100|alpha_dash',
            'last_name' => 'required|string|min:3|max:100|alpha_dash',
            'email' => 'required|string|min:3|max:100|unique:users,email|email:filter,rfc,spoof,dns',
            'password' => ['required', Password::min(8)],
            'birthdate' => 'required|date|before:-25 years',
        ], [
            'birthdate.before' => 'You must be at least 25 years old.',
        ]);

        // create and save user
        $user = new User();
        $user->first_name = ucfirst($validated['first_name']);
        $user->last_name = ucfirst($validated['last_name']);
        $user->email = strtolower($validated['email']);
        $user->password = Hash::make($validated['password']);
        $user->birthdate = $validated['birthdate'];
        $user->save();

        // create stripe customer
        $user->createAsStripeCustomer([
            'name' => $user->first_name . ' ' . $user->last_name,
            'email' => $user->email,
            'metadata' => [
                'user_id' => $user->id,
            ],
        ]);

        // authenticate user
        $user = Auth::loginUsingId($user->id);

        // send welcome email
        Mail::to($user->email)->queue(new \App\Mail\WelcomeUserMail($user->first_name));

        // redirect
        return redirect()->intended(route('dashboard'));
    }
}
