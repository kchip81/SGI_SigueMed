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

require_once(dirname(__FILE__)."/Agenda_Controler.php");

class NotaMedica_Controller extends Agenda_Controler {
    
    public function __construct() {
        parent::__construct();
        //Cargar herramientas para form
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->helper('url_helper');
        
        //Cargar Modelos usados por el Controlador para el manejo de las Notas Medicas
        $this->load->model('NotaMedica_Model');
        $this->load->model('Paciente_Model');
        $this->load->model('CitaServicio_Model');
       
        
    }
    
    
    /*
     * Function: RegistrarSomatometria
     * Descripttion:La función mostrara la vista para Registrar los datos de Somatometria del paciente que agendo la Cita <$IdCita> y creará una nueva nota médica
     */
    public function RegistrarSomatometria($IdCita)
    {
        
        
        //Validaciones para los campos de Somatometria

        $this->form_validation->set_rules('Peso', 'Peso', 'required');
        $this->form_validation->set_rules('Talla', 'Talla', 'required');
        $this->form_validation->set_rules('TA', 'T/A', 'required');
        $this->form_validation->set_rules('Temperatura', 'Temperatura', 'required');
        $this->form_validation->set_rules('FC', 'F/C', 'required');
        $this->form_validation->set_rules('FR', 'FR', 'required');
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
                    $this->load->view('NotaMedica/SeccionSomatometria',$data);
                }
            }
            else
            {
                $data['errorMessage'] = "Error al cargar información del paciente";
                $this->load->view('NotaMedica/SeccionSomatometria',$data);
            }
        }
        else
        {
            $this->CrearNuevaNotaMedica($IdCita);
            $this->CitaServicio_Model->RegistrarCita($IdCita);
            
            $this->CitasDeHoy();
        }
    }
    /*
     * Function: NuevaNotaMedica
     * Description: La función recibirá el Id del Paciente y del servicio para mostrar el formato NotaMedica.php para la creación de una nueva nota
     */
    public function CrearNuevaNotaMedica($IdCita)
    {
        
        //$this->load->view('templates/header');
        //Cargar Información Ultima Nota del Paciente por Servicio
        $Cita = $this->CitaServicio_Model->ConsultarCitaPorId($IdCita);
        $IdUltimaNota = $this->NotaMedica_Model->ConsultarUltimaNotaMedicaPorPaciente($Cita->IdPaciente,$Cita->IdServicio);
        
        if(!isset($Cita->IdNotaMedica))
        {
            $DatosSomatometria = array(
            'PesoPaciente'=>$this->input->post('Peso'),
            'TallaPaciente'=> $this->input->post('Talla'),
            'PresionPaciente'=> $this->input->post('TA'),
            'FrCardiacaPaciente'=> $this->input->post('FC'),
            'FrRespiratoriaPaciente'=> $this->input->post('FR'),
            'TemperaturaPaciente'=> $this->input->post('Temperatura')
             );
            
            $NuevaNotaMedica = $this->NotaMedica_Model->CrearNuevaNotaMedica($IdCita,$DatosSomatometria,$IdUltimaNota);
            $this->CitaServicio_Model->AsignarNotaMedica($IdCita, $NuevaNotaMedica);
        }
        
    }    
    
    public function ElaborarNotaMedica($IdNotaMedica)
    {
        
        $this->form_validation->set_rules('FR', 'FR', 'required');
        
        if ($this->form_validation->run() === FALSE)
        {
            //Cargar Datos Paciente
            $NotaMedica = $this->NotaMedica_Model->ConsultarNotaMedicaPorId($IdNotaMedica);
            $data['NotaMedica'] = $NotaMedica;
            $data['Paciente'] = $this->Paciente_Model->ConsultarPacientePorId($NotaMedica->IdPaciente);
            $data['Antecedentes'] = $this->AntecedenteNotaMedica_Model->ConsultarAntecedentesNota($IdNotaMedica);
            
            $this->load->view('NotaMedica/RegistrarNotaMedica', $data); 
        }
        else
        {
            $DatosNotaMedica = array(
                'PesoPaciente'=>$this->input->post('Peso'),
                'TallaPaciente'=> $this->input->post('Talla'),
                'PresionPaciente'=> $this->input->post('TA'),
                'FrCardiacaPaciente'=> $this->input->post('FC'),
                'FrRespiratoriaPaciente'=> $this->input->post('FR'),
                'TemperaturaPaciente'=> $this->input->post('Temperatura')
             );
            
            $Antecedentes = $this->AntecedenteNotaMedica_Model->ConsultarAntecedentesNota($IdNotaMedica);
            foreach($Antecedentes as $Antecedente)
            {
                
            }
        }
           
    }
    
   
}
    
