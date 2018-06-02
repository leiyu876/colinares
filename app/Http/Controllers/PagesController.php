<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PagesController extends Controller
{
    public function welcome() {

        $celebrants = User::whereRaw('DAYOFYEAR(curdate()) <= DAYOFYEAR(birthday)')->orderByRaw('DAYOFYEAR(birthday)')->take(10)->get();

        return view('welcome', compact('celebrants'));
    }

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
    public function birthday() {

        $users = User::all();
        $users = json_encode($users);
        
        return view('pages.birthday', compact('users'));
    }

    public function tree($id = 2) {

        $data['root'] = User::find($id);
        
        if(!$data['root']) {

            $data['root'] = $root = User::find(2);

            if(!$root) return 'No user with id of 2.';
        }

        $data['breadcrumbs'] = $data['root']->tree_breadcrumbs();
        
        return view('pages.tree', $data);
    }
}
