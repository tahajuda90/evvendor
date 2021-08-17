<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
	public function index()
	{
            print_r(fdatetimetodb(date("Y-m-d H:i:s")));
		//$this->load->view('welcome_message');
	}
}
