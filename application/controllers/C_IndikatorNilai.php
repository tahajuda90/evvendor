<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_IndikatorNilai extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_GroupN','M_IndikatorN'));
    }
    
    public function index(){
        $data['group'] = $this->M_GroupN->get_all();
        $data['page'] = 'page/GroupPenilaian';
        $this->load->view('Main_v',$data);
    }
    
    public function index_ind($idg){
        $data['group'] = $this->M_GroupN->get_by_id($idg);
        $data['indikator'] = $this->M_IndikatorN->get_cond(array($this->M_GroupN->primary,$idg));
        $data['page'] = 'page/IndikatorPenilaian';
        $this->load->view('Main_v',$data);
    }
    
    public function create(){}
    
    public function create_action(){
        $data = array(
        'nama_group'=> $this->input->post('nama_group',TRUE)
        );
        $this->M_GroupN->insert($data);
    }
    
    public function create_action_ind(){
        $data = array(
            'id_group'=> $this->input->post('id_group',TRUE),
            'nama_indikator'=> $this->input->post('nama_indikator',TRUE)
        );
        $this->M_IndikatorN->insert($data);
    }
    
    public function update($idg){
        $this->M_GroupN->get_by_id($idg);
    }
    
    public function update_ind($idi){
        $this->M_IndikatorN->get_by_id($idi);
    }
    
    public function update_action(){}
    
    public function update_action_ind(){}
    
    public function delete($idg){
        $this->M_GroupN->delete($idg);
    }
    
    public function delete_ind($idi){
        $this->M_IndikatorN->delete($idi);
    }
    
    public function bridging(){
        $data['klasifikasi'] = $this->input->get('kualifikasi');
        $data['join'] = $this->M_GroupN->indikator();
        $data['page'] = 'page/GroupIndikator';
        $this->load->view('Main_v',$data);
//        foreach ($this->M_GroupN->indikator() as $group){
//            print_r($group['group']->nama_group." : ");
//            foreach($group['indikator'] as $idktr){
//                print_r($idktr->nama_indikator.", ");
//            }
//            print_r("<br>");
//        }
    }
}

