<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\APIController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
                    'name' => pathinfo($file->getFilename(), PATHINFO_FILENAME),
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
}
