<?php

/*
	database datetime to human friendly view 
*/
if (! function_exists('dateDBtoHuman')) {

	function dateDBtoHuman($date) {
    
        return date("F d, Y", strtotime($date));
    }
}