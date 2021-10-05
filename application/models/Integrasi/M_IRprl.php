<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_IRprl extends MY_Integrate{
    
    var $table = 'public.peralatan';
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Rprl','M_Rekanan'));
    }
    
    public function save($rkn_id){
        $data['rekanan'] = $this->M_Rekanan->get_cond(array('rkn_id'=>$rkn_id))[0];
        $data['prl'] = $this->cond('rkn_id', $rkn_id);
        $oke = true;
        if (count($data['prl']) > 0) {
            if (count($this->M_Rprl->get_cond(array('id_rekanan' => $data['rekanan']->id_rekanan))) > 0) {
                $this->M_Rprl->delete_all($data['rekanan']->rkn_id);
            }
            foreach($data['prl'] as $prl){
                $oke = $oke && $this->M_Rprl->insert(
                        array('id_rekanan'=> $data['rekanan']->id_rekanan,
                            'alt_jenis'=> $prl->alt_jenis,
                            'alt_jumlah'=> $prl->alt_jumlah,
                            'alt_kapasitas'=> $prl->alt_kapasitas,
                            'alt_merktipe'=> $prl->alt_merktipe,
                            'alt_thpembuatan'=> $prl->alt_thpembuatan,
                            'alt_lokasi'=> $prl->alt_lokasi,
                            'alt_kepemilikan'=>$prl->alt_kepemilikan
                            )
                );
            }
            return $oke;
        }else{
            return false;
        }
    }
}

