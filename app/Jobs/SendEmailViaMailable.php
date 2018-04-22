<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Mail\LeoMailable;
use Mail;
use Storage;

class SendEmailViaMailable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$time = date("h:i:sa").' via construct ';

        //Storage::disk('local')->put('construct.txt', $time.'<br/>');

        //Mail::to('leiyu876@yahoo.com')->send(new LeoMailable($time));
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ini_set('max_execution_time', 3600); // 1 hr

        $time = date("h:i:sa").' via build ';

        $limit = range(1,1);

        foreach ($limit as $v) {

            Mail::to('leiyu876@yahoo.com')->send(new LeoMailable($time));
        }
        

        //Storage::disk('local')->put('handle.txt', $time.'<br/>');
    }
}
