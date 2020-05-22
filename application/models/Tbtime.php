<?php

defined('BASEPATH') OR exit('NO direct script acces allowed');

class Tbtime extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function read_register_cus()
    {
        $this->db->select('id_skill,name_skill,name_employee')->from('skilltype');
        $query = $this->db->get();
        return $query->result();
    }
}
  