<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Report extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function rkp_pkt_kntrk($tndr = false, $tahun = null) {
        $whr = '';
        if ($tndr) {
            $whr .= 'where paket.is_nontender = 0';
        } else {
            $whr .= 'where paket.is_nontender = 1';
        }

        if ($tahun != null) {
            $whr .= ' and YEAR(paket.pkt_tgl_buat) = ' . $tahun;
        }
        $q = $this->db->query('select count(paket.id_paket) as jmlh_pkt,
count(kontrak.id_paket) as jmlh_kntrk,
sum(paket.pkt_hps) as hps,
sum(paket.pkt_pagu) as pagu,
sum(kontrak.nilai_kontrak) as kontrak,
sum(paket.pkt_pagu-kontrak.nilai_kontrak) as selisih
from paket
left join kontrak on kontrak.id_paket = paket.id_paket ' . $whr);
        return $q->result();
    }

    public function rkp_pkt_kntrk_stkr($tndr = false, $tahun = null) {
        $whr = '';
        if ($tndr) {
            $whr = 'where p.is_nontender = 0';
        } else {
            $whr = 'where p.is_nontender = 1';
        }

        if (isset($tahun)) {
            $whr .= ' and YEAR(p.pkt_tgl_buat) = ' . $tahun;
        }
        $q = $this->db->query('select sk.id_satker,sk.stk_nama,
COUNT(p.id_paket) as jmlh_pkt,
count(k.id_paket) as jmlh_kntrak,
sum(p.pkt_pagu) as jmlh_pagu,
sum(p.pkt_hps) as jmlh_hps,
sum(k.nilai_kontrak) as jmlh_kntrk
from satuan_kerja sk 
left join paket p on p.id_satker = sk.id_satker
left join kontrak k on k.id_paket = p.id_paket ' . $whr . '
GROUP by sk.id_satker ');
        return $q->result();
    }

    public function rkp_pkt_mtd($tndr = false, $tahun = null) {
        $whr = '';
        if ($tndr) {
            $whr = ' and p.is_nontender = 0';
        } else {
            $whr = ' and p.is_nontender = 1';
        }

        if (isset($tahun)) {
            $whr .= ' and YEAR(p.pkt_tgl_buat) = ' . $tahun;
        }

        $q = $this->db->query('select 
            p.id_mtd,
            mp.nama_metode,COUNT(p.id_paket) as jmlh_pkt,
            count(k.id_paket) as jmlh_kntrak,
            sum(p.pkt_pagu) as jmlh_pagu,
            sum(p.pkt_hps) as jmlh_hps,
sum(k.nilai_kontrak) as jmlh_kntrk
from paket p
left join metode_pemilihan mp on mp.id_mtd = p.id_mtd 
left join kontrak k on k.id_paket = p.id_paket
where p.id_mtd is not null ' . $whr . '
group by p.id_mtd');
        return $q->result();
    }

    public function rkp_pkt_kua($tndr = false, $tahun = null) {
        $whr = '';
        if ($tndr) {
            $whr = ' and p.is_nontender = 0';
        } else {
            $whr = ' and p.is_nontender = 1';
        }

        if (isset($tahun)) {
            $whr .= ' and YEAR(p.pkt_tgl_buat) = ' . $tahun;
        }

        $q = $this->db->query('select p.id_kualifikasi, kp.nama_kualifikasi ,COUNT(p.id_paket) as jmlh_pkt, 
count(k.id_paket) as jmlh_kntrak, 
sum(p.pkt_pagu) as jmlh_pagu, 
sum(p.pkt_hps) as jmlh_hps, 
sum(k.nilai_kontrak) as jmlh_kntrk 
from paket p 
left join kualifikasi_pekerjaan kp on kp.id_kualifikasi = p.id_kualifikasi 
left join kontrak k on k.id_paket = p.id_paket 
where p.id_mtd is not null' . $whr . '
group by p.id_kualifikasi');
        return $q->result();
    }

    public function rangking($tahun = null) {
        $whr = '';
        if (isset($tahun)) {
            $whr .= ' where YEAR(k.kontrak_mulai) = ' . $tahun;
        }

        $q = $this->db->query('SELECT r.id_rekanan,r.rkn_nama,r.kbp,bu.btu_nama,
sum(case when p2.is_nontender = 0 then 1 else 0 end) as jml_tndr,
sum(case when p2.is_nontender = 1 then 1 else 0 end) as jml_nontndr
,count(k.id_kontrak) as jmlh_kntrk,avg(p.rating_nilai) as rating_nilai 
from rekanan r 
left join bentuk_usaha bu on bu.id_btu = r.id_btu 
left join kontrak k on k.id_rekanan = r.id_rekanan 
left join penilaian p on p.id_kontrak = k.id_kontrak
left join paket p2 on k.id_paket = p2.id_paket ' . $whr . '
group by r.id_rekanan 
');
        return $q->result();
    }

    
    public function tahun(){
        $q = $this->db->query('select DISTINCT year(p.pkt_tgl_buat) as tahun from paket p ');
        return $q->result();
    }
}
