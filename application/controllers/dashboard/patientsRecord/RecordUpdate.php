<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecordUpdate extends CI_Controller {

	public function __construct() {
            parent::__construct();
            $this->load->model('dashboard/patientsRecord/PatientsRecordsModel', 'precord');
            $this->load->helper(array('form', 'url', 'regno','auCommon'));
        	$this->load->library('form_validation');
        	header("Cache-Control: no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
    }

	public function index( $id = '' ){

		if( !$id )
			return;

		$test = $this->precord->getPatientRegno($id);
		if( isset( $test[0]->reg_card_number ) ){
			$regNo = $test[0]->reg_card_number;
		}
		else{
			die('Some error occured');
		}
		$data['patientInformation'] = $patientInformation = $this->precord->get_patientInformation( $regNo, 'patients_record.*,category.id as cat_id,category.cat_name' );


		if( count($patientInformation)==0 ){
			echo '<script>alert("Invalid register number!");</script>';
			return;
		}
		$data['category'] = $this->precord->fetchCategory();
		$p_id = $patientInformation[0]->id;


		$data['hiddenRegNo'] = $data['regNo'] = $regNo;

		if ($this->form_validation->run('updatePatientsRecord') == FALSE){

			$regNo = html_escape($this->input->post('regNo'));
			$hiddenRegNo = html_escape($this->input->post('hiddenRegNo'));
			if( $regNo!= $hiddenRegNo ){
				$data['regNo'] = $regNo;
			}

			$data['patientName'] = ( set_value('patientName')!==''  ) ? set_value('patientName') : 'haha';

			$data['inform'] = $this->setData( $patientInformation );
			$this->load->view('dashboard/patientsRecord/update', $data);

		}
		else{
			$regNo = $this->updatePatientRecord($p_id);

			if( $regNo ){
				echo '<script>alert("Update sucessfully!");</script>';
				// redirect('dashboard/patientsRecord/RecordUpdate/index/'.$id,'refresh');
				// echo "<script>window.location.assign('" . base_url() . "index.php/dashboard/patientsRecord/RecordUpdate/index/".$id."');</script>";
				echo "<script>window.location.assign('" . base_url() . "index.php/dashboard/patientsRecord/Revisit/');</script>";
			}
			else{
				// redirect('dashboard/patientsRecord/RecordUpdate/index/'.$id,'refresh');
				// echo "<script>window.location.assign('" . base_url() . "index.php/dashboard/patientsRecord/RecordUpdate/index/".$id."');</script>";
				echo "<script>window.location.assign('" . base_url() . "index.php/dashboard/patientsRecord/Revisit/');</script>";
			}
		}


	}

	protected function setData( $patientInformation ){

		// print_r($patientInformation);

		$inform = array();

		$dob = explode( ' ' , $patientInformation[0]->dob );
		$regDate = explode( ' ' , $patientInformation[0]->reg_date );

		$inform['patientName'] = ( set_value('patientName')!==''  ) ? set_value('patientName') : $patientInformation[0]->name;
		$inform['dob'] = ( set_value('dob')!==''  ) ? set_value('dob') : auCommon_revertDate($dob[0]);
		$inform['age'] = ( set_value('age')!==''  ) ? set_value('age') : $patientInformation[0]->age;
		$inform['gender'] = ( set_value('gender')!==''  ) ? set_value('gender') : $patientInformation[0]->gender;
		$inform['bloodGroup'] = ( set_value('bloodGroup')!==''  ) ? set_value('bloodGroup') : $patientInformation[0]->blood_group;
		$inform['house'] = ( set_value('house')!==''  ) ? set_value('house') : $patientInformation[0]->house;
		$inform['place'] = ( set_value('place')!==''  ) ? set_value('place') : $patientInformation[0]->Place;
		$inform['poffice'] = ( set_value('poffice')!==''  ) ? set_value('poffice') : $patientInformation[0]->post_office;
		$inform['state'] = ( set_value('state')!==''  ) ? set_value('state') : $patientInformation[0]->state;
		$inform['district'] = ( set_value('district')!==''  ) ? set_value('district') : $patientInformation[0]->district;
		$inform['pin'] = ( set_value('pin')!==''  ) ? set_value('pin') : $patientInformation[0]->pin;
		$inform['contactNo'] = ( set_value('contactNo')!==''  ) ? set_value('contactNo') : $patientInformation[0]->contact_number;
		$inform['parentName'] = ( set_value('parentName')!==''  ) ? set_value('parentName') : $patientInformation[0]->parent_gurdian_name;
		$inform['emgNo'] = ( set_value('emgNo')!==''  ) ? set_value('emgNo') : $patientInformation[0]->emergency_contact;
		$inform['category'] = ( set_value('category')!==''  ) ? set_value('category') : $patientInformation[0]->cat_id;
		$inform['regDate'] = ( set_value('regDate')!==''  ) ? set_value('regDate') : auCommon_revertDate($regDate[0]);
		$inform['remarks'] = ( set_value('remarks')!==''  ) ? set_value('remarks') : $patientInformation[0]->remarks;
		return $inform;
	}





	

	protected function updatePatientRecord( $p_id=0 ){

		if($p_id==0)
			return;

		$regNo = html_escape($this->input->post('regNo'));
		$patientName = html_escape($this->input->post('patientName'));
		$dob = auCommon_dateSanitize($this->input->post('dob'));
		$age = html_escape($this->input->post('age'));
		$gender = html_escape($this->input->post('gender'));
		$bloodGroup = html_escape($this->input->post('bloodGroup'));
		$house = html_escape($this->input->post('house'));
		$place = html_escape($this->input->post('place'));
		$poffice = html_escape($this->input->post('poffice'));
		$state = html_escape($this->input->post('state'));
		$district = html_escape($this->input->post('district'));
		$pin = html_escape($this->input->post('pin'));
		$contactNo = html_escape($this->input->post('contactNo'));
		$parentName = html_escape($this->input->post('parentName'));
		$emgNo = html_escape($this->input->post('emgNo'));
		$regDate = auCommon_dateSanitize($this->input->post('regDate'));
		$remarks = html_escape($this->input->post('remarks'));
		
		

		$updateDetails = array(

						'reg_card_number'	=>	$regNo,
						'name'				=>	$patientName,
						'dob'				=>	$dob,
						'age'				=>	$age,
						'gender'			=>	$gender,
						'blood_group'			=>	$bloodGroup,
						'house'			=>	$house,
						'Place'			=>	$place,
						'post_office'			=>	$poffice,
						'state'			=>	$state,
						'district'			=>	$district,
						'pin'			=>	$pin,
						'contact_number '			=>	$contactNo,
						'parent_gurdian_name'			=>	$parentName,
						'emergency_contact'			=>	$emgNo,
						'reg_date'			=>	$regDate,
						'remarks'			=>	$remarks,
						
		);
		
		if( $this->precord->updatePatientRecord( $updateDetails, 'id', 'patients_record', $p_id ) ){

			$post = $this->input->post();
			if( isset( $post['saveAndPrint'] ) ){
				$print = html_escape($this->input->post('print'));

				if( $print && count($print)>0 ){
					// $this->setPrintingPreview( $print, $regNo );
					$this->session->set_flashdata('printNo', $print);
					$this->session->set_flashdata('regNo', $regNo);
				}
			}
			return $regNo;

		}
		else{
			return false;
		}

	}

	protected function setPrintingPreview( $print, $regNo ){

		$code = auCommon_fetchPrintingCode($print);

// 		redirect('dashboard/patientsRecord/Printing/index/'.$code.'/'.$regNo,'refresh');
		echo "<script>window.location.assign('" . base_url() . "index.php/dashboard/patientsRecord/Printing/index/".$code."/".$regNo."');</script>";

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
