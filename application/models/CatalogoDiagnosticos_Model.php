<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CatalogoDiagnosticos_Model
 *
 * @author SnakcSalas
 */
class CatalogoDiagnosticos_Model extends CI_Model {
    
    //Atributos CatalogoDiagnostico
    private $table;
    public $IdDiagnostico;
    public $DescripcionDiagnostico;
            
    /*
     * 
     */
    public function __construct() {
        parent::__construct();
        $this->table = "CatalogoDiagnosticos";
        $this->load->database();

    }
    
    
    public function ConsultarDiagnosticoPorId($IdDiagnostico)
    {
        $condition = "IdDiagnostico =" . $IdDiagnostico;
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) 
        {
            $row = $query->row();
            $this->LoadRow($row);
            return $query->row_array();
        } 
        else 
        {
            return false;
        }
        
    }
    
}
