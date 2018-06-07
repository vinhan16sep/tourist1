<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/2/2018
 * Time: 4:58 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class About_model extends MY_Model {

    public $table = 'about';

    public function __construct() {
        parent::__construct();
    }

    public function get_by_id_in_about($lang = '') {
        $this->db->query('SET SESSION group_concat_max_len = 10000000');
        $this->db->select($this->table .'.*, GROUP_CONCAT('. $this->table_lang .'.title ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_title,
                                GROUP_CONCAT('. $this->table_lang .'.description ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_description,
                                GROUP_CONCAT('. $this->table_lang .'.content ORDER BY '. $this->table_lang .'.language separator \' ||| \') as '. $this->table .'_content
                        ');
        $this->db->from($this->table);
        $this->db->join($this->table_lang, $this->table_lang .'.'. $this->table .'_id = '. $this->table .'.id', 'left');
        if($lang != ''){
            $this->db->where($this->table_lang .'.language', $lang);
        }
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->limit(1);

        return $this->db->get()->row_array();
    }
}