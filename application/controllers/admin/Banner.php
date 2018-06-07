<?php
/**
* 
*/
class Banner extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('banner_model');
	}

	/*========================================
	=            Show list banner            =
	========================================*/
	
	public function index(){
		$this->load->library('pagination');
		$config = array();
		$base_url = base_url('admin/banner/index');
		$per_page = 10;
		$uri_segment = 4;
		$total_rows  = $this->banner_model->count_all();
		foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->banner_model->get_all_with_pagination($per_page, $this->data['page']);
        $this->data['result'] = $result;
        // print_r($result);die;

		$this->render('admin/banner/list_banner_view');
	}
	
	/*=====  End of Show list banner  ======*/
	


	/*================================
	=            Deactive            =
	================================*/
	
	public function active()
	{
		$id = $_GET['id'];
		$banner = $this->banner_model->get_by_id($id);
		$active = $banner['is_actived'];
		if($active == 1){
			$is_active = 0;
		}else{
			$is_active = 1;
		}
		$isExists = false;
		if($this->banner_model->active($id, $is_active) == true){
			$isExists = true;
		}
		
		$this->output->set_status_header(200)->set_output(json_encode(array('isExists' => $isExists)));
	}
	
	/*=====  End of Deactive  ======*/
	
	
}