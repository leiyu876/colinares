<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\LeoMailable;
use Mail;

class LeoemailwaysController extends Controller
{
    public function index()
    {
    	Mail::to('leiyu876@yahoo.com')->send(new LeoMailable());
    	dd('done!');
    }
}
