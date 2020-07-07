<?php
defined('BASEPATH') OR exit('NO direct script acces allowed');

class Tb_time extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('tbtime');
        $this->load->library('session');
        $this->load->library('form_validation');
        $email_shopowner = $this->session->userdata('email_shopowner');
        if(empty($email_shopowner)){
             redirect('loginshop');
        }
       
    }
    public function index(){
        $email_shopowner = $this->session->userdata('email_shopowner');
        $data['read_shop'] = $this->tbtime->read_register_shop($email_shopowner);
        $data['time'] = $this->tbtime->read_reserve($email_shopowner);
        // print_r($data['read_time']);
        // exit;
        $data['read'] = $this->tbtime->read_register_cus();
        $this->load->view('tb_time',$data); 
    }
    public function read_skilltype(){
        $this->db->select('id_skill,name_employee,servicename')->from('skilltype');
        $query = $this->db->get();
        return $query->result();
    }

    public function read_reserve(){
        $savedata = array(
            'technician' => $technician,
            'name_cus' => $name_cus,
            'time' => $time,
            'date' => date ,
            'servicename' => $servicename
        );
            $result = $this->tbtime->read_reserve($savedata);
        redirect('tb_time');
       
    }
}