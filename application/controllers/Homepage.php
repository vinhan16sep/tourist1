<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Public_Controller {

	private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
    }

    public function index() {
    	$this->data['current_link'] = 'homepage';

    	$about = $this->about();
    	$courses = $this->courses();
    	$blogs = $this->blogs();

    	$this->data['about'] = $about;
    	$this->data['courses'] = $courses;
    	$this->data['blogs'] = $blogs;
        $this->render('homepage_view');
    }

    function about(){
    	$this->load->model('about_model');
    	$about = $this->about_model->get_by_id_in_about($this->data['lang']);
    	return $about;
    }

    function courses(){
    	$this->load->model('courses_model');
    	$courses = $this->courses_model->get_all_field('desc', array('title', 'description', 'content'), $this->data['lang'], 3, 0);
    	return $courses;
    }

    function blogs(){
    	$this->load->model('blog_model');
    	$blogs = $this->blog_model->get_all_field('desc', array('title', 'description', 'content'), $this->data['lang'], 3, 0);
    	return $blogs;
    }

}