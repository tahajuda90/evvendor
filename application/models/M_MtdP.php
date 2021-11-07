<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_MtdP extends MY_Model{
    
    var $table = 'metode_pemilihan';
    var $primary = 'id_mtd';
    
    public function __construct() {
        parent::__construct();
        $this->load->model('M_Paket');
    }
    
    public function get_all() {
        $this->child($this->table, $this->M_Paket->table, $this->primary);
        return parent::get_all();
    }
}