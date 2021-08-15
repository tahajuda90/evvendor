<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Template extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function blank(){
        $data['page'] = 'page/blank';
        $this->load->view('Main_v',$data);
    }
    
    public function form(){
        $data['page'] = 'page/form';
        $this->load->view('Main_v',$data);
    }
    
    public function penilaian(){
        $data['page'] = 'page/komponen_penilaian';
        $this->load->view('Main_v',$data);
    }
    
    public function satuan(){
        $data['page'] = 'page/satuan_kerja';
        $this->load->view('Main_v',$data);
    }
    
    public function paket(){
        $data['page'] = 'page/paket_pekerjaan';
        $this->load->view('Main_v',$data);
    }
    
    public function penyedia(){
        $data['page'] = 'page/penyedia';
        $this->load->view('Main_v',$data);
    }
    
}

