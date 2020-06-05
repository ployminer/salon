<?php
defined('BASEPATH') OR exit('NO direct script acces allowed');

class Reserve extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('service');
        $this->load->model('register_shop');
        $this->load->library('session');
        $this->load->library('form_validation');
        $email_shopowner = $this->session->userdata('email_shopowner');
        if(empty($email_shopowner)){
            //  redirect('loginshop');
        

    }
}
    public function index(){
        // $data['read'] = $this->service->read_service();
        $email_shopowner = $this->session->userdata('$email_shopowner');
        $data['read_shop'] = $this->service->read_service($email_shopowner);
        // print_r($data['read_shop']);
        // exit;
        // $data['read_shop'] = $this->service->read_shop();
        $this->load->view('reserve');
    }
    public function create() {
        $user_id = $this->input->post('user_id');
        $name_cus = $this->input->post('name_cus');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        $servicename = $this->input->post('servicename');
        $date = $this->input->post('date');
       
    

        $savedata = array(
            'user_id' => $user_id,
            'name_cus' => $name_cus,
            'email' => $email,
            'phone' => $phone,
            'servicenam' => $servicename,
            'date' => $date,
         
        );
//        echo '<pre>';
//        print_r($savedata);
//        echo '</pre>';
        $result = $this->register_cus->create_register($savedata);
        redirect('service');
    }
     
}