<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Rius extends MY_Model{
    var $table = 'rekanan_ius';
    var $primary = 'id_ius';
    
    public function __construct() {
        parent::__construct();
    }
}
