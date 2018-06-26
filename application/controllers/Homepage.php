<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Public_Controller {

    protected $category_array = array();

    public function __construct() {
        parent::__construct();
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
        $this->load->model('product_model');
        $this->load->model('post_model');
        $this->load->model('post_category_model');
        $this->load->model('banner_model');
        $this->load->model('product_category_model');

        $this->get_domestic_menu();
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
        $this->get_multiple_products_with_category($this->product_category_model->get_all_lang(array(),'vi'),$tour_in_category['parent_id'],$sub);
        if(empty($sub)){
            $tour_in_category['sub'] = $sub;
        }else{
            $tour_in_category['sub'] = array_reverse($sub);
        }
        $this->get_multiple_products_with_category_id($this->product_category_model->get_all_lang(), $tour_in_category['id'], $ids);
        if(empty($ids)){
            $ids = array();
        }
        array_unshift($ids,$tour_in_category['id']);
        $check = 0;
        $tour_all_in_category=array();
        for ($i=0; $i < count($ids); $i++) {
            $tour =$this->product_model->get_by_product_category_id_array($ids[$i],array('title'),'vi');
            if($tour['id'] != ''){
                $tour_all_in_category[$check] = $this->product_model->get_by_product_category_id_array($ids[$i],array('title'),'vi');
                $tour_all_in_category[$check]['parent'] = $this->product_category_model->get_by_id_lang($tour_all_in_category[$check]['product_category_id']);
                $check++;
                if($check == $number_tour){
                    break;
                }
            }
        }
        return $tour_all_in_category;
    }
    public function index() {
        //banner
        $this->data['banner'] = $this->banner_model->get_all_lang(array('title','description'),'vi');
        //tour
        $this->data['domestic'] = $this->product_category_model->get_by_slug_lang('trong-nuoc',array(),'vi');
        $this->data['tour_domestic'] = $this->get_all_product_in_category($this->data['domestic'],3);
        $this->data['international'] = $this->product_category_model->get_by_slug_lang('nuoc-ngoai',array(),'vi');
        $this->data['tour_international'] = $this->get_all_product_in_category($this->data['international'],3);
        $this->data['specialtour'] = $this->product_category_model->get_by_slug_lang('tour-dac-biet',array(),'vi');
        $this->data['tour_specialtour'] = $this->get_all_product_in_category($this->data['specialtour'],6);

        $this->data['domestic_tours'] = $this->product_model->get_tours_in_array_category_id($this->category_array, $this->data['lang']);

        //post
        $this->data['services'] = $this->post_category_model->get_by_slug('dich-vu','asc','vi');
        $this->data['post_services'] = $this->post_model->get_by_post_category_id_lang($this->data['services']['id'],array('title'),'vi',2);
        $this->data['visa'] = $this->post_category_model->get_by_slug('visa','asc','vi');
        $this->data['blogs'] = $this->post_category_model->get_by_slug('blogs','asc','vi');
        $this->data['post_blogs'] = $this->post_model->get_by_post_category_id_lang($this->data['blogs']['id'],array('title','description'),'vi',3);
        $this->render('homepage_view');
    }

    public function get_domestic_menu($parent = 22){
        $categories = $this->product_category_model->fetch_domestic_menu($parent);

        foreach($categories as $key => $category){
            array_push($this->category_array, $category['id']);
            $this->get_domestic_menu($category['id']);
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