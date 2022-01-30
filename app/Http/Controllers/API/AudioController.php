<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\APIController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AudioController  extends APIController
{
    /**
     * @param string $course
     * @param string $lesson
     * @return JsonResponse
     * @example "GET /api/audio/course/lesson"
     */
    function index(string $course, string $lesson): JsonResponse
    {
        $path = Storage::path("audio/$course/$lesson");
        $files = File::allFiles($path);
        $filesData = Collection::make();

        foreach ($files as $file)
        {
            if ($file->isFile())
            {
                $filesData->push([
                    'course' => $course,
                    'lesson' => $lesson,
                    'name' => pathinfo($file->getFilename(), PATHINFO_FILENAME),
                    'extension' => pathinfo($file->getFilename(), PATHINFO_EXTENSION),
                ]);
            }
        }

        if (count($files))
        {
            return $this->success(
                data: [
                    'files' => $filesData,
                ],
            );
        }
        else
        {
            return $this->error(
                message: 'Файлы не найдены',
            );
        }
    }

    /**
     * @param string $course
     * @param string $lesson
     * @param string $name
     * @param string $extension
     * @return BinaryFileResponse
     */
    function play(string $course, string $lesson, string $name, string $extension): BinaryFileResponse
    {
        $path = Storage::path("audio/$course/$lesson/$name.$extension");

        if (!Storage::exists($path)) $this->error(message: 'File does not exist');

        $response = new BinaryFileResponse($path);
        BinaryFileResponse::trustXSendfileTypeHeader();

        return $response;
    }
}
