<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends Public_Controller {
	public function __construct() {
        parent::__construct();
    }

	public function register(){
        $this->load->library('ion_auth');
        $username = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $age = $this->input->post('age');
        $company = $this->input->post('company');
        $password = $this->input->post('password');

        $additional_data = array(
            'first_name' => '',
            'last_name' => $username,
            'company' => $company,
			'phone' => $phone,
			'age' => $age
        );
        $count_email = $this->ion_auth->email_check($email);
        if($username == '' || $email == '' || $phone == '' || $password == ''){
        	$isExits = false;
        }else{
            if($count_email){
                $isExits = false;
            }else{
                $group = array('2');
            
                if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){
                    $this->load->helper('cookie');
                    set_cookie('remember_email',$email,180*24*60*60);
                    $isExits = true;
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                }
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array('status' => 200, 'reponse' => $reponse, 'isExits' => $isExits, 'count_email' => $count_email)));
    }

    public function register_courses(){
        $this->load->model('register_courses_model');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $age = $this->input->post('age');
        $company = $this->input->post('company');
        $courses_id = $this->input->post('courses_id');

        $data = array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'age' => $age,
            'office' => $company,
            'courses_id' => $courses_id,
            'created_at' => date('Y-m-d H:i:s')
        );

        if($name == '' || $email == '' || $phone == ''){
            $isExits = false;
        }else{
            if(!empty($this->register_courses_model->common_insert($data))){
                $isExits = true;
                $reponse = array(
                    'csrf_hash' => $this->security->get_csrf_hash()
                );
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array('status' => 200, 'reponse' => $reponse, 'isExits' => $isExits)));
    }

    function register_email_exists(){
    	$this->load->model('ion_auth_model');
    	$email = $this->input->get('register_mail');
    	$check = $this->ion_auth_model->email_check($email);
    	if($check == true){
    		echo json_encode(FALSE);
    	}else{
    		echo json_encode(TRUE);
    	}
    }

}

/* End of file Client.php */
/* Location: ./application/controllers/Client.php */