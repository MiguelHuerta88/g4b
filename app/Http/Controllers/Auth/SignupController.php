<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    /**
     * register controller
     *
     * @var RegisterController
     */
    public $registerController;

    /**
     * constructor function
     *
     * @param RegisterController $registerController
     *
     * @return void
     */
    public function __construct(RegisterController $registerController)
    {
        $this->registerController = $registerController;
    }

    /**
     * artist form function
     *
     * @return view
     */
	public function artist()
    {
        $genres = Genre::all();
        return view('forms.signup-artist')
            ->with(
                compact(
                    'genres'
                )
            );
    }

    public function manager()
    {
        return view('forms.signup-manager');
    }

    /**
     * post function for the form
     *
     * @return Redirect
     */
	public function post(Request $request)
	{
		$attributes = $request->all();

        return $this->registerController->register($attributes);
	}
}