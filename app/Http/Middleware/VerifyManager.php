<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\UsersManaged;
use App\Models\User;
use App\Http\Controllers\Gates\UserGate;

class VerifyManager
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

        $builder = UsersManaged::byCode($code);
        $userManaged = $builder->first();

        // if no record found
        if (!$userManaged) {
            return redirect('/')->with('error', 'No record was found for this hash token. Either it has already been verified or its invalid');
        }

        // we only verify this users_managed record if the manager is already verified
        $manager = $userManaged->user;
        
        // no manger found redirect
        if (!$manager) {
            return redirect('/')->with('error', 'No user was found with the manager id set.');
        }
       //dd($manager);
        // check if this manager has not be verified yet
        if (!is_null($manager->verify_token)) {
            return redirect('/')->with('error', 'The manager associated with this token has not yet been verified. Please try again later');
        }

        // update record
        /*$userManaged->verify_token = null;
        $userManaged->verified = true;
        $userManaged->save();*/

        $attributes = array(
            'verify_token' => null,
            'approved' => true
        );
        // tryMassUpdate($builder, array $attributes
        list($passed, $messages, $model) = (new UserGate())->tryMassUpdate($builder, $attributes);

        if (!$passed) {
            return redirect('/')->with('error', 'We were not able to verify your token. Please try again later');
        }

        return $next($request);
    }
}
