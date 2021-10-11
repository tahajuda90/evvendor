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
        $ahl = '(SELECT ra.id_rekanan,COUNT(ra.id_ahli) as ahli from rekanan_ahli ra group by ra.id_rekanan) ahl';
        $pgl = '(select rp.id_rekanan,COUNT(rp.id_pengalaman) as pglmn from rekanan_pengalaman rp group by rp.id_rekanan) pgl';
        $prl = '(SELECT rp2.id_rekanan,count(rp2.id_peralatan) as prlt from rekanan_peralatan rp2 group by rp2.id_rekanan) prl';
        $this->db->select($this->table.'.*,ahli,pglmn,prlt');
        $this->db->join($ahl,'ahl.id_rekanan = '.$this->table.'.'.$this->primary,'left');
        $this->db->join($pgl,'pgl.id_rekanan = '.$this->table.'.'.$this->primary,'left');
        $this->db->join($prl,'prl.id_rekanan = '.$this->table.'.'.$this->primary,'left');
        return $this->get_by_id($id);
    }
}
