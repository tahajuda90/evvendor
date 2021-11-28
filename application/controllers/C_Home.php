<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Home extends CI_Controller{
     var $menu = null;
    public function __construct(){
        parent::__construct();
        $this->load->model(array('Frontend/M_Status','Frontend/M_Report'));
        $this->menu = array(
        'tender'=>array('nama'=>'Tender','active'=>false,'url'=>base_url('tender')),
        'non'=>array('nama'=>'Non-Tender','active'=>false,'url'=>base_url('nontender')),
        'rekanan'=>array('nama'=>'Penyedia','active'=>false,'url'=>base_url('rangking')),
    );
    }
    
   
    
    public function index(){
        $tahun = $this->input->get('tahun');
        $this->menu['tender']['active']=true;
        $data['menu'] = $this->menu;
        $data['tahun'] = $this->M_Report->tahun();
        $data['stkr'] = $this->M_Report->rkp_pkt_kntrk_stkr(true,$tahun);
        $data['real'] = $this->M_Report->rkp_pkt_kntrk(true,$tahun);
        $data['mtd'] = $this->M_Report->rkp_pkt_mtd(true,$tahun);
        $data['kua'] = $this->M_Report->rkp_pkt_kua(true,$tahun);
        $data['url_grafik'] = base_url('Frontend/Api/rekap_grafik/'.$tahun);
        $data['url_resume'] = base_url('Frontend/Api/resume/'.$tahun);
        $data['page'] = 'frontend/page/Tender';
        $this->load->view('frontend/Main_V',$data);
    }
    public function nontender(){
        $tahun = $this->input->get('tahun');
        $this->menu['non']['active']=true;
        $data['menu'] = $this->menu;
        $data['tahun'] = $this->M_Report->tahun();
        $data['stkr'] = $this->M_Report->rkp_pkt_kntrk_stkr(false,$tahun);
        $data['real'] = $this->M_Report->rkp_pkt_kntrk(false,$tahun);
        $data['mtd'] = $this->M_Report->rkp_pkt_mtd(false,$tahun);
        $data['kua'] = $this->M_Report->rkp_pkt_kua(false,$tahun);
        $data['url_grafik'] = base_url('Frontend/Api/rekap_grafik_non/'.$tahun);
        $data['url_resume'] = base_url('Frontend/Api/resume_non/'.$tahun);
        $data['page'] = 'frontend/page/Tender';
        $this->load->view('frontend/Main_V',$data);
//        print_r($this->M_Report->rkp_pkt_kntrk(false));
    }
    
    public function rangking(){
        $tahun = $this->input->get('tahun');
        $this->menu['rekanan']['active']=true;
        $data['menu'] = $this->menu;
        $data['tahun'] = $this->M_Report->tahun();
        $data['rank'] = $this->M_Report->rangking($tahun);
        $data['page'] = 'frontend/page/Rank';
        $this->load->view('frontend/Main_V',$data);
    }
    
    public function coba(){
        $this->menu['tender']['active']=true;
        
        print_r(array_column(filterArrayByKeyValue($this->menu, 'active', true),'url')[0]);
    }
}