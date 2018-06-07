<?php defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Admin_Controller {
    private $request_language_template = array(
        'title', 'content'
    );
    private $author_data = array();
    function __construct(){
        parent::__construct();
        $this->load->model('about_model');
        $this->load->helper('common');
        $this->author_data = handle_author_common_data();
    }

    public function index(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $about = $this->about_model->get_by_id_in_about();

        $about = build_language('about', $about, $this->request_language_template, $this->page_languages);

        $this->data['about'] = $about;

        $this->render('admin/about/detail_about_view');
    }

    public function edit($id){
        if (!is_numeric($id)) {
            redirect('admin/about', 'refresh');
        }
        $detail = $this->about_model->get_by_id($id);
        if(!$detail){
            redirect('admin/about', 'refresh');
        }
        $detail = build_language('about', $detail, $this->request_language_template, $this->page_languages);
        $this->data['detail'] = $detail;

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'trim|required');
        $this->form_validation->set_rules('title_en', 'Title', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/about/edit_about_view');
        } else {
            if ($this->input->post()) {
                $check_upload = true;
                foreach ($_FILES['image_shared']['size'] as $key => $value) {
                    if( $value > 1228800){
                        $check_upload = false;
                    }
                    if($check_upload == true){
                        $image = $this->upload_multiple_image('./assets/upload/about', 'image_shared', 'assets/upload/about/thumb');
                        $shared_request = array(
                            'slug' => $this->input->post('slug_shared')
                        );
                        if($image){
                            $new_image = array();
                            $new_image = json_decode($detail['image']);
                            foreach ($image as $key => $value) {
                                $new_image[] = $value;
                            }
                            $shared_request['image'] = json_encode($new_image);
                        }
                        if($detail['avatar'] == null){
                            $shared_request['avatar'] = $image[0];
                        }
                        $this->db->trans_begin();

                        $update = $this->about_model->common_update($id, array_merge($shared_request, $this->author_data));
                        if($update){
                            $requests = handle_multi_language_request('about_id', $id, $this->request_language_template, $this->input->post(), $this->page_languages);
                            foreach ($requests as $key => $value){
                                $this->about_model->update_with_language($id, $value['language'], $value);
                            }
                        }

                        if ($this->db->trans_status() === false) {
                            $this->db->trans_rollback();
                            $this->load->libraries('session');
                            $this->session->set_flashdata('message_error', 'Cập nhật thất bại!');
                            $this->render('admin/about/edit');
                        } else {
                            $this->db->trans_commit();

                            $this->session->set_flashdata('message_success', 'Cập nhật thành công!');
                            redirect('admin/about', 'refresh');

                        }
                    }else{
                        $this->session->set_flashdata('message_error', 'Có hình ảnh vượt quá 1200 Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');
                        redirect('admin/about');
                    }
                }
            }
        }
    }

    public function remove_image(){
        $id = $this->input->get('id');
        $image = $this->input->get('image');
        $detail = $this->about_model->get_by_id($id);
        if ($image == $detail['avatar']) {
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200, 'message' => "Ảnh này đang được chọn làm Avatar. Không thể xóa!")));
        }else{
            $old_images = json_decode($detail['image']);
            $key = array_search($image, $old_images);
            unset($old_images[$key]);
            $new_images = [];
            foreach ($old_images as $key => $value) {
                $new_images[] = $value;
            }
            $image_json = json_encode($new_images);
            $data = array('image' => $image_json);
            $update = $this->about_model->common_update($id, $data);
            if($update){
                if($image != '' && file_exists('assets/upload/about/'.$image)){
                    unlink('assets/upload/about/'.$image);
                }
                return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200, 'message' => '')));
            }
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(400)
            ->set_output(json_encode(array('status' => 400)));
        }
    }

    public function active_image(){
        $id = $this->input->get('id');
        $image = $this->input->get('image');
        $data = array('avatar' => $image);
        $update = $this->about_model->common_update($id, $data);
        if($update){
                return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200, 'message' => '')));
            }
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(400)
            ->set_output(json_encode(array('status' => 400)));
    }

}