<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Controllers\Gates\UserGate;

class VerifyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $code = $request->route()->parameter('code');

        // if code is null or not present
        if (is_null($code)) {
            return redirect('/')->with('error', 'verification hash is not present');
        }

        // we need to locate the user record based on the hash
        $user = User::byCode($code)->first();

        // no user found. send them home.
        if (!$user) {
            return redirect('/')->with('error', 'No record was found for this hash token. Either it has already been verified or its invalid');
        }

        // we check if the email_verified_at has already been set. if so we cannot verify again
        if (!is_null($user->email_verified_at)) {
            return redirect('/');
        }

        // we need to mark the email_verified_at timestamp. and null the verify_hash to prevent lookups
        /*$user->email_verified_at = Carbon::now();
        $user->verify_token = null;
        $user->save();*/

        $attributes = array(
            'verify_token' => null,
            'email_verified_at' => Carbon::now()
        );

        list($passed, $messages, $model) = (new UserGate())->tryUpdate($user->id, $attributes, new User());

        if (!$passed) {
            return redirect('/')->with('error', 'We were not able to verify your token. Please try again later');
        }

        return $next($request);
    }
}
