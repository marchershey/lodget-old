<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        ]);

        // create and save user
        $user = new User();
        $user->first_name = ucfirst($validated['first_name']);
        $user->last_name = ucfirst($validated['last_name']);
        $user->email = strtolower($validated['email']);
        $user->password = Hash::make($validated['password']);
        $user->save();

        // authenticate user
        $user = Auth::loginUsingId($user->id);

        // redirect
        return redirect()->route($user->type . '.dashboard');
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
