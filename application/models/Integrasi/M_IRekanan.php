<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_IRekanan extends MY_Integrate{
    
    var $table = 'public.rekanan';
    public function __construct() {
        parent::__construct();
        $this->load->model(array('Integrasi/M_IBentukU','M_Rekanan','M_BentukU'));
    }
    
    public function by_id($col, $id) {
        $this->db->select('rekanan.rkn_id,rekanan.btu_id,rekanan.rkn_nama,rekanan.rkn_alamat,rekanan.rkn_kodepos,rekanan.rkn_npwp,rekanan.rkn_pkp,rekanan.rkn_telepon,rekanan.rkn_email,kabupaten.kbp_nama,bentuk_usaha.btu_nama');
        $this->db->join('kabupaten','rekanan.kbp_id = kabupaten.kbp_id','left');
        $this->db->join($this->M_IBentukU->table,'rekanan.btu_id = bentuk_usaha.btu_id','left');
        return parent::by_id($col, $id);
    }
    
    public function save($rkn_id){
        $rkn = $this->by_id('rkn_id', $rkn_id);
        $btu = $this->M_BentukU->get_cond(array('btu_id'=>$rkn->btu_id))[0];
        $data = array(
            'id_btu'=> $btu->id_btu,
            'rkn_id'=> $rkn->rkn_id,
            'btu_id'=> $rkn->btu_id,
            'rkn_nama'=> $rkn->rkn_nama,
            'rkn_alamat'=> $rkn->rkn_alamat,
            'rkn_kodepos'=> $rkn->rkn_kodepos,
            'rkn_npwp'=> $rkn->rkn_npwp,
            'rkn_pkp'=> $rkn->rkn_pkp,
            'rkn_telepon'=> $rkn->rkn_telepon,
            'rkn_email'=> $rkn->rkn_email,
            'kbp'=> $rkn->kbp_nama
        );
        return $this->M_Rekanan->insert($data,array('rkn_npwp'=>$rkn->rkn_npwp));
    }
    
    public function status($rkn_id){
        $rkni = $this->by_id($rkn_id['kolom'], $rkn_id['value']);
        $rknl = $this->M_Rekanan->get_cond(array($rkn_id['kolom']=>$rkn_id['value']));
        return array('online'=>$rkni,'lokal'=> $rknl);
    }
    
    public function sinkron($npwp){
        $rknl = $this->M_Rekanan->get_cond(array('rkn_npwp'=>$npwp));
        $rkn = $this->by_id('rkn_npwp', $npwp);
        $btu = $this->M_BentukU->get_cond(array('btu_id'=>$rkn->btu_id))[0];
        $data = array(
            'id_btu'=> $btu->id_btu,
            'rkn_id'=> $rkn->rkn_id,
            'btu_id'=> $rkn->btu_id,
            'rkn_nama'=> $rkn->rkn_nama,
            'rkn_alamat'=> $rkn->rkn_alamat,
            'rkn_kodepos'=> $rkn->rkn_kodepos,
            'rkn_npwp'=> $rkn->rkn_npwp,
            'rkn_pkp'=> $rkn->rkn_pkp,
            'rkn_telepon'=> $rkn->rkn_telepon,
            'rkn_email'=> $rkn->rkn_email,
            'kbp'=> $rkn->kbp_nama
        );
        if(isset($rkn)){
            return $this->M_Rekanan->update($rknl->id_rekanan,$data);
        }else{
            return false;
        }        
    }
}