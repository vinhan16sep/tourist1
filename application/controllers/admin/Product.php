<?php 

/**
* 
*/
class Product extends Admin_Controller{
    private $request_language_template = array(
        'title', 'description', 'content', 'metakeywords', 'metadescription','tripnodes','detailsprice','datetitle','datecontent'
    );
    // private $request_language_template_tour = array(
    //     'title', 'content'
    // );
    private $request_vehicles = array(
        'Chọn phương tiện','Không xác định','Máy bay','Tàu thủy','Tàu hỏa','Ô tô','Xe máy','Xe đạp','Đi bộ'
    );
    private $author_data = array();

	function __construct(){
		parent::__construct();
		$this->load->model('product_model');
        $this->load->model('product_category_model');
        $this->load->model('localtion_model');
        $this->load->model('tour_date_model');
		$this->load->helper('common');
        $this->load->helper('file');
        $this->data['template'] = build_template();
        $this->data['request_language_template'] = $this->request_language_template;
        // $this->data['request_language_template_tour'] = $this->request_language_template_tour;
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
            if($this->input->post('parent_id_shared') == '' || $this->input->post('title_vi') == '' || $this->input->post('title_en') == ''){
                        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_CREATE_ERROR_VALIDATE);
            }
            foreach ($this->page_languages as $key => $value) {
                for ($i=0; $i < count($this->input->post('datetitle_vi')); $i++) {
                    if($this->input->post('datetitle_'.$value)[$i] == ''){
                        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_CREATE_ERROR_VALIDATE);
                    }
                }
            }
            for ($i=0; $i < count($this->input->post('vehicles')); $i++) {
                if(empty($this->input->post('vehicles')[$i])){
                    return $this->return_api(HTTP_NOT_FOUND,MESSAGE_CREATE_ERROR_VALIDATE);
                }
            }
            if(!empty($_FILES['image_shared']['name'])){
                $this->check_img($_FILES['image_shared']['name'], $_FILES['image_shared']['size']);
            }
            if(!empty($_FILES['dateimg']['name'])){
                $this->check_imgs($_FILES['dateimg']['name'], $_FILES['dateimg']['size']);
            }
            if(!empty($_FILES['image_localtion']['name'])){
                $this->check_img($_FILES['image_localtion']['name'], $_FILES['image_localtion']['size']);
            }
            $img_array = array();
            if($this->input->post('dateimg') !== null){
                $img_array = $this->input->post('dateimg');
            }
            $slug = $this->input->post('slug_shared');
            $unique_slug = $this->product_model->build_unique_slug($slug);
            if(!file_exists("assets/upload/".$this->data['controller']."/".$unique_slug) && (!empty($_FILES['image_shared']['name']) || !empty($_FILES['dateimg']['name']) || !empty($_FILES['image_localtion']['name']))){
                mkdir("assets/upload/".$this->data['controller']."/".$unique_slug, 0777);
                mkdir("assets/upload/".$this->data['controller']."/".$unique_slug.'/thumb', 0777);
            }
            if(!empty($_FILES['image_shared']['name'])){
                $image = $this->upload_image('image_shared', $_FILES['image_shared']['name'], 'assets/upload/product/'.$unique_slug, 'assets/upload/product/'.$unique_slug.'/thumb');
            }
            if(!empty($_FILES['image_localtion']['name'])){
                $localtionimage = $this->upload_image('image_localtion', $_FILES['image_localtion']['name'], 'assets/upload/product/'.$unique_slug, 'assets/upload/product/'.$unique_slug.'/thumb');
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
                'price' => $this->input->post('price'),
                'priceadults ' => $this->input->post('priceadults'),
                'pricechildren ' => $this->input->post('pricechildren'),
                'priceinfants ' => $this->input->post('priceinfants'),
                'percen' => $this->input->post('percen'),
                'localtion' => $this->input->post('localtion'),
                'product_category_id' => $this->input->post('parent_id_shared'),
                'dateimg' => json_encode($dateimage_full),
                'vehicles' => json_encode($this->input->post('vehicles')),
                'librarylocaltion' => json_encode($this->input->post('librarylocaltion'))
            );
            if($this->input->post('date') !== null){
                $date= explode("/",$this->input->post('date'));
                $datetime=date('Y-m-d H:i:s', strtotime($date[1]."/".$date[0]."/".$date[2]));
            }
            if(isset($datetime)){
                $shared_request['date'] = $datetime;
            }
            if(isset($image)){
                $shared_request['image'] = $image;
            }
            if(isset($localtionimage)){
                $shared_request['imglocaltion'] = $localtionimage;
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
        $this->render('admin/product/create_product_view');
    }
    public function detail($id){
        $this->load->model('rating_model');
        if($id &&  is_numeric($id) && ($id > 0)){
            if($this->product_model->find_rows(array('id' => $id,'is_deleted' => 0)) != 0){
                $this->load->helper('form');
                $this->load->library('form_validation');
                $product = $this->product_model->get_by_id($id, array('title', 'description', 'content','metakeywords','metadescription','tripnodes','detailsprice','datetitle','datecontent'));
                $detail = build_language($this->data['controller'], $product, array('title', 'description', 'content','metakeywords','metadescription','tripnodes','detailsprice','datetitle','datecontent'), $this->page_languages);
                $parent_title = $this->build_parent_title($detail['product_category_id']);
                $detail['parent_title'] = $parent_title;
                $detail['datetitle_vi'] = json_decode($detail['datetitle_vi']);
                $detail['datetitle_en'] = json_decode($detail['datetitle_en']);
                $detail['datecontent_vi'] = json_decode($detail['datecontent_vi']);
                $detail['datecontent_en'] = json_decode($detail['datecontent_en']);
                $detail['vehicles'] = json_decode($detail['vehicles']);
                $librarylocaltion = json_decode($detail['librarylocaltion']);
                if(!empty($librarylocaltion)){
                    for($i=0;$i < count($librarylocaltion);$i++){
                        $librarylocaltions = explode(',',$librarylocaltion[$i]);
                        if(!empty($librarylocaltions)){
                            for($j=0;$j < count($librarylocaltions);$j++){
                                $library= $this->localtion_model->get_by_id_array($librarylocaltions[$j]);
                                if(!empty($library['id'])){
                                    $librarys[$i][] = build_language('localtion', $library, array('title','content'), $this->page_languages);
                                }else{
                                    $librarys[$i][] = "";
                                }
                            }
                        }
                    }
                    $detail['librarylocaltion'] = $librarys;
                }else{
                    $detail['librarylocaltion'] = $librarylocaltion;
                }
                $this->data['detail'] = $detail;
                $rating = $this->product_model->rating_by_id($id);
                $count_rating = $rating['count_rating'];
                $total_rating = $rating['total_rating'];
                if($count_rating != 0 && $total_rating != 0){
                    $new_rating = round($total_rating / $count_rating, 1);
                }else{
                    $new_rating = 0;
                }
                $this->data['count_rating'] = $count_rating;
                $this->data['rating'] = $new_rating;
                $this->data['refer'] = $this->input->get('refer');
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
            $reponse .= form_label('Chọn khu vực ngày '.($i+1), 'img_date_'.$i,'class="img_date"   id="label_img_date_'.$i.'" ');

            $reponse .= '<select class="form-control" name="parengoplace_'.$i.'" data-idlocaltion="'.$i.'" style="width: 100%;"  id="paren-go-place_'.$i.'">';
            $reponse .= $this->area_selected();
            $reponse .= '</select>';
            $reponse .= form_label('Chọn những nơi đến ngày '.($i+1), 'img_date_'.$i,'class="img_date"   id="label_img_date_'.$i.'" ');
            $reponse .= '<select class="form-control select2 select2-hidden-accessible" name="goplace_'.$i.'" multiple="" data-placeholder="Select a State" style="width: 100%;min-height:34px;min-width:300px;" tabindex="-1" aria-hidden="true" id="go-place_'.$i.'">';
            $reponse .= '</select>';
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
        return $this->return_api(HTTP_SUCCESS,MESSAGE_CREATE_SUCCESS,$reponse);    
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
            $this->data['area_selected'] = $this->localtion_model->get_all_group_by();
            $this->data['localtion_all'] = $this->localtion_model->get_all_localtion();
            $product_category = $this->product_category_model->get_by_parent_id_when_active(null,'asc');
            $this->load->helper('form');
            if($this->product_model->find_rows(array('id' => $id,'is_deleted' => 0)) == 0){
                $this->session->set_flashdata('message_error',MESSAGE_ISSET_ERROR);
                redirect('admin/product', 'refresh');
            }
            $detail = $this->product_model->get_by_id($id, array('title','description','content','metakeywords','metadescription','datetitle','datecontent','tripnodes','detailsprice'));
            $subs = $this->product_model->get_by_parent_id($id, 'asc');
            $this->build_new_category($product_category,0,$this->data['product_category'],$subs['product_category_id']);
            $this->data['detail'] = build_language($this->data['controller'], $detail, array('title','description','content','metakeywords','metadescription','datetitle','datecontent','tripnodes','detailsprice'), $this->page_languages);
            $this->data['detail']['datetitle_vi'] = json_decode($this->data['detail']['datetitle_vi']);
            $this->data['detail']['datetitle_en'] = json_decode($this->data['detail']['datetitle_en']);
            $this->data['detail']['datecontent_vi'] = json_decode($this->data['detail']['datecontent_vi']);
            $this->data['detail']['datecontent_en'] = json_decode($this->data['detail']['datecontent_en']);
            $this->data['detail']['vehicles'] = json_decode($this->data['detail']['vehicles']);
            if($this->data['detail']['date'] != "0000-00-00 00:00:00" && $this->data['detail']['date'] != "1970-01-01 08:00:00"){
                $rmtime = str_replace(" 00:00:00","",$this->data['detail']['date']);
                $date= explode("-",$rmtime);
                if(count($date) == 3){
                    $this->data['detail']['date'] = $date[2]."/".$date[1]."/".$date[0];
                }else{
                    $this->data['detail']['date'] = "";
                }
            }else{
                $this->data['detail']['date'] = "";
            }
            $librarylocaltion = json_decode($this->data['detail']['librarylocaltion']);
            if(!empty($librarylocaltion)){
                for($i=0;$i < count($librarylocaltion);$i++){
                    $librarylocaltions = explode(',',$librarylocaltion[$i]);
                    $library[$i] = $this->localtion_model->get_librarylocaltion_by_id_array($librarylocaltions);
                    if(!empty($library[$i])){
                        $notlibrary[$i] = $this->localtion_model->get_librarylocaltion_by_not_id_array($librarylocaltions,$library[$i][0]['area']);
                    }
                }
                $this->data['detail']['librarylocaltion'] = $library;
                $this->data['detail']['notlibrarylocaltion'] = $notlibrary;
            }else{
                $this->data['detail']['librarylocaltion'] = $librarylocaltion;
                $this->data['detail']['notlibrarylocaltion'] = array();
            }
            $dateimg_array = json_decode($detail['dateimg']);
            if($this->input->post()){
                if($this->input->post('parent_id_shared') == '' || $this->input->post('title_vi') == '' || $this->input->post('title_en') == ''){
                            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_EDIT_ERROR_VALIDATE);
                }
                foreach ($this->page_languages as $key => $value) {
                    for ($i=0; $i < count($this->input->post('datetitle_vi')); $i++) {
                        if($this->input->post('datetitle_'.$value)[$i] == ''){
                            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_EDIT_ERROR_VALIDATE);
                        }
                    }
                }
                for ($i=0; $i < count($this->input->post('vehicles')); $i++) {
                    if(empty($this->input->post('vehicles')[$i])){
                        return $this->return_api(HTTP_NOT_FOUND,MESSAGE_EDIT_ERROR_VALIDATE);
                    }
                }
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
                if(!file_exists("assets/upload/".$this->data['controller']."/".$unique_slug) && (!empty($_FILES['image_shared']['name']) || !empty($_FILES['dateimg']['name']) || !empty($_FILES['image_localtion']['name']))){
                    mkdir("assets/upload/".$this->data['controller']."/".$unique_slug, 0777);
                    mkdir("assets/upload/".$this->data['controller']."/".$unique_slug.'/thumb', 0777);
                }
                if(!empty($_FILES['image_shared']['name'])){
                    $this->check_img($_FILES['image_shared']['name'], $_FILES['image_shared']['size']);
                    $image = $this->upload_image('image_shared', $_FILES['image_shared']['name'], 'assets/upload/product/'.$unique_slug, 'assets/upload/product/'.$unique_slug.'/thumb');
                }
                if(!empty($_FILES['image_localtion']['name'])){
                    $this->check_img($_FILES['image_localtion']['name'], $_FILES['image_localtion']['size']);
                    $localtionimage = $this->upload_image('image_localtion', $_FILES['image_localtion']['name'], 'assets/upload/product/'.$unique_slug, 'assets/upload/product/'.$unique_slug.'/thumb');
                }
                if(!empty($_FILES['dateimg']['name'])){
                    $this->check_imgs($_FILES['dateimg']['name'], $_FILES['dateimg']['size']);
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
                    'price' => $this->input->post('price'),
                    'priceadults ' => $this->input->post('priceadults'),
                    'pricechildren ' => $this->input->post('pricechildren'),
                    'priceinfants ' => $this->input->post('priceinfants'),
                    'percen' => $this->input->post('percen'),
                    'localtion' => $this->input->post('localtion'),
                    'product_category_id' => $this->input->post('parent_id_shared'),
                    'vehicles' => json_encode($this->input->post('vehicles')),
                    'librarylocaltion' => json_encode($this->input->post('librarylocaltion'))
                );
                if($unique_slug != $this->data['detail']['slug']){
                    $shared_request['slug'] = $unique_slug;
                }
                if($this->input->post('date') !== null){
                    $date= explode("/",$this->input->post('date'));
                    $datetime=date('Y-m-d H:i:s', strtotime($date[1]."/".$date[0]."/".$date[2]));
                }
                if(isset($datetime)){
                    $shared_request['date'] = $datetime;
                }
                if(isset($image)){
                    $shared_request['image'] = $image;
                }
                if(isset($localtionimage)){
                    $shared_request['imglocaltion'] = $localtionimage;
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
                    if(isset($dateimage_json) && !empty($this->data['detail']['dateimg'])) {
                        $this->remove_img_date($this->input->post('datetitle_vi'),$dateimg_array,$unique_slug,$img_array);
                    }
                    if(isset($localtionimage) && !empty($this->data['detail']['imglocaltion'])) {
                        $this->remove_img($unique_slug,$this->data['detail']['imglocaltion']);
                    }
                    if(isset($image) && !empty($this->data['detail']['image'])) {
                        $this->remove_img($unique_slug,$this->data['detail']['image']);
                    }
                    $reponse = array(
                        'csrf_hash' => $this->security->get_csrf_hash()
                    );
                    return $this->return_api(HTTP_SUCCESS,MESSAGE_EDIT_SUCCESS,$reponse);
                    
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
                $new_array = explode('.', $image);
                $typeimg = array_pop($new_array);
                $nameimg = str_replace(".".$typeimg, "", $image);
                if(file_exists('assets/upload/product/'.$detail['slug'].'/thumb/'.$nameimg.'_thumb.'.$typeimg)){
                    unlink('assets/upload/product/'.$detail['slug'].'/thumb/'.$nameimg.'_thumb.'.$typeimg);
                }
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
    protected function check_imgs($filename, $filesize){
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
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_CREATE_ERROR);
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
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_CREATE_ERROR);
        }
    }
    protected function check_img($filename, $filesize){
        $map = strripos($filename, '.')+1;
        $fileextension = substr($filename, $map,(strlen($filename)-$map));
        if(!($fileextension == 'jpg' || $fileextension == 'jpeg' || $fileextension == 'png' || $fileextension == 'gif')){
            $this->session->set_flashdata('message_error', MESSAGE_FILE_EXTENSION_ERROR);
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_CREATE_ERROR);
        }
        if ($filesize > 1228800) {
            $this->session->set_flashdata('message_error', sprintf(MESSAGE_PHOTOS_ERROR, 1200));
            return $this->return_api(HTTP_NOT_FOUND,MESSAGE_CREATE_ERROR);
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
                    if(file_exists('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/thumb/'.$nameimg.'_thumb.'.$typeimg)){
                        unlink('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/thumb/'.$nameimg.'_thumb.'.$typeimg);
                    }
                }
            }
        }
    }
    function remove_img($unique_slug = '',$image= ''){
        if(file_exists('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/'.$image)){
            unlink('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/'.$image);
            $new_array = explode('.', $image);
            $typeimg = array_pop($new_array);
            $nameimg = str_replace(".".$typeimg, "", $image);
            if(file_exists('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/thumb/'.$nameimg.'_thumb.'.$typeimg)){
                unlink('assets/upload/'. $this->data['controller'] .'/'.$unique_slug.'/thumb/'.$nameimg.'_thumb.'.$typeimg);
            }
        }
    }
    function area_selected($type='create'){
        $result = '<option>Chọn khu vực</option>';
        foreach ($this->localtion_model->get_all_group_by() as $key => $value) {
            $result .= '<option value="'.$value['slug'].'">'.$value['area'].'</option>';
        }
        return $result;
    }
    function ajax_area_selected(){
        $area =$this->input->post('area');
        $detail = $this->localtion_model->get_by_slug_localtion($area);
        $result = '';
        foreach ($this->localtion_model->get_by_area($detail['area']) as $key => $value) {
            $result .= '<option value="'.$value['id'].'">'.$value['localtion'].'</option>';
        }
        $reponse = array(
            'csrf_hash' => $this->security->get_csrf_hash(),
            'content' => $result
        );
        return $this->return_api(HTTP_SUCCESS,'',$reponse);
    }
}