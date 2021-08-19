<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_NilaiD extends MY_Model{
    var $table = 'penilaian_detail';
    var $primary = 'id_detail';
    
    public function __construct() {
        parent::__construct();
    }
}
