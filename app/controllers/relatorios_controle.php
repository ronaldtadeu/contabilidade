<?php

	class relatorios_controle extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model("admin_model");
			$this->load->model("relatorios_model");

			if ($this->session->userdata('logado') == NULL) redirect('login_controle');

			if ($this->session->userdata('id_empr') == 0 || $this->session->userdata('id_empr') == NULL) redirect('login_controle/login_empr');


		}

		function RelatorioOP_interestaduais() {
			$data = array(
				"id_login" => $this->session->userdata('id_login'), 
				"id_empr" => $this->session->userdata('id_empr'), 
				"logEmpr" => $this->session->userdata('id_empr'), 
				"lista" => $this->admin_model->Lista("tab_emp_lf"),
				"filiais" => $this->relatorios_model->CarregaRegistrosWhere(array("id_emp" => $this->session->userdata('id_empr')), "tab_filial")
			);

			$this->load->view("relatorios/relatorio_op_interestaduais", $data);

		}

		function Gera_interestaduais() {
			$data["id_login"] = $this->session->userdata('id_login');
			$data["id_empr"] = $this->session->userdata('id_empr');
			$data["logEmpr"] = $this->session->userdata('id_empr');

			$dt_inicio = $this->input->post("dt_inicio");
			$dt_fim = $this->input->post("dt_fim");

			$filial = $this->input->post("cnpj_cpf");

			$data['periodo'] = "Período de $dt_inicio à $dt_fim";

			$data['dadosEmpr'] = $this->relatorios_model->CarregaRegistroWhere(array('id_emp_lf' => $data["id_empr"]), 'tab_emp_lf');
			$infoUF = $this->relatorios_model->CarregaRegistroWhere(array('sigla' => $data['dadosEmpr']->uf_emp_lf), 'estados');
			if ($infoUF) {
				$data['Xml'] = $this->relatorios_model->DadosXml('E', implode("-", array_reverse(explode("/", $dt_inicio))), implode("-", array_reverse(explode("/", $dt_fim))), $infoUF->codigo_ibge, $filial);
				
				foreach ($data['Xml'] as $xml) {
					$data["info"][$xml->emit_CNPJ_nfe] = $this->admin_model->CarregaRegistro("tab_pessoas_lfs", $xml->emit_CNPJ_nfe, "CNPJ_pessoas_lf");
					$data["infoDest"][$xml->dest_CNPJ_nfe] = $this->admin_model->CarregaRegistro("tab_pessoas_lfs", $xml->dest_CNPJ_nfe, "CNPJ_pessoas_lf");
					$itensNFe[$xml->id_xml] = $this->relatorios_model->CarregaRegistrosWhere(array("id_xml" => $xml->id_xml), "tab_prod_lf");

					$data['totProd'][$xml->id_xml] = 0;
					$data['totProdAliqICMS'][$xml->id_xml] = 0;
					$CalcRest = 0;
					foreach ($itensNFe[$xml->id_xml] as $key => $infe) {
						$AliqICMS = $infe->ICMS_pICMS;
						
						if (substr($infe->CFOP, 0, -2) != 64){
							$data['totProd'][$infe->id_xml] += $infe->vProd;
							$CalcRest += $infe->vFrete-$infe->vDesc;
						}
					}
					if (substr($infe->CFOP, 0, -2) != 64) {
						$data['totProdAliqICMS'][$infe->id_xml] += ((($data['totProd'][$xml->id_xml]+$CalcRest+$xml->vOutro_nfe) * $AliqICMS)/100);
					}
				}
				
				$this->load->view('relatorios/gera_interestaduais', $data);
			} else {
				$this->session->set_flashdata('erro', "<div class='alert alert-danger' role='alert'><strong>Erro ao gerar relatório. Verificar se 'UF' está selecionada no cadastro de empresa!</strong></div>");
				redirect('relatorios_controle/RelatorioOP_interestaduais');
			}
		}

		function RelatorioEntradaSaida() {
			$data = array(
				"id_login" => $this->session->userdata('id_login'), 
				"id_empr" => $this->session->userdata('id_empr'), 
				"logEmpr" => $this->session->userdata('id_empr'), 
				"lista" => $this->admin_model->Lista("tab_emp_lf"),
				"filiais" => $this->relatorios_model->CarregaRegistrosWhere(array("id_emp" => $this->session->userdata('id_empr')), "tab_filial")
			);

			$this->load->view("relatorios/relatorio_entrada_saida", $data);
		}

		function Gera_EntradaSaida() {
			$data["id_login"] = $this->session->userdata('id_login');
			$data["id_empr"] = $this->session->userdata('id_empr');
			$data["logEmpr"] = $this->session->userdata('id_empr');

			$dt_inicio = $this->input->post("dt_inicio");
			$dt_fim = $this->input->post("dt_fim");
			$tipo_nota = $this->input->post("tipo_nota");
			$filial = $this->input->post("cnpj_cpf");

			$data["tipo_nota"] = ($tipo_nota == "E") ? "Entrada" : "Saída";
			$data['periodo'] = "Período de $dt_inicio à $dt_fim";

			$data['dadosEmpr'] = $this->relatorios_model->CarregaRegistroWhere(array('id_emp_lf' => $data["id_empr"]), 'tab_emp_lf');
			$data['Xml'] = $this->relatorios_model->DadosXml($tipo_nota, implode("-", array_reverse(explode("/", $dt_inicio))), implode("-", array_reverse(explode("/", $dt_fim))), null, $filial);

			foreach ($data['Xml'] as $xml) {
				$data["info"][$xml->emit_CNPJ_nfe] = $this->admin_model->CarregaRegistro("tab_pessoas_lfs", $xml->emit_CNPJ_nfe, "CNPJ_pessoas_lf");
				$data["infoDest"][$xml->dest_CNPJ_nfe] = $this->admin_model->CarregaRegistro("tab_pessoas_lfs", $xml->dest_CNPJ_nfe, "CNPJ_pessoas_lf");
			}

			$this->load->view('relatorios/gera_EntradaSaida.php', $data);

		}

		function RelatorioLivroEntrada() {
			$data = array(
				"id_login" => $this->session->userdata('id_login'), 
				"id_empr" => $this->session->userdata('id_empr'), 
				"logEmpr" => $this->session->userdata('id_empr'), 
				"lista" => $this->admin_model->Lista("tab_emp_lf"),
				"Estados" => $this->admin_model->Lista("estados"),
				"filiais" => $this->relatorios_model->CarregaRegistrosWhere(array("id_emp" => $this->session->userdata('id_empr')), "tab_filial")
			);

			$this->load->view("relatorios/relatorio_livro_entrada", $data);
		}

		function Gera_LivroEntrada($imprimir = false) {
			$data["id_login"] = $this->session->userdata('id_login');
			$data["id_empr"] = $this->session->userdata('id_empr');
			$data["logEmpr"] = $this->session->userdata('id_empr');

			$dt_inicio = $this->input->post("dt_inicio");
			$dt_fim = $this->input->post("dt_fim");
			$tipo_nota = $this->input->post("tipo_nota");
			$filial = $this->input->post("cnpj_cpf");
			$estados = $this->input->post("estados");

			$data["tipo_nota"] = ($tipo_nota == "E") ? "Entrada" : "Saída";
			$data['periodo'] = "Período de $dt_inicio à $dt_fim";

			$data['dadosEmpr'] = $this->relatorios_model->CarregaRegistroWhere(array('id_emp_lf' => $data["id_empr"]), 'tab_emp_lf');

			$data['Xml'] = $this->relatorios_model->DadosXml($tipo_nota, implode("-", array_reverse(explode("/", $dt_inicio))), implode("-", array_reverse(explode("/", $dt_fim))), null, $filial, $estados);

			$data['CFOP_Array'] = array();
			foreach ($data['Xml'] as $xml) {
				$data['infoUF'][$xml->id_xml] = $this->relatorios_model->CarregaRegistroWhere(array('codigo_ibge' => $xml->cUF_nfe), 'estados');
				$data["info"][$xml->emit_CNPJ_nfe] = $this->admin_model->CarregaRegistro("tab_pessoas_lfs", $xml->emit_CNPJ_nfe, "CNPJ_pessoas_lf");
				$data["infoDest"][$xml->dest_CNPJ_nfe] = $this->admin_model->CarregaRegistro("tab_pessoas_lfs", $xml->dest_CNPJ_nfe, "CNPJ_pessoas_lf");
				$data['itensNFe'][$xml->id_xml] = $this->relatorios_model->CarregaRegistrosWhere(array("id_xml" => $xml->id_xml), "tab_prod_lf", "CFOP");

				$data['pushArray'][$xml->id_xml] = array();
				foreach ($data['itensNFe'][$xml->id_xml] as $key => $infe) {
					$CFOP = (($infe->cfop_ajust) ? $infe->cfop_ajust : $infe->CFOP);

					if (!in_array($CFOP, $data['CFOP_Array'])) array_push($data['CFOP_Array'], $CFOP);

					$TOTAL_BASE_ICMS[$xml->id_xml][$CFOP] = ((!$infe->ICMS_vBCST) ? $infe->ICMS_vBC : $infe->ICMS_vBCST) + ((isset($TOTAL_BASE_ICMS[$xml->id_xml][$CFOP])) ? $TOTAL_BASE_ICMS[$xml->id_xml][$CFOP] : 0);
					$TOTAL_vFCPST[$xml->id_xml][$CFOP] = ($infe->vFCPST ? $infe->vFCPST : 0) + ((isset($TOTAL_vFCPST[$xml->id_xml][$CFOP])) ? $TOTAL_vFCPST[$xml->id_xml][$CFOP] : 0);
					$TOTAL_IMPOSTO[$xml->id_xml][$CFOP] = ((!$infe->ICMS_vICMSST) ? $infe->ICMS_vICMS : $infe->ICMS_vICMSST) + ((isset($TOTAL_IMPOSTO[$xml->id_xml][$CFOP])) ? $TOTAL_IMPOSTO[$xml->id_xml][$CFOP] : 0);
					$TOTAL_CFOP[$xml->id_xml][$CFOP] = $infe->vProd + ((isset($TOTAL_CFOP[$xml->id_xml][$CFOP])) ? $TOTAL_CFOP[$xml->id_xml][$CFOP] : 0);
					$ALIQ[$xml->id_xml][$CFOP] = (!$infe->ICMS_pICMSST) ? $infe->ICMS_pICMS : $infe->ICMS_pICMSST;

				}

			}

			foreach ($data['Xml'] as $xml) {
				foreach ($data['CFOP_Array'] as $arr) {
					if(isset($TOTAL_CFOP[$xml->id_xml][$arr]) && $TOTAL_CFOP[$xml->id_xml][$arr]) {
						$pushArray = array("CFOP" => $arr, "TBI" => $TOTAL_BASE_ICMS[$xml->id_xml][$arr], "ALIQ" => $ALIQ[$xml->id_xml][$arr], "TI" => $TOTAL_IMPOSTO[$xml->id_xml][$arr], "TCFOP" => $TOTAL_CFOP[$xml->id_xml][$arr], 'TFCPST' => $TOTAL_vFCPST[$xml->id_xml][$arr]);

						array_push($data['pushArray'][$xml->id_xml], $pushArray);
					}
				}
			}

			if($imprimir == true)
				$this->load->view('relatorios/impressao_LV', $data);
			else
				$this->load->view('relatorios/gera_LivroEntrada', $data);

		}


	}