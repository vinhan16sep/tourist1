<?php 

/**
* 
*/
class Product_model extends MY_Model{
	
	public $table = 'product';
	public function get_by_parent_id($parent_id, $order = 'desc',$lang = ''){
		$this->db->select($this->table .'.*, '. $this->table_lang .'.title');
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id');
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.is_activated', 0);
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        if(is_numeric($parent_id)){
            $this->db->where($this->table .'.id', $parent_id);
        }
    	
        $this->db->group_by($this->table_lang .'.'. $this->table .'_id');
        $this->db->order_by($this->table .".id", $order);

        return $result = $this->db->get()->row_array();
	}
    public function get_by_product_category_id($product_category_id = array(), $select = array(), $lang = '') {
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
        $this->db->where_in($this->table .'.product_category_id', $product_category_id);
        $this->db->group_by($this->table .".id");
        return $this->db->get()->result_array();
    }
    public function get_all($select = array(), $lang = '',$order="asc") {
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
        $this->db->where($this->table .'.is_activated', 0);
        $this->db->group_by($this->table .".id");
        $this->db->order_by($this->table .".sort", $order);
        return $this->db->get()->result_array();
    }
    public function get_all_for_remove($id_localtion='') {
        $this->db->select('id,librarylocaltion');
        $this->db->from($this->table);
        $this->db->like('librarylocaltion', '"'.$id_localtion.'"')->or_like('librarylocaltion', ','.$id_localtion.',')->or_like('librarylocaltion', ','.$id_localtion.'"')->or_like('librarylocaltion', '"'.$id_localtion.',');
        $this->db->where('is_deleted', 0);
        return $result = $this->db->get()->result_array();
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
        if(in_array('metakeywords', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metakeywords ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_metakeywords');
        }
        if(in_array('metadescription', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metadescription ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_metadescription');
        }
        if(in_array('datetitle', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.datetitle ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_datetitle');
        }
        if(in_array('datecontent', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.datecontent ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_datecontent');
        }
        if(in_array('tripnodes', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.tripnodes ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_tripnodes');
        }
        if(in_array('detailsprice', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.detailsprice ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_detailsprice');
        }
        if($select == null){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.title ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_title');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.description ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_description');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.content ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_content');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metakeywords ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_metakeywords');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metadescription ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_metadescription');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.datetitle ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_datetitle');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.datecontent ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_datecontent');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.tripnodes ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_tripnodes');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.detailsprice ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_detailsprice');
        }
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id', 'left');
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.slug', $slug);
        $this->db->limit(1);
        return $this->db->get()->row_array();
    }
    public function get_by_slug_lang($slug, $select = array(), $lang = 'vi') {
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
        if(in_array('metakeywords', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metakeywords ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'metakeywords');
        }
        if(in_array('metadescription', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metadescription ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'metadescription');
        }
        if(in_array('datetitle', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.datetitle ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'datetitle');
        }
        if(in_array('datecontent', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.datecontent ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'datecontent');
        }
        if(in_array('tripnodes', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.tripnodes ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'tripnodes');
        }
        if(in_array('detailsprice', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.detailsprice ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'detailsprice');
        }
        if($select == null){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.title ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'title');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.description ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'description');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.content ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'content');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metakeywords ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'metakeywords');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metadescription ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'metadescription');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.datetitle ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'datetitle');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.datecontent ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'datecontent');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.tripnodes ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'tripnodes');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.detailsprice ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'detailsprice');
        }
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id', 'left');
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.slug', $slug);
        $this->db->limit(1);
        return $this->db->get()->row_array();
    }
    public function get_by_product_category_id_array($product_category_id='', $select = array(), $lang = 'vi') {
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
        if(in_array('metakeywords', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metakeywords ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'metakeywords');
        }
        if(in_array('metadescription', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metadescription ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'metadescription');
        }
        if(in_array('datetitle', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.datetitle ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'datetitle');
        }
        if(in_array('datecontent', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.datecontent ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'datecontent');
        }
        if(in_array('tripnodes', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.tripnodes ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'tripnodes');
        }
        if(in_array('detailsprice', $select)){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.detailsprice ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'detailsprice');
        }
        if($select == null){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.title ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'title');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.description ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'description');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.content ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'content');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metakeywords ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'metakeywords');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metadescription ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'metadescription');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.datetitle ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'datetitle');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.datecontent ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'datecontent');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.tripnodes ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'tripnodes');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.detailsprice ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. 'detailsprice');
        }
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id', 'left');
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.product_category_id', $product_category_id);
        return $this->db->get()->row_array();
    }     

    public function rating_by_id($id=''){
        $this->db->select('count_rating, total_rating');
        $this->db->from($this->table);
        $this->db->where('id', $id);
        $this->db->where('is_deleted', 0);
        return $result = $this->db->get()->row_array();
    }
}