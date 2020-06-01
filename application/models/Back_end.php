<?php

defined('BASEPATH') OR exit('NO direct script acces allowed');

class Back_end extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function read_register_shop()
    {
        $this->db->select('id_shop,name_shop,')->from('register_shop');
        $query = $this->db->get();
        return $query->result();
    }
}
  
