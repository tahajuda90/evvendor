<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_BentukU extends MY_Model{
    
    var $table = 'bentuk_usaha';
    var $primary = 'id_btu';
    
    public function __construct() {
        parent::__construct();
    }
}

