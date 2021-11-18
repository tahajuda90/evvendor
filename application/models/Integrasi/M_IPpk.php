<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_IPpk extends MY_Integrate{
    
    var $table = '(select p.ppk_id,p2.peg_nama,p2.peg_nip,p2.peg_pangkat 
from ppk p 
left join pegawai p2 on p.peg_id = p2.peg_id ) as ppeg';
    public function __construct() {
        parent::__construct();
        $this->load->model(array('M_Ppk'));
    }
    
    public function save($ppk_id){
        $ppk = $this->by_id('ppk_id', $ppk_id);
        $data = array(
            'ppk_id'=>$ppk->ppk_id,
            'ppk_nama'=>$ppk->peg_nama,
            'ppk_nip'=>$ppk->peg_nip,
            'ppk_pangkat'=>$ppk->peg_pangkat
        );
        return $this->M_Ppk->insert($data,array('ppk_id'=>$ppk->ppk_id));
    }
}