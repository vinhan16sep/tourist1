<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tours extends Public_Controller {

    private $request_vehicles_icon = array(
        '', 'fa-ban', 'fa-plane', 'fa-ship', 'fa-train', 'fa-bus', 'fa-motorcycle', 'fa-bicycle', 'fa-blind'
    );

    public function __construct() {
        parent::__construct();
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
        $this->load->model('product_model');
        $this->load->model('product_category_model');
        $this->load->model('localtion_model');
        $this->load->library('image_lib');
        $this->load->helper('captcha');
        $this->load->helper('common');

        $this->data['request_vehicles_icon'] = $this->request_vehicles_icon;
    }

    public function index() {
        $this->data['current_link'] = 'tours';
    }

    function get_multiple_products_with_category_id($categories, $parent_id = 0, &$ids){
        foreach ($categories as $key => $item){
            if ($item['parent_id'] == $parent_id){
                $ids[] = $item['id'];
                unset($categories[$key]);
                $this->get_multiple_products_with_category_id($categories, $item['id'], $ids);
            }
        }
    }
    public function category($slug) {
        if($this->product_category_model->find_rows(array('slug' => $slug,'is_deleted' => 0,'is_activated' => 0)) != 0){
            $detail = $this->product_category_model->get_by_slug_lang($slug,array(),$this->data['lang']);
            $this->get_multiple_products_with_category($this->product_category_model->get_all_lang(array(),$this->data['lang']),$detail['parent_id'],$sub);
            if(empty($sub)){
                $detail['sub'] = $sub;
            }else{
                $detail['sub'] = array_reverse($sub);
            }
            $this->get_multiple_products_with_category_id($this->product_category_model->get_all_lang(array(),$this->data['lang']), $detail['id'], $ids);
            if(empty($ids)){
                $ids = array();
            }
            array_unshift($ids,$detail['id']);$total_rows  = 0;
            $check = $this->product_model->get_all_product_category_id_array($ids,'',$this->data['lang'],'',0);
            if(!empty($check)){
                $total_rows  = count($check);
            }
            $this->load->library('pagination');
            $base_url = base_url('tours/category/'.$slug);
            $uri_segment = 4;
            $per_page = 9;
            foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
                $config[$key] = $value;
            }
            $this->pagination->initialize($config);
            $this->data['page_links'] = $this->pagination->create_links();
            $this->data['page'] = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
            $product_array = $this->product_model->get_all_product_category_id_array($ids,$per_page,$this->data['lang'],'',0,$this->data['page']);
            $this->data['detail'] = $detail;
            $this->data['product_array'] = $this->product_model->get_all_product_category_id_array($ids,$per_page,$this->data['lang'],'',0,$this->data['page']);
            $this->render('list_tours_view');
        }else{
            $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
            redirect('/', 'refresh');
        }
    }

    function get_multiple_products_with_category($categories, $parent_id = 0, &$sub){
        foreach ($categories as $key => $item){
            if (!empty($item) && $item['id'] == $parent_id){
                $sub[] = $categories[$key];
                unset($categories[$key]);
                $this->get_multiple_products_with_category($categories, $item['parent_id'], $sub);
            }
        }
    }
    public function detail($slug){
        $this->load->model('rating_model');
        if($this->product_model->find_rows(array('slug' => $slug,'is_deleted' => 0,'is_activated' => 0)) != 0){
            $this->load->helper('form');
            $this->load->library('form_validation');
            $detail = $this->product_model->get_by_slug_lang($slug,array(),$this->data['lang']);
            $this->get_multiple_products_with_category($this->product_category_model->get_all_lang(array(),$this->data['lang']),$detail['product_category_id'],$sub);
            if(empty($sub)){
                $detail['sub'] = $sub;
            }else{
                $detail['sub'] = array_reverse($sub);
            }
            $detail['datetitle'] = json_decode($detail['datetitle']);
            $detail['datecontent'] = json_decode($detail['datecontent']);
            $detail['vehicles'] = json_decode($detail['vehicles']);
            $librarylocaltion = json_decode($detail['librarylocaltion']);
            if(!empty($librarylocaltion)){
                for($i=0;$i < count($librarylocaltion);$i++){
                    $librarylocaltions = explode(',',$librarylocaltion[$i]);
                    if(!empty($librarylocaltions)){
                        for($j=0;$j < count($librarylocaltions);$j++){
                            $library= $this->localtion_model->get_by_id_array_lang($librarylocaltions[$j],array(),$this->data['lang']);
                            if(!empty($library['id'])){
                                $librarys[$i][] =$library;
                            }else{
                                $librarys[$i][] = "";
                            }
                        }
                    }
                }
                $detail['librarylocaltion'] = $librarys;
            }else{
                $detail['librarylocaltion'] = $librarylocaltion;
            }
            $this->data['detail'] = $detail;
            if($this->data['detail']['date'] != "0000-00-00 00:00:00" && $this->data['detail']['date'] != "1970-01-01 08:00:00"){
                $rmtime = str_replace(" 00:00:00","",$this->data['detail']['date']);
                $date= explode("-",$rmtime);
                if(count($date) == 3){
                    $this->data['detail']['date'] = $date[2]."/".$date[1]."/".$date[0];
                }else{
                    $this->data['detail']['date'] = "";
                }
            }else{
                $this->data['detail']['date'] = "";
            }
            if(!empty($this->data['detail']['dateimg'])){
                    $this->data['detail']['dateimg'] = json_decode($this->data['detail']['dateimg']);
            }

            /**
             * RATING SYSTEM
             * [$ip description]
             * @var [type]
             */
            $ip = $_SERVER['SERVER_ADDR'];
            // $this->session->unset_userdata($ip);
            $check_session = false;
            if($this->session->has_userdata($ip) && in_array($detail['id'], $this->session->userdata($ip))){
                $check_session = true;
            }
            $id = $detail['id'];
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
            /**
             * END RATING SYSTEM
             */

            $this->render('detail_tours_view');
        }else{
            $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
            redirect('/', 'refresh');
        }
    }

    public function created_rating(){
        $isExits = false;
        $ip = $_SERVER['SERVER_ADDR'];
        if($this->session->has_userdata($ip) && in_array($this->input->get('product_id'), $this->session->userdata($ip))){
            $isExits = false;
        }else{
            $this->session->set_userdata($ip, array($ip, $this->input->get('product_id')));
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
            'img_url' => base_url('captcha'),
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
