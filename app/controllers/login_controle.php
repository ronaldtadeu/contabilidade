<?php

	class login_controle extends CI_Controller {

		public function __construct() {
			parent::__construct();
			$this->load->model('login_model');
			$this->load->model('admin_model');
		}

		function login() {
			$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|callback__check_login');

			if ($this->form_validation->run()) {
				redirect('livros_controle');
			}
			$this->index();
		}

		public function index() {
			$this->load->view('login');
		}

		function _check_login($usuario) {
			$senha = $this->input->post('senha');
			if ($senha) {

				$user = $this->login_model->get_usuario($usuario, md5($senha));
				//var_dump($user); exit;
				if ($user) {

					$array = array('id' => $user->id_login, 'usuario' => $user->usuario, 'senha' => $user->senha, 'id_empr' => $user->id_empr, 'logado' => TRUE);
					$this->session->set_userdata($array);
					return true;

				}

			}
			$this->form_validation->set_message('_check_login', "<p style='color:red;'>Usuario e/ou senha errado(s)!</p>");
			return false;
		}

		public function logout($Login) {

			switch ($Login) {
				case 1:
					$this->session->unset_userdata('usuario');
					$this->session->unset_userdata('senha');
					$this->session->unset_userdata('logado');
					$this->session->unset_userdata('id_empr');
					$this->index();
					break;
				case 2:
					$this->session->unset_userdata('logado');
					redirect('contabi_controle/login_empr');
					break;
			}
		}

		function login_empr() {

			$logEmpr = (!$this->session->userdata('id_empr')) ? 0 : $this->session->userdata('id_empr');
			$logLogin = $this->session->userdata('id');

			$data = array("id_login" => $logLogin, "lista" => $this->admin_model->Lista("tab_emp_lf"), "logEmpr" => $logEmpr);

			$this->load->view('tabelaEmpr', $data);
		}


		function loginEmprIn($id, $id_login) {

			$data = array("id_empr" => $id);
			$where = array("id_login" => $id_login);
			$array = array('id_empr' => $id,);
			$this->session->set_userdata($array);
			$id = $this->admin_model->AtualizaRegistro($where, "cad_login", $data);
			redirect('livros_controle');
		}

	}

?>
