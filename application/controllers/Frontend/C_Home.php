<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Home extends CI_Controller{
     var $menu = null;
    public function __construct(){
        parent::__construct();
        $this->load->model(array('Frontend/M_Status','Frontend/M_Report'));
        $this->menu = array(
        'tender'=>array('nama'=>'Tender','active'=>false,'url'=>base_url()),
        'non'=>array('nama'=>'Non-Tender','active'=>false,'url'=>base_url()),
        'rekanan'=>array('nama'=>'Penyedia','active'=>false,'url'=>base_url()),
    );
    }
    
   
    
    public function index(){
        $this->menu['tender']['active']=true;
        $data['menu'] = $this->menu;
        $data['stkr'] = $this->M_Report->rkp_pkt_kntrk_stkr(true);
        $data['real'] = $this->M_Report->rkp_pkt_kntrk(true); 
        $data['url_grafik'] = base_url('Frontend/Api/rekap_grafik');
        $data['url_resume'] = base_url('Frontend/Api/resume');
        $data['page'] = 'frontend/page/Tender';
        $this->load->view('frontend/Main_V',$data);
    }
    public function nontender(){
        $this->menu['non']['active']=true;
        $data['menu'] = $this->menu;
        $data['stkr'] = $this->M_Report->rkp_pkt_kntrk_stkr();
        $data['real'] = $this->M_Report->rkp_pkt_kntrk();
        $data['url_grafik'] = base_url('Frontend/Api/rekap_grafik_non');
        $data['url_resume'] = base_url('Frontend/Api/resume_non');
        $data['page'] = 'frontend/page/Tender';
        $this->load->view('frontend/Main_V',$data);
//        print_r($this->M_Report->rkp_pkt_kntrk(false));
    }
}