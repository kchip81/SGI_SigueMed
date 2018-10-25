<?php
class SeguimientoMedico_Model extends CI_Model{
    private $table;
    private $SecuenciaSeguimiento;
    private $FechaSeguimiento;
    private $EstadoSeguimiento;
    private $ObservacionesSeguimiento;
    private $IdNotaMedica;
    private $IdRespuestaSeguimiento;
    
    public function __construct() {
        parent::__construct();
        $this->table = "seguimientomedico";
        $this->load->database();

    }
    
    private function LoadRow($row){
        $this->SecuenciaSeguimiento = $row->SecuenciaSeguimiento;
        $this->FechaSeguimiento = $row->FechaSeguimiento;
        $this->EstadoSeguimiento = $row->EstadoSeguimiento;
        $this->ObservacionesSeguimiento = $row->ObservacionesSeguimiento;
        $this->IdNotaMedica = $row->IdNotaMedica;
        $this->IdRespuestaSeguimiento = $row->IdRespuestaSeguimeinto;
    }
    public function ConsultarSeguimientobyid($IdNotaMedica) {
        $condition = "IdNotaMedica =" . $IdNotaMedica;
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1){
            $row = $query->row();
            $this->LoadRow($row);
            return $query->row_array();
        }else{
            return false;
        }
        
    }
}
