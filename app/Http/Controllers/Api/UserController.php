<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiException;
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
     * Returns all registered users
     */
    public function findAll()
    {
        $policy = new Policy\Auto;
        $policy->inside([
            'password' => new Policy\To\Skip,
            'rememberToken' => new Policy\To\Skip,
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
     * @urlParam id required The UUID of the user Example: 2e55ba0a-f524-11ea-8572-5cc9d37d7d78
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
                'exists' => 'User not found.',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        }

        $users = EntityManager::getRepository('App\User')->find($request->id);

        if ($request->user('api')->getId() != $request->id) {
            throw new ApiException("Unauthorized", 401);
        }

        $policy = new Policy\Auto;
        $policy->inside([
            'user' => new Policy\To\Skip(),
        ]);

        return response()->json(
            $users->toArray($policy),
            200
        );
    }


    /**
     * Create an user
     *
     * Create an user, returns  id, email, cpf, phoneNumber, emailVerifiedAt, createdAt, UpdatedAt fields of the newly created user and sends an email to the address informed to confirm the registration.
     *
     * @bodyParam email string required The e-mail address of the user
     * @bodyParam password string required The password of the user (minLength: 6, maxLength:25)
     * @bodyParam confirmPassword string required The password confirmation of the user
     * @bodyParam phoneNumber string required The phone number of the user in '(XX) XXXXX-XXXX' format
     * @bodyParam cpf string required string The number of CPF document of the user in 'XXX.XXX.XXX-XX' format
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
            'password' => new Policy\To\Skip,
            'rememberToken' => new Policy\To\Skip,
        ]);

        return response()->json(
            $user->toArray($policy),
            201
        );
    }


    /**
     * Update an user
     *
     * Update an user by id and return a JSON containing updated user information
     *
     * @urlParam id required The ID of the user Example: 2e55ba0a-f524-11ea-8572-5cc9d37d7d78
     *
     * @bodyParam email string  The email address of the user. When updating the email, you will need to resend a confirmation email  Example: joao@gmail.com
     * @bodyParam phoneNumber string  The phone number of the user in '(XX) XXXXX-XXXX' format
     * @bodyParam cpf strin string The number of CPF document of the user in 'XXX.XXX.XXX-XX' format
     */
    public function update(Request $request)
    {
        $validatorId = Validator::make(
            [
                'id' => $request->id,
            ],
            [
                'id' => 'uuid|exists:App\User,id',
            ],
            [
                'exists' => 'User not found.',
            ]
        );

        if ($validatorId->fails()) {
            return response()->json([
                'error' => $validatorId->errors(),
            ], 400);
        }

        if ($request->user('api')->getId() != $request->id) {
            throw new ApiException("Unauthorized", 401);
        }

        $params = $request->only('email', 'cpf', 'phoneNumber');

        $validatorUpdate = Validator::make(
            $params,
            [
                'email' => 'email|unique:App\User,email',
                'cpf' => 'formato_cpf|cpf|unique:App\User,cpf',
                'phoneNumber' => 'celular_com_ddd',
            ],
            [
                'celular_com_ddd' => 'The :attribute does not match the format (XX) XXXXX-XXXX.',
                'cpf' => 'The :attribute must be a valid number.',
                'formato_cpf' => 'The :attribute does not match the format XXX.XXX.XXX-XX.',
            ]
        );

        if ($validatorUpdate->fails()) {
            return response()->json([
                'error' => $validatorUpdate->errors(),
            ], 400);
        }

        $user = EntityManager::find('App\User', $request->id);

        if (array_key_exists('email', $params)) {
            $user->setEmail($params['email']);
        }

        if (array_key_exists('phoneNumber', $params)) {
            $user->setPhoneNumber($params['phoneNumber']);
        }

        if (array_key_exists('cpf', $params)) {
            $user->setCpf($params['cpf']);
        }

        $user->setUpdatedAt(new DateTime());

        EntityManager::merge($user);
        EntityManager::flush();

        $policy = new Policy\Auto;
        $policy->inside([
            'password' => new Policy\To\Skip(),
            'rememberToken' => new Policy\To\Skip(),
        ]);

        return response()->json(
            $user->toArray($policy),
            200
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
                'id' => 'uuid|exists:App\User,id',
            ],
            [
                'exists' => 'User not found.',
            ]
        );

        if ($request->user('api')->getId() != $request->id) {
            throw new ApiException("Unauthorized", 401);
        }

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        }

        $user = EntityManager::find('App\User', $request->id);

        try {
            EntityManager::remove($user);
            EntityManager::flush();
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'For security, it is not allowed to delete user associated with tasks. Remove the associated tasks first.',
            ], 400);
        }

        return response('', $status = 204);
    }
}
