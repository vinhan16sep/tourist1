<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Localtion extends Admin_Controller {

    private $request_language_template = array(
        'title', 'content'
    );
    private $author_data = array();

    function __construct(){
        parent::__construct();
        $this->load->model('localtion_model');
        $this->load->model('product_model');
        $this->load->helper('common');
        $this->data['template'] = build_template();
        $this->data['request_language_template'] = $this->request_language_template;
        $this->author_data = handle_author_common_data();
        $this->data['controller'] = $this->localtion_model->table;
        $this->load->model('category_model');
    }

    public function index() {
        $this->data['keyword'] = '';
        if($this->input->get('search')){
            $this->data['keyword'] = $this->input->get('search');
        }
        $this->load->library('pagination');
        $per_page = 10;
        $total_rows  = $this->localtion_model->count_search('vi', $this->data['keyword']);
        $config = $this->pagination_config(base_url('admin/'.$this->data['controller'].'/index'), $total_rows, $per_page, 4);
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['result'] = $this->localtion_model->get_all_with_pagination_search('desc','vi' , $per_page, $this->data['page'], $this->data['keyword']);
        $this->render('admin/localtion/list_localtion_view');
    }
    public function create(){
        $this->load->helper('form');
        if($this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'required');
            $this->form_validation->set_rules('title_en', 'Title', 'required');
            if($this->form_validation->run() == TRUE){
                if(!empty($_FILES['image_localtion']['name'])){
                    $this->check_img($_FILES['image_localtion']['name'], $_FILES['image_localtion']['size']);
                }
                $slug = $this->input->post('slug_localtion');
                $unique_slug = $this->localtion_model->build_unique_slug($slug);
                if(!file_exists("assets/upload/".$this->data['controller']."/".$unique_slug) && (!empty($_FILES['image_localtion']['name']))){
                    mkdir("assets/upload/".$this->data['controller']."/".$unique_slug, 0777);
                    mkdir("assets/upload/".$this->data['controller']."/".$unique_slug.'/thumb', 0777);
                }
                if(!empty($_FILES['image_localtion']['name'])){
                    $localtionimage = $this->upload_image('image_localtion', $_FILES['image_localtion']['name'], 'assets/upload/localtion/'.$unique_slug, 'assets/upload/localtion/'.$unique_slug.'/thumb');
                }
                $localtion_request = array(
                    'slug' => $unique_slug,
                    'area' => $this->input->post('area'),
                    'localtion' => $this->input->post('localtion'),
                );
                if(isset($localtionimage)){
                    $localtion_request['image'] = $localtionimage;
                }
                $this->db->trans_begin();
                $insert = $this->localtion_model->common_insert(array_merge($localtion_request,$this->author_data));
                if($insert){
                    $requests = handle_multi_language_request('localtion_id', $insert, $this->request_language_template, $this->input->post(), $this->page_languages);
                    $this->localtion_model->insert_with_language($requests);
                }
                if ($this->db->trans_status() === false) {
                    $this->db->trans_rollback();
                    $this->render('admin/'. $this->data['controller'] .'/edit_localtion_view');
                } else {
                    $this->db->trans_commit();
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    redirect('admin/'. $this->data['controller'] .'', 'refresh');
                }
            }
        }
        $this->render('admin/localtion/create_localtion_view');
    }
    public function edit($id = null){
        $detail = $this->localtion_model->get_by_id($id,array('title', 'content'));
        if(empty($detail['id'])){
            redirect('admin/localtion/index','refresh');
        }
        $detail = build_language('localtion', $detail, $this->request_language_template, $this->page_languages);
        $this->data['detail'] = $detail;
        $this->load->helper('form');
        $this->load->library('form_validation');

        if($this->input->post()){
            $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'required');
            $this->form_validation->set_rules('title_en', 'Title', 'required');
            if($this->form_validation->run() === true){
                $unique_slug = $this->data['detail']['slug'];
                if($unique_slug !== $this->input->post('slug_localtion')){
                    $unique_slug = $this->localtion_model->build_unique_slug($this->input->post('slug_localtion'));
                    if(file_exists("assets/upload/localtion/".$this->data['detail']['slug'])) {
                        rename("assets/upload/localtion/".$this->data['detail']['slug'], "assets/upload/localtion/".$unique_slug);
                    }
                }
                if(!empty($_FILES['image_localtion']['name'])){
                    $this->check_img($_FILES['image_localtion']['name'], $_FILES['image_localtion']['size']);
                    $localtionimage = $this->upload_image('image_localtion', $_FILES['image_localtion']['name'], 'assets/upload/localtion/'.$unique_slug, 'assets/upload/localtion/'.$unique_slug.'/thumb');
                }
                $localtion_request = array(
                    'area' => $this->input->post('area'),
                    'localtion' => $this->input->post('localtion')
                );
                if($unique_slug != $this->data['detail']['slug']){
                    $localtion_request['slug'] = $unique_slug;
                }
                if(isset($localtionimage)){
                    $localtion_request['image'] = $localtionimage;
                }
                $this->db->trans_begin();
                $update = $this->localtion_model->common_update($id, $localtion_request);
                if($update){
                    $requests = handle_multi_language_request('localtion_id', $id, $this->request_language_template, $this->input->post(), $this->page_languages);
                    foreach ($requests as $key => $value){
                        $this->localtion_model->update_with_language($id, $requests[$key]['language'], $value);
                    }
                }
                if ($this->db->trans_status() === false) {
                    $this->db->trans_rollback();
                    $this->load->libraries('session');
                    $this->session->set_flashdata('message_error', 'Cập nhật thất bại!');
                    $this->render('admin/localtion/edit/'.$id);
                } else {
                    $this->db->trans_commit();
                    $this->session->set_flashdata('message_success', 'Cập nhật thành công!');
                    if(isset($localtionimage) && !empty($detail['image']) && file_exists('assets/upload/localtion/'.$unique_slug.'/'.$detail['image'])){
                        unlink('assets/upload/localtion/'.$unique_slug.'/'.$detail['image']);
                        $new_array = explode('.', $detail['image']);
                        $typeimg = array_pop($new_array);
                        $nameimg = str_replace(".".$typeimg, "", $detail['image']);
                        if(file_exists('assets/upload/localtion/'.$unique_slug.'/thumb/'.$nameimg.'_thumb.'.$typeimg)){
                            unlink('assets/upload/localtion/'.$unique_slug.'/thumb/'.$nameimg.'_thumb.'.$typeimg);
                        }
                    }
                    redirect('admin/localtion', 'refresh');
                }
            }
        }
        $this->render('admin/localtion/edit_localtion_view');
    }
    public function detail($id){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $detail = $this->localtion_model->get_by_id($id,array('title', 'content'));
        $detail = build_language('localtion', $detail, $this->request_language_template, $this->page_languages);
        $this->data['detail'] = $detail;

        $this->render('admin/localtion/detail_localtion_view');
    }
    function remove(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->localtion_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                return $this->return_api(HTTP_NOT_FOUND, MESSAGE_ISSET_ERROR);
            }
            $localtion = count($this->product_model->get_all_for_remove($id));// lấy số bài viết thuộc về category
            if($localtion == 0){
                $data = array('is_deleted' => 1);
                $update = $this->localtion_model->common_update($id, $data);
                if($update){
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    return $this->return_api(HTTP_SUCCESS,MESSAGE_REMOVE_SUCCESS,$reponse);
                }
                return $this->return_api(HTTP_NOT_FOUND,MESSAGE_REMOVE_ERROR);
            }else{
                return $this->return_api(HTTP_NOT_FOUND,sprintf(MESSAGE_ERROR_REMOVE_LOCALTION,$localtion));
            }
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ID_ERROR);
    }

    protected function check_img($filename, $filesize){
        $map = strripos($filename, '.')+1;
        $fileextension = substr($filename, $map,(strlen($filename)-$map));
        if(!($fileextension == 'jpg' || $fileextension == 'jpeg' || $fileextension == 'png' || $fileextension == 'gif')){
            $this->session->set_flashdata('message_error', MESSAGE_FILE_EXTENSION_ERROR);
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_CREATE_ERROR);
        }
        if ($filesize > 1228800) {
            $this->session->set_flashdata('message_error', sprintf(MESSAGE_PHOTOS_ERROR, 1200));
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_CREATE_ERROR);
        }
    }
}
