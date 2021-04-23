<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ReportModel extends CI_Model {


    public function fetchPatientsDetails(){
        $sql =  "SELECT `id`,`reg_card_number`,`name`,`age`,`gender`,`contact_number`,DATE_FORMAT(`reg_date`, '%d %b %Y') AS reg_date FROM `patients_record` ORDER BY `name`";
        $query = $this->db->query( $sql );
        return $query->result();
    }

    public function fetchReport( $dateFrom, $dateTo ){


        $sql =  "SELECT DATE_FORMAT(v.`visit_date`, '%d %b %Y') AS visitdate ,p.`reg_card_number`,p.`name`,p.`age`,p.`gender`
                FROM `patients_record` p 
                INNER JOIN 
                `visit_details` v 
                ON p.`id` = v.`patients_id` 
                WHERE v.`visit_date` 
                BETWEEN STR_TO_DATE( '$dateFrom', '%d-%b-%Y' ) AND STR_TO_DATE( '$dateTo', '%d-%b-%Y' ) 
                ORDER BY v.`visit_date` DESC";

        $query = $this->db->query( $sql );
        return $query->result();
    }
}
