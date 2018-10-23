<?php
namespace App\Http\Controllers;

use App\Models\Genre;

class AjaxController
{
	/**
	 * get form addition based on form id passed in
	 *
	 * @return view
	 */
	public function form($id)
	{
		switch($id) {
			case 1:
				$genres = Genre::all();
				return view('forms.signup-artist')->with(compact('genres'));
			break;
			case 2:
				return view('forms.signup-manager');
			break;
			case 3:
				;return view('forms.signup-event');
			break;
		}
	}
}