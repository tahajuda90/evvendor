<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_SatuanKerja extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Satker','Integrasi/M_ISatker'));
    }
    
    public function index(){
        $data['stkr'] = $this->M_Satker->get_all();
        $data['page'] = 'page/SatuanKerja';
        $this->load->view('Main_v',$data);
        $this->session->set_userdata('last_url',current_url());
    }
    
    public function create(){
        $data['page'] = 'page/SatuanKerja';
        $data['action'] = base_url('C_SatuanKerja/create_action');
        $data['id_satker']= set_value('id_satker');
        $data['stk_nama']= set_value('stk_nama');
        $data['stk_alamat']= set_value('stk_alamat');
        $data['stk_telepon']= set_value('stk_telepon');
        $data['stk_kode']= set_value('stk_kode');
        $data['button'] = 'Tambah';
        $this->load->view('Main_v',$data);
        }
    
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
        $data['page'] = 'page/SatuanKerja';
        $data['action'] = base_url('C_SatuanKerja/update_action');
        $data['id_satker']= $stkr->id_satker;
        $data['stk_nama']= $stkr->stk_nama;
        $data['stk_alamat']= $stkr->stk_alamat;
        $data['stk_telepon']= $stkr->stk_telepon;
        $data['stk_kode']= $stkr->stk_kode;
        $data['button'] = 'Update';
        $this->load->view('Main_v',$data);
    }
    
    public function update_action(){
        $msuk = $this->M_Satker->get_by_id($this->input->post('id_satker',TRUE));
        $data = array('stk_nama'=> $this->input->post('stk_nama',TRUE),
        'stk_alamat'=> $this->input->post('stk_alamat',TRUE),
        'stk_telepon'=> $this->input->post('stk_telepon',TRUE),
        'stk_kode'=> $this->input->post('stk_kode',TRUE)
        );
        $this->M_Satker->update($msuk->id_satker,$data);
    }
    
    public function delete($id){
        $this->M_Satker->delete($id);
    }
}

