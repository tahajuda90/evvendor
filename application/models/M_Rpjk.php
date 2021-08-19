<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Rpjk extends MY_Model{
    var $table = 'rekanan_pajak';
    var $primary = 'id_pajak';
    
    public function __construct() {
        parent::__construct();
    }
}
