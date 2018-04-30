<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Storage;
use App\Applicant;
use App\Agency;

class SendAgencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'leo:sendagencies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Applicant send email to agencies';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $applicant = Applicant::where('status', 'open')->get()->first();
            
        $exists = Storage::disk('local')->exists('sendagencies.txt');
        
        if(!$applicant && $exists) {
            
            $contents = Storage::disk('local')->get('sendagencies.txt');
            Storage::disk('local')->delete('sendagencies.txt');  
            Storage::disk('local')->put('sendagencies_done.txt', $contents);
        }
        
        ini_set('max_execution_time', 10800); // 3 hrs

        if($applicant) {

            $last_emailed_agency = $applicant->last_emailed_agency;

            if(!$last_emailed_agency) {
                $last_emailed_agency = 0;
            }

            $agencies       = Agency::where('id', '>', $last_emailed_agency)->paginate(300);
            
            $last_agency    = Agency::orderBy('id', 'desc')->first();

            $last_agency_id = 0;

            foreach ($agencies as $agency) {

                $emails = json_decode($agency->email);
            
                foreach ($emails as $v) {

                    //Mail::to($v)->send(new PrincessSendAgiences($this->data));
                }

                $time = date("h:i:sa").' via build ';
                $exists = Storage::disk('local')->exists('sendagencies.txt');
                if(!$exists) {
                    Storage::disk('local')->put('sendagencies.txt', "\n".$time.' '.$agency->email.' ['.$agency->id.']');
                } else {
                    $contents = Storage::disk('local')->get('sendagencies.txt');
                    Storage::disk('local')->put('sendagencies.txt', $contents."\n".$time.' '.$agency->email.' ['.$agency->id.']');
                }

                $last_agency_id = $agency->id;

                if($last_agency->id == $agency->id) {
                    $applicant->status = 'close';
                    $applicant->last_emailed_agency = 0;
                } else {
                    $applicant->last_emailed_agency = $agency->id;  
                }

                $applicant->save();
            }

            $applicant->send_end = date("Y-m-d").' '.date("H:i:s");
            
            $applicant->save();
        }
    }
}
