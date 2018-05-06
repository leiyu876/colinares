<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

use Storage;
use App\Movie;

class ConvertVideoViaServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leo:convertvideoviaserver';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command can be use only in the server.';

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
        // SEVER only!

        $movie = Movie::find($this->argument('movie'));

        if($movie) {

            $root = '/home4/virnezac/mysoftwares/colinares/';
            $public = $root.'storage/app/public/';

            $pathinfo = pathinfo($movie->video);
                
            $new_path = 'movies/videos/'.$pathinfo['filename'].'.webm';

            $command = $root.'ffmpeg/ffmpeg -i '.$public.$movie->video.' '.$public.$new_path;

            Storage::disk('local')->put('testlistenerdeletemeafter.txt', $command);
            
            return '';

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
