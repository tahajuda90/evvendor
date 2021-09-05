<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_BtUsaha extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model(array('M_BentukU'));
    }
    
    public function index(){
        $data['bentuk'] = $this->M_BentukU->get_all();
        $data['page'] = 'page/BentukUsaha';
        $this->load->view('Main_v',$data);
    }
    
    public function update($id){
        $bentuk = $this->M_BentukU->get_by_id($id);
        $data['page'] = 'page/BentukUsaha';
        $data['action'] = base_url('C_BtUsaha/update_action');
        $data['id_btu']= $bentuk->id_btu;
        $data['btu_nama']= $bentuk->btu_nama;
        $data['button'] = 'Update';
        $this->load->view('Main_v',$data);
    }
    
    public function update_action(){
        $btu = $this->M_BentukU->get_by_id($this->input->post('id_btu',TRUE));
        if(isset($btu)){
            $data= array(
            'btu_nama'=> $this->input->post('btu_nama',TRUE)
            );
            $this->M_BentukU->update($btu->id_btu,$data);
            redirect('bntkusaha');
        }else{
            redirect('bntkusaha');
        }        

    }
    
}