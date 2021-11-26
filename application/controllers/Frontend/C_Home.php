<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Home extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('Frontend/M_Status','Frontend/M_Report'));
    }
    
    public function index(){
        $data['stkr'] = $this->M_Report->rkp_pkt_kntrk_stkr(true);
        $data['real'] = $this->M_Report->rkp_pkt_kntrk(true); 
        $data['page'] = 'frontend/page/Tender';
        $this->load->view('frontend/Main_V',$data);
//        print_r($this->M_Report->rkp_pkt_kntrk(true));
    }
    public function nontender(){
        $data['stkr'] = $this->M_Report->rkp_pkt_kntrk_stkr();
        $data['real'] = $this->M_Report->rkp_pkt_kntrk(); 
        $data['page'] = 'frontend/page/Tender';
        $this->load->view('frontend/Main_V',$data);
//        print_r($this->M_Report->rkp_pkt_kntrk(false));
    }
}