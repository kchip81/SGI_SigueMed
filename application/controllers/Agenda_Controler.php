<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    
/**
 * Description of Agenda_Controler
 *
 * @author SigueMed
 */
class Agenda_Controler extends CI_Controller 
{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('CitaServicio_Model');
        $this->load->model('Paciente_Model');
        $this->load->helper('date');
        
        
    }
    
    /*
     * Función que devuelve todas las citas con estatus de Agendadas
     */
    public function CitasDeHoy()
    {
        $Fecha = now();
        
        $data['Citas'] = $this->CitaServicio_Model->ConsultarCitasPorDia($Fecha);
        
        if (empty($data['Citas']))
        {
            $data['errorMessage'] ='No existen citas para: '.mdate('%d',$Fecha).'/'.mdate('%M', $Fecha);
            $this->load->view('Agenda/Agenda',$data);
        }
        else
        {

            //$this->load->view('templates/header');
            $this->load->view('Agenda/Agenda',$data);
        }
        
       
        
    }
    
    /*
     * Función para consultar todas las citas YA confirmadas de un servicio especifico
     */
    public function CitasConfirmadasPorServicio($IdServicio)
    {
         $Fecha = now();
        
        $data['Citas'] = $this->CitaServicio_Model->ConsultarCitasPorDiaPorServicio($Fecha,$IdServicio,1);
        
        if (empty($data['Citas']))
        {
            $data['errorMessage'] ='No existen citas para: '.mdate('%d',$Fecha).'/'.mdate('%M', $Fecha);
            $this->load->view('Agenda/Agenda',$data);
        }
        else
        {

            $this->load->view('Agenda/Agenda',$data);
        }
        
        
    }
    
    
    /*
     * Funcion que Carga Vista para confirmar cita 
     */
    public function ConfirmarCita($IdCita)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('Nombre', 'nombre', 'required');
        $this->form_validation->set_rules('Apellidos', 'apellidos', 'required');
        $this->form_validation->set_rules('FechaNacimiento', 'Fecha de Nacimiento', 'required');
        

        if ($this->form_validation->run() === FALSE)
        {
            $Cita = $this->CitaServicio_Model->ConsultarCitaPorId($IdCita);
            if (isset($Cita))
            {
                $Paciente = $this->Paciente_Model->ConsultarPacientePorId($Cita->IdPaciente);

                if(isset($Paciente))
                {
                    $data['Paciente'] = $Paciente;
                    $data['Cita']= $Cita;
                    $this->load->view('Agenda/ConfirmarCita',$data);
                }
            }
            else
            {
                //TODO: Manejo de error cuando el paciente de la cita no existe
            }
 
    
        }
        else
        { 
            $action = $this->input->post('action');
            
            if ($action =='confirmar')
            {
                
                //Actualizar Paciente
                $Cita = $this->CitaServicio_Model->ConsultarCitaPorId($IdCita);
                if (isset($Cita))
                {
                    $Paciente = $this->Paciente_Model->ConsultarPacientePorId($Cita->IdPaciente);
                
                    $PacienteUpdt = array(
                        'Nombre'=>$this->input->post('Nombre'),
                        'Apellidos' => $this->input->post('Apellidos'),
                        'FechaNacimiento' => $this->input->post('FechaNacimiento'),
                        'Calle' => $this->input->post('Calle'),
                        'Colonia' => $this->input->post('Colonia'),
                        'CP' => $this->input->post('CP'),
                        'ViveCon' => $this->input->post('ViveCon'),
                        'Escolaridad' => $this->input->post('Escolaridad'),
                        'NumCelular' => $this->input->post('Celular')
                        );
                
                    $this->Paciente_Model->ActualizarPaciente($Paciente->IdPaciente, $PacienteUpdt);
                }
                
                //Confirmar Cita
                $this->CitaServicio_Model->ConfirmarCita($IdCita);
            }
            if($action=='cancelar')
            {
                //CancelarCita
                $this->CitaServicio_Model->CancelarCita($IdCita);
                
            }
            $this->CitasDeHoy();
           
        }
        
    }
}
