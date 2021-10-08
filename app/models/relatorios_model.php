<?php

	class relatorios_model extends CI_Model {
		
		function VerificaExistenciaIdNFe($IdNFe) {
			$sql = " SELECT * FROM `tab_info_nfe` T1
				inner join tab_cad_xml T2 ON T2.id_xml = T1.id_xml
				where T1.IdNFe_nfe = '$IdNFe'
				and T2.id_empr = " . $this->session->userdata('id_empr');
				
			$query = $this->db->query($sql);
			return $query->row(0);
		}
		
		function CarregaRegistrosWhere($Where, $Tabela, $order = NULL){
			$this->db->where($Where);
			if($order) $this->db->order_by($order, 'ASC');
			$query = $this->db->get($Tabela);

			return $query->result();

		}

		function CarregaRegistroWhere($Where, $Tabela){
			$this->db->where($Where);
			$query = $this->db->get($Tabela);

			return $query->row(0);

		}

		function DadosXml($tipo_nota, $dt_ini, $dt_fin, $UFEmpr = null, $CNPJ = NULL, $estado = null){
			$sql = "SELECT * FROM tab_cad_xml T1
					LEFT JOIN tab_info_nfe T2 ON T2.id_xml = T1.id_xml
						WHERE T1.tipo_nota = '$tipo_nota'
					AND T1.id_empr = " . $this->session->userdata('id_empr');

			if($estado)
				$sql .= " AND T2.cUF_nfe =  '$estado' ";
			
			if($UFEmpr)
				$sql .= " AND  T2.cUF_nfe != $UFEmpr ";
			$sql .= " AND (T2.dhEmi_nfe >= '$dt_ini' AND T2.dhEmi_nfe <= '$dt_fin') ";
			
			if($CNPJ) {
				if($tipo_nota == 'S')
					$sql .= " AND T2.emit_CNPJ_nfe = '$CNPJ' ";
				else
					$sql .= " AND T2.dest_CNPJ_nfe = '$CNPJ' ";
			}
			
			$sql .= " GROUP BY T1.id_xml order by T2.dhEmi_nfe asc";
			
			$query = $this->db->query($sql);
			return $query->result();

		}

		function CarregaXmlLimit($lastId, $limit) {
			$sql = "
			SELECT * FROM tab_cad_xml TCX
				WHERE TCX.id_empr = ". $this->session->userdata('id_empr');
			
			if($limit > 1)
				$sql .= " AND TCX.id_xml > $lastId ";	
			else
				$sql .= " AND TCX.id_xml = $lastId ";
			
			$sql .= " AND TCX.lancada_xml = 2 LIMIT $limit ";

			$query = $this->db->query($sql);
			return $query->result();
		}

	}