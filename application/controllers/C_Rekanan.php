<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Rekanan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('login', 'refresh');
        }
        $this->load->model(array('M_Rekanan','M_BentukU'));
    }
    
    public function index(){
        $data['rkn'] = $this->M_Rekanan->get_all();
        $data['page']= 'page/Penyedia';
        $this->load->view('Main_v',$data);
        $this->session->set_userdata('last_url',current_url());
    }
    
    public function create(){
        $data['page'] = 'page/Penyedia';
        $data['btusaha'] = $this->M_BentukU->get_all();
        $data['action'] = base_url('C_Rekanan/create_action');
        $data['id_rekanan']= set_value('id_rekanan');
        $data['id_btu']= set_value('id_btu');
        $data['rkn_nama']= set_value('rkn_nama');
        $data['rkn_alamat']= set_value('rkn_alamat');
        $data['rkn_kodepos']= set_value('rkn_kodepos');
        $data['rkn_npwp']= set_value('rkn_npwp');
        $data['rkn_pkp']= set_value('rkn_pkp');
        $data['rkn_telepon']= set_value('rkn_telepon');
        $data['rkn_email']= set_value('rkn_email');
        $data['kbp']= set_value('kbp');
        $data['button'] = 'Tambah';
        $this->load->view('Main_v',$data);
    }
    
    public function create_action(){
        $data = array(
            'id_btu'=> $this->input->post('id_btu',TRUE),
            'rkn_nama'=> $this->input->post('rkn_nama',TRUE),
            'rkn_alamat'=> $this->input->post('rkn_alamat',TRUE),
            'rkn_kodepos'=> $this->input->post('rkn_kodepos',TRUE),
            'rkn_npwp'=> $this->input->post('rkn_npwp',TRUE),
            'rkn_pkp'=> $this->input->post('rkn_pkp',TRUE),
            'rkn_telepon'=> $this->input->post('rkn_telepon',TRUE),
            'rkn_email'=> $this->input->post('rkn_email',TRUE),
            'kbp'=> $this->input->post('kbp',TRUE)
        );
        if($this->M_Rekanan->insert($data,array('rkn_npwp'=>$data['rkn_npwp']))){
            redirect('rekanan');
        }else{
            redirect('rekanan');
        }
    }
    
    public function update($id){
        $rkn = $this->M_Rekanan->get_by_id($id);
        $data['page'] = 'page/Penyedia';
        $data['btusaha'] = $this->M_BentukU->get_all();
        $data['action'] = base_url('C_Rekanan/update_action');
        $data['id_rekanan']= $rkn->id_rekanan;
        $data['id_btu']= $rkn->id_btu;
        $data['rkn_nama']= $rkn->rkn_nama;
        $data['rkn_alamat']= $rkn->rkn_alamat;
        $data['rkn_kodepos']= $rkn->rkn_kodepos;
        $data['rkn_npwp']= $rkn->rkn_npwp;
        $data['rkn_pkp']= $rkn->rkn_pkp;
        $data['rkn_telepon']= $rkn->rkn_telepon;
        $data['rkn_email']= $rkn->rkn_email;
        $data['kbp']= $rkn->kbp;
        $data['button'] = 'Update';
        $this->load->view('Main_v',$data);
    }
    
    public function update_action(){
        $msk = $this->M_Rekanan->get_by_id($this->input->post('id_rekanan',TRUE));
        $data = array(
            'id_btu'=> $this->input->post('id_btu',TRUE),
            'rkn_nama'=> $this->input->post('rkn_nama',TRUE),
            'rkn_alamat'=> $this->input->post('rkn_alamat',TRUE),
            'rkn_kodepos'=> $this->input->post('rkn_kodepos',TRUE),
            'rkn_npwp'=> $this->input->post('rkn_npwp',TRUE),
            'rkn_pkp'=> $this->input->post('rkn_pkp',TRUE),
            'rkn_telepon'=> $this->input->post('rkn_telepon',TRUE),
            'rkn_email'=> $this->input->post('rkn_email',TRUE),
            'kbp'=> $this->input->post('kbp',TRUE)
        );
        if($this->M_Rekanan->update($msk->id_rekanan,$data)){
            redirect('rekanan');
        }
    }
    
    public function delete($id){
        if($this->M_Rekanan->delete($id)){
            redirect('rekanan','refresh');
        }else{
            redirect('rekanan','refresh');
        }
    }
    
    public function detail($id_rekanan){
        $rkn = $this->M_Rekanan->detail($id_rekanan);
        $data['title'] = $rkn->rkn_nama;
        $data['body'] = '<b>Bentuk Usaha :</b> ' . $rkn->btu_nama
                        . '<br><b>NPWP :</b> ' . $rkn->rkn_npwp . '<br>' . $rkn->rkn_alamat . '<br> <b>Asal Kota/Kabupaten :</b> ' . $rkn->kbp.
                '<br><span class="badge badge-info">Jumlah Tenaga Ahli : '.$rkn->ahli.'</span> <span class="badge badge-info">Jumlah Pengalaman : '.$rkn->pglmn.'</span> <span class="badge badge-info"> Jumlah Peralatan : '.$rkn->prlt.'</span>';
        $data['button'] = '<a class="btn btn-primary" href="'. base_url('/rekanan/detail/'.$rkn->id_rekanan).'" type="button">Detail Penyedia</a>';
        $this->load->view('component/modal',$data);
    }
}