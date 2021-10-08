<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
        <title>Escrituração fiscal</title>
		<!-- Bootstrap core CSS-->
		<link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom fonts for this template-->
		<link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<!-- Page level plugin CSS-->
		<link href="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
		<!-- Custom styles for this template-->
		<link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">
		<style>
			.bg-blue{
				background-color:#053E69;
			}
		</style>
		<!-- Bootstrap core JavaScript-->
		<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- Core plugin JavaScript-->
		<script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
		<!-- Page level plugin JavaScript-->
		<script src="<?php echo base_url();?>assets/vendor/datatables/jquery.dataTables.js"></script>
		<script src="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
		<!-- Custom scripts for all pages-->
		<script src="<?php echo base_url();?>assets/js/sb-admin.min.js"></script>
		<!-- Custom scripts for this page-->
		<script src="<?php echo base_url();?>assets/js/sb-admin-datatables.min.js"></script>
	</head>
	<body class="fixed-nav sticky-footer bg-blue" id="page-top">
		<!-- Navigation-->
		<?php $data = array('CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf",$logEmpr)); $this->load->view("menu_nav",$data);?>
		<div class="content-wrapper">
			<div class="container-fluid">
			<?php echo $this->session->flashdata('sucesso'); ?>
				<!-- Breadcrumbs-->
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="#">Principal</a>
					</li>
					<li class="breadcrumb-item active">Tabela</li>
				</ol>
				<!-- Example DataTables Card-->
				<div class="card mb-3">
					<div class="card-header">
						<div style="font-size:140%;">
							<i class="fa fa-table"></i> Trocar empresa </div>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>ID</th>
										<th>NOME</th>
										<th>ATIVIDADE</th>
										<th>CPF/CNPJ</th>
										<th>Ações</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>ID</th>
										<th>NOME</th>
										<th>ATIVIDADE</th>
										<th>CPF/CNPJ</th>
										<th>Ações</th>
									</tr>
								</tfoot>
								<tbody>
									<?php foreach ($lista as $regis) {
										switch ($regis->ind_ati_emp_lf) {
											case '1a':
												$atividade = "Industrial ou equiparado a industrial";
												break;
											case '2a':
												$atividade = "Outros";
												break;
										}
										?>
										<tr>
											<td><?php echo $regis->id_emp_lf;?></td>
											<td><?php echo $regis->nome_emp_lf;?></td>
											<td><?php echo $atividade;?></td>
											<td><?php echo $regis->cpf_cnpj_emp_lf;?></td>
											<td style="width:18%;">
												<button onclick="location.href = '<?php echo base_url(); ?>livros_controle/AcaoTrocaEmpresa/<?php echo $regis->id_emp_lf; ?>'" type="button" class="btn <?php if($id_empr == $regis->id_emp_lf) echo "btn-success"; else echo "btn-danger"; ?>" > Selecionar </button>
											</td>
										</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /.container-fluid-->
			<!-- /.content-wrapper-->
			<footer class="sticky-footer">
				<div class="container">
					<div class="text-center">
						<small style="font-size:18px;">Todos os Direitos Reservados e Projetado por <strong><a href="http://registrosweb.com.br" style="color:#0066cc; font-size:15px;">Registros Web</a></strong></small>
					</div>
				</div>
			</footer>
			<!-- Scroll to Top Button-->
			<a class="scroll-to-top rounded" href="#page-top">
				<i class="fa fa-angle-up"></i>
			</a>
		</div>
	</body>

</html>
