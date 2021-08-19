<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_KlasP extends MY_Model{
    
    var $table = 'kualifikasi_pekerjaan';
    var $primary = 'id_kualifikasi';
    
    public function __construct() {
        parent::__construct();
        $this->load->model('M_KlasIdktr');
    }
    
    public function get_all() {
        $this->child($this->table, $this->M_KlasIdktr->table, $this->primary);
        return parent::get_all();
    }
}


