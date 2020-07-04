<?php
defined('BASEPATH') OR exit('NO direct script acces allowed');

class Reserve extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('service');
        $this->load->library('session');
        $this->load->library('form_validation');
        $email_shopowner = $this->session->userdata('email_shopowner');
        if(empty($email_shopowner)){
            //  redirect('loginshop');
        

    }
}
    public function index(){
        $data['read_shop'] = $this->service->read_shop();
        $this->load->view('reserve',$data);
    }

    public function ToObject($Array)
    {
        $object = new stdClass();
        foreach ($Array as $key => $value) {
            if (is_array($value)) {
                $value = $this->ToObject($value);
            }
            $object->$key = $value;
        }
        return $object;
    }
        

    public function service()
    {
        $email_shopowner = $this->input->post('email_shopowner', TRUE);
        $data = $this->service->selectservice($email_shopowner);
        echo json_encode($data);
    }
    public function hairdresser()
    {
        $id_service = $this->input->post('id_service', TRUE);
        $data = $this->service->hairdresser($id_service);
        echo json_encode($data);
    }

    public function create() {
        $user_id = $this->input->post('user_id');
        $data1 = $this->service->read_name($user_id);
        $resultObj = $this->ToObject($data);

       
        $service = $this->input->post('service');
        $data = $this->service->read_service($service);
        $resultObj = $this->ToObject($data);
        foreach ($resultObj as $option) {
            $nameoption = $option->servicename;
            $price = $option->priceservice;
        }


        $savedata = array(
            'user_id' => $user_id,
            'email' => $email,
            'phone' => $phone,
            'servicenam' => $servicename,
            'date' => $date,
         
        );
//        echo '<pre>';
//        print_r($savedata);
//        echo '</pre>';
        $result = $this->register_cus->create_register($savedata);
        redirect('service');
    }

    public function price()
    {
        $id_service = $this->input->post('id_service', TRUE);
        $data = $this->service->read_price($id_service);
        echo json_encode($data);
    }
    
}