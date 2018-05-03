<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Movie;
use FFMpeg;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\X264;
use Storage;

class ConvertVideo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leo:convertvideo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert other video formats to mp4';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /*
        $ffmpeg = FFMpeg\FFMpeg::create();
$video = $ffmpeg->open('C:/xampp/htdocs/virneza_colinares/storage/app/public/movies/videos/ssample.mpg');
$video
    ->filters()
    ->resize(new FFMpeg\Coordinate\Dimension(320, 240))
    ->synchronize();
$video
    ->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(10))
    ->save('C:/xampp/htdocs/virneza_colinares/storage/app/public/movies/videos/frame.jpg');
$video
    ->save(new FFMpeg\Format\Video\X264('libmp3lame', 'libx264'), 'C:/xampp/htdocs/virneza_colinares/storage/app/public/movies/videos/export-x264.mkv');

    dd('done');
    
        FFMpeg::fromDisk('public')
    ->open('movies/videos/mpfor.mp4')
    ->addFilter(function ($filters) {
        $filters->resize(new \FFMpeg\Coordinate\Dimension(640, 480));
    })
    ->export()
    ->toDisk('public')
    ->inFormat(new \FFMpeg\Format\Video\X264('libmp3lame', 'libx264'))
    ->save('mpforto.mkv');

        dd('done');

        FFMpeg::fromDisk('public')
    ->open('movies/videos/fjuzaf1xPkGCcOmuyqf2ZKrceOolXnLkAZBjxKBa.mp4')
    ->getFrameFromSeconds(10)
    ->export()
    ->toDisk('public')
    ->save('FrameAt10sec.png');
        dd('done');

        $lowBitrateFormat = (new X264)->setKiloBitrate(500);

        FFMpeg::fromDisk('public')
            ->open('movies/videos/fjuzaf1xPkGCcOmuyqf2ZKrceOolXnLkAZBjxKBa.mp4')
            ->addFilter(function ($filters) {
                $filters->resize(new Dimension(960, 540));
            })
            ->export()
            ->toDisk('public')
            ->inFormat($lowBitrateFormat)
    ->save('my_movie.mkv');
        dd('done');
        */
        $movie = Movie::where('is_html5', false)->get()->first();
        
        if($movie) {

            $pathinfo = pathinfo($movie->video);
            
            $new_path = 'movies/videos/'.$pathinfo['filename'].'.mp4';

            ini_set('max_execution_time', 10800); // 3 hrs

            FFMpeg::fromDisk('public')
                ->open($movie->video)
                ->export()
                ->toDisk('public')
                ->inFormat(new X264('libmp3lame', 'libx264'))
                ->save($new_path);

            Storage::disk('public')->delete($movie->video);

            $movie->video = $new_path;

            $movie->save();
        }
    }
}
