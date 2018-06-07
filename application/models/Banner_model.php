<?php
/**
* 
*/
class Banner_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function get_all_with_pagination($limit = NULL, $start = NULL) {
        $this->db->select('*');
        $this->db->from('banner');
        $this->db->where('is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");

        $result = $this->db->get()->result_array();

        return $result;
    }

    public function count_all() {
        $this->db->select('*');
        $this->db->from('banner');
        $this->db->where('is_deleted', 0);

        return $result = $this->db->get()->num_rows();
    }

    public function active($id, $active){
        $this->db->set('is_actived', $active);
        $this->db->where('id', $id);
        $this->db->update('banner');
        return true;
    }

    public function get_by_id($id) {
        $this->db->select('*');
        $this->db->from('banner');
        $this->db->where('is_deleted', 0);
        $this->db->where('id', $id);
        $this->db->limit(1);

        return $this->db->get()->row_array();
    }
}