<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class M_Paket extends MY_Model{
    var $table = 'paket';
    var $primary = 'id_paket';
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Kontrak','M_Satker','M_KlasP'));
    }
    
    public function get_all() {
        $this->child($this->table, $this->M_Kontrak->table, $this->primary);
        $this->db->select($this->M_Satker->table.'.stk_nama,'.$this->M_KlasP->table.'.nama_kualifikasi');
        $this->db->join($this->M_Satker->table,$this->M_Satker->table.'.id_satker = '.$this->table.'.id_satker','LEFT');
        $this->db->join($this->M_KlasP->table, $this->M_KlasP->table.'.id_kualifikasi = '.$this->table.'.id_kualifikasi','LEFT');
        return parent::get_all();
    }
    
    public function get_by_id($id) {
        $this->db->select($this->table.'.*,'.$this->M_Satker->table.'.stk_nama,'.$this->M_KlasP->table.'.nama_kualifikasi');
        $this->db->join($this->M_Satker->table,$this->M_Satker->table.'.id_satker = '.$this->table.'.id_satker','LEFT');
        $this->db->join($this->M_KlasP->table, $this->M_KlasP->table.'.id_kualifikasi = '.$this->table.'.id_kualifikasi','LEFT');
        return parent::get_by_id($id);
    }
}

