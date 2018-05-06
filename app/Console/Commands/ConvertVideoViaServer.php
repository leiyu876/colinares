<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

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
        
        $process = new Process('/home4/virnezac/mysoftwares/colinares/ffmpeg/ffmpeg -i /home4/virnezac/mysoftwares/colinares/storage/app/public/movies/videos/gqOHXrWG0vPTeWMPVm4n2WcKEIhFV6seqkFAX1qm.flv /home4/virnezac/mysoftwares/colinares/storage/app/public/movies/videos/gqOHXrWG0vPTeWMPVm4n2WcKEIhFV6seqkFAX1qm.web');
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        echo $process->getOutput();
    }
}
