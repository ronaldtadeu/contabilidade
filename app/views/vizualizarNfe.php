<!DOCTYPE html>
<html lang="pt-br" >

    <head >
        <meta charset="utf-8" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
        <meta name="description" content="" >
        <meta name="author" content="" >
        <title >Relatorio sistema contabil</title >
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

            th {
                font-size: 1.5em;
            }

            td {
                font-size: 1.5em;
            }

            a {
                margin-left: 1em;
                font-size: 20px;
            }

            .margen {
                padding: 2em;
                padding-top: 1em;
                margin-top: 0em;
            }

            @media print {
                body * {
                    visibility: hidden;
                }

                #printable, #printable * {
                    visibility: visible;
                }

                #printable {
                    position: fixed;
                    left: 0;
                    top: 0;
                    width: 100%;
                }

                .margen {
                    padding: 1.3em;
                    padding-top: 1em;
                    margin-top: 0em;
                }

                .cor_total {
                    background-color: #B8B7AC;
                }
            }

            .bloco-superior {
                border-width: 0.12em;
                border-style: solid;
                border-color: black;
                border-radius: 0.2em;
                margin-bottom: 0.2em;
            }

            .bloco-inferior {
                border-width: 0.12em;
                border-style: solid;
                border-color: black;
                border-radius: 0.2em;
                margin-bottom: 0.2em;
            }

            label {
                font-weight: bold;
            }

            .cor_total {
                background-color: #B8B7AC;
            }

            td {
                text-align: center;
                font-size: 1em;
            }

            tr {
                text-align: center;
                font-size: 0.8em;
            }

        </style >
		<?php
			function Mask($mask, $str) {

				$str = str_replace(" ", "", $str);

				for ($i = 0; $i < strlen($str); $i++) {
					$mask[strpos($mask, "#")] = $str[$i];
				}

				return $mask;

			}

			$cpf_cnpj = $info->CNPJ_pessoas_lf;
			$contString = strlen($cpf_cnpj);
			if ($contString == 13) {
				$mascara = mask('##.###.###/####-0#', $cpf_cnpj);
			}

			if ($contString == 11) {
				$mascara = mask('###.###.###-##', $cpf_cnpj);
			}
			if ($contString == 14) {
				$mascara = mask('##.###.###/####-##', $cpf_cnpj);
			}


		?>
    </head >

    <body >
        <a class="btn btn-success" style="color:#fff;" href="<?php echo base_url(); ?>livros_controle/tabelaXmls/" >voltar</a >
        <div id="printable" class="container-fluid margen" >
            <div class="row" >
                <div class="col-md-12" >
                    <div class="row bloco-superior" >
                        <div class="col-md-12" >
                            <div class="row" >
                                <div class="col-md-12" >
                                    <h3 >
										                  <?php echo $info->xNome_pessoas_lf; ?>
                                    </h3 >
                                    <address >
                                        <strong ><?php echo $info->xNome_pessoas_lf; ?>.</strong ><br /> <?php echo $info->xLgr_pessoas_lf; ?>, <?php echo $info->nro_pessoas_lf; ?>, <?php echo $info->xBairro_pessoas_lf; ?>
                                        <br /> <?php echo $info->xMun_pessoas_lf; ?><br />
                                        <abbr title="Phone" >P:</abbr > <?php echo $info->fone_pessoas_lf; ?>
                                    </address >
                                </div >
                            </div >
                        </div >
                    </div >
                    <div class="row bloco-inferior" >
                        <div class="col-md-6" style="border-right:0.12em solid #000;" >
                            <label style="margin-top:0.5em;" >CNPJ/CPF</label >
                            <a ><?php echo $mascara; ?></a >
                        </div >
                        <div class="col-md-6" >
                            <label >CF/DF</label >
                            <a >- NÃO POSSUI -</a >
                        </div >
                    </div >
                    <div class="row bloco-inferior" >
                        <div class="col-md-12" style="border-bottom:0.12em solid #000;" >
                            <label >Tomador de Serviço ou Destinatário</label >
                            <p ><?php echo $infoDest->xNome_pessoas_lf; ?></p >
                        </div >
                        <div class="col-md-12" style="border-bottom:0.12em solid #000;" >
                            <label >Endereço</label >
                            <p ><?php echo $infoDest->xLgr_pessoas_lf; ?>, <?php echo $infoDest->nro_pessoas_lf; ?>, <?php echo $infoDest->xBairro_pessoas_lf; ?>
                                <strong ><?php echo $infoDest->xMun_pessoas_lf; ?></strong ></p >
                        </div >
                        <div class="col-md-6" style="border-bottom:0.12em solid #000; border-right:0.12em solid #000;" >
                            <label >Cod Municipal</label >
                            <p ><?php echo $infoDest->cMun_pessoas_lf; ?></p >
                        </div >
                        <div class="col-md-3" style="border-bottom:0.12em solid #000; border-right:0.12em solid #000;" >
                            <label >Estado</label >
                            <p ><?php echo $infoDest->UF_pessoas_lf; ?></p >
                        </div >
                        <div class="col-md-3" style="border-bottom:0.12em solid #000;" >
                            <label >Cep</label >
                            <p ><?php echo $infoDest->CEP_pessoas_lf; ?></p >
                        </div >
                        <div class="col-md-4" style="border-right:0.12em solid #000;" >
                            <label >CNPJ/CPF</label >
                            <p ><?php echo $infoDest->CNPJ_pessoas_lf; ?></p >
                        </div >
                        <div class="col-md-4" style="border-right:0.12em solid #000;" >
                            <label >CF/DF</label >
                            <p >- NÃO POSSUI -</p >
                        </div >
                        <div class="col-md-4" >
                            <label >Data da Emissão</label >
                            <p ><?php echo implode("/", array_reverse(explode("-", $XML->dhEmi_nfe))); ?></p >
                        </div >
                    </div >
                    <div class="row bloco-inferior" >
                        <div class="col-md-2" style="border-right:0.12em solid #000;border-bottom:0.12em solid #000;" >
                            <label >Base de Calculo</label >
                              <p ><?php echo $infoImpst->vBC_nfe; ?></p >
                        </div >
                        <div class="col-md-2" style="border-right:0.12em solid #000;border-bottom:0.12em solid #000;" >
                            <label >Valor do ICMS</label >
                            <p ><?php echo $infoImpst->vICMS_nfe; ?></p >
                        </div >
                        <div  class="col-md-2" style="border-right:0.12em solid #000;border-bottom:0.12em solid #000;">
                          <label >Valor do ICMS desonerado</label >
                            <p ><?php echo $infoImpst->vICMSDeson_nfe; ?></p >
                        </div >
                        <div class="col-md-2" style="border-right:0.12em solid #000;border-bottom:0.12em solid #000;" >
                            <label >Valor do FCP</label >
                            <p ><?php echo $infoImpst->vFCP_nfe; ?></p >
                        </div >
                        <div class="col-md-4" style="border-right:0.12em solid #000;border-bottom:0.12em solid #000;" >
                            <label >Base de calculo CST</label >
                            <p ><?php echo $infoImpst->vBCST_nfe; ?></p >
                        </div >
                        <div class="col-md-4" style="border-right:0.12em solid #000;border-bottom:0.12em solid #000;" >
                            <label >Valor ST</label >
                            <p ><?php echo $infoImpst->vST_nfe; ?></p >
                        </div >
                        <div class="col-md-4" style="border-right:0.12em solid #000;border-bottom:0.12em solid #000;" >
                            <label >Valor FCPST</label >
                            <p ><?php echo $infoImpst->vFCPST_nfe; ?></p >
                        </div >
                        <div class="col-md-4" style="border-right:0.12em solid #000;border-bottom:0.12em solid #000;" >
                            <label >Valor FCPST Retido</label >
                            <p ><?php echo $infoImpst->vFCPSTRet_nfe; ?></p >
                        </div >
                        <div class="col-md-4" style="border-right:0.12em solid #000;border-bottom:0.12em solid #000;" >
                            <label >Valor Total dos Produtos</label >
                            <p ><?php echo $infoImpst->vProd_nfe; ?></p >
                        </div >
                        <div class="col-md-4" style="border-right:0.12em solid #000;border-bottom:0.12em solid #000;" >
                            <label >vII_nfe</label >
                            <p ><?php echo $infoImpst->vII_nfe; ?></p >
                        </div >
                        <div class="col-md-4" style="border-right:0.12em solid #000;border-bottom:0.12em solid #000;" >
                            <label >Valor do IPI</label >
                            <p ><?php echo $infoImpst->vIPI_nfe; ?></p >
                        </div >
                        <div class="col-md-4" style="border-right:0.12em solid #000;border-bottom:0.12em solid #000;" >
                            <label >Valor IPI Devolvido</label >
                            <p ><?php echo $infoImpst->vIPIDevol_nfe; ?></p >
                        </div >
                        <div class="col-md-4" style="border-right:0.12em solid #000;border-bottom:0.12em solid #000;" >
                            <label >Valor COFINS</label >
                            <p ><?php echo $infoImpst->vCOFINS_nfe; ?></p >
                        </div >
                        <div class="col-md-4" style="border-right:0.12em solid #000;border-bottom:0.12em solid #000;" >
                            <label >Valor PIS</label >
                            <p ><?php echo $infoImpst->vPIS_nfe; ?></p >
                        </div >
                        <div class="col-md-4" style="border-right:0.12em solid #000;border-bottom:0.12em solid #000;" >
                            <label >Outros Valores</label >
                            <p ><?php echo $infoImpst->vOutro_nfe; ?></p >
                        </div >
                        <div class="col-md-4" style="border-right:0.12em solid #000;border-bottom:0.12em solid #000;" >
                            <label >Valor total da Nfe</label >
                            <p ><?php echo $infoImpst->vNF_nfe; ?></p >
                        </div >
                        <div class="col-md-4" style="border-right:0.12em solid #000;border-bottom:0.12em solid #000;" >
                            <label >Valor total dos Tributos</label >
                            <p ><?php echo $infoImpst->vTotTrib_nfe; ?></p >
                        </div >
                    </div >
                    <div class="row bloco-inferior" >
                        <div class="col-md-12" >
                            <h3 class="text-center" >
                                PRODUTO E/OU SERVIÇO
                            </h3 >
                            <table class="table table-sm table-hover table-striped" >
                                <thead >
                                    <center >
                                        <tr >
                                            <th >
                                                cProd
                                            </th >
                                            <th >
                                                cEAN
                                            </th >
                                            <th >
                                                xProd
                                            </th >
                                            <th >
                                                NCM
                                            </th >
                                            <th >
                                                CFOP
                                            </th >
                                            <th >
                                                uCom
                                            </th >
                                            <th >
                                                qCom
                                            </th >
                                            <th >
                                                vUnCom
                                            </th >
                                            <th >
                                                vProd
                                            </th >
                                            <th >
                                                pICMSST
                                            </th >
                                            <th >
                                                vICMSST
                                            </th >
                                            <th >
                                                cEANTrib
                                            </th >
                                            <th >
                                                uTrib
                                            </th >
                                            <th >
                                                qTrib
                                            </th >
                                            <th >
                                                vUnTrib
                                            </th >
                                            <th >
                                                vSeg
                                            </th >
                                            <th >
                                                indTot
                                            </th >
                                        </tr >
                                </thead >
                                <tbody >
									<?php $i = 1;
										foreach ($lista as $info) { ?>
                                            <tr >
                                                <td ><?php echo $info->cProd; ?></td>
                                                <td ><?php echo $info->cEAN; ?></td>
                                                <td ><?php echo $info->xProd; ?></td>
                                                <td ><?php echo $info->NCM; ?></td>
                                                <td ><?php echo $info->CFOP; ?></td>
                                                <td ><?php echo $info->uCom; ?></td>
                                                <td ><?php echo $info->qCom; ?></td>
                                                <td ><?php echo $info->vUnCom; ?></td>
                                                <td ><?php echo $info->vProd; ?></td>
                                                <td ><?php echo $info->ICMS_pICMSST; ?></td>
                                                <td ><?php echo $info->ICMS_vICMSST; ?></td>
                                                <td ><?php echo $info->cEANTrib; ?></td>
                                                <td ><?php echo $info->uTrib; ?></td>
                                                <td ><?php echo $info->qTrib; ?></td>
                                                <td ><?php echo $info->vUnTrib; ?></td>
                                                <td ><?php echo $info->vSeg; ?></td>
                                                <td ><?php echo $info->indTot; ?></td>
                                            </tr >
											<?php $i++;
										} ?>
                                </tbody >
                            </table >

                        </div >
                    </div >
                </div >
            </div >
        </div >
        <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js" ></script >
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js" ></script >
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js" ></script >
    </body >

</html >
