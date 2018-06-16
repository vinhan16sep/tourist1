<?php 

/**
* 
*/
class Product extends Admin_Controller{
    private $request_language_template = array(
        'title', 'description', 'content', 'metakeywords', 'metadescription','datetitle','datecontent'
    );
    private $request_language_template_tour = array(
        'title', 'content'
    );
    private $request_vehicles = array(
        'Chọn phương tiện','Không xác định','Máy bay','Thuyền','Tàu hỏa','Ô tô','Xe máy','Xe đạp','Đi bộ'
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
        $this->data['request_vehicles'] = $this->request_vehicles;
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
            if($this->form_validation->run() == TRUE){
                if(!empty($_FILES['image_shared']['name'])){
                    $this->check_img($_FILES['image_shared']['name'], $_FILES['image_shared']['size']);
                }
                $img_array = array();
                if($this->input->post('dateimg') !== null){
                    $img_array = $this->input->post('dateimg');
                }
                $slug = $this->input->post('slug_shared');
                $unique_slug = $this->product_model->build_unique_slug($slug);
                if(!file_exists("assets/upload/".$this->data['controller']."/".$unique_slug) && (!empty($_FILES['image_shared']['name']) || !empty($_FILES['dateimg']['name']))){
                    mkdir("assets/upload/".$this->data['controller']."/".$unique_slug, 0777);
                    mkdir("assets/upload/".$this->data['controller']."/".$unique_slug.'/thumb', 0777);
                }
                if(!empty($_FILES['image_shared']['name'])){
                    $image = $this->upload_file('./assets/upload/product/'.$unique_slug, 'image_shared', 'assets/upload/product/'. $unique_slug .'/thumb');
                    $image_json = json_encode($image);
                }
                $dateimage_full = array();
                if(!empty($_FILES['dateimg']['name'])){
                    $dateimage = $this->upload_file('./assets/upload/product/'.$unique_slug, 'dateimg', 'assets/upload/product/'. $unique_slug .'/thumb');
                    for ($i=0; $i < count($this->input->post('datetitle_vi')); $i++) { 
                        if(array_key_exists($i,array_flip($img_array))){
                            $dateimage_full[] = "";
                        }else{
                            $dateimage_full[] = array_shift($dateimage);
                        }
                    }
                }else{
                    for ($i=0; $i < count($this->input->post('datetitle_vi')); $i++) {
                        $dateimage_full[] = "";
                    }
                }
                $shared_request = array(
                    'slug' => $unique_slug,
                    'product_category_id' => $this->input->post('parent_id_shared'),
                    'dateimg' => json_encode($dateimage_full),
                    'vehicles' => json_encode($this->input->post('vehicles'))
                );
                if(isset($image)){
                    $shared_request['image'] = $image_json;
                }
                $this->db->trans_begin();
                $insert = $this->product_model->common_insert(array_merge($shared_request,$this->author_data));
                if($insert){
                    $requests = handle_multi_language_request('product_id', $insert, $this->request_language_template, $this->input->post(), $this->page_languages);
                    $this->product_model->insert_with_language($requests);
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
    public function detail($id){
        $this->load->model('rating_model');
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->product_model->find_rows(array('id' => $id,'is_deleted' => 0)) != 0){
                $this->load->helper('form');
                $this->load->library('form_validation');
                $product = $this->product_model->get_by_id($id, array('title', 'description', 'content','metakeywords','metadescription','datetitle','datecontent'));
                $detail = build_language($this->data['controller'], $product, array('title', 'description', 'content','metakeywords','metadescription','datetitle','datecontent'), $this->page_languages);
                $parent_title = $this->build_parent_title($detail['product_category_id']);
                $detail['parent_title'] = $parent_title;
                $detail['datetitle_vi'] = json_decode($detail['datetitle_vi']);
                $detail['datetitle_en'] = json_decode($detail['datetitle_en']);
                $detail['datecontent_vi'] = json_decode($detail['datecontent_vi']);
                $detail['datecontent_en'] = json_decode($detail['datecontent_en']);
                $detail['vehicles'] = json_decode($detail['vehicles']);
		        // $count_rating = $this->rating_model->count_by_product_id($id);
          //       $total_rating = $this->rating_model->total_by_product_id($id);
          //       if($count_rating != 0 && $total_rating != 0){
          //           $rating = round($total_rating['rating'] / $count_rating, 1);
          //       }else{
          //           $rating = 0;
          //       }
                $this->data['detail'] = $detail;
		        // $this->data['rating'] = $rating;
          //       $this->data['count_rating'] = $count_rating;
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
        $reponse = '';
        for ($i=$numbercurrent; $i < $numberdate; $i++) {
            $reponse .= '<div class="vi">';
            $reponse .='<div role="tabpanel" class="tab-pane active" id="'.$i.'"><div class="title-content-date showdate '.$i.'">';
            $reponse .= '<div class="btn btn-primary col-xs-12 btn-margin" type="button" data-toggle="collapse" href="#showdatecontent_'.$i.'" aria-expanded="true" aria-controls="messageContent" style="padding:10px 0px;margin-bottom:3px;">';
            $reponse .= '<div class="col-xs-11">Nội dung Đầy đủ Ngày '.($i+1).'</div>';
            $reponse .= '</div>';
            $reponse .= '<div class="no_border"><div class="collapse in" id="showdatecontent_'.$i.'">';
            $reponse .= '<div class="col-xs-12 title-content-date date " style="margin-top:-5px;">';
            $reponse .= form_label('Hình ảnh ngày '.($i+1), 'img_date_'.$i,'class="img_date"   id="label_img_date_'.$i.'" ');
            $reponse .= form_upload('img_date_'.$i.'[]',"",'class="form-control" id="img_date_'.$i.'"');
            $reponse .= form_label('Phương tiện đi ngày '.($i+1), 'vehicles');
            $reponse .= form_error('vehicles');
            $reponse .= form_dropdown('vehicles_'.$i, $this->data['request_vehicles'],0, 'class="form-control" id="vehicles_'.$i.'"');
            $reponse .= '<div style="margin-top: 10px;"><ul class="nav nav-pills nav-justified language" role="tablist">';
            $number = 0;
            foreach ($this->data['page_languages'] as $key => $value) {
                $active = ($number == 0)?'active':'';
                $reponse .='<li role="presentation" class="'.$active.'"><a href="#'.$key.$i.'" aria-controls="'.$key.$i.'" role="tab" data-toggle="tab"><span class="badge">'.($number + 1).'</span>'.$value.'</a></li>';
                $number++;
            }
            $number = 0;
            $reponse .= '<ul></div><div class="tab-content">';
            foreach ($this->data['page_languages'] as $key => $value) {
                $active = ($number == 0)?'active':'';
                $reponse .= '<div role="tabpanel" class="tab-pane '.$active.'" id="'.$key.$i.'">';
                $reponse .= '<div class="col-xs-12" style="padding:0px">';
                $reponse .= form_label(($key == 'vi')?'Tiêu đề ngày '.($i+1):'Title date '.($i+1), 'title_date_'.$i.'_'. $key,'class="title_date"   id="label_title_date_'.$key.'_'.$i.'" ');
                $reponse .= form_error('title_date_'.$i.'_'. $key);
                $reponse .= form_input('title_date_'.$i.'_'. $key,"", 'class="form-control" id="title_date_'.$key.'_'.$i.'"');
                $reponse .= form_label(($key == 'vi')?'Nội dung ngày '.($i+1):'Content date '.($i+1),'content_date_'.$i.'_'. $key,'class="content_date"  id="label_content_date_'.$key.'_'.$i.'" ');
                $reponse .= form_error('content_date_'.$i.'_'. $key);
                $reponse .= form_textarea('content_date_'.$i.'_'. $key,"", 'class="tinymce-area form-control" id="content_date_'.$key.'_'.$i.'" rows="3"');
                $reponse .= '</div></div>';

                $number++;
            }
                $reponse .= '</div></div></div></div></div>';
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
    public function edit($id){
        if($id &&  is_numeric($id) && ($id > 0)){
            $product_category = $this->product_category_model->get_by_parent_id_when_active(null,'asc');
            $this->load->helper('form');
            if($this->product_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
                redirect('admin/product', 'refresh');
            }
            $detail = $this->product_model->get_by_id($id, array('title','description','content','metakeywords','metadescription','datetitle','datecontent'));
            $subs = $this->product_model->get_by_parent_id($id, 'asc');
            $this->build_new_category($product_category,0,$this->data['product_category'],$subs['product_category_id']);
            $this->data['detail'] = build_language($this->data['controller'], $detail, array('title','description','content','metakeywords','metadescription','datetitle','datecontent'), $this->page_languages);
            $this->data['detail']['datetitle_vi'] = json_decode($this->data['detail']['datetitle_vi']);
            $this->data['detail']['datetitle_en'] = json_decode($this->data['detail']['datetitle_en']);
            $this->data['detail']['datecontent_vi'] = json_decode($this->data['detail']['datecontent_vi']);
            $this->data['detail']['datecontent_en'] = json_decode($this->data['detail']['datecontent_en']);
            $this->data['detail']['vehicles'] = json_decode($this->data['detail']['vehicles']);
            $detail['image'] = json_decode($detail['image']);
            $dateimg_array = json_decode($detail['dateimg']);
            if($this->input->post()){
                $this->load->library('form_validation');
                $this->form_validation->set_rules('title_vi', 'Tiêu đề', 'required');
                $this->form_validation->set_rules('title_en', 'Title', 'required');
                if($this->form_validation->run() == TRUE){
                    $unique_slug = $this->data['detail']['slug'];
                    $img_array = array();
                    if($this->input->post('dateimg') !== null){
                        $img_array = $this->input->post('dateimg');
                    }
                    if($unique_slug !== $this->input->post('slug_shared')){
                        $unique_slug = $this->product_model->build_unique_slug($this->input->post('slug_shared'));
                        if(file_exists("assets/upload/product/".$detail['slug'])) {
                            rename("assets/upload/product/".$detail['slug'], "assets/upload/product/".$unique_slug);
                        }
                    }
                    if(!file_exists("assets/upload/".$this->data['controller']."/".$unique_slug) && (!empty($_FILES['image_shared']['name']) || !empty($_FILES['dateimg']['name']))){
                        mkdir("assets/upload/".$this->data['controller']."/".$unique_slug, 0777);
                        mkdir("assets/upload/".$this->data['controller']."/".$unique_slug.'/thumb', 0777);
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
                    if(!empty($_FILES['dateimg']['name'])){
                        $dateimage = $this->upload_file('./assets/upload/product/'.$unique_slug, 'dateimg', 'assets/upload/product/'. $unique_slug .'/thumb');
                        for ($i=0; $i < count($this->input->post('datetitle_vi')); $i++) { 
                            if(array_key_exists($i,array_flip($img_array))){
                                $dateimage_full[$i] = $dateimg_array[$i];
                            }else{
                                $dateimage_full[$i] = array_shift($dateimage);
                            }
                        }
                        $dateimage_json = json_encode($dateimage_full);
                    }
                    $shared_request = array(
                        'product_category_id' => $this->input->post('parent_id_shared'),
                        'vehicles' => json_encode($this->input->post('vehicles'))
                    );
                    if($unique_slug != $this->data['detail']['slug']){
                        $shared_request['slug'] = $unique_slug;
                    }
                    if(isset($image)){
                        $shared_request['image'] = json_encode($image_array);
                    }
                    if(isset($dateimage_json)){
                        $shared_request['dateimg'] = $dateimage_json;
                    }
                    $this->db->trans_begin();
                    $update = $this->product_model->common_update($id,array_merge($shared_request,$this->author_data));
                    if($update){
                        $requests = handle_multi_language_request('product_id', $id, $this->request_language_template, $this->input->post(), $this->page_languages);
                        foreach ($requests as $key => $value) {
                            $this->product_model->update_with_language($id, $requests[$key]['language'],$value);
                        }
                    }
                    if ($this->db->trans_status() === false) {
                        $this->db->trans_rollback();
                        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_EDIT_ERROR);
                    } else {
                        $this->db->trans_commit();
                        if(isset($image) && !empty($this->data['detail']['image'])){
                            if(file_exists('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/'.$this->data['detail']['image']))
                            unlink('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/'.$this->data['detail']['image']);
                        }
                        if(isset($dateimage_json) && !empty($this->data['detail']['dateimg'])) {
                            $this->remove_img_date($this->input->post('datetitle_vi'),$dateimg_array,$unique_slug,$img_array);
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
    function remove_img_date($numberdate=array(),$dateimg_array=array(),$unique_slug = '',$dateimg= ''){
        for ($i=0; $i < count($this->input->post('datetitle_vi')); $i++) { 
            if(!array_key_exists($i,array_flip($dateimg)) && !empty($dateimg_array[$i])){
                if(file_exists('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/'.$dateimg_array[$i])){
                    unlink('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/'.$dateimg_array[$i]);
                    $new_array = explode('.', $dateimg_array[$i]);
                    $typeimg = array_pop($new_array);
                    $nameimg = str_replace(".".$typeimg, "", $dateimg_array[$i]);
                    unlink('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/thumb/'.$nameimg.'_thumb.'.$typeimg);
                }
            }
        }
    }
}