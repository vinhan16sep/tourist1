<?php 

/**
* 
*/
class Comment_model extends MY_Model{
    
    public $table = 'comment';

    public function get_all_by_product_id($product_id, $limit = NULL, $start = NULL,$type = 0)
    {
    	$this->db->where(array('product_id' => $product_id,'is_deleted' => 0,'type' => $type))->limit($limit, $start);
        return $this->db->get($this->table)->result_array();
    }

    public function count_all_by_product_id($product_id,$type = 0)
    {
    	$this->db->where(array('product_id' => $product_id,'is_deleted' => 0,'type' => $type))->from($this->table);
        return $this->db->count_all_results();
    }
}