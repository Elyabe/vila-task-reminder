<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Tymon\JWTAuth\Facades\JWTAuth;
use Indaxia\OTR\Annotations\Policy;


class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $validator = Validator::make(
            $request->only('email', 'password'),
            [
                'email' => 'required|email|exists:App\User,email',
                'password' => 'required|string',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        }

        $credentials = $request->only('email', 'password');

        $email = $credentials['email'];
        $password = $credentials['password'];

        $user = EntityManager::getRepository('App\User')
            ->findOneBy([
                'email' => $email,
            ]);

        if (!Hash::check($password, $user->getPassword())) {
            throw new ApiException("Bad Credentials.", 401);
        }

        $token = JWTAuth::fromUser($user);

        if (!$token) {
            throw new ApiException("Error Processing Request", 500);
        }

        $policyHide = new Policy\Auto;
        $policyHide->inside([
            'password' => new Policy\To\Skip(),
            'rememberToken' => new Policy\To\Skip(),
        ]);

        return response()->json([
            'acessToken' => $token,
            'tokenType'  => 'bearer',
            'expiresIn'  => env('JWT_TTL', 60),
            'user'       => $user->toArray($policyHide),
        ]);
    }
}
