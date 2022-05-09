<?php

namespace App\Services;

class Routes
{
    const API_AUDIO_PLAY_LESSON_BY_NAME = 'play_lesson_audio_by_name';
    const API_AUDIO_DOWNLOAD_LESSON_AUDIO = 'download_lesson_audio';

    static function playLessonAudioByName(string $course, string $lesson, string $filename, string $extension): string
    {
        return route(self::API_AUDIO_PLAY_LESSON_BY_NAME, [
            'course' => $course,
            'lesson' => $lesson,
            'name' => $filename,
            'extension' => $extension,
        ]);
    }

    static function downloadLessonAudio(string $course, string $lesson): string
    {
        return route(self::API_AUDIO_DOWNLOAD_LESSON_AUDIO, [
            'course' => $course,
            'lesson' => $lesson,
        ]);
    }
}
