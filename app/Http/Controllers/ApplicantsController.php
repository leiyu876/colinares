<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;
use Mail;
use App\Jobs\ApplicantEmailAgencies;
use Storage;
use App\Agency;

//only to render the mailables in browser
use App\Mail\PrincessSendAgiences;

class ApplicantsController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'List of Applicants';

        $data['applicants'] = Applicant::all();

        $data['applicant_running'] = Applicant::where('status', 'open')->get()->first();

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
            'resume' => 'required|mimes:doc,pdf,docx|max:10000'
        ]);
        
        $applicant = new Applicant;

        $applicant->name = $request->input('name');
        $applicant->email = $request->input('email');
        $applicant->status = 'close';
        
        if($request->hasFile('resume')) {
            
            $file = $request->file('resume');
            $path = Storage::disk('public')->put('files/resumes', $file);

            
            //$filename = time().'.'.$file->getClientOriginalExtension();
            //Storage::disk('local')->put('files/resumes/'.$filename, $file);

            $applicant->resume = $path;
        }

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
            'resume' => 'required|mimes:doc,pdf,docx|max:10000'
        ]);

        $applicant->email = $request->input('email');
        $applicant->name = $request->input('name');

        if($request->hasFile('resume')) {
            
            $file = $request->file('resume');
            $path = Storage::disk('public')->put('files/resumes', $file);
            
            if($applicant->resume) {
                Storage::disk('public')->delete($applicant->resume);
            }
            
            $applicant->resume = $path;
        }

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
        if($applicant->resume) {
            Storage::disk('public')->delete($applicant->resume);
        }

        $applicant->delete();
        
        return redirect('/applicants')->with('success', 'Applicant Removed');
    }

    public function send(Applicant $applicant)
    {
        $applicant->status = 'open';
        $applicant->send_start = date("Y-m-d").' '.date("H:i:s");
        $applicant->save();

        return redirect('/applicants')->with('success', 'Applicant send successfully');
    }

    // manually copy the url to view the mail you want
    public function viewmailable()
    {
        //change the applicant id
        $data['applicant'] = Applicant::find(1);

        //$data['emails'] = array('leiyu876@yahoo.com', 'leiyu876@gmail.com', 'daloygwapo@gmail.com', 'Rodolfo.Dona@satorp.com', 'tjnuneza@gmail.com');
        $data['emails'] = array('leiyu876@yahoo.com', 'leiyu876@gmail.com', 'daloygwapo@gmail.com');

        return new PrincessSendAgiences($data);
    }
}
