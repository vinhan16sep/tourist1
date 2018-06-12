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
}
