<?php

// 기본 클래스명과 controller 파일명의 첫글자는 대문자로 지정해야한다.

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
}
