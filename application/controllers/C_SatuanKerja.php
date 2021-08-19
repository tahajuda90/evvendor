<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_SatuanKerja extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('M_Satker');
    }
    
    public function index(){
        $stkr = $this->M_Satker->get_all();
    }
    
    public function create(){}
    
    public function create_action(){
        $data = array('stk_nama'=> $this->input->post('stk_nama',TRUE),
        'stk_alamat'=> $this->input->post('stk_alamat',TRUE),
        'stk_telepon'=> $this->input->post('stk_telepon',TRUE),
        'stk_kode'=> $this->input->post('stk_kode',TRUE)
        );
        $this->M_Satker->insert($data);
    }
    
    public function update($id){
        $stkr = $this->M_Satker->get_by_id($id);
    }
    
    public function update_action(){
        
    }
    
    public function delete($id){
        $this->M_Satker->delete($id);
    }
}

