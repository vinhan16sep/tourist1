<?php

defined('BASEPATH') OR exit('No direct script access allowed');
include "class.phpmailer.php";
include "class.smtp.php";
class Landing extends Public_Controller
{

    private $_lang = '';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('landing_model');
        $this->data['lang'] = $this->session->userdata('langAbbreviation');
    }

    public function index(){
        $this->data['current_link'] = 'landing';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('landing_name', 'FULL NAME', 'required');
        $this->form_validation->set_rules('landing_mail', 'EMAIL', 'required');
        $this->form_validation->set_rules('landing_phone', 'YOUR PHONE NUMBER', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('landing_page_view');
        } else {
            if ($this->input->post()) {
                $data = array(
                    'name' => $this->input->post('landing_name'),
                    'email' => $this->input->post('landing_mail'),
                    'phone' => $this->input->post('landing_phone'),
                    'content' => $this->input->post('landing_message'),
                    'created_at' => date('Y-m-d H:i:s')
                );

                $this->landing_model->common_insert($data);
                $send = $this->send_mail($data);

                if($send == false){
                    $this->output->set_status_header(404)
                    ->set_output(json_encode(array('message' => 'Fail', 'data' => $data)));
                }else{
                    redirect('landing');
                }
            }
        }
    }

    public function send_mail($data) {
        $mail = new PHPMailer();
        $mail->IsSMTP(); // set mailer to use SMTP
        $mail->Host = "smtp.gmail.com"; // specify main and backup server
        $mail->Port = 465; // set the port to use
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->SMTPSecure = 'ssl';
        $mail->Username = "nghemalao@gmail.com"; // your SMTP username or your gmail username
        $mail->Password = "Huongdan1"; // your SMTP password or your gmail password
        $from = "minhtruong93gtvt@gmail.com"; // Reply to this email
        $to = "truong.do@matocreative.vn"; // Recipients email ID
        $name = 'WEBMAIL'; // Recipient's name
        $mail->From = $from;
        $mail->FromName = $name; // Name to indicate where the email came from when the recepient received
        $mail->AddAddress($to, $name);
        $mail->CharSet = 'UTF-8';
        $mail->WordWrap = 50; // set word wrap
        $mail->IsHTML(true); // send as HTML
        $mail->Subject = "Mail từ " . strip_tags($data['name']);

        $mail->Body = $this->email_template($data); //HTML Body

        //$mail->SMTPDebug = 2;

        if(!$mail->Send()){
            return false;
        } else {
            return true;
        }
    }

    public function email_template($data){
        $message = '<html><body>';
        $message .= '<p>Chào Admin, bạn có 1 liện hệ mới từ người dùng trên website</p>';
        $message .= '<p>Thông tin như sau:</p>';
        $message .= '<p>Họ tên: ' . $data['name'] . '</p>';
        $message .= '<p>Email: ' . $data['email'] . '</p>';
        $message .= '<p>Số điện thoại: ' . $data['phone'] . '</p>';
        $message .= "</body></html>";

        return $message;
    }
}