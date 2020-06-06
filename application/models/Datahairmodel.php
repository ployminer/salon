<?php

defined('BASEPATH') OR exit('NO direct script acces allowed');

class Datahairmodel extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // public function read_register_cus(){
    //     $this->db->select('name_employee,id_skill')->from('hairdressertype');
    //     $query = $this->db->get();
    //     return $query->result();
    // }
    public function read_datahair($email_shopowner)
    {
        $where = array(
            'delete' => 1 , 'email_shopowner' => $email_shopowner

        );
        $this->db->select('id_skill,name_employee,servicename')->from('skilltype')->where($where);
        $query = $this->db->get();
        return $query->result();
    }

    public function read_id($id_skill)
    {
        $where = array(
            'id_skill' => $id_skill
        );
        $this->db->select('id_skill,name_employee')->from('skilltype')->where($where);
        $query = $this->db->get();
        return $query->row();
    }

    public function create_add($savedata) {

        $data = array(
            'id_skill'=> $savedata['id_skill'],
            'name_employee' => $savedata['name_employee'],
            'servicename' => $savedata['servicename'],
            'delete' => $savedata['delete'],
            'email_shopowner' => $savedata['email_shopowner']

        );
        
        $this->db->insert('skilltype', $data);
        return $this->db->insert_id();
        
    }

    public function update_skill($savedata)
    {
       
        $data = array(
            'id_skill' => $savedata['id_skill'],
            'name_employee' => $savedata['name_employee'],
            'servicename' => $savedata['servicename'],
            'email_shopowner' => $savedata['email_shopowner']

            

        );

        $this->db->where('id_skill', $savedata['id_skill']);
        $this->db->update('skilltype', $data);
        
    }

    public function select_service($email_shopowner){
       
        $where = array(
            'email_shopowner' => $email_shopowner
        );

        $this->db->select('servicename,email_shopowner')->from('servicetype')->where($where);
        $query = $this->db->get();
        // print_r($query->result());
        // exit;
        return $query->result();

    }

    public function update_service($email_shopowner){
       
        $where = array(
            'email_shopowner' => $email_shopowner
        );

        $this->db->select('servicename,email_shopowner')->from('servicetype')->where($where);
        $query = $this->db->get();
        // print_r($query->result());
        // exit;
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

    


    public function delete_hair($id_skill)
    {
        $this->db->set('delete', 0);
        $this->db->where('id_skill', $id_skill);
        $this->db->update('skilltype');
        return $this->db->affected_rows();
    }
}
  