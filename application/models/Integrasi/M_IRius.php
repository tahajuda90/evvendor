<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_IRius extends MY_Integrate{
    
    var $table = 'public.ijin_usaha';
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Rius','M_Rekanan'));
    }
    
    public function save($rkn_id){
        $data['rekanan']=$this->M_Rekanan->get_cond(array('rkn_id'=>$rkn_id))[0];
        $data['ius']=$this->M_IRius->cond('rkn_id',$rkn_id);
        $oke = true;
        if (count($data['ius']) > 0) {
            if (count($this->M_Rius->get_cond(array('id_rekanan' => $data['rekanan']->id_rekanan))) > 0) {
                $this->M_Rius->delete_all($data['ius']->rkn_id);
            }
            foreach ($data['ius'] as $ius) {
                $oke = $oke && $this->M_Rius->insert(array('id_rekanan' => $data['rekanan']->id_rekanan, 'rkn_id' => $ius->rkn_id, 'tanggal_berlaku' => $ius->ius_berlaku, 'status_berlaku' => $ius->status_berlaku, 'ius_instansi' => $ius->ius_instansi, 'ius_jenis' => $ius->jni_nama, 'ius_klasifikasi' => $ius->ius_klasifikasi, 'ius_no' => $ius->ius_no));
            }
            return $oke;
        } else {
            return false;
        }
    }
}