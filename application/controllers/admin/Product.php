<?php 

/**
* 
*/
class Product extends Admin_Controller{
    private $request_language_template = array(
        'title', 'description', 'content', 'metakeywords', 'metadescription'
    );
    private $request_language_template_tour = array(
        'title', 'content'
    );
    private $author_data = array();

	function __construct(){
		parent::__construct();
		$this->load->model('product_model');
        $this->load->model('product_category_model');
        $this->load->model('tour_date_model');
		$this->load->helper('common');
        $this->load->helper('file');
        $this->data['template'] = build_template();
        $this->data['request_language_template'] = $this->request_language_template;
        $this->data['request_language_template_tour'] = $this->request_language_template_tour;
        $this->data['controller'] = $this->product_model->table;
		$this->author_data = handle_author_common_data();
	}

    public function index(){
        $this->data['keyword'] = '';
        if($this->input->get('search')){
            $this->data['keyword'] = $this->input->get('search');
        }
        $this->load->library('pagination');
        $per_page = 10;
        $total_rows  = $this->product_model->count_search('vi', $this->data['keyword']);
        $config = $this->pagination_config(base_url('admin/'.$this->data['controller'].'/index'), $total_rows, $per_page, 4);
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['result'] = $this->product_model->get_all_with_pagination_search('desc','vi' , $per_page, $this->data['page'], $this->data['keyword']);
        foreach ($this->data['result'] as $key => $value) {
            $parent_title = $this->build_parent_title($value['product_category_id']);
            $this->data['result'][$key]['parent_title'] = $parent_title;
        }
        $this->render('admin/product/list_product_view');
    }

