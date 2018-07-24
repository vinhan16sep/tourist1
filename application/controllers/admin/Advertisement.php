<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Advertisement extends Admin_Controller {
    private $author_data = array();
    function __construct(){
        parent::__construct();
        $this->load->model('advertisement_model');
        $this->load->helper('common');
        $this->author_data = handle_author_common_data();



        redirect('admin', 'refresh');


    }

    public function index(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $advertisement = $this->advertisement_model->get_by_id_in_advertisement();

        $this->data['advertisement'] = $advertisement;

        $this->render('admin/advertisement/detail_advertisement_view');
    }

    public function edit($id){
        if (!is_numeric($id)) {
            redirect('admin/advertisement', 'refresh');
        }
        $detail = $this->advertisement_model->get_by_id($id);
        if(!$detail){
            redirect('admin/advertisement', 'refresh');
        }
        $this->data['detail'] = $detail;

        $this->load->helper('form');
        $this->load->library('form_validation');

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/advertisement/edit_advertisement_view');
        } else {
            if ($this->input->post()) {
                $check_upload = true;
                foreach ($_FILES['image_shared']['size'] as $key => $value) {
                    if( $value > 1228800){
                        $check_upload = false;
                    }
                    if($check_upload == true){
                        $image = $this->upload_multiple_image('./assets/upload/advertisement', 'image_shared', 'assets/upload/advertisement/thumb');
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

                        $update = $this->advertisement_model->common_update($id, array_merge($shared_request, $this->author_data));
                        if($update){
                            $this->session->set_flashdata('message_success', 'Cập nhật thành công!');
                            redirect('admin/advertisement', 'refresh');
                            
                        }else {
                            $this->load->libraries('session');
                            $this->session->set_flashdata('message_error', 'Cập nhật thất bại!');
                            $this->render('admin/advertisement/edit');
                        }
                    }else{
                        $this->session->set_flashdata('message_error', 'Có hình ảnh vượt quá 1200 Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');
                        redirect('admin/advertisement');
                    }
                }
            }
        }
    }

    public function remove_image(){
        $id = $this->input->get('id');
        $image = $this->input->get('image');
        $detail = $this->advertisement_model->get_by_id($id);
        if ($image == $detail['avatar']) {
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200, 'message' => "Ảnh này đang được chọn làm Avatar. Không thể xóa!", 'reponse' => $reponse)));
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
            $update = $this->advertisement_model->common_update($id, $data);
            if($update){
                if($image != '' && file_exists('assets/upload/advertisement/'.$image)){
                    unlink('assets/upload/advertisement/'.$image);
                }
                $reponse = array(
                    'csrf_hash' => $this->security->get_csrf_hash()
                );
                return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200, 'message' => '', 'reponse' => $reponse)));
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
        $update = $this->advertisement_model->common_update($id, $data);
        if($update){
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array('status' => 200, 'message' => '', 'reponse' => $reponse)));
        }
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header(400)
        ->set_output(json_encode(array('status' => 400)));
    }

}