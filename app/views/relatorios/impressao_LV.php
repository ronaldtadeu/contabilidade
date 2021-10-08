<!DOCTYPE html>
<html lang="pt" >
    <head >
        <meta charset="UTF-8" />
        <title >Impressão Livro de Entrada</title >
        <!-- Bootstrap core CSS-->
        <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" >
        <!-- Page level plugin CSS-->
        <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet" >
        <style >
            .bg-blue {
                background-color: #053E69;
            }
        </style >
        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js" ></script >
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js" ></script >
        <style >
            table {
                font-size: 10px;
            }

            thead tr td {
                font-weight: bold;
            }

            tr, td {
                margin: 0;
                padding: 0 10px;
            }

            body {
                background: rgb(204, 204, 204);
            }

            page {
                background: white;
                display: block;
                margin: 0 auto;
                margin-bottom: 0.5cm;
                box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
            }

            page[size="A4"] {
                width: 21cm;
                height: 29.65cm;
            }

            page[size="A4"][layout="landscape"] {
                width: 29.7cm;
                height: 21cm;
            }

            page[size="A3"] {
                width: 29.7cm;
                height: 42cm;
            }

            page[size="A3"][layout="landscape"] {
                width: 42cm;
                height: 29.7cm;
            }

            page[size="A5"] {
                width: 14.8cm;
                height: 21cm;
            }

            page[size="A5"][layout="landscape"] {
                width: 21cm;
                height: 14.8cm;
            }

            @media print {
                body, page {
                    margin: 0;
                    box-shadow: 0;
                }
                .print{
                    display: none;
                }
            }

            .footer {
                position: absolute;
                margin-left: 39%;
            }

        </style >
    </head >
    <body >
        <?php $cnt = 1; ?>
        <page size="A4" >
            <div class="footer" style="font-size: 12px;" >Página <?php echo $cnt++; ?></div>
            <table class="table" >
                <tbody >
                    <tr >
                        <td colspan="9" >
                            <b >
                                RELATÓRIO: LIVRO DE ENTRADA - <?php echo $periodo; ?></b ><b class="no-print" > - <?php echo $dadosEmpr->nome_emp_lf; ?>
                            </b >
                            <button class="btn-primary btn btn-sm print" onclick="window.print(); " >Imprimir</button >
                        </td >
                    </tr >
                </tbody >
            </table >
            <table style="width: 100%; border-top: solid #1d2124 2px;">
                <tbody >
					<?php
						if (count($Xml) > 0) {
						foreach ($CFOP_Array as $cfop) {
							$TBI[$cfop] = 0;
							$TI[$cfop] = 0;
							$TCFOP[$cfop] = 0;
						}
						$TOTALNOTAS = 0;
						$pag = 0;
						foreach ($Xml as $xml) {
						$pag += 4;
					?>
                    <tr style="width: 100%; border-top: solid #1d2124 2px; border-bottom: solid #1d2124 2px;" >
                        <td ><?php echo $info[$xml->emit_CNPJ_nfe]->xNome_pessoas_lf; ?></td >
                        <td >
                            <b >CNPJ:</b >
							<?php echo $info[$xml->emit_CNPJ_nfe]->CNPJ_pessoas_lf; ?>
                        </td >
                        <td >
                            <b >UF:</b >
							<?php echo $infoUF[$xml->id_xml]->sigla; ?>
                        </td >
                        <td >
                            <b >N° DA NOTA: </b >
							<?php echo $xml->nNF_nfe; ?>
                        </td >
                        <td >
                            <b >DATA:</b >
							<?php echo implode("/", array_reverse(explode("-", $xml->dhEmi_nfe))); ?>
                        </td >
                    </tr >
                    <tr >
                        <td ><b >CFOP</b ></td >
                        <td align="right" ><b >BASE ICMS</b ></td >
                        <td align="right" ><b >ALIQUOTA</b ></td >
                        <td align="right" ><b >IMP.</b ></td >
                        <td align="right" ><b >VALOR</b ></td >
                    </tr >
					<?php $TotalNota = 0; $TotalFCPST = 0;
						foreach ($pushArray[$xml->id_xml] as $key => $infe) {
							$pag += 1;
							$TotalFCPST += $infe['TFCPST'];
							$TotalNota += $infe['TCFOP'] + $infe['TFCPST']; ?>
                            <tr >
                                <td ><?php echo $infe['CFOP']; ?></td >
                                <td align="right" ><?php echo number_format($infe['TBI'], 2, ",", ".");
										$TBI[$infe['CFOP']] += $infe['TBI']; ?></td >
                                <td align="right" ><?php echo number_format($infe['ALIQ'], 2, ",", "."); ?></td >
                                <td align="right" ><?php echo number_format($infe['TI'], 2, ",", ".");
										$TI[$infe['CFOP']] += $infe['TI']; ?></td >
                                <td align="right" ><?php echo number_format($infe['TCFOP'], 2, ",", ".");
										$TCFOP[$infe['CFOP']] += $infe['TCFOP']; ?></td >
                            </tr >
						<?php } ?>
                    <tr >
                        <td ></td >
                        <td align="right" >
                            <b >FRETE:</b >
							<?php echo number_format($xml->vFrete_nfe, 2, ',', '.'); ?>
                        </td >
                        <td align="right" >
                            <b >VALOR ST:</b >
							<?php echo number_format($xml->vST_nfe, 2, ',', '.'); ?>
                        </td >
                        <td align="right" >
                            <b >VALOR IPI:</b >
							<?php echo number_format($xml->vIPI_nfe, 2, ',', '.'); ?>
                        </td >
						<td align="right" >
                            <b >VALOR FCPST:</b >
							<?php echo number_format($TotalFCPST, 2, ',', '.'); ?>
                        </td >
                        <td align="right" ><b >TOTAL NOTA:</b >
							<?php $TOTALNOTAS += $TotalNota + $xml->vST_nfe + $xml->vIPI_nfe;
								echo number_format($TotalNota + $xml->vST_nfe + $xml->vIPI_nfe, 2, ',', '.'); ?>
                        </td >
                    </tr >
                    <tr >
                        <td colspan="5" >&nbsp;</td >
                    </tr >
					<?php if ($pag > 62) { ?>
                </tbody >
            </table >
        </page >
        <page size="A4" >
            <div class="footer" style="font-size: 12px;" >Página <?php echo $cnt++; ?></div>
            <table style="width: 100%; margin-bottom: 5px;">
                <tbody >
					<tr><td colspan="5" >&nbsp;</td></tr>
			<?php $pag = 4;
				}
				} ?>
            </tbody >
            </table >
			<?php if ($pag > 55) { ?>
        </page >
        <page size="A4" >
            <div class="footer" style="font-size: 12px;" >Página <?php echo $cnt++; ?></div>
			<?php } ?>
            <table style="width: 100%; border-top: solid #1d2124 2px; border-bottom: solid 2px #1d2124;" >
                <tr >
                    <td align="left" >
                        <b >TOTAL DAS NOTAS </b ><b style="float: right;" ><?php echo number_format($TOTALNOTAS, 2, ',', '.'); ?></b >
                    </td >
                </tr >
            </table >
            <table style="width: 100%; border-bottom: solid #1d2124 2px;" >
                <tbody >
                    <tr style="border-bottom: solid 2px #1d2124;" >
                        <td ><b >TOTAIS POR CFOP</b ></td >
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
        </page >
        <!--        <page size="A4"></page>-->
        <!--        <page size="A4" layout="landscape"></page>-->
        <!--        <page size="A5"></page>-->
        <!--        <page size="A5" layout="landscape"></page>-->
        <!--        <page size="A3"></page>-->
        <!--        <page size="A3" layout="landscape"></page>-->
    </body >
</html >