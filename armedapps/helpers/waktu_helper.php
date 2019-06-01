<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function f_jam($time){
	if (strlen($time)==8) {
	$jam = substr($time, 0, 2);
    $menit = substr($time, 3, 3);
    $ex   = substr($time, 5, 2);
     if ($ex=='PM') {
    	switch ($jam) {
    		case '1':
    			 $j='13';
    			break;
    		case '2':
    			 $j='14';
    			break;
    		case '3':
    			 $j='15';
 				 break;
    		case '4':
    			 $j='16';
    			break;
    		case '5':
    			 $j='17';
    			break;
    		case '6':
    			 $j='18';
    			break;
    		case '7':
    			 $j='19';
    			break;
    		case '8':
    			 $j='20';
    			break;
    		case '9':
    			 $j='21';
    			break;
    		case '10':
    			 $j='22';
    			break;
    		case '11':
    			 $j='23';
    			break;
    		case '12':
    			 $j='12';
    			break;

    		default:
    			 $j='0';
    			break;
    	}
    	$result=$j.':'.$menit;
		return $result;

    }else{
    	$result=$jam.':'.$menit;
		return $result;


    }

	} else {
	$jam = substr($time, 0, 1);
    $menit = substr($time, 2, 2);
    $ex   = substr($time, 5, 2);
    if ($ex=='PM') {
    	switch ($jam) {
    		case '1':
    			 $j='13';
    			break;
    		case '2':
    			 $j='14';
    			break;
    		case '3':
    			 $j='15';
 				 break;
    		case '4':
    			 $j='16';
    			break;
    		case '5':
    			 $j='17';
    			break;
    		case '6':
    			 $j='18';
    			break;
    		case '7':
    			 $j='19';
    			break;
    		case '8':
    			 $j='20';
    			break;
    		case '9':
    			 $j='21';
    			break;
    		case '10':
    			 $j='22';
    			break;
    		case '11':
    			 $j='23';
    			break;
    		case '12':
    			 $j='12';
    			break;

    		default:
    			 $j='0';
    			break;
    	}
    	$result=$j.':'.$menit;
		return $result;

    }else{
    	$result='0'.$jam.':'.$menit;
		return $result;


    }
	}

   
    							


}