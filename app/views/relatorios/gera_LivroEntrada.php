<!DOCTYPE html>
<html lang="en" >
    <head >
        <meta charset="utf-8" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
        <meta name="description" content="" >
        <meta name="author" content="" >
        <title >Escrituração fiscal</title >
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
        </style >
    </head >
    <body >
        <!-- Navigation-->
		<?php $data = array('CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf", $logEmpr));
			$this->load->view("menu_nav", $data);

			$dt_inicio = $this->input->post("dt_inicio");
			$dt_fim = $this->input->post("dt_fim");
			$tipo_nota = $this->input->post("tipo_nota");

		?>
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
                            <i class="fa fa-table" ></i > Relatório Livro de Entrada
                            <button class="btn-primary btn btn-sm" type="button" onclick="$('#formImp').submit();" >Imprimir</button >
                            <form action="<?php echo base_url("relatorios_controle/Gera_LivroEntrada/true"); ?>" method="post" id="formImp" target="_blank" >
                                <input name="dt_inicio" type="hidden" value="<?php echo $dt_inicio; ?>" />
                                <input name="dt_fim" type="hidden" value="<?php echo $dt_fim; ?>" />
                                <input name="tipo_nota" type="hidden" value="<?php echo $tipo_nota; ?>" />
                            </form >
                        </div >
                    </div >
                    <div class="card-body" >
                        <table class="table table-bordered " >
                            <tbody >
                                <tr >
                                    <td colspan="9" >
                                        <b >RELATÓRIO: LIVRO DE ENTRADA - <?php echo $periodo; ?></b ><b class="no-print" > - <?php echo $dadosEmpr->nome_emp_lf; ?></b >
                                        <b id="INC" style="background-color:red; color:#ffff; padding:5px; margin-left:10px;">NOTAS CANCELADAS:</b >
                                        <b id="INN" style="background-color:green; color:#ffff; padding:5px; margin-left:10px;">OUTRAS NOTAS:</b >
                                    </td >
                                </tr >
                            </tbody >
                        </table >
						<?php
							if (count($Xml) > 0) {
								foreach ($CFOP_Array as $cfop) {
									$TBI[$cfop] = 0;
									$TI[$cfop] = 0;
									$TCFOP[$cfop] = 0;
								}
								$TOTALNOTAS = 0;
                                $totalNotasCancel = 0;
                                $totalNotasNorm = 0;
								foreach ($Xml as $xml) {?>
                                    <?php if($xml->situacao == 'S'){$totalNotasCancel++;}else{ $totalNotasNorm++;}?>
                                    <fieldset >
                                        <legend ><?php echo $info[$xml->emit_CNPJ_nfe]->xNome_pessoas_lf; ?></legend >
                                        <table class="table table-bordered " >
                                            <tr style="font-size: 13px;" >
                                                <td >
                                                    <b >CNPJ:</b >
                                                    <br /><?php echo $info[$xml->emit_CNPJ_nfe]->CNPJ_pessoas_lf; ?>
                                                </td >
                                                <td >
                                                    <b >UF:</b >
                                                    <br /><?php echo $infoUF[$xml->id_xml]->sigla; ?>
                                                </td >
                                                <td >
                                                    <b >N° DA NOTA: </b >
                                                    <br /><?php echo $xml->nNF_nfe; ?>
                                                </td >
                                                <td >
                                                    <b >DATA:</b >
                                                    <br /><?php echo implode("/", array_reverse(explode("-", $xml->dhEmi_nfe))); ?>
                                                </td >
                                            </tr >
                                        </table >
                                        <table class="table table-bordered " >
                                            <tbody >
                                                <tr >
                                                    <td ><b >CFOP</b ></td >
                                                    <td align="right" ><b >BASE ICMS</b ></td >
                                                    <td align="right" ><b >ALIQUOTA</b ></td >
                                                    <td align="right" ><b >IMP.</b ></td >
                                                    <td align="right" colspan="4" ><b >VALOR</b ></td >
                                                </tr >
												<?php $TotalNota = 0;
													$TotalFCPST = 0;
													foreach ($pushArray[$xml->id_xml] as $key => $infe) {
														$TotalNota += $infe['TCFOP'] + $infe['TFCPST'];
														$TotalFCPST += $infe['TFCPST'];
												?>
                                                        <tr >
                                                            <td ><?php echo $infe['CFOP']; ?></td >
                                                            <td align="right" ><?php echo number_format($infe['TBI'], 2, ",", ".");
																	$TBI[$infe['CFOP']] += $xml->situacao == "S" ? 0 : $infe['TBI']; ?></td >
                                                            <td align="right" ><?php echo number_format($infe['ALIQ'], 2, ",", "."); ?></td >
                                                            <td align="right" ><?php echo number_format($infe['TI'], 2, ",", ".");
																	$TI[$infe['CFOP']] += $xml->situacao == "S" ? 0 : $infe['TI']; ?></td >
                                                            <td align="right" colspan="4" ><?php echo number_format($infe['TCFOP'], 2, ",", ".");
																	$TCFOP[$infe['CFOP']] += $xml->situacao == "S" ? 0 : $infe['TCFOP']; ?></td >
                                                        </tr >
													<?php } ?>
                                                <tr style="background: #2b669a; color: white;" >
                                                    <td ><b >CFOP</b ></td >
                                                    <td align="right" >
                                                        <b >FRETE:</b >
                                                        <br /><?php echo number_format($xml->vFrete_nfe, 2, ',', '.'); ?>
                                                    </td >
                                                    <td align="right" >
                                                        <b >VALOR ST:</b >
                                                        <br /><?php echo number_format($xml->vST_nfe, 2, ',', '.'); ?>
                                                    </td >
                                                    <td align="right" >
                                                        <b >VALOR IPI:</b >
                                                        <br /><?php echo number_format($xml->vIPI_nfe, 2, ',', '.'); ?>
                                                    </td >
													<td align="right" >
                                                        <b >VALOR FCPST:</b >
                                                        <br /><?php echo number_format($TotalFCPST, 2, ',', '.'); ?>
                                                    </td >
                                                    <td align="right" >
                                                        <b >VALOR OUTROS:</b >
                                                        <br /><?php echo number_format($xml->vOutro_nfe, 2, ',', '.'); ?>
                                                    </td >
                                                    <td align="right" >
                                                        <b >VALOR DESCONTO:</b >
                                                        <br /><?php echo number_format($xml->vDesc_nfe, 2, ',', '.'); ?>
                                                    </td >
                                                    <td align="right" ><b >TOTAL NOTA</b >
                                                        <br /><?php $TOTALNOTAS += $xml->situacao == "S" ? 0 : ($TotalNota + $xml->vST_nfe + $xml->vIPI_nfe + $xml->vOutro_nfe);
															echo number_format(($TotalNota + $xml->vST_nfe + $xml->vIPI_nfe + $xml->vOutro_nfe)-$xml->vDesc_nfe, 2, ',', '.'); ?>
                                                    </td >
                                                </tr >
                                            </tbody >
                                        </table >
                                    </fieldset >

									<?php
								}

								?>
                                <br />
                                <table class="table table-bordered" style="background: #2b669a; color: #ffffff;" >
                                    <tr >
                                        <td align="left" >
                                            <b>TOTAL DAS NOTAS: <?php echo number_format($TOTALNOTAS, 2, ',', '.'); ?></b >
                                            <b style="font-size:20px; margin-right:20px; margin-left:20px;">|</b>
                                            <b id="NC" style="background-color:red; color:#ffff; padding:5px; margin-left:10px;">NOTAS CANCELADAS:  <?php echo $totalNotasCancel;?></b >
                                            <b style="font-size:20px;">+</b>
                                            <b id="NN" style="background-color:green; color:#ffff; padding:5px;">OUTRAS NOTAS:  <?php echo $totalNotasNorm;?></b >
                                            <b style="font-size:20px;">=</b>
                                            <b style="background-color:#61b5ff; color:#ffff; padding:5px;"><?php echo count($Xml);?></b>
                                        </td >
                                    </tr >
                                </table >
                                <table class="table table-bordered " style="background: lightgrey;" >
                                    <tbody >
                                        <tr >
                                            <td colspan="9" >
                                                <b >TOTAIS POR CFOP</b >
                                            </td >
                                        </tr >
                                    </tbody >
                                </table >
                                <table class="table table-bordered" >
                                    <tbody >
                                        <tr >
                                            <td ><b >CFOP</b ></td >
                                            <td align="right" ><b >BASE ICMS</b ></td >
                                            <td align="right" ><b >IMP.</b ></td >
                                            <td align="right" ><b >VALOR</b ></td >
                                        </tr >
										<?php
											$TICMS = 0;
											$TIMP = 0;
											$TVALOR = 0;
											foreach ($CFOP_Array as $cfop) {
												$TICMS += $TBI[$cfop];
												$TIMP += $TI[$cfop];
												$TVALOR += $TCFOP[$cfop];
												?>
                                                <tr >
                                                    <td ><?php echo $cfop; ?></td >
                                                    <td align="right" ><?php echo number_format($TBI[$cfop], 2, ',', '.'); ?></td >
                                                    <td align="right" ><?php echo number_format($TI[$cfop], 2, ',', '.'); ?></td >
                                                    <td align="right" ><?php echo number_format($TCFOP[$cfop], 2, ',', '.'); ?></td >
                                                </tr >
											<?php } ?>
                                        <tr >
                                            <td ><b >TOTAIS GERAIS:</b ></td >
                                            <td align="right" >
                                                <b ><?php echo number_format($TICMS, 2, ',', '.'); ?></b ></td >
                                            <td align="right" ><b ><?php echo number_format($TIMP, 2, ',', '.'); ?></b >
                                            </td >
                                            <td align="right" >
                                                <b ><?php echo number_format($TVALOR, 2, ',', '.'); ?></b ></td >
                                        </tr >
                                    </tbody >
                                </table >
							<?php } else { ?>
                                <tr >
                                    <td align="center" colspan="9" >NÃO EXISTE REGISTROS PARA O PERÍODO SELECIONADO!</td >
                                </tr >
							<?php } ?>
                    </div >
                </div >
            </div >
            <!-- /.container-fluid-->
            <!-- /.content-wrapper-->
            <footer class="sticky-footer print" >
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
        <script>
        $( document ).ready(function() {
            var nc = $("#NC").text();
            var nn = $("#NN").text();
            
            $("#INC").text(nc);
            $("#INN").text(nn);
        });
        </script>
    </body >
</html >