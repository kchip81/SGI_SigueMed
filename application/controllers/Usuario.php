<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Controlador de la Entidad Usuario
 * 
 * @author SigueMed
 */
class Usuario extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        $this->load->model('Usuario_Model');
        $this->load->helper('url_helper');
        // Load session library
        $this->load->library('session');
    }
    
    /*
     * Descripcion: Función para validar que el usuario y password existen en la BD de Datos
     * Usuario Valido
     */
    public function login()
    {
     
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Login';

        $this->form_validation->set_rules('usuario', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            
            $this->load->view('templates/header', $data);
            $this->load->view('Usuario/Login');
            $this->load->view('templates/footer');
        }
        else
        {
            $usuario = $this->input->post('usuario');
            $password = $this->input->post('password');
           
            $data['usuario'] = $this->Usuario_Model->get_UsuarioByUsrPass($usuario, $password);
            $data['Usuario_Id'] = $usuario;
    
            if (empty($data['usuario']))
            {
                    $this->load->view('Usuario/UsuarioInvalido', $data);
            }  
            else
            {
                //El usuario con la contraseña SI Existen
                //Abrir tablero principal
          //      $this->load->view('main/TableroPrincipal');
                $this->TableroPrincipal();
            }
            
           
        }
    }
    
    public function TableroPrincipal()
    {
           
        //Obtener las funciones de acuerdo al perfil del usuario
        $data['funciones'] = $this->Usuario_Model->get_FuncionesPorPerfil();
        $data['title'] = 'Tablero Principal';
        
        //Carga la vista ubicada en main
       $this->load->view('templates/header', $data);
       $this->load->view('main/TableroPrincipal', $data);
       $this->load->view('templates/footer');
        
    }
    //put your code here
}
