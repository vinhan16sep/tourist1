<?php 

/**
* 
*/
class Comment extends Admin_Controller{
	private $request_language_template = array();
    private $author_data = array();

	function __construct(){
		parent::__construct();
		$this->load->model('comment_model');
		$this->load->helper('common');
        $this->load->helper('file');

        $this->data['template'] = build_template();
        $this->data['request_language_template'] = $this->request_language_template;
        $this->data['controller'] = $this->comment_model->table;
		$this->author_data = handle_author_common_data();
	}

    public function remove(){
        $id = $this->input->post('id');
        $type = $this->input->post('type');
        $comment = $this->comment_model->find_array(array('id' => $id,'type' => $type));
        $data = array('is_deleted' => 1);
        $update = $this->comment_model->common_update($comment['id'], $data);
        if($update == 1){
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'reponse' => $reponse, 'isExisted' => true)));
        }
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(HTTP_BAD_REQUEST)
                    ->set_output(json_encode(array('status' => HTTP_BAD_REQUEST)));
    }

    
}