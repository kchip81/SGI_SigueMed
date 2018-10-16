<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NotaRemision
 *
 * @author SigueMed
 */
class NotaRemision extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('NotaRemision_Model');
        $this->load->helper('url_helper');
    }
    //put your code here
}
