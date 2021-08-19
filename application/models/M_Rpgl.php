<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class M_Rpgl extends MY_Model{
    var $table = 'rekanan_pengalaman';
    var $primary = 'id_pengalaman';
    
    public function __construct() {
        parent::__construct();
    }
}