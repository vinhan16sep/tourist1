<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tours extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
    }

    public function index() {
        $this->data['current_link'] = 'homepage';

        $this->render('list_tours_view');
    }

    public function detail() {

        $this->render('detail_tours_view');
    }

}