    public function create(){
        $this->load->helper('form');
        $product_category = $this->product_category_model->get_by_parent_id_when_active(null,'asc');
        $this->build_new_category($product_category,0,$this->data['product_category']);
        if($this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'required');
            $this->form_validation->set_rules('title_en', 'Title', 'required');
            $this->form_validation->set_rules('description_vi', 'Mô tả', 'required');
            $this->form_validation->set_rules('description_en', 'Description', 'required');
            $this->form_validation->set_rules('content_vi', 'Mô tả', 'required');
            $this->form_validation->set_rules('content_en', 'Description', 'required');
            if($this->form_validation->run() == TRUE){
                if(!empty($_FILES['image_shared']['name'])){
                    $this->check_img($_FILES['image_shared']['name'], $_FILES['image_shared']['size']);
                }
                $slug = $this->input->post('slug_shared');
                $unique_slug = $this->product_model->build_unique_slug($slug);
                if(!file_exists("assets/upload/".$this->data['controller']."/".$unique_slug) && !empty($_FILES['image_shared']['name'])){
                    mkdir("assets/upload/".$this->data['controller']."/".$unique_slug, 0755);
                    mkdir("assets/upload/".$this->data['controller']."/".$unique_slug.'/thumb', 0755);
                }
                if(!empty($_FILES['image_shared']['name'])){
                    $image = $this->upload_file('./assets/upload/product/'.$unique_slug, 'image_shared', 'assets/upload/product/'. $unique_slug .'/thumb');
                    $image_json = json_encode($image);
                }
                $shared_request = array(
                    'slug' => $unique_slug,
                    'product_category_id' => $this->input->post('parent_id_shared')
                );
                if(isset($image)){
                    $shared_request['image'] = $image_json;
                }
                $this->db->trans_begin();
                $insert = $this->product_model->common_insert(array_merge($shared_request,$this->author_data));
                if($insert){
                    $requests = handle_multi_language_request('product_id', $insert, $this->request_language_template, $this->input->post(), $this->page_languages);

                    $this->product_model->insert_with_language($requests);
                    $shared_request_date=array(
                        'product_id' => $insert,
                        'numberdate' => $this->input->post('numberdate')
                    );
                    $insert_tour = $this->tour_date_model->common_insert(array_merge($shared_request_date,$this->author_data));
                    if($insert_tour){
                        $requests = handle_multi_language_request_date('tour_date_id', $insert_tour, $this->request_language_template_tour, $this->input->post(), $this->page_languages);
                        $new_array = array();
                        $new_array1 = array();
                        foreach ($requests as $key => $value) {
                            for ($j=0; $j < count($value['title']); $j++) {
                                $new_array = $requests[$key];
                                $new_array['title'] = $requests[$key]['title'][$j];
                                $new_array['content'] = $requests[$key]['content'][$j];
                                $new_array1[] = $new_array;
                            }
                        }
                        $this->tour_date_model->insert_with_language($new_array1);
                    }
                }
                if ($this->db->trans_status() === false) {
                    $this->db->trans_rollback();
                    return $this->return_api(HTTP_NOT_FOUND,MESSAGE_CREATE_ERROR);
                } else {
                    $this->db->trans_commit();
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    return $this->return_api(HTTP_SUCCESS,MESSAGE_CREATE_SUCCESS,$reponse);
                }
            }
        }
        $this->render('admin/product/create_product_view');
    }
    // public function create(){
    //     $this->load->helper('form');
    //     $product_category = $this->product_category_model->get_by_parent_id_when_active(null,'asc');
    //     $this->build_new_category($product_category,0,$this->data['product_category']);
    //     if($this->input->post()){
    //         $this->load->library('form_validation');
    //         $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'required');
    //         $this->form_validation->set_rules('title_en', 'Title', 'required');
    //         $this->form_validation->set_rules('description_vi', 'Mô tả', 'required');
    //         $this->form_validation->set_rules('description_en', 'Description', 'required');
    //         if($this->form_validation->run() == TRUE){
    //             if(!empty($_FILES['image_shared']['name'])){
    //                 $this->check_img($_FILES['image_shared']['name'], $_FILES['image_shared']['size']);
    //             }
    //             $slug = $this->input->post('slug_shared');
    //             $unique_slug = $this->product_model->build_unique_slug($slug);
    //             if(!file_exists("assets/upload/".$this->data['controller']."/".$unique_slug) && !empty($_FILES['image_shared']['name'])){
    //                 mkdir("assets/upload/".$this->data['controller']."/".$unique_slug, 0755);
    //                 mkdir("assets/upload/".$this->data['controller']."/".$unique_slug.'/thumb', 0755);
    //             }
    //             if(!empty($_FILES['image_shared']['name'])){
    //                 $image = $this->upload_file('./assets/upload/product/'.$unique_slug, 'image_shared', 'assets/upload/product/'. $unique_slug .'/thumb');
    //                 $image_json = json_encode($image);
    //             }
    //             $shared_request = array(
    //                 'slug' => $unique_slug,
    //                 'product_category_id' => $this->input->post('parent_id_shared')
    //             );
    //             if(isset($image)){
    //                 $shared_request['image'] = $image_json;
    //             }
    //             $this->db->trans_begin();
    //             $insert = $this->product_model->common_insert(array_merge($shared_request,$this->author_data));
    //             if($insert){
    //                 $requests = handle_multi_language_request('product_id', $insert, $this->request_language_template, $this->input->post(), $this->page_languages);
    //                 $this->product_model->insert_with_language($requests);
    //             }
    //             if ($this->db->trans_status() === false) {
    //                 $this->db->trans_rollback();
    //                 $this->session->set_flashdata('message_error', MESSAGE_CREATE_ERROR);
    //                 $this->render('admin/product/create_product_view');
    //             } else {
    //                 $this->db->trans_commit();
    //                 $this->session->set_flashdata('message_success', MESSAGE_CREATE_SUCCESS);
    //                 redirect('admin/'. $this->data['controller'] .'', 'refresh');
    //             }
    //         }
    //     }
    //     $this->render('admin/product/create_product_view');
    // }

    public function detail($id){
        $this->load->model('rating_model');
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->product_model->find_rows(array('id' => $id,'is_deleted' => 0)) != 0){
                $this->load->helper('form');
                $this->load->library('form_validation');
                $detail = $this->product_model->get_by_id($id, array('title', 'description', 'content','metakeywords','metadescription'));
                $detail = build_language($this->data['controller'], $detail, array('title', 'description', 'content','metakeywords','metadescription'), $this->page_languages);
                $parent_title = $this->build_parent_title($detail['product_category_id']);
                $detail['parent_title'] = $parent_title;

                $count_rating = $this->rating_model->count_by_product_id($id);
                $total_rating = $this->rating_model->total_by_product_id($id);
                if($count_rating != 0 && $total_rating != 0){
                    $rating = round($total_rating['rating'] / $count_rating, 1);
                }else{
                    $rating = 0;
                }

                $this->data['detail'] = $detail;
                $this->data['rating'] = $rating;
                $this->data['count_rating'] = $count_rating;
                $this->data['refer'] = $this->input->get('refer');
                $this->data['tour_date'] = $this->tour_date_model->find_array(array('product_id' => $id));
                $this->data['tour_date_full']['vi'] = $this->tour_date_model->get_all_tour_date_id($this->data['tour_date']['id'],"vi");
                $this->data['tour_date_full']['en'] = $this->tour_date_model->get_all_tour_date_id($this->data['tour_date']['id'],"en");
                $this->render('admin/product/detail_product_view');
            }else{
                $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
                redirect('admin/product', 'refresh');
            }
        }else{
            $this->session->set_flashdata('message_error',MESSAGE_ID_ERROR);
            return redirect('admin/'.$this->data['controller'],'refresh');
        }
    }
    public function ajax_form($numberdate,$numbercurrent = 0){
        foreach ($this->data['template'] as $key => $value) {
            $reponse[$key] = '<div class="'.$key.'">';
                for ($i=$numbercurrent; $i < $numberdate; $i++) {
                    $reponse[$key] .= '<div class="btn btn-primary col-xs-12 btn-margin" type="button" data-toggle="collapse" href="#showdatecontent_'.$key.'_'.$i.'" aria-expanded="true" aria-controls="messageContent">';
                    $reponse[$key] .= ($key == 'vi')?'Nội dung Đầy đủ Ngày '.($i+1):'Content full date  '.($i+1);
                    $reponse[$key] .= '</div>';
                    $reponse[$key] .= '<div class="no_border"><div class="collapse in" id="showdatecontent_'.$key.'_'.$i.'">';
                    $reponse[$key] .= '<div class="col-xs-12 title-content-date date '.$key.'">';
                    $reponse[$key] .= form_label(($key == 'vi')?'Tiêu đề ngày '.($i+1):'Title date '.($i+1), 'title_date_'.$i.'_'. $key,'class="title_date"   id="label_title_date_'.$key.'_'.$i.'" ');
                    $reponse[$key] .= form_error('title_date_'.$i.'_'. $key);
                    $reponse[$key] .= form_input('title_date_'.$i.'_'. $key,"", 'class="form-control" id="title_date_'.$key.'_'.$i.'"');
                    $reponse[$key] .= form_label(($key == 'vi')?'Nội dung ngày '.($i+1):'Content date '.($i+1),'content_date_'.$i.'_'. $key,'class="content_date"  id="label_content_date_'.$key.'_'.$i.'" ');
                    $reponse[$key] .= form_error('content_date_'.$i.'_'. $key);
                    $reponse[$key] .= form_textarea('content_date_'.$i.'_'. $key,"", 'class="tinymce-area form-control" id="content_date_'.$key.'_'.$i.'" rows="3"');
                    $reponse[$key] .= '</div></div></div>';
                }
            $reponse[$key] .= '</div>';
        }
        return $this->return_api(HTTP_SUCCESS,MESSAGE_REMOVE_SUCCESS,$reponse);    
    }
    function remove(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->product_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ISSET_ERROR,$reponse);
            }
            $data = array('is_deleted' => 1);
            $update = $this->product_model->common_update($id, $data);
            if($update){
                $reponse = array(
                    'csrf_hash' => $this->security->get_csrf_hash()
                );
                return $this->return_api(HTTP_SUCCESS,MESSAGE_REMOVE_SUCCESS,$reponse);
            }
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_REMOVE_ERROR);
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ID_ERROR);
    }
    /*function remove($id){
        if($id &&  is_numeric($id) && ($id > 0)){
            $product_category = $this->product_model->get_by_id($id, array('title'));
            if($this->product_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
                redirect('admin/product', 'refresh');
            }
            if($product_category){
                $data = array('is_deleted' => 1);
                $update = $this->product_model->common_update($id, $data);
                if($update){
                    $this->session->set_flashdata('message_success',MESSAGE_REMOVE_SUCCESS);
                    return redirect('admin/'.$this->data['controller'],'refresh');
                }
                $this->session->set_flashdata('message_error',MESSAGE_REMOVE_ERROR);
                return redirect('admin/'.$this->data['controller'],'refresh');
            }
        }else{
            $this->session->set_flashdata('message_error',MESSAGE_ID_ERROR);
            return redirect('admin/'.$this->data['controller'],'refresh');
        }
    }*/

    public function edit($id){
        if($id &&  is_numeric($id) && ($id > 0)){
            $product_category = $this->product_category_model->get_by_parent_id_when_active(null,'asc');
            $this->load->helper('form');
            if($this->product_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
                redirect('admin/product', 'refresh');
            }
            $detail = $this->product_model->get_by_id($id, array('title','description','content','metakeywords','metadescription'));
            $subs = $this->product_model->get_by_parent_id($id, 'asc');
            $this->build_new_category($product_category,0,$this->data['product_category'],$subs['product_category_id']);
            $this->data['detail'] = build_language($this->data['controller'], $detail, array('title','description','content','metakeywords','metadescription'), $this->page_languages);
            $this->data['tour_date'] = $this->tour_date_model->find_array(array('product_id' => $id));
            $this->data['tour_date_full']['vi'] = $this->tour_date_model->get_all_tour_date_id($this->data['tour_date']['id'],"vi");
            $this->data['tour_date_full']['en'] = $this->tour_date_model->get_all_tour_date_id($this->data['tour_date']['id'],"en");
            if($detail){
                $detail['image'] = json_decode($detail['image']);
            }
            if($this->input->post()){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'required');
                $this->form_validation->set_rules('title_en', 'Title', 'required');
                $this->form_validation->set_rules('description_vi', 'Mô tả', 'required');
                $this->form_validation->set_rules('description_en', 'Description', 'required');
                $this->form_validation->set_rules('content_vi', 'Nội dung', 'required');
                $this->form_validation->set_rules('content_en', 'Content', 'required');
                if($this->form_validation->run() == TRUE){
                    $unique_slug = $this->data['detail']['slug'];
                    if($unique_slug !== $this->input->post('slug_shared')){
                        $unique_slug = $this->product_model->build_unique_slug($this->input->post('slug_shared'));
                    }
                    if(file_exists("assets/upload/product/".$detail['slug'])){
                        rename("assets/upload/product/".$detail['slug'], "assets/upload/product/".$unique_slug);
                    }
                    if(!file_exists("assets/upload/".$this->data['controller']."/".$unique_slug) && !empty($_FILES['image_shared']['name'])){
                        mkdir("assets/upload/".$this->data['controller']."/".$unique_slug, 0755);
                        mkdir("assets/upload/".$this->data['controller']."/".$unique_slug.'/thumb', 0755);
                    }
                    if(!empty($_FILES['image_shared']['name'])){
                        $image = $this->upload_file('./assets/upload/product/'.$unique_slug, 'image_shared', 'assets/upload/product/'. $unique_slug .'/thumb');
                        $image_array = array();
                        $image_array = $detail['image'];
                        if($image){
                            $this->check_img($_FILES['image_shared']['name'], $_FILES['image_shared']['size']);
                            foreach ($image as $key => $value) {
                                $image_array[] = $value;
                            }
                        }
                        
                    }
                    $shared_request = array(
                        'product_category_id' => $this->input->post('parent_id_shared')
                    );
                    if($unique_slug != $this->data['detail']['slug']){
                        $shared_request['slug'] = $unique_slug;
                    }
                    if(isset($image)){
                        $shared_request['image'] = json_encode($image_array);
                    }
                    $this->db->trans_begin();
                    $update = $this->product_model->common_update($id,array_merge($shared_request,$this->author_data));
                    if($update){
                        $requests = handle_multi_language_request('product_id', $id, $this->request_language_template, $this->input->post(), $this->page_languages);
                        foreach ($requests as $key => $value) {
                            $this->product_model->update_with_language($id, $requests[$key]['language'],$value);
                        }
                        $shared_request_date=array(
                            'product_id' => $id,
                            'numberdate' => $this->input->post('numberdate')
                        );
                        $update_tour = $this->tour_date_model->common_update($this->data['tour_date']['id'],array_merge($shared_request_date,$this->author_data));
                        if($update_tour){
                            $request_language_template_tour_and_id = array_merge($this->request_language_template_tour,array('id'));
                            $requests = handle_multi_language_request_date('tour_date_id', $this->data['tour_date']['id'], $request_language_template_tour_and_id, $this->input->post(), $this->page_languages);
                            $new_array = array();
                            $new_array1 = array();
                            $count_update = array();
                            foreach ($requests as $key => $value) {
                                for ($j=0; $j < count($value['title']); $j++) {
                                    $new_array = $requests[$key];
                                    // $new_array['id'] = $requests[$key]['id'][$j];
                                    unset($new_array['id']);
                                    $new_array['title'] = $requests[$key]['title'][$j];
                                    $new_array['content'] = $requests[$key]['content'][$j];
                                    if($requests[$key]['id'][$j] == 'undefined'){
                                        $new_array1[] = $new_array;
                                    }else{
                                        $count_update[] = $requests[$key]['id'][$j];
                                        $this->tour_date_model->update_language($requests[$key]['id'][$j],$new_array);
                                    }
                                }
                            }
                            if(count($new_array1)>0){
                                $this->tour_date_model->insert_with_language($new_array1);
                            }else{
                                if(count($count_update) < ((int)$this->data['tour_date']['numberdate'])*2){
                                    $array_tour_date_lang = array_merge($this->data['tour_date_full']['vi'],$this->data['tour_date_full']['en']);
                                    for ($j = 0; $j < count($array_tour_date_lang); $j++) {
                                        $check = array_search($array_tour_date_lang[$j]['id'], $count_update);
                                        if(strlen($check) == 0 && empty($check)){
                                            $this->tour_date_model->delete_tour_lang($array_tour_date_lang[$j]['id']);
                                        }
                                    }
                                }
                            }
                        }else{
                            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_EDIT_ERROR);
                        }
                    }
                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_EDIT_ERROR);
                        //$this->render('admin/'. $this->data['controller'] .'/edit_product_category_view');
                    } else {
                        $this->db->trans_commit();
                        if(isset($image) && !empty($this->data['detail']['image'])){
                            if(file_exists('assets/upload/'. $this->data['controller'] .'/'.$this->data['detail']['image']))
                            unlink('assets/upload/'. $this->data['controller'] .'/'.$this->data['detail']['image']);
                        }
                        $reponse = array(
                            'csrf_hash' => $this->security->get_csrf_hash()
                        );
                        return $this->return_api(HTTP_SUCCESS,MESSAGE_EDIT_SUCCESS,$reponse);
                    }
                }
            }
        }else{
            $this->session->set_flashdata('message_error',MESSAGE_ID_ERROR);
            redirect('admin/'. $this->data['controller'] .'', 'refresh');
        }
        $this->render('admin/product/edit_product_view');
    }
    public function active(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            $product = $this->product_model->find($id);
            $product_category = $this->product_category_model->find($product['product_category_id']);
            if($product_category['is_activated'] == 1){
                return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode(array('status' => 404,'message' => MESSAGE_ERROR_ACTIVE_PRODUCT)));
            }
            if($this->product_model->find_rows(array('id' => $id,'is_deleted' => 0)) != 0){
                $update = $this->product_model->common_update($id,array_merge(array('is_activated' => 0),$this->author_data));
                if($update){
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    return $this->return_api(HTTP_SUCCESS,'',$reponse);
                }
                return $this->return_api(HTTP_BAD_REQUEST);
            }
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ISSET_ERROR);
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ID_ERROR);
    }
    public function deactive(){
        $id = $this->input->post('id');
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->product_model->find_rows(array('id' => $id,'is_deleted' => 0)) != 0){
                $update = $this->product_model->common_update($id,array_merge(array('is_activated' => 1),$this->author_data));
                if($update){
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    return $this->return_api(HTTP_SUCCESS,'',$reponse);
                }
                return $this->return_api(HTTP_BAD_REQUEST);
            }
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ISSET_ERROR);
        }
        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_ID_ERROR);
    }
    public function remove_image(){
        $id = $this->input->post('id');
        $image = $this->input->post('image');
        $detail = $this->product_model->get_by_id($id);
        $upload = [];
        $upload = json_decode($detail['image']);
        $key = array_search($image, $upload);
        unset($upload[$key]);
        $newUpload = [];
        foreach ($upload as $key => $value) {
            $newUpload[] = $value;
        }
        
        $image_json = json_encode($newUpload);
        $data = array('image' => $image_json);

        $update = $this->product_model->common_update($id, $data);
        if($update == 1){
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            if($image != '' && file_exists('assets/upload/product/'.$detail['slug'].'/'.$image)){
                unlink('assets/upload/product/'.$detail['slug'].'/'.$image);
            }
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(HTTP_SUCCESS)
                ->set_output(json_encode(array('status' => HTTP_SUCCESS, 'reponse' => $reponse)));
        }
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(HTTP_BAD_REQUEST)
                    ->set_output(json_encode(array('status' => HTTP_BAD_REQUEST)));
    }


    /**
     * [build_parent_title description]
     * @param  [type] $parent_id [description]
     * @return [type]            [description]
     */
    protected function build_parent_title($parent_id){
        $sub = $this->product_category_model->get_by_id($parent_id, array('title'));

        if($parent_id != 0){
            $title = explode('|||', $sub['product_category_title']);
            $sub['title_en'] = $title[0];
            $sub['title_vi'] = $title[1];

            $title = $sub['title_vi'];
        }else{
            $title = 'Danh mục gốc';
        }
        return $title;
    }
    protected function check_img($filename, $filesize){
        // print_r($filesize);die;
        $images = array('jpg', 'jpeg', 'png', 'gif');
        foreach ($filename as $key => $value) {
            $map[] = explode('.',$value);
        }
        foreach ($map as $key => $value) {
            $new_map[] = $value[1];
        }
        if(array_diff($new_map, $images) != null){
            $this->session->set_flashdata('message_error', MESSAGE_FILE_EXTENSION_ERROR);
            redirect('admin/'.$this->data['controller']);
        }
        $image_size = array('success');

        foreach ($filesize as $key => $value) {
            if ($value > 1228800) {
                $check_size[] = 'error';
            }else{
                $check_size[] = 'success';
            }
        }
        if (array_diff($check_size, $image_size) != null) {
            $this->session->set_flashdata('message_error', sprintf(MESSAGE_PHOTOS_ERROR, 1200));
            redirect('admin/'.$this->data['controller']);
        }
    }
    function build_new_category($categorie, $parent_id = 0,&$result, $id = "",$char=""){
        $cate_child = array();
        foreach ($categorie as $key => $item){
            if ($item['parent_id'] == $parent_id){
                $cate_child[] = $item;
                unset($categorie[$key]);
            }
        }
        if ($cate_child){
            foreach ($cate_child as $key => $value){
            $select = ($value['id'] == $id)? 'selected' : '';
            $result.='<option value="'.$value['id'].'"'.$select.'>'.$char.$value['title'].'</option>';
            $this->build_new_category($categorie, $value['id'],$result, $id, $char.'---|');
            }
        }
    }
}