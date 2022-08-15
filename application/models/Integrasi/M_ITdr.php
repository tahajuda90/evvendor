<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ITdr extends MY_Integrate{
    
    var $table = 'public.lelang_query';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function all() {
        $this->db->select('public.lelang_query.lls_id,public.lelang_query.pkt_id,public.paket_anggaran.ppk_id,public.paket_anggaran.rup_id,public.paket_satker.stk_id,public.lelang_query.pkt_nama,public.satuan_kerja.stk_nama,public.lelang_query.pkt_hps,public.paket.pkt_pagu,public.lelang_query.jadwal_awal_pengumuman,public.paket.pkt_tgl_buat,public.lelang_query.lls_status');
        $this->db->join('public.paket_anggaran','public.paket_anggaran.pkt_id = public.lelang_query.pkt_id','LEFT');
        $this->db->join('public.paket_satker','public.paket_satker.pkt_id = public.lelang_query.pkt_id','LEFT');
        $this->db->join('public.satuan_kerja','public.paket_satker.stk_id = public.satuan_kerja.stk_id','LEFT');
        $this->db->join('public.paket','public.lelang_query.pkt_id = public.paket.pkt_id','LEFT');
        $this->db->order_by('public.lelang_query.lls_id','DESC');
        return parent::all();
    }
}