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
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('passwd', 'Password', 'required');

		if( !$this->form_validation->run()  ) {
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
		$this->load->library('pagination');

		$config['base_url']    = '/members/list/';
		$config['total_rows']  = $this->db->where(['1'=>1])->count_all_results('members');;     // 전체 게시글수
		$config['per_page']  = 5;    // 페이지당 게시글 수
		$config['uri_segment'] = 3;    // URI 내의 페이지번호를 나타내는 위치점
		$config['num_links']   = 5;   // 선택된 페이지번호 좌우로 몇개의 “숫자”링크를 보여줄지 설정 (페이지당 출력 블록수)

		$this->pagination->initialize($config);

		$page = $this->uri->segment($config['uri_segment']) ? $this->uri->segment($config['uri_segment']) : 1;

		$from_record = ($page - 1) * $config['per_page'];

		$data['list'] = $this->db
			->query("SELECT *, from_unixtime(regTs) AS regDt FROM members WHERE 1=1 ORDER BY idx DESC LIMIT {$from_record }, {$config['per_page']}")
			->result();
		$data['pages'] = $this->pagination->create_links();
		$data['start_no'] = $config['total_rows'] - $from_record;

		$this->load->view('login/list', $data);
	}

	public function login()
	{
		echo "<pre>"; print_r($this->session); echo "</pre>";
		$this->load->view('login/login');
	}

}
