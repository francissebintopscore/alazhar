<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Helper function to check whether the url slug already exists
 */
if(!function_exists('regno_getClientName')){
    function regno_getClientName(){
        
        return 'alazhar';

    }
}
if(!function_exists('regno_getNextRegNo')){
    function regno_getNextRegNo( $regNo='' ){
        
        if( !$regNo )
        	return;
        
        if( strlen($regNo) != 6)
        	die('For Al-Azhar the Registration number length should be 6');

        // $regNo = 'A99999';//$regNo[0];
        ++$regNo;
        // if( substr($regNo, -1)==='0' ){
        if( substr($regNo, 1)==='00000' ){
        	++$regNo;
        }
        return $regNo;

    }
}

if(!function_exists('regno_getRegNoFormat')){
    function regno_getRegNoFormat(){
        
       return "/^[A-Z]{1}[0-9]{5}$/";

    }
}

// $a = 'A999999';
// $len = strlen($a);
// $zeros = '';
// for($i=0;$i<$len;$i++){
//     $zeros .= '0';
// }
// ++$a;
// echo "<br>".substr($a,1);
// if( substr($a,1)===$zeros ){
//     ++$a;
// }

// echo "<br>".$a;
// echo "<br>".substr($a,1);