<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function ourstory() {
    	return view('pages.ourstory');
    }
    public function events() {
    	return view('pages.events');
    }
    public function gallery() {
    	return view('pages.gallery');
    }
    public function contact() {
    	return view('pages.contact');
    }
}
