<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkabroadController extends Controller
{
    public function princess()
    {
        ini_set('max_execution_time', 300);

        $result = array();

        // this string are not applied for princess application
        $unwanted_strings = array('saudi arabia', 'kuwait', 'nigeria', 'domestic helper', 'engineer', 'nurse', 'beautician', 'architect', 'nail',
                                  'electrical', 'mechanic', 'driver', 'repairman', 'technician', 'heavy', 'advisor', 'programmer', 'accountant', 'teacher',
                                   'business');

        for($page = 1; $page<=10; $page++) {

            $html  = file_get_contents('https://www.workabroad.ph/list_specific_jobs.php?by_what=date&id=1&page='.$page);
        
            $myArray = explode('<!-- Job Results for looping -->', $html);
            

            array_shift($myArray);

            foreach ($myArray as $key => $value) {
                
                $has_unwanted_string = false;

                $value = strtolower($value);
                
                foreach ($unwanted_strings as $unwanted_string) {
                    
                    if (strpos($value, $unwanted_string) !== FALSE) {
                        
                        $has_unwanted_string = true;
                    }
                }


                if(!$has_unwanted_string) {

                    $value = strip_tags($value);

                    $value = preg_split('/\r\n|\r|\n/', $value);
                    
                    $final = "";

                    foreach ($value as $k_final) {
                       
                        $k_final = trim($k_final);

                        if(trim($k_final) != '') {

                            $final .= "\n".$k_final;
                        }
                    }

                    $result[] = $final;
                }
            }
        }

        dd($result);
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
