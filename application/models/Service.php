<?php

defined('BASEPATH') OR exit('NO direct script acces allowed');

class Service extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function read_shop(){
        $this->db->select('name_shop,email_shopowner')->from('register_shop');
        $query = $this->db->get();
        return $query->result();
    }
    // public function read_shop($email_shopowner){

    //     $where = array(
    //         'email_shopowner' => $email_shopowner
    //     );

    //     $this->db->select('name_shop,email_shopowner')->from('register_shop');
    //     $query = $this->db->get();
    //     print_r($query->result());
    //     exit;
    //     return $query->result();
    // }

}
  