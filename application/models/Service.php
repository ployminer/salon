<?php

defined('BASEPATH') OR exit('NO direct script acces allowed');

class Service extends CI_Model{

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function read_service()
    {
        $this->db->select('servicename,priceservice,time')->from('servicetype');
        $query = $this->db->get();
        return $query->result();
    }
}
  