<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		phpinfo();
		$this->load->view('welcome_message');
	}
}
