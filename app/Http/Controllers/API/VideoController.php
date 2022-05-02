<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\MediaController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class VideoController extends MediaController
{
    protected string $disk = DISK_VIDEO;

    // Actions ---------------------------------------------------------------------------------------------------------

    /**
     * @example "GET /api/video/VIDEO_ANN"
     */
    function index(string $course): JsonResponse
    {
        $path = $this->getPathToCourse($course);
        $files = $this->storageFiles($path);

        $filesInfo = Collection::make();

        foreach ($files as $file)
        {
            if ($file->isFile() && $file->getExtension() === 'mp4')
            {
                $fileInfo = [
                    'name' => $file->getFilenameWithoutExtension(),
                    'extension' => $file->getExtension(),
                    'play_url' => route('play_course_video_by_name', [
                        'course' => $course,
                        'name' => $file->getFilename(),
                    ]),
                    'title' => $file->getFilenameWithoutExtension(),
                ];

                $filesInfo->push($fileInfo);
            }
        }

        return $this->responseFilesInfo($filesInfo);
    }

    function play(string $course, string $name)
    {
        $fileContents = $this->filesystem->get("$course/$name");
        return response()->make($fileContents, 200)->header('Content-Type', "video/mp4");
    }
}
