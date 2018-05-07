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
            
            if(!Storage::disk('local')->exists('video_converting.txt')) {
                
                $movie = Movie::where('is_html5', false)->get()->first();
            
                if($movie) {

                    setPHPINItoMax();

                    $pathinfo = pathinfo($movie->video);
                    
                    $new_path = 'movies/videos/'.$pathinfo['filename'].'.mp4';

                    $format = new X264('libmp3lame', 'libx264');
                    $format->on('progress', function($video, $format, $percentage) {
                        echo("$percentage % transcoded\n");
                        Storage::disk('local')->put('video_converting.txt', "\n".$percentage);
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

                Storage::disk('local')->delete('video_converting.txt');
            }

        } else {

            if(!Storage::disk('local')->exists('video_converting.txt')) {
                
                //sleep(120);
                //Storage::disk('local')->delete('video_converting.txt');
                //return '';

                $movie = Movie::where('is_html5', false)->get()->first();

                if($movie) {

                    setPHPINItoMax();

                    $root = '/home4/virnezac/mysoftwares/colinares/';
                    $public = $root.'storage/app/public/';

                    $pathinfo = pathinfo($movie->video);
                        
                    $new_path = 'movies/videos/'.$pathinfo['filename'].'.webm';

                    $command = $root.'ffmpeg/ffmpeg -i '.$public.$movie->video.' '.$public.$new_path;

                    $process = new Process($command);
                    //$process->run();
                    $process->setTimeout(0);
                    $process->run(function ($type, $buffer) {
                        if (Process::ERR === $type) {
                            echo 'leo_error > '.$buffer;
                            if(!Storage::disk('local')->exists('video_converting.txt')) {
                                $findme   = 'Duration';
                                if (strpos($buffer, $findme) !== false) {
                                    $pos = strpos($buffer, $findme);
                                    Storage::disk('local')->put('video_converting.txt', "\n cmd says: ".substr($buffer, $pos, 21));
                                }
                            } else {
                                $findme   = 'time=';
                                if (strpos($buffer, $findme) !== false) {
                                    $pos = strpos($buffer, $findme);
                                    $contents = Storage::disk('local')->get('video_converting.txt');
                                    Storage::disk('local')->put('video_converting.txt', $contents."\n cmd says: ".substr($buffer, $pos, 16));
                                }                                
                            }
                        } else {
                            echo 'leo_out > '.$buffer;
                        }
                    });

                    // executes after the command finishes
                    if (!$process->isSuccessful()) {
                        throw new ProcessFailedException($process);
                    }
                    //Storage::disk('public')->delete($movie->video);
                    $movie->video = $new_path;
                    $movie->is_html5 = true;
                    
                    //$movie->save();
                    //Storage::disk('local')->delete('video_converting.txt');
                    echo $process->getOutput();
                }
            }
        }
    }
}
