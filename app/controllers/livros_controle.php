<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class livros_controle extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('admin_model');
			$this->load->model("parser_model");
			$this->load->model('login_model');
			$this->load->model('relatorios_model');
			$this->load->library('form_validation');
			$this->load->helper(array('form', 'url'));

			if ($this->session->userdata('logado') == NULL) {

				redirect('login_controle');
			}
			
			$uri = explode('/', (isset($_SERVER['SCRIPT_URI']) ? $_SERVER['SCRIPT_URI'] : $_SERVER['REQUEST_URI']));
			$function = $uri[(end($uri) != "" ? count($uri)-1: count($uri)-2)];

			if (
				($this->session->userdata('id_empr') == 0 || $this->session->userdata('id_empr') == NULL) && 
				$function != 'cadastroEmpr' &&
				$function != 'cad_empr' &&
				$function != 'Editempr' &&
				$function != 'edit_empr'
			) {
				redirect('login_controle/login_empr');
			}
			
			if($this->session->userdata('cAux') == null)
				$this->session->set_userdata('cAux', 0);

			date_default_timezone_set('America/Sao_Paulo');	
			
		}

		function CarregaRegistro() {
			$id = $this->input->post("id");
			$PrimaryKey = $this->input->post("PrimaryKey");
			$tabela = $this->input->post("tabela");

			$where = array($PrimaryKey => $id);

			$registro = $this->admin_model->CarregaRegistro2($tabela, $where);

			echo json_encode($registro);

		}

		function CarregaRegistroProdsJs() {
			$id = $this->input->post("id");

			$registro = $this->admin_model->CarregaProdJs($id);

			echo json_encode($registro);

		}

		function index() {

			$data = array("id_empr" => $this->session->userdata('id_empr'),);

			$this->load->view("index", $data);

		}

		function TrocaEmpresa() {
			$data = array("id_login" => $this->session->userdata('id_login'), "id_empr" => $this->session->userdata('id_empr'), "logEmpr" => $this->session->userdata('id_empr'), "lista" => $this->admin_model->Lista("tab_emp_lf"));

			$this->load->view("trocaEmpr", $data);

		}

		function AcaoTrocaEmpresa($idNovaEmpresa) {

			if ($this->session->userdata('id_empr') != $idNovaEmpresa) {
				$array = array('id_empr' => $idNovaEmpresa);

				if ($this->admin_model->AtualizaRegistro(array("id_login" => $this->session->userdata('id')), "cad_login", $array)) {
					$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>Empresa logada com sucesso!</strong></div>");
					$this->session->set_userdata($array);
				}

			} else {
				$this->session->set_flashdata('erro', "<div class='alert alert-success' role='alert'><strong>Esta empresa já está logada!</strong></div>");
			}


			redirect("livros_controle/TrocaEmpresa");

		}

		function empr() {

			$data = array("id_login" => $this->session->userdata('id_login'), "id_empr" => $this->session->userdata('id_empr'), "logEmpr" => $this->session->userdata('id_empr'), "lista" => $this->admin_model->Lista("tab_emp_lf"));

			$this->load->view("tabelaEmpr", $data);

		}

		function Editempr($id) {

			$data = array(
				"carrega" => $this->admin_model->CarregaRegistro("tab_emp_lf", $id, "id_emp_lf"),
				"filiais" => $this->relatorios_model->CarregaRegistrosWhere(array("id_emp" => $id), "tab_filial"),
				"estados" => $this->admin_model->Lista("estados"),
				"id_empr" => $this->session->userdata('id_empr')
			);

			$this->load->view("EditcadastrosEmpr", $data);

		}

		function cad_empr() {

			$raz = $this->input->post("nome_emp_lf");
			$fan = $this->input->post("fantasia_emp_lf");
			$est = $this->input->post("uf_emp_lf");
			$cod = $this->input->post("cod_mun_emp_lf");
			$cep = $this->input->post("cep_emp_lf");
			$num = $this->input->post("numero_emp_lf");
			$end = $this->input->post("end_emp_lf");
			$bai = $this->input->post("bairro_emp_lf");
			$comp = $this->input->post("compl_emp_lf");
			$tel = $this->input->post("fone_emp_lf");
			$fax = $this->input->post("fax_emp_lf");
			$email = $this->input->post("email_emp_lf");
			$perfilEmp = $this->input->post("ind_perfil_emp_lf");
			$ativEmp = $this->input->post("ind_ati_emp_lf");
			$inscEst = $this->input->post("insc_est_emp_lf");
			$inscMun = $this->input->post("insc_mun_emp_lf");
			$suframa = $this->input->post("suframa_emp_lf");
			$cpfCnpj = $this->limpaCPF_CNPJ($this->input->post("cpf_cnpj_emp_lf"));
			$tipo_insc_emp_lf = $this->input->post("tipo_insc_emp_lf");

			$nom = $this->input->post("nome_contador_emp_lf");
			$crc = $this->input->post("crc_contador_emp_lf");
			$cepContador = $this->input->post("cep_contador_emp_lf");
			$endContador = $this->input->post("end_contador_emp_lf");
			$numContador = $this->input->post("numero_contador_emp_lf");
			$complContador = $this->input->post("compl_contador_emp_lf");
			$bairroContador = $this->input->post("bairro_contador_emp_lf");
			$telContador = $this->input->post("fone_contador_emp_lf");
			$faxContador = $this->input->post("faxo_contador_emp_lf");
			$emailContador = $this->input->post("email_contador_emp_lf");
			$codMunContador = $this->input->post("cod_mun_contador_emp_lf");
			$cpfCnpjContador = $this->limpaCPF_CNPJ($this->input->post("cpf_cnpj_contador_emp_lf"));
			$tipo_insc_contador_lf = $this->input->post("tipo_insc_contador_lf");
			$opt_simples_lf = $this->input->post("opt_simples_lf");
			$id_sess = $this->session->userdata('id');

			$data = array("nome_emp_lf" => $raz, "fantasia_emp_lf" => $fan, "uf_emp_lf" => $est, "cod_mun_emp_lf" => $cod, "cep_emp_lf" => $cep, "numero_emp_lf" => $num, "end_emp_lf" => $end, "bairro_emp_lf" => $bai, "compl_emp_lf" => $comp, "fone_emp_lf" => $tel, "fax_emp_lf" => $fax, "email_emp_lf" => $email, "ind_perfil_emp_lf" => $perfilEmp, "ind_ati_emp_lf" => $ativEmp, "insc_est_emp_lf" => $inscEst, "insc_mun_emp_lf" => $inscMun, "suframa_emp_lf" => $suframa, "cpf_cnpj_emp_lf" => $cpfCnpj, "nome_contador_emp_lf" => $nom, "crc_contador_emp_lf" => $crc, "cep_contador_emp_lf" => $cepContador, "end_contador_emp_lf" => $endContador, "numero_contador_emp_lf" => $numContador, "compl_contador_emp_lf" => $complContador, "bairro_contador_emp_lf" => $bairroContador, "fone_contador_emp_lf" => $telContador, "faxo_contador_emp_lf" => $faxContador, "email_contador_emp_lf" => $emailContador, "cod_mun_contador_emp_lf" => $codMunContador, "cpf_cnpj_contador_emp_lf" => $cpfCnpjContador, "tipo_insc_emp_lf" => $tipo_insc_emp_lf, "tipo_insc_contador_lf" => $tipo_insc_contador_lf, "opt_simples_lf" => $opt_simples_lf);

			if ($id = $this->admin_model->insertId("tab_emp_lf", $data)) {

				for($i = 0; $i < count($this->input->post('CNPJ_filial')); $i++) {
					$cnpj_filial = substr($cpfCnpj, 0, 8) . $this->limpaCPF_CNPJ($this->input->post('CNPJ_filial')[$i]);
					$dadosFilial = array(
						'id_emp' => $id,
						'CNPJ_filial' => $cnpj_filial,
						'CEP_filial' => $this->input->post('CEP_filial')[$i],
						'fantasia_filial' => $this->input->post('fantasia_filial')[$i],
						'inscricao_estadual_filial' => $this->input->post('inscricao_estadual_filial')[$i]
					);

					if($this->input->post('CNPJ_filial')[$i] && !$this->admin_model->CarregaRegistro("tab_filial", $cnpj_filial, "CNPJ_filial"))
						$this->admin_model->insertId("tab_filial", $dadosFilial);
					
				}

				$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>Seu registro foi incluido com sucesso!</strong></div>");
				redirect("livros_controle/empr/");
			} else {
				$this->session->set_flashdata('erro', "<div class='alert alert-danger' role='alert'><strong>Seu registro não foi incluido!</strong></div>");
				redirect("livros_controle/empr/");
			}
		}

		function limpaCPF_CNPJ($valor) {
			$valor = trim($valor);
			$valor = str_replace(".", "", $valor);
			$valor = str_replace(",", "", $valor);
			$valor = str_replace("-", "", $valor);
			$valor = str_replace("/", "", $valor);
			return $valor;
		}

		function edit_empr($id) {

			$raz = $this->input->post("nome_emp_lf");
			$fan = $this->input->post("fantasia_emp_lf");
			$est = $this->input->post("uf_emp_lf");
			$cod = $this->input->post("cod_mun_emp_lf");
			$cep = $this->input->post("cep_emp_lf");
			$num = $this->input->post("numero_emp_lf");
			$end = $this->input->post("end_emp_lf");
			$bai = $this->input->post("bairro_emp_lf");
			$comp = $this->input->post("compl_emp_lf");
			$tel = $this->input->post("fone_emp_lf");
			$fax = $this->input->post("fax_emp_lf");
			$email = $this->input->post("email_emp_lf");
			$perfilEmp = $this->input->post("ind_perfil_emp_lf");
			$ativEmp = $this->input->post("ind_ati_emp_lf");
			$inscEst = $this->input->post("insc_est_emp_lf");
			$inscMun = $this->input->post("insc_mun_emp_lf");
			$suframa = $this->input->post("suframa_emp_lf");
			$cpfCnpj = $this->limpaCPF_CNPJ($this->input->post("cpf_cnpj_emp_lf"));
			$tipo_insc_emp_lf = $this->input->post("tipo_insc_emp_lf");

			$nom = $this->input->post("nome_contador_emp_lf");
			$crc = $this->input->post("crc_contador_emp_lf");
			$cepContador = $this->input->post("cep_contador_emp_lf");
			$endContador = $this->input->post("end_contador_emp_lf");
			$numContador = $this->input->post("numero_contador_emp_lf");
			$complContador = $this->input->post("compl_contador_emp_lf");
			$bairroContador = $this->input->post("bairro_contador_emp_lf");
			$telContador = $this->input->post("fone_contador_emp_lf");
			$faxContador = $this->input->post("faxo_contador_emp_lf");
			$emailContador = $this->input->post("email_contador_emp_lf");
			$codMunContador = $this->input->post("cod_mun_contador_emp_lf");
			$cpfCnpjContador = $this->limpaCPF_CNPJ($this->input->post("cpf_cnpj_contador_emp_lf"));
			$tipo_insc_contador_lf = $this->input->post("tipo_insc_contador_lf");
			$opt_simples_lf = $this->input->post("opt_simples_lf");
			$id_sess = $this->session->userdata('id');

			$where = array("id_emp_lf" => $id,);

			$data = array(

				"nome_emp_lf" => $raz, "fantasia_emp_lf" => $fan, "uf_emp_lf" => $est, "cod_mun_emp_lf" => $cod, "cep_emp_lf" => $cep, "numero_emp_lf" => $num, "end_emp_lf" => $end, "bairro_emp_lf" => $bai, "compl_emp_lf" => $comp, "fone_emp_lf" => $tel, "fax_emp_lf" => $fax, "email_emp_lf" => $email, "ind_perfil_emp_lf" => $perfilEmp, "ind_ati_emp_lf" => $ativEmp, "insc_est_emp_lf" => $inscEst, "insc_mun_emp_lf" => $inscMun, "suframa_emp_lf" => $suframa, "cpf_cnpj_emp_lf" => $cpfCnpj, "nome_contador_emp_lf" => $nom, "crc_contador_emp_lf" => $crc, "cep_contador_emp_lf" => $cepContador, "end_contador_emp_lf" => $endContador, "numero_contador_emp_lf" => $numContador, "compl_contador_emp_lf" => $complContador, "bairro_contador_emp_lf" => $bairroContador, "fone_contador_emp_lf" => $telContador, "faxo_contador_emp_lf" => $faxContador, "email_contador_emp_lf" => $emailContador, "cod_mun_contador_emp_lf" => $codMunContador, "cpf_cnpj_contador_emp_lf" => $cpfCnpjContador, "tipo_insc_emp_lf" => $tipo_insc_emp_lf, "tipo_insc_contador_lf" => $tipo_insc_contador_lf, "opt_simples_lf" => $opt_simples_lf);

			if ($this->admin_model->AtualizaRegistro($where, "tab_emp_lf", $data)) {

				for($i = 0; $i < count($this->input->post('CNPJ_filial')); $i++) {
					$cnpj_filial = substr($cpfCnpj, 0, 8) . $this->limpaCPF_CNPJ($this->input->post('CNPJ_filial')[$i]);
					$dadosFilial = array(
						'id_emp' => $id,
						'CNPJ_filial' => $cnpj_filial,
						'CEP_filial' => $this->input->post('CEP_filial')[$i],
						'fantasia_filial' => $this->input->post('fantasia_filial')[$i],
						'inscricao_estadual_filial' => $this->input->post('inscricao_estadual_filial')[$i]
					);

					if($this->input->post('CNPJ_filial')[$i]){
						if(!isset($this->input->post('idFilial')[$i]) || !$this->admin_model->CarregaRegistro("tab_filial", $this->input->post('idFilial')[$i], "id"))
							$this->admin_model->insertId("tab_filial", $dadosFilial);
						else
							$this->admin_model->AtualizaRegistro(array('id' => $this->input->post('idFilial')[$i]), "tab_filial", $dadosFilial);
					}
				}

				$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>Seu registro foi alterado com sucesso!</strong></div>");
				redirect("livros_controle/empr");
			} else {
				$this->session->set_flashdata('sucesso', "<div class='alert alert-danger' role='alert'><strong>Seu registro não foi alterado!</strong></div>");
				redirect("livros_controle/empr");
			}

		}

		function deletarEmpr($id) {

			$data = array("id_emp_lf" => $id);

			if ($this->admin_model->delete_where($data, "tab_emp_lf")) {
				$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>Seu registro foi excluido com sucesso!</strong></div>");
				redirect("livros_controle/empr");
			} else {
				$this->session->set_flashdata('erro', "<div class='alert alert-danger' role='alert'><strong>Seu registro não foi excluido!</strong></div>");
				redirect("livros_controle/empr");
			}

		}
		
		function excluiFilialAjax() {
			$id = $this->input->post('id');

			$data = array("id" => $id);

			return $this->admin_model->delete_where($data, "tab_filial") ? true : false;
		}

		function cadastroEmpr() {

			$data = array("id_empr" => $this->session->userdata('id_empr') ? $this->session->userdata('id_empr') : 0, "estados" => $this->admin_model->Lista("estados"), "lista" => $this->admin_model->Lista("tab_cad_xml"));

			$this->load->view("cadastrosEmpr", $data);

		}


		function tabelaPessoas() {

			$data = array(
				"id_empr" => $this->session->userdata('id_empr'),
				"estados" => $this->admin_model->Lista("estados"),
				"pessoas" => $this->admin_model->Lista("tab_pessoas_lfs")
			);

			$this->load->view("tabelaPessoas", $data);

		}

		function CarregaAtualizaPessoa() {
			$id_pss = $this->input->post('id_pss');

			$result = $this->admin_model->CarregaRegistro("tab_pessoas_lfs", $id_pss, "id_pessoas_lfs");

			echo json_encode($result);

		}

		function atualizaPessoa() {
			$data = array(
				"CNPJ_pessoas_lf" => $this->limpaCPF_CNPJ($this->input->post('CNPJ_pessoas_lf')),
				"xNome_pessoas_lf" => $this->input->post('xNome_pessoas_lf'),
				"xFant_pessoas_lf" => $this->input->post('xFant_pessoas_lf'),
				"xLgr_pessoas_lf" => $this->input->post('xLgr_pessoas_lf'),
				"nro_pessoas_lf" => $this->input->post('nro_pessoas_lf'),
				"xBairro_pessoas_lf" => $this->input->post('xBairro_pessoas_lf'),
				"cMun_pessoas_lf" => $this->input->post('cMun_pessoas_lf'),
				"xMun_pessoas_lf" => $this->input->post('xMun_pessoas_lf'),
				"UF_pessoas_lf" => $this->input->post('UF_pessoas_lf'),
				"CEP_pessoas_lf" => $this->input->post('CEP_pessoas_lf'),
				"cPais_pessoas_lf" => $this->input->post('cPais_pessoas_lf'),
				"xPais_pessoas_lf" => $this->input->post('xPais_pessoas_lf'),
				"fone_pessoas_lf" => $this->input->post('fone_pessoas_lf'),
				"opc_simples_lf" => $this->input->post('opc_simples_lf'),
				"indIEDest_pessoas_lf" => $this->input->post('indIEDest_pessoas_lf'),
				"IE_pessoas_lf" => $this->input->post('IE_pessoas_lf')
			);

			$where = array("id_pessoas_lfs" => $this->input->post('id_pessoas_lfs'));

			if(!$this->input->post('id_pessoas_lfs')) {
				$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>Seu registro foi incluido com sucesso!</strong></div>");
				$this->admin_model->insertId("tab_pessoas_lfs", $data);
			} else {
				$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>Seu registro foi alterado com sucesso!</strong></div>");
				$this->admin_model->AtualizaRegistro($where, "tab_pessoas_lfs", $data);
			}

			redirect("livros_controle/tabelaPessoas");

		}

		function Produtos() {

			$data = array("id_login" => $this->session->userdata('id_login'), "id_empr" => $this->session->userdata('id_empr'), "logEmpr" => $this->session->userdata('id_empr'), "lista" => $this->admin_model->Lista("tab_novos_produtos"));

			$this->load->view("tabelaProdutos", $data);

		}

		function cadastroProdutos($id = null) {

			$result = ($id) ? $this->admin_model->CarregaRegistro("tab_novos_produtos", $id, "id_nvoProds") : null;

			$data = array("id_empr" => $this->session->userdata('id_empr'), "estados" => $this->admin_model->Lista("estados"), "lista" => $this->admin_model->Lista("tab_cad_xml"), "id" => $id, "Produto" => $result);

			$this->load->view("cadastrosProdutos", $data);

		}

		function cad_Produtos() {
			$a = $this->input->post("Nome_nvoProds");
			$b = $this->input->post("codid_nvoProds");
			$c = $this->input->post("CFOPestad_nvoProds");
			$id = $this->input->post("id_nvoProds");

			$data = array(
				"Nome_nvoProds" => $a,
				"codid_nvoProds" => $b,
				"CFOPestad_nvoProds" => $c,
			);

			if(!$id) {
				$this->admin_model->insertId("tab_novos_produtos", $data);
			} else {
				$where = array("id_nvoProds" => $id);
				$this->admin_model->AtualizaRegistro($where, "tab_novos_produtos", $data);
			}

			$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>Seu registro foi incluido com sucesso!</strong></div>");
			redirect("livros_controle/Produtos/");

		}

		function deletarProd($id) {

			$where = array("id_nvoProds" => $id);

			if ($this->admin_model->delete_where($where, "tab_novos_produtos")) {
				$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>Seu registro foi excluido com sucesso!</strong></div>");
				redirect("livros_controle/tabelaXmls");
			} else {
				$this->session->set_flashdata('erro', "<div class='alert alert-danger' role='alert'><strong>Seu registro não foi excluido!</strong></div>");
				redirect("livros_controle/tabelaXmls");
			}

		}

		function VerNfe($id) {
			$dadosXML = $this->admin_model->CarregaInfoXml($id);

			$data = array("XML" => $dadosXML, "info" => $this->admin_model->CarregaRegistro("tab_pessoas_lfs", $dadosXML->emit_CNPJ_nfe, "CNPJ_pessoas_lf"), "infoDest" => $this->admin_model->CarregaRegistro("tab_pessoas_lfs", $dadosXML->dest_CNPJ_nfe, "CNPJ_pessoas_lf"), "lista" => $this->admin_model->ListaProdXml($id), "infoImpst" => $this->admin_model->CarregaImposto($id));

			$this->load->view("vizualizarNfe", $data);

		}


		function importXml() {
			
			$data = array(
				"id_empr" => $this->session->userdata('id_empr'), 
			);

			$this->load->view("importarxml", $data);
			
		}

		function listaNFEnaoinclusa() {

			$result = $this->relatorios_model->CarregaRegistrosWhere(array("id_empr" => $this->session->userdata('id_empr'), "lancada_xml" => 1), "tab_cad_xml", "lancada_xml"); 

			echo json_encode($result);
		}

		function cad_xml() {

			$arquivos = $_FILES["upload_file"];
			$nome = $arquivos['name'];
			$nome_bd = "Nfe_" . date("Y-m-d") . "_" . date('H-i-s') . "_" . 0 . ".xml";
			$data = array("id_empr" => $this->session->userdata('id_empr'), "nom_xml" => $nome, "caminho_nom_xml" => $nome_bd);

			$config['upload_path']          = './uploads/xmls/';
			$config['allowed_types']        = 'txt|xml';
			$config['remove_spaces']        = TRUE;
			$config['overwrite']        	= TRUE;
			$config['file_name']			= $nome_bd;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('upload_file')) {
				$id_xml = $this->admin_model->insertId("tab_cad_xml", $data);
				
				$incluidas = $this->inclusaoXml($nome_bd, $id_xml, true);

				if(!$incluidas){
					echo "file_type_error";
				}else {
					echo strip_tags($this->input->post('upload_file_ids'));
				}

			} else {
				echo "file_type_error";
			}
		}

		function deletarXml($id, $caminho) {

			$destino = "./uploads/xmls/" . $caminho;

			$data = array("id_xml" => $id);
			
			if ($this->admin_model->delete_where($data, "tab_cad_xml") && unlink($destino)) {
				$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>Seu registro foi excluido com sucesso!</strong></div>");
				redirect("livros_controle/importXml");
			} else {
				$this->session->set_flashdata('erro', "<div class='alert alert-danger' role='alert'><strong>Seu registro não foi excluido!</strong></div>");
				redirect("livros_controle/importXml");
			}

		}

		function deletarXmlJason() {

			$destino = "./uploads/xmls/" . $this->input->post('caminho');

			$id = $this->input->post('id');

			$data = array("id_xml" => $id);
			if ($this->admin_model->delete_where($data, "tab_cad_xml")) {
				if(file_exists($destino))
					unlink($destino);
				echo json_encode(1);	
			} else {
				echo json_encode(2);	
			}

		}

		function IncluirNFeTotais() {
			$lista = $this->relatorios_model->CarregaRegistrosWhere(array("id_empr" => $this->session->userdata('id_empr'), "lancada_xml" => 1), "tab_cad_xml");
			$countSucesso = 0;
			for ($i = 0; $i < count($lista); $i++) {
				$xml = $lista[$i];
				if (file_exists('./uploads/xmls/' . $xml->caminho_nom_xml) && $xml->caminho_nom_xml != '0') {
					$countSucesso++;
					$this->inclusaoXml($xml->caminho_nom_xml, $xml->id_xml, true);					
				}
			}
			
			if($countSucesso != 0){
				$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>Seus registros foram incluidos com sucesso!</strong></div>");
			} else {
				$this->session->set_flashdata('erro', "<div class='alert alert-danger' role='alert'><strong>Alguns ou todos os registros não foram incluidos!</strong></div>");
			}
			redirect("livros_controle/importXml");

		}

		function SyncDadosNota() {
			$lastId = $this->input->post("lastId");
			$unico = $this->input->post("unico");

			$maxCountAttArq = $unico ? 1 : 3;			
			$lista = $this->relatorios_model->CarregaXmlLimit($lastId, $maxCountAttArq);
			$err = array();

			for($i = 0; $i < count($lista); $i++) {
				$xml = $lista[$i];

				if (file_exists('./uploads/xmls/' . $xml->caminho_nom_xml) && $xml->caminho_nom_xml != '0') {
					$exe = $this->inclusaoXml($xml->caminho_nom_xml, $xml->id_xml, true, true);
					if(!$exe) {
						array_push($err, array('id' => $lastId, 'erro' => $exe));
					}
				} else {
					array_push($err, array('id' => $lastId, 'erro' => 'Arquivo não encontrado!'));
				}

				$lastId = $xml->id_xml;
			}
			
			echo json_encode(array('bool' => (count($lista) > 0 && !$unico ? true : false), 'count' => count($lista), 'lastId' => $lastId, 'error' => $err));
		}
		
		function testeXML() {
			$nomeArquivo = 'Nfe_2019-04-24_11-57-11_0.xml';
			$arqvxml = simplexml_load_file('./uploads/xmls/' . $nomeArquivo);
			if($arqvxml) {
				$ProdutoXml = $arqvxml->NFe->infNFe->det;
				$IdNFe = $arqvxml->NFe->infNFe->attributes()['Id'];

				foreach($ProdutoXml as $prod){
					
					$nItem = $prod->attributes()['nItem'];
					$cProd = $prod->prod->cProd;
					$xProd = $prod->prod->xProd;
					
					$where = array(
						"id_nfe_lancada" => (String) $IdNFe,
						"nItemPed" => $nItem,
						"cProd" => (String) $cProd,
						"xProd" => (String) $xProd,
					);
					
					$item = $this->relatorios_model->CarregaRegistrosWhere($where, 'tab_prod_lf');
					
					var_dump(count($item));
					echo "<br />";
				}
			}
		}
		
		function xml_attribute($object, $attribute) {
			if(isset($object[$attribute]))
				return (string) $object[$attribute];
		}
		
		function inclusaoXml($nomeArquivo, $IDdoArquivo, $mult = false, $sync = false) {
			$arqvxml = simplexml_load_file('./uploads/xmls/' . $nomeArquivo);
			
						
			if(!$arqvxml) {
				if ($mult == false) {
					$this->session->set_flashdata('erro', "<div class='alert alert-danger' role='alert'><strong>Alguma(s) nota(s) não foi(ram) incluída(s), pois está(ão) corrompida(s)!</strong></div>");
					redirect("livros_controle/importXml");
				} else {
					if($sync)
						return 'Impossível abrir XML!';
					else
						$pular = true;
				}
			}
			
			if(!$arqvxml->NFe) {
				if($sync)
					return 'Não é NFe!';
				else
					$pular = true;
			}
			
			//Id da nota
			$IdNFe = $arqvxml->NFe->infNFe->attributes()['Id'];
			$cNF_nfe = $arqvxml->NFe->infNFe->ide->cNF;
			$nNF_nfe = $arqvxml->NFe->infNFe->ide->nNF;
			$cUF_nfe = $arqvxml->NFe->infNFe->ide->cUF;

			$empresa_logada = $this->admin_model->CarregaRegistro("tab_emp_lf", $this->session->userdata('id_empr'), "id_emp_lf");
			$cnpjEmpr = substr($empresa_logada->cpf_cnpj_emp_lf, 0, -6);
			
			//Verificações de existência de nota no sistema e se ela já foi lançada
			$VerificaExisteIdNFe = $this->relatorios_model->VerificaExistenciaIdNFe($IdNFe);		
			if($VerificaExisteIdNFe && !$sync) {
				$pular = true;
			} else {
				$pular = false;
			}
			
			//Verifica se a nota faz parte da empresa logada ou filial da mesma
			$VerificaCadastro = $this->relatorios_model->CarregaRegistroWhere(array("IdNFe_nfe" => "$IdNFe", "emit_CNPJ_nfe" => substr($arqvxml->NFe->infNFe->emit->CNPJ, 0, -6), "dest_CNPJ_nfe" => substr($arqvxml->NFe->infNFe->dest->CNPJ, 0, -6)), 'tab_info_nfe');
			if($VerificaCadastro){
				$VerificaRegistroIncompleto = $this->relatorios_model->CarregaRegistroWhere(array("id_xml" => $VerificaExisteIdNFe->id_xml, "id_empr" => $this->session->userdata('id_empr')), 'tab_cad_xml');
				if(!$VerificaRegistroIncompleto) {
					$wd = array('id_xml' => $VerificaExisteIdNFe->id_xml);
					
					$this->admin_model->delete_where($wd, "tab_prod_lf");
					$this->admin_model->delete_where($wd, "tab_info_nfe");
					
					$VerificaExisteIdNFe = $this->relatorios_model->CarregaRegistroWhere(array("IdNFe_nfe" => "$IdNFe"), 'tab_info_nfe');
				}
			}
			
			$VerificaNotaDaEmpresa = (substr($arqvxml->NFe->infNFe->dest->CNPJ, 0, -6) == $cnpjEmpr || substr($arqvxml->NFe->infNFe->emit->CNPJ, 0, -6) == $cnpjEmpr);
			if (!$pular && $VerificaNotaDaEmpresa) {
				//Data de emissão da nota
				$dhEmi = $arqvxml->NFe->infNFe->ide->dhEmi;
				$dhEmi = substr($dhEmi, 0, 10);

				//Itens da nota
				$ProdutoXml = $arqvxml->NFe->infNFe->det;

				//Emitente
				$pessoaXml = $arqvxml->NFe->infNFe->emit;
				$CNPJ = ($pessoaXml->CNPJ) ? $pessoaXml->CNPJ : 0;
				$xNome = ($pessoaXml->xNome) ? $pessoaXml->xNome : 0;
				$xFant = ($pessoaXml->xFant) ? $pessoaXml->xFant : 0;
				$IE = ($pessoaXml->IE) ? $pessoaXml->IE : 0;
				
				//Endereço emitente
				$pessoaXmlEnd = $arqvxml->NFe->infNFe->emit->enderEmit;
				$xLgr = $pessoaXmlEnd->xLgr;
				$nro = $pessoaXmlEnd->nro;
				$xBairro = $pessoaXmlEnd->xBairro;
				$cMun = $pessoaXmlEnd->cMun;
				$xMun = $pessoaXmlEnd->xMun;
				$UF = $pessoaXmlEnd->UF;
				$CEP = $pessoaXmlEnd->CEP;
				$cPais = $pessoaXmlEnd->cPais;
				$xPais = $pessoaXmlEnd->xPais;
				$fone = $pessoaXmlEnd->fone;

				//Destinatario
				$pessoaXml2 = $arqvxml->NFe->infNFe->dest;
				$CNPJ2 = ($pessoaXml2->CNPJ) ? $pessoaXml2->CNPJ : 0;
				$xNome2 = ($pessoaXml2->xNome) ? $pessoaXml2->xNome : 0;
				$xFant2 = ($pessoaXml2->xFant) ? $pessoaXml2->xFant : 0;
				$indIEDest2 = ($pessoaXml2->indIEDest) ? $pessoaXml2->indIEDest : 0;
				$IE2 = ($pessoaXml2->IE) ? $pessoaXml2->IE : 0;

				//Endereço destinatario
				$pessoaXmlEnd2 = $arqvxml->NFe->infNFe->dest->enderDest;
				$xLgr2 = $pessoaXmlEnd2->xLgr;
				$nro2 = $pessoaXmlEnd2->nro;
				$xBairro2 = $pessoaXmlEnd2->xBairro;
				$cMun2 = $pessoaXmlEnd2->cMun;
				$xMun2 = $pessoaXmlEnd2->xMun;
				$UF2 = $pessoaXmlEnd2->UF;
				$CEP2 = $pessoaXmlEnd2->CEP;
				$cPais2 = $pessoaXmlEnd2->cPais;
				$xPais2 = $pessoaXmlEnd2->xPais;
				$fone2 = $pessoaXmlEnd2->fone;

				//Total
				$ICMSTot = $arqvxml->NFe->infNFe->total->ICMSTot;

				//Transportadora
				$transp = $arqvxml->NFe->infNFe->transp;
				//Cobrança
				$cobr = $arqvxml->NFe->infNFe->cobr;
				//Pagamento
				$pag = $arqvxml->NFe->infNFe->pag->detPag;
				//informações adicionais
				$infAdic = $arqvxml->NFe->infNFe->infAdic->infCpl;

				$dataXML = array(
					"id_xml" => $IDdoArquivo,
					"IdNFe_nfe" => "$IdNFe",
					"cUF_nfe" => json_decode($cUF_nfe),
					"cNF_nfe" => "$cNF_nfe",
					"nNF_nfe" => "$nNF_nfe",
					"dhEmi_nfe" => $dhEmi,
					"emit_CNPJ_nfe" => "$CNPJ",
					"dest_CNPJ_nfe" => "$CNPJ2",
					"vBC_nfe" => json_decode($ICMSTot->vBC),
					"vICMS_nfe" => json_decode($ICMSTot->vICMS),
					"vICMSDeson_nfe" => json_decode($ICMSTot->vICMSDeson),
					"vFCP_nfe" => json_decode(json_decode($ICMSTot->vFCP)),
					"vBCST_nfe" => json_decode($ICMSTot->vBCST),
					"vST_nfe" => json_decode($ICMSTot->vST),
					"vFCPST_nfe" => json_decode($ICMSTot->vFCPST),
					"vFCPSTRet_nfe" => json_decode($ICMSTot->vFCPSTRet),
					"vProd_nfe" => json_decode($ICMSTot->vProd),
					"vFrete_nfe" => json_decode($ICMSTot->vFrete),
					"vSeg_nfe" => json_decode($ICMSTot->vSeg),
					"vDesc_nfe" => json_decode($ICMSTot->vDesc),
					"vII_nfe" => json_decode($ICMSTot->vII),
					"vIPI_nfe" => json_decode($ICMSTot->vIPI),
					"vIPIDevol_nfe" => json_decode($ICMSTot->vIPIDevol),
					"vCOFINS_nfe" => json_decode($ICMSTot->vCOFINS),
					"vPIS_nfe" => json_decode($ICMSTot->vPIS),
					"vOutro_nfe" => json_decode($ICMSTot->vOutro),
					"vNF_nfe" => json_decode($ICMSTot->vNF),
					"vTotTrib_nfe" => json_decode($ICMSTot->vTotTrib),
					"transp_CNPJ_nfe" => json_decode($transp->transporta->CNPJ),
					"cobr_fat_nFat_nfe" => json_decode((isset($cobr->fat->nFat)) ? $cobr->fat->nFat : ""),
					"cobr_fat_vOrig_nfe" => json_decode((isset($cobr->fat->nFat)) ? $cobr->fat->vOrig : ""),
					"cobr_fat_vDesc_nfe" => json_decode((isset($cobr->fat->nFat)) ? $cobr->fat->vDesc : ""),
					"cobr_fat_vLiq_nfe" => json_decode((isset($cobr->fat->nFat)) ? $cobr->fat->vLiq : ""),
					"pag_indPag_nfe" => json_decode((isset($cobr->fat->nFat)) ? $pag->indPag : ""),
					"pag_tPag_nfe" => json_decode((isset($cobr->fat->nFat)) ? $pag->tPag : ""),
					"vPag_nfe" => json_decode((isset($cobr->fat->nFat)) ? $pag->vPag : ""),
					"infAdic_nfe" => "$infAdic"

				);

				if(!$sync)
					$this->admin_model->insertId("tab_info_nfe", $dataXML);
				else
					$this->admin_model->AtualizaRegistro(array("id_xml" => $IDdoArquivo), "tab_info_nfe", $dataXML);
				
				if (!$this->admin_model->CarregaRegistro("tab_pessoas_lfs", $CNPJ, "CNPJ_pessoas_lf")) {
					$dataPessoaEmit = array(
						"CNPJ_pessoas_lf" => "$CNPJ",
						"xNome_pessoas_lf" => "$xNome",
						"xFant_pessoas_lf" => "$xFant",
						"xLgr_pessoas_lf" => "$xLgr",
						"nro_pessoas_lf" => "$nro",
						"xBairro_pessoas_lf" => "$xBairro",
						"cMun_pessoas_lf" => "$cMun",
						"xMun_pessoas_lf" => "$xMun",
						"UF_pessoas_lf" => "$UF",
						"CEP_pessoas_lf" => "$CEP",
						"cPais_pessoas_lf" => "$cPais",
						"xPais_pessoas_lf" => "$xPais",
						"fone_pessoas_lf" => "$fone",
						"indIEDest_pessoas_lf" => ($IE) ? 1 : 2,
						"IE_pessoas_lf" => "$IE"
					);
					
					$this->admin_model->insertId("tab_pessoas_lfs", $dataPessoaEmit);
				}

				if (!$this->admin_model->CarregaRegistro("tab_pessoas_lfs", $CNPJ2, "CNPJ_pessoas_lf")) {
					$dataPessoaDest = array(
						"CNPJ_pessoas_lf" => "$CNPJ2",
						"xNome_pessoas_lf" => "$xNome2",
						"xFant_pessoas_lf" => "$xFant2",
						"xLgr_pessoas_lf" => "$xLgr2",
						"nro_pessoas_lf" => "$nro2",
						"xBairro_pessoas_lf" => "$xBairro2",
						"cMun_pessoas_lf" => "$cMun2",
						"xMun_pessoas_lf" => "$xMun2",
						"UF_pessoas_lf" => "$UF2",
						"CEP_pessoas_lf" => "$CEP2",
						"cPais_pessoas_lf" => "$cPais2",
						"xPais_pessoas_lf" => "$xPais2",
						"fone_pessoas_lf" => "$fone2",
						"indIEDest_pessoas_lf" => "$indIEDest2",
						"IE_pessoas_lf" => "$IE2"
					);

					$this->admin_model->insertId("tab_pessoas_lfs", $dataPessoaDest);
				}

				$where = array("id_xml" => $IDdoArquivo);

				foreach ($ProdutoXml as $campo) {
					$nItemPed = $campo->attributes()['nItem'];//$campo->prod->nItemPed && $campo->prod->nItemPed != 0 ? $campo->prod->nItemPed : $campo->attributes()['nItem'];
					$cProd = $campo->prod->cProd;
					$cEAN = $campo->prod->cEAN;
					$xProd = $campo->prod->xProd;
					$NCM = $campo->prod->NCM;
					$CEST = $campo->prod->CEST;
					$CFOP = $campo->prod->CFOP;
					$uCom = $campo->prod->uCom;
					$qCom = $campo->prod->qCom;
					$vUnCom = $campo->prod->vUnCom;
					$vProd = $campo->prod->vProd;
					$vFrete = $campo->prod->vFrete;
					$vDesc = $campo->prod->vDesc;
					$cEANTrib = $campo->prod->cEANTrib;
					$uTrib = $campo->prod->uTrib;
					$qTrib = $campo->prod->qTrib;
					$vUnTrib = $campo->prod->vUnTrib;
					$vSeg = $campo->prod->vSeg;
					$indTot = $campo->prod->indTot;
					$vTotTrib = $campo->imposto->vTotTrib;
					
					/* ICMS INICIO */
					$tempICMS = current($campo->imposto->ICMS);

					$orig = $tempICMS->orig;
					$CST = $tempICMS->CST ? $tempICMS->CST : $tempICMS->CSOSN;
					$modBC = $tempICMS->modBC;
					$vBC = $tempICMS->vBC;
					$pICMS = $tempICMS->pICMS;
					$vICMS = $tempICMS->vICMS;
					$vBCST = $tempICMS->vBCST;
					$pICMSST = $tempICMS->pICMSST;
					$vICMSST = $tempICMS->vICMSST;

					$vBCSTRet = $tempICMS->vBCSTRet;
					$pST = $tempICMS->pST;
					$vICMSSubstituto = $tempICMS->vICMSSubstituto;
					$vICMSSTRet = $tempICMS->vICMSSTRet;
					
					$pRedBC = $tempICMS->pRedBC;
					$vFCPST = $tempICMS->vFCPST;
					/* ICMS FIM */

					$cEnq = $campo->imposto->IPI->cEnq;
					$CST_IPI = (isset($campo->imposto->IPI->IPITrib->CST)) ? $campo->imposto->IPI->IPITrib->CST : "";
					$vBC_IPI = (isset($campo->imposto->IPI->IPITrib->vBC)) ? $campo->imposto->IPI->IPITrib->vBC : "";
					$pIPI = (isset($campo->imposto->IPI->IPITrib->pIPI)) ? $campo->imposto->IPI->IPITrib->pIPI : "";
					$vIPI = (isset($campo->imposto->IPI->IPITrib->vIPI)) ? $campo->imposto->IPI->IPITrib->vIPI : "";

					$CST_PIS = (isset($campo->imposto->PIS->PISAliq->CST)) ? $campo->imposto->PIS->PISAliq->CST : "";
					$vBC_PIS = (isset($campo->imposto->PIS->PISAliq->vBC)) ? $campo->imposto->PIS->PISAliq->vBC : "";
					$pPIS = (isset($campo->imposto->PIS->PISAliq->pPIS)) ? $campo->imposto->PIS->PISAliq->pPIS : "";
					$vPIS = (isset($campo->imposto->PIS->PISAliq->vPIS)) ? $campo->imposto->PIS->PISAliq->vPIS : "";

					$CST_COFINS = (isset($campo->imposto->COFINS->COFINSAliq->CST)) ? $campo->imposto->COFINS->COFINSAliq->CST : "";
					$vBC_COFINS = (isset($campo->imposto->COFINS->COFINSAliq->vBC)) ? $campo->imposto->COFINS->COFINSAliq->vBC : "";
					$pCOFINS = (isset($campo->imposto->COFINS->COFINSAliq->pCOFINS)) ? $campo->imposto->COFINS->COFINSAliq->pCOFINS : "";
					$vCOFINS = (isset($campo->imposto->COFINS->COFINSAliq->vCOFINS)) ? $campo->imposto->COFINS->COFINSAliq->vCOFINS : "";

					$infAdProd = $campo->infAdProd;

					$dataProduto = array(
						"id_xml" => $IDdoArquivo,
						"id_nfe_lancada" => "$IdNFe",
						"nItemPed" => "$nItemPed",
						"cProd" => "$cProd",
						"cEAN" => "$cEAN",
						"xProd" => "$xProd",
						"NCM" => "$NCM",
						"CFOP" => "$CFOP",
						"uCom" => "$uCom",
						"qCom" => "$qCom",
						"vUnCom" => "$vUnCom",
						"vProd" => "$vProd",
						"cEANTrib" => "$cEANTrib",
						"uTrib" => "$uTrib",
						"qTrib" => "$qTrib",
						"vUnTrib" => json_decode($vUnTrib),
						"vSeg" => json_decode($vSeg),
						"indTot" => json_decode($indTot),
						"vTotTrib" => json_decode($vTotTrib),
						"ICMS_orig" => "$orig",
						"ICMS_CST" => "$CST",
						"ICMS_modBC" => json_decode($modBC),
						"ICMS_vBC" => json_decode($vBC),
						"ICMS_pICMS" => json_decode($pICMS),
						"ICMS_vICMS" => json_decode($vICMS),
						"ICMS_vBCST" => json_decode($vBCST),
						"ICMS_pICMSST" => json_decode($pICMSST),
						"ICMS_vICMSST" => json_decode($vICMSST),
						
						"vBCSTRet" => json_decode($vBCSTRet),
						"pST" => json_decode($pST),
						"vICMSSubstituto" => json_decode($vICMSSubstituto),
						"vICMSSTRet" => json_decode($vICMSSTRet),

						"IPI_cEnq" => json_decode($cEnq),
						"IPI_CST" => "$CST_IPI",
						"IPI_vBC" => json_decode($vBC_IPI),
						"IPI_pIPI" => json_decode($pIPI),
						"IPI_vIPI" => json_decode($vIPI),
						"PIS_CST" => "$CST_PIS",
						"PIS_vBC" => json_decode($vBC_PIS),
						"PIS_pPIS" => json_decode($pPIS),
						"PIS_vPIS" => json_decode($vPIS),
						"COFINS_CST" => "$CST_COFINS",
						"COFINS_vBC" => json_decode($vBC_COFINS),
						"COFINS_pCOFINS" => json_decode($pCOFINS),
						"COFINS_vCOFINS" => json_decode($vCOFINS),
						"infAdProd" => "$infAdProd",
						"cfop_ajust" => $this->MudaCFOP($campo->prod->CFOP, (substr($CNPJ, 0, -6) == substr($empresa_logada->cpf_cnpj_emp_lf, 0, -6)) ? "S" : "E"),
						"vFrete" => $vFrete ? "$vFrete" : 0,
						"vDesc" => ($vDesc) ? "$vDesc" : 0,
						"pRedBC" => ($pRedBC) ? "$pRedBC" : 0,
						"vFCPST" => ($vFCPST) ? "$vFCPST" : 0,
					);

					$whereProd = array("id_xml" => $IDdoArquivo, "cProd" => "$cProd");
					// Verifica existencia do item
					$whereExt = array(
						"id_nfe_lancada" => (String) $IdNFe,
						"nItemPed" => $nItemPed,
						"cProd" => (String) $cProd,
						"xProd" => (String) $xProd,
					);
					
					$item = $this->relatorios_model->CarregaRegistrosWhere($whereExt, 'tab_prod_lf');

					if(count($item) == 0) {
						$SalvarProd = true;
					} else {
						foreach($item as $ky => $it) {
							//Deletar produtos repetidos
							if($ky != 0)
								$this->admin_model->delete_where(array("id_prod_lf" => $it->id_prod_lf), "tab_prod_lf");
						}
						$SalvarProd = false;
					}

					// Fim da verificação
					if(!$sync || $SalvarProd)
						$this->admin_model->insertId("tab_prod_lf", $dataProduto);
					else
						$this->admin_model->AtualizaRegistro($whereProd, "tab_prod_lf", $dataProduto);					
				}
				
				$mod_xml = $arqvxml->NFe->infNFe->ide->mod;
				$serie_xml = $arqvxml->NFe->infNFe->ide->serie;
				
				$data = array("lancada_xml" => 2, "tipo_nota" => (substr($CNPJ, 0, -6) == substr($empresa_logada->cpf_cnpj_emp_lf, 0, -6)) ? "S" : "E", "mod_xml" => $mod_xml, "serie_xml" => $serie_xml);
				
				$id = $this->admin_model->AtualizaRegistro($where, "tab_cad_xml", $data);
				
				if(!$sync) {
					if ($id) {
						$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>Seu registro foi incluido com sucesso!</strong></div>");
					} else {
						$this->session->set_flashdata('erro', "<div class='alert alert-danger' role='alert'><strong>Seu registro não foi incluido!</strong></div>");
					}
					
				}

				return true;

			} else {
				if(!$VerificaNotaDaEmpresa)
					$this->session->set_flashdata('erro', "<div class='alert alert-danger' role='alert'><strong>Alguma(s) nota(s) não foi(ram) incluída(s), pois não faz(em) parte da empresa logada!</strong></div>");
				else
					$this->session->set_flashdata('erro', "<div class='alert alert-danger' role='alert'><strong>Alguma(s) nota(s) não foi(ram) incluída(s), pois já havia sido feito anteriormente!</strong></div>");
			}

			if ($mult == false) {
				redirect("livros_controle/importXml");
			}
			

		}

		function MudaCFOP($cfop, $tipo = null) {
			if($tipo != "S" || $tipo = null)
				if (substr($cfop, 0, -3) == 6) $cfop = "2" . substr($cfop, 1, 3); else if (substr($cfop, 0, -3) == 5) $cfop = "1" . substr($cfop, 1, 3); else $cfop = null;

			return $cfop;
		}

		function tabelaXmls($pCNPJ = null) {
			$daDosEmpresa = $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf", $this->session->userdata('id_empr'));
			$pCNPJ = $pCNPJ ? $pCNPJ : $daDosEmpresa->cpf_cnpj_emp_lf;
			
			$data = array(
				"id_empr" => $this->session->userdata('id_empr'),
				"ListaXmls" => $this->admin_model->CarregaTabXml($this->session->userdata('id_empr'), $pCNPJ),
				"filiais" => $this->relatorios_model->CarregaRegistrosWhere(array("id_emp" => $this->session->userdata('id_empr')), "tab_filial"),
				"filialSelected" => $pCNPJ
			);
			
			$this->load->view("tabelaXmls", $data);

		}

		function cadastrosXml() {
			$data = array(
				"id_empr" => $this->session->userdata('id_empr'),
				"ListaProds" => $this->admin_model->CarregaProds(),
				"ListaUFs" => $this->admin_model->Lista("estados"),
				"ListaPessoas" => $this->admin_model->Lista("tab_pessoas_lfs"),
				'CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf", $this->session->userdata('id_empr'))
			);

			$this->load->view("cadastrosXml", $data);

		}

		function SalvaXML(){
			$dados = array(
				'nom_xml' => $this->input->post('nom_xml'),
				'id_empr' => $this->session->userdata('id_empr'),
				'tipo_nota' => $this->input->post('tipo_nota'),
				'mod_xml' => $this->input->post('mod_xml'),
				'serie_xml' => $this->input->post('serie_xml'),
				'lancada_xml' => 2,
			);

			$id_xml = $this->admin_model->insertId('tab_cad_xml', $dados);

			$dados2 = array(
				'id_xml' => $id_xml,
				'IdNFe_nfe' => $this->input->post('IdNFe_nfe'),
				'cUF_nfe' => $this->input->post('cUF_nfe'),
				'cNF_nfe' => $this->input->post('cNF_nfe'),
				'nNF_nfe' => $this->input->post('nNF_nfe'),
				'dhEmi_nfe' => implode('-', array_reverse(explode('/', $this->input->post('dhEmi_nfe')))),
				'emit_CNPJ_nfe' => $this->input->post('emit_CNPJ_nfe'),
				'dest_CNPJ_nfe' => $this->input->post('dest_CNPJ_nfe'),
				'vBC_nfe' => $this->input->post('vBC_nfe'),
				'vICMS_nfe' => $this->input->post('vICMS_nfe'),
				'vICMSDeson_nfe' => $this->input->post('vICMSDeson_nfe'),
				'vFCP_nfe' => $this->input->post('vFCP_nfe'),
				'vBCST_nfe' => $this->input->post('vBCST_nfe'),
				'vST_nfe' => $this->input->post('vST_nfe'),
				'vFCPST_nfe' => $this->input->post('vFCPST_nfe'),
				'vFCPSTRet_nfe' => $this->input->post('vFCPSTRet_nfe'),
				'vProd_nfe' => $this->input->post('vProd_nfe'),
				'vFrete_nfe' => $this->input->post('vFrete_nfe'),
				'vSeg_nfe' => $this->input->post('vSeg_nfe'),
				'vDesc_nfe' => $this->input->post('vDesc_nfe'),
				'vII_nfe' => $this->input->post('vII_nfe'),
				'vIPI_nfe' => $this->input->post('vIPI_nfe'),
				'vIPIDevol_nfe' => $this->input->post('vIPIDevol_nfe'),
				'vCOFINS_nfe' => $this->input->post('vCOFINS_nfe'),
				'vPIS_nfe' => $this->input->post('vPIS_nfe'),
				'vOutro_nfe' => $this->input->post('vOutro_nfe'),
				'vNF_nfe' => $this->input->post('vNF_nfe'),
				'vTotTrib_nfe' => $this->input->post('vTotTrib_nfe'),
				'transp_CNPJ_nfe' => $this->input->post('transp_CNPJ_nfe'),
				'cobr_fat_nFat_nfe' => $this->input->post('cobr_fat_nFat_nfe'),
				'cobr_fat_vOrig_nfe' => $this->input->post('cobr_fat_vOrig_nfe'),
				'cobr_fat_vDesc_nfe' => $this->input->post('cobr_fat_vDesc_nfe'),
				'cobr_fat_vLiq_nfe' => $this->input->post('cobr_fat_vLiq_nfe'),
				'vPag_nfe' => $this->input->post('vPag_nfe'),
				'infAdic_nfe' => $this->input->post('infAdic_nfe')
			);

			$this->admin_model->insertId('tab_info_nfe', $dados2);

			$id_nfe_lancada = $this->input->post('IdNFe_nfe');
			$consumo_proprio = $this->input->post('consumo_proprio');
			$cProd = $this->input->post('cProd');
			$cEAN = $this->input->post('cEAN');
			$xProd = $this->input->post('xProd');
			$NCM = $this->input->post('NCM');
			$CFOP = $this->input->post('CFOP');
			$uCom = $this->input->post('uCom');
			$qCom = $this->input->post('qCom');
			$vUnCom = $this->input->post('vUnCom');
			$vProd = $this->input->post('vProd');
			$cEANTrib = $this->input->post('cEANTrib');
			$uTrib = $this->input->post('uTrib');
			$qTrib = $this->input->post('qTrib');
			$vUnTrib = $this->input->post('vUnTrib');
			$vSeg = $this->input->post('vSeg');
			$indTot = $this->input->post('indTot');
			$vTotTrib = $this->input->post('vTotTrib');
			$ICMS_orig = $this->input->post('ICMS_orig');
			$ICMS_CST = $this->input->post('ICMS_CST');
			$ICMS_modBC = $this->input->post('ICMS_modBC');
			$ICMS_vBC = $this->input->post('ICMS_vBC');
			$ICMS_pICMS = $this->input->post('ICMS_pICMS');
			$ICMS_vICMS = $this->input->post('ICMS_vICMS');
			$ICMS_vBCST = $this->input->post('ICMS_vBCST');
			$ICMS_pICMSST = $this->input->post('ICMS_pICMSST');
			$ICMS_vICMSST = $this->input->post('ICMS_vICMSST');
			$IPI_cEnq = $this->input->post('IPI_cEnq');
			$IPI_CST = $this->input->post('IPI_CST');
			$IPI_vBC = $this->input->post('IPI_vBC');
			$IPI_pIPI = $this->input->post('IPI_pIPI');
			$IPI_vIPI = $this->input->post('IPI_vIPI');
			$PIS_CST = $this->input->post('PIS_CST');
			$PIS_vBC = $this->input->post('PIS_vBC');
			$PIS_pPIS = $this->input->post('PIS_pPIS');
			$PIS_vPIS = $this->input->post('PIS_vPIS');
			$COFINS_CST = $this->input->post('COFINS_CST');
			$COFINS_vBC = $this->input->post('COFINS_vBC');
			$COFINS_pCOFINS = $this->input->post('COFINS_pCOFINS');
			$COFINS_vCOFINS = $this->input->post('COFINS_vCOFINS');
			$infAdProd = $this->input->post('infAdProd');
			$cfop_ajust = $this->input->post('cfop_ajust');
			$nItemPed = $this->input->post('nItemPed');

			for($i=0;$i<count($cProd);$i++) {

				$prod = array(
					'id_xml' => $id_xml,
					'id_nfe_lancada' => $id_nfe_lancada,
					'consumo_proprio' => $consumo_proprio[$i],
					'cProd' => $cProd[$i],
					'cEAN' => $cEAN[$i],
					'xProd' => $xProd[$i],
					'NCM' => $NCM[$i],
					'CFOP' => $CFOP[$i],
					'uCom' => $uCom[$i],
					'qCom' => $qCom[$i],
					'vUnCom' => $vUnCom[$i],
					'vProd' => $vProd[$i],
					'cEANTrib' => $cEANTrib[$i],
					'uTrib' => $uTrib[$i],
					'qTrib' => $qTrib[$i],
					'vUnTrib' => $vUnTrib[$i],
					'vSeg' => $vSeg[$i],
					'indTot' => $indTot[$i],
					'vTotTrib' => $vTotTrib[$i],
					'ICMS_orig' => $ICMS_orig[$i],
					'ICMS_CST' => $ICMS_CST[$i],
					'ICMS_modBC' => $ICMS_modBC[$i],
					'ICMS_vBC' => $ICMS_vBC[$i],
					'ICMS_pICMS' => $ICMS_pICMS[$i],
					'ICMS_vICMS' => $ICMS_vICMS[$i],
					'ICMS_vBCST' => $ICMS_vBCST[$i],
					'ICMS_pICMSST' => $ICMS_pICMSST[$i],
					'ICMS_vICMSST' => $ICMS_vICMSST[$i],
					'IPI_cEnq' => $IPI_cEnq[$i],
					'IPI_CST' => $IPI_CST[$i],
					'IPI_vBC' => $IPI_vBC[$i],
					'IPI_pIPI' => $IPI_pIPI[$i],
					'IPI_vIPI' => $IPI_vIPI[$i],
					'PIS_CST' => $PIS_CST[$i],
					'PIS_vBC' => $PIS_vBC[$i],
					'PIS_pPIS' => $PIS_pPIS[$i],
					'PIS_vPIS' => $PIS_vPIS[$i],
					'COFINS_CST' => $COFINS_CST[$i],
					'COFINS_vBC' => $COFINS_vBC[$i],
					'COFINS_pCOFINS' => $COFINS_pCOFINS[$i],
					'COFINS_vCOFINS' => $COFINS_vCOFINS[$i],
					'infAdProd' => $infAdProd[$i],
					'cfop_ajust' => $cfop_ajust[$i] ? $cfop_ajust[$i] : NULL,
					"nItemPed" => $nItemPed[$i],
				);

				$this->admin_model->insertId('tab_prod_lf', $prod);
			
			}
			
			$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>Seu registro foi incluído com sucesso!</strong></div>");
			redirect("livros_controle/tabelaXmls");
			
		}

		function deletarXmlLancado($id) {

			$where = array("id_xml" => $id);

			$data = array("lancada_xml" => 1);

			if ($this->admin_model->AtualizaRegistro($where, "tab_cad_xml", $data)) {
				$this->admin_model->delete_where($where, "tab_prod_lf");
				$this->admin_model->delete_where($where, "tab_info_nfe");

				$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>Seu registro foi excluido com sucesso!</strong></div>");
				redirect("livros_controle/tabelaXmls");
			} else {
				$this->session->set_flashdata('erro', "<div class='alert alert-danger' role='alert'><strong>Seu registro não foi excluido!</strong></div>");
				redirect("livros_controle/tabelaXmls");
			}

		}

		function contas() {

			$id_empr = $this->session->userdata('id_empr');

			$data = array("Login" => $this->login_model->CarregaDadosOnline(), "Lista" => $this->admin_model->ListaTabelas("cad_login", "id_login", "DESC"), "id_empr" => $this->session->userdata('id_empr'), "empresa" => $this->admin_model->CarregaRegistro("tab_emp_lf", $id_empr, "id_emp_lf"));

			$this->load->view("cad_usu", $data);

		}

		function ListaUsuarios() {

			$tabela = "cad_login";
			$PeloCampo = "usuario";
			$OrdenarPor = "ASC";
			$id_empr = $this->session->userdata('id_empr');

			$data = array("Login" => $this->login_model->CarregaDadosOnline(), "ListaUsuarios" => $this->admin_model->ListaTabelas($tabela, $PeloCampo, $OrdenarPor), 'titulo' => 'cad_usu', "empresa" => $this->admin_model->CarregaRegistro("tab_emp_lf", $id_empr, "id_empr"));

			$this->load->view("usuarios", $data);

		}

		function CarregaCriarUsuario() {

			$data = array("Login" => $this->login_model->CarregaDadosOnline(), 'titulo' => 'Usuário',);

			$this->load->view("cad_usu", $data);

		}

		function CriaUsuario() {

			$senha = $this->input->post("senha");

			$data = array("usuario" => $this->input->post("usuario"), "senha" => md5($senha));

			$tabela = "cad_login";

			if ($this->admin_model->insertId($tabela, $data)) {

				$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>Seu registro foi incluido com sucesso!</strong></div>");
				redirect("livros_controle/contas");

			} else {
				$this->session->set_flashdata('sucesso', "<div class='alert alert-danger' role='alert'><strong>Seu registro não foi incluido!</strong></div>");
				redirect("livros_controle/contas");
			}

		}

		function AtualizaUsuario($id) {
			$senha = $this->input->post("senha");

			$VerificaSenha = $this->session->userdata('senha');

			if ($senha == $VerificaSenha) {
				$data = array("usuario" => $this->input->post("usuario"), "senha" => $senha

				);
			} else {
				$data = array("usuario" => $this->input->post("usuario"), "senha" => md5($senha)

				);
			}

			$tabela = "cad_login";

			$id = array(

				"id_login" => $id

			);

			if ($this->admin_model->AtualizaRegistro($id, $tabela, $data)) {

				redirect("livros_controle/contas");

			}

		}

		function DeletarUsuario($id) {

			$data = array("id_login" => $id,);

			if ($this->admin_model->delete_where($data, "cad_login")) {
				redirect("livros_controle/contas");
			} else {
				$this->session->set_flashdata('sucesso', "<div class='alert alert-danger' role='alert'><strong>Seu registro não foi excluido!</strong></div>");
				redirect("livros_controle/contas");
			}


		}

		function ConsumoProprio($idXML) {

			$data["id_login"] = $this->session->userdata('id_login');
			$data["id_empr"] = $this->session->userdata('id_empr');
			$data["logEmpr"] = $this->session->userdata('id_empr');
			$data['produtosXML'] = $this->admin_model->ListaProdXml($idXML);
			$data['CFOPs'] = $this->admin_model->Lista('cfops');

			$this->load->view('ConsumoProprioXmls', $data);


		}

		function ConsumoProprioJson() {

			$id = $this->input->post("id");
			$valorAtual = $this->input->post("valorAtual");

			$registro = $this->admin_model->AtualizaRegistro(array('id_prod_lf' => $id), "tab_prod_lf", array('consumo_proprio' => ($valorAtual != 1) ? 1 : 0));

			echo json_encode($registro);

		}

		function SalvarCFOP() {

			$id = $this->input->post("id");
			$valorAtual = $this->input->post("valorAtual");

			$registro = $this->admin_model->AtualizaRegistro(array('id_prod_lf' => $id), "tab_prod_lf", array('cfop_ajust' => $valorAtual));

			echo json_encode($registro);

		}

		function CarregaRegistroUsuario() {
			$id = $this->input->post('id');
			$tabela = $this->input->post("tabela");

			$registro = $this->admin_model->CarregaRegistroUsuario($tabela, $id);

			echo json_encode($registro);

		}

		function CFOP(){

			$data = array(
				"id_login" => $this->session->userdata('id_login'),
				"id_empr" => $this->session->userdata('id_empr'),
				"logEmpr" => $this->session->userdata('id_empr'),
				"lista" => $this->admin_model->Lista("cfops")
			);

			$this->load->view("tabelaCFOP", $data);
		}

		function cadastroCFOP(){
			$id = $this->input->post("id");

			$result = $this->admin_model->CarregaRegistro("cfops", $id, "id_cfop");

			echo json_encode($result);
		}

		function cad_CFOP() {
			$a = $this->input->post("CFOP_cfop");
			$id = $this->input->post("id_cfop");

			$data = array(
				"CFOP_cfop" => $a,
			);

			if(!$id) {
				$this->admin_model->insertId("cfops", $data);
				$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>Seu registro foi incluido com sucesso!</strong></div>");
			} else {
				$where = array("id_cfop" => $id);
				$this->admin_model->AtualizaRegistro($where, "cfops", $data);
				$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>Seu registro foi alterado com sucesso!</strong></div>");
			}

			redirect("livros_controle/CFOP/");

		}

		function deletarCFOP($id) {

			$where = array("id_cfop" => $id);

			if ($this->admin_model->delete_where($where, "cfops")) {
				$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>Seu registro foi excluido com sucesso!</strong></div>");
				redirect("livros_controle/CFOP");
			}

		}

		function SINTEGRA(){
			$data = array(
				"id_login" => $this->session->userdata('id_login'),
				"id_empr" => $this->session->userdata('id_empr'),
				"logEmpr" => $this->session->userdata('id_empr'),
				"filiais" => $this->relatorios_model->CarregaRegistrosWhere(array("id_emp" => $this->session->userdata('id_empr')), "tab_filial")
			);
			
			$this->load->view("sintegra", $data);
		}
		
		function gera_sintegra() {
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = '*';
			$config['remove_spaces']        = TRUE;
			$config['overwrite']        	= TRUE;
			$config['file_name']			= 'ANEXOVII';

			$this->load->library('upload', $config);
			
			$this->upload->do_upload('userfile');
			
			$File = $this->upload->data();
			
			$userfile    = $File['file_name'];

			if(file_exists('./uploads/' . $userfile)) {
				$linhas = file('./uploads/' . $userfile);			
				foreach($linhas as $linha) {
					$tp = substr($linha, 0, 2);
					if($tp != null && $tp != '') $tipo[$tp][] = $linha;
				}
			}
	
			//Período
			$per_ini = $this->input->post('per_ini');			
			$per_fin = $this->input->post('per_fin');
			
			//Opções para tipo10
			$cod_est_arq_ele_ent = $this->input->post('cod_est_arq_ele_ent');
			$cod_nat_ope_int = $this->input->post('cod_nat_ope_int');
			$cod_fin_arq_ele = $this->input->post('cod_fin_arq_ele');
			
			//Dados do representante
			$representante = $this->input->post('representante');
			$tel_representante = $this->input->post('tel_representante');
			
			//Emitente
			$emitente = $this->input->post('emitente');
			
			//CPF / CNPJ
			$cnpj_cpf = $this->input->post('cnpj_cpf');
			
			//Dados da empresa logada
			$CarregaEmpr = $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf", $this->session->userdata('id_empr'));
			
			//Seta dados da Filial
			if($cnpj_cpf != $CarregaEmpr->cpf_cnpj_emp_lf) {
				$filial = $this->admin_model->CarregaRegistro2('tab_filial', array('id_emp' => $this->session->userdata('id_empr'), 'CNPJ_filial' => $cnpj_cpf));
				$CarregaEmpr->insc_est_emp_lf = $filial->inscricao_estadual_filial;
				$CarregaEmpr->cep_emp_lf = $filial->CEP_filial;
				$CarregaEmpr->cpf_cnpj_emp_lf = $cnpj_cpf;
			}
			
			//Dados da nota
			$dadosNota = $this->admin_model->CarregaDadosNotas($this->FormataData($per_ini), $this->FormataData($per_fin), $cnpj_cpf);
			
			//DADOS DA NOTA SERIE D
			$dadosSerieD = $this->admin_model->CarregaDadosSerieD($this->FormataData($per_ini), $this->FormataData($per_fin), $cnpj_cpf);
			
			$String = $this->tipo10($per_ini, $per_fin, $cod_est_arq_ele_ent, $cod_nat_ope_int, $cod_fin_arq_ele, $CarregaEmpr);
			$String .= "\r\n";
			$String .= $this->tipo11($representante, $tel_representante, $CarregaEmpr);
			$String .= "\r\n";
						
			for($i=0;$i<count($dadosNota);$i++) {
				if($dadosNota[$i]->mod_xml != 65) {// && $dadosNota[$i]->tipo_nota != "S"
					$CNPJ = $this->admin_model->CarregaRegistro2('tab_pessoas_lfs', array('CNPJ_pessoas_lf' => ($dadosNota[$i]->tipo_nota == "S" ? $dadosNota[$i]->dest_CNPJ_nfe : $dadosNota[$i]->emit_CNPJ_nfe) ));
					//$produtosNota = $this->admin_model->ListaProdXml($dadosNota[$i]->id_xml);
					$produtosNota = $this->admin_model->ListaProdutosNotaNoRepeat($dadosNota[$i]->id_xml);

					$String .= $this->tipo50($CNPJ, $emitente, $dadosNota[$i], $produtosNota, $CarregaEmpr);
				}
			}
			
			if(isset($tipo[50])) $String .= implode("", $tipo[50]);
			
			for($i = 0;$i<count($dadosNota);$i++) {
				if($dadosNota[$i]->mod_xml != 65 && $dadosNota[$i]->tipo_nota != "S") {
					$CNPJ = $this->admin_model->CarregaRegistro2('tab_pessoas_lfs', array('CNPJ_pessoas_lf' => ($dadosNota[$i]->tipo_nota == "S" ? $dadosNota[$i]->dest_CNPJ_nfe : $dadosNota[$i]->emit_CNPJ_nfe) ));
					$produtosNota = $this->admin_model->ListaProdutosNotaNoRepeat($dadosNota[$i]->id_xml);
				
					$String .= $this->tipo51($CNPJ, $emitente, $dadosNota[$i], $produtosNota);
				}
			}
			
			if(isset($tipo[51])) $String .= implode("", $tipo[51]);

			for($i = 0;$i<count($dadosNota);$i++) {
				if($dadosNota[$i]->mod_xml != 65) {// && $dadosNota[$i]->tipo_nota != "S"
					$produtosNota = $this->admin_model->ListaProdutosNotaNoRepeat($dadosNota[$i]->id_xml);
					$String .= $this->tipo53($dadosNota[$i], $emitente, $produtosNota, $CarregaEmpr);
				}
			}
			
			if(isset($tipo[53])) $String .= implode("", $tipo[53]);
			
			for($i = 0;$i<count($dadosNota);$i++) {
				if($dadosNota[$i]->mod_xml != 65 && $dadosNota[$i]->tipo_nota != "S") {
					$produtosNota = $this->admin_model->ListaProdutosNotaNoRepeat($dadosNota[$i]->id_xml);
					
					$String .= $this->tipo54($dadosNota[$i], $emitente, $produtosNota, $CarregaEmpr);
				}
			}
			
			if(isset($tipo[54])) $String .= implode("", $tipo[54]);
						
			if(isset($tipo[60])) $String .= implode("", $tipo[60]);
			
			//REGISTRO 61 PARA NFC-e
			for($i=0;$i<count($dadosNota);$i++) {
				if($dadosNota[$i]->mod_xml == 65 && $dadosNota[$i]->tipo_nota == "S") {
					$produtosNota = $this->admin_model->ListaProdutosNotaNoRepeat($dadosNota[$i]->id_xml);
					
					$TOTAL_BASE_ICMS = 0;
					$TOTAL_IMPOSTO = 0;
					$TOTAL_CFOP = 0;
					$ALIQ = 0;
					
					for($a = 0;$a < count($produtosNota);$a++) {
						$TOTAL_BASE_ICMS += $produtosNota[$a]->ICMS_vBC;
						$TOTAL_IMPOSTO += $produtosNota[$a]->ICMS_vICMS;
						$TOTAL_CFOP += $produtosNota[$a]->vProd;
						$ALIQ += $produtosNota[$a]->ICMS_pICMS;
					}
					
					$dadosNFC = new stdClass();
					
					$dadosNFC->dtEmissao = $dadosNota[$i]->dhEmi_nfe;
					$dadosNFC->modelo = $dadosNota[$i]->mod_xml;
					$dadosNFC->serie = 'U';
					$dadosNFC->subSerie = '';
					$dadosNFC->numInicial = $dadosNota[$i]->nNF_nfe;
					$dadosNFC->numFinal = $dadosNota[$i]->nNF_nfe;
					$dadosNFC->valorTotal = $dadosNota[$i]->situacao == "S" ? 0.00 : $TOTAL_CFOP + ($dadosNota[$i]->vOutro_nfe || $dadosNota[$i]->vOutro_nfe != 0 ? $dadosNota[$i]->vOutro_nfe : 0);
					$dadosNFC->baseICMS = $dadosNota[$i]->situacao == "S" ? 0.00 : $TOTAL_BASE_ICMS;
					$dadosNFC->valICMS = $dadosNota[$i]->situacao == "S" ? 0.00 : $TOTAL_IMPOSTO;
					$dadosNFC->baseIsentaNaoTributada = $dadosNota[$i]->situacao == "S" ? 0.00 : $dadosNota[$i]->vTotTrib_nfe;
					$dadosNFC->outrosVal = $dadosNota[$i]->situacao == "S" ? 0.00 : $dadosNota[$i]->vOutro_nfe;
					$dadosNFC->aliqICMS = $dadosNota[$i]->situacao == "S" ? 0.00 : $ALIQ;
					
					$String .= $this->tipo61($dadosNFC);
				}
			}
			//REGISTRO 61 PARA NFC-e
			
			for($i = 0;$i<count($dadosSerieD);$i++)
				$String .=  $this->tipo61($dadosSerieD[$i]);
						
			if(isset($tipo[61])) $String .= implode("", $tipo[61]);
				
			//INICIO TIPO 75
			$arr_prod 	= array();
			$cProd_Array = array();
			for($i = 0;$i < count($dadosNota);$i++) {
				if($dadosNota[$i]->mod_xml != 65 && $dadosNota[$i]->tipo_nota != "S") {
					//if($dadosNota[$i]->tipo_nota == "S") {
						$produtosNota = $this->admin_model->ListaProdutosNotaNoRepeat($dadosNota[$i]->id_xml);
						
						foreach ($produtosNota as $key => $infe) {
							$cProd = $this->limpaMascara($infe->cProd);
							if (!in_array("_" . "$cProd", $cProd_Array)) array_push($cProd_Array, "_" . "$cProd");
							
							$NCM["_" . "$cProd"] = $infe->NCM;
							$xProd["_" . "$cProd"] = trim($infe->xProd);
							$uCom["_" . "$cProd"] = $infe->uCom;
							$IPI["_" . "$cProd"] = $infe->IPI_vIPI;
							$ALIQ["_" . "$cProd"] = $infe->ICMS_pICMS;
							$pRedBC["_" . "$cProd"] = $infe->pRedBC;
							$TOTAL_BASE_ICMSST["_" . "$cProd"] = $infe->ICMS_vBCST + ((isset($TOTAL_BASE_ICMS["_" . "$cProd"])) ? $TOTAL_BASE_ICMS["_" . "$cProd"] : 0);
							
							$cProd_temp = array(
								"cProd" => $cProd,
								"NCM" => $NCM["_" . "$cProd"],
								"xProd" => $xProd["_" . "$cProd"],
								"uCom" => $uCom["_" . "$cProd"],
								"IPI" => $IPI["_" . "$cProd"],
								"ALIQ" => $ALIQ["_" . "$cProd"],
								"pRedBC" => $pRedBC["_" . "$cProd"],
								"TBIST" => $TOTAL_BASE_ICMSST["_" . "$cProd"],
								"nItemPed" => $infe->nItemPed,
							);

							array_push($arr_prod, $cProd_temp);
							$prodsIn["_" . "$cProd"][] = $cProd_temp;
							
						}
					//}
				}
			}
			
			foreach($cProd_Array as $key) {
				$_temp['cProd']		= $prodsIn[$key][0]['cProd'];
				$_temp['NCM']		= $prodsIn[$key][0]['NCM'];
				$_temp['xProd']		= $prodsIn[$key][0]['xProd'];
				$_temp['uCom']		= $prodsIn[$key][0]['uCom'];
				$_temp['IPI']		= 0;
				$_temp['ALIQ']		= 0;
				$_temp['pRedBC']	= 0;
				$_temp['TBIST']		= 0;
				$_temp['nItemPed']	= $prodsIn[$key][0]['nItemPed'];
				
				$_cProd[$key] = array();
				foreach($prodsIn[$key] as $prd) {
						$_temp['IPI']		+= $prd['IPI'];
						$_temp['ALIQ']		+= $prd['ALIQ'];
						$_temp['pRedBC']	+= $prd['pRedBC'];
						$_temp['TBIST']		+= $prd['TBIST'];
				}

				$_cProd[$key] = array_merge($_cProd[$key], $_temp);
			}
			
			$String .= $this->tipo75($per_ini, $per_fin, $_cProd);
			
			if(isset($tipo[75])) $String .= implode("", $tipo[75]);
			//FIM TIPO 75
			
			$linhas = explode("\r\n", $String);
			
			$tipoTot = array();
			for($i=0;$i < count($linhas);$i++) {
				if($linhas[$i] != "") {
					$tipoArr = substr($linhas[$i], 0, 2);
					if(isset($tipoTot[$tipoArr])) {
						$tipoTot[$tipoArr]++;
					} else {
						$tipoTot[$tipoArr] = 1;
					}
				}
			}

			$Tot99 = 0;
			foreach($tipoTot as $tipo => $totalRegistro){
				if($tipo != 10 && $tipo != 11)
					$String .= $this->tipo90($CarregaEmpr, $tipo, $totalRegistro, count($tipoTot)-1);
				$Tot99 += $totalRegistro;
			}
			
			$String .= $this->tipo99($CarregaEmpr, $Tot99+count($tipoTot)-1, count($tipoTot)-1);
			
			$filename = $this->limpaMascara(($representante ? $representante : "SINTEGRA")) . ".txt";

			$fp = fopen("SINTEGRA/" . $filename, "w+");
			$escreve = fwrite($fp, $String);
			fclose($fp);
			
			$this->session->set_flashdata('sucesso', "<div class='alert alert-success' role='alert'><strong>SINTEGRA gerado com sucesso! <a href='". base_url() ."SINTEGRA/$filename' target='_blank' >CLIQUE AQUI</a> se o download não iniciar automaticamente.</strong></div>");
			redirect("livros_controle/DownloadArquivo/$filename");
		}
		
		function tipo10($per_ini, $per_fin, $cod_est_arq_ele_ent, $cod_nat_ope_int, $cod_fin_arq_ele, $CarregaEmpr){
			$endereco = $this->buscaCEP($CarregaEmpr->cep_emp_lf);
			
			//Tipo
			$string = "10";
			//CNPJ
			$string .= $this->completaCasa($CarregaEmpr->cpf_cnpj_emp_lf, 14, "N");
			//Inscrição Estadual
			$string .= $this->completaCasa($CarregaEmpr->insc_est_emp_lf, 14, "X");
			//Nome do Contribuinte
			$string .= $this->completaCasa($CarregaEmpr->nome_emp_lf, 35, "X");
			//Município
			$string .= $this->completaCasa($endereco['cidade'], 30, "X");
			//Unidade da Federação
			$string .= $this->completaCasa($CarregaEmpr->uf_emp_lf, 2, "X");
			//Fax
			$string .= $this->completaCasa($CarregaEmpr->fax_emp_lf, 10, "N");
			//Data Inicial
			$string .= $this->completaCasa($this->LimpaFormatoData($per_ini), 8, "N");
			//Data Final
			$string .= $this->completaCasa($this->LimpaFormatoData($per_fin), 8, "N");
			//Código da identificação da estrutura do arquivo eletrônico entregue
			$string .= $this->completaCasa($cod_est_arq_ele_ent, 1, "X");
			//Código da identificação da natureza das operações informadas
			$string .= $this->completaCasa($cod_nat_ope_int, 1, "X");
			//Código da finalidade do arquivo eletrônico
			$string .= $this->completaCasa($cod_fin_arq_ele, 1, "X");
			
			return $string;
		}
		
		function tipo11($representante, $tel_representante, $CarregaEmpr){
			$endereco = $this->buscaCEP($CarregaEmpr->cep_emp_lf);
			
			//Tipo
			$string = "11";
			//Logradouro
			$string .= $this->completaCasa($endereco['logradouro'], 34, "X");
			//Numero
			$string .= $this->completaCasa($CarregaEmpr->numero_emp_lf, 5, "N");
			//Complemento
			$string .= $this->completaCasa($CarregaEmpr->compl_emp_lf, 22, "X");
			//Bairro
			$string .= $this->completaCasa($CarregaEmpr->bairro_emp_lf, 15, "X");
			//CEP
			$string .= $this->completaCasa($CarregaEmpr->cep_emp_lf, 8, "N");
			//Representante
			$string .= $this->completaCasa($representante, 28, "X");
			//Telefone representante
			$string .= $this->completaCasa($this->TiraFormato($tel_representante), 12, "N");
			
			return $string;
		}
		
		function tipo50($CNPJ, $Emitente, $dadosNota, $produtosNota, $CarregaEmpr) {
			$CFOP_Array = array();
			foreach ($produtosNota as $key => $infe) {
				//if(!$infe->ICMS_vBCST) {
					$CFOP = (($infe->cfop_ajust) ? $infe->cfop_ajust : $infe->CFOP);
					//$CFOP = $infe->CFOP;
					
					$aliqCod = (float) $infe->ICMS_pICMS;
					
					if (!in_array($CFOP . $aliqCod, $CFOP_Array)) array_push($CFOP_Array, $CFOP . $aliqCod);

					$CFOP_ar[$CFOP . $aliqCod] = $CFOP;
					$TOTAL_BASE_ICMS[$CFOP . $aliqCod] = $infe->ICMS_vBC + ((isset($TOTAL_BASE_ICMS[$CFOP . $aliqCod])) ? $TOTAL_BASE_ICMS[$CFOP . $aliqCod] : 0);
					$TOTAL_IMPOSTO[$CFOP . $aliqCod] = $infe->ICMS_vICMS + ((isset($TOTAL_IMPOSTO[$CFOP . $aliqCod])) ? $TOTAL_IMPOSTO[$CFOP . $aliqCod] : 0);
					$TOTAL_CFOP[$CFOP . $aliqCod] = $infe->vProd + ((isset($TOTAL_CFOP[$CFOP . $aliqCod])) ? $TOTAL_CFOP[$CFOP . $aliqCod] : 0);
					$ALIQ[$CFOP . $aliqCod] = $infe->ICMS_pICMS;
				//}
			}
			
			$pushArray = array();
			foreach ($CFOP_Array as $arr) {
				if(isset($TOTAL_CFOP[$arr]) && $TOTAL_CFOP[$arr]) {
					$pArray = array("CFOP" => $CFOP_ar[$arr], "TBI" => $TOTAL_BASE_ICMS[$arr], "ALIQ" => $ALIQ[$arr], "TI" => $TOTAL_IMPOSTO[$arr], "TCFOP" => $TOTAL_CFOP[$arr]);

					array_push($pushArray, $pArray);
				}
			}
			
			$string = "";
			
			for($a = 0;$a < count($pushArray);$a++){
				//Tipo
				$string .= "50";
				//CNPJ
				$string .= $this->completaCasa($CNPJ->CNPJ_pessoas_lf, 14, "N");
				//Inscrição Estadual
				$string .= $this->completaCasa((!$CNPJ->IE_pessoas_lf ? "ISENTO" : $CNPJ->IE_pessoas_lf), 14, "X");
				//Data da NOTA
				$string .= $this->completaCasa($this->TiraFormato($dadosNota->dhEmi_nfe), 8, "N");
				//Unidade da Federação
				$string .= $this->completaCasa($CNPJ->UF_pessoas_lf, 2, "X");
				//Modelo
				$string .= $this->completaCasa($dadosNota->mod_xml, 2, "N");
				//Serie
				$string .= $this->completaCasa($dadosNota->serie_xml, 3, "X");
				//Numero Nota
				$string .= $this->completaCasa($dadosNota->nNF_nfe, 6, "N");
				//CFOP
				$string .= $this->completaCasa($pushArray[$a]['CFOP'], 4, "N");
				//Emitente P-Próprio / T-Terceiros
				$string .= $this->completaCasa($Emitente, 1, "X");
				//Valor Total
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($dadosNota->situacao == "S" ? 0.00 : $pushArray[$a]['TCFOP'] + ($dadosNota->vOutro_nfe || $dadosNota->vOutro_nfe != 0 ? $dadosNota->vOutro_nfe : 0)), 13, "N");
				//Base de Cálculo do ICMS
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($dadosNota->situacao == "S" ? 0.00 : $pushArray[$a]['TBI']), 13, "N");
				//Valor do ICMS
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($dadosNota->situacao == "S" ? 0.00 : $pushArray[$a]['TI']), 13, "N");
				//Isenta ou não tributada
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($dadosNota->situacao == "S" ? 0.00 : $dadosNota->vTotTrib_nfe), 13, "N");
				//Outras
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($dadosNota->situacao == "S" ? 0.00 : $dadosNota->vOutro_nfe), 13, "N");
				//Alíquota
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($dadosNota->situacao == "S" ? 0.00 : $pushArray[$a]['ALIQ'], 2), 4, "N");
				//Situação
				$string .= $this->completaCasa($dadosNota->situacao, 1, "X");
				$string .= "\r\n";
				
			}
			
			return $string;
		}
		
		function tipo51($CNPJ, $Emitente, $dadosNota, $produtosNota) {
			$CFOP_Array = array();
			foreach ($produtosNota as $key => $infe) {
				if($infe->IPI_vBC && $infe->IPI_vBC != '0.00' && $infe->IPI_vBC != 0) {
					$CFOP = (($infe->cfop_ajust) ? $infe->cfop_ajust : $infe->CFOP);
					//$CFOP = $infe->CFOP;

					if (!in_array($CFOP, $CFOP_Array)) array_push($CFOP_Array, $CFOP);

					$TOTAL_BASE_IPI[$CFOP] = $infe->IPI_vBC + ((isset($TOTAL_BASE_IPI[$CFOP])) ? $TOTAL_BASE_IPI[$CFOP] : 0);
					$TOTAL_IMPOSTO[$CFOP] = $infe->IPI_vIPI + ((isset($TOTAL_IMPOSTO[$CFOP])) ? $TOTAL_IMPOSTO[$CFOP] : 0);
					$TOTAL_CFOP[$CFOP] = $infe->vProd + ((isset($TOTAL_CFOP[$CFOP])) ? $TOTAL_CFOP[$CFOP] : 0);
					$ALIQ[$CFOP] = $infe->IPI_pIPI;
				}
			}

			$pushArray = array();
			foreach ($CFOP_Array as $arr) {
				if(isset($TOTAL_CFOP[$arr]) && $TOTAL_CFOP[$arr]) {
					$pArray = array("CFOP" => $arr, "TBI" => $TOTAL_BASE_IPI[$arr], "ALIQ" => $ALIQ[$arr], "TI" => $TOTAL_IMPOSTO[$arr], "TCFOP" => $TOTAL_CFOP[$arr]);

					array_push($pushArray, $pArray);
				}
			}
			
			$string = "";

			for($a = 0;$a < count($pushArray);$a++){
				//Tipo
				$string .= "51";
				//CNPJ
				$string .= $this->completaCasa($CNPJ->CNPJ_pessoas_lf, 14, "N");
				//Inscrição Estadual
				$string .= $this->completaCasa((!$CNPJ->IE_pessoas_lf ? "ISENTO" : $CNPJ->IE_pessoas_lf), 14, "X");
				//Data da NOTA
				$string .= $this->completaCasa($this->TiraFormato($dadosNota->dhEmi_nfe), 8, "N");
				//Unidade da Federação
				$string .= $this->completaCasa($CNPJ->UF_pessoas_lf, 2, "X");
				//Serie
				$string .= $this->completaCasa($dadosNota->serie_xml, 3, "X");
				//Numero Nota
				$string .= $this->completaCasa($dadosNota->nNF_nfe, 6, "N");
				//CFOP
				$string .= $this->completaCasa($pushArray[$a]['CFOP'], 4, "N");
				//Valor Total
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($pushArray[$a]['TCFOP']), 13, "N");
				//Valor do IPI
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($pushArray[$a]['TI']), 13, "N");
				//Isenta ou não tributada - IPI
				$string .= $this->completaCasa($this->LimpaFormatoMoeda(0), 13, "N");
				//Outras - IPI
				$string .= $this->completaCasa($this->LimpaFormatoMoeda(0), 13, "N");
				//Brancos
				$string .= $this->completaCasa("", 20, "X");
				//Situação
				$string .= $this->completaCasa($dadosNota->situacao, 1, "X");
				$string .= "\r\n";
			}

			return $string;

		}

		function tipo53($dadosNota, $Emitente, $produtosNota, $CarregaEmpr) {
			$CFOP_Array = array();
			foreach ($produtosNota as $key => $infe) {
				if( ($infe->vICMSSTRet && $infe->vICMSSTRet != '0.00' && $infe->vICMSSTRet != 0) || ($infe->ICMS_vBCST && $infe->ICMS_vBCST != '0.00' && $infe->ICMS_vBCST != 0) ) {
					$CFOP = (($infe->cfop_ajust) ? $infe->cfop_ajust : $infe->CFOP);
					//$CFOP = $infe->CFOP;

					if (!in_array($CFOP, $CFOP_Array)) array_push($CFOP_Array, $CFOP);

					$TOTAL_BASE_ICMS[$CFOP] = ($infe->vICMSSubstituto ? $infe->vICMSSubstituto : $infe->ICMS_vBCST) + ((isset($TOTAL_BASE_ICMS[$CFOP])) ? $TOTAL_BASE_ICMS[$CFOP] : 0);
					$TOTAL_IMPOSTO[$CFOP] = $infe->ICMS_vICMSST + ((isset($TOTAL_IMPOSTO[$CFOP])) ? $TOTAL_IMPOSTO[$CFOP] : 0);
					$TOTAL_CFOP[$CFOP] = $infe->vProd + ((isset($TOTAL_CFOP[$CFOP])) ? $TOTAL_CFOP[$CFOP] : 0);
					$ALIQ[$CFOP] = $infe->ICMS_pICMSST;
					$vICMSSTRet[$CFOP] = ($infe->ICMS_vICMSST ? $infe->ICMS_vICMSST : $infe->vICMSSTRet) + ((isset($vICMSSTRet[$CFOP])) ? $vICMSSTRet[$CFOP] : 0);
				}
			}
			
			$pushArray = array();
			foreach ($CFOP_Array as $arr) {
				if(isset($TOTAL_CFOP[$arr]) && $TOTAL_CFOP[$arr]) {
					$pArray = array("CFOP" => $arr, "TBI" => $TOTAL_BASE_ICMS[$arr], "ALIQ" => $ALIQ[$arr], "TI" => $TOTAL_IMPOSTO[$arr], "TCFOP" => $TOTAL_CFOP[$arr], "vICMSSTRet" => $vICMSSTRet[$CFOP]);

					array_push($pushArray, $pArray);
				}
			}
			
			$string = "";
			$CNPJ = $this->admin_model->CarregaRegistro2('tab_pessoas_lfs', array('CNPJ_pessoas_lf' => ($dadosNota->tipo_nota == "S" ? $dadosNota->dest_CNPJ_nfe : $dadosNota->emit_CNPJ_nfe)));
			for($a = 0;$a < count($pushArray);$a++){
				//Tipo
				$string .= "53";
				//CNPJ
				$string .= $this->completaCasa($this->limpaMascara($CNPJ->CNPJ_pessoas_lf), 14, "N");
				//Inscrição Estadual
				$string .= $this->completaCasa((!$CNPJ->IE_pessoas_lf ? "ISENTO" : $CNPJ->IE_pessoas_lf), 14, "X");
				//Data da NOTA
				$string .= $this->completaCasa($this->TiraFormato($dadosNota->dhEmi_nfe), 8, "N");
				//Unidade da Federação
				$string .= $this->completaCasa($CNPJ->UF_pessoas_lf, 2, "X");
				//Modelo
				$string .= $this->completaCasa($dadosNota->mod_xml, 2, "N");
				//Serie
				$string .= $this->completaCasa($dadosNota->serie_xml, 3, "X");
				//Numero Nota
				$string .= $this->completaCasa($dadosNota->nNF_nfe, 6, "N");
				//CFOP
				$string .= $this->completaCasa($pushArray[$a]['CFOP'], 4, "N");
				//Emitente P-Próprio / T-Terceiros
				$string .= $this->completaCasa($Emitente, 1, "X");
				//Base Cálculo do ICMS Substituição Tributária
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($pushArray[$a]['TBI']), 13, "N");
				//ICMS retido
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($pushArray[$a]['vICMSSTRet']), 13, "N");
				//Despesas Acessórias
				$string .= $this->completaCasa($this->LimpaFormatoMoeda(0), 13, "N");
				//Situação
				$string .= $this->completaCasa($dadosNota->situacao, 1, "X");
				//Codigo da Antecipação
				$string .= $this->completaCasa($dadosNota->cod_antecipacao, 1, "X");
				//Brancos
				$string .= $this->completaCasa("", 29, "X");
				$string .= "\r\n";
			}
			
			return $string;
			
		}
		
		function tipo54($dadosNota, $Emitente, $produtosNota, $CarregaEmpr) {
			$string = "";
			$CNPJ = $this->admin_model->CarregaRegistro2('tab_pessoas_lfs', array('CNPJ_pessoas_lf' => ($dadosNota->tipo_nota == "S" ? $dadosNota->dest_CNPJ_nfe : $dadosNota->emit_CNPJ_nfe)));
			
			for($a = 0;$a < count($produtosNota);$a++) {
				$produtosNota[$a]->CFOP = $produtosNota[$a]->cfop_ajust ? $produtosNota[$a]->cfop_ajust : $produtosNota[$a]->CFOP;
				
				$TOTAL_BASE_ICMS = $produtosNota[$a]->ICMS_vBC;
				$TOTAL_BASE_ICMSST = $produtosNota[$a]->ICMS_vBCST;
				$TOTAL_IMPOSTO = $produtosNota[$a]->ICMS_vICMS;
				$TOTAL_CFOP = $produtosNota[$a]->vProd;
				$ALIQ = $produtosNota[$a]->ICMS_pICMS;
				$CST = (isset($produtosNota[$a]->ICMS_orig) ? $produtosNota[$a]->ICMS_orig : "") . $produtosNota[$a]->ICMS_CST;
				$IPI = $produtosNota[$a]->IPI_vIPI;
				$nItemPed = $produtosNota[$a]->nItemPed;
				$cProd = $produtosNota[$a]->cProd;
				$qCom = $produtosNota[$a]->qCom;
				$vProd = $produtosNota[$a]->vProd;
				
				//Tipo
				$string .= "54";
				//CNPJ
				$string .= $this->completaCasa($CNPJ->CNPJ_pessoas_lf, 14, "N");
				//Modelo
				$string .= $this->completaCasa($dadosNota->mod_xml, 2, "N");
				//Serie
				$string .= $this->completaCasa($dadosNota->serie_xml, 3, "X");
				//Numero Nota
				$string .= $this->completaCasa($dadosNota->nNF_nfe, 6, "N");
				//CFOP
				$string .= $this->completaCasa($produtosNota[$a]->CFOP, 4, "N");
				//CST
				$string .= $this->completaCasa($this->TiraFormato($CST), 3, "X");
				//Número do Item
				$string .= $this->completaCasa($nItemPed, 3, "N");
				//Código do Produto ou Serviço
				$string .= $this->completaCasa($this->limpaMascara($cProd), 14, "X", true);
				//Quantidade
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($qCom), 11, "N");
				//Valor do Produto
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($vProd), 12, "N");
				//Valor do Desconto/ Despesa Acessória
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($dadosNota->vDesc_nfe/count($produtosNota)), 12, "N");
				//Base de Cálculo do ICMS
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($TOTAL_BASE_ICMSST), 12, "N");
				//Base Cálculo do ICMS Substituição Tributária
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($TOTAL_BASE_ICMSST), 12, "N");
				//Valor do IPI
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($IPI), 12, "N");
				//Alíquota
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($ALIQ), 4, "N");
				$string .= "\r\n";
			}
			
			return $string;
			
		}
		
		function tipo60($nipe) {
			//Tipo
			$string = "60";
			//Mestre/Analítico/Subtipo
			$string .= $nipe;
			//Data de emissão
			
			//Número de série de fabricação
			
			//Número de ordem sequencial do equipamento
			
			//Modelo do documento fiscal
			
			//Número do contador de ordem de operação no início do dia
			
			return $string;
			
		}
		
		function tipo61($Dados) {
			//TIPO
			$string = "61";
			//BRANCOS
			$string .= $this->completaCasa("", 14, "X");
			$string .= $this->completaCasa("", 14, "X");
			//DATA DE EMISSÃO
			$string .= $this->completaCasa($this->LimpaFormatoDataAmericana($Dados->dtEmissao), 8, "N");
			//MODELO
			$string .= $this->completaCasa($Dados->modelo, 2, "N");
			//SERIE
			$string .= $this->completaCasa($Dados->serie, 3, "X");
			//SUBSERIE
			$string .= $this->completaCasa($Dados->subSerie, 2, "X");
			//NUMERO INICIAL DE ORDEM
			$string .= $this->completaCasa($Dados->numInicial, 6, "N");
			//NUMERO FINAL DE ORDEM
			$string .= $this->completaCasa($Dados->numFinal, 6, "N");
			//VALOR TOTAL
			$string .= $this->completaCasa($this->LimpaFormatoMoeda($Dados->valorTotal, 2), 13, "N");
			//BASE DE CALCULO ICMS
			$string .= $this->completaCasa($this->LimpaFormatoMoeda($Dados->baseICMS, 2), 13, "N");
			//VALOR DO ICMS
			$string .= $this->completaCasa($this->LimpaFormatoMoeda($Dados->valICMS), 12, "N");
			//ISENTA OU NÃO TRIBUTADA
			$string .= $this->completaCasa($this->LimpaFormatoMoeda($Dados->baseIsentaNaoTributada), 13, "N");
			//OUTRAS
			$string .= $this->completaCasa($this->LimpaFormatoMoeda($Dados->outrosVal), 13, "N");
			//ALIQUOTA
			$string .= $this->completaCasa($this->LimpaFormatoMoeda($Dados->aliqICMS, 2), 4, "N");
			//BRANCOS
			$string .= $this->completaCasa("", 1, "X");
			$string .= "\r\n";

			return $string;
		}

		function tipo75($per_ini, $per_fin, $pushArray){
			$string = "";
			foreach($pushArray as $_p) {
				//Tipo
				$string .= "75";
				//Data Inicial
				$string .= $this->completaCasa($this->LimpaFormatoData($per_ini), 8, "N");
				//Data Final
				$string .= $this->completaCasa($this->LimpaFormatoData($per_fin), 8, "N");			
				//Código  do Produto ou Serviço
				$string .= $this->completaCasa($this->limpaMascara($_p['cProd']), 14, "X", true);
				//Código NCM
				$string .= $this->completaCasa($_p['NCM'], 8, "X");
				//Descrição
				$string .= $this->completaCasa($_p['xProd'], 53, "X");
				//Unidade de  Medida de Comercialização
				$string .= $this->completaCasa($_p['uCom'], 6, "X");
				//Alíquota do IPI
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($_p['IPI']), 5, "N");
				//Alíquota do ICMS
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($_p['ALIQ']), 4, "N");
				//Redução da Base de Cálculo do ICMS
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($_p['pRedBC']), 5, "N");
				//Base de Cálculo do ICMS de Substituição Tributária
				$string .= $this->completaCasa($this->LimpaFormatoMoeda($_p['TBIST']), 13, "N");
				$string .= "\r\n";
				
			}
			
			return $string;
			
		}

		function tipo90($CarregaEmpr, $tipo, $totalRegistro, $total90){
			//Tipo
			$string = "90";
			//CNPJ
			$string .= $this->completaCasa($CarregaEmpr->cpf_cnpj_emp_lf, 14, "N");
			//Inscrição Estadual
			$string .= $this->completaCasa($CarregaEmpr->insc_est_emp_lf, 14, "X");
			//Tipo a ser totalizado
			$string .= $this->completaCasa($tipo, 2, "N");
			//Total de  registros
			$string .= $this->completaCasa($totalRegistro, 8, "N");
			//Completa casa com espaços
			$string .= $this->completaCasa("", 85, "X");
			//Número de registros tipo 90
			$string .= $this->completaCasa($total90, 1, "N");
			$string .= "\r\n";
			
			return $string;
		}
		
		function tipo99($CarregaEmpr, $totalRegistro, $total90){
			//Tipo 90 final
			$string = "90";
			//CNPJ
			$string .= $this->completaCasa($CarregaEmpr->cpf_cnpj_emp_lf, 14, "N");
			//Inscrição Estadual
			$string .= $this->completaCasa($CarregaEmpr->insc_est_emp_lf, 14, "X");
			//Tipo a ser totalizado
			$string .= $this->completaCasa(99, 2, "N");
			//Total de  registros
			$string .= $this->completaCasa($totalRegistro, 8, "N");
			//Completa casa com espaços
			$string .= $this->completaCasa("", 85, "X");
			//Número de registros tipo 90
			$string .= $this->completaCasa($total90, 1, "N");
			$string .= "\r\n";
			
			return $string;
		}
		
		function LimpaFormatoMoeda($moeda, $cents = 2) {
			return number_format($moeda, $cents, '', '');
		}
		
		function LimpaFormatoData($data){
			return implode('', array_reverse(explode('/', $data)));
		}

		function LimpaFormatoDataAmericana($data){
			return implode('', explode('-', $data));
		}

		function FormataData($data){
			return implode('-', array_reverse(explode('/', $data)));
		}
		
		function completaCasa($campo, $tamanho, $tipo, $Align = false) {
			$c = strlen(trim($campo));
			$string = "";
			
			for($i = 0;$i < ($tamanho-$c) && $c < $tamanho;$i++){
				$string .= $tipo == "X" ? " " : 0;
			}
			
			if($c > $tamanho && $Align == true)
				$campo = substr($campo, -($c-($c-$tamanho)), $tamanho);
			else
				$campo = substr($campo, 0, $tamanho);
			
			$return = $tipo == "X" ? $campo.$string : $string.$campo;
			
			return $return;
			
		}
		
		function removeMascara($pValor) {
			$valor = trim($pValor);
			$valor = str_replace(".", "", $valor);
			$valor = str_replace(",", "", $valor);
			$valor = str_replace("-", "", $valor);
			$valor = str_replace("/", "", $valor);
			
			return $valor;
		}
		
		function TiraFormato($dado){			
			return preg_replace('/[^0-9]/', '', (string) $dado);
		}
		
		function buscaCEP($cep){
			
			//$url = "https://viacep.com.br/ws/$cep/xml/";
			
			$cep = preg_replace('/[^0-9]/', '', (string) $cep);
			$url = "http://viacep.com.br/ws/".$cep."/json/";
			// CURL
			$ch = curl_init();
			// Disable SSL verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			// Will return the response, if false it print the response
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			// Set the url
			curl_setopt($ch, CURLOPT_URL, $url);
			// Execute
			$result = curl_exec($ch);
			// Closing
			curl_close($ch);

			$json = json_decode($result);
			//var_dump($json);
			if(!isset($json->erro)){
				$array['uf'] = $json->uf;
				$array['cidade'] = $json->localidade;
				$array['bairro'] = $json->bairro;
				$array['logradouro'] = $json->logradouro;
			} else {
				$array='Erro';
			}
			
			return $array;
		}
		
		function AlteraSituacaoNFe(){
			$id_xml = $this->input->post('id_xml');
			$situacao = $this->input->post('campo');
			
			$result = $this->admin_model->AtualizaRegistro(array('id_xml' => $id_xml), "tab_cad_xml", array('situacao' => $situacao));
			
			echo json_encode($result);
			
		}

		function AlteraAntecipacao(){
			$id_xml = $this->input->post('id_xml');
			$cod_antecipacao = $this->input->post('campo');
			
			$result = $this->admin_model->AtualizaRegistro(array('id_xml' => $id_xml), "tab_cad_xml", array('cod_antecipacao' => $cod_antecipacao));
			
			echo json_encode($result);
			
		}
		
		function limpaMascara($valor) {
			$valor = trim($valor);
			$valor = str_replace(".", "", $valor);
			$valor = str_replace(",", "", $valor);
			$valor = str_replace("-", "", $valor);
			$valor = str_replace("/", "", $valor);
			$valor = str_replace("(", "", $valor);
			$valor = str_replace(")", "", $valor);
			$valor = str_replace("_", "", $valor);
			$valor = str_replace(" ", "", $valor);
			return $valor;
		}
		
		function DownloadArquivo($filename = null) {
			//$filename =  $filename ? $filename : 'CONTABILIDADE RANIERI S_S LTDA.txt';
			$path = 'SINTEGRA/'.$filename;
			
			if( $filename == '' ){
				$filename = basename( $path );
			}
			
			header("Content-Type: application/force-download");
			header("Content-type: application/octet-stream;");
			header("Content-Length: " . filesize( $path ) );
			header("Content-disposition: attachment; filename=" . $filename );
			header("Pragma: no-cache");
			header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
			header("Expires: 0");
			readfile( $path );
			flush();
			
		}

		function SerieD() {
			$data = array(
				"id_login" => $this->session->userdata('id_login'),
				"id_empr" => $this->session->userdata('id_empr'),
				"logEmpr" => $this->session->userdata('id_empr'),
				"lista" => $this->admin_model->ListaWhere("tab_serie_d", array("id_empr" => $this->session->userdata('id_empr'))),
				"filiais" => $this->relatorios_model->CarregaRegistrosWhere(array("id_emp" => $this->session->userdata('id_empr')), "tab_filial")
			);
			
			$this->load->view('SerieD', $data);
		}

		function deletarSerieD($id) {
			$data = array("id_tb_sd" => $id);

			if ($this->admin_model->delete_where($data, "tab_serie_d")) {
				$this->session->set_flashdata('msg', "<div class='alert alert-success' role='alert'><strong>Seu registro foi excluido com sucesso!</strong></div>");
				redirect("livros_controle/SerieD");
			} else {
				$this->session->set_flashdata('msg', "<div class='alert alert-danger' role='alert'><strong>Seu registro não foi excluido!</strong></div>");
				redirect("livros_controle/SerieD");
			}
		}

		function CarregaSerieD() {
			$id = $this->input->post("id");

			$result = $this->admin_model->CarregaRegistro("tab_serie_d", $id, "id_tb_sd");

			echo json_encode($result);
		}

		function cadSerieD() {
			$posts = $this->input->post();
			
			$id_tb_sd = $posts['id_tb_sd'];
			
			unset($posts['id_tb_sd']);

			foreach($posts as $key => $post) {
				$this->form_validation->set_rules($key, $key, 'required');

				if($key == 'dtEmissao')
					$data[$key] = implode('-', array_reverse(explode('/', $post)));
				else
					$data[$key] = $post;
			}
			
			if ($this->form_validation->run() != FALSE) {
				if(!$id_tb_sd) {
					$data["id_empr"] = $this->session->userdata('id_empr');

					if ($id = $this->admin_model->insertId("tab_serie_d", $data))
						$this->session->set_flashdata('msg', "<div class='alert alert-success' role='alert'><strong>Seu registro foi incluido com sucesso!</strong></div>");
					else
						$this->session->set_flashdata('msg', "<div class='alert alert-danger' role='alert'><strong>Seu registro não foi incluido!</strong></div>");
				} else {
					if ($id = $this->admin_model->AtualizaRegistro(array('id_tb_sd' => $id_tb_sd), "tab_serie_d", $data))
						$this->session->set_flashdata('msg', "<div class='alert alert-success' role='alert'><strong>Seu registro foi alterado com sucesso!</strong></div>");
					else
						$this->session->set_flashdata('msg', "<div class='alert alert-danger' role='alert'><strong>Seu registro não foi alterado!</strong></div>");
				}
			} else
				$this->session->set_flashdata('msg', "<div class='alert alert-danger' role='alert'><strong>Todos os campos devem ser preenchidos!</strong></div>");

			redirect("livros_controle/SerieD/");
		}
	}