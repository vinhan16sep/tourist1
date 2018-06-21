<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Public_Controller {

    public function __construct() {
        parent::__construct();
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
    }

    public function index() {
    	$this->data['current_link'] = 'homepage';

    	$about = $this->about();
    	$blogs = $this->blogs();

    	$this->data['about'] = $about;
    	$this->data['blogs'] = $blogs;
        $this->render('homepage_view');
    }

    function about(){
    	$this->load->model('about_model');
    	$about = $this->about_model->get_by_id_in_about($this->data['lang']);
    	return $about;
    }

    function blogs(){
    	$this->load->model('blog_model');
    	$blogs = $this->blog_model->get_all_field('desc', array('title', 'description', 'content'), $this->data['lang'], 3, 0);
    	return $blogs;
    }

    public function change_language(){
        if($this->session->userdata('langAbbreviation') == $this->input->get('lang')){
            return $this->return_api(HTTP_SUCCESS, MESSAGE_CHANGE_LANGUAGE_FAIL, $this->session->userdata('langAbbreviation'), null);
        }else{
            $this->session->set_userdata('langAbbreviation', $this->input->get('lang'));
            if($this->session->userdata('langAbbreviation') == $this->input->get('lang')){
                return $this->return_api(HTTP_SUCCESS, MESSAGE_CHANGE_LANGUAGE_SUCCESS, $this->session->userdata('langAbbreviation'), null);
            }
            return $this->return_api(HTTP_SUCCESS, MESSAGE_CHANGE_LANGUAGE_FAIL, $this->session->userdata('langAbbreviation'), null);
        }
    }
}