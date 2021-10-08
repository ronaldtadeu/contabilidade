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
        <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js" ></script>
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js" ></script>
        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js" ></script>
        <!-- Page level plugin JavaScript-->
        <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.js" ></script>
        <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.js" ></script>
        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js" ></script>
        <!-- Custom scripts for this page-->
        <script src="<?php echo base_url(); ?>assets/js/sb-admin-datatables.min.js" ></script>
        <!-- Jquery datapicker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/Calendario/jquery-ui.css">
        <script src="<?php echo base_url(); ?>assets/Calendario/jquery-1.12.4.js" ></script>
        <script src="<?php echo base_url(); ?>assets/Calendario/jquery-ui.js" ></script>
        <script >
            $(function () {
                $(".datepicker").datepicker();
                $.datepicker.regional['pt-BR'] = {
                    closeText: 'Fechar',
                    prevText: '&#x3c;Anterior',
                    nextText: 'Pr&oacute;ximo&#x3e;',
                    currentText: 'Hoje',
                    monthNames: ['Janeiro', 'Fevereiro', 'Mar&ccedil;o', 'Abril', 'Maio', 'Junho',
                        'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
                    monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
                        'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    dayNames: ['Domingo', 'Segunda-feira', 'Ter&ccedil;a-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sabado'],
                    dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                    dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
                    weekHeader: 'Sm',
                    dateFormat: 'dd/mm/yy',
                    firstDay: 0,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: ''
                };
                $.datepicker.setDefaults($.datepicker.regional['pt-BR']);

            });
        </script>
        <style>
            table {
                font-size: 10px;
            }

            thead tr td {
                font-weight: bold;
            }

            td b {
                font-size: 12px;
            }

            fieldset {
                border: 1px solid #2b669a;
                margin-top: 12px;
            }

            legend {
                width: 450px;
                font-size: 15px;
                margin-left: 10px;
                border-radius: 10px;
                background: #2b669a;
                color: white;
                padding: 0px 5px 1px 5px;
            }
            @media print {
                * {
                    font-size: 10px;
                }
                .print {
                    display: none;
                }
                .card {
                    border: none;
                }
            }
        </style>
    </head>
    <body>
        <!-- Navigation-->
		<?php $data = array('CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf", $logEmpr));
			$this->load->view("menu_nav", $data); ?>
        <div class="content-wrapper" >
            <div class="container-fluid" >
                <!-- Breadcrumbs-->
                <ol class="breadcrumb print" >
                    <li class="breadcrumb-item" >
                        <a href="#" >Principal</a >
                    </li >
                    <li class="breadcrumb-item active" >Relatório</li >
                </ol >
                <!-- Example DataTables Card-->
                <div class="card mb-3" >
                    <div class="card-header print" >
                        <div style="font-size:140%;" >
                            <i class="fa fa-table" ></i > Relatório Entrada/Saída <button class="btn-primary btn btn-sm" onclick="window.print(); " >Imprimir</button>
                        </div >
                    </div >
                    <div class="card-body" >
                        <table class="table table-bordered " >
                            <tbody >
                                <tr >
                                    <td colspan="9" ><b ><?php echo $periodo; ?></b ><b class="no-print" > - <?php echo $dadosEmpr->nome_emp_lf; ?></b></td >
                                </tr >
                            </tbody >
                        </table >
						<?php
							if (count($Xml) > 0) {
								foreach ($Xml as $xml) { ?>
                                    <fieldset >
                                        <legend ><?php echo $info[$xml->emit_CNPJ_nfe]->xNome_pessoas_lf; ?></legend >
                                        <table class="table table-bordered " >
                                            <tr style="font-size: 13px;" >
                                                <td >
                                                    <b >CNPJ: <?php echo $info[$xml->emit_CNPJ_nfe]->CNPJ_pessoas_lf; ?></b >
                                                </td >
                                                <td ><b >N° DA NOTA: <?php echo $xml->nNF_nfe; ?></b ></td >
                                                <td >
                                                    <b >DATA: <?php echo implode("/", array_reverse(explode("-", $xml->dhEmi_nfe))); ?></b >
                                                </td >
                                            </tr >
                                        </table >
                                        <table class="table table-bordered " >
                                            <tbody >
                                                <tr >
                                                    <th ><b >vBC_nfe</b ></th >
                                                    <th ><b >vICMS_nfe</b ></th >
                                                    <th ><b >vICMSDeson_nfe</b ></th >
                                                    <th ><b >vFCP_nfe</b ></th >
                                                    <th ><b >vBCST_nfe</b ></th >
                                                    <th ><b >vST_nfe</b ></th >
                                                    <th ><b >vFCPST_nfe</b ></th >
                                                    <th ><b >vFCPSTRet_nfe</b ></th >
                                                    <th ><b >vProd_nfe</b ></th >
                                                    <th ><b >vFrete_nfe</b ></th >
                                                </tr >
                                                <tr >
                                                    <td ><?php echo $xml->vBC_nfe; ?></td >
                                                    <td ><?php echo $xml->vICMS_nfe; ?></td >
                                                    <td ><?php echo $xml->vICMSDeson_nfe; ?></td >
                                                    <td ><?php echo $xml->vFCP_nfe; ?></td >
                                                    <td ><?php echo $xml->vBCST_nfe; ?></td >
                                                    <td ><?php echo $xml->vST_nfe; ?></td >
                                                    <td ><?php echo $xml->vFCPST_nfe; ?></td >
                                                    <td ><?php echo $xml->vFCPSTRet_nfe; ?></td >
                                                    <td ><?php echo $xml->vProd_nfe; ?></td >
                                                    <td ><?php echo $xml->vFrete_nfe; ?></td >
                                                </tr >
                                                <tr >
                                                    <td colspan="10" ></td >
                                                </tr >
                                                <tr >
                                                    <th ><b >vSeg_nfe</b ></th >
                                                    <th ><b >vDesc_nfe</b ></th >
                                                    <th ><b >vII_nfe</b ></th >
                                                    <th ><b >vIPI_nfe</b ></th >
                                                    <th ><b >vIPIDevol_nfe</b ></th >
                                                    <th ><b >vCOFINS_nfe</b ></th >
                                                    <th ><b >vPIS_nfe</b ></th >
                                                    <th ><b >vOutro_nfe</b ></th >
                                                    <th ><b >vNF_nfe</b ></th >
                                                    <th ><b >vTotTrib_nfe</b ></th >
                                                </tr >
                                                <tr >
                                                    <td ><?php echo $xml->vSeg_nfe; ?></td >
                                                    <td ><?php echo $xml->vDesc_nfe; ?></td >
                                                    <td ><?php echo $xml->vII_nfe; ?></td >
                                                    <td ><?php echo $xml->vIPI_nfe; ?></td >
                                                    <td ><?php echo $xml->vIPIDevol_nfe; ?></td >
                                                    <td ><?php echo $xml->vCOFINS_nfe; ?></td >
                                                    <td ><?php echo $xml->vPIS_nfe; ?></td >
                                                    <td ><?php echo $xml->vOutro_nfe; ?></td >
                                                    <td ><?php echo $xml->vNF_nfe; ?></td >
                                                    <td ><?php echo $xml->vTotTrib_nfe; ?></td >
                                                </tr >
                                            </tbody >
                                        </table >
                                    </fieldset >
									<?php
								}
							} else { ?>
                                <tr >
                                    <td align="center" colspan="9" >NÃO EXISTE REGISTROS PARA O PERÍODO SELECIONADO!</td >
                                </tr >
							<?php } ?>
                    </div>
                </div>
            </div>
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