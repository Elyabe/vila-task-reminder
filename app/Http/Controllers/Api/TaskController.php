<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Task;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Indaxia\OTR\Annotations\Policy;
use Indaxia\OTR\Traits\Transformable;
use LaravelDoctrine\ORM\Facades\EntityManager;


/**
 * @authenticated
 *
 * @group  Task management
 *
 * APIs for managing task
 */
class TaskController extends Controller
{
    /**
     * Get all tasks
     *
     * Get all registered tasks
     */
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


    /**
     * Get an task
     *
     * Get an task by id
     *
     * @urlParam id required The ID of the task
     *
     */
    public function findById(Request $request)
    {
        $validator = Validator::make(
            [
                'id' => $request->id,
            ],
            [
                'id' => 'uuid|exists:App\Task,id',
            ],
            [
                'exists' => 'Task not found',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        }

        $policy = new Policy\Auto;
        $policy->inside([
            'user' => new Policy\To\Skip(),
        ]);

        $task = EntityManager::getRepository('App\Task')->find($request->id);

        return response()->json(
            $task->toArray($policy),
            200
        );
    }

    /**
     * Create an task
     *
     * Register a new task
     *
     * @bodyParam title string required Title for the task
     * @bodyParam userId string required Task owner user ID
     * @bodyParam date datetime required Occurrence date for the task
     *
     */
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

    /**
     * Destroy an task
     *
     * Destroy an task by id
     *
     * @urlParam id required The ID of the task
     *
     */
    public function delete(Request $request)
    {
        $validator = Validator::make(
            [
                'id' => $request->id,
            ],
            [
                'id' => 'uuid|exists:App\Task,id',
            ],
            [
                'exists' => 'Task not found',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
            ], 400);
        }

        $task = EntityManager::find('App\Task', $request->id);

        EntityManager::remove($task);
        EntityManager::flush();

        return response('', $status = 204);
    }
}
