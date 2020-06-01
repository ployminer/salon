<?php
defined('BASEPATH') OR exit('NO direct script acces allowed');

class Tb_time extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('tbtime');
        $this->load->model('register_shop');
        $this->load->library('session');
        $this->load->library('form_validation');
        $email_shopowner = $this->session->userdata('email_shopowner');
        if(empty($email_shopowner)){
             redirect('loginshop');
        }
       
    }
    public function index(){
        $data['read'] = $this->tbtime->read_register_cus();
        $this->load->view('tb_time',$data); 
    }
    public function read_skilltype(){
        $this->db->select('id_skill,name_employee,name_skill')->from('skilltype');
        $query = $this->db->get();
        return $query->result();
    }
}