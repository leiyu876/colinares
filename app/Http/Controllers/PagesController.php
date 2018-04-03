<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

    public function tree() {

        $data['root'] = User::whereEmail('espring@yahoo.com')->first();

        return view('pages.tree', $data);
    }
}
