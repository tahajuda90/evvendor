<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_IRpgl extends MY_Integrate{
    
    var $table = 'public.pengalaman';
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Rpgl','M_Rekanan'));
    }
    
    public function save($rkn_id){
        $data['rekanan'] = $this->M_Rekanan->get_cond(array('rkn_id'=>$rkn_id))[0];
        $data['pgl'] = $this->cond('rkn_id', $rkn_id);
        $oke = true;
        if (count($data['pgl']) > 0) {
            if (count($this->M_Rpgl->get_cond(array('id_rekanan' => $data['rekanan']->id_rekanan))) > 0) {
                $this->M_Rpgl->delete_all($data['rekanan']->rkn_id);
            }
            foreach($data['pgl'] as $pgl){
                $oke = $oke && $this->M_Rpgl->insert(
                        array('id_rekanan'=> $data['rekanan']->id_rekanan,
                            'rkn_id'=> $pgl->rkn_id,
                            'pgl_kegiatan'=> $pgl->pgl_kegiatan,
                            'pgl_lokasi'=> $pgl->pgl_lokasi,
                            'pgl_pmbtgs'=> $pgl->pgl_pembtgs,
                            'pgl_pmbtgs_alamat'=> $pgl->pgl_almtpembtgs,
                            'pgl_nokontrak'=> $pgl->pgl_nokontrak,
                            'pgl_tglkontrak'=> $pgl->pgl_tglkontrak,
                            'pgl_nilai'=> $pgl->pgl_nilai,
                            'pgl_progres'=> $pgl->pgl_persenprogress,
                            'pgl_slskontrak'=> $pgl->pgl_slskontrak,
                            'pgl_slsba'=> $pgl->pgl_slsba)
                );
            }
            return $oke;
        }else{
            return false;
        }
    }
}