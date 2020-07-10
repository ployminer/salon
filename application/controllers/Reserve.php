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

    public function create_booking() {
        $shop = $this->input->post('shop');
        $user_id = $this->input->post('userid');
        $data1 = $this->service->read_name($user_id);
        $resultObj = $this->ToObject($data1);
        foreach ($resultObj as $name) {
            $name_cus = $name->name_cus;
        }
        $service = $this->input->post('service');
        $data = $this->service->read_service($service);
        $resultObj = $this->ToObject($data);
        foreach ($resultObj as $option) {
            $nameoption = $option->servicename;
            $price = $option->priceservice;
        }
        $technician = $this->input->post('hair');
        $date = $this->input->post('date');
        $time = $this->input->post('time');
        $savedata = array(
            'user_id' => $user_id,
            'name_cus' => $name_cus,
            'email_shopowner' => $shop,
            'technician' => $technician,
            'servicename' => $nameoption,
            'price' => $price,
            'date' => $date,
            'time' => $time
         
        );
        $result = $this->service->booking($savedata);
        redirect('booking');
    }

    public function price()
    {
        $id_service = $this->input->post('id_service', TRUE);
        $data = $this->service->read_price($id_service);
        echo json_encode($data);
    }
    public function time()
    {
        $email_shopowner = $this->input->post('email_shopowner', TRUE);
        $time = $this->service->time($email_shopowner);
        $resultObj = $this->ToObject($time);
        foreach ($resultObj as $option) {
            $open = $option->t_open;
            $close = $option->t_close;
        }
        $data = $this->service->read_time($open,$close);
        echo json_encode($data);
    }
    
}