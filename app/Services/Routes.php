<?php


namespace App\Services;


class Routes
{
    static function playCourseAudioByName(string $course, string $lesson, string $filename, string $extension): string
    {
        return route('play_course_audio_by_name', [
            'course' => $course,
            'lesson' => $lesson,
            'name' => $filename,
            'extension' => $extension,
        ]);
    }
}
