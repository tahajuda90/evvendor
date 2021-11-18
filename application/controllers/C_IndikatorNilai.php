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
        $data['action'] = base_url('C_IndikatorNilai/create_action');
        $data['id_group'] = set_value('id_group');
        $data['nama_group']= set_value('nama_group');
        $data['button'] = 'Tambah';
        $this->load->view('Main_v',$data);
    }
    
    public function index_ind($idg){
        $data['group'] = $this->M_GroupN->get_by_id($idg);
        $data['indikator'] = $this->M_IndikatorN->get_cond(array($this->M_GroupN->primary=>$idg));
        $data['action'] = base_url('C_IndikatorNilai/create_action_ind');
        $data['id_indikator']= set_value('id_indikator');
        $data['id_group']= $data['group']->id_group;
        $data['nama_indikator']= set_value('nama_indikator');
        $data['button'] = 'Tambah';
        $data['page'] = 'page/IndikatorPenilaian';
        $this->load->view('Main_v',$data);
    }
    
    public function create_action(){
        $this->form_validation->set_rules('nama_group', 'Nama Aspek', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('group');
        } else {
            $data = array(
                'nama_group' => $this->input->post('nama_group', TRUE)
            );
            if ($this->M_GroupN->insert($data)) {
                redirect('group');
            } else {
                redirect('group');
            }
        }
    }
    
    public function create_action_ind(){
        $this->form_validation->set_rules('nama_indikator', 'Nama Indikator', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('group/indikator/'.$this->input->post('id_group', TRUE));
        } else {
            $data = array(
                'id_group' => $this->input->post('id_group', TRUE),
                'nama_indikator' => $this->input->post('nama_indikator', TRUE)
            );
            if ($this->M_IndikatorN->insert($data)) {
                redirect('group/indikator/' . $data['id_group']);
            } else {
                redirect('group/indikator/' . $data['id_group']);
            }
        }
    }
    
    public function update($idg){
        $group = $this->M_GroupN->get_by_id($idg);
        $data['group'] = $this->M_GroupN->get_all();
        $data['page'] = 'page/GroupPenilaian';
        $data['action'] = base_url('C_IndikatorNilai/update_action');
        $data['id_group'] = $group->id_group;
        $data['nama_group']= $group->nama_group;
        $data['button'] = 'Update';
        $this->load->view('Main_v',$data);
    }
    
    public function update_ind($idi){
        $idktr = $this->M_IndikatorN->get_by_id($idi);
        $data['group'] = $this->M_GroupN->get_by_id($idktr->id_group);
        $data['indikator'] = $this->M_IndikatorN->get_cond(array($this->M_GroupN->primary=>$idktr->id_group));
        $data['action'] = base_url('C_IndikatorNilai/update_action_ind');
        $data['id_indikator']= $idktr->id_indikator;
        $data['id_group']= $idktr->id_group;
        $data['nama_indikator']= $idktr->nama_indikator;
        $data['button'] = 'Update';
        $data['page'] = 'page/IndikatorPenilaian';
        $this->load->view('Main_v',$data);
    }
    
    public function update_action(){
        $group = $this->M_GroupN->get_by_id($this->input->post('id_group',TRUE));
        if(isset($group)){
            $data = array(
            'id_group'=> $this->input->post('id_group',TRUE),
            'nama_group'=> $this->input->post('nama_group',TRUE)
            );
            $this->M_GroupN->update($group->id_group,$data);
            redirect('group');
        }else{
            redirect('group');
        }        
    }
    
    public function update_action_ind(){
        $idktr = $this->M_IndikatorN->get_by_id($this->input->post('id_indikator',TRUE));
        if(isset($idktr)){
        $data = array(
            'id_group'=> $this->input->post('id_group',TRUE),
            'nama_indikator'=> $this->input->post('nama_indikator',TRUE)
        );
            $this->M_IndikatorN->update($idktr->id_indikator,$data);
            redirect('group/indikator/'.$idktr->id_group);
        }else{
            redirect('group/indikator/'.$idktr->id_group);
        }
    }
    
    public function delete($idg){
        $group = $this->M_GroupN->get_by_id($idg);
        if(isset($group)){
            $this->M_GroupN->delete($group->id_group);
            redirect('group');
        }else{
            redirect('group'); 
        }        
    }
    
    public function delete_ind($idi){
        $idktr = $this->M_IndikatorN->get_by_id($idi);
        if(isset($idktr)){
            $this->M_IndikatorN->delete($idktr->id_indikator);
            redirect('group/indikator/'.$idktr->id_group);
        }else{
            redirect('group/indikator/'.$idktr->id_group);
        }
    }
    
    public function bridging(){
        $data['klasifikasi'] = $this->input->get('kualifikasi');
        $data['join'] = $this->M_GroupN->indikator();
        $data['page'] = 'page/GroupIndikator';
        $this->load->view('Main_v',$data);
    }
}

