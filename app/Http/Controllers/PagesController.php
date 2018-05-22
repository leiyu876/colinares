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
    public function birthday() {

        $users = User::all()->toArray();
        $users = json_encode($users);
        //dd($users);
        return view('pages.birthday', compact('users'));
        
        $u = array();

        foreach ($users as $key => $user) {
            $u[$key]['title'] = $user->first_name.' '. $user->middle_name.' '. $user->last_name;
            $u[$key]['start'] = 'new Date(2018, 05, 23)';
            $u[$key]['backgroundColor'] = '#f56954';
            $u[$key]['borderColor'] = '#f56954';
        }

        $u = str_replace('"new', 'new', json_encode($u));
        $u = str_replace(')"', ')', $u);
        
        $users = $u;
        return view('pages.birthday', compact('users'));
    }

    public function tree($email = 'espring@yahoo.com') {

        $data['root'] = User::whereEmail($email)->first();
        
        if(!$data['root']) {

            if($email == 'espring@yahoo.com') return redirect('/');

            return redirect('pages/tree');
        }

        $data['breadcrumbs'] = $data['root']->tree_breadcrumbs();
        
        return view('pages.tree', $data);
    }
}
