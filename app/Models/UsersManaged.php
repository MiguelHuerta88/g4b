<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersManaged extends Model
{
	/**
	 * table to be used
	 *
	 * @var string
	 */
    protected $table = 'users_managed';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'manager_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'manager_id', 'created_at', 'updated_ad', 'approved', 'verify_token'];

    /**
     * Validation rules to be used
     * @var array
     */
    protected $rules = [
        'user_id' => 'required|integer',
        'manager_id' => 'required|integer',
    ];

    /**
     * Get our validation rules for this model
     *
     * @return array
     */
    public function getRules()
    {
    	return $this->rules;
    }

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'manager_id');
    }

    /**
     * scope by code function
     *
     * @param QueryBuilder
     * @param string
     *
     * @return QueryBuilder
     */
    public function scopeByCode($query, $code)
    {
        return $query->where('verify_token', $code);
    }
}
