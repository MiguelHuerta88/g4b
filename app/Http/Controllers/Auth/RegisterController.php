<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Gates\UserGate;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * register user function
     * 
     * @param array
     * @return void
     */
    public function register(array $attributes)
    {
        $userGate = new UserGate();

        list($passes, $messages, $user) = $userGate->register($attributes, new User());

        if (!$passes) {
            return redirect()->back()->withErrors($messages)->withInput();
        }

        // if we successfully create base user record we must now try to enter user_managed info if this is a manager account
        $userGate->createUserManaged($attributes, $user);

        // send out event other after creation stuff
        Mail::to($user)->send(new UserRegistered($user));

        // then redirect to homepage
        $message = 'Successfully created user.';
        return redirect($this->redirectTo)->with('message', $message);
    }
}
