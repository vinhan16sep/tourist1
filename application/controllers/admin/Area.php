<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Area extends Admin_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('area_model');
        $this->load->model('localtion_model');
        $this->load->model('product_model');
        $this->load->helper('common');
        $this->data['template'] = build_template();
        $this->data['controller'] = $this->area_model->table;
        $this->load->model('category_model');
    }

    public function index() {
        $this->data['keyword'] = '';
        if($this->input->get('search')){
            $this->data['keyword'] = $this->input->get('search');
        }
        $this->load->library('pagination');
        $per_page = 10;
        $total_rows  = $this->area_model->count_searchs($this->data['keyword']);
        $config = $this->pagination_config(base_url('admin/'.$this->data['controller'].'/index'), $total_rows, $per_page, 4);
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['result'] = $this->area_model->get_all_with_pagination_searchs('desc',$per_page, $this->data['page'], $this->data['keyword']);
        $this->render('admin/area/list_area_view');
    }
    public function create(){
        $this->load->helper('form');
        if($this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('vi', 'Khu vực đến tiếng Việt', 'required');
            $this->form_validation->set_rules('en', 'Khu vực đến tiếng Anh', 'required');
            if($this->form_validation->run() == TRUE){
                $area_request = array(
                    'vi' => mb_convert_case($this->input->post('vi'), MB_CASE_TITLE, "UTF-8"),
                    'en' => mb_convert_case($this->input->post('en'), MB_CASE_TITLE, "UTF-8"),
                );
                $insert = $this->area_model->common_insert($area_request);
                if($insert){
                    $this->session->set_flashdata('message_success', 'Thêm mới thành công!');
                    redirect('admin/'. $this->data['controller'] .'', 'refresh');
                }else {
                    $this->session->set_flashdata('message_error', 'Thêm mới thất bại!');
                    $this->render('admin/'. $this->data['controller'] .'/create_area_view');
                }
            }
        }
        $this->render('admin/area/create_area_view');
    }
    public function edit($id = null){
        $this->data['detail'] = $this->area_model->get_by_id_area($id);
        $this->load->helper('form');
        $this->load->library('form_validation');
        if($this->input->post()){
            $this->form_validation->set_rules('vi', 'Khu vực đến tiếng Việt', 'required');
            $this->form_validation->set_rules('en', 'Khu vực đến tiếng Anh', 'required');
            if($this->form_validation->run() === true){
                $area_request = array(
                    'vi' => mb_convert_case($this->input->post('vi'), MB_CASE_TITLE, "UTF-8"),
                    'en' => mb_convert_case($this->input->post('en'), MB_CASE_TITLE, "UTF-8"),
                );
                $update = $this->area_model->common_update($id, $area_request);
                if($update){
                    $this->session->set_flashdata('message_success', 'Cập nhật thành công!');
                    redirect('admin/area', 'refresh');
                }else {
                    $this->session->set_flashdata('message_error', 'Cập nhật thất bại!');
                    $this->render('admin/area/edit/'.$id);
                }
            }
        }
        $this->render('admin/area/edit_area_view');
    }
    function remove(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->area_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                return $this->return_api(HTTP_NOT_FOUND, MESSAGE_ISSET_ERROR);
            }
            $localtion = $this->localtion_model->find_rows(array('area_id' => $id));// lấy số bài viết thuộc về category
            if($localtion == 0){
                $data = array('is_deleted' => 1);
                $update = $this->area_model->common_update($id, $data);
                if($update){
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    return $this->return_api(HTTP_SUCCESS,MESSAGE_REMOVE_SUCCESS,$reponse);
                }
                return $this->return_api(HTTP_NOT_FOUND,MESSAGE_REMOVE_ERROR);
            }else{
                return $this->return_api(HTTP_NOT_FOUND,sprintf(MESSAGE_ERROR_REMOVE_AREA,$localtion));
            }
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ID_ERROR);
    }
}
