<?php 

/**
* 
*/
class Post_category extends Admin_Controller{
	private $request_language_template = array(
        'title', 'content'
    );
    private $author_data = array();
    private $controller = '';

	function __construct(){
		parent::__construct();
		$this->load->model('post_category_model');
		$this->load->helper('common');
        $this->load->helper('file');

        $this->data['template'] = build_template();
        $this->data['request_language_template'] = $this->request_language_template;
        $this->controller = 'post_category';
        $this->data['controller'] = $this->controller;
		$this->author_data = handle_author_common_data();
	}

    public function index(){
        $keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->post_category_model->count_search('vi');
        if($keywords != ''){
            $total_rows  = $this->post_category_model->count_search('vi', $keywords);
        }

        
        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/'. $this->controller .'/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();

        $result = $this->post_category_model->get_all_with_pagination_and_sort_search('asc','vi' , $per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->post_category_model->get_all_with_pagination_and_sort_search('asc','vi' , $per_page, $this->data['page'], $keywords);
        }
        foreach ($result as $key => $value) {
            $parent_title = $this->build_parent_title($value['parent_id']);
            $result[$key]['parent_title'] = $parent_title;
        }
        $this->data['result'] = $result;
        $this->data['check'] = $this;
        

        // print_r($result);die;
        
        $this->render('admin/'. $this->controller .'/list_post_category_view');
    }

