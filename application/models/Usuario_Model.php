<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario_Model
 *
 * @author SigueMed
 */
class Usuario_Model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
            $this->load->database();
    }
    
    public function get_UsuarioByUsrPass($Usr=FALSE, $Pass=FALSE)
    {
        if ($Usr == FALSE)
        {
            return 0;
        }
        
        $query = $this->db->get_where('usuarios', array('usuario' => $Usr, 'contrasena' => $Pass));
        
        
        return $query->row_array();
                
    }
    
    public function get_FuncionesPorPerfil($IdPerfil=FALSE)
    {
        
        $IdPerfil = 1;
        if ($IdPerfil == FALSE)
        {
            return 0;
        }
        
        
        $query = $this->db->get_where('funciones_perfil',array('IdPerfil'=> $IdPerfil));
        
        
        return $query->result_array();          
    }
    
    //put your code here
}
