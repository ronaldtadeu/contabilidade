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
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/Calendario/jquery-ui.css" >
        <script src="<?php echo base_url(); ?>assets/Calendario/jquery-1.12.4.js" ></script >
        <script src="<?php echo base_url(); ?>assets/Calendario/jquery-ui.js" ></script >
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
        </script >
        <style >
            thead tr td {
                font-weight: bold;
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

        </style >
    </head >
    <body >
        <!-- Navigation-->
		<?php $data = array('CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf", $logEmpr));	$this->load->view("menu_nav", $data); ?>
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
                            <i class="fa fa-table" ></i > Relatório Interestadual <button class="btn-primary btn btn-sm" onclick="window.print(); " >Imprimir</button>
                        </div >
                    </div >
                    <div class="card-body" >
                        <table class="table table-bordered" >
                            <thead >
                                <tr >
                                    <td colspan="9" ><b ><?php echo $periodo; ?></b ><b class="no-print" > - <?php echo $dadosEmpr->nome_emp_lf; ?></b></td >
                                </tr >
                                <tr >
                                    <td align="center" >DATA</td >
                                    <td align="left" >N° DA NOTA</td >
                                    <td align="right" >VALOR OPERAÇÃO</td >
                                    <td align="right" >ICMS CREDITO</td >
                                    <td align="right" >OP. LIQUIDA</td >
                                    <td align="right" >0,82%</td >
                                    <td align="right" >ALÍQUOTA INT.</td >
                                    <td align="right" >CRED.NOTA</td >
                                    <td align="right" >A PAGAR</td >
                                </tr >
                            </thead >
                            <tbody >
								<?php $total = 0;
									if (count($Xml) > 0) {
										foreach ($Xml as $xml) {
											$outrosValores = $xml->vOutro_nfe;
											$CalcOPT = ($info[$xml->emit_CNPJ_nfe]->opc_simples_lf == 'N' || !$info[$xml->emit_CNPJ_nfe]->opc_simples_lf) ? 0.18 : 0.06;
											$vOperacao = $totProd[$xml->id_xml]-$xml->vDesc_nfe+$xml->vFrete_nfe+$outrosValores;
											$ICMS = (($info[$xml->emit_CNPJ_nfe]->opc_simples_lf == 'N' || !$info[$xml->emit_CNPJ_nfe]->opc_simples_lf) ? ($totProdAliqICMS[$xml->id_xml]) : $vOperacao * $CalcOPT);
											$OPLiq = $vOperacao - $ICMS;
											?>
                                            <tr >
                                                <td align="center" ><?php echo implode("/", array_reverse(explode("-", $xml->dhEmi_nfe))); ?></td >
                                                <td align="left" ><?php echo $xml->nNF_nfe; ?></td >
                                                <td align="right" ><?php echo number_format($vOperacao, 2, ',', ''); ?></td >
                                                <td align="right" ><?php echo number_format($ICMS, 2, ',', ''); ?></td >
                                                <td align="right" ><?php echo number_format($OPLiq, 2, ',', ''); ?></td >
                                                <td align="right" ><?php echo number_format($vBT = ($OPLiq / 0.82), 2, ',', ''); ?></td >
                                                <td align="right" ><?php echo number_format($AliqINT = ($vBT * 0.18), 2, ',', ''); ?></td >
                                                <td align="right" ><?php echo number_format($ICMS, 2, ',', ''); ?></td >
                                                <td align="right" ><?php echo number_format($aPagar = ($AliqINT - $ICMS), 2, ',', ''); ?></td >
                                            </tr >
											<?php $total += $aPagar;
										}
									} else { ?>
                                        <tr >
                                            <td align="center" colspan="9" >NÃO EXISTE REGISTROS PARA O PERÍODO SELECIONADO!</td >
                                        </tr >
									<?php } ?>
                            </tbody >
                            <tfoot >
								<tr >
                                    <td align="center" colspan="8" ><b >TOTAL </b ></td >
                                    <td align="right" ><?php echo number_format($total, 2, ',', ''); ?></td >
                                </tr >
                            </tfoot >
                        </table >
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