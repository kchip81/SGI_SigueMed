<?php

Class Login_Model extends CI_Model {

    
     public function __construct()
    {
         
            $this->load->database();
    }
// Insert registration data in database
public function registration_insert($data) {

    // Query to check whether username already exist or not
    $condition = "usuario =" . "'" . $data['user_name'] . "'";
    $this->db->select('*');
    $this->db->from('usuairos');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {

    // Query to insert data in database
    $this->db->insert('usuarios', $data);
    if ($this->db->affected_rows() > 0) {
    return true;
    }
    } else {
    return false;
    }
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
    return $query->result();
    } else {
    return false;
    }
}

}

?>