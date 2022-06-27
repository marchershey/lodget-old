<?php

namespace App\Http\Controllers\Pages\Guest;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserProfileController extends Controller
{
    /**
     * Return the User Profile view.
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        return view('pages.guest.profile', [
            'user' => auth()->user()
        ]);
    }

    /**
     * Save the user's new profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submitProfile(Request $request)
    {
        // validate data
        $validated = $request->validate([
            'first_name' => 'required|string|min:3|max:100|alpha_dash',
            'last_name' => 'required|string|min:3|max:100|alpha_dash',
            'email' => [
                'required',
                'string',
                'min:3',
                'max:100',
                Rule::unique('users')->ignore(auth()->user()->id),
                'email:filter,rfc,spoof,dns'
            ],
        ]);

        // update user profile information
        $user = User::findOrFail(auth()->user()->id);
        $user->first_name = ucfirst($validated['first_name']);
        $user->last_name = ucfirst($validated['last_name']);
        $user->email = strtolower($validated['email']);
        $user->save();

        return redirect()->route('guest.profile')->with('status', 'Your profile was successfully updated!');
    }

    /**
     * Save the user's new profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submitPassword(Request $request)
    {
        // validate data
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'different:current_password', Password::min(8)],
        ], [
            'current_password.required' => 'Your current password is required.',
            'current_password.current_password' => 'Your current password does not match our records.',
            'new_password.required' => 'Your new password is required.',
            'new_password.different' => 'Your current password and new password must be different.',
            'new_password.min' => 'Your new password must be at least 8 characters.',
        ]);

        // update user profile information
        $user = User::findOrFail(auth()->user()->id);
        $user->password = Hash::make($validated['new_password']);
        $user->save();

        return redirect()->route('guest.profile')->with('status', 'Your password was successfully changed!');
    }
}
