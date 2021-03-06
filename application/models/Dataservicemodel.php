<?php

defined('BASEPATH') OR exit('NO direct script acces allowed');

class Dataservicemodel extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();

    }
    public function read_idshop($id_shop){

        $where = array(
            'id_shop' => $id_shop
        );
        $this->db->select('id_shop,name_shop')->from('register_shop')->where($where);
        $query = $this->db->get();
        return $query->row();
    }

    public function read_dataservice($email_shopowner)
    {
        $where = array(
            'delete' => 1 , 'email_shopowner' => $email_shopowner

        );
        $this->db->select('id_service,servicename,priceservice,time')->from('servicetype')->where($where);
        $query = $this->db->get();

        return $query->result();
    }
    
    public function read_id($id_service)
    {
        $where = array(
            'id_service' => $id_service
        );
        $this->db->select('id_service,servicename,priceservice,time')->from('servicetype')->where($where);
        $query = $this->db->get();

        return $query->row();
    }

    public function read_register_shop($email_shopowner)
    {
        $where = array(
            'email_shopowner' => $email_shopowner
        );
        $this->db->select('name_shop');
        $this->db->from('register_shop');
        $this->db->where($where);
        $query = $this->db->get();
        // print_r($query->result());
        // exit;
        return $query->result();
    }

    
    public function create_add($savedata){


        $data = array(
            'id_service'=> $savedata['id_service'],
            'servicename' => $savedata['servicename'],
            'priceservice' => $savedata['priceservice'],
            'time' => $savedata['time'],
            'delete' => $savedata['delete'],
            'email_shopowner' => $savedata['email_shopowner']
            
        );
        
        $this->db->insert('servicetype', $data);
        return $this->db->insert_id();
      
    }

    public function update_service($savedata)
    {
        
        $data = array(
            'id_service' => $savedata['id_service'],
            'servicename' => $savedata['servicename'],
            'priceservice' => $savedata['priceservice'],
            'time' => $savedata['time'],
            'email_shopowner' => $savedata['email_shopowner']

            
        );
        $this->db->where('id_service', $savedata['id_service']);
        $this->db->update('servicetype', $data);
        

    }

    


    public function delete_service($id_service)
    {
        $this->db->set('delete', 0);
        $this->db->where('id_service', $id_service);
        $this->db->update('servicetype');
        return $this->db->affected_rows();
    }
}

  