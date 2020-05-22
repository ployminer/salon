<?php

defined('BASEPATH') OR exit('NO direct script acces allowed');

class Data_hair extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function read_register_cus(){
        $this->db->select('name_employee,id_skill')->from('hairdressertype');
        $query = $this->db->get();
        return $query->result();
    }
}
  