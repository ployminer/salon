<?php

defined('BASEPATH') OR exit('NO direct script acces allowed');

class Back_end extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
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
}
  
