<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Gates\UserGate;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Http\Request;

class SignupController extends Controller
{
	
	public function display()
	{
		// display the form
		return view('pages.signup-options');
	}

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

	public function post(Request $request)
	{
		$attributes = $request->all();

        list($passes, $messages, $model) = (new UserGate())->tryInsert($attributes, new User());

        if (!$passes) {
            return redirect()->back()->withErrors($messages)->withInput();
        }

        // send out event other after creation stuff

        // then redirect to homepage
	}
}