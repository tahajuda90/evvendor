<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class M_Rpgr extends MY_Model{
    
    var $table = 'rekanan_pengurus';
    var $primary = 'id_pengurus';
    
    public function __construct() {
        parent::__construct();
    }
}
