<?php

namespace App\Http\Controllers\Auth;

use App\Models\Genre;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignupController extends Controller
{
	
	public function display()
	{
		// get all genres
		$genres = Genre::all();

		// display the form
		return view('pages.signup')
			->with(compact(
				'genres'
			));
	}

	public function post(Request $request)
	{
		dd($request->all());
	}
}