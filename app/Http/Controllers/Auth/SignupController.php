<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignupController extends Controller
{
	
	public function display()
	{
		// display the form
		return view('pages.signup');
	}

	public function post(Request $request)
	{
		$attributes = $request->all();

		dd($attributes);
	}
}