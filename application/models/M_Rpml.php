<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Rpml extends MY_Model{
    var $table = 'rekanan_pemilik';
    var $primary = 'id_pemilik';
    
    public function __construct() {
        parent::__construct();
    }
}
