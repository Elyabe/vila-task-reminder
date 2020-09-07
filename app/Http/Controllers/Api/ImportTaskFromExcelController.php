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
use LaravelDoctrine\ORM\Facades\EntityManager;
use Rap2hpoutre\FastExcel\FastExcel;

class ImportTaskFromExcelController extends Controller
{
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
            $validator = $this->taskValidator($taskRow);

            if ($validator->fails()) {
                $exceptionLine = $key + 1;
                Storage::disk('local')->delete("tmp/{$filename}");
                throw new ApiException("Error Processing File on row {$exceptionLine}", 400);
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

        Storage::disk('local')->delete("tmp/{$filename}");

        return response()->json([
            'message' => 'Tasks imported from file :D',
            'quantity' =>  $taskRows->count(),
        ]);
    }

    private function taskValidator($data)
    {
        return Validator::make($data, [
            'title' => 'required|string',
            'date' => 'required|date|date_format:Y-m-d H:i:s',
        ]);
    }
}
