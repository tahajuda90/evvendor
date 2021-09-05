<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Klasifikasi extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model(array('M_KlasP','M_KlasIdktr'));
    }
    
    public function index(){
        $data['klasifikasi'] = $this->M_KlasP->get_all();
        $data['page'] = 'page/KlasifikasiPekerjaan';
        $this->load->view('Main_v',$data);
    }
    
    public function index_ind($id){
        $data['klasifikasi'] = $this->M_KlasP->get_by_id($id);
        $data['indikator'] = $this->M_KlasIdktr->get_cond(array('id_kualifikasi'=>$id));
        $data['page'] = 'page/KlasifikasiIndikator';
        $this->load->view('Main_v',$data);
    }
    
    public function create(){
        $data['page'] = 'page/KlasifikasiPekerjaan';
        $data['action'] = base_url('C_Klasifikasi/create_action');
        $data['id_kualifikasi']= set_value('id_kualifikasi');
        $data['nama_kualifikasi']= set_value('nama_kualifikasi');
        $data['kode_kualifikasi']= set_value('kode_kualifikasi');        
        $data['button'] = 'Tambah';
        $this->load->view('Main_v',$data);
    }
        
    public function create_action(){
        $data = array(
            'nama_kualifikasi'=> $this->input->post('nama_kualifikasi',TRUE),
            'kode_kualifikasi'=> $this->input->post('kode_kualifikasi',TRUE)
        );
        if($this->M_KlasP->insert($data)){
            redirect('kualifikasi');
        }else{
            redirect('kualifikasi');
        }
    }
    
    public function create_action_ind(){
        $id = $this->input->post('id_kualifikasi');
        $data['klasifikasi'] = $this->M_KlasP->get_by_id($id);
        $data['input'] = $this->input->post('id_indikator',TRUE);
        $hasil['benar']=0;
        $hasil['salah']=0;
        foreach($data['input'] as $id){
            $msuk = array(
                'id_indikator'=> $id,
                'id_kualifikasi'=> $data['klasifikasi']->id_kualifikasi,
                'active'=> 1
            );
            if($this->M_KlasIdktr->insert($msuk,
                    array('id_indikator'=>$msuk['id_indikator'],'id_kualifikasi'=>$msuk['id_kualifikasi']))
                    ){
                $hasil['benar']=$hasil['benar']+1;   
            }else{
                $hasil['salah']=$hasil['salah']+1;
            }
        }
        redirect('kualifikasi/indikator/'.$data['klasifikasi']->id_kualifikasi);
    }
    
    public function update($id){
        $klas = $this->M_KlasP->get_by_id($id);
        $data['page'] = 'page/KlasifikasiPekerjaan';
        $data['action'] = base_url('C_Klasifikasi/update_action');
        $data['id_kualifikasi']= $klas->id_kualifikasi;
        $data['nama_kualifikasi']= $klas->nama_kualifikasi;
        $data['kode_kualifikasi']= $klas->kode_kualifikasi; 
        $data['button'] = 'Update';
        $this->load->view('Main_v',$data);}
        
    public function update_action(){
        $klas = $this->M_KlasP->get_by_id($this->input->post('id_kualifikasi',TRUE));
        if(isset($klas)){
            $data = array(
            'nama_kualifikasi'=> $this->input->post('nama_kualifikasi',TRUE),
            'kode_kualifikasi'=> $this->input->post('kode_kualifikasi',TRUE)
            );
            $this->M_KlasP->update($klas->id_kualifikasi,$data);
            redirect('kualifikasi');
        }else{
            redirect('kualifikasi');
        }
    }
    
    public function update_action_ind(){
        $bobot = $this->input->post('bobot');
        foreach ($bobot as $key=>$bbt){            
            $this->M_KlasIdktr->update($key,array('bobot'=>$bbt));
        }
        redirect('kualifikasi/indikator/'.$this->input->post('id_kualifikasi'));
    }
    
    public function delete($id){
        $klas = $this->M_KlasP->get_by_id($id);
        if(isset($klas)){
            $this->M_KlasP->delete($klas->id_kualifikasi);
            redirect('kualifikasi');
        }else{
            redirect('kualifikasi');
        }
    }
    
    public function activation_ind($idk) {
        $klasind = $this->M_KlasIdktr->get_by_id($idk);
        if(isset($klasind)){
            switch ($klasind->active){
                case 1:
                    $this->M_KlasIdktr->update($klasind->id_indkua,array('active'=>0));
                    redirect('kualifikasi/indikator/'.$klasind->id_kualifikasi);
                    break;
                case 0:
                    $this->M_KlasIdktr->update($klasind->id_indkua,array('active'=>1));
                    redirect('kualifikasi/indikator/'.$klasind->id_kualifikasi);
                    break;
            }            
        }
    }
}