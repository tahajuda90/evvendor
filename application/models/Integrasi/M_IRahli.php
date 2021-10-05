<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_IRahli extends MY_Integrate{
    
    var $table = 'public.staf_ahli';
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Rahli','M_Rekanan'));
    }
    
    public function save($rkn_id){
        $data['rekanan'] = $this->M_Rekanan->get_cond(array('rkn_id'=>$rkn_id))[0];
        $data['ahl'] = $this->cond('rkn_id', $rkn_id);
        $oke = true;
        if (count($data['ahl']) > 0) {
            if (count($this->M_Rahli->get_cond(array('id_rekanan' => $data['rekanan']->id_rekanan))) > 0) {
                $this->M_Rahli->delete_all($data['rekanan']->rkn_id);
            }
            foreach($data['ahl'] as $ahl){
                $oke = $oke && $this->M_Rahli->insert(
                        array('id_rekanan'=> $data['rekanan']->id_rekanan,
                            'sta_nama'=> $ahl->sta_nama,
                            'sta_tgllahir'=> $ahl->sta_tgllahir,
                            'sta_alamat'=> $ahl->sta_alamat,
                            'sta_jabatan'=> $ahl->sta_jabatan,
                            'sta_pendidikan'=> $ahl->sta_pendidikan,
                            'sta_pengalaman'=> $ahl->sta_pengalaman,
                            'sta_keahlian'=> $ahl->sta_keahlian,
                            'sta_telepon'=> $ahl->sta_telepon,
                            'sta_email'=>$ahl->sta_email,
                            'sta_kewarganegaraan'=>$ahl->sta_kewarganearaan //pr apabila diganti
                            )
                );
            }
            return $oke;
        }else{
            return false;
        }
    }
}