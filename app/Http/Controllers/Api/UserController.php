<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Indaxia\OTR\Traits\Transformable;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Indaxia\OTR\Annotations\Policy;

class UserController extends Controller
{


    public function getAll()
    {
        $users = EntityManager::getRepository('App\User')->findAll();
        $users = Transformable::toArrays($users);

        return response()->json($users, 200);
    }



    public function create(Request $request)
    {

        $policy = new Policy\Auto;
        $policy->inside([
            'password' => new Policy\To\Skip
        ]);

        $user = new User;
        $user->setEmail($request->email)
            ->setCpf($request->cpf)
            ->setPassword($request->password)
            ->setCreatedAt(new DateTime())
            ->setPhoneNumber($request->phoneNumber)
            ->setUpdatedAt(new DateTime());


        EntityManager::persist($user);
        EntityManager::flush();

        return response()->json($user->toArray($policy), 201);
    }


    public function validator($params)
    {
        return  $validator = Validator::make($params, [
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
    }
}
