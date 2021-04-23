<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ReportModel extends CI_Model {

    public function fetchReport( $dateFrom, $dateTo, $offset, $limit ){

        $sql = "SELECT COUNT(*) as count FROM `visit_details` 
                WHERE `visit_date` 
                BETWEEN STR_TO_DATE( '$dateFrom', '%d-%b-%Y' ) AND STR_TO_DATE( '$dateTo', '%d-%b-%Y' )";
        $query = $this->db->query( $sql );
        $count = $query->result();
        $count = $count[0]->count;

        $sql =  "SELECT DATE_FORMAT(v.`visit_date`, '%d %b %Y') AS visitdate ,p.`reg_card_number`,p.`name`,p.`age`,p.`gender`
                FROM `patients_record` p 
                INNER JOIN 
                `visit_details` v 
                ON p.`id` = v.`patients_id` 
                WHERE v.`visit_date` 
                BETWEEN STR_TO_DATE( '$dateFrom', '%d-%b-%Y' ) AND STR_TO_DATE( '$dateTo', '%d-%b-%Y' ) 
                ORDER BY v.`visit_date` DESC LIMIT $offset,$limit";
            // echo $sql;
        $query = $this->db->query( $sql );
        // return $query->result();
        return array( $count, $query );

    }
    function test(){
        $sql = "SELECT COUNT(*) as count FROM `visit_details` WHERE `visit_date` BETWEEN STR_TO_DATE( '30-Mar-2021', '%d-%b-%Y' ) AND STR_TO_DATE( '31-Mar-2021', '%d-%b-%Y' )";
        $query = $this->db->query( $sql );
        $count = $query->result();
        $count = $count[0]->count;
        echo $count;    
    }

    public function fetchPatientsDetails(){
        $sql =  "SELECT `reg_card_number`,`name`,`age`,`gender`,`contact_number`,DATE_FORMAT(`reg_date`, '%d %b %Y') AS reg_date FROM `patients_record` ORDER BY `name`";
        $query = $this->db->query( $sql );
        return $query->result();
    }

    public function fetchReport2( $dateFrom, $dateTo ){


        $sql =  "SELECT DATE_FORMAT(v.`visit_date`, '%d %b %Y') AS visitdate ,p.`reg_card_number`,p.`name`,p.`age`,p.`gender`
                FROM `patients_record` p 
                INNER JOIN 
                `visit_details` v 
                ON p.`id` = v.`patients_id` 
                WHERE v.`visit_date` 
                BETWEEN STR_TO_DATE( '$dateFrom', '%d-%b-%Y' ) AND STR_TO_DATE( '$dateTo', '%d-%b-%Y' ) 
                ORDER BY v.`visit_date` DESC";
            // echo $sql;
        $query = $this->db->query( $sql );
        return $query->result();
        // return array( $count, $query );

    }
}
/*SELECT DATE_FORMAT(v.`visit_date`, '%d %b %Y') AS visitdate ,p.`reg_card_number`,p.`name`,p.`age`,p.`gender`
FROM `patients_record` p INNER JOIN `visit_details` v ON p.`id` = v.`patients_id` WHERE v.`visit_date` BETWEEN '2021-03-01' AND '2021-03-31' ORDER BY v.`visit_date` DESC



set @counter=0;
select id,@counter:=@counter+1 as IncrementingValuebyOne from patients_record;

SELECT @counter:=@counter+1 as slno, DATE_FORMAT(v.`visit_date`, '%d %b %Y') AS visitdate ,p.`reg_card_number`,p.`name`,p.`age`,p.`gender`
                FROM `patients_record` p 
                INNER JOIN 
                `visit_details` v 
                ON p.`id` = v.`patients_id` 
                WHERE v.`visit_date` 
                BETWEEN STR_TO_DATE( '30-Mar-2021', '%d-%b-%Y' ) AND STR_TO_DATE( '31-Mar-2021', '%d-%b-%Y' ) 
                ORDER BY v.`visit_date` DESC;
*/