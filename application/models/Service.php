<?php

defined('BASEPATH') OR exit('NO direct script acces allowed');

class Service extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function booking(){
        $data = array(
            
            'user_id' => $savedata['user_id'],
            'name_cus' => $savedata['name_cus'],
            'email' => $savedata['email'],
            'servicename' => $savedata['servicename'],
            'technician' => $savedata['technician'],
            'date' => $savedata['date'],
            'time' => $savedata['time']
        );

        $this->db->insert('reservations', $data);
        return $this->db->insert_id();
    }

    public function read_name($userid){
        $where = array(
            'userid' => $userid,
        );
        $this->db->select('name_cus')->from('register_cus')->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function read_service($service){
        $where = array(
            'id_skill' => $service,
        );
        $this->db->select('servicename,priceservice')->from('servicetype')->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    public function hairdresser($id_service){
        $where = array(
            'id_servicename' => $id_service
        );
        $this->db->select('*')->from('skilltype')->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function selectservice($email_shopowner){

        $where = array(
            'email_shopowner' => $email_shopowner
        );

        $this->db->select('*')->from('servicetype')->where($where);
        $query = $this->db->get();
        // print_r($query ->result());
        // exit;
        return $query->result();
    }
    public function read_shop(){
        $this->db->select('name_shop,email_shopowner')->from('register_shop');
        $query = $this->db->get();
        return $query->result();
    }

    public function read_price($id_service){
        $where = array(
            'id_service' => $id_service
        );
        $this->db->select('*')->from('servicetype')->where($where);
        $query = $this->db->get();
        return $query->result();
    }
    public function read_time($open,$close){
        $sql = " date WHERE time BETWEEN '$open' and '$close' ";
        $query = $this->db->get($sql);
        return $query->result();
    }
    public function time($email_shopowner){
        $where = array(
            'email_shopowner' => $email_shopowner
        );
        $this->db->select('t_open,t_close')->from('register_shop')->where($where);
        $query = $this->db->get();
        return $query->result();
    }
}
  