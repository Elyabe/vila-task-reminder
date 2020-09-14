<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Tymon\JWTAuth\Facades\JWTAuth;
use Indaxia\OTR\Annotations\Policy;

/**
 * @group  Auth management
 *
 *  APIs for authenticate users
 */
class AuthController extends Controller
{
    /**
     * Authenticate an user
     *
     * Authenticate a user and returns the fields accessToken, tokenType, expiresIn and an object containing information of the logged in user
     *
     * @bodyParam email string required The email address of the user
     * @bodyParam password string required The password of the user
     *
     * @response  400 {
     *  "error": {
     *      "field": [
     *           "Error Message 1",
     *                  ...
     *      ]
     *  }
     * }
     */
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

    /**
     * Change password of the user
     * @authenticated
     * Update password of user by id
     *
     * @urlParam id required The ID of the user
     *
     * @bodyParam password string required The actual password of the user
     * @bodyParam newPassword string required The new password
     * @bodyParam newPasswordConfirm string required The new password confirmation
     */
    public function passwordChange(Request $request)
    {

        $params = $request->only('password', 'newPassword', 'newPasswordConfirm');

        $validatorUpdate = Validator::make(
            $params,
            [
                'password' => 'required|string|min:6|max:25',
                'newPassword' => 'required|string|min:6|max:25',
                'newPasswordConfirm' => 'required|string|same:newPassword',
            ],
        );

        if ($validatorUpdate->fails()) {
            return response()->json([
                'error' => $validatorUpdate->errors(),
            ], 400);
        }

        $user = EntityManager::find('App\User', $request->user('api')->getId());

        if (!Hash::check($request->password, $user->getPassword())) {
            throw new ApiException("Bad Credentials.", 401);
        }

        $user->setPassword(Hash::make($request->newPassword))
            ->setUpdatedAt(new DateTime());

        EntityManager::merge($user);
        EntityManager::flush();

        $policy = new Policy\Auto;
        $policy->inside([
            'password' => new Policy\To\Skip(),
            'rememberToken' => new Policy\To\Skip(),
        ]);

        return response()->json(
            [
                'message' => 'Password has been changed.',
            ],
            200
        );
    }

    /**
     * Logout
     * @authenticated
     * Invalid JWT user
     *
     */
    public function logout(Request $request)
    {
        $request->auth('api')->invalidate(true);
    }
}
