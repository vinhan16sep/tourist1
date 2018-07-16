<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/2/2018
 * Time: 4:58 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Advertisement_model extends MY_Model {

    public $table = 'advertisement';

    public function __construct() {
        parent::__construct();
    }

    public function get_by_id_in_advertisement($id) {
        $this->db->select('*');
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where('id', $id);
        $this->db->limit(1);

        return $this->db->get()->row_array();
    }
}