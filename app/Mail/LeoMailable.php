<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LeoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $time;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($time)
    {
        $this->time = $time;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@virneza.com', 'Princess F. Virtucio')
                    ->subject('Restaurant Attendant 3+ years')
                    ->markdown('leoemailways.sample01');
    }
}
