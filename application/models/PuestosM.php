<?php

    class PuestosM extends CI_Model
    {
        function getPuestos(){
            $query = $this->db->get('puesto');
            return $query->result();
        }

        function getPuesto($id_Puesto){
            $this->db->where('id_Puesto', $id_Puesto);
            $query = $this->db->get('puesto');
            return $query->result();
        }
    }
    
?>