<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;
use Mail;

class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'List of Applicants';

        $data['applicants'] = Applicant::all();

        return view('applicants.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Create Applicant';

        return view('applicants.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:applicants',
        ]);

        $applicant = new Applicant;

        $applicant->name = $request->input('name');
        $applicant->email = $request->input('email');
        $applicant->status = 'close';
        
        $applicant->save();

        return redirect('/applicants')->with('success', 'Applicant Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        $data['applicant'] = $applicant;

        $data['page_title'] = 'Update Applicant';

        return view('applicants.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:applicants,email,'.$applicant->id,
        ]);

        $applicant->email = $request->input('email');
        $applicant->name = $request->input('name');

        $applicant->save();

        return redirect('/applicants')->with('success', 'Applicant Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        $applicant->delete();
        
        return redirect('/applicants')->with('success', 'Applicant Removed');
    }

    public function send(Applicant $applicant)
    {
        $data = array(
            'name'=>$applicant->name,
            'email'=>'support@virneza.com',
            'subject'=>'subject sample test',
            'bodymessage'=>'bodymessage sample test',
        );

        $data['emails'] = array('leiyu876@yahoo.com', 'leiyu876@gmail.com', 'daloygwapo@gmail.com');
        
        //use laravel queue to send email in the background
        ini_set('max_execution_time', 300);

        Mail::send('email.resume.01', $data, function($message) use ($data) {    
            $message->from($data['email'], $data['name']);
            $message->bcc($data['emails']);
            $message->subject($data['subject']);  
        });
        
        $data['page_title'] = 'User Lists';

        return redirect('/applicants')->with('success', 'Applicant send successfully');
    }
}
