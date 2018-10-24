<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Carbon\Carbon;

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
            return redirect('/');
        }

        // we need to locate the user record based on the hash
        $user = User::byCode($code)->first();

        // no user found. send them home.
        if (!$user) {
            return redirect('/');
        }

        // we check if the email_verified_at has already been set. if so we cannot verify again
        if (!is_null($user->email_verified_at)) {
            return redirect('/');
        }

        // we need to mark the email_verified_at timestamp. and null the verify_hash to prevent lookups
        $user->email_verified_at = Carbon::now();
        $user->verify_hash = null;
        $user->save();

        return $next($request);
    }
}
