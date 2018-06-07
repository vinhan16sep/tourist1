<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing_model extends MY_Model {

	public $table = 'landing';

	function __construct(){
		parent::__construct();
	}

	public function get_all_by_landing_with_pagination_search($limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('name', $keywords);
        $this->db->where('is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function count_search_by_landing($keyword = ''){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('name', $keyword);
        $this->db->where('is_deleted', 0);

        return $result = $this->db->get()->num_rows();
    }

}

/* End of file Landing_model.php */
/* Location: ./application/models/Landing_model.php */