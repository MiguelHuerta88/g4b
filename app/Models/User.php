<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'username',
        'password',
        'artist_name',
        'hometown',
        'state',
        'genre_id',
        'other',
        'user_type_id',
        'verify_hash',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Validation rules to be used
     * @var array
     */
    protected $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'username' => 'required|string|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed',
        'artist_name' => 'sometimes|required|string|max:255',
        'hometown' => 'sometimes|required|string|max:255',
        'genre_id' => 'sometimes|required|integer',
        'other' => 'sometimes|required_if:genre_id,7',
        'user_type_id' => 'required|integer',
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

    /**
     * Scope by verify_hash code
     *
     * @param $query
     * @param $code
     * @return mixed
     */
    public function scopeByCode($query, $code)
    {
        return $query->where('verify_hash', $code);
    }
}
