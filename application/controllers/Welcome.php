<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
	public function index()
	{
            $db2 = $this->load->database('postgre://postgres:3april2014@localhost/simponi', TRUE);
            $q =$db2->get('taha_paket_tender'); 
            if(!$q){
                print_r('errorr');
            }else{
                var_dump($q->result());
            }
            
		//$this->load->view('welcome_message');
	}
}
