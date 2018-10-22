<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BaseModel extends Model
{
	/**
	 * Rules that we are to use when validatng
	 *
	 * @param array
	 */
	protected $rules = array();

	/**
	 * Fillable array for this model
	 *
	 * @param array
	 */
	protected $fillable = array();

	/**
	 * Get rules that we have setup
	 *
	 * @param array
	 */
	public function getRules()
	{
		return $this->rules;
	}
}