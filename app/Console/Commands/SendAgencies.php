<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Storage;
use App\Applicant;
use App\Agency;
use Mail;
use App\Mail\PrincessSendAgiences;


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
     * To run this command make sure you have.
     * - in applicant table must have 1 status open, the target applicant
     * - in storage/app/sendagencies.txt not exist
     * - in cmd run php artisan leo:sendagencies
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
        
        setPHPINItoMax();

        if($applicant) {

            $agencies_limit = 100;

            $last_emailed_agency = $applicant->last_emailed_agency;

            if(!$last_emailed_agency) {
                $last_emailed_agency = 0;
            }

            $agencies       = Agency::where('id', '>', $last_emailed_agency)->paginate($agencies_limit);
            
            $last_agency    = Agency::orderBy('id', 'desc')->first();

            $last_agency_id = 0;

            $data['applicant'] = $applicant;

            foreach ($agencies as $key => $agency) {

                $emails = json_decode($agency->email);
            
                foreach ($emails as $v) {

                    Mail::to($v)->send(new PrincessSendAgiences($data));
                }

                $time = date("h:i:sa").' ';
                $exists = Storage::disk('local')->exists('sendagencies.txt');
                if(!$exists) {
                    Storage::disk('local')->put('sendagencies.txt', "\n".$time.' '.$agency->email.' ['.$agency->id.']');
                } else {
                    $contents = Storage::disk('local')->get('sendagencies.txt');
                    Storage::disk('local')->put('sendagencies.txt', $contents."\n".$time.' '.$agency->email.' ['.$agency->id.']');
                }

                $percent = (($key+1)/$agencies->count()) * $agencies_limit;

                $this->info($percent.'% '.$time.' ['.$agency->id.'] '.$agency->email);

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
