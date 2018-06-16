<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rating_model extends MY_Model {

	public $table = 'rating';
	public function __construct(){
		parent::__construct();
		//Do your magic here
	}

	public function get_all_rating_with_pagination_search($limit = NULL, $start = NULL, $keywords = ''){
		$this->db->from($this->table);
    	$this->db->select($this->table .'.*, rating.id as rating_id, product_lang.title as product_title, product_lang.product_id, product_lang.language, product.id, users.email, users.last_name, users.company, users.phone, users.age');
    	$this->db->join('product', $this->table .'.product_id = product.id');
    	$this->db->join('product_lang', 'product.id = product_lang.product_id');
    	$this->db->join('users', $this->table .'.users_id = users.id');
    	$this->db->where($this->table .'.is_deleted', 0);
    	$this->db->where('product_lang.language', 'vi');
    	$this->db->like('product_lang.title', $keywords);
    	$this->db->limit($limit, $start);
    	$this->db->order_by($this->table .'.id', 'desc');
    	return $result = $this->db->get()->result_array();
    }

    public function count_search_rating($keywords = ''){
        $this->db->from($this->table);
    	$this->db->select($this->table .'.*, rating.id as rating_id, product_lang.title as product_title, product_lang.product_id, product_lang.language, product.id');
    	$this->db->join('product', $this->table .'.product_id = product.id');
    	$this->db->join('product_lang', 'product.id = product_lang.product_id');
    	$this->db->where($this->table .'.is_deleted', 0);
    	$this->db->where('product_lang.language', 'vi');
    	$this->db->like('product_lang.title', $keywords);
    	$this->db->order_by($this->table .'.id', 'desc');

        return $result = $this->db->get()->num_rows();
    }

    public function count_by_product_id($product_id=''){
        $this->db->from($this->table);
        $this->db->where('product_id', $product_id);
        $this->db->where('is_deleted', 0);
        return $result = $this->db->count_all_results();
    }

    public function total_by_product_id($product_id=''){
        // $this->db->select('(SELECT SUM(rating.rating) FROM rating) AS rating', FALSE);
        // $query = $this->db->get('rating')->row_array();

        $this->db->select_sum('rating');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('rating')->row_array();
        return $query;
    }

}

/* End of file Rating.php */
/* Location: ./application/models/Rating.php */