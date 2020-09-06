<?php

namespace App\Http\Middleware;

use Closure;
use Doctrine\ORM\Mapping\Entity;
use Exception;
use Illuminate\Support\Facades\Auth;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware extends BaseMiddleware
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
        try {
            $user = JWTAuth::parseToken()->authenticate();

            // $request = $this->addUserToRequest($request);
        } catch (Exception $e) {
            if ($e instanceof TokenInvalidException) {
                return response()->json([
                    'error' => 'Token is invalid.',
                ], 401);
            } else if ($e instanceof TokenExpiredException) {
                return response()->json([
                    'error' => 'Token is Expired.',
                ], 401);
            } else {
                return response()->json([
                    'error' => 'Authorization Token not Found.',
                ], 401);
            }
        }
        return $next($request);
    }

    private function addUserToRequest($request)
    {
        $user = EntityManager::find('App\User', JWTAuth::getPayload()['id']);
        $request->merge(['user' => $user]);
        $request->setUserResolver(function () use ($user) {
            return $user;
        });
        Auth::setUser($user);
        return $request;
    }
}
