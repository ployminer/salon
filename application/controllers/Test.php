<?php
defined('BASEPATH') OR exit('NO direct script acces allowed');

class Test extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
       
    }
    public function index(){
        $this->load->view('test');
    }
}