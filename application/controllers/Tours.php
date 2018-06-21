<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tours extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
    }

    public function index() {
        $this->data['current_link'] = 'tours';

        $this->render('list_tours_view');
    }

    public function detail() {

        $this->render('detail_tours_view');
    }

}