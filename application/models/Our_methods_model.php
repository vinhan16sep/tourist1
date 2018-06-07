<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Our_methods_model extends MY_Model {

	public $table = 'our_methods';

    public function __construct() {
        parent::__construct();
    }
    public function get_all_by_our_methods_with_pagination_search($limit = NULL, $start = NULL, $lang = ''){
        $this->db->select($this->table .'.*, '. $this->table_lang .'.description');
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id');
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->limit($limit, $start);
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->group_by($this->table_lang .'.'. $this->table .'_id');
        $this->db->order_by($this->table .".id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function count_by_our_methods(){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id');
        $this->db->group_by($this->table_lang .'.'.$this->table.'_id');
        $this->db->where($this->table .'.is_deleted', 0);

        return $result = $this->db->get()->num_rows();
    }

}

/* End of file Our_methods_model.php */
/* Location: ./application/models/Our_methods_model.php */