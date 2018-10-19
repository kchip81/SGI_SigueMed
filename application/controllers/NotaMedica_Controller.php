<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NotaMedica_Controller
 *
 * @author SigueMed
 */
class NotaMedica_Controller extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        //Cargar herramientas para form
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url_helper');
        
        //Cargar Modelos usados por el Controlador para el manejo de las Notas Medicas
        $this->load->model('NotaMedica_Model');
        $this->load->model('Paciente_Model');
        
    }
    
    /*
     * Function: NuevaNotaMedica
     * Description: La función recibirá el Id del Paciente y del servicio para mostrar el formato NotaMedica.php para la creación de una nueva nota
     */
    public function NuevaNotaMedica($IdPaciente,$IdServicio)
    {
        
        //$this->load->view('templates/header');
        //Cargar Información Ultima Nota del Paciente por Servicio
        $result = $this->NotaMedica_Model->ConsultarUltimaNotaMedicaPorPaciente($IdPaciente,$IdServicio);
        //Cargar Información del Paciente
        
        $this->CargarInformacionPaciente($IdPaciente);
        
        
    }    
    
        private function CargarInformacionPaciente($IdPaciente)
    {
        $paciente = $this->Paciente_Model->ConsultarPaciente($IdPaciente);
            
        // Asignar validaciones para el registro de un nuevo usuario
        $this->form_validation->set_rules('NombrePaciente', 'NombrePaciente', 'required');
        
        if ($this->form_validation->run() == FALSE) 
        {
                $data['paciente'] = $paciente;
                $data['title'] = 'Datos Paciente';
               // $this->load->view('templates/header',$data);
                $this->load->view('NotaMedica/SeccionPaciente',$data);
        }
        else 
        {
            
        }
    }
        
}
    
