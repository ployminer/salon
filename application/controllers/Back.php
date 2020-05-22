<?php
defined('BASEPATH') OR exit('NO direct script acces allowed');

class Back extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('back_end');
       
    }
    public function index(){
        $data['read'] = $this->back_end->read_register_cus();
        $this->load->view('back',$data); 
    }
}