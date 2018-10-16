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

        // Load session library
        $this->load->library('session');

        // Load database
        $this->load->model('Login_Model');
    
        
    }
    
    //Cargar la pagina de login con valor default 'index'
    public function index()
    {
        //Carga la pagina .php ubicada en la carpeta view
       $this->load->view('Login/login_form');
    }
    
    public function RegistrarUsuario_Cargar()
    {
        //Carga la pagina de la forma de registro de nuevo usuario
        $this->load->view('registroNuevoUsuario_form');
    }
    
    public function RegistrarNuevoUsuario()
    {
        
        // Asignar validaciones para el registro de un nuevo usuario
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) 
        {
                $this->load->view('registration_form');
        }
        else 
        {
               
            $data = array(
            'usuario' => $this->input->post('usuario'),
            'contrasena' => $this->input->post('contrasena')
            );
                
            //llamar el modelo para insertar nuevo usuario
            $result = $this->login_database->registration_insert($data);
            if ($result == TRUE) 
            {

                $data['message_display'] = 'Registration Successfully !';
                $this->load->view('login_form', $data);
                    
            }
                
            else 
            {
                $data['message_display'] = 'Username already exist!';
                $this->load->view('registration_form', $data);
            }
        }
    }

    public function LoginUsuario_Proceso()
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
                    'username' => $result[0]->usuario,
                    'IdPerfil' => $result[0]->IdPerfilUsuario,
                    );
                    // Add user data in session
                    $this->session->set_userdata('logged_in', $session_data);
                    $this->load->view('main/admin_page');
                }
                else
                {
                    $data = array(
                'error_message' => 'Error al leer el usuario'
                );
                $this->load->view('Login/login_form', $data);
                    
                }
            } 
            else 
            {
                $data = array(
                'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('Login/login_form', $data);
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