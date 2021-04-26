<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ReportModel extends CI_Model {


    public function fetchPatientsDetails(){
        // $sql =  "SELECT `id`,`reg_card_number`,`name`,`age`,`gender`,`contact_number`,DATE_FORMAT(`reg_date`, '%d %b %Y') AS reg_date FROM `patients_record` ORDER BY `name`";
        $sql =  "SELECT p.`id`,p.`reg_card_number`,p.`name`,DATE_FORMAT(p.`dob`, '%d %b %Y') AS dob,
        p.`age`,p.`gender`,p.`blood_group`,p.`house`,
        p.`Place`,p.`post_office`,p.`district`,
        p.`state`,p.`pin`,p.`contact_number`,
        p.`parent_gurdian_name`,p.`emergency_contact`,c.`cat_name`,
        DATE_FORMAT(p.`reg_date`, '%d %b %Y') as reg_date,p.`remarks`
        FROM `patients_record` p 
        INNER JOIN `category` c
        ON
        c.`id` = p.`category`
        ORDER BY p.`name`";
        $query = $this->db->query( $sql );
        return $query->result();
    }

    public function fetchReport( $dateFrom, $dateTo ){


        $sql =  "SELECT DATE_FORMAT(v.`visit_date`, '%d %b %Y') AS visitdate ,
                d.`dept_name`,
                p.`reg_card_number`,
                p.`name`,p.`age`,
                p.`gender`
                FROM `patients_record` p 
                INNER JOIN 
                `visit_details` v 
                ON p.`id` = v.`patients_id` 
                INNER JOIN
                `department` d
                ON v.`department_id` = d.`id`
                WHERE v.`visit_date` 
                BETWEEN STR_TO_DATE( '$dateFrom', '%d-%b-%Y' ) AND STR_TO_DATE( '$dateTo', '%d-%b-%Y' ) 
                ORDER BY v.`visit_date` DESC, p.`name`";

        $query = $this->db->query( $sql );
        return $query->result();
    }
}
