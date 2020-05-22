<?php
defined('BASEPATH') OR exit('NO direct script acces allowed');

class Reserve extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('register_cus');
    }
    public function index(){
        $this->load->view('reserve');
    }
    public function create() {
        $user_id = $this->input->post('user_id');
        $name_cus = $this->input->post('name_cus');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
    

        $savedata = array(
            'user_id' => $user_id,
            'name_cus' => $name_cus,
            'email' => $email,
            'phone' => $phone,
        );
//        echo '<pre>';
//        print_r($savedata);
//        echo '</pre>';
        $result = $this->register_cus->create_register($savedata);
        redirect('service');
    }
     
}