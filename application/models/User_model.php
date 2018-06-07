<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model {

	public $table = 'users';

    public function __construct() {
        parent::__construct();
    }

    public function get_all_by_users_with_pagination_search($limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('last_name', $keywords);
        $this->db->where('id !=', 1);
        $this->db->where('active', 1);
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function count_search_by_users($keyword = ''){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->like('last_name', $keyword);
        $this->db->where('id !=', 1);
        $this->db->where('active', 1);

        return $result = $this->db->get()->num_rows();
    }

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */