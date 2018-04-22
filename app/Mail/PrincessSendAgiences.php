<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Storage;

class PrincessSendAgiences extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $file_path = storage_path('app/public/'.$this->data['applicant']->resume);
        
        return $this->from('support@virneza.com', $this->data['applicant']->name)
                    ->subject('Restaurant Attendant 3+ years')
                    ->attach($file_path, [
                        'as' => $this->data['applicant']->name.'.'.pathinfo($file_path, PATHINFO_EXTENSION),
                    ])
                    ->markdown('emails.applicants.princess');
    }
}
