<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class M_Rpgr extends MY_Model{
    
    var $table = 'rekanan_pengurus';
    var $primary = 'id_pengurus';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function delete_all($rkn_id){
        return $this->db->delete($this->table,array('rkn_id'=>$rkn_id));
    }
}
