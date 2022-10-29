<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Ppk extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('login', 'refresh');
        }
        $this->load->model(array('M_Ppk'));
    }
    
    public function index(){
        $data['ppk'] = $this->M_Ppk->get_all();
        $data['page'] = 'page/Ppk';
        $this->load->view('Main_v',$data);
    }
    
    public function cek_ppk(){
        
    }
}