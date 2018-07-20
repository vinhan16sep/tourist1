<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends Admin_Controller {
	private $request_language_template = array();
    private $author_data = array();
    function __construct(){
        parent::__construct();
        $this->load->model('booking_model');
        $this->load->helper('common');
        $this->author_data = handle_author_common_data();
    }

	public function index(){
        $this->temp(0, 'index');
    }

    public function success(){
        $this->temp(1, 'success');
    }

    public function cancel(){
        $this->temp(2, 'cancel');
    }

    function temp($status, $page){
        $keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $datetime = array();
        if($this->input->get('date')){
            $this->data['date'] = $this->input->get('date');
            $date = explode(" - ", $this->input->get('date'));
            foreach ($date as $key => $value) {
                $date= explode("/",$value);
                $datetime[$key]=date('Y-m-d H:i:s', strtotime($date[1]."/".$date[0]."/".$date[2]));
                if($key == 1){
                    $datetime[$key]=date('Y-m-d 23:59:59', strtotime($date[1]."/".$date[0]."/".$date[2]));
                }
            }
        }
        $total_rows  = $this->booking_model->count_search_booking($status, $keywords,$datetime);

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/booking/'. $page);
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->booking_model->get_all_booking_with_pagination_search($status, $per_page, $this->data['page'], $keywords,$datetime);

        $this->data['booking'] = $result;
        $this->data['keywords'] = $keywords;
        $this->render('admin/booking/list_booking_view');
    }


    public function status_success(){
        $id = $this->input->get('id');
        $data = array('status' => 1);
        $update = $this->booking_model->common_update($id, $data);
        if($update == 1){
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200)));
        }
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(400)
                    ->set_output(json_encode(array('status' => 400)));
    }

    public function status_cancel(){
        $id = $this->input->get('id');
        $data = array('status' => 2);
        $update = $this->booking_model->common_update($id, $data);
        if($update == 1){
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200)));
        }
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(400)
                    ->set_output(json_encode(array('status' => 400)));
    }

}

/* End of file Booking.php */
/* Location: ./application/controllers/admin/Booking.php */