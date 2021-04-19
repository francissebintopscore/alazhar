<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Revisit extends CI_Controller {

	public function __construct() {
            parent::__construct();
            $this->load->model('dashboard/patientsRecord/PatientsRecordsModel', 'precord');
            $this->load->model('dashboard/patientsRecord/PatientsRevisitModel', 'revisit');
            $this->load->helper(array('form', 'url', 'regno','auCommon'));
        	$this->load->library('form_validation');
        	header("Cache-Control: no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
    }
	public function index()
	{
        $dep = $data['departments'] = $this->revisit->fetchDepartments();

        if ($this->form_validation->run('insertPatientsRevisitRecord') == FALSE){
            // print_r($dep);
            $this->session->set_flashdata('message', validation_errors());
            $this->session->set_flashdata('msg_class', 'alert-danger');

            $this->load->view('dashboard/patientsRecord/revisit', $data);
        }
        else{
            $patientid = 0;
            $visitDate = auCommon_dateSanitize($this->input->post('visitDate'));
            $regNo = auCommon_dataSanitize($this->input->post('regNo'));
            $department = auCommon_intSanitize($this->input->post('department'));
            $remarks = auCommon_dataSanitize($this->input->post('remarks'));

            $patientInformation = $this->precord->get_patientInformation( $regNo,'patients_record.id' );
            if( count( $patientInformation )>0 && isset( $patientInformation[0]->id ) ){ 
                $patientid = $patientInformation[0]->id;


                $reVisitDetails = array(

                            'patients_id'   =>  $patientid,
                            'visit_date '   =>  $visitDate,
                            'department_id' =>  $department,
                            'remarks'       =>  $remarks
                );

                $this->precord->insertPatientRecord( $reVisitDetails, 'visit_details');
            }
            else{
                $this->session->set_flashdata('message', '<strong>Error!</strong> No patient information found');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            
            redirect('dashboard/patientsRecord/Revisit/','refresh');
        }
    }
    public function patientSearchAjax( $searchBy='dob', $searchKey='19-Nov-20207')/*searchBy,searchKey=>checking purpose*/
    {
        // echo $searchKey;
        // echo $searchBy;
        // $patientInformation = json_encode( $this->revisit->patientSearchAjax( $searchKey, $searchBy ) );
        // print_r($patientInformation);
        $patientInformation = '';
        $searchKey = html_escape($this->input->post('searchKey'));
        $searchBy = html_escape($this->input->post('searchBy'));

        if( !$searchKey ){
            return;
        }
        if( !$searchBy ){
            $searchBy = 'reg_card_number';
        }

        if( $searchBy=='dob' ){

            if (preg_match("/(0[1-9]|[1-2][0-9]|3[0-1])-(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec)\b-[0-9]{4}$/",$searchKey)){
                $searchKey = auCommon_dateSanitize( $searchKey );

                $patientInformation = json_encode( $this->revisit->patientSearchAjax( $searchKey, $searchBy, true ) );
            } 
            else{
                $patientInformation = json_encode( array(
                                        'error' => true,
                                        'msg'   =>'Date format incorrect! must be like 01-Jan-2020'
                                    ) );

            }
        }
        else{
            $patientInformation = json_encode( $this->revisit->patientSearchAjax( $searchKey, $searchBy ) );
        }

        
        
        echo $patientInformation;
    }

    public function patientOldVisitDetailsAjax( $regNo='D00041'){/*regNo=>checking purpose*/

        $patientid = 0;
        $result = '';
        $regNo = html_escape($this->input->post('regNo'));
        $offset = html_escape($this->input->post('offset'));
        $limit = html_escape($this->input->post('limit'));

        $patientInformation = $this->precord->get_patientInformation( $regNo,'patients_record.id' );
        
        if( count( $patientInformation )>0 && isset( $patientInformation[0]->id ) ){ 
            $patientid = $patientInformation[0]->id;
        }

        if( $patientid!=0 ){

            $selects = 'visit_details.visit_id,
                        visit_details.department_id,
                        department.dept_name,
                        visit_details.visit_date,
                        visit_details.remarks,
                        visit_details.status';
            $details = $this->revisit->patientOldVisitDetailsAjax( $patientid, $selects, $offset, $limit );



            foreach ($details as $key => $value) {
                $date = explode( ' ' , $value->visit_date);

                $color = auCommon_statusColor( $value->status );
                $style = "style=\"background-color:$color\"";

                $result .= '<tr data-visitId="' . $value->visit_id . '" '.$style.'>';
                $result .= '<td>'.($key+1).'</td>';
                $result .= '<td data-deptid="' . $value->department_id . '">'.$value->dept_name.'</td>';
                $result .= '<td>'.auCommon_revertDate($date[0]).'</td>';
                $result .= '<td>'.$value->remarks.'</td>';
                $result .= '</tr>';

            }
        }
        echo $result;

    }

    public function cancelBookingAjax( $visitId=1){/*visitId=>checking purpose*/


        $response = '';
        $visitId = auCommon_intSanitize($this->input->post('visitId'));    

        
        $data = array(
                'status' => 0
        );
        if( $this->precord->updatePatientRecord( $data, 'visit_id', 'visit_details', $visitId ) ){
            $response = array(
                            'error' => false,
                            'msg'   => 'Record updated sucessfully!'
            );
        }
        else{
            $response = array(
                            'error' => true,
                            'msg'   => 'Record update failed!'
            );
        }

        echo json_encode($response);

    }


    public function checkDateFormat( $date='' ){

        if( $date == ''){
            return true;
        }

        if (preg_match("/(0[1-9]|[1-2][0-9]|3[0-1])-(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec)\b-[0-9]{4}$/",$date)){

            return true;
        } 
        else{
            $this->form_validation->set_message('checkDateFormat', 'Date format is incorrect');
            return false;
        }
        
    }
}