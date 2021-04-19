<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PatientsRecordsModel extends CI_Model {


    public function fetchNextRegNo(){

        $regNo = '';
        $year = date('y');
        $this->db->select('reg_card_number');
        $this->db->from('patients_record');
        $this->db->like('reg_card_number', $year, 'after' );
        $this->db->order_by('reg_card_number', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        foreach ( $query->result() as $row )
        {
            $regNo = $row->reg_card_number;
        }
        if( !$regNo){
            return regno_firstRegNo();
        }
        return regno_getNextRegNo($regNo);

    }
    /*The below function is called from other controllers also,so modify carefully..*/
    public function get_patientInformation( $regNo, $selects='*' ){

        if( !$regNo ){
            return;
        }
        $this->db->select($selects);
        $this->db->from('patients_record');
        $this->db->where('reg_card_number', $regNo);
        $this->db->where('patients_record.status', 1);//
        $this->db->join('category', 'category.id = patients_record.category');//
        $query = $this->db->get();
        return $query->result();

    }

    public function getPatientRegno( $id, $selects='reg_card_number' ){

        if( !$id ){
            return;
        }
        $this->db->select($selects);
        $this->db->from('patients_record');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result();

    }

    public function checkRegNoAlreadyExists( $regNo ){

        if( !$regNo ){
            return;
        }
        $this->db->select('*');
        $this->db->from('patients_record');
        $this->db->where('reg_card_number', $regNo);
        $query = $this->db->get();
        if( $query->num_rows() > 0 ){
            return true;
        }
        else{
            return false;
        }

    }

    public function updatePatientRecord( $details, $where, $table, $id=0 ){

        if( !$details && !$table)
            return;

        if( gettype($where)== 'array' && count($where)==0 )
            return;

        if( gettype($where)== 'string' && !$where )
            return;

        if( $id==0 )
            return;

        $this->db->where( $where, $id);
        $this->db->update($table, $details);

        $error = $this->db->error();
        
        if( $error['code'] ==1062 ){
            echo '<script>alert("Update failed!. Register number already taken.");</script>';
            log_message('error',$error['message']);
            return false;
        }

        if( $error['code'] > 0 ){
            echo '<script>alert("Some error occured please contact System administrator!");</script>';
            log_message('error',$error['message']);
            return false;
        }


        return true;

    }

    public function fetchCategory(){

        $this->db->select('*');
        $this->db->from('category');
        $this->db->where( 'status', 1);
        $query = $this->db->get();
        return $query->result();

    }

    public function insertPatientRecord( $data, $table ){

        $this->db->insert( $table, $data);

        $error = $this->db->error();
        if( $error['code'] > 0 ){
            echo '<script>alert("Some error occured please contact System administrator!");</script>';
            log_message('error',$error['message']);
            return false;
        }
        else{
            echo '<script>alert("Record inserted sucessfully!");</script>';
            return true;
        }
        

    }
   
}