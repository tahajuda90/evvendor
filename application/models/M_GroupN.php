<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_GroupN extends MY_Model{
    
    var $table = 'group_penilaian';
    var $primary = 'id_group';

    public function __construct() {
        parent::__construct();
        $this->load->model('M_IndikatorN');
    }
    
    public function get_all() {
        $this->child($this->table, $this->M_IndikatorN->table, $this->primary);        
        return parent::get_all();
    }
    
    public function indikator(){
        $group = $this->get_all();
        $data = array();
        foreach ($group as $gr){
            $inst = array('group'=>$gr,'indikator'=> $this->M_IndikatorN->get_cond(array('id_group'=>$gr->id_group)));
            array_push($data,$inst);
        }
        return $data;
    }
}

