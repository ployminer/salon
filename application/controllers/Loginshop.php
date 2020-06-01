<?php
defined('BASEPATH') OR exit('NO direct script acces allowed');

class Loginshop extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('login_shopmodel');
       
    }
    public function index(){
        $this->load->view('loginshop');
    }
     
    public function check() {
      $email_shopowner = $this->input->post('email_shopowner');
      $pass = $this->input->post('pass');

      if (empty($email_shopowner)) {
          $http_status = 400;
          $response = array('message' => 'ระบุ email');
      } else if (empty($pass)) {
          $http_status = 400;
          $response = array('message' => 'ระบุ password');
      } else {
          $this->load->model('login_shopmodel');
          $member = $this->login_shopmodel->read_member_by_email_and_pass($email_shopowner, $pass);
          

          if (!empty($member)) {
              $http_status = 200;
              $response = array('message' => 'login successfully');
              
              $this->load->library('session');
              $this->session->set_userdata('email_shopowner', $member[0]->email_shopowner);
              redirect('back');
              
          } else {
             // $http_status = 400;
             // $response = array('message' => 'email or password ไม่ถูกต้อง');
             ?>
             <script type="text/javascript">
             alert("email or password ไม่ถูกต้อง");
             location.href="index";
             </script>
             <?php
          }
      }
      $this->output
              ->set_status_header($http_status)
              ->set_content_type('application/json', 'utf-8')
              ->set_output(json_encode($response))
              ->_display();
      ;
  }
}

