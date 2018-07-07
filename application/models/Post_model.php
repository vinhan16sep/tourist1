<?php 

/**
* 
*/
class Post_model extends MY_Model{
	
	public $table = 'post';
    public function get_by_post_category_id($post_category_id = array(), $select = array(), $lang = '') {
        $this->db->query('SET SESSION group_concat_max_len = 10000000');
        $this->db->select($this->table .'.*');
        if(in_array('title', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.title ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_title');
        }
        if(in_array('description', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.description ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_description');
        }
        if(in_array('content', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.content ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_content');
        }
        if($select == null){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.title ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_title');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.description ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_description');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.content ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_content');
        }
        
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id','left');
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.is_activated', 0);
        $this->db->where_in($this->table .'.post_category_id', $post_category_id);
        $this->db->group_by($this->table .".id");
        return $this->db->get()->result_array();
    }
    public function get_by_post_category_id_lang($post_category_id = '', $select = array(), $lang = '',$limit =0,$order ="desc") {
        $this->db->query('SET SESSION group_concat_max_len = 10000000');
        $this->db->select($this->table .'.*');
        if(in_array('title', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.title ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'title');
        }
        if(in_array('description', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.description ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'description');
        }
        if(in_array('content', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.content ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'content');
        }
        if($select == null){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.title ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'title');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.description ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'description');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.content ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'content');
        }
        
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id','left');
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.is_activated', 0);
        $this->db->where($this->table .'.post_category_id', $post_category_id);
        $this->db->group_by($this->table .".id");
        $this->db->order_by($this->table .".id",$order);
        $this->db->limit($limit);
        return $this->db->get()->result_array();
    }
    public function get_by_slug($slug, $select = array(), $lang = '') {
        $this->db->query('SET SESSION group_concat_max_len = 10000000');
        $this->db->select($this->table .'.*');
        if(in_array('title', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.title ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_title');
        }
        if(in_array('description', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.description ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_description');
        }
        if(in_array('content', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.content ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_content');
        }
        if($select == null){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.title ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_title');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.description ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_description');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.content ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_content');
        }
        
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id', 'left');
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.slug', $slug);

        return $this->db->get()->row_array();
    }
    public function get_post_in_array_category_id($category_array, $lang,$litmit=''){
        $this->db->select($this->table . '.*, ' . $this->table_lang . '.*, post_category_lang.title as category_title')
            ->from($this->table)
            ->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id')
            ->join('post_category_lang', $this->table . '.post_category_id = post_category_lang.post_category_id')
            ->where($this->table_lang . '.language', $lang)
            ->where('post_category_lang.language', $lang)
            ->where_in($this->table . '.post_category_id', $category_array)
            ->where($this->table . '.is_deleted', 0)
            ->where($this->table . '.is_activated', 0)
            ->order_by($this->table.'.id','desc');
            if($litmit != '' && is_numeric($litmit)){
                $this->db->limit($litmit);
            }
        return $this->db->get()->result_array();
    }
    public function get_all_post_category_id_array($post_category_id=array(),$limit='',$lang='en',$order='desc',$start = '') {
        $this->db->select('post.*, post_lang.title as title, post_lang.description as description, post_category_lang.title as parent_title, post_category.slug as parent_slug');
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id', 'left');
        $this->db->join('post_category', 'post_category.id = post.post_category_id', 'left');
        $this->db->join('post_category_lang', 'post_category.id = post_category_lang.post_category_id', 'left');
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where_in('post.post_category_id', $post_category_id);
        $this->db->where($this->table_lang .'.language', $lang);
        $this->db->where('post_category_lang.language', $lang);
        $this->db->group_by('post.id');
        $this->db->order_by('post.id', $order);
        if($limit != '' && $start == ''){
            $this->db->limit($limit);
        }
        if($limit != '' && $start != ''){
            $this->db->limit($limit,$start);
        }
        return $this->db->get()->result_array();
    }
    public function get_all_with_pagination_post($order = 'desc',$lang = '', $limit = NULL, $start = NULL, $category = '') {
        $this->db->select($this->table .'.*, '. $this->table_lang .'.*');
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id');
        $this->db->where_in($this->table .'.post_category_id', $category);
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.is_activated', 0);
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->limit($limit, $start);
        $this->db->group_by($this->table_lang .'.'. $this->table .'_id');
        $this->db->order_by($this->table .".id", $order);

        return $result = $this->db->get()->result_array();
    }
}