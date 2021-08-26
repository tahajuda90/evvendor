<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_IBentukU extends MY_Integrate{
    
    var $table = 'bentuk_usaha';
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_BentukU'));
    }
    
    public function save(){
        $this->db->select('btu_id,btu_nama');
        $btu = $this->all();
        $bhsl = 0;
        $ggl = 0;
        foreach($btu as $bt){
            if($this->M_BentukU->insert(array('btu_id'=>$bt->btu_id,'btu_nama'=>$bt->btu_nama),
                    array('btu_id'=>$bt->btu_id))){
                $bhsl++;
            }else{
                $ggl++;
            }
        }
        return array('berhasil'=>$bhsl,'gagal'=>$ggl);
    }
}