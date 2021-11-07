<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Metode extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model(array('M_MtdP'));
    }
    
    public function index(){
        $data['metode'] = $this->M_MtdP->get_all();
        $data['page'] = 'page/MetodePemilihan';
        $data['action'] = base_url('C_Metode/create_action');
        $data['id_mtd'] = set_value('id_mtd');
        $data['is_nontender'] = 2;
        $data['nama_metode']= set_value('nama_metode');
        $data['button'] = 'Tambah';
        $this->load->view('Main_v',$data);
    }
    
    public function update($idm){
        $mtd = $this->M_MtdP->get_by_id($idm);
        $data['metode'] = $this->M_MtdP->get_all();
        $data['action'] = base_url('C_Metode/update_action');
        $data['id_mtd'] = $mtd->id_mtd;
        $data['is_nontender'] = $mtd->is_nontender;
        $data['nama_metode']= $mtd->nama_metode;
        $data['button'] = 'Update';
        $data['page'] = 'page/MetodePemilihan';
        $this->load->view('Main_v',$data);
    }
    
    public function create_action(){
        $data = array(
            'nama_metode'=> $this->input->post('nama_metode',TRUE),
            'is_nontender'=> $this->input->post('is_nontender')
        );
        if($this->M_MtdP->insert($data)){
            redirect('metode');
        }else{
            redirect('metode');
        }
    }
    
    public function update_action(){
        $mtd = $this->M_MtdP->get_by_id($this->input->post('id_mtd'));
        if (isset($mtd)) {
            $data = array(
                'nama_metode' => $this->input->post('nama_metode', TRUE),
                'is_nontender' => $this->input->post('is_nontender')
            );
            $this->M_MtdP->update($mtd->id_mtd,$data);
            redirect('metode');
        }else{
            redirect('metode');
        }
    }
    
    public function delete(){
        
    }
    
    public function json($ntd){
        echo json_encode($this->M_MtdP->get_cond(array('is_nontender'=>$ntd)));
    }
}

