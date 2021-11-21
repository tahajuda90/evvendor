<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('login', 'refresh');
        }
        $this->load->model(array('M_Dashboard'));
    }
    
    public function index(){
        $data['page']= 'page/Dashboard';
        $data['paket'] = count($this->M_Dashboard->get_count_paket());
        $data['kontrak'] = count($this->M_Dashboard->get_count_kontrak());
        $data['penilaian'] = count($this->M_Dashboard->get_count_nilai());
        $this->load->view('Main_v',$data);
    }
    
    public function track_progres(){        
        print_r(json_encode($this->M_Dashboard->tracked()));
    }
}
