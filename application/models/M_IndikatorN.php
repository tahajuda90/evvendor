<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_IndikatorN extends MY_Model{
    var $table = 'indikator_penilaian';
    var $primary = 'id_indikator';
    
    public function __construct() {
        parent::__construct();
        $this->load->model('M_KlasIdktr');
    }
    
    public function get_cond($cond) {
        $this->child($this->table, $this->M_KlasIdktr->table, $this->primary);
        return parent::get_cond($cond);
    }
}


