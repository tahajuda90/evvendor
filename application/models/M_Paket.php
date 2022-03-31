<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class M_Paket extends MY_Model{
    var $table = 'paket';
    var $primary = 'id_paket';
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Kontrak','M_Satker','M_KlasP','M_MtdP','M_Ppk'));
    }
    
    public function get_all($custom = false) {
        
        if ($custom) {
            $this->db->select($this->M_KlasP->table . '.nama_kualifikasi,'.$this->M_MtdP->table.'.nama_metode');
            $this->db->join($this->M_KlasP->table, $this->M_KlasP->table . '.id_kualifikasi = ' . $this->table . '.id_kualifikasi', 'LEFT');
            $this->db->join($this->M_MtdP->table,$this->M_MtdP->table.'.id_mtd = '.$this->table.'.id_mtd','LEFT');
            return parent::get_all();
        } else {
            $dep = $this->ion_auth->get_users_department($this->ion_auth->get_user_id())->row();
            $this->child($this->table, $this->M_Kontrak->table, $this->primary);
            $this->db->select($this->M_Satker->table . '.stk_nama,' . $this->M_KlasP->table . '.nama_kualifikasi,'.$this->M_MtdP->table.'.nama_metode');
            $this->db->join($this->M_Satker->table, $this->M_Satker->table . '.id_satker = ' . $this->table . '.id_satker', 'LEFT');
            $this->db->join($this->M_KlasP->table, $this->M_KlasP->table . '.id_kualifikasi = ' . $this->table . '.id_kualifikasi', 'LEFT');
            $this->db->join($this->M_MtdP->table,$this->M_MtdP->table.'.id_mtd = '.$this->table.'.id_mtd','LEFT');
            if(!empty($dep)){
                $this->db->where(array('paket.id_satker'=>$dep->id_satker));
            }
            return parent::get_all();
        }
    }
    
    public function get_by_id($id) {
        $this->db->select($this->table.'.*,'.$this->M_Satker->table.'.stk_nama,'.$this->M_KlasP->table.'.nama_kualifikasi,'.$this->M_MtdP->table.'.nama_metode,'.$this->M_Ppk->table.'.ppk_nama,'.$this->M_Ppk->table.'.ppk_nip');
        $this->db->join($this->M_Satker->table,$this->M_Satker->table.'.id_satker = '.$this->table.'.id_satker','LEFT');
        $this->db->join($this->M_KlasP->table, $this->M_KlasP->table.'.id_kualifikasi = '.$this->table.'.id_kualifikasi','LEFT');
        $this->db->join($this->M_MtdP->table,$this->M_MtdP->table.'.id_mtd = '.$this->table.'.id_mtd','LEFT');
        $this->db->join($this->M_Ppk->table, $this->M_Ppk->table.'.ppk_id = '.$this->table.'.ppk_id','LEFT');
        return parent::get_by_id($id);
    }
    
    public function get_tahun(){
        $this->db->select('DISTINCT year('.$this->table.'.pkt_tgl_buat) as tahun');
        return $this->db->get($this->table)->result();
    }
    
    public function get_satker(){
        $this->db->select($this->table.'.id_satker,'.$this->M_Satker->table.'.stk_nama');
        $this->db->join($this->M_Satker->table,$this->M_Satker->table.'.id_satker = '.$this->table.'.id_satker','LEFT');
        return $this->db->get($this->table)->result();
    }
}

