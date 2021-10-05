<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Rakta extends MY_Model{
    var $table = 'rekanan_akta';
    var $primary = 'id_akta';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function delete_all($rkn_id){
        return $this->db->delete($this->table,array('rkn_id'=>$rkn_id));
    }
}
