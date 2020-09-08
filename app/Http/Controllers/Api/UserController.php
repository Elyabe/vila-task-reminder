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
        $policy = new Policy\Auto;
        $policy->inside([
            'user' => new Policy\To\Skip(),
        ]);

        $task =  EntityManager::getRepository('App\User')->find($request->id);

        if (is_null($task)) {
            return response()->json([
                'error' => 'User not found',
            ], 400);
        }

        $parsedUser = $task->toArray($policy);

        return response()->json($parsedUser, 200);
    }


    /**
     * Create an user
     *
     * Register a new user
     *
     * @bodyParam email string required The email address of the user
     * @bodyParam password string required The password of the user
     * @bodyParam phoneNumber string required The phone number of the user
     * @bodyParam cpf string required string The number of CPF document of the user
     *
     */
    public function create(Request $request)
    {

        if ($this->validator($request->all())->fails()) {
            return response()->json([
                'error' => $this->validator($request->all())->errors()
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

        return response()->json($user->toArray($policy), 201);
    }


    public function validator($params)
    {
        return  $validator = Validator::make($params, [
            'email' => 'required|string|unique:App\User,email',
            'password' => 'required|string'
        ]);
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
        $user = EntityManager::find('App\User', $request->id);

        if (is_null($user)) {
            return response()->json([
                'error' => 'User not found',
            ], 400);
        }

        EntityManager::remove($user);
        EntityManager::flush();

        return response(['statusCode' => 204]);
    }
}
