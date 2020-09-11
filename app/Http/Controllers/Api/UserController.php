<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Indaxia\OTR\Traits\Transformable;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Indaxia\OTR\Annotations\Policy;

/**
 * @authenticated
 *
 * @group  User management
 * APIs for managing users
 */
class UserController extends Controller
{

    /**
     * Get all users
     *
     * Get all registered users
     */
    public function findAll()
    {
        $policy = new Policy\Auto;
        $policy->inside([
            'password' => new Policy\To\Skip
        ]);

        $users = EntityManager::getRepository('App\User')->findAll();
        $users = Transformable::toArrays($users, $policy);

        return response()->json($users, 200);
    }


    /**
     * Get an user
     *
     * Get an user by id
     *
     * @urlParam id required The ID of the user
     *
     */
    public function findById(Request $request)
    {
        $validator = Validator::make(
            [
                'id' => $request->id,
            ],
            [
                'id' => 'uuid|exists:App\User,id',
            ],
            [
                'exists' => 'User not found',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        }

        $task = EntityManager::getRepository('App\User')->find($request->id);

        $policy = new Policy\Auto;
        $policy->inside([
            'user' => new Policy\To\Skip(),
        ]);

        return response()->json(
            $task->toArray($policy),
            200
        );
    }


    /**
     * Create an user
     *
     * Register a new user
     *
     * @bodyParam email string required The email address of the user
     * @bodyParam password string required The password of the user
     * @bodyParam confirmPassword string required The password confirmation of the user
     * @bodyParam phoneNumber string required The phone number of the user
     * @bodyParam cpf string required string The number of CPF document of the user
     *
     */
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|unique:App\User,email',
                'password' => 'required|string|min:6|max:25',
                'confirmPassword' => 'required|string|same:password',
                'cpf' => 'required|cpf|unique:App\User,cpf',
                'phoneNumber' => 'required|celular_com_ddd'
            ],
            [
                'celular_com_ddd' => 'The :attribute must be valid.',
                'cpf' => 'The :attribute must be a valid number.'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        }


        $user = new User;
        $user->setEmail($request->email)
            ->setCpf($request->cpf)
            ->setPassword(Hash::make($request->password))
            ->setCreatedAt(new DateTime())
            ->setPhoneNumber($request->phoneNumber)
            ->setUpdatedAt(new DateTime());


        EntityManager::persist($user);
        EntityManager::flush();

        $user->sendEmailVerificationNotification();

        $policy = new Policy\Auto;
        $policy->inside([
            'password' => new Policy\To\Skip
        ]);

        return response()->json(
            $user->toArray($policy),
            201
        );
    }


    /**
     * Destroy an user
     *
     * Destroy an user by id
     *
     * @urlParam id required The ID of the user
     *
     */
    public function delete(Request $request)
    {
        $validator = Validator::make(
            [
                'id' => $request->id,
            ],
            [
                'id' => 'exists:App\User,id',
            ],
            [
                'exists' => 'User not found',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        }

        $user = EntityManager::find('App\User', $request->id);
        EntityManager::remove($user);
        EntityManager::flush();

        return response('', $status = 204);
    }
}
