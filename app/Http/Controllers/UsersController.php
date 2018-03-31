<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;

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
        $data['page_title'] = 'Update User';

        $data['user'] = User::find($id);

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

        $user->save();

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
        //
    }
}
