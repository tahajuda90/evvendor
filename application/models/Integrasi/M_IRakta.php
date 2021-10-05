<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_IRakta extends MY_Integrate{
    
    var $table = 'public.landasan_hukum';
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Rakta','M_Rekanan'));
    }
    
    public function save($rkn_id){
        $data['rekanan'] = $this->M_Rekanan->get_cond(array('rkn_id'=>$rkn_id))[0];
        $data['akt'] = $this->cond('rkn_id', $rkn_id);
        $oke = true;
        if (count($data['akt']) > 0) {
            if (count($this->M_Rakta->get_cond(array('id_rekanan' => $data['rekanan']->id_rekanan))) > 0) {
                $this->M_Rakta->delete_all($data['rekanan']->rkn_id);
            }
            foreach($data['akt'] as $akt){
                $oke = $oke && $this->M_Rakta->insert(
                        array('id_rekanan'=>$data['rekanan']->id_rekanan,
                            'rkn_id'=> $akt->rkn_id,
                            'lhk_no'=> $akt->lhk_no,
                            'lhk_tanggal'=> $akt->lhk_tanggal,
                            'lhk_notaris'=> $akt->lhk_notaris
                            )
                );
            }
            return $oke;
        }else{
            return false;
        }
    }
}

