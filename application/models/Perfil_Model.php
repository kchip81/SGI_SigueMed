<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Perfil_Model
 *
 * @author SigueMed
 */
class Perfil_Model extends CI_Model {
    
    public $Perfil_Medico;
    public function __construct() {
        parent::__construct();
        
        $this->Perfil_Medico = 3;
    }
    //put your code here
}
