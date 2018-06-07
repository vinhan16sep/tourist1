<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends Admin_Controller {
	private $request_language_template = array();
    private $author_data = array();

    function __construct(){
        parent::__construct();
        $this->load->model('landing_model');
        $this->load->helper('common');
        $this->author_data = handle_author_common_data();
    }

	public function index(){
		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->landing_model->count_search_by_landing();
        if($keywords != ''){
            $total_rows  = $this->landing_model->count_search_by_landing($keywords);
        }

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/landing/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$result = $this->landing_model->get_all_by_landing_with_pagination_search($per_page, $this->data['page']);
		if($keywords != ''){
			$result = $this->landing_model->get_all_by_landing_with_pagination_search($per_page, $this->data['page'], $keywords);
		}
		$this->data['result'] = $result;
		$this->render('admin/landing/list_landing_view');
	}

	public function remove(){
        $id = $this->input->post('id');
        $data = array('is_deleted' => 1);
        $update = $this->landing_model->common_update($id, $data);
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

/* End of file Landing.php */
/* Location: ./application/controllers/admin/Landing.php */