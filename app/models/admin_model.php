<?php

class Admin_model extends CI_Model {

    public function ListaTabelas($Tabela, $PeloCampo, $OrdenarPor) {
        $sql = "
                  SELECT * FROM $Tabela T
                      ORDER BY T.$PeloCampo $OrdenarPor
            ";

        $query = $this->db->query("$sql");
        return $query->result();
    }

    public function CarregaRegistro($tabela, $id, $tab) {

        $sql = "
                   SELECT * FROM $tabela
                       WHERE $tab = $id
            ";
        $query = $this->db->query($sql);
        return $query->row(0);
    }

    public function CarregaImposto($id) {

        $sql = "
                   SELECT * FROM tab_info_nfe
                       WHERE id_xml = $id
            ";
        $query = $this->db->query($sql);
        return $query->row(0);
    }

    function CarregaTabXml($id_empr, $CNPJ = null) {

        $sql = "
        SELECT * FROM tab_cad_xml TC
            JOIN tab_info_nfe TI ON TC.id_xml = TI.id_xml
            JOIN tab_pessoas_lfs TB ON TI.dest_CNPJ_nfe = TB.CNPJ_pessoas_lf
        WHERE TC.id_empr = $id_empr
        AND TC.lancada_xml = 2";
        
        if($CNPJ)
            $sql .= " AND (TI.emit_CNPJ_nfe = '$CNPJ' OR TI.dest_CNPJ_nfe = '$CNPJ') ";
        
        $sql .= " GROUP BY TC.id_xml ";

   		$query = $this->db->query($sql);
   		return $query->result();
   }
   function CarregaProds() {

     $sql = "
       SELECT * FROM tab_novos_produtos
      ";
     $query = $this->db->query($sql);
     return $query->result();
  }

  function CarregaProdJs($id) {

    $sql = "
      SELECT * FROM tab_novos_produtos
      WHERE tab_novos_produtos.id_nvoProds = $id
     ";
    $query = $this->db->query($sql);
    return $query->row(0);
 }

    public function CarregaInfoEmpLogada ($tabela, $id) {

        $sql = "
                   SELECT * FROM $tabela
                       WHERE id_emp_lf = $id
            ";
        $query = $this->db->query($sql);
        return $query->row(0);
    }

    public function CarregaInfoXml($id) {

        $sql = "
                SELECT * FROM tab_cad_xml CXML
                    JOIN tab_info_nfe ON tab_info_nfe.id_xml = CXML.id_xml
                    WHERE CXML.id_xml = $id
            ";
        $query = $this->db->query($sql);
        return $query->row(0);
    }

    public function ListaProdXml($id) {

        $sql = "
              SELECT * FROM tab_cad_xml CXML
                  JOIN tab_prod_lf ON tab_prod_lf.id_xml = CXML.id_xml
                  WHERE CXML.id_xml = $id
        ";

        $query = $this->db->query($sql);
        return $query->result();
    }

    public function CarregaJava($tabela,$id,$id_nom) {

        $sql = "
                   SELECT * FROM $tabela
                       WHERE $id_nom = $id
            ";
        $query = $this->db->query($sql);
        return $query->row(0);
    }

    public function CarregaPlanModel($tabela, $id) {

        $sql = "
                   SELECT * FROM $tabela
                       WHERE id_plan = $id
            ";
        $query = $this->db->query($sql);
        return $query->row(0);
    }

    public function CarregaRegistroUsuario($tabela, $id) {

        $sql = "
                   SELECT * FROM $tabela
                       WHERE id_login = $id
            ";
        $query = $this->db->query($sql);
        return $query->row(0);
    }

    public function CarregaGrup($tabela, $id) {

        $sql = "
                   SELECT * FROM $tabela
                       WHERE grup_grup = $id
            ";
        $query = $this->db->query($sql);
        return $query->row(0);
    }

    public function CarregaRegistro2($tabela, $where) {

        $this->db->where($where);
        $query = $this->db->get($tabela);
        return $query->row(0);
    }

    public function AtualizaRegistro($id, $tabela, $data) {

        $this->db->where($id);
        return $this->db->update($tabela, $data);
    }

    function insertId($tabela, $campos = array()) {
        $this->db->insert($tabela, $campos);
        return $this->db->insert_id();
    }

    function delete_where($where, $tabela) {
        $this->db->where($where);
        $this->db->delete($tabela);
        return $this->db->affected_rows();
    }

    public function ListaWhere($table, $where = array()){
        $this->db->where($where);
        $query = $this->db->get($table);
        return $query->result();
    }

    public function Lista($Tabela) {

        $sql = "SELECT * FROM $Tabela";

        $query = $this->db->query($sql);
        return $query->result();
    }
	
	public function CarregaDadosNotas($per_ini = null, $per_fin = null, $CNPJ = NULL) {
        $sql = "SELECT * FROM tab_cad_xml CXML
				LEFT JOIN tab_info_nfe TIN ON TIN.id_xml = CXML.id_xml ";
        $sql .= " WHERE CXML.id_empr = " . $this->session->userdata('id_empr');
        $sql .= " AND CXML.tipo_nota IS NOT NULL ";
        if($per_ini != null && $per_fin != null)
            $sql .= " AND (TIN.dhEmi_nfe >= '$per_ini' AND TIN.dhEmi_nfe <= '$per_fin') ";
        if($CNPJ)
            $sql .= " AND (TIN.emit_CNPJ_nfe = '$CNPJ' OR TIN.dest_CNPJ_nfe = '$CNPJ') ";
        $sql .= " ORDER BY CXML.tipo_nota ASC, TIN.nNF_nfe ASC, TIN.dhEmi_nfe ASC ";
		
        $query = $this->db->query($sql);
        return $query->result();
    }

    function CarregaDadosSerieD($per_ini = null, $per_fin = null, $CNPJ = NULL) {
        $sql = "SELECT * FROM tab_serie_d TSD";
        $sql .= " WHERE TSD.id_empr = " . $this->session->userdata('id_empr');
        if($CNPJ)
            $sql .= " AND TSD.cnpj_cpf = '$CNPJ' ";
        if($per_ini != null && $per_fin != null)
            $sql .= " AND (TSD.dtEmissao >= '$per_ini' AND TSD.dtEmissao <= '$per_fin') ORDER BY TSD.dtEmissao ASC ";        
        $query = $this->db->query($sql);
        return $query->result();
    }

    function ListaProdutosNotaNoRepeat($id_xml) {
        $sql = "SELECT * FROM tab_prod_lf TP WHERE TP.id_xml = $id_xml GROUP BY nItemPed ORDER BY TP.nItemPed ASC";

        $query = $this->db->query($sql);
        return $query->result();
    }

}