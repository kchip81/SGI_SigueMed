<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paciente_Controller
 *
 * @author SigueMed
 */
class Paciente_Controller extends CI_Model
{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Paciente_Model');
        
    }
    
    //public function 
    //put your code here
}
