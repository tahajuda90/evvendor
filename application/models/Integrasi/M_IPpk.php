<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_IPpk extends MY_Integrate{
    
    var $table = '(select p.ppk_id,p2.peg_nama,p2.peg_nip,p2.peg_pangkat,p2.peg_namauser 
from ppk p 
left join pegawai p2 on p.peg_id = p2.peg_id ) as ppeg';
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Ppk','M_Paket'));
    }
    
    public function save($ppk_id){
        $ppk = $this->by_id('ppk_id', $ppk_id);
        $data = array(
            'ppk_id'=>$ppk->ppk_id,
            'ppk_nama'=>$ppk->peg_nama,
            'ppk_nip'=>$ppk->peg_nip,
            'ppk_pangkat'=>$ppk->peg_pangkat,
            'peg_namauser'=>$ppk->peg_namauser
        );
        return $this->M_Ppk->insert($data,array('ppk_id'=>$ppk->ppk_id));
    }
    
    public function tarik(){
        $hsl = true;
        $data = $this->M_Paket->get_ppk();
        foreach($data as $ppk){
//            print_r($ppk);
            if($this->save($ppk->ppk_id)==false){
               $asl = $this->by_id('ppk_id', $ppk->ppk_id);
                $insrt = array(
                    'ppk_id' => $asl->ppk_id,
                    'ppk_nama' => $asl->peg_nama,
                    'ppk_nip' => $asl->peg_nip,
                    'ppk_pangkat' => $asl->peg_pangkat,
                    'peg_namauser' => $asl->peg_namauser
                );
                $pk = $this->M_Ppk->get_cond(array('ppk_id'=>$ppk->ppk_id));
                $hsl = $hsl&&$this->M_Ppk->update($pk[0]->id_ppk,$insrt);
            }
        }
        return $hsl;
    }
}