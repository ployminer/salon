<?php

defined('BASEPATH') OR exit('NO direct script acces allowed');

class Login_shopmodel extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function read_member_by_email_and_pass($email_shopowner,$pass)
    {
        $where = array(
            'email_shopowner' => $email_shopowner,
            'pass' => $pass
        );
        $this->db->select('id_shop,email_shopowner,name_shop')->from('register_shop')->where($where);
        $qurey = $this->db->get();
        return $qurey->result();
    }
}

  