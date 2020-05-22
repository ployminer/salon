<?php

defined('BASEPATH') OR exit('NO direct script acces allowed');

class Register_cus extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create_register($savedata) {
        $data = array(
            
            'user_id' => $savedata['user_id'],
            'name_cus' => $savedata['name_cus'],
            'email' => $savedata['email'],
            'phone' => $savedata['phone'],
        );

        $this->db->insert('register_cus', $data);
        return $this->db->insert_id();
    }

  
}
