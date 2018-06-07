<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Admin_Controller {
	private $request_language_template = array(
        'title'
    );
    private $author_data = array();

    function __construct(){
        parent::__construct();
        $this->load->model('category_model');
        $this->load->helper('common');
        $this->author_data = handle_author_common_data();
    }

	public function index(){
		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->category_model->count_search();
        if($keywords != ''){
            $total_rows  = $this->category_model->count_search($keywords);
        }

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/category/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->category_model->get_all_with_pagination_search($per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->category_model->get_all_with_pagination_search($per_page, $this->data['page'], $keywords);
        }
        $this->data['result'] = $result;
		$this->render('admin/category/list_category_view');
	}

	public function create(){
		$this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'trim|required');
        $this->form_validation->set_rules('title_en', 'Title', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/category/create_category_view.php');
        } else {
        	if ($this->input->post()) {
                $slug = $this->input->post('slug_shared');
                $unique_slug = $this->category_model->build_unique_slug($slug);
                $shared_request = array(
                    'slug' => $unique_slug,
                    'meta_keywords' => $this->input->post('metakeywords_shared'),
                    'meta_description' => $this->input->post('metadescription_shared')
                );

                $this->db->trans_begin();

                $insert = $this->category_model->common_insert(array_merge($shared_request, $this->author_data));
                if($insert){
                    $requests = handle_multi_language_request('category_id', $insert, $this->request_language_template, $this->input->post(), $this->page_languages);
                    $this->category_model->insert_with_language($requests);
                }

                if ($this->db->trans_status() === false) {
                    $this->db->trans_rollback();
                    $this->load->libraries('session');
                    $this->session->set_flashdata('message_error', 'Thêm mới thất bại!');
                    $this->render('admin/category/create_category_view');
                } else {
                    $this->db->trans_commit();
                    $this->session->set_flashdata('message_success', 'Thêm mới thành công!');
                    redirect('admin/category', 'refresh');
                }
        	}
        }
        
	}


	public function edit($id = null){
        $detail = $this->category_model->get_by_id($id, $this->request_language_template);
        if(!$detail['id']){
            redirect('admin/category/index','refresh');
        }

        $detail = build_language('category', $detail, $this->request_language_template, $this->page_languages);

        $this->data['detail'] = $detail;

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('title_en', 'Title', 'required');
        if($this->form_validation->run() === true){
            if($this->input->post()){
                $slug = $this->input->post('slug_shared');
                $unique_slug = $this->category_model->build_unique_slug($slug, $id);
                $shared_request = array(
                    'slug' => $unique_slug,
                    'meta_keywords' => $this->input->post('metakeywords_shared'),
                    'meta_description' => $this->input->post('metadescription_shared'),
                    'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
                );
                $this->db->trans_begin();

                $update = $this->category_model->common_update($id, $shared_request);
                if($update){
                    $requests = handle_multi_language_request('category_id', $id, $this->request_language_template, $this->input->post(), $this->page_languages);
                    foreach ($requests as $key => $value){
                        $this->category_model->update_with_language($id, $requests[$key]['language'], $value);
                    }
                }

                if ($this->db->trans_status() === false) {
                    $this->db->trans_rollback();
                    $this->load->libraries('session');
                    $this->session->set_flashdata('message_error', 'Cập nhật thất bại!');
                    $this->render('admin/category/edit/'.$id);
                } else {
                    $this->db->trans_commit();
                    $this->session->set_flashdata('message_success', 'Cập nhật thành công!');
                    redirect('admin/category', 'refresh');
                }
            }
        }
        $this->render('admin/category/edit_category_view');
    }

	public function detail($id){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $detail = $this->category_model->get_by_id($id, $this->request_language_template);
        if(!$detail['id']){
            redirect('admin/category/index','refresh');
        }
        $detail = build_language('category', $detail, $this->request_language_template, $this->page_languages);

        $this->data['detail'] = $detail;

        $this->render('admin/category/detail_category_view');
    }

    public function remove(){
        $id = $this->input->post('id');
        $data = array('is_deleted' => 1);
        $update = $this->category_model->common_update($id, $data);
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

/* End of file Category.php */
/* Location: ./application/controllers/admin/Category.php */