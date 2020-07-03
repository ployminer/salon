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
            'pass' => $savedata['pass'],
            't_open' => $savedata['t_open'],
            't_close' => $savedata['t_close'],
            'user_id' => $savedata['user_id']

        );
        
        $this->db->insert('register_shop', $data);
        return $this->db->insert_id();
    }

    public function read_member($name_shop,$name_shopowner,$email_shopowner,$phone_shopowner,$bookbank,$pass,$t_open,$t_close)
    {
        $where = array(
            'name_shop' => $name_shop,
            'name_shopowner' => $name_shopowner,
            'email_shopowner' => $email_shopowner,
            'phone_shopowner' => $phone_shopowner,
            'bookbank' => $bookbank,
            'pass' => $pass,
            't_open' => $t_open,
            't_close' => $t_close

        );
        $this->db->select('name_shop,name_shopowner,email_shopowner,phone_shopowner,bookbank,pass')->from('register_shop')->where($where);
        $qurey = $this->db->get();
        return $qurey->result();
    }

  
}
