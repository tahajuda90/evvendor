<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Rprl extends MY_Model{
    var $table = 'rekanan_peralatan';
    var $primary = 'id_peralatan';
    
    public function __construct() {
        parent::__construct();
    }
    
    public function delete_all($rkn_id){
        return $this->db->delete($this->table,array('rkn_id'=>$rkn_id));
    }
}
