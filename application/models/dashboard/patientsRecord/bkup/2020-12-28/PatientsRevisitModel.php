<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PatientsRevisitModel extends CI_Model {


    public function fetchDepartments(){

        $this->db->select('*');
        $this->db->from('department');
        $this->db->order_by('dept_name');
        $query = $this->db->get();
        // print_r($query);
        return $query->result();

    }

    public function patientSearchAjax( $searchKey, $searchBy, $isDate = false ){

        if( !$searchKey && !$searchBy ){
            return;
        }
        $this->db->select('*');
        $this->db->from('patients_record');

        if( $isDate ){
            $this->db->where('DATE(patients_record.'.$searchBy.')', $searchKey);
        }
        else{
            $this->db->where('patients_record.'.$searchBy, $searchKey);
        }
        $this->db->where('patients_record.status', 1);//
        $this->db->join('category', 'category.id = patients_record.category','inner');//
        $query = $this->db->get();
        // $query = $this->db->get_compiled_select();
        return $query->result();
        // print_r($query);
        // echo "<br>";

    }

    public function patientOldVisitDetailsAjax( $patientid, $selects='*', $offset=10, $limit=10 ){

        if( !$patientid ){
            return;
        }
        $this->db->select($selects);
        $this->db->from('visit_details');
        $this->db->where('patients_id', $patientid);
        $this->db->where('visit_details.status >=', 0);//
        $this->db->join('department', 'department.id = visit_details.department_id');//
        $this->db->limit( $limit, $offset );
        $this->db->order_by('visit_details.visit_date', 'DESC');
        $query = $this->db->get();
        return $query->result();

    }

    // public function updateRevisitDetails( $visitId, $data ){


    //     $this->db->where('id', $visitId);
    //     $this->db->update('mytable', $data);

    // }
}