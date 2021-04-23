<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct() {
            parent::__construct();
            $this->load->model('dashboard/patientsRecord/ReportModel', 'report');
    }

	public function index(){

        $dateFrom = $dateTo = date('d-M-Y');
        $data['report'] = $this->report->fetchReport( $dateFrom , $dateTo );
        $this->load->view('dashboard/patientsRecord/report', $data );

	}

    public function visitDetails(){

        $dateFrom = $this->input->post('from');
        $dateTo = $this->input->post('to');
        $data['data'] = $report= $this->report->fetchReport( $dateFrom , $dateTo );


         $html = '';
    
        foreach( $report as $key => $value){
            $html .=  '<tr>';
            $html .=  '<td>' . ( $key + 1 )  . '</td>';
            $html .=  '<td>' . $value->visitdate . '</td>';
            $html .=  '<td>' . $value->reg_card_number . '</td>';
            $html .=  '<td>' . $value->name . '</td>';
            $html .=  '<td>' . $value->age . '</td>';
            $html .=  '<td>' . $value->gender . '</td>';
            $html .=  '</tr>';
        }
        echo $html;
    }
   

    public function patients(){
        $data['report'] = $this->report->fetchPatientsDetails();
        $this->load->view('dashboard/patientsRecord/reportPatients', $data );
    }

	
}
