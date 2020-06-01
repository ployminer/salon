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
    public function read_datahair()
    {
        $where = array(
            'delete' => 1
        );
        $this->db->select('id_skill,name_employee,name_skill')->from('skilltype')->where($where);
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
            'name_skill' => $savedata['name_skill'],
            'delete' => $savedata['delete'],
        );
        
        
        $this->db->insert('skilltype', $data);
        return $this->db->insert_id();

        $data = array(
            'id_service'=>$savedata['id_service'],
            'servicename'=>$savedata['servicename'],
        );

        $this->db->insert('servicetype',$data);
        return $this->db->insert_id();
      
    }

    public function update_skill($savedata)
    {
       
        $data = array(
            'id_skill' => $savedata['id_skill'],
            'name_employee' => $savedata['name_employee'],
            'name_skill' => $savedata['name_skill'],
            

        );

        $this->db->where('id_skill', $savedata['id_skill']);
        $this->db->update('skilltype', $data);
        
    }

    public function select_service(){
        // $where = array(
        //     'email_shopowner' => $email_shopowner
        // );

        $this->db->select('servicename')->from('servicetype');
        $query = $this->db->get();
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
  