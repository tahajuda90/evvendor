<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_KlasIdktr extends MY_Model{
    
    var $table = 'kualifikasi_indikator';
    var $primary = 'id_indkua';
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_GroupN','M_IndikatorN'));
    }
    
    public function get_cond($cond) {
        $this->db->select($this->table.'.*,indikator_penilaian.nama_indikator,group_penilaian.nama_group');        
        $this->db->join($this->M_IndikatorN->table,'kualifikasi_indikator.id_indikator = indikator_penilaian.id_indikator','LEFT');
        $this->db->join($this->M_GroupN->table,'indikator_penilaian.id_group = group_penilaian.id_group','LEFT');
        return parent::get_cond($cond);
    }
}


