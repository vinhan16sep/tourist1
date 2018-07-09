<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    function __construct(){
        parent::__construct();
		$this->load->model('post_model');
		$this->load->model('product_model');
		$this->load->model('localtion_model');
		$this->load->model('booking_model');
		$this->load->model('customize_model');
    }

    public function index(){
    	$this->data['product'] = $this->product_model->find_rows(array('is_deleted' => 0));
    	$this->data['post'] = $this->post_model->find_rows(array('is_deleted' => 0));
    	$this->data['location'] = $this->localtion_model->find_rows(array('is_deleted' => 0));
    	$this->data['booking_success'] = $this->booking_model->get_all_booking_with_pagination_search(1, 5, 0);
    	$this->data['booking_preprocessor'] = $this->booking_model->get_all_booking_with_pagination_search(0, 5, 0);
    	$this->data['booking_error'] = $this->booking_model->get_all_booking_with_pagination_search(2, 5, 0);
    	$this->data['customize_success'] = $this->customize_model->get_all_customize_with_pagination_search(1, 5, 0);
    	$this->data['customize_preprocessor'] = $this->customize_model->get_all_customize_with_pagination_search(0, 5, 0);
    	$this->data['customize_error'] = $this->customize_model->get_all_customize_with_pagination_search(2, 5, 0);
        $this->render('admin/dashboard_view');
    }
}