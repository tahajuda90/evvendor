<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Integrasi/M_ISatker','Integrasi/M_IPaket'));
    }
	public function index()
	{
//            $db2 = $this->load->database('postgre://postgres:3april2014@localhost/simponi', TRUE);
//            $q =$db2->get('taha_paket_tender'); 
//            if(!$q){
//                print_r('errorr');
//            }else{
//                var_dump($q->result());
//            }
            
//        print_r($this->M_IPaket->get_cond(array('lls_id'=>2500590)));
            
        


//        print_r($this->M_ISatker->all());
        
//        print_r($this->M_ISatker->save(563590));
            
		//$this->load->view('welcome_message');
	}
}
