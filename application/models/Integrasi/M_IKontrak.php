<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_IKontrak extends MY_Integrate{
    
    var $table = 'public.kontrak';
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Paket','M_Kontrak'));
    }
    
    
    
    public function save($lls_id){
        $pkt = $this->M_Paket->get_cond(array('lls_id'=>$lls_id))[0];
        $kontr = $this->by_id('lls_id', $lls_id);
        $data = array(
            'id_paket'=> $pkt->id_paket,
            'lls_id'=> $kontr->lls_id,
            'rkn_id'=> $kontr->rkn_id,
            'pkt_id'=> $pkt->pkt_id,
            'kontrak_no'=> $kontr->kontrak_no,
            'nilai_kontrak'=> $kontr->kontrak_nilai,
            'kontrak_mulai'=> $kontr->kontrak_mulai,
            'kontrak_akhir'=> $kontr->kontrak_akhir
        );
        return $this->M_Kontrak->insert($data,array('id_paket'=>$pkt->id_paket,'lls_id'=>$kontr->lls_id));
    }
}