<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class Jwt extends BaseMiddleware
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
}
