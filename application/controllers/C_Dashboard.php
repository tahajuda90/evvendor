<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if (!$this->ion_auth->logged_in()) {
            redirect('login', 'refresh');
        }
    }
    
    public function index(){
        $data['page']= 'page/Dashboard';
        $this->load->view('Main_v',$data);
    }
}
