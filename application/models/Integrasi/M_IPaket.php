<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_IPaket extends MY_Integrate{
    
    var $table = '(
select * from taha_paket_tender 
union
select * from taha_paket_nontender 
) as t1';


    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Satker','M_Paket'));
    }
    
    public function is_online(){
        if(!$this->db->get('taha_paket_tender')){
            return false;
        }else if(!$this->db->get('taha_paket_nontender')){
            return false;
        }else{
            return true;
        }
    }
    
    public function satker_check($lls){
        if ($this->by_id('lls_id', $lls)) {
            $pkt = $this->by_id('lls_id', $lls);
            $opd = $this->M_Satker->get_cond(array('stk_id' => $pkt->stk_id));
            if (count($opd) > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public function save($pkt_id){
        $pkt = $this->by_id('pkt_id', $pkt_id);
        $opd = $this->M_Satker->get_cond(array('stk_id'=>$pkt->stk_id))[0];
        $data = array(
            'id_satker'=> $opd->id_satker,
            'pkt_id'=> $pkt->pkt_id,
            'stk_id'=> $pkt->stk_id,
            'ppk_id'=> $pkt->ppk_id,
            'lls_id'=> $pkt->lls_id,
            'rup_id'=> $pkt->rup_id,
            'is_nontender'=> $pkt->status,
            'pkt_nama'=> $pkt->pkt_nama,
            'pkt_pagu'=> $pkt->pkt_pagu,
            'pkt_hps'=> $pkt->pkt_hps,
            'pkt_tgl_buat'=> $pkt->pkt_tgl_buat
        );
        return $this->M_Paket->insert($data,array('lls_id'=>$pkt->lls_id));
    }
    
}
