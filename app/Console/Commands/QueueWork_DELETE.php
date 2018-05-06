<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Artisan;

class QueueWork extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leo:queuework';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will call queue:work default command';

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
        $exitCode = Artisan::call('queue:work', [
        ]);
    }
}
