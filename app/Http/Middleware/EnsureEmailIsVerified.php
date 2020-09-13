<?php

namespace App\Http\Middleware;

use App\Exceptions\ApiException;
use Closure;

class EnsureEmailIsVerified
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
        $user = $request->user('api');
        if (!$user || $user instanceof \App\User  && !$user->hasVerifiedEmail()) {
            throw new ApiException('Invalid Token or This user e-mail address is unverified.', 400);
        }
        return $next($request);
    }
}
