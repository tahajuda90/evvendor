<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_INtdr extends MY_Integrate{
    
    var $table = 'ekontrak.lelang_query';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function all() {
        $this->db->select('ekontrak.lelang_query.lls_id,ekontrak.lelang_query.pkt_id,ekontrak.paket_ppk.ppk_id,ekontrak.paket_satker.rup_id,ekontrak.paket_satker.stk_id,ekontrak.paket.pkt_nama,public.satuan_kerja.stk_nama,ekontrak.lelang_query.pkt_hps,ekontrak.paket.pkt_pagu,ekontrak.lelang_query.jadwal_awal_pengumuman,ekontrak.paket.pkt_tgl_buat,ekontrak.lelang_query.lls_status');
        $this->db->join('ekontrak.paket_satker','ekontrak.lelang_query.pkt_id = ekontrak.paket_satker.pkt_id','LEFT');
        $this->db->join('ekontrak.paket_ppk','ekontrak.lelang_query.pkt_id = ekontrak.paket_ppk.pkt_id','LEFT');
        $this->db->join('public.satuan_kerja','ekontrak.paket_satker.stk_id = public.satuan_kerja.stk_id','LEFT');
        $this->db->join('ekontrak.paket','ekontrak.lelang_query.pkt_id = ekontrak.paket.pkt_id','LEFT');
        $this->db->order_by('ekontrak.lelang_query.lls_id','DESC');
        return parent::all();
    }
}

