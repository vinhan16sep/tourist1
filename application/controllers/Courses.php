<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends Public_Controller {

	private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
    }

    public function index() {
    	$this->data['current_link'] = 'courses';

        $total_rows  = $this->courses_model->count_search();
        $this->load->library('pagination');
        $config = array();
        if ($this->uri->segment(1) != 'vi' && $this->uri->segment(1) != 'en') {
            $base_url = base_url('courses/index');
            $uri_segment = 3;
        }else{
            $base_url = base_url($this->data['lang']. '/courses/index');
            $uri_segment = 4;
        }
        
        $per_page = 1;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;

        $this->render('courses_view');
    }

    public function detail($slug) {
        $this->data['current_link'] = 'detail_courses';
        $this->data['current_slug'] = $slug;


        $detail = $this->courses_model->get_by_slug($slug, array('title', 'description', 'content'), $this->data['lang']);
        $this->data['detail'] = $detail;
        $this->render('detail_courses_view');
    }

}