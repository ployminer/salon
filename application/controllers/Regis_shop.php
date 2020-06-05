<?php
defined('BASEPATH') OR exit('NO direct script acces allowed');

class Regis_shop extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('register_shop');
    }
    public function index(){
        $this->load->view('regis_shop');
    }
    public function create() {
        
        $user_id = $this->input->post('user_id');
        $name_shop = $this->input->post('name_shop');
        $add_shop = $this->input->post('add_shop');
        $name_shopowner = $this->input->post('name_shopowner');
        $email_shopowner = $this->input->post('email_shopowner');
        $phone_shopowner = $this->input->post('phone_shopowner');
        $bookbank = $this->input->post('bookbank');
        $pass = $this->input->post('pass');

        // if (empty($name_shop)) {
        //     $http_status = 400;
        //     $response = array('message' => 'ระบุ ชื่อร้าน');
        // } else if (empty($name_shopowner)) {
        //     $http_status = 400;
        //     $response = array('message' => 'ระบุ ชื่อเจ้าของร้าน');
        // } else if (empty($email_shopowner)) {
        //     $http_status = 400;
        //     $response = array('message' => 'ระบุ อีเมล์');
        // } else if (empty($phone_shopowner)) {
        //     $http_status = 400;
        //     $response = array('message' => 'ระบุ เบอร์โทรศัพท์');
        // } else if (empty($bookbank)) {
        //     $http_status = 400;
        //     $response = array('message' => 'ระบุ เลขบัญชี');
        // } else if (empty($pass)) {
        //     $http_status = 400;
        //     $response = array('message' => 'ระบุ รหัสผ่าน');
        // } else {
        //     $this->load->model('register_shop');
        //     $member = $this->register_shop->read_member($name_shop,$name_shopowner,$email_shopowner,$phone_shopowner,$bookbank,$pass);
            
  
        //     if (!empty($member)) {
        //         $http_status = 200;
        //         $response = array('message' => 'successfully');
                
        //         $this->load->library('session');
        //         $this->session->set_userdata('email_shopowner', $member[0]->email_shopowner);
                
        //         redirect('loginshop');
                
        //     } else {
        //        // $http_status = 400;
        //        // $response = array('message' => 'email or password ไม่ถูกต้อง');
        //        ?>
        //        <script type="text/javascript">
        //        alert("ข้อมูลซ้ำ");
        //        location.href="index";
        //        </script>
        //        <?php
        //     }
        // }
        // $this->output
        //         ->set_status_header($http_status)
        //         ->set_content_type('application/json', 'utf-8')
        //         ->set_output(json_encode($response))
        //         ->_display();
        // ;

        $savedata = array(
            'user_id' => $user_id,
            'name_shop' => $name_shop,
            'add_shop' => $add_shop,
            'name_shopowner' => $name_shopowner,
            'email_shopowner' => $email_shopowner,
            'phone_shopowner' => $phone_shopowner,
            'bookbank' => $bookbank,
            'pass' => $pass
        );

        

// //        echo '<pre>';
    //    print_r($savedata);
    //    exit();
//        echo '</pre>';
        $result = $this->register_shop->create_regis_shop($savedata);
        redirect('loginshop');
    }

    public function check() {
        
        $name_shop = $this->input->post('name_shop');
        $name_shopowner = $this->input->post('name_shopowner');
        $email_shopowner = $this->input->post('email_shopowner');
        $phone_shopowner = $this->input->post('phone_shopowner');
        $bookbank = $this->input->post('bookbank');
        $pass = $this->input->post('pass');
        
        
    }
     
}