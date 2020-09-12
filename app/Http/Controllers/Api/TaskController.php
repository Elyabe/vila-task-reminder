<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Task;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Indaxia\OTR\Annotations\Policy;
use Indaxia\OTR\Traits\Transformable;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Rap2hpoutre\FastExcel\FastExcel;

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
     * @urlParam id required The ID of the task Example: 3c8e83c5-f535-11ea-8572-5cc9d37d7d78
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
                'exists' => 'Task not found.',
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
     * Create a new task
     *
     * @bodyParam title string required Title for the task
     * @bodyParam description string Description for the task
     * @bodyParam userId string required Task owner user ID
     * @bodyParam date datetime required Occurrence date for the task
     *
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userId' => 'required|uuid|exists:App\User,id',
            'title' => 'required|string|min:2|max:255',
            'description' => 'string|max:500',
            'date' => 'date_format:Y-m-d H:i',
            'done' => 'boolean',
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
            ->setDate(new DateTime($request->date))
            ->setUser($user);

        EntityManager::persist($task);
        EntityManager::flush();

        return response()->json($task->toArray(), 201);
    }


    /**
     * Update a task
     *
     * Update a task by id
     *
     * @urlParam id required The ID of the task
     *
     * @bodyParam title string required Title for the task
     * @bodyParam description string Description for the task
     * @bodyParam date datetime required Occurrence date for the task
     */
    public function update(Request $request)
    {
        $validatorId = Validator::make(
            [
                'id' => $request->id,
            ],
            [
                'id' => 'uuid|exists:App\Task,id',
            ],
            [
                'exists' => 'Task not found.',
            ]
        );

        if ($validatorId->fails()) {
            return response()->json([
                'error' => $validatorId->errors(),
            ], 400);
        }


        $params = $request->only('title', 'description', 'date', 'done');

        $validatorUpdate = Validator::make(
            $params,
            [
                'title' => 'string|min:2|max:255',
                'description' => 'string|max:500',
                'date' => 'date_format:Y-m-d H:i',
                'done' => 'boolean',
            ],
        );

        if ($validatorUpdate->fails()) {
            return response()->json([
                'error' => $validatorUpdate->errors(),
            ], 400);
        }

        $task = EntityManager::find('App\Task', $request->id);

        if (array_key_exists('title', $params)) {
            $task->setTitle($params['title']);
        }

        if (array_key_exists('description', $params)) {
            $task->setDescription($params['description']);
        }

        if (array_key_exists('date', $params)) {
            $task->setDate(new DateTime($params['date']));
        }

        if (array_key_exists('done', $params)) {
            $task->setDone($params['done']);
        } else {
            $task->setDone(false);
        }

        EntityManager::merge($task);
        EntityManager::flush();

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
                'exists' => 'Task not found.',
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

    /**
     * @group  Task management
     *
     * Import tasks from .xlsx file
     *
     * @bodyParam file *.xlsx required Excel file containing the tasks
     *
     */
    public function import(Request $request)
    {
        $requestValidator = Validator::make($request->all(), [
            'file' => 'required|mimes:xlsx',
        ]);

        if ($requestValidator->fails()) {
            return response()->json([
                'error' => $requestValidator->errors(),
            ], 400);
        }

        $file = $request->file('file');
        $prefixUniq = uniqid(date('HisYmd'));
        $name = $file->getFilename();
        $extension = $file->extension();
        $filename = "{$prefixUniq}-{$name}.{$extension}";

        $upload = $file->storeAs('tmp', $filename);

        if (!$upload) {
            throw new ApiException("Error on upload tasks file", 400);
        }

        $filePath = storage_path("app/tmp/{$filename}");

        $user = $request->user('api');
        $fastExcel = new FastExcel();
        $taskRows = $fastExcel->import($filePath);

        foreach ($taskRows as $key => $taskRow) {
            $validator = $this->importTaskValidator($taskRow);

            if ($validator->fails()) {
                $exceptionLine = $key + 1;
                Storage::disk('local')->delete("tmp/{$filename}");
                throw new ApiException("Error Processing File on row {$exceptionLine}. Make sure the fields follow the required formatting.", 400);
            }

            $task = new Task;
            $task->setTitle($taskRow['title'])
                ->setDate(new DateTime($taskRow['date']))
                ->setDone(strtolower($taskRow['done']) === 'yes')
                ->setDescription($taskRow['description'])
                ->setCreatedAt(new DateTime())
                ->setUpdatedAt(new DateTime())
                ->setUser($user);

            EntityManager::persist($task);
        }

        EntityManager::flush();

        Storage::disk('local')->delete("tmp/{$filename}");

        return response()->json([
            'message' => 'Tasks imported from file :D',
            'quantity' =>  $taskRows->count(),
        ]);
    }

    private function importTaskValidator($data)
    {
        return Validator::make($data, [
            'title' => 'required|string',
            'date' => 'required|date|date_format:Y-m-d H:i',
            'description' => 'string|max:500',
            'done' =>  'string|in:yes,no',
        ]);
    }
}
