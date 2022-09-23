<?php

namespace App\Http\Controllers\Pages\Auth;

use App\Events\UserRegistered;
use App\Models\User;
use DateTime;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Validator;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;
use App\Mail\EmailVerificationMailer;

class AuthenticationController extends Component
{
    use WireToast;
    // properties
    public $email = "marc@hershey.co";
    public $password;
    public $password_confirmation;
    public $first_name;
    public $last_name;
    public $birthdate;
    public $phone;

    // states
    public $authState = "emailCheck";
    // public $authState = "register";

    // protected $rules = [
    //     'email' => ['required', 'email'],
    // ];

    public function render()
    {
        return view('pages.auth.auth');
    }

    public function updated($propertyName, $propertyValue)
    {
        $this->resetValidation($propertyName);

        // if ($propertyValue) {
        //     $this->withValidator(function (Validator $validator) {
        //         $validator->after(function ($validator) {
        //             if (count($validator->errors()) > 0) {
        //                 $error = $validator->errors()->first();
        //                 toast()->danger($error, 'Error')->push();
        //             }
        //         });
        //     })->validateOnly($propertyName);
        // }
    }

    /**
     * Email Address Updated
     * If the email address changes at all, we need to reset the form.
     */
    public function updatedEmail($value)
    {
        $this->resetPage();
    }

    public function goBack()
    {
        return redirect()->route('frontend.index');
    }

    /**
     * If the email address has been updated, use this function to reset the form.
     */
    public function resetPage()
    {
        $this->authState = "emailCheck";
        $this->password = null;
        $this->password_confirmation = null;
        $this->first_name = null;
        $this->last_name = null;
        $this->birthdate = null;
        $this->phone = null;

        return;
    }

    public function submit()
    {
        if ($this->authState == 'emailCheck') {
            // validate
            $this->withValidator(function (Validator $validator) {
                $validator->after(function ($validator) {
                    if (count($validator->errors()) > 0) {
                        $error = $validator->errors()->first();
                        toast()->danger($error, 'Error')->push();
                    }
                });
            })->validate([
                'email' => 'required|email|min:3|max:100'
            ]);
            // check if user exists
            if ($user = User::where('email', $this->email)->first()) {
                $this->authState = 'login';
            } else {
                $this->authState = 'register';
            }
        } elseif ($this->authState == 'login') {
            /**
             * Login
             */
            $this->withValidator(function (Validator $validator) {
                $validator->after(function ($validator) {
                    if (count($validator->errors()) > 0) {
                        $error = $validator->errors()->first();
                        toast()->danger($error, 'Error')->push();
                    }
                });
            })->validate([
                'email' => 'required|email|min:3|max:100',
                'password' => 'required|string|max:100|min:6',
            ]);

            if ($userr = Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
                session()->regenerate();
                return redirect('/host');
            } else {
                $this->password = null;
                toast()->danger('The password you entered is incorrect. Please try again.', 'Authentication Error')->push();
            }
        } elseif ($this->authState == 'register') {
            /**
             * Register
             */
            $this->withValidator(function (Validator $validator) {
                $validator->after(function ($validator) {
                    if (count($validator->errors()) > 0) {
                        $error = $validator->errors()->first();
                        toast()->danger($error, 'Uh oh...')->push();
                    }
                });
            })->validate([
                'email' => 'required|email|min:3|max:100',
                'first_name' => 'required|string|max:100|min:3',
                'last_name' => 'required|string|max:100|min:3',
                'password' => 'required|string|max:100|min:6|confirmed',
            ]);

            // create new user
            $user = new User;
            $user->first_name = $this->first_name;
            $user->last_name = $this->last_name;
            $user->email = $this->email;
            $user->password = bcrypt($this->password);
            $user->last_login_date = now();
            $user->last_login_ip = $_SERVER['REMOTE_ADDR'];
            $user->registered_ip = $_SERVER['REMOTE_ADDR'];
            $user->save();

            // send verification email

            // login the user
            if ($userr = Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
                session()->regenerate();
                return redirect()->route('dashboard');
            } else {
                toast()->danger('Please refesh the page and try again.', 'Server Error')->push();
            }
        }
    }
}
