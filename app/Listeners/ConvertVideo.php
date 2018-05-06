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
        if(!$event->movie->is_html5) {
            '\App\Jobs\ConvertVideo'::dispatch($event->movie);
        }
    }
}
