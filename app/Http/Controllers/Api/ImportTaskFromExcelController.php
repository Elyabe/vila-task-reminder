<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Task;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelDoctrine\ORM\Facades\EntityManager;
use Rap2hpoutre\FastExcel\FastExcel;

class ImportTaskFromExcelController extends Controller
{
    public function import(Request $request)
    {
        $user = $request->user('api');
        $fastExcel = new FastExcel();
        $taskRows = $fastExcel->import(storage_path('app') . '/tasks.xlsx', function ($row) {
            return $row;
        });

        foreach ($taskRows as $taskRow) {
            $validator = $this->taskValidator($taskRow);

            if ($validator->fails()) {
                throw new ApiException("Error Processing File", 400);
            }

            $task = new Task;
            $task->setTitle($taskRow['title'])
                ->setDate(new DateTime($taskRow['date'], new DateTimeZone('UTC')))
                ->setCreatedAt(new DateTime())
                ->setUpdatedAt(new DateTime())
                ->setUser($user);

            EntityManager::persist($task);
        }

        EntityManager::flush();

        return response()->json([
            'message' => 'Tasks imported from file :D',
        ]);
    }

    private function taskValidator($data)
    {
        return Validator::make($data, [
            'title' => 'required',
            'date' => 'required|date'
        ]);
    }
}
