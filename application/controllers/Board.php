<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// 기본 클래스명과 controller 파일명의 첫글자는 대문자로 지정해야한다.
class Board extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');        // 폼 유효성 검사 라이브러리 호출
        $this->load->model('Board_model', 'board_model');     // 모델 호출 및 별칭"board" 설정
    }

	// 글쓰기
	public function create()
	{
		$this->load->view('board/create');
	}

	// 등록 처리
	public function store()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('contents', 'Contents', 'required');

		if($this->form_validation->run()) {
			$this->board_model->store();
			redirect('/board');  // 리스트로 보냄
		}
		else {
			echo "Store:필수데이터 입력누락";
		}
	}

    // 글목록
	public function index()
	{
        //echo "<pre>"; print_r($_GET); echo "</pre>";
        $this->load->library('pagination');     // 페이지네이션 구현을 위한 라이브러리 호출

        $config['base_url']    = '/board/';
        $config['total_rows']  = $this->board_model->getAll('count');     // 전체 게시글수
        $config['per_page']    = 3;    // 페이지당 게시글 수
        $config['num_links']   = 10;   // 페이지당 출력 블록수
        $config['uri_segment'] = 2;    // URI 내의 페이지번호를 나타내는 위치점
        $config['use_page_numbers'] = TRUE;     // URI 새그먼트는 페이징하는 아이템들의 시작 인덱스를 사용합니다. 실제 페이지 번호를 보여주고 싶다면, TRUE 설정

        $this->pagination->initialize($config);

        $page = $this->uri->segment(2) ? $this->uri->segment(2) : 1;

        $from_record = ($page - 1) * $config['per_page'];
        //echo "from_record : " . $from_record."<br/>\n";
/*
        $data['search'] = [
            'field'   => $_GET['searchField'],
            'keyword' => $_GET['keyword']
        ];
*/
        $data['pages'] = $this->pagination->create_links();

        $data['list'] = $this->board_model->getAll('all', $config['per_page'], $from_record);       // Board_model.php getAll() 실행 -> 데이터배열을 가져온다.

        $data['start_no'] = $config['total_rows'] - $from_record;
        //echo $data['start_no'] . "=" . $config['total_rows'] . "-" . $from_record ."<br/>\n";

        //echo $this->db->last_query();

        $this->load->view('board/list', $data);
	}

    // 상세보기(글번호)
    public function show($idx)
    {
        $data['view'] = $this->board_model->get($idx);

        $this->load->view('board/show', $data);
    }

    // 수정폼(글번호)
    public function edit($idx)
    {
        $data['edit'] = $this->board_model->get($idx);

        $this->load->view('board/edit', $data);
    }

    // 수정처리(글번호)
    public function update($idx)
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('contents', 'Contents', 'required');

        if($this->form_validation->run()) {
            $this->board_model->update($idx);
            redirect('/board');
        }
        else {
            echo "Update:필수데이터 입력누락";
        }
    }

    // 히든 처리
    public function delete($idx) {
        $this->board_model->delete($idx);
        redirect('/board');
    }

    // 삭제처리(글번호)
    public function drop($idx)
    {
        $item = $this->board_model->drop($idx);

        redirect('/board');
    }

}
