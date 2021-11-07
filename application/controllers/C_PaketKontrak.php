<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_PaketKontrak extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Paket','M_KlasP','M_Satker','M_Kontrak'));
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
        $data['kualifikasi'] = $this->M_KlasP->get_all();
        $data['action']= base_url('C_PaketKontrak/create_action');
        $data['id_paket']= set_value('id_paket');
        $data['id_satker']= set_value('id_satker');
        $data['id_kualifikasi'] = set_value('id_kualifikasi');
        $data['id_mtd'] = set_value('id_mtd');
        $data['lls_id']= set_value('lls_id');
        $data['rup_id']= set_value('rup_id');
        $data['is_nontender']= 2;
        $data['pkt_nama']= set_value('pkt_nama');
        $data['pkt_pagu']= set_value('pkt_pagu');
        $data['pkt_hps']= set_value('pkt_hps');
        $data['pkt_tgl_buat']= set_value('pkt_tgl_buat');
        $data['button']='Tambah';
        $this->load->view('Main_v',$data);
//        print_r($data['id_satker']=="");
    }
    
    public function create_ktr($id){
        $data['pkt'] = $this->M_Paket->get_by_id($id);
        $data['page'] = 'page/KontrakPekerjaan';
        $data['action']= base_url('C_PaketKontrak/create_action_ktr');
        $data['id_kontrak']= set_value('id_kontrak');
        $data['id_paket']= $data['pkt']->id_paket;
        $data['lls_id']= $data['pkt']->lls_id;
        $data['kontrak_no']= set_value('kontrak_no');
        $data['nilai_kontrak']= set_value('nilai_kontrak');
        $data['kontrak_mulai']= set_value('kontrak_mulai');
        $data['kontrak_akhir']= set_value('kontrak_akhir');
        $data['button']='Tambah';
        $this->load->view('Main_v',$data);
    }
    
    public function create_action(){
        $data = array(
            'id_satker'=> $this->input->post('id_satker',TRUE),
            'lls_id'=> $this->input->post('lls_id',TRUE),
            'rup_id'=> $this->input->post('rup_id',TRUE),
            'is_nontender'=> $this->input->post('is_nontender',TRUE),
            'pkt_nama'=> $this->input->post('pkt_nama',TRUE),
            'pkt_pagu'=> $this->input->post('pkt_pagu',TRUE),
            'pkt_hps'=> $this->input->post('pkt_hps',TRUE),
            'pkt_tgl_buat'=> fdatetimetodb($this->input->post('pkt_tgl_buat',TRUE)),
            'id_mtd'=> $this->input->post('id_mtd',TRUE),
            'id_kualifikasi'=> $this->input->post('id_kualifikasi',TRUE)
        );
        if($this->M_Paket->insert($data,array('lls_id'=>$data['lls_id']))){
            redirect('paket');
        }else{
            redirect('paket');
        }
    }
    
    public function create_action_ktr(){
        $data =array(
            'id_paket'=> $this->input->post('id_paket',TRUE),
            'lls_id'=> $this->input->post('lls_id',TRUE),
            'kontrak_no'=> $this->input->post('kontrak_no',TRUE),
            'nilai_kontrak'=> $this->input->post('nilai_kontrak',TRUE),
            'kontrak_mulai'=> fdatetimetodb($this->input->post('kontrak_mulai',TRUE)),
            'kontrak_akhir'=> fdatetimetodb($this->input->post('kontrak_akhir',TRUE))
        );
        if($this->M_Kontrak->insert($data,array('id_paket'=>$data['id_paket']))){
            redirect('paket/kontrak/'.$data['id_paket']);
        }else{
            redirect('paket/kontrak/'.$data['id_paket']);
        };
    }
    
    public function update($id){
        $pkt = $this->M_Paket->get_by_id($id);
        $data['page']='page/PaketPekerjaan';
        $data['satker'] = $this->M_Satker->get_all();
        $data['kualifikasi'] = $this->M_KlasP->get_all();
        $data['action']= base_url('C_PaketKontrak/update_action');
        $data['id_paket']= $pkt->id_paket;
        $data['id_satker']= $pkt->id_satker;
        $data['id_kualifikasi'] = $pkt->id_kualifikasi;
        $data['id_mtd'] = $pkt->id_mtd;
        $data['lls_id']= $pkt->lls_id;
        $data['rup_id']= $pkt->rup_id;
        $data['is_nontender']= $pkt->is_nontender;
        $data['pkt_nama']= $pkt->pkt_nama;
        $data['pkt_pagu']= $pkt->pkt_pagu;
        $data['pkt_hps']= $pkt->pkt_hps;
        $data['pkt_tgl_buat']= fdate($pkt->pkt_tgl_buat);
        $data['button']='Update';
        $this->load->view('Main_v',$data);
    }
    
    public function update_ktr($id){
        $kntr = $this->M_Kontrak->get_by_id($id);
        $data['pkt'] = $this->M_Paket->get_by_id($kntr->id_paket);
        $data['page'] = 'page/KontrakPekerjaan';
        $data['action']= base_url('C_PaketKontrak/update_action_ktr');
        $data['id_kontrak']= $kntr->id_kontrak;
        $data['id_paket']= $kntr->id_paket;
        $data['lls_id']= $kntr->lls_id;
        $data['kontrak_no']= $kntr->kontrak_no;
        $data['nilai_kontrak']= $kntr->nilai_kontrak;
        $data['kontrak_mulai']= fdate($kntr->kontrak_mulai);
        $data['kontrak_akhir']= fdate($kntr->kontrak_akhir);
        $data['button']='Update';
        $this->load->view('Main_v',$data);
    }
    
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
            'pkt_tgl_buat'=> fdatetimetodb($this->input->post('pkt_tgl_buat',TRUE)),
            'id_mtd'=> $this->input->post('id_mtd',TRUE),
            'id_kualifikasi'=> $this->input->post('id_kualifikasi',TRUE)
        );
        if($this->M_Paket->update($msuk->id_paket,$data)){
            redirect('paket');
        }else{
            redirect('paket');
        };
    }
    
    public function update_action_ktr(){
        $msuk = $this->M_Kontrak->get_by_id($this->input->post('id_kontrak',TRUE));
        $data = array(
            'id_paket'=> $this->input->post('id_paket',TRUE),
            'lls_id'=> $this->input->post('lls_id',TRUE),
            'kontrak_no'=> $this->input->post('kontrak_no',TRUE),
            'nilai_kontrak'=> $this->input->post('nilai_kontrak',TRUE),
            'kontrak_mulai'=> fdatetimetodb($this->input->post('kontrak_mulai',TRUE)),
            'kontrak_akhir'=> fdatetimetodb($this->input->post('kontrak_akhir',TRUE))
        );
        if($this->M_Kontrak->update($msuk->id_kontrak,$data)){
            redirect('paket/kontrak/'.$data['id_paket']);
        }else{
            redirect('paket/kontrak/'.$data['id_paket']);
        }
    }
    
    public function delete($id){
        if($this->M_Paket->delete($id)){
            redirect('paket','refresh');
        }else{
            redirect('paket','refresh');
        }
    }
    
//    public function delete_ktr(){}
    
    public function assign_penyedia(){
        $idkntr = $this->input->get('id_kontrak');
        $idrkn = $this->input->get('id_rekanan');
        $data = array('id_rekanan'=>$idrkn);
        if($this->M_Kontrak->update($idkntr,$data)){
            redirect( $this->session->get_userdata()['last_url']);
        }else{
            redirect($this->session->get_userdata()['last_url']);
        }
    }

    public function assign_klas(){
        $data['id_paket'] = $this->input->get('id_paket');
        $data['id_kualifikasi'] = $this->input->get('id_kualifikasi');
        if($this->M_Paket->update($this->input->get('id_paket'),array('id_kualifikasi'=>$this->input->get('id_kualifikasi')))){
            redirect('paket','refresh');
        }
    }
}

