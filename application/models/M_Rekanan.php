<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Rekanan extends MY_Model{
    var $table = 'rekanan';
    var $primary = 'id_rekanan';
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_BentukU','M_Rakta','M_Rius','M_Rpgl','M_Rahli','M_Rpgr','M_Rpjk','M_Rpml','M_Rprl','M_Kontrak'));
    }
    
    public function get_all() {
        $this->child($this->table, $this->M_Kontrak->table, $this->primary);
        $this->db->select('bentuk_usaha.btu_nama');
        $this->db->join($this->M_BentukU->table,'rekanan.id_btu = bentuk_usaha.id_btu','left');
        return parent::get_all();
    }
    
    public function get_by_id($id) {
        $this->db->select($this->table.'.*,bentuk_usaha.btu_nama');
        $this->db->join($this->M_BentukU->table,'rekanan.id_btu = bentuk_usaha.id_btu','left');
        return parent::get_by_id($id);
    }


    public function get_cond($cond) {
        $this->db->select($this->table.'.*,bentuk_usaha.btu_nama');
        $this->db->join($this->M_BentukU->table,'rekanan.id_btu = bentuk_usaha.id_btu','left');
        return parent::get_cond($cond);
    }
    
    public function detail($id) {
        $this->db->select($this->table.'.*,bentuk_usaha.btu_nama,COUNT(rekanan_ahli.id_ahli) as ahli,count(rekanan_pengalaman.id_pengalaman) as pglmn,count(rekanan_peralatan.id_peralatan) as prlt');
        $this->db->join($this->M_BentukU->table,'rekanan.id_btu = bentuk_usaha.id_btu','left');
        $this->db->join($this->M_Rahli->table,$this->M_Rahli->table.'.'.$this->primary.' = '.$this->table.'.'.$this->primary,'left');
        $this->db->join($this->M_Rpgl->table,$this->M_Rpgl->table.'.'.$this->primary.' = '.$this->table.'.'.$this->primary,'left');
        $this->db->join($this->M_Rprl->table,$this->M_Rprl->table.'.'.$this->primary.' = '.$this->table.'.'.$this->primary,'left');
        return $this->get_by_id($id);
    }
}
