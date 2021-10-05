<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_IRpgr extends MY_Integrate{
    
    var $table = 'public.pengurus';
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Rpgr','M_Rekanan'));
    }
    
    public function save($rkn_id){
        $data['rekanan'] = $this->M_Rekanan->get_cond(array('rkn_id'=>$rkn_id))[0];
        $data['pgr'] = $this->cond('rkn_id', $rkn_id);
        $oke = true;
        if (count($data['pgr']) > 0) {
            if (count($this->M_Rpgr->get_cond(array('id_rekanan' => $data['rekanan']->id_rekanan))) > 0) {
                $this->M_Rpgr->delete_all($data['rekanan']->rkn_id);
            }
            foreach($data['pgr'] as $pgr){
                $oke = $oke && $this->M_Rpgr->insert(
                        array('id_rekanan'=> $data['rekanan']->id_rekanan,
                            'rkn_id'=> $pgr->rkn_id,
                            'pgr_nama'=> $pgr->pgr_nama,
                            'pgr_ktp'=> $pgr->pgr_ktp,
                            'pgr_alamat'=>$pgr->pgr_alamat,
                            'pgr_npwp'=>$pgr->pgr_npwp,
                            'pgr_jabatan'=>$pgr->pgr_jabatan
                        ));
            }
            return $oke;
        }else{
            return false;
        }
    }
}

