<?php
defined('BASEPATH') OR exit('NO direct script acces allowed');

class Datacustomer extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('data_cus');
       
    }
    public function index(){
        $data['read'] = $this->data_cus->read_register_cus();
        $this->load->view('datacustomer',$data); 
    }
}