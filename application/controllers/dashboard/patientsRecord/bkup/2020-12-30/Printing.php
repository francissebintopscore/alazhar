<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Printing extends CI_Controller {

	public function __construct() {
            parent::__construct();
            $this->load->model('dashboard/patientsRecord/PatientsRecordsModel', 'precord');
            $this->load->helper(array('form', 'url', 'regno', 'aucommon'));
        	$this->load->library('form_validation');
        	header("Cache-Control: no-cache, must-revalidate, max-age=0");
            header("Cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
    }

    public function index( $printCode, $regNo ){

        $data['barcode'] = base_url().'index.php/dashboard/patientsRecord/Aubarcode/index/'.$regNo;
        $this->load->view('dashboard/patientsRecord/printing', $data);
    }
}