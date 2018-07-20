<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customize_model extends MY_Model {

	public $table = 'customize';
	public function __construct(){
		parent::__construct();
		//Do your magic here
	}

	public function get_all_customize_with_pagination_search($status, $limit = NULL, $start = NULL, $keywords = '',$date=array()){
		$this->db->from($this->table);
    	$this->db->select($this->table .'.*, customize.id as customize_id, product_lang.title as product_title, product_lang.product_id, product_lang.language, product.id, product_lang.datetitle');
    	$this->db->join('product', $this->table .'.product_id = product.id');
        $this->db->join('product_lang', $this->table .'.product_id = product_lang.product_id');
        $this->db->group_start();
        $this->db->like($this->table .'.first_name', $keywords);
        $this->db->or_like($this->table .'.last_name', $keywords);
        $this->db->group_end();
    	$this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.status', $status);
        $this->db->where('product_lang.language', 'vi');
        if(count($date) == 2){
            $this->db->where(array("DATE(time)>=" => $date[0],"DATE(time)<=" => $date[1]));
        }
    	$this->db->limit($limit, $start);
    	$this->db->order_by($this->table .'.id', 'desc');
    	return $result = $this->db->get()->result_array();
    }

    public function count_search_customize($status, $keywords = '',$date=array()){
        $this->db->from($this->table);
        $this->db->select($this->table .'.*, customize.id as customize_id, product_lang.title as product_title, product_lang.product_id, product_lang.language, product.id, product_lang.datetitle');
        $this->db->join('product', $this->table .'.product_id = product.id');
        $this->db->join('product_lang', $this->table .'.product_id = product_lang.product_id');
        $this->db->group_start();
        $this->db->like($this->table .'.first_name', $keywords);
        $this->db->or_like($this->table .'.last_name', $keywords);
        $this->db->group_end();
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.status', $status);
        $this->db->where('product_lang.language', 'vi');
        $this->db->where($this->table .'.is_deleted', 0);
        if(count($date) == 2){
            $this->db->where(array("DATE(time)>=" => $date[0],"DATE(time)<=" => $date[1]));
        }

        return $result = $this->db->get()->num_rows();
    }

}

/* End of file customize_model.php */
/* Location: ./application/models/customize_model.php */