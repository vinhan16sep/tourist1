<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tours extends Public_Controller {

    private $_lang = '';

    public function __construct() {
        parent::__construct();
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
        $this->load->library('image_lib');
        $this->load->helper('captcha');
        $this->load->model('product_model');
    }

    public function index() {
        $this->data['current_link'] = 'homepage';

        $this->render('list_tours_view');
    }

    public function detail() {

        $ip = $_SERVER['SERVER_ADDR'];
        // $this->session->unset_userdata($ip);
        $check_session = false;
        if($this->session->has_userdata($ip)){
            $check_session = true;
        }
        $id = 91;
        $rating = $this->product_model->rating_by_id($id);
        $count_rating = $rating['count_rating'];
        $total_rating = $rating['total_rating'];
        if($count_rating != 0 && $total_rating != 0){
            $new_rating = round($total_rating / $count_rating, 1);
        }else{
            $new_rating = 0;
        }
        $this->data['count_rating'] = $count_rating;
        $this->data['rating'] = $new_rating;
        $this->data['check_session'] = $check_session;
        $this->render('detail_tours_view');
    }

    public function created_rating(){
        $isExits = false;
        $ip = $_SERVER['SERVER_ADDR'];
        if($this->session->has_userdata($ip)){
            $isExits = false;
        }else{
            $this->session->set_userdata($ip, $ip);
            $this->session->mark_as_temp($ip, 3600);
            $product_id = $this->input->get('product_id');
            $new_rating = $this->input->get('rating');
            $product_detail = $this->product_model->find($product_id);
            $total_rating = $product_detail['total_rating'];
            $count_rating = $product_detail['count_rating'];
            $total_rating = $total_rating + $new_rating;
            $count_rating = $count_rating + 1;
            $data = array(
                'total_rating' => $total_rating,
                'count_rating' => $count_rating
            );
            $insert  = $this->product_model->common_update($product_id, $data);
            if($insert){
                $this->data['session_id'] = session_id();
                $isExits = true;
            }
        }

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array('status' => 200, 'isExits' => $isExits)));
    }

    public function created_captcha(){
        $vals = array(
            'img_path' => './captcha/',
            'img_url' => 'http://localhost/tourist1/captcha',
            'img_width' => '120',
            'img_height' => 34,
            'expiration' => 0,
            'word_length' => 6,
            'font_size' => 25,
            'img_id' => 'Imageid',
            'pool' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'colors' => array(
                'background' => array(235, 235, 235),
                'border' => array(51, 51, 51),
                'text' => array(255, 0, 0),
                'grid' => array(255, 255, 255)
            )
        );    
        $captcha = create_captcha($vals);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array('status' => 200, 'captcha' => $captcha)));
    }

}