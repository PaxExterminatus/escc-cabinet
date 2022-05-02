<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Finder\SplFileInfo;

abstract class MediaController extends APIController
{
    protected string $disk = DISK_PUBLIC;
    protected Filesystem $filesystem;

    function __construct()
    {
        $this->filesystem = Storage::disk($this->disk);
    }

    // Helpers ---------------------------------------------------------------------------------------------------------
    /**
     * @param string $course
     * @param string $lesson
     * @return string
     */
    protected function getPathToLesson(string $course, string $lesson): string
    {
        return $this->filesystem->path("/$course/$lesson");
    }

    /**
     * @param string $course
     * @return string
     */
    protected function getPathToCourse(string $course): string
    {
        return $this->filesystem->path("/$course");
    }

    /**
     * @return SplFileInfo[]
     */
    protected function storageFiles(string $path): array
    {
        return File::allFiles($path);
    }

    /**
     * @param Collection|SplFileInfo[] $files
     */
    protected function storageFilesInfo(array $files, array $additional, string $extension): Collection
    {
        $filesInfo = Collection::make();

        foreach ($files as $file)
        {
            if ($file->isFile() && $file->getExtension() === $extension)
            {
                $fileInfo = [
                    'name' => $file->getFilenameWithoutExtension(),
                    'extension' => $file->getExtension(),
                ];

                $filesInfo->push($additional + $fileInfo);
            }
        }

        return $filesInfo;
    }

    // Responses -------------------------------------------------------------------------------------------------------

    protected function responseFilesInfo(Collection $filesInfo): JsonResponse
    {
        if (!$filesInfo->count()) {
            return $this->error(message: 'Файлы не найдены');
        }

        return $this->success(data: ['files' => $filesInfo]);
    }
}
