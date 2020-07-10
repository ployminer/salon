<?php
defined('BASEPATH') OR exit('NO direct script acces allowed');

class Booking extends CI_Controller{
    public function __construct() {
        parent::__construct();
        // $this->load->helper('url');
        // $this->load->model('back_end');
        // $this->load->model('register_shop');
        // $this->load->library('session');
        // $this->load->library('form_validation');
       
    }
    public function index(){
        // $email_shopowner = $this->session->userdata('email_shopowner');
        // $data['read'] = $this->back_end->read_register_shop($email_shopowner);
        $this->load->view('booking'); 
    }
    
}