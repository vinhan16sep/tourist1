<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends Public_Controller {
  
    public function __construct() {
        parent::__construct();
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
        $this->load->model('post_model');
        $this->load->model('post_category_model');
    }

    public function index() {
        $this->data['current_link'] = 'post';
    }

    public function category($slug) {

        $category = $this->post_category_model->fetch_row_by_slug($slug, $this->data['lang']);

        $total_rows  = $this->post_model->count_search();
        $this->load->library('pagination');
        $base_url = base_url('post/category');
        $uri_segment = 4;
        $per_page = 10;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;

        $this->data['category'] = $category;
        $this->data['result'] = $this->post_model->get_all_with_pagination('desc', $this->data['lang'], $per_page, $this->data['page'], $category['post_category_id']);

        $this->render('post_view');
    }

    public function detail($slug){
        $this->data['detail'] = $this->post_model->fetch_row_by_slug($slug, $this->data['lang']);

        $this->render('detail_post_view');
    }
}