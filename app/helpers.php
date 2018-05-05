<?php
/*
	database datetime to human friendly view 
*/
if (! function_exists('dateDBtoHuman')) {

	function dateDBtoHuman($date) {
    
        return date("F d, Y", strtotime($date));
    }
}

/*
	generate password in creating user
*/
function randomPassword() {
    $alphabet = 'abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ123456789';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 4; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function displayImage($image) {
    return $image ? $image : 'images/primary/noimage.png';
}

function addMinutesToDateTime($datetime_start, $minutes) {

    if(!$datetime_start) return '';
    
    $time = new DateTime($datetime_start);
    $time->add(new DateInterval('PT' . $minutes . 'M'));

    return $time->format('Y-m-d H:i:s');
}

function setPHPINItoMax() {
    ini_set('upload_max_filesize', '3000M'); // 3 gb
    ini_set('post_max_size', '3000M'); // 3 gb
    ini_set('max_input_time', 10800); // 3 hrs
    ini_set('max_execution_time', 10800); // 3 hrs
}