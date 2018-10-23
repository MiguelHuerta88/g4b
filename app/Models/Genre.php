<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Genre extends Model {

	/**
	 * Table name
	 *
	 * @var string
	 */
	protected $table = 'genre';

	/**
	 * Fillable array
	 *
	 * @var array
	 */
	protected $fillable = array();

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	protected $rules = array();

	/**
	 * get validation rules
	 *
	 * @var array
	 */
	public function getRules()
	{
		return $this->rules;
	}
}