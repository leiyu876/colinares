<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Movie;
use FFMpeg;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\X264;
use Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

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
        if(env('APP_ENV') == 'local') {
            
            $movie = Movie::where('is_html5', false)->get()->first();
            
            if($movie) {

                setPHPINItoMax();

                $pathinfo = pathinfo($movie->video);
                
                $new_path = 'movies/videos/'.$pathinfo['filename'].'.mp4';

                $format = new X264('libmp3lame', 'libx264');
                $format->on('progress', function($video, $format, $percentage) {
                    echo("$percentage % transcoded\n");
                });

                FFMpeg::fromDisk('public')
                    ->open($movie->video)
                    ->export()
                    ->toDisk('public')
                    ->inFormat($format)
                    ->save($new_path);

                Storage::disk('public')->delete($movie->video);

                $movie->video = $new_path;
                $movie->is_html5 = true;

                $movie->save();

                $this->info('Done converting');

            } else {

                $this->info('Nothing to Convert');
            }

        } else {

            if(!Storage::disk('local')->exists('converting.txt')) {
                $time = date("h:i:sa").' via build ';
                Storage::disk('local')->put('converting.txt', "\n".$time);

                sleep(120);
                Storage::disk('local')->delete('converting.txt');
                return '';

                $movie = Movie::where('is_html5', false)->get()->first();

                if($movie) {

                    setPHPINItoMax();

                    $root = '/home4/virnezac/mysoftwares/colinares/';
                    $public = $root.'storage/app/public/';

                    $pathinfo = pathinfo($movie->video);
                        
                    $new_path = 'movies/videos/'.$pathinfo['filename'].'.webm';

                    $command = $root.'ffmpeg/ffmpeg -i '.$public.$movie->video.' '.$public.$new_path;

                    $process = new Process($command);
                    $process->run();

                    // executes after the command finishes
                    if (!$process->isSuccessful()) {
                        throw new ProcessFailedException($process);
                    }

                    $movie->video = $new_path;
                    $movie->is_html5 = true;

                    $movie->save();

                    echo $process->getOutput();
                }
            }
        }
    }
}
