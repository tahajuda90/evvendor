<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_IRpml extends MY_Integrate{
    
    var $table = 'public.pemilik';
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Rpml','M_Rekanan'));
    }
    
    public function save($rkn_id){
        $data['rekanan'] = $this->M_Rekanan->get_cond(array('rkn_id'=>$rkn_id))[0];
        $data['pml'] = $this->cond('rkn_id', $rkn_id);
        $oke = true;
        if (count($data['pml']) > 0) {
            if (count($this->M_Rpml->get_cond(array('id_rekanan' => $data['rekanan']->id_rekanan))) > 0) {
                $this->M_Rpml->delete_all($data['rekanan']->rkn_id);
            }
            foreach($data['pml'] as $pml){
                $oke = $oke && $this->M_Rpml->insert(
                        array('id_rekanan'=> $data['rekanan']->id_rekanan,
                            'rkn_id'=> $pml->rkn_id,
                            'pml_nama'=> $pml->pml_nama,
                            'pml_ktp'=> $pml->pml_ktp,
                            'pml_alamat'=> $pml->pml_alamat,
                            'pml_npwp'=>$pml->pml_npwp,
                            'pml_saham'=>$pml->saham
                            )
                );
            }
            return $oke;
        }else{
            return false;
        }
    }
}