<?php

namespace App\Domain\Lessons\Controllers;

use App\Http\Controllers\MediaController;

class WebLessonsController extends MediaController
{
    protected string $disk = DISK_LESSONS_PDF;

    function show(string $course, string $lesson)
    {
        dd($course, $lesson);
    }
}
