<?php

class Parser_model extends CI_Model{
    
    function logar($email, $senha){
        
        $query = $this->db->query("SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'");
        return $query->row(0);
        
    }
    
    function insertId($tabela, $campos = array()){
        $this->db->insert($tabela, $campos);
        return $this->db->insert_id();
    }
    
    public function CarregaRegistro($tabela) {

        $sql    = " SELECT * FROM $tabela ";
        if($tabela != "links"){
            $sql   .= " WHERE destaque = 1 ";
        }
        
        $query = $this->db->query($sql);
        if($tabela != "links"){
            return $query->row(0);
        } else {
            return $query->result();
        }
    }
 }
