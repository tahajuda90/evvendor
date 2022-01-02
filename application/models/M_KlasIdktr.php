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
    
    public function get_by_id($id) {
        $this->db->select($this->table.'.*,'.$this->M_IndikatorN->table.'.id_group');
        $this->db->join($this->M_IndikatorN->table,'kualifikasi_indikator.id_indikator = indikator_penilaian.id_indikator','LEFT');
        return parent::get_by_id($id);
    }
    
    public function get_group($cond){
        $this->db->select($this->M_IndikatorN->table.'.id_group,'.$this->M_GroupN->table.'.nama_group,SUM(CASE WHEN '.$this->table.'.active = 1 then '.$this->table.'.bobot else 0 end) as bobot');
        $this->db->join($this->M_IndikatorN->table,'kualifikasi_indikator.id_indikator = indikator_penilaian.id_indikator','LEFT');
        $this->db->join($this->M_GroupN->table,'indikator_penilaian.id_group = group_penilaian.id_group','LEFT');
        $this->db->group_by($this->M_IndikatorN->table.'.id_group');
        return parent::get_cond($cond);
    }
}


