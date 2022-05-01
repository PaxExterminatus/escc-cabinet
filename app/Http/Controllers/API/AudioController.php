<?php

namespace App\Http\Controllers\API;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Filesystem\Filesystem;
use JetBrains\PhpStorm\ArrayShape;
use Symfony\Component\Finder\SplFileInfo;
use ZipArchive;
use App\Http\Controllers\APIController;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class AudioController  extends APIController
{
    // Helpers ---------------------------------------------------------------------------------------------------------

    /**
     * @param string $course
     * @param string $lesson
     * @return string
     */
    protected function getPathToLesson(string $course, string $lesson): string
    {
        return Storage::path("audio/$course/$lesson");
    }

    /**
     * @param string $course
     * @return string
     */
    protected function getPathToCourse(string $course): string
    {
        return Storage::path("audio/$course");
    }

    /**
     * @param string $path
     * @return SplFileInfo[]
     */
    protected function getStorageFiles(string $path): array
    {
        return File::allFiles($path);
    }

    #[ArrayShape(['dir_size' => 'int', 'dir_hash' => 'string'])]
    protected function eachFiles(string $path, callable $fn = null): array
    {
        $dirSize = 0;
        $dirFileNames = [];

        $files = $this->getStorageFiles($path);
        foreach ($files as $file)
        {
            if ($file->getExtension() === 'mp3')
            {
                if ($fn) $fn($file);
                $dirSize += $file->getSize();
                $dirFileNames[] = $file->getFilename();
            }
        }

        return [
            'dir_size' => $dirSize,
            'dir_hash' => md5(json_encode($dirFileNames)),
        ];
    }

    #[ArrayShape([
        'zip_size' => 'int',
        'zip_hash' => 'string',
        'dir_size' => 'int',
        'dir_hash' => 'string',
    ])]
    protected function getCache(Filesystem $disk, string $path): array
    {
        if ($disk->exists($path))
        {
            return (array)json_decode($disk->get($path));
        }

        return [
            'zip_size' => null,
            'zip_hash' => null,
            'dir_size' => null,
            'dir_hash' => null,
        ];
    }

    #[ArrayShape([
        'dir_size' => 'int',
        'dir_hash' => 'string',
    ])]
    protected function makeZip(string $zipPath, string $dirPath): array
    {
        $zip = new ZipArchive;
        $zip->open($zipPath, ZipArchive::CREATE);

        $dirInfo = $this->eachFiles($dirPath, function (SplFileInfo $file) use ($zip) {
            $zip->addFile($file, $file->getFilename());
        });
        $zip->close();

        return $dirInfo;
    }

    // Actions ---------------------------------------------------------------------------------------------------------

    /**
     * @param string $course
     * @param string $lesson
     * @return JsonResponse
     * @example "GET /api/audio/course/lesson"
     */
    function index(string $course, string $lesson): JsonResponse
    {
        $path = $this->getPathToLesson($course, $lesson);
        $files = $this->getStorageFiles($path);
        $filesData = Collection::make();

        foreach ($files as $file)
        {
            if ($file->isFile() && $file->getExtension() === 'mp3' )
            {
                $filesData->push([
                    'course' => $course,
                    'lesson' => $lesson,
                    'name' => $file->getFilenameWithoutExtension(),
                    'extension' => $file->getExtension(),
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

    /**
     * @param string $course
     * @param string $lesson
     * @return BinaryFileResponse
     */
    function download(string $course, string $lesson): BinaryFileResponse
    {
        $diskAudio = Storage::disk(DISK_AUDIO);
        $courseCode = str($course)->replace('AUDIO_', '')->lower();
        $name = "$courseCode-lesson-$lesson";

        $coursePath = $this->getPathToCourse($course);
        $lessonPath = $this->getPathToLesson($course, $lesson);
        $cachePath = "$course/$name.json";
        $zipPath = "$coursePath/$name.zip";

        $exist = file_exists($zipPath);

        if (!$exist)
        {
            $dirInfo = $this->makeZip($zipPath, $lessonPath);
        }
        else
        {
            $dirInfo = $this->eachFiles($lessonPath);

            $cache = $this->getCache($diskAudio, $cachePath);

            if ($dirInfo['dir_hash'] !== $cache['dir_hash'])
            {
                $this->makeZip($zipPath, $lessonPath);
            }
        }

        $zipInfo = [
            'zip_size' => filesize($zipPath),
            'zip_hash' => hash_file('md5', $zipPath),
        ];

        $diskAudio->put($cachePath, json_encode($zipInfo + $dirInfo));

        return response()->download($zipPath);
    }
}
