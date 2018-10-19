<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Session_Controller
 *
 * @author SigueMed
 */
class Session_Controller extends CI_Controller {
    //put your code here
    
    public function __construct() {
        parent::__construct();
        // Load form helper library
        $this->load->helper('form');

        // Load session library
        $this->load->library('session');

    }
    
    public function ValidarSesion()
    {
        if($this->session->has_userdata('IdUsuario'))
        {
            return true;
        }
        else
        {
            redirect("/Usuario_Login/LoginUsuario_Proceso");
        }
        
    }
}
