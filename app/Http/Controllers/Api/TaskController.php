<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Task;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Indaxia\OTR\Annotations\Policy;
use Indaxia\OTR\Traits\Transformable;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Tymon\JWTAuth\Facades\JWTAuth;

class TaskController extends Controller
{
    public function findAll(Request $request)
    {
        $policy = new Policy\Auto;
        $policy->inside([
            // 'createdAt' => new Policy\To\FormatDateTime(['format' => "Y_m_d"]),
            'user' => new Policy\To\Skip(),
        ]);

        $tasks =  EntityManager::getRepository('App\Task')->findAll();
        $tasks =  Transformable::toArrays($tasks, $policy);

        return response()->json($tasks, 200);
    }

    public function findById(Request $request)
    {
        $policy = new Policy\Auto;
        $policy->inside([
            'user' => new Policy\To\Skip(),
        ]);

        $task =  EntityManager::getRepository('App\Task')->find($request->id);

        if (is_null($task)) {
            return response()->json([
                'error' => 'Task not found',
            ], 400);
        }

        $parsedTask = $task->toArray($policy);

        return response()->json($parsedTask, 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userId' => 'required|exists:App\User,id',
            'title' => 'required|string|min:2|max:255',
            'date' => 'date_format:Y-m-d H:i:s'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()
            ], 400);
        }


        $user = EntityManager::getRepository('App\User')->find($request->userId);

        $task = new Task;
        $task->setTitle($request->title)
            ->setCreatedAt(new DateTime())
            ->setUpdatedAt(new DateTime())
            ->setDate(new DateTime($request->date, new DateTimeZone('UTC')))
            ->setUser($user);

        EntityManager::persist($task);
        EntityManager::flush();

        return response()->json($task->toArray(), 201);
    }

    public function delete(Request $request)
    {
        $task = EntityManager::find('App\Task', $request->id);

        if (is_null($task)) {
            return response()->json([
                'error' => 'Task not found',
            ], 400);
        }

        EntityManager::remove($task);
        EntityManager::flush();

        return response(['statusCode' => 204]);
    }
}
