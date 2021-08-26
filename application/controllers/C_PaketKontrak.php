<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_PaketKontrak extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Paket','M_Satker','M_Kontrak'));
    }
    
    public function index(){
        $data['pkt'] = $this->M_Paket->get_all();
        $data['page']='page/PaketPekerjaan';
        $this->load->view('Main_v',$data);
        $this->session->set_userdata('last_url',current_url());
    }
    
    public function index_ktr($id){
        $data['pkt'] = $this->M_Paket->get_by_id($id);
        $data['kontrak'] = $this->M_Kontrak->get_cond(array('id_paket'=>$id));
        $data['page']='page/KontrakPekerjaan';
        $this->load->view('Main_v',$data);
        $this->session->set_userdata('last_url',current_url());
    }
    
    public function create(){
        $data['page']='page/PaketPekerjaan';
        $data['satker'] = $this->M_Satker->get_all();
        $data['action']= base_url('C_PaketKontrak/create_action');
        $data['id_paket']= set_value('id_paket');
        $data['id_satker']= set_value('id_satker');
        $data['lls_id']= set_value('lls_id');
        $data['rup_id']= set_value('rup_id');
        $data['is_nontender']= 2;
        $data['pkt_nama']= set_value('pkt_nama');
        $data['pkt_pagu']= set_value('pkt_pagu');
        $data['pkt_hps']= set_value('pkt_hps');
        $data['tahun']= set_value('tahun');
        $data['button']='Tambah';
        $this->load->view('Main_v',$data);
    }
    
    public function create_ktr(){}
    
    public function create_action(){
        $data = array(
            'id_satker'=> $this->input->post('id_satker',TRUE),
            'lls_id'=> $this->input->post('lls_id',TRUE),
            'rup_id'=> $this->input->post('rup_id',TRUE),
            'is_nontender'=> $this->input->post('is_nontender',TRUE),
            'pkt_nama'=> $this->input->post('pkt_nama',TRUE),
            'pkt_pagu'=> $this->input->post('pkt_pagu',TRUE),
            'pkt_hps'=> $this->input->post('pkt_hps',TRUE),
            'tahun'=> $this->input->post('tahun',TRUE)
        );
        $this->M_Paket->insert($data,array('lls_id'=>$data['lls_id']));
    }
    
    public function create_action_ktr(){}
    
    public function update($id){
        $pkt = $this->M_Paket->get_by_id($id);
        $data['page']='page/PaketPekerjaan';
        $data['satker'] = $this->M_Satker->get_all();
        $data['action']= base_url('C_PaketKontrak/_action');
        $data['id_paket']= $pkt->id_paket;
        $data['id_satker']= $pkt->id_satker;
        $data['lls_id']= $pkt->lls_id;
        $data['rup_id']= $pkt->rup_id;
        $data['is_nontender']= $pkt->is_nontender;
        $data['pkt_nama']= $pkt->pkt_nama;
        $data['pkt_pagu']= $pkt->pkt_pagu;
        $data['pkt_hps']= $pkt->pkt_hps;
        $data['tahun']= $pkt->tahun;
        $data['button']='Update';
        $this->load->view('Main_v',$data);
    }
    
    public function update_ktr(){}
    
    public function update_action(){
        $msuk = $this->M_Paket->get_by_id($this->input->post('id_paket',TRUE));
        $data = array(
            'id_satker'=> $this->input->post('id_satker',TRUE),
            'lls_id'=> $this->input->post('lls_id',TRUE),
            'rup_id'=> $this->input->post('rup_id',TRUE),
            'is_nontender'=> $this->input->post('is_nontender',TRUE),
            'pkt_nama'=> $this->input->post('pkt_nama',TRUE),
            'pkt_pagu'=> $this->input->post('pkt_pagu',TRUE),
            'pkt_hps'=> $this->input->post('pkt_hps',TRUE),
            'tahun'=> $this->input->post('tahun',TRUE)
        );
        $this->M_Paket->update($msuk->id_paket,$data);
    }
    
    public function update_action_ktr(){}
    
    public function delete(){}
    
    public function delete_ktr(){}
}

