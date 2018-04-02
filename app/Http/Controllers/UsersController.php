<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;
use DB;
use Image;
use Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'User Lists';

        $data['users'] = User::all();

        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Create User';

        $data['users'] = User::select(
            DB::raw("CONCAT(last_name,', ',first_name) AS name"), 'id')
            ->orderBy('name')
            ->pluck('name', 'id');
        
        return view('users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'gender' => 'min:1|max:1',
            'marital_status' => 'min:1|max:1',
            'password' => 'required|confirmed',
            'photo' => 'sometimes|image'
        ]);

        $user = new User;

        $user->email = $request->input('email');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->middle_name = $request->input('middle_name');
        $user->nick_name = $request->input('nick_name');
        $user->birthday = $request->input('birthday');
        $user->gender = $request->input('gender');
        $user->marital_status = $request->input('marital_status');
        $user->nationality = $request->input('nationality');
        $user->religion = $request->input('religion');
        $user->phone = $request->input('phone');
        $user->degree = $request->input('degree');
        $user->married_to = $request->input('married_to');
        $user->married_date = $request->input('married_date');
        $user->color_code = $request->input('color_code');
        $user->home_address = $request->input('home_address');
        $user->current_address = $request->input('current_address');
        $user->occupation = $request->input('occupation');
        $user->company_name = $request->input('company_name');
        $user->company_address = $request->input('company_address');
        $user->company_phone = $request->input('company_phone');
        $user->password = Hash::make($request->input('password'));

        if($request->hasFile('photo')) {
            
            $image = $request->file('photo');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/primary/'.$filename);
            Image::make($image)->save($location);

            $user->photo = $filename;
        }
        
        $user->save();

        return redirect('/users')->with('success', 'User Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::find($id);

        $data['users'] = User::select(
            DB::raw("CONCAT(last_name,', ',first_name) AS name"), 'id')
            ->orderBy('name')
            ->pluck('name', 'id');

        $data['page_title'] = 'Update User';

        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request, [
            'email' => 'required|unique:users,email,'.$user->id,
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required',
            'gender' => 'min:1|max:1',
            'marital_status' => 'min:1|max:1',
            'photo' => 'sometimes|image'
        ]);

        $user->email = $request->input('email');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->middle_name = $request->input('middle_name');
        $user->nick_name = $request->input('nick_name');
        $user->birthday = $request->input('birthday');
        $user->gender = $request->input('gender');
        $user->marital_status = $request->input('marital_status');
        $user->nationality = $request->input('nationality');
        $user->religion = $request->input('religion');
        $user->phone = $request->input('phone');
        $user->degree = $request->input('degree');
        $user->married_to = $request->input('married_to');
        $user->married_date = $request->input('married_date');
        $user->color_code = $request->input('color_code');
        $user->home_address = $request->input('home_address');
        $user->current_address = $request->input('current_address');
        $user->occupation = $request->input('occupation');
        $user->company_name = $request->input('company_name');
        $user->company_address = $request->input('company_address');
        $user->company_phone = $request->input('company_phone');

        if($request->hasFile('photo')) {
            
            $image = $request->file('photo');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/primary/'.$filename);
            Image::make($image)->save($location);

            if($user->photo) {
                Storage::delete('primary/'.$user->photo);
            }
            
            $user->photo = $filename;
        }

        $user->save();

        $user_partner = User::find($user->married_to);

        if($user_partner) {
            $user_partner->married_to = $id;
            $user_partner->save();
        }

        return redirect('/users')->with('success', 'User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if($user->photo) {
            Storage::delete('primary/'.$user->photo);
        }

        $user->delete();
        
        return redirect('/users')->with('success', 'User Removed');
    }

    public function change_pass($id)
    {
        $data['page_title'] = 'Change Password';

        $data['user'] = User::find($id);

        return view('users.change_pass', $data);
    }

    public function change_pass_save(Request $request, $id)
    {
        $password_current = $request->input('password_current');

        $user   = User::find($id);
        
        $hasher = app('hash');
        
        if (!$hasher->check($password_current, $user->password)) {

            Session::flash('error', 'Incorrect current password.');

            return redirect('users/change_pass/'.$id);
        }

        $password              = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');

        if($password != $password_confirmation) {

            Session::flash('error', 'New password did not match.');

            return redirect('users/change_pass/'.$id);
        }

        $user->password = Hash::make($password);

        $user->save();

        return redirect('/users')->with('success', 'User password successfully change.');
    }
}
