<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AntecedenteNotaMedica_Model
 *
 * @author SigueMed
 */
class AntecedenteNotaMedica_Model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table = "AntecedenteNotaMedica";
        $this->load->model('NotaMedica_Model');
        $this->load->database();
    }
    
    Public function ConsultarAntecedentesNota($IdNotaMedica)
    {

        $this->db->select($this->table.'.*, DescripcionAntecedente');
        $this->db->from($this->table.', CatalogoAntecedentes');
        $this->db->where($this->table.'.IdAntecedente = CatalogoAntecedentes.IdAntecedente');
        $this->db->where('IdNotaMedica', $IdNotaMedica);
        
        $query = $this->db->get();

       // if ($query->num_rows() >= 1) 
        //{
        return $query->result_array();
        //} 
        //else 
        //{
          //  return false;
        //}
    }
    
    public function CrearNuevosAntecedentesPorServicio($IdNotaMedica, $IdServicio)
    {
        
        //Crear Antecedentes
        $AntecedentesServicios = $this->AntecedenteServicio_Model->ConsultarAntecedentesPorServicio($IdServicio);

        foreach ($AntecedentesServicios as $Antecedente)
        {
            $NuevoAntecedente = array(
                'IdNotaMedica'=>$IdNotaMedica,
                'IdAntecedente'=>$Antecedente['IdAntecedente'],
                'DescripcionAntecedenteNotaMedica'=>'-'.$Antecedente['IdAntecedente'].'-'.$Antecedente['IdServicio'] //-----NOTA MEDICA CREADA FECHA:'.mdate('%Y-%m-%d').'-----'
            );
        
         
            $resultado = $this->db->insert($this->table, $NuevoAntecedente);

            if ($resultado == FALSE)
            {
                return false;
            }
 
        }
        
        return true;
    
    }
    
    
    public function CopiarAntecedentesNotaMedica($IdNuevaNotaMedica, $IdUltimaNotaMedica)
    {
        //Consultar Antecedentes Ultima Nota y cargarlos a la nueva nota
            $AntecedentesNotaMedica = $this->AntecedenteNotaMedica_Model->ConsultarAntecedentesNota($IdUltimaNotaMedica);
            
            if($AntecedentesNotaMedica!=FALSE)
            {
                foreach ($AntecedentesNotaMedica as $Antecedente)
                {
                    $NuevoAntecedente = array(
                        'IdNotaMedica'=>$IdNuevaNotaMedica,
                        'IdAntecedente'=>$Antecedente|['IdAntecedente'],
                        'DescripcionAntecedenteNotaMedica'=>'----'.mdate('%Y-%m-%m',now()).'----\n '.$Antecedente['DescripcionAntecedenteNotaMedica']
                    );

                    $resultado = $this->db->insert($this->table, $NuevoAntecedente);

                    if ($resultado == FALSE)
                    {
                        return false;
                    }
                }
                
            }
            else
            {
                $NotaMedica = $this->NotaMedica_Model->ConsultarNotaMedicaPorId($IdNuevaNotaMedica);
                
                $resultado = $this->CrearNuevosAntecedentesPorServicio($IdNuevaNotaMedica, $NotaMedica->IdServicio);
            }
            
            return $resultado;
    }
    //put your code here
}
