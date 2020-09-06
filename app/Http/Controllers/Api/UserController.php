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

class UserController extends Controller
{


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
