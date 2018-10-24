<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Gates\UserGate;

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
        //dd($attributes);
        list($passes, $messages, $model) = (new UserGate())->tryInsert($attributes, new User());

        if (!$passes) {
            return redirect()->back()->withErrors($messages)->withInput();
        }

        // send out event other after creation stuff

        // then redirect to homepage
        $message = 'Successfully created user.';
        return redirect($this->redirectTo)->with('message', $message);
    }
}
