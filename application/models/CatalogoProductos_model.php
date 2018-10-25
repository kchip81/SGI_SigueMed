<?php
class CatalogoProductos_model extends CI_Model{
    private $table;
    private $IdProducto;
    private $CostoProducto;
    private $DescripcionProducto;
    
     public function __construct() {
        parent::__construct();
        $this->table = "catalogoproductos";
        $this->load->database();

    }
    
    private function LoadRow($row){
        $this->IdPaciente = $row->IdPaciente;
        $this->CostoProducto = $row->CostoProducto;
        $this->DescripcionProducto = $row->DescripcionProducto;
    }
    public function ConsultarCatalogoporproducto($IdProducto){
        $condition = "IdProducto =" . $IdProducto;
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
