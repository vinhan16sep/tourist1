<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends Public_Controller {
  
    public function __construct() {
        parent::__construct();
        $this->load->model('localtion_model');
        $this->load->model('area_model');
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
    }

    public function index() {
        $this->data['keyword'] = '';
        $this->data['category'] = '';
        if($this->input->get('search')){
            $this->data['keyword'] = $this->input->get('search');
        }
        if($this->input->get('category')){
            $this->data['category'] = $this->input->get('category');
        }
        $total_rows  = $this->localtion_model->count_searchs($this->data['keyword'],$this->data['category'],$this->data['lang']);
        $this->load->library('pagination');
        $base_url = base_url('location/index');
        $uri_segment = 3;
        $per_page = 9;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment,$this->lang->line('next'),$this->lang->line('prev'),$this->lang->line('last'),$this->lang->line('first')) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;

        $this->data['result'] = $this->localtion_model->get_all_with_pagination_searchs('asc', $this->data['lang'], $per_page, $this->data['page'],$this->data['keyword'],$this->data['category']);
        $this->data['area'] = $this->area_model->get_all_area();
        $this->render('location_view');
    }
    public function get_multiple_posts_with_category_id($categories, $parent_id = 0, &$id_array){
        foreach ($categories as $key => $item){
            if ($item['parent_id'] == $parent_id){
                $id_array[] = $item['id'];
                unset($categories[$key]);
                $this->get_multiple_posts_with_category_id($categories, $item['id'], $id_array);
            }
        }
    }
    public function detail($slug){
        $this->data['detail'] = $this->localtion_model->fetch_row_by_slugs($slug,$this->data['lang']);
        $this->data['comment'] = $this->comment($this->data['detail']['id']);
        $this->data['count_comment'] = $this->count_comment($this->data['detail']['id']);
        $this->data['localtion_array'] = $this->localtion_model->get_all_localtion_area($this->data['detail']['area_id'],array($this->data['detail']['id']),3,$this->data['lang']);
        $this->render('detail_localtion_view');
    }
    protected function comment($product_id, $type = 2) {
        $this->load->model('comment_model');
        $comment = $this->comment_model->get_all_by_product_id($product_id, 5, 0,$type);
        if($comment){
            return $comment;
        }
    }
    protected function count_comment($product_id, $type = 2){
        $this->load->model('comment_model');
        $count_comment = $this->comment_model->count_all_by_product_id($product_id,$type);
        return $count_comment;
    }
}