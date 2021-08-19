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
        //print_r($data);
    }
    
    public function create(){}
    
    public function create_ind(){ 
    }
    
    public function create_action(){
        $data = array(
            'nama_kualifikasi'=> $this->input->post('nama_kualifikasi',TRUE),
            'kode_kualifikasi'=> $this->input->post('kode_kualifikasi',TRUE)
        );
        $this->M_KlasP->insert($data);
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
        print_r($hasil);
    }
    
    public function update(){}
    
    public function update_ind(){}
    
    public function update_action(){}
    
    public function update_action_ind(){}
    
    public function delete(){}
    
    public function delete_ind() {}
}