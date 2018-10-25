<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario_Login
 *
 * @author SigueMed
 */
class Usuario_Login extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        
        // Load form helper library
        $this->load->helper('form');

        // Load form validation library
        $this->load->library('form_validation');

        // Load database
        $this->load->model('Login_Model');
        //

    
        
    }
    
    //Cargar la pagina de login con valor default 'index'
    public function index()
    {
        //Carga la pagina .php ubicada en la carpeta view
       $this->load->view('Login/login_form');
    }
    
    public function LoginUsuario()
    {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) 
        {
            if($this->session->has_userdata('logged_in'))
            {
                $this->load->view('main/admin_page');
            }
            else
            {

                $this->load->view('Login/login_form');
                $this->load->view('templates/footer');
                
            }
        } 
        else 
        {

            $data = array(
            'usuario' => $this->input->post('username'),
            'contrasena' => $this->input->post('password')
            );
            
            $result = $this->Login_Model->login($data);
            if ($result == TRUE) 
            {
            

                $username = $this->input->post('username');
                $result = $this->Login_Model->read_user_information($username);
                if ($result != false) 
                {
                
                    $session_data = array(
                    'username' => $result['usuario'],
                    'IdPerfil' => $result['IdPerfilUsuario'],
                    'logged_in' => TRUE,
                    );
                    // Add user data in session
                    
                    $this->session->set_userdata($session_data);
                    redirect('Agenda/CitasHoy');
                    
                    
                }
                else
                {
                    $data = array(
                    'error_message' => 'Error al leer el usuario');
                    
                    $this->load->view('Login/login_form', $data);
                    
                }
            } 
            else 
            {
                $data = array(
                'error_message' => 'Usuario y/o Contraseña Incorrectos'
                );
          
                $this->load->view('Login/login_form', $data);
                $this->load->view('templates/footer');
            }
        }       
    }
    
    // Logout from admin page
    public function logout() 
    {

        // Removing session data
        $sess_array = array(
        'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('Login/login_form', $data);
    }
}