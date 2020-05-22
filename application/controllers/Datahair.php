<?php
defined('BASEPATH') OR exit('NO direct script acces allowed');

class Datahair extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('data_hair');
       
    }
    public function index(){
        $data['read'] = $this->data_hair->read_register_cus();
        $this->load->view('datahair',$data); 
    }
}