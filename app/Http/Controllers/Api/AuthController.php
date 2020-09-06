<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // return response()->json($credentials);
        $user = EntityManager::getRepository('App\User')
            ->findOneBy([
                'email' => $credentials['email'],
            ]);

        try {
            // $token = JWTAuth::attempt($credentials);
            $token = JWTAuth::fromUser($user);

            if (!$token) {
                return response()->json([
                    'error' => 'Bad credentials'
                ]);
            }

            return response()->json($token);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return response()->json([
                'error' => 'Could not Create Token',
            ], 500);
        }
    }
}
