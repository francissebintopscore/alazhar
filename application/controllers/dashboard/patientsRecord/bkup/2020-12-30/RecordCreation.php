<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecordCreation extends CI_Controller {

	public function __construct() {
            parent::__construct();
            $this->load->model('dashboard/patientsRecord/PatientsRecordsModel', 'precord');
            // $this->load->helper('regno');
            $this->load->helper(array('form', 'url', 'regno', 'aucommon'));
        	$this->load->library('form_validation');
        	header("Cache-Control: no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
    }
	public function index( $regNo = '' )
	{
		$data['isInsert'] = true;
		if( !$regNo ){
			$client = regno_getClientName();
			$data['hiddenRegNo'] = $data['regNo'] = $this->precord->fetchNextRegNo();
			$data['category'] = $this->precord->fetchCategory();

			if ($this->form_validation->run('insertPatientsRecord') == FALSE){

				$regNo = html_escape($this->input->post('regNo'));
				$hiddenRegNo = html_escape($this->input->post('hiddenRegNo'));
				if( $regNo!= $hiddenRegNo ){
					$data['regNo'] = $regNo;
				}
				$this->load->view('dashboard/patientsRecord/creation', $data);

			}
			else{
				$regDetails = $this->insertRegisteringData();
				
				redirect('dashboard/patientsRecord/RecordCreation/','refresh');
			}
		}
		// else{
		// 	$data['isInsert'] = false;
		// 	$data['patientInformation'] = $this->precord->get_patientInformation( $regNo );
		// }

		
	}
	public function updateView( $regNo = '' ){

		if( !$regNo )
			return;

		$data['patientInformation'] = $patientInformation = $this->precord->get_patientInformation( $regNo );

		if( count($patientInformation)==0 ){
			echo '<script>alert("Invalid register number!");</script>';
			return;
		}
		
		$p_id = $patientInformation[0]->id;


		$data['hiddenRegNo'] = $data['regNo'] = $regNo;

		if ($this->form_validation->run('updatePatientsRecord') == FALSE){

			$regNo = html_escape($this->input->post('regNo'));
			$hiddenRegNo = html_escape($this->input->post('hiddenRegNo'));
			if( $regNo!= $hiddenRegNo ){
				$data['regNo'] = $regNo;
			}

			$data['patientName'] = ( set_value('patientName')!==''  ) ? set_value('patientName') : 'haha';
			$this->load->view('dashboard/patientsRecord/update', $data);

		}
		else{
			$regNo = $this->updatePatientRecord($p_id);

			if( $regNo ){
				echo '<script>alert("Update sucessfully!");</script>';
				redirect('dashboard/patientsRecord/RecordCreation/updateView/'.$regNo,'refresh');
			}
			else{
				redirect('dashboard/patientsRecord/RecordCreation/updateView/'.$data['regNo'],'refresh');
			}
		}


	}

	public function printingView( $regNo = '' ){
	}




	protected function insertRegisteringData(){


		$patientName = html_escape($this->input->post('patientName'));
		$regNo = html_escape($this->input->post('regNo'));
		$dob = auCommon_dateSanitize($this->input->post('dob'));
		$age = html_escape($this->input->post('age'));
		$gender = html_escape($this->input->post('gender'));
		$house = html_escape($this->input->post('house'));
		$place = html_escape($this->input->post('place'));
		$poffice = html_escape($this->input->post('poffice'));
		$state = html_escape($this->input->post('state'));
		$district = html_escape($this->input->post('district'));
		$pin = html_escape($this->input->post('pin'));
		$contactNo = html_escape($this->input->post('contactNo'));
		$parentName = html_escape($this->input->post('parentName'));
		$emgNo = html_escape($this->input->post('emgNo'));
		$category = html_escape($this->input->post('category'));
		$regDate = auCommon_dateSanitize($this->input->post('regDate'));
		$remarks = html_escape($this->input->post('remarks'));
		

		$createdOn = date('Y-m-d');
		
		

		$regDetails = array(

						'name'					=>	$patientName,
						'reg_card_number'		=>	$regNo,
						'dob'					=>	$dob,
						'age'					=>	$age,
						'gender'				=>	$gender,
						'house'					=>	$house,
						'Place'					=>	$place,
						'post_office'			=>	$poffice,
						'state'					=>	$state,
						'district'				=>	$district,
						'pin'					=>	$pin,
						'contact_number'		=>	$contactNo,
						'parent_gurdian_name'	=>	$parentName,
						'emergency_contact'		=>	$emgNo,
						'category'				=>	$category,
						'reg_date'				=>	$regDate,
						'remarks'				=>	$remarks,
						'created_by'			=>	1,
						'created_on'			=>	$createdOn
		);

		// return $regDetails;

		$this->precord->insertPatientRecord( $regDetails, 'patients_record');

		

		$post = $this->input->post();
		if( isset( $post['saveAndPrint'] ) ){
			$print = html_escape($this->input->post('print'));

			if( $print && count($print)>0 ){
				$this->setPrintingPreview( $print, $regNo );
			}
		}

	}

	protected function setPrintingPreview( $print, $regNo ){

		$code = auCommon_fetchPrintingCode($print);

		redirect('dashboard/patientsRecord/Printing/index/'.$code.'/'.$regNo,'refresh');

	}


	protected function updatePatientRecord( $p_id=0 ){

		if($p_id==0)
			return;

		$patientName = html_escape($this->input->post('patientName'));
		$regNo = html_escape($this->input->post('regNo'));
		
		

		$updateDetails = array(

						'name'				=>	$patientName,
						'reg_card_number'	=>	$regNo,
		);
		
		if( $this->precord->updatePatientRecord( $updateDetails, 'id', 'patients_record', $p_id ) ){

			return $regNo;

		}
		else{
			return false;
		}

	}



	public function checkRegNoAlreadyExistsAjax(){

		$regNo = html_escape($this->input->post('regNo'));
		if( $this->precord->checkRegNoAlreadyExists( $regNo ) ){
			echo true;
		}
		else{
			echo false;
		}
	}

	public function checkRegNoFormat( $regNo=''){

		$regFormat = regno_getRegNoFormat();
		if (preg_match($regFormat,$regNo)){
        	return true;
        } 
        else{
        	$this->form_validation->set_message('checkRegNoFormat', 'Registration number must contain first character capital alphabet and 5 numbers. Example A12345');
            return false;
        }
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

	public function checkRegNoAlreadyExists( $regNo=''){

		if( $this->precord->checkRegNoAlreadyExists( $regNo ) ){

			$this->form_validation->set_message('checkRegNoAlreadyExists', 'Registration number already exists!');
            return false;

		}
		else{

			return true;

		}
		
	}
}
