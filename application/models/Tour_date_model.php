<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tour_date_model extends MY_Model {

    public $table = 'tour_date';

    public function __construct() {
        parent::__construct();
    }
	public function delete_tour_lang($id){
		if($this->db->delete($this->table_lang, array('id' => $id))){
			return true;
		}
		return false;
	}
    function update_language($id, $data){
        $this->db->where('id', $id);
        return $this->db->update($this->table_lang, $data);
    }
    public function get_all_tour_date_id($where,$lang=""){
        $this->db->where("tour_date_id",$where);
        if($lang != ""){
        	$this->db->where("language",$lang);
        }
        return $this->db->get($this->table_lang)->result_array();
    }

    public function get_by_product_id($product_id, $select = array('title', 'description', 'content'), $lang = '') {
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
        if($select == null){
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.title ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_title');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.description ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_description');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.content ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_content');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metakeywords ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_metakeywords');
            $this->db->select('GROUP_CONCAT('. $this->table_lang .'.metadescription ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_metadescription');
        }
        
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id', 'left');
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where($this->table .'.product_id', $product_id);
        
        return $this->db->get()->result_array();
    }
}
