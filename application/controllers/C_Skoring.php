<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Skoring extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('login', 'refresh');
        }
        $this->load->model(array('M_Skoring','M_KlasP','M_Kontrak','M_Paket','M_Rekanan','M_Nilai','M_NilaiD'));
    }
    
    public function index(){
        $data['pkt'] = $this->M_Skoring->get_paket();
        $data['kls'] = $this->M_KlasP->get_all();
        $data['page'] = 'page/Penilaian';
        $this->load->view('Main_v',$data);
    }
    
    public function skorcreate($id_kontrak) {
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['pkt'] = $this->M_Paket->get_by_id($data['kontrak']->id_paket);
        $data['rekanan'] = $this->M_Rekanan->get_by_id($data['kontrak']->id_rekanan);
        $data['indikator'] = $this->M_KlasIdktr->get_cond(array('id_kualifikasi'=>$data['pkt']->id_kualifikasi,'active'=>1));
        $data['button'] = 'Simpan';
        $data['action'] = base_url('C_Skoring/create_action/'.$data['kontrak']->id_kontrak);
        $data['page'] = 'page/PenilaianKontrak';
        $this->load->view('Main_v',$data);
    }
    
    public function skorupdate($id_kontrak){
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['pkt'] = $this->M_Paket->get_by_id($data['kontrak']->id_paket);
        $data['rekanan'] = $this->M_Rekanan->get_by_id($data['kontrak']->id_rekanan);
        $data['indikator'] = $this->M_Skoring->get_indikator($data['kontrak']->id_kontrak);
        $data['button'] = 'Update';
        $data['action'] = base_url('C_Skoring/update_action/'.$data['kontrak']->id_kontrak);
        $data['page'] = 'page/PenilaianKontrak';
        $this->load->view('Main_v',$data);
    }
    
    public function create_action($id_kontrak){
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['pkt'] = $this->M_Paket->get_by_id($data['kontrak']->id_paket);
        $data['rekanan'] = $this->M_Rekanan->get_by_id($data['kontrak']->id_rekanan);
        $data['indikator'] = $this->M_KlasIdktr->get_cond(array('id_kualifikasi'=>$data['pkt']->id_kualifikasi));
        $nilai = 0;
        $ttlbbt = 0;        
        foreach ($data['indikator'] as $idktr){
            $this->M_NilaiD->insert(array('id_kontrak'=>$data['kontrak']->id_kontrak,'id_indikator'=>$idktr->id_indikator,'bobot'=>$idktr->bobot,'nilai'=>$this->input->post('nilai_'.$idktr->id_indikator)));
            $nilai=$nilai+($this->input->post('nilai_'.$idktr->id_indikator)*$idktr->bobot);
            $ttlbbt=$ttlbbt+$idktr->bobot;
        }
        if($this->M_Nilai->insert(array('total_nilai'=>$nilai,'rating_nilai'=>$nilai/$ttlbbt,'id_user'=>$this->ion_auth->get_user_id(),'id_kontrak'=>$data['kontrak']->id_kontrak,'id_rekanan'=>$data['rekanan']->id_rekanan))){
            redirect('penilaian');
        }
    }
    
    public function update_action($id_kontrak){
        $data['kontrak'] = $this->M_Kontrak->get_by_id($id_kontrak);
        $data['pkt'] = $this->M_Paket->get_by_id($data['kontrak']->id_paket);
        $data['rekanan'] = $this->M_Rekanan->get_by_id($data['kontrak']->id_rekanan);
        $data['indikator'] = $this->M_Skoring->get_indikator($data['kontrak']->id_kontrak);
        $nl = $this->M_Nilai->get_cond(array('id_kontrak'=>$data['kontrak']->id_kontrak));
        $nilai = 0;
        $ttlbbt = 0;
        foreach ($data['indikator'] as $idktr){
            $this->M_NilaiD->update($idktr->id_detail,array('bobot'=>$idktr->bobot,'nilai'=>$this->input->post('nilai_'.$idktr->id_detail)));
            $nilai=$nilai+($this->input->post('nilai_'.$idktr->id_detail)*$idktr->bobot);
            $ttlbbt=$ttlbbt+$idktr->bobot;
        }
        $rdrct = false;
        foreach($nl as $nl){
            $rdrct = $this->M_Nilai->update($nl->id_nilai,array('total_nilai'=>$nilai,'rating_nilai'=>$nilai/$ttlbbt));
        }
        if($rdrct){
            redirect('penilaian');
        }
    }
}

