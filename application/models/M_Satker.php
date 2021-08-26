<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Satker extends MY_Model{
    
    var $table = 'satuan_kerja';
    var $primary = 'id_satker';
    
    public function __construct() {
        parent::__construct();
        $this->load->model('M_Paket');
    }
    
    public function get_all() {
        $this->child($this->table, $this->M_Paket->table, $this->primary);
        return parent::get_all();
    }
}


