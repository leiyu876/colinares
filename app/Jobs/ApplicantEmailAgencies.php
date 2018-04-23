<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Mail\PrincessSendAgiences;
use Mail;
use Storage;
use DateTime;
use DateInterval;
use App\Agency;

class ApplicantEmailAgencies implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;

        //$time = date("h:i:sa").' via build ';
        //Storage::disk('local')->put('construct.txt', $time.'<br/>');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $applicant = $this->data['applicant'];
        if(!$applicant->last_emailed_agency) {
            Storage::disk('local')->delete('handle.txt');  
        }
        

        ini_set('max_execution_time', 3600); // 1 hr

        $last_agency_id = 0;

        foreach ($this->data['agencies'] as $agency) {
            
            $emails = json_decode($agency->email);
            
            foreach ($emails as $v) {

                Mail::to($v)->send(new PrincessSendAgiences($this->data));
            }

            $time = date("h:i:sa").' via build ';
            $exists = Storage::disk('local')->exists('handle.txt');
            if(!$exists) {
                Storage::disk('local')->put('handle.txt', "\n".$time.' '.$agency->email.' ['.$agency->id.']');
            } else {
                $contents = Storage::disk('local')->get('handle.txt');
                Storage::disk('local')->put('handle.txt', $contents."\n".$time.' '.$agency->email.' ['.$agency->id.']');
            }

            $last_agency_id = $agency->id;
        }

        $send_end = date("Y-m-d").' '.date("H:i:s");
        
        $last_agency = Agency::orderBy('id', 'desc')->first();

        $applicant->status = 'close';
        $applicant->send_end = $send_end;
        $applicant->last_emailed_agency = $last_agency->id == $last_agency_id ? 0 : $last_agency_id;
        $applicant->save();

        
    }
}
