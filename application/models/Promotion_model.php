<?php

defined('BASEPATH') OR exit('NO direct script acces allowed');

class Promotion_model extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();

    }

    public function read_promotion($email_shopowner)
    {
        $where = array(
            'email_shopowner' => $email_shopowner

        );
        $this->db->select('id_promotion,promotion')->from('promotion')->where($where);
        $query = $this->db->get();

        return $query->result();
    }
    
    public function read_id($id_promotion)
    {
        $where = array(
            'id_promotion' => $id_promotion
        );
        $this->db->select('id_promotion,promotion')->from('promotion')->where($where);
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

    
    public function create_promotion($savedata){

        $data = array(
            'name_shop'=> $savedata['name_shop'],
            'promotion' => $savedata['promotion'],
            'phone_shopowner'=> $savedata['phone_shopowner'],
            'email_shopowner' => $savedata['email_shopowner']
            
        );
        
        $this->db->insert('promotion', $data);
        return $this->db->insert_id();
      
    }

    public function update_promotion($savedata)
    {
        
        $data = array(
            'id_promotion'=> $savedata['id_promotion'],
            'name_shop'=> $savedata['name_shop'],
            'promotion' => $savedata['promotion'],
            'phone_shopowner'=> $savedata['phone_shopowner'],
            'email_shopowner' => $savedata['email_shopowner']
        );
        $this->db->where('id_promotion', $savedata['id_promotion']);
        $this->db->update('promotion', $data);
        

    }

    


    public function delete_promotion($id_promotion)
    {
        
        $this->db->where('id_promotion', $id_promotion);
        $this->db->delete('promotion');
        return $this->db->affected_rows();
    }
    public function promotion()
    {
        $this->db->select('*');
        $this->db->from('promotion');
        $query = $this->db->get();
        return $query->result();
    }
    public function name()
    {
        $this->db->select('*');
        $this->db->from('register_shop');
        $query = $this->db->get();
        return $query->result();
    }
}

  