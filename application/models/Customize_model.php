<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customize_model extends MY_Model {

	public $table = 'customize';
	public function __construct(){
		parent::__construct();
		//Do your magic here
	}

	public function get_all_customize_with_pagination_search($limit = NULL, $start = NULL, $keywords = ''){
		$this->db->from($this->table);
    	$this->db->select($this->table .'.*, customize.id as customize_id, product_lang.title as product_title, product_lang.product_id, product_lang.language, product.id, tour_date_lang.title as tour_date_title, tour_date.id as tour_id, ');
    	$this->db->join('product', $this->table .'.product_id = product.id');
        $this->db->join('product_lang', $this->table .'.product_id = product_lang.product_id');
        $this->db->join('tour_date', $this->table .'.tour_date_id = tour_date.id');
        $this->db->join('tour_date_lang', 'tour_date.id = tour_date_lang.tour_date_id');
        $this->db->like('product_lang.title', $keywords);
    	$this->db->where($this->table .'.is_deleted', 0);
        $this->db->where('product_lang.language', 'vi');
        $this->db->where('tour_date_lang.language', 'vi');
    	$this->db->limit($limit, $start);
    	$this->db->order_by($this->table .'.id', 'desc');
    	return $result = $this->db->get()->result_array();
    }

    public function count_search_customize($keywords = ''){
        $this->db->from($this->table);
        $this->db->select($this->table .'.*, customize.id as customize_id, product_lang.title as product_title, product_lang.product_id, product_lang.language, product.id,  tour_date_lang.title as tour_date_title, tour_date.id as tour_id, ');
        $this->db->join('product', $this->table .'.product_id = product.id');
        $this->db->join('product_lang', $this->table .'.product_id = product_lang.product_id');
        $this->db->join('tour_date', $this->table .'.tour_date_id = tour_date.id');
        $this->db->join('tour_date_lang', 'tour_date.id = tour_date_lang.tour_date_id');
        $this->db->like('product_lang.title', $keywords);
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where('product_lang.language', 'vi');
        $this->db->where('tour_date_lang.language', 'vi');
        $this->db->where($this->table .'.is_deleted', 0);

        return $result = $this->db->get()->num_rows();
    }

}

/* End of file customize_model.php */
/* Location: ./application/models/customize_model.php */