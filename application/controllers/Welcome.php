<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
            parent::__construct();
            $this->load->helper(array('form', 'url', 'regno', 'aucommon'));
        	$this->load->library('form_validation');
        	header("Cache-Control: no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
    }
	public function index()
	{
		// $this->load->view('welcome_message');
		
		if ($this->form_validation->run('login') == FALSE){

			$this->load->view('login/login');

		}
		else{

			$username=auCommon_dataSanitize($this->input->post('username'));
			$password=md5(auCommon_dataSanitize($this->input->post('password')));

			$defaultUsername='admin';
			$defaultPassword='5fb3a0c8ffd8d8494e07c5689b58c97b';

			

			if( $username==$defaultUsername && $password==$defaultPassword ){
				// print_r($user);
				$this->session->set_userdata('user_id', 1);
				redirect('dashboard/patientsRecord/Revisit/','refresh');
			}
			else
			{
				$this->session->set_userdata('user_id', '');
				$this->session->set_flashdata('loginErrorMessage', 'Invalid username or password');
				// echo "<script>alert('Invalid username or password');</script>";
				redirect('welcome/','refresh');
			}
				
			
		}
	}
}
