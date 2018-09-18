<?php

/**
*
*/
class Post_category_model extends MY_Model{

	public $table = 'post_category';

	public function get_by_parent_id($parent_id, $order = 'desc',$lang = '',$activated = 1,$limit=''){
		$this->db->select($this->table .'.*, '. $this->table_lang .'.title, '. $this->table_lang .'.content');
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id');
        $this->db->where($this->table .'.is_deleted', 0);
        if($activated == 0){
            $this->db->where($this->table .'.is_activated', 0);
        }
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        if(is_numeric($parent_id)){
            $this->db->where($this->table .'.parent_id', $parent_id);
        }

        $this->db->group_by($this->table_lang .'.'. $this->table .'_id');
        $this->db->order_by($this->table .".sort", $order);
        if($limit != ''){
            $this->db->limit($limit);
        }
        return $result = $this->db->get()->result_array();
	}

    public function get_by_parent_id_when_active($parent_id, $order = 'desc',$lang = ''){
        $this->db->select($this->table .'.*, '. $this->table_lang .'.title');
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id');
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.is_activated', 0);
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        if(is_numeric($parent_id)){
            $this->db->where($this->table .'.parent_id', $parent_id);
        }

        $this->db->group_by($this->table_lang .'.'. $this->table .'_id');
        $this->db->order_by($this->table .".sort", $order);

        return $result = $this->db->get()->result_array();
    }

    public function get_by_slug($slug, $order = 'desc',$lang = ''){
        $this->db->select($this->table .'.*, '. $this->table_lang .'.title, '. $this->table_lang .'.content');
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id');
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.is_activated', 0);
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        if($slug != ''){
            $this->db->where($this->table .'.slug', $slug);
        }

        $this->db->group_by($this->table_lang .'.'. $this->table .'_id');
        $this->db->order_by($this->table .".sort", $order);

        return $result = $this->db->get()->row_array();
    }

	public function update_sort($sort, $id){
        $this->db->set(array('sort' => $sort))
            ->where('id', $id)
            ->update('post_category');

        if($this->db->affected_rows() == 1){
            return true;
        }

        return false;
    }
    public function get_by_parent_id_num_rows($parent_id){
        if(is_numeric($parent_id)){
            $this->db->where('id', $parent_id);
        }
        return $this->db->count_all_results($this->table);
    }

    public function fetch_row_by_slug($slug, $lang = ''){
        $this->db->select($this->table.'.*, '.$this->table_lang.'.title,'.$this->table_lang.'.metakeywords,'.$this->table_lang.'.metadescription');
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id');
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.is_activated', 0);
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        if($slug != ''){
            $this->db->where($this->table .'.slug', $slug);
        }

        return $result = $this->db->get()->row_array();
    }

    public function fetch_menu_categories($parent, $lang = 'vi'){
        $where = "post_category.is_deleted = 0 AND post_category.is_activated = 0 AND post_category_lang.language = '" . $lang . "' AND post_category.parent_id = '" . $parent . "'";

        $this->db->select('*')
            ->from('post_category')
            ->join('post_category_lang', 'post_category.id = post_category_lang.post_category_id')
            ->where($where);

        return $this->db->get()->result_array();
    }

    public function fetch_post_category_menu($parent_id){
        $this->db->select($this->table .'.id');
        $this->db->from($this->table);
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.is_activated', 0);
        if(is_numeric($parent_id)){
            $this->db->where($this->table .'.parent_id', $parent_id);
        }

        return $result = $this->db->get()->result_array();
    }
    public function get_all($select = array(), $lang = '',$order="asc") {
        $this->db->query('SET SESSION group_concat_max_len = 10000000');
        $this->db->select($this->table .'.*');
        if(in_array('title', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.title ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_title');
        }
        if($select == null){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.title ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_title');
        }
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id', 'left');
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.is_activated', 0);
        $this->db->group_by($this->table .".id");
        $this->db->order_by($this->table .".sort", $order);
        return $this->db->get()->result_array();
    }
}
