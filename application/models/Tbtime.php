<?php

defined('BASEPATH') OR exit('NO direct script acces allowed');

class Tbtime extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function read_reserve($email_shopowner){
        $where = array(
            'email_shopowner' => $email_shopowner

        );
        $this->db->select('id_reser,technician,name_cus,date,time,servicename')->from('reservations')->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function read_register_cus()
    {
        $this->db->select('id_skill,,name_employee,email_shopowner,servicename')->from('skilltype');
        $query = $this->db->get();
        return $query->result();
    }
    public function read_register_shop($email_shopowner)
    {
        $where = array(
            'email_shopowner' => $email_shopowner,
        );
        $this->db->select('name_shop');
        $this->db->from('register_shop');
        $this->db->where($where);
        $query = $this->db->get();
        // print_r($query->result());
        // exit;
        return $query->result();
    }
    public function delete_reserve($id_reser)
    {
        $this->db->where('id_reser', $id_reser);
        $this->db->delete('reservations');
        return $this->db->affected_rows();
    }
}
  