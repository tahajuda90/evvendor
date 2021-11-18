<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Home extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function index(){
        $data['page'] = 'frontend/page/Tender';
        $this->load->view('frontend/Main_V',$data);
    }
}