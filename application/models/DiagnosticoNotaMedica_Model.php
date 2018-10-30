<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DiagnosticoNotaMedica_Model
 *
 * @author SnakcSalas
 */
class DiagnosticoNotaMedica_Model extends CI_Model {
    
    //Atributos DiagnosticoNotaMedica
    private $table;
    public $IdNotaMedica;
    public $IdDiagnostico;
    public $ObservacionesDiagnostico;
            
    /*
     * 
     */
    public function __construct() {
        parent::__construct();
        $this->table = "DiagnosticoNotaMedica";
        $this->load->database();

    }
    
    //Función Consultar Diagnostico Por ID
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
