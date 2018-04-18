<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\LeoMailable;
use Mail;
use Auth;
use App\Agency;
use App\Notifications\LeoNotification;
use App\Notifications\LeoOnDemandNotification;
use Notification;

class LeoemailwaysController extends Controller
{
	public function leo_do_email_before()
	{
		$data = array(
            'name'=>'Leo Gwapo',
            'email'=>'support@virneza.com',
            'subject'=>'Laravel 5.2',
            'bodymessage'=>'This is how to send email in laravel 5.2',
        );

        //$data['emails'] = array('leiyu876@yahoo.com', 'leiyu876@gmail.com', 'daloygwapo@gmail.com');
        $data['emails'] = array('daloygwapo@gmail.com');
        
        ini_set('max_execution_time', 300);

        Mail::send('email.resume.01', $data, function($message) use ($data) {    
            $message->from($data['email'], $data['name']);
            $message->bcc($data['emails']);
            $message->subject($data['subject']);  
        });

        dd('done sending email in old way laravel 5.2 something!');
	}

    public function leo_do_mailable()
    {
    	Mail::to('leiyu876@yahoo.com')->send(new LeoMailable());
    	dd('done sending email using mailables in laravel 5.3!');
    }

    public function leo_do_notifications()
    {
    	// this agency not important, just showing how to pass data
    	$agency = agency::all()->random(1);

    	Auth::user()->notify(new LeoNotification($agency));
    	dd('done sending email using notification in laravel 5.4!');
    }

    public function leo_do_ondemandnotifications() 
    {	
    	// this agency not important, just showing how to pass data
    	$agency = agency::all()->random(1);

    	Notification::route('mail', 'princess.virtucio@yahoo.com')->notify(new LeoOnDemandNotification($agency));
    	dd('done sending email using on demand notification in laravel 5.5!');
    }
}
