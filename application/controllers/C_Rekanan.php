<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Rekanan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model(array('M_Rekanan'));
    }
    
    public function index(){
        $data['rkn'] = $this->M_Rekanan->get_all();
        $data['page']= 'page/Penyedia';
        $this->load->view('Main_v',$data);
        $this->session->set_userdata('last_url',current_url());
    }
    
    public function create(){}
    
    public function create_action(){}
    
    public function update(){}
    
    public function update_action(){}
    
    public function delete(){}
    
    public function detail($id_rekanan){
        print_r($this->M_Rekanan->detail($id_rekanan));
    }
}