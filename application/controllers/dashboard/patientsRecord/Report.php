<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct() {
            parent::__construct();
            $this->load->model('dashboard/patientsRecord/ReportModel', 'report');
            // $this->load->helper(array('form', 'url', 'regno','auCommon'));
        	// $this->load->library('form_validation');
        	// header("Cache-Control: no-cache, must-revalidate, max-age=0");
            // header("Cache-Control: post-check=0, pre-check=0", false);
            // header("Pragma: no-cache");
    }

	public function index(){

        $dateFrom = '2021-03-21';
        $dateTo = '2021-03-31';
        $data['report'] = array();//$this->report->fetchReport( $dateFrom , $dateTo );
        $this->load->view('dashboard/patientsRecord/report', $data );


	}

    public function visitDetails(){

        // $dateFrom ='30-Mar-2021';
        // $dateTo ='31-Mar-2021';
        // $start = 0;
        // $length = 10;
        // $draw = 10;
        $dateFrom = $this->input->post('from');
        $dateTo = $this->input->post('to');
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $draw = intval($this->input->post("draw"));
        // echo $dateFrom;
        $report = $this->report->fetchReport( $dateFrom , $dateTo , $start ,$length );
        // $html = '';
    
        // foreach( $report as $key => $value){
        //     $html .=  '<tr>';
        //     $html .=  '<td>' . ( $key + 1 )  . '</td>';
        //     $html .=  '<td>' . $value->visitdate . '</td>';
        //     $html .=  '<td>' . $value->reg_card_number . '</td>';
        //     $html .=  '<td>' . $value->name . '</td>';
        //     $html .=  '<td>' . $value->age . '</td>';
        //     $html .=  '<td>' . $value->gender . '</td>';
        //     $html .=  '</tr>';
        // }
        // log_message('error', 'Some variable did not contain a value.');
        // $report = array( 
        //     'draw'=> $draw,
        //     'recordsTotal'=> 124,
        //     'recordsFiltered'=> 124,
        //     'data' => $report );
        // $report = json_encode( $report );
        // echo $report;
        // echo $html;
                $i=$start;
                $data = array();
                foreach($report[1]->result() as $r) {
                    $data[] = array(
                        ++$i,
                        $r->visitdate,
                        $r->reg_card_number,
                        $r->name,
                        $r->age,
                        $r->gender,
                    );
            }
        
        
            $result = array(
                        "draw" => $draw,
                        "recordsTotal" => $report[1]->num_rows(),
                        "recordsFiltered" => $report[0],
                        // "data" => $report[1]->result(),
                        "data" => $data,
                        "from" =>$_POST
                    );
        
        
            echo json_encode($result);
            exit();
    }
    function test(){
        $this->report->test( );
    }

    public function patients(){
        $data['report'] = $this->report->fetchPatientsDetails();
        $this->load->view('dashboard/patientsRecord/reportPatients', $data );
    }
	
}
