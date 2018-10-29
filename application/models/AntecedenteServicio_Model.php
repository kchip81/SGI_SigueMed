<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AntecedenteServicio_Model
 *
 * @author SigueMed
 */
class AntecedenteServicio_Model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table = "CatalogoAntecedentes";
        $this->load->database();
    }
    
    public function ConsultarAntecedentesPorServicio($IdServicio)
    {
        $condition = "IdServicio =".$IdServicio;
        $this->db->select($this->table.'.*');
        $this->db->from($this->table);
        $this->db->where($condition);
        
        $query = $this->db->get();

        if ($query->num_rows() >= 1) 
        {
            return $query->result_array();
        } 
        else 
        {
            return false;
        }
    }
    //put your code here
}
