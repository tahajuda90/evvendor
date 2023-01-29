<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_IKontrakNon extends MY_Integrate{
    
    var $table = 'taha_kontrak_nontender';
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Paket','M_Kontrak'));
    }
    
    public function save($id_pkt){
        $pkt = $this->M_Paket->get_by_id($id_pkt);
        $kontr = $this->by_id('lls_id', $pkt->lls_id);
        if(isset($kontr)){$data = array(
            'id_paket'=> $pkt->id_paket,
            'lls_id'=> $kontr->lls_id,
            'rkn_id'=> $kontr->rkn_id,
            'pkt_id'=> $pkt->pkt_id,
            'kontrak_no'=> $kontr->kontrak_no,
            'nilai_kontrak'=> $kontr->kontrak_nilai
        );
            if ($this->M_Kontrak->insert($data,array('id_paket'=>$pkt->id_paket,'pkt_id'=>$kontr->pkt_id))){
                return true;
            }else{
                $kntrk = $this->M_Kontrak->get_cond(array('id_paket'=>$pkt->id_paket));
                return $this->M_Kontrak->update($kntrk[0]->id_kontrak,$data);
            }
        }else{
            return false;
        }
    }
}