<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AutocompleteController extends Controller
{
	/**
	 * suggest function
	 *
	 * @return json
	 */
	public function suggest(Request $request)
	{
		// autocomplete ui sends term as the query param
		$artistToSearch = $request->get('term');

		$result = User::likeName($artistToSearch)->get();

		$return = array();
		foreach($result as $index => $item)
		{
			$return[] = [
				'id' => $item->id,
				'label' => $item->artist_name,
				'value' => $item->artist_name
			];
		}
		return response()->json($return);
	}
}