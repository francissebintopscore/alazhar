<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aubarcode extends CI_Controller {

	public function __construct() {
            parent::__construct();

    }

    public function index( $code='' )
    {
        if( !$code )
            return;
        $this->set_barcode( $code );
    }

    private function set_barcode($code)
    {
        //load library
        $this->load->library('zend');
        //load in folder Zend
        $this->zend->load('Zend/Barcode');
        //generate barcode
        Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
    }

    public function print(){


        ?>
        <img src="http://localhost/sebin/php/codeigniter/alazhar/index.php/dashboard/patientsRecord/Aubarcode/index/10000">
        <img src="http://localhost/sebin/php/codeigniter/alazhar/index.php/dashboard/patientsRecord/Aubarcode/">

        <?php
    }
}