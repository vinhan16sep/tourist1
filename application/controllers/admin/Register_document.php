<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_document extends Admin_Controller {

	private $request_language_template = array();
    private $author_data = array();

    function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('common');
        $this->author_data = handle_author_common_data();
    }

	public function index(){
		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->user_model->count_search_by_users();
        if($keywords != ''){
            $total_rows  = $this->user_model->count_search_by_users($keywords);
        }

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/register_document/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$result = $this->user_model->get_all_by_users_with_pagination_search($per_page, $this->data['page']);
		if($keywords != ''){
			$result = $this->user_model->get_all_by_users_with_pagination_search($per_page, $this->data['page'], $keywords);
		}
		$this->data['result'] = $result;
		$this->render('admin/register_document/list_register_document_view');
	}

	public function remove(){
        $id = $this->input->post('id');
        $data = array('active' => 0);
        $update = $this->user_model->common_update($id, $data);
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

/* End of file Register_document.php */
/* Location: ./application/controllers/admin/Register_document.php */