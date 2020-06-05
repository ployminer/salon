<?php
defined('BASEPATH') OR exit('NO direct script acces allowed');

class Dataservice extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('dataservicemodel');
        // $this->load->model('register_shop');
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
        $data['read_shop'] = $this->dataservicemodel->read_register_shop($email_shopowner);
        $data['read'] = $this->dataservicemodel->read_dataservice($email_shopowner);
        $this->load->view('dataservice',$data); 
    }
    // public function read_servicetype(){
    //     $this->db->select('id_service,servicename,priceservice,time')->from('servicetype');
    //     $query = $this->db->get();
    //     return $query->result();
    // }

    public function read($id_shop){

        $data['con'] = $this->dataservicemodel->read_idshop($id_shop);
        $name_shop = $this->input->post('name_shop');

        if (!empty($name_shop)) {
            $name_shop = $this->input->post('name_shop');

            $savedata = array(
                'id_shop' => $id_shop,
                'name_shop' => $name_shop,
            );
            $result = $this->dataservicemodel->read_idshop($savedata);
    }
}

    public function create() {
        $data['title'] = 'เพิ่ม....';
        $data['method'] = 'Create';
        $method = $this->input->post('method');
        $data['con']= new stdClass();
        $data['con']->id_service = '';
        $data['con']->servicename = '';
        $data['con']->priceservice = '';
        $data['con']->time = '';
        $email_shopowner = $this->session->userdata('email_shopowner');


        $servicename = $this->input->post('servicename');

        if (!empty($servicename)) {
            $priceservice = $this->input->post('priceservice');
            $time = $this->input->post('time');

        $savedata = array(
            
            'servicename' => $servicename,
            'priceservice' => $priceservice,
            'time' => $time,
            'delete' => 1 ,
            'email_shopowner' => $email_shopowner
        );
            $result = $this->dataservicemodel->create_add($savedata);
        redirect('dataservice');
       
    }
    $this->load->view('dataservice',$data);
}

    public function update($id_service){

        $data['title'] = 'แก้ไขข้อมูล';
        $data['con'] = $this->dataservicemodel->read_id($id_service);
        $email_shopowner = $this->session->userdata('email_shopowner');
        $servicename = $this->input->post('servicename');

        if (!empty($servicename)) {
            $servicename = $this->input->post('servicename');
            $priceservice = $this->input->post('priceservice');
            $time = $this->input->post('time');
            

            $savedata = array(
                'id_service' => $id_service,
                'servicename' => $servicename,
                'priceservice' => $priceservice,
                'time' => $time,
                'email_shopowner' => $email_shopowner


            );

            $result = $this->dataservicemodel->update_service($savedata);
            redirect('dataservice');

            // $data['con'] = $this->dataservicemodel->read_id($id_service);
          
        }
        $this->load->view('update', $data);
        
    }


    public function delete($id_service) {
            
        if (!empty($id_service)) {

            $result = $this->dataservicemodel->delete_service($id_service);
        }

        $response = array('Delete SUCESS');
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response))
                ->_display();
                    redirect('dataservice');
        exit;
    }
}