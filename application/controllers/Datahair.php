<?php
defined('BASEPATH') OR exit('NO direct script acces allowed');

class Datahair extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('datahairmodel');
        $this->load->model('register_shop');
        $this->load->library('session');
        $this->load->library('form_validation');
        $email_shopowner = $this->session->userdata('email_shopowner');
        if(empty($email_shopowner)){
             redirect('loginshop');
        }
       
    }
    public function index(){
        $email_shopowner = $this->session->userdata('email_shopowner');
        $data['read_shop'] = $this->datahairmodel->read_register_shop($email_shopowner);
        $email_shopowner = $this->session->userdata('email_shopowner');
        $data['select'] = $this->datahairmodel->select_service($email_shopowner);
        $data['read'] = $this->datahairmodel->read_datahair($email_shopowner);
        $this->load->view('datahair',$data); 
        
    }
    
    
     
    public function create() {
        // $data['title'] = 'เพิ่ม....';
        $data['method'] = 'Create';
        $method = $this->input->post('method');
        $data['con']= new stdClass();
        $data['con']->id_skill = '';
        $data['con']->name_employee = '';
        $data['con']->servicename = '';
        $email_shopowner = $this->session->userdata('email_shopowner');

        $name_employee = $this->input->post('name_employee');
        $servicename = $this->input->post('select');
      

        $savedata = array(
            'name_employee' => $name_employee,
            'servicename' => $servicename,
            'delete' => 1 ,
            'email_shopowner' => $email_shopowner,
        );
        $result = $this->datahairmodel->create_add($savedata);
        redirect('datahair');
       
    
    $this->load->view('datahair',$data);
}

    
public function update($id_skill){

    $data['title'] = 'แก้ไขข้อมูล';
    $data['con'] = $this->datahairmodel->read_id($id_skill);
    $name_employee = $this->input->post('name_employee');
    $email_shopowner = $this->session->userdata('email_shopowner');


    if (!empty($name_employee)) {
        $name_employee = $this->input->post('name_employee');
        $servicename = $this->input->post('servicename');
       

        $savedata = array(
            'id_skill' => $id_skill,
            'name_employee' => $name_employee,
            'servicename' => $servicename,
            'email_shopowner' => $email_shopowner,

        );

        $result = $this->datahairmodel->update_skill($savedata);
        redirect('datahair');

        $data['con'] = $this->datahairmodel->read_id($id_skill);
      
    }
    $this->load->view('update2', $data);
    
}


        // public function update($id_service){

        //     $data['title'] = 'แก้ไขข้อมูล';
        //     $data['metod'] = 'Update';
        //  //   $data['headers'] = $this->load->view('');
        //  //   $data['menu'] = $this->load->view('');

        //     $data['con'] = $this->dataservicemodel->read_dataservice($id_service);
        //     $method = $this->input->post('method');

          

        //     if (!empty($method)) {
        //                 $servicename = $this->input->post('servicename');
        //                 $priceservice = $this->input->post('priceservice');
        //                 $time = $this->input->post('time');
            
        //                 $savedata = array(
        //                     'id_service' => $id_service,
        //                     'servicename' => $servicename,
        //                     'priceservice' => $priceservice,
        //                     'time' => $time
            
        //                 );

        //                 $result = $this->dataservicemodel->update_service($savedata);
        //                         redirect('dataservice');
                    
        //                         $data['con'] = $this->dataservicemodel->read_dataservice($id_service);
        //                     }
        //                     $this->load->view('dataservice', $data);
        // }

    public function delete($id_skill) {
            
        if (!empty($id_skill)) {

            $result = $this->datahairmodel->delete_hair($id_skill);
        }

        $response = array('Delete SUCESS');
        $this->output
                ->set_status_header(200)
                ->set_content_type('application/json', 'utf-8')
                ->set_output(json_encode($response))
                ->_display();
                    redirect('datahair');
        exit;
    }
}