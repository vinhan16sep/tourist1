<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
        $this->load->model('post_model');
    }

    public function index() {
        $this->data['about'] = $this->post_model->get_all_item(FIXED_ABOUT_US, $this->data['lang']);

        $this->render('about_view');
    }

}