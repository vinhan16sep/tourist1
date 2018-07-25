<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends Public_Controller{
	private $author_data = array();
	public function __construct() {
        parent::__construct();
        $this->load->helper('common');
        $this->load->model('rating_model');
        $this->load->model('booking_model');
    }

	public function index(){
        $this->load->helper('form');
        if($this->input->post()){
        	if(empty($this->input->post('product_id'))){
        		return $this->return_api(HTTP_NOT_FOUND,$this->lang->line('booking_errors'));
        	}
        	if(empty($this->input->post('title')) || empty($this->input->post('email')) || empty($this->input->post('first_name')) || empty($this->input->post('last_name')) || empty($this->input->post('phone')) || empty($this->input->post('time')) || empty($this->input->post('country')) || empty($this->input->post('adults')) || empty($this->input->post('children')) || empty($this->input->post('infants'))){
                $reponse = array(
                    'csrf_hash' => $this->security->get_csrf_hash()
                );
    			return $this->return_api(HTTP_SUCCESS,$this->lang->line('booking_require'),$reponse,false);
        	}
    		if(trim($this->input->post('email')) != trim($this->input->post('email_confirm'))){
                $reponse = array(
                    'csrf_hash' => $this->security->get_csrf_hash()
                );
    			return $this->return_api(HTTP_SUCCESS,$this->lang->line('create_errors_email'),$reponse,false);
    		}
            $date= explode("/",$this->input->post('time'));
            $time=date('Y-m-d H:i:s', strtotime($date[1]."/".$date[0]."/".$date[2]));
            $shared_request = array(
                'title' => $this->input->post('title'),
                'product_id' => $this->input->post('product_id'),
                'email' => trim($this->input->post('email')),
                'first_name ' => $this->input->post('first_name'),
                'last_name ' => $this->input->post('last_name'),
                'phone ' => $this->input->post('phone'),
                'time' => $time,
                'country' => $this->input->post('country'),
                'adults' => $this->input->post('adults'),
                'children' => $this->input->post('children'),
                'infants' => $this->input->post('infants'),
                'content' => $this->input->post('message'),
                'created_at' => date('Y-m-d H:i:s', now()),
                'created_by' => $this->input->post('first_name') . ' ' . $this->input->post('last_name'),
                'updated_at' => date('Y-m-d H:i:s', now()),
                'updated_by' => $this->input->post('first_name') . ' ' . $this->input->post('last_name')
            );
            $insert = $this->booking_model->common_insert($shared_request);
            if($insert){
                $reponse = array(
                    'csrf_hash' => $this->security->get_csrf_hash()
                );
                return $this->return_api(HTTP_SUCCESS,$this->lang->line('booking_success'),$reponse);
            }
            return $this->return_api(HTTP_NOT_FOUND,$this->lang->line('booking_errors'));
		}
	}

}

/* End of file Rating.php */
/* Location: ./application/controllers/Rating.php */