	public function create(){
		$this->load->helper('form');
        $this->load->library('form_validation');

        $post_category = $this->post_category_model->get_by_parent_id(null,'asc');
        $this->data['post_category'] = $post_category;

        $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('title_en', 'Title', 'required');

        if ($this->form_validation->run() == FALSE) {
        	$this->render('admin/'. $this->controller .'/create_post_category_view');
        } else {
        	if($this->input->post()){
        		$check_upload = true;
                if ($_FILES['image_shared']['size'] > 1228800) {
                    $check_upload = false;
                }
                if($check_upload == true){
                	$slug = $this->input->post('slug_shared');
                    $unique_slug = $this->post_category_model->build_unique_slug($slug);
                    $image = $this->upload_image('image_shared', $_FILES['image_shared']['name'], 'assets/upload/'. $this->controller .'', 'assets/upload/'. $this->controller .'/thumb');

                    $shared_request = array(
                        'slug' => $unique_slug,
                        'parent_id' => $this->input->post('parent_id_shared'),
                        'type' => $this->input->post('type_shared'),
                        'created_at' => $this->author_data['created_at'],
                        'created_by' => $this->author_data['created_by'],
                        'updated_at' => $this->author_data['updated_at'],
                        'updated_by' => $this->author_data['updated_by']
                    );
                    if($image){
                        $shared_request['image'] = $image;
                    }
                    $this->db->trans_begin();

                    $insert = $this->post_category_model->common_insert($shared_request);
                    if($insert){
                        $requests = handle_multi_language_request('post_category_id', $insert, $this->request_language_template, $this->input->post(), $this->page_languages);
                        $this->post_category_model->insert_with_language($requests);
                    }

                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        $this->load->libraries('session');
                        $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
                        $this->render('admin/'. $this->controller .'/create_post_category_view');
                    } else {
                        $this->db->trans_commit();
                        $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
                        redirect('admin/'. $this->controller .'', 'refresh');
                    }
                }else{
                    $this->session->set_flashdata('message_error', sprintf(MESSAGE_PHOTOS_ERROR, 1200));
                    redirect('admin/'. $this->controller .'');
                }
        	}
        }
        
	}

    public function detail($id){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $detail = $this->post_category_model->get_by_id($id, array('title', 'content'));

        $detail = build_language($this->controller, $detail, array('title', 'content'), $this->page_languages);
        $parent_title = $this->build_parent_title($detail['parent_id']);
        $detail['parent_title'] = $parent_title;

        $this->data['detail'] = $detail;
        
        // print_r($detail);die;

        $this->render('admin/'. $this->controller .'/detail_post_category_view');
    }

    public function edit($id){
        $this->load->helper('form');
        $this->load->library('form_validation');

        $detail = $this->post_category_model->get_by_id($id, array('title', 'content'));
        $detail = build_language($this->controller, $detail, array('title', 'content'), $this->page_languages);
        $category = $this->post_category_model->get_by_parent_id(null,'asc');
        // print_r($detail);die;

        $this->data['category'] = $category;
        
        $this->data['detail'] = $detail;
        

        $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'required');
        $this->form_validation->set_rules('title_en', 'Title', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->render('admin/'. $this->controller .'/edit_post_category_view');
        } else {
            if($this->input->post()){
                $check_upload = true;
                if ($_FILES['image_shared']['size'] > 1228800) {
                    $check_upload = false;
                }
                if ($check_upload == true) {
                    $slug = $this->input->post('slug_shared');
                    $unique_slug = $this->post_category_model->build_unique_slug($slug, $id);
                    $image = $this->upload_image('image_shared', $_FILES['image_shared']['name'], 'assets/upload/'. $this->controller .'', 'assets/upload/'. $this->controller .'/thumb');
                    $shared_request = array(
                        'slug' => $unique_slug,
                        'parent_id' => $this->input->post('parent_id_shared'),
                        'type' => $this->input->post('type_shared'),
                        'created_at' => $this->author_data['created_at'],
                        'created_by' => $this->author_data['created_by'],
                        'updated_at' => $this->author_data['updated_at'],
                        'updated_by' => $this->author_data['updated_by']
                    );
                    if($image){
                        $shared_request['image'] = $image;
                    }
                    $this->db->trans_begin();

                    $update = $this->post_category_model->common_update($id, $shared_request);
                    if($update){
                        $requests = handle_multi_language_request('post_category_id', $id, $this->request_language_template, $this->input->post(), $this->page_languages);
                        foreach ($requests as $key => $value){
                            $this->post_category_model->update_with_language($id, $requests[$key]['language'], $value);
                        }
                    }

                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        $this->load->libraries('session');
                        $this->session->set_flashdata('message_error', MESSAGE_EDIT_ERROR);
                        $this->render('admin/'. $this->controller .'/edit/'.$id);
                    } else {
                        $this->db->trans_commit();
                        $this->session->set_flashdata('message_success', MESSAGE_EDIT_SUCCESS);
                        if($image != '' && $image != $detail['image'] && file_exists('assets/public/upload/'. $this->controller .'/'.$detail['image'])){
                            unlink('assets/public/upload/'. $this->controller .'/'.$detail['image']);
                        }
                        redirect('admin/'. $this->controller .'', 'refresh');
                    }
                }else{
                    $this->session->set_flashdata('message_error', sprintf(MESSAGE_PHOTOS_ERROR, 1200));
                    redirect('admin/'. $this->controller .'');
                }
            }
        }
    }

    public function remove(){
        $this->load->model('post_model');
        $id = $this->input->post('id');
        $list_categories = $this->post_category_model->get_by_parent_id(null, 'asc');
        $detail_catrgory = $this->post_category_model->get_by_id($id, $this->request_language_template);
        $this->get_multiple_posts_with_category($list_categories, $detail_catrgory['id'], $ids);
        $ids = array_unique($ids);
        $posts = array();
        $reponse = array(
            'csrf_hash' => $this->security->get_csrf_hash()
        );
        if(isset($ids)){
            $posts = $this->post_model->get_by_multiple_ids(array_unique($ids), 'vi');
        }
        if(!isset($posts)){
            $data = array('is_deleted' => 1);
            $update = $this->post_category_model->common_update($id, $data);
            if($update == 1){
                
                return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'reponse' => $reponse, 'isExisted' => true)));
            }
        }else{
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'reponse' => $reponse, 'isExisted' => false)));
        }
        return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_BAD_REQUEST)
                ->set_output(json_encode(array('status' => HTTP_BAD_REQUEST)));
    }

    public function active(){
        $this->load->model('post_model');
        $id = $this->input->post('id');
        $list_categories = $this->post_category_model->get_by_parent_id(null, 'asc');
        $detail_catrgory = $this->post_category_model->get_by_id($id, $this->request_language_template);
        $this->get_multiple_posts_with_category($list_categories, $detail_catrgory['id'], $ids);
        $ids = array_unique($ids);

        $data = array('is_activated' => 0);

        $this->db->trans_begin();

        $update = $this->post_category_model->multiple_update_by_ids($ids, $data);

        if ($update == 1) {
            $this->post_model->multiple_update_by_category_ids($ids, $data);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(HTTP_BAD_REQUEST)
            ->set_output(json_encode(array('status' => HTTP_BAD_REQUEST)));
        } else {
            $this->db->trans_commit();
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'reponse' => $reponse)));
        }
    }

    public function deactive(){
        $this->load->model('post_model');
        $id = $this->input->post('id');
        $list_categories = $this->post_category_model->get_by_parent_id(null, 'asc');
        $detail_catrgory = $this->post_category_model->get_by_id($id, $this->request_language_template);
        $this->get_multiple_posts_with_category($list_categories, $detail_catrgory['id'], $ids);
        $ids = array_unique($ids);

        $data = array('is_activated' => 1);

        $this->db->trans_begin();

        $update = $this->post_category_model->multiple_update_by_ids($ids, $data);

        if ($update == 1) {
            $this->post_model->multiple_update_by_category_ids($ids, $data);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return $this->output
            ->set_content_type('application/json')
            ->set_status_header(HTTP_BAD_REQUEST)
            ->set_output(json_encode(array('status' => HTTP_BAD_REQUEST)));
        } else {
            $this->db->trans_commit();
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'reponse' => $reponse)));
        }
    }


    protected function build_parent_title($parent_id){
        $sub = $this->post_category_model->get_by_id($parent_id, array('title'));

        if($parent_id != 0){
            $title = explode('|||', $sub['post_category_title']);
            $sub['title_en'] = $title[0];
            $sub['title_vi'] = $title[1];

            $title = $sub['title_vi'];
        }else{
            $title = 'Danh mục gốc';
        }
        return $title;
    }

    function build_new_category($categorie, $parent_id = 0, &$new_categorie){
        $cate_child = array();
        foreach ($categorie as $key => $item){
            if ($item['parent_id'] == $parent_id){
                $cate_child[] = $item;
                unset($categorie[$key]);
            }
        }
        if ($cate_child){
            foreach ($cate_child as $key => $item){
                $new_categorie[] = $item;
                $this->build_new_category($categorie, $item['id'], $new_categorie);
            }
        }
    }

    public function sort(){
        $params = array();
        parse_str($this->input->get('sort'), $params);
        // echo '<pre>';
        // print_r($params);die;
        $i = 1;
        foreach($params as $value){
            $this->post_category_model->update_sort($i, $value[0]);
            $i++;
        }
    }

    public function check_sub_category($id){
        $check_sub_category = $this->post_category_model->get_by_parent_id($id);
        if ($check_sub_category) {
            return true;
        }
        return false;
    }

    function get_multiple_posts_with_category($categories, $parent_id = 0, &$ids){
        foreach ($categories as $key => $item){
            $ids[] = $parent_id;
            if ($item['parent_id'] == $parent_id){
                $ids[] = $item['id'];
                $this->get_multiple_posts_with_category($categories, $item['id'], $ids);
            }
        }
    }
}