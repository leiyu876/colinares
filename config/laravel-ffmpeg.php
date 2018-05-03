<?php

return [
    'default_disk' => 'local',

    'ffmpeg.binaries' => env('FFMPEG_FFMPEG'),
    'ffmpeg.threads'  => env('FFMPEG_THREADS'),

    'ffprobe.binaries' => env('FFMPEG_FFPROBE'),

    'timeout' => env('FFMPEG_TIMEOUT'),
];