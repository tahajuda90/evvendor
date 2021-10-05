<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_IRpjk extends MY_Integrate{
    
    var $table = 'public.pajak';
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Rpjk','M_Rekanan'));
    }
    
    public function save($rkn_id){
        $data['rekanan'] = $this->M_Rekanan->get_cond(array('rkn_id'=>$rkn_id))[0];
        $data['pjk'] = $this->cond('rkn_id', $rkn_id);
        $oke = true;
        if (count($data['pjk']) > 0) {
            if (count($this->M_Rpjk->get_cond(array('id_rekanan' => $data['rekanan']->id_rekanan))) > 0) {
                $this->M_Rpjk->delete_all($data['rekanan']->rkn_id);
            }
            foreach($data['pjk'] as $pjk){
                $oke = $oke && $this->M_Rpjk->insert(
                        array('id_rekanan'=> $data['rekanan']->id_rekanan,
                            'rkn_id'=> $pjk->rkn_id,
                            'pjk_no'=>$pjk->pjk_no,
                            'pjk_tanggal'=>$pjk->pjk_tanggal,
                            'pjk_jenis'=>$pjk->pjk_jenis,
                            'pjk_tahun'=>$pjk->pjk_tahun
                        )
                );
            }
            return $oke;
        }else{
            return false;
        }
    }
}
