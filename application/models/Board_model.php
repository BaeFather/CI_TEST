<?php

class Board_model extends CI_Model {

    public function __construct()
    {
		parent::__construct();
        $this->load->database();
        $this->load->helper('url');
    }

    public function store()
    {
		$data = [
			'title' => $this->input->post('title'),
			'contents' => $this->input->post('contents'),
			'regdate' => date('Y-m-d H:i:s'),
			'ip' => $_SERVER['REMOTE_ADDR'],
			'agent' => $_SERVER['HTTP_USER_AGENT']
		];

		$result = $this->db->insert('boards', $data);
        return $result;
    }

    public function get($idx)
    {
        $board = $this->db->get_where('boards', ['idx' => $idx])->row();
        return $board;
    }

    public function getAll($type='all', $where=array(), $limit=5, $from_record=0)
    {

		$board = $this->db->where('isHide','');

        if($type=='count') {
            /** 전체 게시글 카운트 **/
			$board = $this->db
				->like($where)
				->count_all_results('boards');
            //$board = $this->db->get('boards')->num_rows();

			//echo $this->db->last_query();     // 쿼리출력
        }
        else {
            /** 전체 게시글 추출 **/
            $board = $this->db
				->like($where)
				->order_by('idx', 'DESC')
				->limit($limit, $from_record)
				->get('boards')
				->result();

			//echo $this->db->last_query();     // 쿼리출력
        }

        //var_dump($board);

        return $board;
    }

    public function update($idx)
    {
        $data = [
            'title'    => $this->input->post('title'),
            'contents' => $this->input->post('contents'),
			'editdate' => date('Y-m-d H:i:s')
        ];

        $result = $this->db->where('idx', $idx)->update('boards', $data);
        return $result;
    }

    public function delete($idx)
    {
        $data = [
            'isHide' => '1',
            'editdate' => date('Y-m-d H:i:s')
        ];

        $result = $this->db->where('idx', $idx)->update('boards', $data);
        return $result;
    }

    public function drop($idx)
    {
        $result = $this->db->delete('boards', array('idx' => $idx));
        return $result;
    }

	public function countup($idx)
	{
		$this->db->where('idx', $idx);
		$this->db->set('cnt', 'cnt + 1', false);	// escape false 되면 쿼리문상에 싱글쿼트를 제거한다.

		$result = $this->db->update('boards');
		return $result;
	}

}
