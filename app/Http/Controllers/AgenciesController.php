<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Agency;

class AgenciesController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }

    public function index()
    {
    	$data['page_title'] = 'Agency Lists';

        $data['agencies'] = Agency::all();

    	return view('agencies.index', $data);
	}

    public function create()
    {
        $data['page_title'] = 'Genrate Latest Agencies';

        return view('agencies.generate', $data);
    }

    public function store(Request $request)
    {
    	ini_set('max_execution_time', 300);

    	$count_before = Agency::all()->count();
    	
    	//delete all rows in agencies table
    	Agency::truncate();

    	$html  = file_get_contents('http://www.poea.gov.ph/cgi-bin/agList.asp?mode=all');
    	$start = strpos($html, '<br></font><font face="Arial" size="2"><b>');
    	$end   = strpos($html, '<br><p></font><html>', $start);

		$paragraph = substr($html, $start, $end-$start);
		
		$texts = explode('<br>',$paragraph);
		
		$agency_partial = array();

		$ctr = 0;

		foreach ($texts as $k => $v) {
			if($k == 0) continue;

			if($ctr == 8) {
				
				$invalid = array('Ceased Operations', 'Cancelled', 'Suspended (Document Processing)', 'Delisted', 'Denied Renewal', 'Forever Banned', 'Inactive', 'Expired', 'Revoked', 'Suspended', 'Cash Bond Withdrawn', 'Preventive Suspension');

				if(!in_array($agency_partial['status'], $invalid)) {
					
					if($agency_partial['status'] != 'Valid License') {
						echo $agency_partial['status'].'<br/>';
					}

					$invalid_email = array('none', 'na');

					if(!in_array($agency_partial['email'], $invalid_email)) {
						if($agency_partial['email']) {
							$agency = new Agency;

							$agency->name = $agency_partial['name'];
							$agency->address = $agency_partial['address'];
							$agency->telno = $agency_partial['telno'];
							$agency->email = $agency_partial['email'];
							$agency->website = $agency_partial['website'];
							$agency->contact_person = $agency_partial['contact_person'];
							$agency->status = $agency_partial['status'];
							$agency->validity = $agency_partial['validity'];

							$agency->save();
						}
					}
				}
				
				$ctr = 0;
				$agency_partial = array();
			}

			$tobesave = str_replace('&nbsp', '', html_entity_decode(strip_tags($v)));

			switch ($ctr) {
			    case 0:
			   		$agency_partial['name'] = trim($tobesave);
			        break;
			    case 1:
			    	$agency_partial['address'] = trim($tobesave);
			        break;
			    case 2:
			        $tobesave = trim(str_replace(' Tel No/s : ', '', $tobesave));
			        $agency_partial['telno'] = $tobesave;
			        break;
			    case 3:
			        $tobesave = strtolower(trim(str_replace(' Email Address : ', '', $tobesave)));
			        $agency_partial['email'] = $this->clean_poea_email($tobesave);
			        break;
			    case 4:
			        $tobesave = trim(str_replace(' Website : ', '', $tobesave));
			        $agency_partial['website'] = $tobesave;
			        break;
			    case 5:
			        $tobesave = trim(str_replace('Official Representative : ', '', $tobesave));
			        $agency_partial['contact_person'] = $tobesave;
			        break;
			    case 6:
			        $tobesave = trim(str_replace('Status : ', '', $tobesave));
			        $agency_partial['status'] = $tobesave;
			        break;
			    case 7:
			        $tobesave = trim(str_replace('License Validity : ', '', $tobesave));
			        $agency_partial['validity'] = $tobesave;
			        break;
			}

			$ctr++;
		}

		$count_after = Agency::all()->count();

        return redirect('/agencies')->with('success', $count_after.' agencies valid agencies now! Before its '.$count_before);
    }

    /*
		input email fresh from poea
		return false if not valid email
	 	return json format of emails if valid because some agencies have more than one email
    */
    private function clean_poea_email($email) {

    	$emails = array();

    	$email = str_replace('@y.c', "@yahoo.com", $email);

		$slash_email = explode("/", $email);
		$or_email    = explode(" or ", $email);
		$and_email    = explode("&", $email);

		if(count($slash_email) > 1) {
			
			foreach ($slash_email as $v) {

				$v = trim($v);

				if(filter_var($v, FILTER_VALIDATE_EMAIL)) {

					$emails[] = $v;			
				}
			}

		} elseif(count($and_email) > 1) {

			foreach ($and_email as $v) {

				$v = trim($v);

				if(filter_var($v, FILTER_VALIDATE_EMAIL)) {

					$emails[] = $v;	
				}
			}

		} elseif(count($or_email) > 1) {

			foreach ($or_email as $v) {

				$v = trim($v);

				if(filter_var($v, FILTER_VALIDATE_EMAIL)) {
	
					$emails[] = $v;			
				}
			}

		} elseif(filter_var($email, FILTER_VALIDATE_EMAIL)) {

			$emails[] = $email;	

		}

		if(empty($emails)) {
			return false;
		}

		return json_encode($emails);
    }
}
