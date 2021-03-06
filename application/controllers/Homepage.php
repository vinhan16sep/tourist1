<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Public_Controller {

    protected $handbook_category_array = array(FIXED_HANDBOOK);
    protected $destination_category_array = array(FIXED_DESTINATION);
    protected $domestic_category_array = array();
    protected $international_category_array = array();
    protected $special_category_array = array();

    public function __construct() {
        parent::__construct();
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
        $this->load->model('product_model');
        $this->load->model('post_model');
        $this->load->model('post_category_model');
        $this->load->model('banner_model');
        $this->load->model('product_category_model');

        $this->get_handbook_data();
        $this->get_destination_data();
        $this->get_domestic_data();
        $this->get_international_datas();
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
    function get_multiple_products_with_category($categories, $parent_id = 0, &$sub){
        foreach ($categories as $key => $item){
            if (!empty($item) && $item['id'] == $parent_id){
                $sub[] = $categories[$key];
                unset($categories[$key]);
                $this->get_multiple_products_with_category($categories, $item['parent_id'], $sub);
            }
        }
    }
    function get_all_product_in_category($tour_in_category,$number_tour=0){
        $this->get_multiple_products_with_category($this->product_category_model->get_all_lang(array(),$this->data['lang']),$tour_in_category['parent_id'],$sub);
        if(empty($sub)){
            $tour_in_category['sub'] = $sub;
        }else{
            $tour_in_category['sub'] = array_reverse($sub);
        }
        $this->get_multiple_products_with_category_id($this->product_category_model->get_all_lang(array(),$this->data['lang']), $tour_in_category['id'], $ids);
        if(empty($ids)){
            $ids = array();
        }
        array_unshift($ids,$tour_in_category['id']);
        return $this->product_model->get_all_product_category_id_array($ids,$number_tour,$this->data['lang']);
    }
    public function index() {
        //banner
        $this->data['banner'] = $this->banner_model->get_all_lang(array('title','description'),$this->data['lang']);
        //tour
        $this->data['domestic'] = $this->product_category_model->get_by_id(FIXED_DOMESTIC_CATEGORY_ID,array('title','content'),$this->data['lang'],0);
        $this->data['international'] = $this->product_category_model->get_by_id(FIXED_INTERNATIONAL_CATEGORY_ID,array('title','content'),$this->data['lang'],0);
        $this->data['specialtour'] = $this->product_category_model->get_by_id(FIXED_SPECIAL_CATEGORY_ID,array('title','content'),$this->data['lang'],0);
        /**
         * GET TOURS IN EACH CATEGORY
         */
        $this->data['domestic_tours'] = $this->product_model->get_tours_in_array_category_id($this->domestic_category_array, $this->data['lang'],0);
        $this->data['international_tours'] = $this->product_model->get_tours_in_array_category_id($this->international_category_array, $this->data['lang'],0);
        $this->data['special_tours'] = $this->product_model->get_tours_in_array_category_id(array(FIXED_SPECIAL_CATEGORY_ID), $this->data['lang'],0);

        /**
         * GET POSTS IN HANDBOOK
         */
        $this->data['handbook'] = $this->post_category_model->get_by_id(FIXED_HANDBOOK,array('title','content'),$this->data['lang'],0);
        $this->data['post_handbook'] = $this->post_model->get_post_in_array_category_id($this->handbook_category_array, $this->data['lang'],2);
        /**
         * GET POSTS IN DESTINATION

         */
        $this->data['destination'] = $this->post_category_model->get_by_id(FIXED_DESTINATION,array('title','content'),$this->data['lang'],0);
        $this->data['post_destination'] = $this->post_model->get_post_in_array_category_id($this->destination_category_array, $this->data['lang'],3);

        //post
        $this->data['services'] = $this->post_category_model->get_by_slug('dich-vu','asc',$this->data['lang']);
        $this->data['post_services'] = $this->post_model->get_by_post_category_id_lang($this->data['services']['id'],array('title'),$this->data['lang'],2);
        $this->data['visa'] = $this->post_category_model->get_by_slug('visa','asc',$this->data['lang']);
        $this->data['blogs'] = $this->post_category_model->get_by_slug('blogs','asc',$this->data['lang']);
        $this->data['post_blogs'] = $this->post_model->get_by_post_category_id_lang($this->data['blogs']['id'],array('title','description'),$this->data['lang'],3);
        $this->render('homepage_view');
    }
    public function ajax_home(){
        return $this->return_api(HTTP_SUCCESS,'',$this->lang->line($this->input->get('key')));
    }

    public function fetch_weather_language(){
        $result = [];
        $data = json_decode($this->input->get('data'));
        foreach($data as $key => $value){
            $result[$key] = $this->lang->line('weather_city')[$value];
        }
        return $this->return_api(HTTP_SUCCESS,'', $result);
    }

    public function get_handbook_data($parent = FIXED_HANDBOOK){
        $categories = $this->post_category_model->fetch_post_category_menu($parent);

        foreach($categories as $key => $category){
            array_push($this->handbook_category_array, $category['id']);
            $this->get_handbook_data($category['id']);
        }
    }
    public function get_destination_data($parent = FIXED_DESTINATION){
        $categories = $this->post_category_model->fetch_post_category_menu($parent);

        foreach($categories as $key => $category){
            array_push($this->destination_category_array, $category['id']);
            $this->get_destination_data($category['id']);
        }
    }

    public function get_domestic_data($parent = FIXED_DOMESTIC_CATEGORY_ID){
        $categories = $this->product_category_model->fetch_product_category_menu($parent);

        foreach($categories as $key => $category){
            array_push($this->domestic_category_array, $category['id']);
            $this->get_domestic_data($category['id']);
        }
    }

    public function get_international_datas($parent = FIXED_INTERNATIONAL_CATEGORY_ID){
        $categories = $this->product_category_model->fetch_product_category_menu($parent);

        foreach($categories as $key => $category){
            array_push($this->international_category_array, $category['id']);
            $this->get_international_datas($category['id']);
        }
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

    public function build_new_category($categorie, $parent_id = 0,&$result, $id = "",$char=""){
        $cate_child = array();
        foreach ($categorie as $key => $item){
            if ($item['parent_id'] == $parent_id){
                $cate_child[] = $item;
                unset($categorie[$key]);
            }
        }
        if ($cate_child){
            foreach ($cate_child as $key => $value){
                $select = ($value['id'] == $id)? 'selected' : '';
                $result.='<option value="'.$value['id'].'">'.$char.$value['title'].'</option>';
                $this->build_new_category($categorie, $value['id'],$result, $id, $char.'---|');
            }
        }
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