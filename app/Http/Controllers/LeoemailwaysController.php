<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\LeoMailable;
use Mail;
use Auth;
use App\Agency;
use App\Notifications\LeoNotification;

class LeoemailwaysController extends Controller
{
    public function leo_do_mailable()
    {
    	Mail::to('leiyu876@yahoo.com')->send(new LeoMailable());
    	dd('done!');
    }

    public function leo_do_notifications(){

    	$agency = agency::all()->random(1);

    	Auth::user()->notify(new LeoNotification($agency));
    	dd('done!');
    }
}
