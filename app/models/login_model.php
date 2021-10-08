<?php

class Login_model extends CI_Model {    
    
    
    function get_usuario($usuario, $senha){
        
        $this->db->where('usuario', $usuario);
        $this->db->where('senha', $senha);
        $query = $this->db->get('cad_login');
        return $query->row(0);
    }
    
    function CarregaDadosOnline(){
        $sql = "
            SELECT * FROM cad_login C
                WHERE C.id_login = ".$this->session->userdata('id');
        $query = $this->db->query("$sql");
        return $query->row(0);
    }
    
}
