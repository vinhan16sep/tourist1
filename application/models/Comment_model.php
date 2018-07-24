<?php 

/**
* 
*/
class Comment_model extends MY_Model{
    
    public $table = 'comment';

    public function get_all_by_product_id($product_id, $limit = NULL, $start = NULL)
    {
    	$this->db->where(array('product_id' => $product_id,'is_deleted' => 0))->limit($limit, $start);
        return $this->db->get($this->table)->result_array();
    }

    public function count_all_by_product_id($product_id)
    {
    	$this->db->where(array('product_id' => $product_id,'is_deleted' => 0))->from($this->table);
        return $this->db->count_all_results();
    }
}