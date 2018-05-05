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

            $this->alert('You can convert only in LOCAL environment, shared hosting dont support ffmpeg.');
        }
    }
}
