<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DisponibilidadServicio_Model
 *
 * @author SigueMed
 */
class DisponibilidadServicio_Model extends CI_Model
{
    private $table;
    
    public function __construct() {
        parent::__construct();
        $this->table = "DisponibilidadServicio";
        $this->load->database();
    }
    
    /*
     * Descripcion: Función que regresera un arreglo con las horas disponibles de acuerdo al día
     * $Fecha-> Dia/mes/año de la consulta para disponibilidad
     */
    public function ConsultarDisponibilidadPorDia($Fecha)
    {
        $this->load->helper("date");
        $dateString = "w";
        $dia = mdate($dateString,$Fecha);
        
        $condition = "DiaDisponible =" . $dia;
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($condition);
       
        $query = $this->db->get();
        
        return $query->result_array();
 
    }
    //put your code here
}
