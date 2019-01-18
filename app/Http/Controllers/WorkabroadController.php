<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkabroadController extends Controller
{
    public function princess($page = 1)
    {
        ini_set('max_execution_time', 0);

        $result = array();

        // this string are not applied for princess application
        $unwanted_strings = array('saudi arabia', 'kuwait', 'nigeria', 'domestic helper', 'engineer', 'nurse', 'beautician', 'architect', 'nail',
                                  'electrical', 'mechanic', 'driver', 'repairman', 'technician', 'heavy', 'advisor', 'programmer', 'accountant', 'teacher',
                                   'business', 'accounting', 'graphic', 'material', 'bangladesh', 'carpenters', 'videographer', 
                                   'photographer', 'welding', 'design', 'designer', 'gynecology', 'dermatologist', 'aesthetician', 'butler', 'salesman',
                                   'foreman', 'gender: male', 'marketing', 'clinical', 'butcher', 'welder', 'steel', 'fabricator',
                                   'backhoe', 'painter', 'aluminum', 'ceiling', 'therapist', 'duct man', 'building', 'autocad', 'sewing', 'plumber',
                                   'electrician', 'manicure', 'biology', 'draftswoman', 'tailor', 'caregiver', 'caretaker',
                                   'ignore', 'household', 'domestic', 'test by', 'seamstresses', 'sri lanka', 'maldives', 'oman');

        $html  = file_get_contents('https://www.workabroad.ph/list_specific_jobs.php?by_what=date&id=1&page='.$page);
        
        if (strpos($html, '<!-- Job Results for looping -->') === FALSE) {
               
            return redirect('/workabroad/princess');
        }

        $myArray = explode('<!-- Job Results for looping -->', $html);
        
        array_shift($myArray);

        foreach ($myArray as $key => $value) {
            
            $has_unwanted_string = false;

            $value = strtolower($value);
            
            $value = strip_tags($value);

            foreach ($unwanted_strings as $unwanted_string) {
                
                if (strpos($value, $unwanted_string) !== FALSE) {
                    
                    $has_unwanted_string = true;
                }
            }

            if(!$has_unwanted_string) {

                $value = preg_split('/\r\n|\r|\n/', $value);
                
                $final = "";

                foreach ($value as $kkk => $k_final) {
                   
                    $k_final = trim($k_final);

                    if(trim($k_final) != '') {

                        if($kkk == 7) {

                            $final .= '<h1>'.$k_final.'</h1>';

                        } else {

                            $final .= "<br/>".$k_final;
                        }
                    }
                }

                //$final = substr($final, 5);

                $result[] = $final;
            }
        }

        $data['page_title'] = 'Jobs List for Princess';

        $data['details'] = $result;

        $data['page'] = $page;

        return view('workabroad.princess', $data);
    }

    public function leo($page = 1)
    {
        ini_set('max_execution_time', 0);

        $result = array();

        // this string are not applied for leo application
        $unwanted_strings = array('saudi arabia', 'kuwait', 'qatar', 'bahrain', 'united arab emirates', 'nigeria');

        $html  = file_get_contents('https://www.workabroad.ph/list_specific_jobs.php?by_what=date&id=1&page='.$page);
        
        if (strpos($html, '<!-- Job Results for looping -->') === FALSE) {
               
            return redirect('/workabroad/leo');
        }

        $myArray = explode('<!-- Job Results for looping -->', $html);
        
        array_shift($myArray);

        foreach ($myArray as $key => $value) {
            
            $has_unwanted_string = false;

            $value = strtolower($value);
            
            $value = strip_tags($value);

            foreach ($unwanted_strings as $unwanted_string) {
                
                if (strpos($value, $unwanted_string) !== FALSE) {
                    
                    $has_unwanted_string = true;
                }
            }

            if(!$has_unwanted_string) {

                $value = preg_split('/\r\n|\r|\n/', $value);
                
                $final = "";

                foreach ($value as $kkk => $k_final) {
                   
                    $k_final = trim($k_final);

                    if(trim($k_final) != '') {

                        if($kkk == 7) {

                            $final .= '<h1>'.$k_final.'</h1>';

                        } else {

                            $final .= "<br/>".$k_final;
                        }
                    }
                }

                //$final = substr($final, 5);

                $result[] = $final;
            }
        }

        $data['page_title'] = 'Jobs List for Leo';

        $data['details'] = $result;

        $data['page'] = $page;

        return view('workabroad.leo', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('nothing to show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
