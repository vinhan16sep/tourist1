<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Public_Controller {

	private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->load->model('about_model');
        $this->load->model('our_message_model');
        $this->load->model('our_methods_model');
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
    }

    public function index() {
    	$detail = $this->about_model->get_by_id_in_about($this->data['lang']);
    	$our_message = $this->our_message_model->get_all_by_our_message_with_pagination_search(3, null, $this->data['lang']);
    	$our_methods = $this->our_methods_model->get_all_by_our_methods_with_pagination_search(4, null, $this->data['lang']);

    	$this->data['detail'] = $detail;
    	$this->data['our_message'] = $our_message;
    	$this->data['our_methods'] = $our_methods;
    	$this->data['current_link'] = 'about';
        $this->render('about_view');
    }

}