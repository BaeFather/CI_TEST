<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('form_validation', 'session'));
		$this->load->database();
	}

	public function join()
	{
		$this->load->view('login/join');
	}

	public function store()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('passwd', 'Password', 'required');

		if($this->form_validation->run() == false) {
			$this->load->view('login/join');
		}
		else {
			$email  = $this->input->post('email');
			$passwd = $this->input->post('passwd');

			$data = array(
				'email' => $email,
				'passwd' => hash('SHA256', $passwd)
			);

			$this->db->insert('members', $data);

			$sess_data = array('email' => $email);

			$this->session->set_userdata($sess_data);

			redirect('members/lists');
		}

	}

	public function lists()
	{
		$this->load->view('login/list');
	}

}
