<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ISatker extends MY_Integrate{
    
    var $table = 'satuan_kerja';
    var $patokan = '(
select distinct(tpt.stk_id) from taha_paket_tender tpt 
union
select distinct(tpn.stk_id) from taha_paket_nontender tpn 
) as t1';
    
    public function __construct() {
        parent::__construct();
        $this->load->model('M_Satker');
    }
    
    public function all() {
        $this->db->select($this->table.'.stk_id,stk_nama,stk_alamat,stk_telepon,stk_kode,rup_stk_id');
        $this->db->join($this->patokan,'satuan_kerja.stk_id = t1.stk_id');
        return parent::all();
    }
    
    public function save($stkid){
        $this->db->where(array('stk_id'=>$stkid));
        $source = $this->db->get($this->table)->row();
        $data = array(
            'stk_id'=> $source->stk_id,
            'stk_nama'=> $source->stk_nama,
            'stk_alamat'=> $source->stk_alamat,
            'stk_telepon'=> $source->stk_telepon,
            'stk_kode'=> $source->stk_kode,
            'stk_rup_id'=>$source->rup_stk_id
        );
        return $this->M_Satker->insert($data,array('stk_id'=>$source->stk_id));
//        return $data;
    }
    
    public function is_online(){
        if(!parent::is_online()){
            return false;
        }else if(!$this->db->get('taha_paket_tender')){
            return false;
        }else if(!$this->db->get('taha_paket_nontender')){
            return false;
        }else{
            return true;
        }
    }
}