<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customize extends Admin_Controller {
	private $request_language_template = array();
    private $author_data = array();
    function __construct(){
        parent::__construct();
        $this->load->model('customize_model');
        $this->load->helper('common');
        $this->author_data = handle_author_common_data();
    }
    
	public function index(){
        $this->temp(0, 'index');
    }

    public function success(){
        $this->temp(1, 'success');
    }

    public function cancel(){
        $this->temp(2, 'cancel');
    }

    function temp ($status, $page){
        $keywords = '';
        $date_from = '';
        $date_to = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        if($this->input->get('search_date')){
            $date = $this->input->get('search_date');
            $date = explode(' - ', $date);
            $date_from = date_format(date_create($date[0]),"Y-m-d 00:00:00");
            $date_to = date_format(date_create($date[1]),"Y-m-d 23:59:59");
        }
        $total_rows  = $this->customize_model->count_search_customize($status);
        if($keywords != ''){
            $total_rows  = $this->customize_model->count_search_customize($status, $keywords);
        }
        if($this->input->get('search_date') != ''){
            $total_rows  = $this->customize_model->count_search_customize($status, $keywords, $date_from, $date_to);
        }

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/booking/' .$page);
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->customize_model->get_all_customize_with_pagination_search($status, $per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->customize_model->get_all_customize_with_pagination_search($status, $per_page, $this->data['page'], $keywords);
        }
        if($this->input->get('search_date') != ''){
            $result = $this->customize_model->get_all_customize_with_pagination_search($status, $per_page, $this->data['page'], $keywords, $date_from, $date_to);
        }
        foreach($result as $key => $value){
            $array_date = array_combine(json_decode($value['datetitle']), json_decode($value['content']));
            $result[$key]['array_date'] = $array_date;
        }
        $this->data['booking'] = $result;
        $this->data['date'] = $this->input->get('search_date');
        $this->data['keywords'] = $keywords;
        $this->render('admin/customize/list_customize_view');
    }

    public function compare($id=''){
        $this->output->enable_profiler(TRUE);
        $this->load->model('product_model');
        $this->load->model('tour_date_model');

        $product = $this->product_model->get_by_id($id, array('title', 'description', 'content','metakeywords','metadescription'));
        $product = build_language('product', $product, array('title', 'description', 'content','metakeywords','metadescription'), $this->page_languages);
        $parent_title = $this->build_parent_title($product['product_category_id']);
        $product['parent_title'] = $parent_title;

        $tour_date = $this->tour_date_model->get_all_with_pagination_search();
        $tour_date_output = array();
        foreach ($tour_date as $key => $value) {
            $tour_date_output[$key] = $this->tour_date_model->get_by_id($value['id'], array('title', 'content'));

            $title = explode('|||', $tour_date_output[$key]['tour_date_title']);
            $tour_date_output[$key]['title_en'] = $title[0];
            $tour_date_output[$key]['title_vi'] = $title[1];

            $content = explode('|||', $tour_date_output[$key]['tour_date_content']);
            $tour_date_output[$key]['content_en'] = $content[0];
            $tour_date_output[$key]['content_vi'] = $content[1];
        }

        $this->data['tour_date'] = $tour_date_output;
        $this->data['product'] = $product;
        $this->render('admin/customize/compare_customize_view');
    }

    public function status_success(){
        $id = $this->input->get('id');
        $data = array('status' => 1);
        $update = $this->customize_model->common_update($id, $data);
        if($update == 1){
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200)));
        }
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(400)
                    ->set_output(json_encode(array('status' => 400)));
    }

    public function status_cancel(){
        $id = $this->input->get('id');
        $data = array('status' => 2);
        $update = $this->customize_model->common_update($id, $data);
        if($update == 1){
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200)));
        }
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(400)
                    ->set_output(json_encode(array('status' => 400)));
    }

    protected function build_parent_title($parent_id){
        $this->load->model('product_category_model');
        $sub = $this->product_category_model->get_by_id($parent_id, array('title'));

        if($parent_id != 0){
            $title = explode('|||', $sub['product_category_title']);
            $sub['title_en'] = $title[0];
            $sub['title_vi'] = $title[1];

            $title = $sub['title_vi'];
        }else{
            $title = 'Danh mục gốc';
        }
        return $title;
    }



}

/* End of file customize.php */
/* Location: ./application/controllers/admin/customize.php */