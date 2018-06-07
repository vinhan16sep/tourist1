<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Our_methods extends Admin_Controller {
	private $request_language_template = array(
        'description'
    );
    private $author_data = array();
    function __construct(){
        parent::__construct();
        $this->load->model('our_methods_model');
        $this->load->helper('common');
        $this->author_data = handle_author_common_data();
    }
	public function index(){
		$total_rows  = $this->our_methods_model->count_by_our_methods();
        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/our_methods/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->our_methods_model->get_all_by_our_methods_with_pagination_search($per_page, $this->data['page']);
        $this->data['result'] = $result;
        $this->render('admin/our_methods/list_our_methods_view');
	}

	public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('description_vi', 'Giới thiệu', 'trim|required');
        $this->form_validation->set_rules('description_en', 'Description', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/our_methods/create_our_methods_view');
        } else {
        	if ($this->input->post()) {
        		$shared_request = array();
        		$this->db->trans_begin();

        		$insert = $this->our_methods_model->common_insert(array_merge($shared_request, $this->author_data));
        		if($insert){
        			$requests = handle_multi_language_request('our_methods_id', $insert, $this->request_language_template, $this->input->post(), $this->page_languages);
        			$this->our_methods_model->insert_with_language($requests);
        		}

        		if ($this->db->trans_status() === false) {
        			$this->db->trans_rollback();
        			$this->load->libraries('session');
        			$this->session->set_flashdata('message_error', 'Thêm mới thất bại!');
        			$this->render('admin/our_methods/create_our_methods_view');
        		} else {
        			$this->db->trans_commit();
        			$this->session->set_flashdata('message_success', 'Thêm mới thành công!');
        			redirect('admin/our_methods', 'refresh');
        		}
        	}
        }
    }

    public function edit($id = null){
    	$this->load->helper('form');
        $this->load->library('form_validation');

    	$detail = $this->our_methods_model->get_by_id($id, $this->request_language_template);
        if(!$detail['id']){
            redirect('admin/our_methods/index','refresh');
        }
        $detail = build_language('our_methods', $detail, $this->request_language_template, $this->page_languages);
        $this->data['detail'] = $detail;

        $this->form_validation->set_rules('description_vi', 'Giới thiệu', 'trim|required');
        $this->form_validation->set_rules('description_en', 'Description', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/our_methods/edit_our_methods_view');
        } else {
        	if ($this->input->post()) {
        		$shared_request = array(
        			'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
        		);
        		$this->db->trans_begin();
        		$update = $this->our_methods_model->common_update($id, $shared_request);
                    if($update){
                        $requests = handle_multi_language_request('our_methods_id', $id, $this->request_language_template, $this->input->post(), $this->page_languages);
                        foreach ($requests as $key => $value){
                            $this->our_methods_model->update_with_language($id, $requests[$key]['language'], $value);
                        }
                    }

                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        $this->load->libraries('session');
                        $this->session->set_flashdata('message_error', 'Cập nhật thất bại!');
                        $this->render('admin/our_methods/edit/'.$id);
                    } else {
                        $this->db->trans_commit();
                        $this->session->set_flashdata('message_success', 'Cập nhật thành công!');
                        redirect('admin/our_methods', 'refresh');
                    }
        	}
        }
    }

    public function remove(){
        $id = $this->input->post('id');
        $data = array('is_deleted' => 1);
        $update = $this->our_methods_model->common_update($id, $data);
        if($update == 1){
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200, 'reponse' => $reponse)));
        }
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(400)
                    ->set_output(json_encode(array('status' => 400)));
    }

}

/* End of file Our_methods.php */
/* Location: ./application/controllers/admin/Our_methods.php */