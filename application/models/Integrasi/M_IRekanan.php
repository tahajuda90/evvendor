<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_IRekanan extends MY_Integrate{
    
    var $table = 'public.rekanan';
    public function __construct() {
        parent::__construct();
        $this->load->model(array('Integrasi/M_IBentukU'));
    }
    
    public function by_id($col, $id) {
        $this->db->select('rekanan.rkn_id,rekanan.btu_id,rekanan.rkn_nama,rekanan.rkn_alamat,rekanan.rkn_kodepos,rekanan.rkn_npwp,rekanan.rkn_pkp,rekanan.rkn_telepon,rekanan.rkn_email,kabupaten.kbp_nama,bentuk_usaha.btu_nama');
        $this->db->join('kabupaten','rekanan.kbp_id = kabupaten.kbp_id','left');
        $this->db->join($this->M_IBentukU->table,'rekanan.btu_id = bentuk_usaha.btu_id','left');
        return parent::by_id($col, $id);
    }
}