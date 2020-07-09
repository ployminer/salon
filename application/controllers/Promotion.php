<?php
defined('BASEPATH') OR exit('NO direct script acces allowed');

class Promotion extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('promotion_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $email_shopowner = $this->session->userdata('email_shopowner');
        if(empty($email_shopowner)){
             redirect('loginshop');
        }
       
    }
    public function index(){
        $email_shopowner = $this->session->userdata('email_shopowner');
        // print_r($email_shopowner);
        // exit;
        $data['read_shop'] = $this->promotion_model->read_register_shop($email_shopowner);
        $data['read'] = $this->promotion_model->read_promotion($email_shopowner);
        $this->load->view('promotion',$data); 
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

    public function create() {
        $data['title'] = 'เพิ่ม....';
        $data['method'] = 'Create';
        $method = $this->input->post('method');
        $data['con']= new stdClass();
        $data['con']->id_promotion = '';
        $data['con']->promotion = '';
        $email_shopowner = $this->session->userdata('email_shopowner');
        $name = $this->promotion_model->name($email_shopowner);
        $resultObj = $this->ToObject($name);
        foreach ($resultObj as $name) {
            $name = $name->name_shop;
        }
        $name1 = $this->promotion_model->name($email_shopowner);
        $resultObj1 = $this->ToObject($name1);
        foreach ($resultObj1 as $tel) {
            $phone_shopowner = $tel->phone_shopowner;
        }
        
        $promotion = $this->input->post('promotion');

        $savedata = array(
            'name_shop' => $name,
            'phone_shopowner' => $phone_shopowner,
            'promotion' => $promotion,
            'email_shopowner' => $email_shopowner
        );
        $result = $this->promotion_model->create_promotion($savedata);
        redirect('promotion');
       
    
    $this->load->view('promotion',$data);
}

    public function update_promotion($id_promotion){

        $data['title'] = 'แก้ไขข้อมูล';
        $data['con'] = $this->promotion_model->read_id($id_promotion);
        $email_shopowner = $this->session->userdata('email_shopowner');
        $name = $this->promotion_model->name($email_shopowner);
        $resultObj = $this->ToObject($name);
        foreach ($resultObj as $name) {
            $name = $name->name_shop;
        }
        $name1 = $this->promotion_model->name($email_shopowner);
        $resultObj1 = $this->ToObject($name1);
        foreach ($resultObj1 as $tel) {
            $phone_shopowner = $tel->phone_shopowner;
        }

        $promotion = $this->input->post('promotion');

        if (!empty($promotion)) {
            $promotion = $this->input->post('promotion');
    

            $savedata = array(
            'id_promotion' => $id_promotion,
            'name_shop' => $name,
            'phone_shopowner' => $phone_shopowner,
            'promotion' => $promotion,
            'email_shopowner' => $email_shopowner


            );

            $result = $this->promotion_model->update_promotion($savedata);
            redirect('promotion');

            // $data['con'] = $this->dataservicemodel->read_id($id_service);
          
        }
        $this->load->view('update_promotion', $data);
        
    }


    public function delete($id_promotion) {
            
        if (!empty($id_promotion)) {

            $result = $this->promotion_model->delete_promotion($id_promotion);
        }

        $response = array('Delete SUCESS');
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response))
                ->_display();
                    redirect('promotion');
        exit;
    }
}