<?php

namespace App\Domain\Lessons\Controllers;

use App\Http\Controllers\MediaController;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Response;

class WebLessonsController extends MediaController
{
    protected string $disk = DISK_WEB_LESSONS;

    /**
     * @throws BindingResolutionException
     */
    function show(string $course, string $lesson): Response|JsonResponse
    {
        $files = $this->filesystem->files($course);
        $found = null;

        foreach ($files as $file)
        {
           if (Str::contains($file, "$lesson"))
           {
               $found = $file;
               break;
           }
        }

        if ($found) return response()->make(file_get_contents($this->filesystem->path($found)), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'.Str::uuid().'"'
        ]);

        return $this->error([], 'File not found');
    }
}
