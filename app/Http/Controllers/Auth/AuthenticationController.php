<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    /**
     * Return the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function view()
    {
        return view('pages.auth.login');
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
            'email' => 'required|string',
            'password' => 'required',
            'remember' => '',
        ]);

        if ($user = Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']], (isset($validated['remember']) ? true : false))) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records']);
        }
    }
}
