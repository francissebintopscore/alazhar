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



        if( $searchBy=='dob' ){

            if (preg_match("/(0[1-9]|[1-2][0-9]|3[0-1])-(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec)\b-[0-9]{4}$/",$searchKey)){
                $searchKey = auCommon_dateSanitize( $searchKey );

                // $this->db->select('*');
                $this->db->select('patients_record.*,category.id as cat_id,category.cat_name');
                $this->db->from('patients_record');
                $this->db->where('DATE(patients_record.'.$searchBy.')', $searchKey);
                $this->db->where('patients_record.status', 1);//
                $this->db->join('category', 'category.id = patients_record.category','inner');//
                $query = $this->db->get();
                // $query = $this->db->get_compiled_select();
                return $query->result();
                // print_r($query);
            } 
            else{
                $patientInformation = array(
                                        'error' => true,
                                        'msg'   =>'Date format incorrect! must be like 01-Jan-2020'
                                    );

            }
        }

        elseif( $searchBy=='reg_card_number' ){
            // $this->db->select('*');
            $this->db->select('patients_record.*,category.id as cat_id,category.cat_name');
            $this->db->from('patients_record');
            $this->db->where('patients_record.'.$searchBy, $searchKey);
            $this->db->where('patients_record.status', 1);//
            $this->db->join('category', 'category.id = patients_record.category','inner');//
            $query = $this->db->get();
            // $query = $this->db->get_compiled_select();
            return $query->result();
            // print_r($query);
            // echo "<br>";
        }
        elseif( $searchBy=='name' || $searchBy=='contact_number' ){

            // $this->db->select('*');
            $this->db->select('patients_record.*,category.id as cat_id,category.cat_name');
            $this->db->from('patients_record');
            $this->db->like('patients_record.'.$searchBy, $searchKey);
            $this->db->where('patients_record.status', 1);//
            $this->db->join('category', 'category.id = patients_record.category','inner');//
            $query = $this->db->get();
            // $query = $this->db->get_compiled_select();
            return $query->result();
            // print_r($query);
            // echo "<br>";

        }

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