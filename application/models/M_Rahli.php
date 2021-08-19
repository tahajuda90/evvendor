<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Rahli extends MY_Model{
    
    var $table = 'rekanan_ahli';
    var $primary = 'id_ahli';
    
    public function __construct() {
        parent::__construct();
    }
}

