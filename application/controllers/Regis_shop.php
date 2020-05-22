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
    

        $savedata = array(
            'user_id' => $user_id,
            'name_shop' => $name_shop,
            'add_shop' => $add_shop,
            'name_shopowner' => $name_shopowner,
            'email_shopowner' => $email_shopowner,
            'phone_shopowner' => $phone_shopowner,
            'bookbank' => $bookbank
        );

// //        echo '<pre>';
    //    print_r($savedata);
    //    exit();
//        echo '</pre>';
        $result = $this->register_shop->create_regis_shop($savedata);
        redirect('back');
    }
     
}