<?php

defined('BASEPATH') OR exit('NO direct script acces allowed');

class Register_shop extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create_regis_shop($savedata) {
        $data = array(
        
            'name_shop' => $savedata['name_shop'],
            'add_shop' => $savedata['add_shop'],
            'name_shopowner' => $savedata['name_shopowner'],
            'email_shopowner' => $savedata['email_shopowner'],
            'phone_shopowner' => $savedata['phone_shopowner'],
            'bookbank' => $savedata['bookbank'],
            'user_id' => $savedata['user_id']

        );

        $this->db->insert('register_shop', $data);
        return $this->db->insert_id();
    }

  
}
