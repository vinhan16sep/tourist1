<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends MY_Model {

	public $table = 'booking';
	public function __construct(){
		parent::__construct();
		//Do your magic here
	}

	public function get_all_booking_with_pagination_search($status, $limit = NULL, $start = NULL, $keywords = ''){
		$this->db->from($this->table);
    	$this->db->select($this->table .'.*, booking.id as booking_id, product_lang.title as product_title, product_lang.product_id, product_lang.language, product.id');
    	$this->db->join('product', $this->table .'.product_id = product.id');
    	$this->db->join('product_lang', 'product.id = product_lang.product_id');
    	$this->db->where($this->table .'.is_deleted', 0);
    	$this->db->where('product_lang.language', 'vi');
		$this->db->where($this->table .'.status', $status);
		$this->db->group_start();
    	$this->db->like($this->table .'.first_name', $keywords);
    	$this->db->or_like($this->table .'.last_name', $keywords);
    	$this->db->group_end();
    	$this->db->limit($limit, $start);
    	$this->db->order_by($this->table .'.id', 'desc');
    	return $result = $this->db->get()->result_array();
    }

    public function count_search_booking($status, $keywords = ''){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('status', $status);
        $this->db->group_start();
        $this->db->like('first_name', $keywords);
        $this->db->or_like($this->table .'.last_name', $keywords);
        $this->db->group_end();
        $this->db->where($this->table .'.is_deleted', 0);

        return $result = $this->db->get()->num_rows();
    }

}

/* End of file Booking_model.php */
/* Location: ./application/models/Booking_model.php */