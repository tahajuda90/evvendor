<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Report extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function rkp_pkt_kntrk($tndr=false,$id_satker=null){
        $whr = '';
        if($tndr){
            $whr.='where paket.is_nontender = 0';
        }else{
            $whr.='where paket.is_nontender = 1';
        }
        
        if($id_satker!=null){
            $whr.=' and paket.id_satker = '.$id_satker;
        }
        $q = $this->db->query('select count(paket.id_paket) as jmlh_pkt,
count(kontrak.id_paket) as jmlh_kntrk,
sum(paket.pkt_hps) as hps,
sum(paket.pkt_pagu) as pagu,
sum(kontrak.nilai_kontrak) as kontrak,
sum(paket.pkt_pagu-kontrak.nilai_kontrak) as selisih
from paket
left join kontrak on kontrak.id_paket = paket.id_paket '.$whr);
        return $q->result();
    }
    
    public function rkp_pkt_kntrk_stkr($tndr=false,$tahun=null){
        $whr = '';
        if($tndr){
            $whr ='where p.is_nontender = 0';
        }else{
            $whr ='where p.is_nontender = 1';
        }
        
        if(isset($tahun)){
            $whr.='and YEAR(p.pkt_tgl_buat) = '.$tahun;
        }
        $q = $this->db->query('select sk.id_satker,sk.stk_nama,
COUNT(p.id_paket) as jmlh_pkt,
count(k.id_paket) as jmlh_kntrk,
sum(p.pkt_pagu) as jmlh_pagu,
sum(p.pkt_hps) as jmlh_hps,
sum(k.nilai_kontrak) as jmlh_kntrk
from satuan_kerja sk 
left join paket p on p.id_satker = sk.id_satker
left join kontrak k on k.id_paket = p.id_paket '.$whr.'
GROUP by sk.id_satker ');
        return $q->result();
    }
}
