<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CitaServicio
 *
 * @author SigueMed
 */
class CitaServicio_Model extends CI_Model 
{
    private $table;
    private $strSelectALL;
    
    public function __construct() {
        parent::__construct();
        $this->table = "CitaServicio";
        $this->strSelectALL = $this->table.'.IdCitaServicio, '.$this->table.'.IdPaciente,'.$this->table.'.IdServicio,DiaCita,HoraCita,MesCita,AnioCita,'.$this->table.'.IdStatusCita';
        $this->load->database();
        
    }
    
    public function ConsultarCitasPorDia($Fecha, $IdStatus=FALSE)
    {
        $this->load->helper("date");
        
        $dia = mdate('%d',$Fecha);
        $mes = mdate('%m',$Fecha);
        $anio = mdate('%Y',$Fecha);
        
        
        
        $this->db->select($this->strSelectALL.', DescripcionServicio, Nombre, Apellidos, DescripcionEstatusCita');
        $this->db->from($this->table.',Servicio,Paciente, CatalogoEstatusCita');
        // JOIN
        $this->db->where($this->table.'.IdServicio = Servicio.IdServicio');
        $this->db->where($this->table.'.IdPaciente = Paciente.IdPaciente');
        $this->db->where($this->table.'.IdStatusCita = CatalogoEstatusCita.IdStatusCita');
        //CONDICION
        $this->db->where('DiaCita', $dia);
        $this->db->where('MesCita', $mes);
        $this->db->where('AnioCita', $anio);
        
        if($IdStatus!=FALSE)
        {
            $this->db->where('IdStatusCita', $IdStatus);
        }
        
        $this->db->order_by('HoraCita', 'ASC');
      
        
        $query = $this->db->get();
        
        return $query->result_array();
        
    }
    
    public function ConsultarCitasPorDiaPorServicio($Fecha,$IdServicio,$IdStatus=FALSE)
    {
        $this->load->helper("date");
        
        $dia = mdate('%d',$Fecha);
        $mes = mdate('%m',$Fecha);
        $anio = mdate('%Y',$Fecha);
        
        
        
        $this->db->select($this->strSelectALL.',DescripcionServicio');

        $this->db->from($this->table.',Servicio,Paciente');
        // JOIN
        $this->db->where($this->table.'.IdServicio = Servicio.IdServicio');
        $this->db->where($this->table.'.IdPaciente = Paciente.IdPaciente');
        $this->db->where('DiaCita', $dia);
        $this->db->where('MesCita', $mes);
        $this->db->where('AnioCita', $anio);
        $this->db->where('IdServicio', $IdServicio);
        if ($IdStatus != FALSE )
        {
            $this->db->where('IdStatusCita', $IdStatus);
        }
        
        
        $query = $this->db->get();
        
        return $query->result_array();
    }
    
    public function ConsultarCitaPorId($IdCita)
    {
         
        $this->db->select($this->strSelectALL.',DescripcionServicio');
        $this->db->from($this->table.',Servicio');
        //JOIN
        $this->db->where($this->table.'.IdServicio = Servicio.IdServicio');
        //CONDICION
        $this->db->where('IdCitaServicio', $IdCita);
       
        $query = $this->db->get();
        
        return $query->row();
        
    }
    
    public function ConfirmarCita($IdCita)
    {
        $data = array('IdStatusCita' => 2);
        $this->db->where('IdCitaServicio', $IdCita);
       
        return $this->db->update($this->table,$data);
               
    }
    
    public function CancelarCita($IdCita)
    {
        $data = array('IdStatusCita'=>3);
        
        $this->db->where('IdCitaServicio', $IdCita);
       
        return $this->db->update($this->table,$data);
        
    }

    
//put your code here
}
