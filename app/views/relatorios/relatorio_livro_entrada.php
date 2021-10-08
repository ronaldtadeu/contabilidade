<?php

function mask($val) {
    $mask = (strlen($val) > 11) ? '##.###.###/####-##' : '###.###.###-##';

    $maskared = '';
    $k = 0;
    for($i = 0; $i<=strlen($mask)-1; $i++) {
        if($mask[$i] == '#') {
            if(isset($val[$k])) $maskared .= $val[$k++];
        } else {
            if(isset($mask[$i])) $maskared .= $mask[$i];
        }
    }
    return $maskared;
}

?>
<!DOCTYPE html>
<html lang="en" >
	<head >
		<meta charset="utf-8" >
		<meta http-equiv="X-UA-Compatible" content="IE=edge" >
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
		<meta name="description" content="" >
		<meta name="author" content="" >
		<title>Escrituração fiscal</title>
		<!-- Bootstrap core CSS-->
		<link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
		<!-- Custom fonts for this template-->
		<link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" >
		<!-- Page level plugin CSS-->
		<link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet" >
		<!-- Custom styles for this template-->
		<link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet" >
		<style >
			.bg-blue {
				background-color: #053E69;
			}
		</style >
		<!-- Bootstrap core JavaScript-->
		<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js" ></script >
		<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js" ></script >
		<!-- Core plugin JavaScript-->
		<script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js" ></script >
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js" ></script >
		<!-- Page level plugin JavaScript-->
		<script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.js" ></script >
		<script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.js" ></script >
		<!-- Custom scripts for all pages-->
		<script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js" ></script >
		<!-- Custom scripts for this page-->
		<script src="<?php echo base_url(); ?>assets/js/sb-admin-datatables.min.js" ></script >
		<!-- Jquery datapicker -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/Calendario/jquery-ui.css">
		<script src="<?php echo base_url(); ?>assets/Calendario/jquery-1.12.4.js"></script>
		<script src="<?php echo base_url(); ?>assets/Calendario/jquery-ui.js"></script>
		<script>
            $( function() {
                $( ".datepicker" ).datepicker();
                $.datepicker.regional['pt-BR'] = {
                    closeText: 'Fechar',
                    prevText: '&#x3c;Anterior',
                    nextText: 'Pr&oacute;ximo&#x3e;',
                    currentText: 'Hoje',
                    monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
                        'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
                        'Jul','Ago','Set','Out','Nov','Dez'],
                    dayNames: ['Domingo','Segunda-feira','Ter&ccedil;a-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado'],
                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                    dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                    weekHeader: 'Sm',
                    dateFormat: 'dd/mm/yy',
                    firstDay: 0,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: ''};
                $.datepicker.setDefaults($.datepicker.regional['pt-BR']);

            } );
		</script>
	</head >
	<body class="fixed-nav sticky-footer bg-blue" id="page-top" >
		<!-- Navigation-->
		<?php $data = array('CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf", $logEmpr));	$this->load->view("menu_nav", $data); ?>
		<div class="content-wrapper" >
			<div class="container-fluid" >
				<?php echo $this->session->flashdata('erro'); ?>
				<!-- Breadcrumbs-->
				<ol class="breadcrumb" >
					<li class="breadcrumb-item" >
						<a href="#" >Principal</a >
					</li >
					<li class="breadcrumb-item active" >Relatório</li >
				</ol >
				<!-- Example DataTables Card-->
				<div class="card mb-3" >
					<div class="card-header" >
						<div style="font-size:140%;" >
							<i class="fa fa-table" ></i > Relatório
						</div >
					</div >
					<div class="card-body" >
						<form action="<?php echo base_url(); ?>relatorios_controle/Gera_LivroEntrada" method="post" >
							<div class="form-group" >
								<div class="form-row" >
									<div class="col-md-2" >
										<label class="col-form-label" for="dt_inicio" >Período inicial</label >
										<input id="dt_inicio" name="dt_inicio" class="form-control datepicker" value="" />
									</div >
									<div class="col-md-2" >
										<label class="col-form-label" for="dt_fim" >Período final</label >
										<input id="dt_fim" name="dt_fim" class="form-control datepicker" value="" />
									</div >
									<div class="col-md-2" >
										<label class="col-form-label" for="tipo_nota" >Tipo</label >
										<select class="form-control" name="tipo_nota" id="tipo_nota" >
											<option value="E" > Entrada </option>
											<option value="S" > Saída </option>
										</select>
									</div >
									<div class="col-sm-4" >
                                        <label class="col-form-label" for="cnpj_cpf">Filial</label>
                                        <select class="form-control" id="cnpj_cpf" name="cnpj_cpf" >
                                            <option value="" >Incluir todas</option>
                                            <optgroup label="Matriz" >
                                                <option value="<?php echo $data['CarregaEmpr']->cpf_cnpj_emp_lf; ?>" ><?php echo mask($data['CarregaEmpr']->cpf_cnpj_emp_lf); ?> - <?php echo $data['CarregaEmpr']->fantasia_emp_lf; ?></option>
                                            </optgroup>
                                            <optgroup label="Filiais" >
                                            <?php foreach($filiais as $filial) { ?>
                                                <option value="<?php echo $filial->CNPJ_filial; ?>" ><?php echo mask($filial->CNPJ_filial); ?> - <?php echo $filial->fantasia_filial; ?></option>
                                            <?php } ?>
                                            </optgroup>
                                        </select>
                                    </div>
									<div class="col-md-2" >
										<label class="col-form-label" for="estados" >UF</label >
										<select class="form-control" name="estados" id="estados" >
											<option value="" >Todos</option>
											<?php foreach($Estados as $Estados) { ?>
                                                <option value="<?php echo $Estados->codigo_ibge; ?>" ><?php echo $Estados->nome; ?></option>
                                            <?php } ?>
										</select>
									</div >
								</div >
							</div >
							<div class="row" >
								<div class="col-md-12" >
									<button id="gerar" type="submit" class="btn btn-success" >Gerar</button >
								</div >
							</div >
						</form >
					</div >
				</div >
			</div >
			<!-- /.container-fluid-->
			<!-- /.content-wrapper-->
			<footer class="sticky-footer" >
				<div class="container" >
					<div class="text-center" >
						<small style="font-size:18px;" >Todos os Direitos Reservados e Projetado por
							<strong ><a href="http://registrosweb.com.br" style="color:#0066cc; font-size:15px;" >Registros Web</a ></strong >
						</small >
					</div >
				</div >
			</footer >
			<!-- Scroll to Top Button-->
			<a class="scroll-to-top rounded" href="#page-top" >
				<i class="fa fa-angle-up" ></i >
			</a >
		</div >
	</body >
</html >
