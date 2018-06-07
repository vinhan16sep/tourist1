<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Document extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('document_model');
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
        $this->load->helper('cookie');
    }

    public function index() {
    	$this->data['current_link'] = 'document';

        $total_rows  = $this->document_model->count_search();
        $this->load->library('pagination');
        $config = array();
        if ($this->uri->segment(1) != 'vi' && $this->uri->segment(1) != 'en') {
            $base_url = base_url('document/index');
            $uri_segment = 3;
        }else{
            $base_url = base_url($this->data['lang']. '/document/index');
            $uri_segment = 4;
        }
        
        $per_page = 1;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;

    	$result = $this->document_model->get_all_field('desc', array('title', 'description', 'content'), $this->data['lang'], $per_page, $this->data['page']);
        $this->data['result'] = $result;

        $this->render('document_view');
    }

    public function detail($slug) {
    	$this->data['current_link'] = 'detail_document';
        $this->data['current_slug'] = $slug;

        $detail = $this->document_model->get_by_slug($slug, array('title', 'description', 'content'), $this->data['lang']);
        $this->data['detail'] = $detail;

        $this->render('detail_document_view');
    }

}