<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Rius extends MY_Model{
    var $table = 'rekanan_ius';
    var $primary = 'id_ius';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function delete_all($rkn_id){
        return $this->db->delete($this->table,array('rkn_id'=>$rkn_id));
    }
}
