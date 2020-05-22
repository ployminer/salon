<?php

defined('BASEPATH') OR exit('NO direct script acces allowed');

class Data_cus extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function read_register_cus()
    {
        $this->db->select('id_customer,name_cus,email,phone')->from('register_cus');
        $query = $this->db->get();
        return $query->result();
    }
}
  