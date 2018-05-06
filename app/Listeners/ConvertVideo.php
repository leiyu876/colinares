<?php

namespace App\Listeners;

use App\Events\MovieCreate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Storage;

class ConvertVideo
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MovieCreate  $event
     * @return void
     */
    public function handle(MovieCreate $event)
    {
        '\App\Jobs\ConvertVideo'::dispatch($event->movie);
    }
}
