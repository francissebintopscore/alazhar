<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Helper function to check whether the url slug already exists
 */

if(!function_exists('auCommon_converDate')){
    function auCommon_converDate($date=''){
        

        if( !$date )
        	return;

        $date = date_create_from_format( "d-M-Y", $date );
        $date = date_format($date,"Y-m-d");

        return $date;

    }
}
if(!function_exists('auCommon_revertDate')){
    function auCommon_revertDate($date=''){
        

        if( !$date )
            return;

        if( $date == '0000-00-00' )
            return;
        $date = date_create_from_format( "Y-m-d", $date );
        $date = date_format( $date,"d-M-Y" );

        return $date;

    }
}
if(!function_exists('auCommon_dataSanitize')){
    function auCommon_dataSanitize($data){
        

    	$data = html_escape($data);
    	$data = htmlspecialchars($data);
        return $data;

    }
}
if(!function_exists('auCommon_intSanitize')){
    function auCommon_intSanitize($data){
        

    	$data = html_escape($data);
    	$data = htmlspecialchars($data);
    	$data = intval($data);
        return $data;

    }
}
if(!function_exists('auCommon_dateSanitize')){
    function auCommon_dateSanitize($data){
        

    	$data = html_escape($data);
    	$data = htmlspecialchars($data);
    	$data = auCommon_converDate($data);
        return $data;

    }
}

if(!function_exists('auCommon_statusColor')){
    function auCommon_statusColor($data){
        

        $data = intval($data);

        if( $data == 0){
            return '#e4b4b4cc;';
        }
        return 'none;';

    }
}
if(!function_exists('auCommon_statusTest')){
    function auCommon_statusTest($data){
        

        $data = intval($data);

        if( $data == 0 ){
            return 'Cancelled';
        }
        else{
            return 'Active';
        }

    }
}

if(!function_exists('auCommon_fetchPrintingCode')){
    function auCommon_fetchPrintingCode( $print ){
        

        if( gettype($print)== 'array' && count($print)==0 )
            return;

        if ( in_array("idcard", $print) && !in_array("coverPage", $print) ){
            return 1;
        }
        elseif( !in_array("idcard", $print) && in_array("coverPage", $print)){
            return 2;
        }
        elseif( in_array("idcard", $print) && in_array("coverPage", $print)){
             return 3;
        }
        else{
            return;
        }

    }
}