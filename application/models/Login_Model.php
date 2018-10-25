<?php

Class Login_Model extends CI_Model {

    
     public function __construct()
    {
         
            $this->load->database();
    }

// Read data using username and password
public function login($data) {

    $condition = "usuario =" . "'" . $data['usuario'] . "' AND " . "contrasena =" . "'" . $data['contrasena'] . "'";
    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
    return true;
    } else {
    return false;
    }
}

// Read data from database to show data in admin page
public function read_user_information($username) {

    $condition = "usuario =" . "'" . $username . "'";
    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
    return $query->row_array();
    } else {
    return false;
    }
}

}

?>