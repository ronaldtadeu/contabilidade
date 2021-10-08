<!DOCTYPE html>
<html lang="en" >

    < >
        <meta charset="utf-8" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
        <meta name="description" content="" >
        <meta name="author" content="" >
        <title > Cadastro de Nota fiscal </title >
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

            .col-form-label {
                font-size: 13px;
            }

            @media only screen and (min-width: 600px) {
                .margem {
                    margin-left: -10em;
                }
            }

            @media (min-width: 1200px) {
                .modal-xl {
                    max-width: 1140px;
                }
            }

        </style >
    </head >
    <body class="fixed-nav sticky-footer bg-blue" id="page-top" >
        <!-- Navigation-->
		<?php $data = array('CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf", $id_empr));
			$this->load->view("menu_nav", $data); ?>
        <div class="content-wrapper" >
			<?php echo $this->session->flashdata('sucesso'); ?>
            <!--CAD EMPRESA-->
            <div class="FORMULARIO" id="cad_empr" >
                <div class="container" >
                    <div class="card card-register mx-auto" >
                        <div class="card-header" >Cadastro de Xml
                            <a class="btn btn-success" style="color:#fff; float:right;" href="<?php echo base_url(); ?>livros_controle/tabelaXmls/" >voltar</a >
                        </div >
                        <div class="card-body" >
                            <form enctype="multipart/form-data" method="POST" action="<?php echo base_url(); ?>livros_controle/SalvaXML/" >
                                <div class="col-md-12" >
                                    <h1 style="font-size:15px; margin-left:-1.5%;" >Cadastro de Nfe <span ><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;" ></i ></span >
                                    </h1 >
                                </div >
                                <hr />
                                <div class="form-group" >
                                    <div class="form-row" >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Identificador</label >
                                            <input type="text" class="form-control" name="nom_xml" id="nom_xml" />
                                            <small id="nom_xml" class="form-text text-muted" >Nome para identificar a nota</small >
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >ID NFe</label >
                                            <input type="text" class="form-control" name="IdNFe_nfe" id="IdNFe_nfe" aria-describedby="IdNFe_nfe_help" />
                                            <small id="IdNFe_nfe_help" class="form-text text-muted" >Exp.: NFexxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</small >
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Tipo da nota</label >
                                            <select class="form-control input-lg selectSearch" name="tipo_nota" id="tipo_nota" >
                                                <option value="E" >Entrada</option >
                                                <option value="S" >Saída</option >
                                            </select >
                                        </div >
                                    </div >
                                    <div class="form-row" >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Código da nota</label >
                                            <input type="text" class="form-control" name="cNF_nfe" id="cNF_nfe" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Número da nota</label >
                                            <input type="text" class="form-control" name="nNF_nfe" id="nNF_nfe" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >UF</label >
                                            <select class="form-control selectSearch" name="cUF_nfe" id="cUF_nfe" >
												<?php foreach ($ListaUFs as $uf) { ?>
                                                    <option value="<?php echo $uf->codigo_ibge; ?>" ><?php echo $uf->sigla . " - " . $uf->nome; ?></option >
												<?php } ?>
                                            </select >
                                        </div >
                                    </div >
                                    <div class="form-row" >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Data de Emissão</label >
                                            <input type="text" class="form-control" name="dhEmi_nfe" id="dhEmi_nfe" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Emitente</label >
                                            <select class="form-control selectSearch" name="emit_CNPJ_nfe" id="emit_CNPJ_nfe" >
												<?php foreach ($ListaPessoas as $pessoa) { ?>
                                                    <option value="<?php echo $pessoa->CNPJ_pessoas_lf; ?>" ><?php echo $pessoa->xNome_pessoas_lf; ?></option >
												<?php } ?>
                                            </select >
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Destinatário</label >
                                            <select class="form-control selectSearch" name="dest_CNPJ_nfe" id="dest_CNPJ_nfe" >
												<?php foreach ($ListaPessoas as $pessoa) { ?>
                                                    <option value="<?php echo $pessoa->CNPJ_pessoas_lf; ?>" ><?php echo $pessoa->xNome_pessoas_lf; ?></option >
												<?php } ?>
                                            </select >
                                        </div >
                                    </div >
                                </div >
                                <div class="col-md-12" >
                                    <h1 style="font-size:15px; margin-left:-1.5%;" >Valores da Nfe <span ><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;" ></i ></span >
                                    </h1 >
                                </div >
                                <hr />
                                <div class="form-group" >
                                    <div class="form-row" >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Base de Calculo</label >
                                            <input class="form-control ValoresItens" name="vBC_nfe" id="vBC_nfe" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor do ICMS</label >
                                            <input class="form-control ValoresItens" name="vICMS_nfe" id="vICMS_nfe" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor do ICMS desonerado</label >
                                            <input class="form-control ValoresItens" name="vICMSDeson_nfe" id="vICMSDeson_nfe" />
                                        </div >
                                    </div >
                                    <div class="form-row" >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor do FCP</label >
                                            <input class="form-control ValoresItens" name="vFCP_nfe" id="vFCP_nfe" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Base de calculo CST</label >
                                            <input class="form-control ValoresItens" name="vBCST_nfe" id="vBCST_nfe" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor ST</label >
                                            <input class="form-control ValoresItens" name="vST_nfe" id="vST_nfe" />
                                        </div >
                                    </div >
                                    <div class="form-row" >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor FCPST</label >
                                            <input class="form-control ValoresItens" name="vFCPST_nfe" id="vFCPST_nfe" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor FCPST Retido</label >
                                            <input class="form-control ValoresItens" name="vFCPSTRet_nfe" id="vFCPSTRet_nfe" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor Total dos Produtos</label >
                                            <input class="form-control ValoresItens" name="vProd_nfe" id="vProd_nfe" />
                                        </div >
                                    </div >
                                    <div class="form-row" >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor do frete</label >
                                            <input class="form-control ValoresItens" name="vFrete_nfe" id="vFrete_nfe" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor Total do Seguro</label >
                                            <input class="form-control ValoresItens" name="vSeg_nfe" id="vSeg_nfe" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor do Desconto</label >
                                            <input class="form-control ValoresItens" name="vDesc_nfe" id="vDesc_nfe" />
                                        </div >
                                    </div >
                                    <div class="form-row" >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor II</label >
                                            <input class="form-control ValoresItens" name="vII_nfe" id="vII_nfe" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor IPI</label >
                                            <input class="form-control ValoresItens" name="vIPI_nfe" id="vIPI_nfe" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor IPI Devolução</label >
                                            <input class="form-control ValoresItens" name="vIPIDevol_nfe" id="vIPIDevol_nfe" />
                                        </div >
                                    </div >
                                    <div class="form-row" >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor COFINS</label >
                                            <input class="form-control ValoresItens" name="vCOFINS_nfe" id="vCOFINS_nfe" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor PIS</label >
                                            <input class="form-control ValoresItens" name="vPIS_nfe" id="vPIS_nfe" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor Outros</label >
                                            <input class="form-control ValoresItens" name="vOutro_nfe" id="vOutro_nfe" />
                                        </div >
                                    </div >
                                    <div class="form-row" >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor da nota</label >
                                            <input class="form-control ValoresItens" name="vNF_nfe" id="vNF_nfe" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor total tributação</label >
                                            <input class="form-control ValoresItens" name="vTotTrib_nfe" id="vTotTrib_nfe" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Valor do pagamento</label >
                                            <input class="form-control ValoresItens" name="vPag_nfe" id="vPag_nfe" />
                                        </div >
                                    </div >
                                </div >
                                <div class="col-md-12" >
                                    <h1 style="font-size:15px; margin-left:-1.5%;" >Transportadora/Faturamento <span ><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;" ></i ></span >
                                    </h1 >
                                </div >
                                <hr />
                                <div class="form-group" >
                                    <div class="form-row" >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >CNPJ Transportadora</label >
                                            <input class="form-control" name="transp_CNPJ_nfe" id="transp_CNPJ_nfe" />
                                        </div >
                                        <div class="col-md-2" >
                                            <label class="col-form-label" >Número</label >
                                            <input class="form-control" name="cobr_fat_nFat_nfe" id="cobr_fat_nFat_nfe" />
                                            <small id="cobr_fat_vOrig_nfe" class="form-text text-muted" >Faturamento</small >
                                        </div >
                                        <div class="col-md-2" >
                                            <label class="col-form-label" >Valor de origem</label >
                                            <input class="form-control ValoresItens" name="cobr_fat_vOrig_nfe" id="cobr_fat_vOrig_nfe" />
                                            <small id="cobr_fat_vOrig_nfe" class="form-text text-muted" >Faturamento</small >
                                        </div >
                                        <div class="col-md-2" >
                                            <label class="col-form-label" >Valor do desconto</label >
                                            <input class="form-control ValoresItens" name="cobr_fat_vDesc_nfe" id="cobr_fat_vDesc_nfe" />
                                            <small id="cobr_fat_vDesc_nfe" class="form-text text-muted" >Faturamento</small >
                                        </div >
                                        <div class="col-md-2" >
                                            <label class="col-form-label" >Valor liquido</label >
                                            <input class="form-control ValoresItens" name="cobr_fat_vLiq_nfe" id="cobr_fat_vLiq_nfe" />
                                            <small id="cobr_fat_vLiq_nfe" class="form-text text-muted" >Faturamento</small >
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Informações adicionais</label >
                                            <textarea class="form-control" name="infAdic_nfe" id="infAdic_nfe" ></textarea >
                                        </div >
                                    </div >
                                </div >
                                <div class="col-md-12" >
                                    <h1 style="font-size:15px; margin-left:-1.5%;" >Incluir Produtos/Serviços<span ><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;" ></i ></span >
                                    </h1 >
                                </div >
                                <hr />
                                <div class="form-group" >
                                    <div class="form-row" >
                                        <div class="col-md-12" >
                                            <button class="btn btn-success AddInput" type="button" type="submit" >Add Produto
                                                <span ><i class="fa fa-plus-circle" style="color:greenyellow;" ></i ></span >
                                            </button >
                                        </div >
                                    </div >
                                </div >

                                <div id="Inputs" class="form-group" ></div >

                                <div class="form-group" >
                                    <div class="form-row" >
                                        <div class="col-md-2" >
                                            <button class="btn btn-primary btn-block" type="submit" >Incluir
                                                <span ><i class="fa fa-check-circle" style="color:greenyellow;" ></i ></span >
                                            </button >
                                        </div >
                                    </div >
                                </div >
                            </form >
                        </div >
                    </div >
                </div >
            </div >
            <br />
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
            <!-- Bootstrap core JavaScript-->
            <script src="https://code.jquery.com/jquery-2.1.4.min.js" integrity="sha256-8WqyJLuWKRBVhxXIL1jBDD7SDxU936oZkCnxQbWwJVw=" crossorigin="anonymous" ></script >
            <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js" ></script >
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js" ></script >
            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
            <link href="<?php echo base_url(); ?>assets/select2-bootstrap.css" rel="stylesheet" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js" ></script >
            <script src="https://cdn.rawgit.com/plentz/jquery-maskmoney/master/dist/jquery.maskMoney.min.js" ></script >
            <script type="text/javascript" >
                $(document).ready(function () {
                    $('.mascaraCNPJ').mask('99.999.999/9999-99');
                });
            </script >
            <script >
                $(document).ready(function () {
                    $(".ValoresItens").maskMoney({
                        prefix: "",
                        decimal: ".",
                        thousands: ""
                    });
                });
            </script >
            <script type="text/javascript" >
                $(document).ready(function () {

                    $('.selectSearch').val('').select2({
                        placeholder: 'Selecione uma opção',
                        theme: "bootstrap",
                        allowClear: true
                    });

                    var globCount = 0;

                    $('.AddInput').click(function () {
                        $("#Inputs").append(HTML_NovoInput(globCount));
                        $('.selectSearch:last').val('').select2({placeholder: 'Selecione uma opção', theme: "bootstrap", allowClear: true});
                        $(".ValoresItens").maskMoney({
                            prefix: "",
                            decimal: ".",
                            thousands: ""
                        });
                        globCount++;
                    });

                    function HTML_NovoInput(count) {
                        var html = '<div class="inputzada_' + count + ' form-row" style="margin-bottom: 5px; padding-bottom: 10px; border-bottom: 1px solid;" >';

                        html += '<div class="col-md-3" >';
                        html += '<label>Selecione o Produto/Serviço</label>';
                        html += "<select name='xProd' class='selectSearch form-control' OnChange='ChamaProduto(this.value," + count + ")' >";
						<?php foreach ($ListaProds as $prod ) {?>
                        html += "<option value='<?php echo $prod->Nome_nvoProds; ?>' ><?php echo $prod->Nome_nvoProds; ?> </option>";
						<?php } ?>
                        html += "<select/>";
                        html += '</div>';

                        html += '<div class="col-md-2" >';
                        html += '<label class="col-form-label" >Código produto</label >';
                        html += '<input readonly type="text" class="form-control" name="cProd[]" id="cProd_' + count + '" />';
                        html += '</div>';

                        html += '<div class="col-md-2" >';
                        html += '<label class="col-form-label" >CFOP</label >';
                        html += '<input readonly type="text" class="form-control" name="CFOP[]" id="CFOP_' + count + '" />';
                        html += '</div>';

                        html += '<div class="col-md-2" >';
                        html += '<label class="col-form-label" >NCM</label >';
                        html += '<input type="text" class="form-control" name="NCM[]" id="NCM_' + count + '" />';
                        html += '</div>';

                        html += '<div class="col-md-3 btn-prod" style="margin-top: 0.5em;" >';
                        html += '<br/>';
                        html += '<button class="btn btn-info" type="button" data-toggle="collapse" data-target=".DadosProd_' + count + '" aria-expanded="false" aria-controls="collapseExample" >Mais dados <i class="fa fa-info-circle" ></i></button>';
                        html += '&nbsp;';
                        html += '<button type="button" class="excluir btn btn-danger float-md-none" onclick="excluiInput(\'inputzada_' + count + '\')" >Excluir <i class="fa fa-trash"></i></button>';
                        html += '</div>';

                        html += '<div class="col-md-12 mt-3">';
                        html += HTMLProdutos(count);
                        html += '</div>';

                        html += '</div>';

                        return html;

                    }

                    function HTMLProdutos(count){
                        var html = '<div class="collapse DadosProd_' + count + '" >';
                            html += $('#dadosProduto').html();
                            html += '</div>';

                        return html;

                    }

                });

                function excluiInput(ref) {
                    $("." + ref).remove();
                }

                function ChamaProduto(id, count) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>livros_controle/CarregaRegistroProdsJs/',
                        type: 'POST',
                        dataType: 'json',
                        data: {id: id},
                        success: function (result) {
                            $('#cProd_' + count).val(result.codid_nvoProds);
                            $('#CFOP_' + count).val(result.CFOPestad_nvoProds);

                            $('.DadosProd_' + count + ' #consumo_proprio').val(count);

                        }
                    });
                }

            </script >
            <script type="text/javascript" >
                $(document).ready(function() {
                    $("#tipo_nota").on('change', function(){
                        var CPF_EMPRESA_LOGADA = "<?php echo $CarregaEmpr->cpf_cnpj_emp_lf; ?>";
                        if($(this).val() == "E"){
                            $("#dest_CNPJ_nfe").val(CPF_EMPRESA_LOGADA).select2({
                                placeholder: 'Selecione uma opção',
                                theme: "bootstrap",
                                allowClear: true
                            });
                            $("#emit_CNPJ_nfe").val('').select2({
                                placeholder: 'Selecione uma opção',
                                theme: "bootstrap",
                                allowClear: true
                            });
                        } else {
                            $("#emit_CNPJ_nfe").val(CPF_EMPRESA_LOGADA).select2({
                                placeholder: 'Selecione uma opção',
                                theme: "bootstrap",
                                allowClear: true
                            });
                            $("#dest_CNPJ_nfe").val('').select2({
                                placeholder: 'Selecione uma opção',
                                theme: "bootstrap",
                                allowClear: true
                            });
                        }

                    });
                });
            </script>
        </div >

        <div id="dadosProduto" style="display: none;" >
            <div class="card card-body">
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-3" >
                            <label class="col-form-label" >CFOP AJUSTE</label >
                            <input type="text" class="form-control" name="cfop_ajust[]" id="cfop_ajust" />
                        </div>
                        <div class="col-md-3" >
                            <label class="col-form-label" >VAL. TOTAL DE TRIBUTOS</label >
                            <input type="text" class="form-control ValoresItens" name="vTotTrib[]" id="vTotTrib" />
                        </div>
                        <div class="col-md-3" >
                            <label class="col-form-label" >Consumo próprio</label >
                            <select class="form-control" name="consumo_proprio[]" id="consumo_proprio" >
                                <option value="0" >Não</option>
                                <option value="1" >Sim</option>
                            </select>
                        </div>
                        <div class="col-md-3" >
                            <label class="col-form-label" >ENTRA NO VAL. TOTAL DA NF-e</label >
                            <select class="form-control" name="indTot[]" id="indTot" >
                                <option value="1" >Compõe o valor total da NF-e</option>
                                <option value="0" >Não compõe o valor total da NF-e</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3" >
                            <label class="col-form-label" >EAN</label >
                            <input type="text" class="form-control" name="cEAN[]" id="cEAN" />
                        </div>
                        <div class="col-md-2" >
                            <label class="col-form-label" >UND. COMERCIAL</label >
                            <input type="text" class="form-control" name="uCom[]" id="uCom" />
                        </div>
                        <div class="col-md-2" >
                            <label class="col-form-label" >QTD. COMERCIAL</label >
                            <input type="text" class="form-control ValoresItens" name="qCom[]" id="qCom" />
                        </div>
                        <div class="col-md-2" >
                            <label class="col-form-label" >VAL. COMERCIAL</label >
                            <input type="text" class="form-control ValoresItens" name="vUnCom[]" id="vUnCom" />
                        </div>
                        <div class="col-md-3" >
                            <label class="col-form-label" >VAL. PRODUTO</label >
                            <input type="text" class="form-control ValoresItens" name="vProd[]" id="vProd" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3" >
                            <label class="col-form-label" >EAN TRIBUTÁRIA</label >
                            <input type="text" class="form-control" name="cEANTrib[]" id="cEANTrib" />
                        </div>
                        <div class="col-md-2" >
                            <label class="col-form-label" >UND. TRIBUTÁRIA</label >
                            <input type="text" class="form-control" name="uTrib[]" id="uTrib" />
                        </div>
                        <div class="col-md-2" >
                            <label class="col-form-label" >QTD. TRIBUTÁRIA</label >
                            <input type="text" class="form-control ValoresItens" name="qTrib[]" id="qTrib" />
                        </div>
                        <div class="col-md-2" >
                            <label class="col-form-label" >VAL. UND. TRIBUTÁRIA</label >
                            <input type="text" class="form-control ValoresItens" name="vUnTrib[]" id="vUnTrib" />
                        </div>
                        <div class="col-md-3" >
                            <label class="col-form-label" >VAL. SEGURO</label >
                            <input type="text" class="form-control ValoresItens" name="vSeg[]" id="vSeg" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3" >
                            <label class="col-form-label" >ICMS ORIGEM</label >
                            <input type="text" class="form-control" name="ICMS_orig[]" id="ICMS_orig" />
                        </div>
                        <div class="col-md-3" >
                            <label class="col-form-label" >ICMS CST</label >
                            <input type="text" class="form-control ValoresItens" name="ICMS_CST[]" id="ICMS_CST" />
                        </div>
                        <div class="col-md-3" >
                            <label class="col-form-label" >MODALIDADE DE DET. BC do ICMS</label >
                            <input type="text" class="form-control ValoresItens" name="ICMS_modBC[]" id="ICMS_modBC" />
                        </div>
                        <div class="col-md-3" >
                            <label class="col-form-label" >BASE DE CÁLCULO DO ICMS</label >
                            <input type="text" class="form-control ValoresItens" name="ICMS_vBC[]" id="ICMS_vBC" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-2" >
                            <label class="col-form-label" >ALÍQUOTA DO ICMS</label >
                            <input type="text" class="form-control ValoresItens" name="ICMS_pICMS[]" id="ICMS_pICMS" />
                        </div>
                        <div class="col-md-3" >
                            <label class="col-form-label" >VAL. ICMS</label >
                            <input type="text" class="form-control ValoresItens" name="ICMS_vICMS[]" id="ICMS_vICMS" />
                        </div>
                        <div class="col-md-3" >
                            <label class="col-form-label" >BASE DE CÁLCULO ICMSST</label >
                            <input type="text" class="form-control ValoresItens" name="ICMS_vBCST[]" id="ICMS_vBCST" />
                        </div>
                        <div class="col-md-2" >
                            <label class="col-form-label" >ALÍQUOTA DO ICMSST</label >
                            <input type="text" class="form-control ValoresItens" name="ICMS_pICMSST[]" id="ICMS_pICMSST" />
                        </div>
                        <div class="col-md-2" >
                            <label class="col-form-label" >VAL. ICMSST</label >
                            <input type="text" class="form-control ValoresItens" name="ICMS_vICMSST[]" id="ICMS_vICMSST" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3" >
                            <label class="col-form-label" >COD. DE ENQUADRAMENTO IPI</label >
                            <input type="text" class="form-control" name="IPI_cEnq[]" id="IPI_cEnq" />
                        </div>
                        <div class="col-md-3" >
                            <label class="col-form-label" >COD. SITUAÇÃO TRIBUTÁRIA IPI</label >
                            <input type="text" class="form-control" name="IPI_CST[]" id="IPI_CST" />
                        </div>
                        <div class="col-md-2" >
                            <label class="col-form-label" >BASE DE CÁLCULO IPI</label >
                            <input type="text" class="form-control ValoresItens" name="IPI_vBC[]" id="IPI_vBC" />
                        </div>
                        <div class="col-md-2" >
                            <label class="col-form-label" >ALÍQUOTA IPI</label >
                            <input type="text" class="form-control ValoresItens" name="IPI_pIPI[]" id="IPI_pIPI" />
                        </div>
                        <div class="col-md-2" >
                            <label class="col-form-label" >VAL. IPI</label >
                            <input type="text" class="form-control ValoresItens" name="IPI_vIPI[]" id="IPI_vIPI" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3" >
                            <label class="col-form-label" >PIS CST</label >
                            <input type="text" class="form-control" name="PIS_CST[]" id="PIS_CST" />
                        </div>
                        <div class="col-md-3" >
                            <label class="col-form-label" >BASE DE CÁLCULO PIS</label >
                            <input type="text" class="form-control ValoresItens" name="PIS_vBC[]" id="PIS_vBC" />
                        </div>
                        <div class="col-md-3" >
                            <label class="col-form-label" >ALÍQUOTA DO PIS</label >
                            <input type="text" class="form-control ValoresItens" name="PIS_pPIS[]" id="PIS_pPIS" />
                        </div>
                        <div class="col-md-3" >
                            <label class="col-form-label" >VAL. PIS</label >
                            <input type="text" class="form-control ValoresItens" name="PIS_vPIS[]" id="PIS_vPIS" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3" >
                            <label class="col-form-label" >COFINS CST</label >
                            <input type="text" class="form-control" name="COFINS_CST[]" id="COFINS_CST" />
                        </div>
                        <div class="col-md-3" >
                            <label class="col-form-label" >BASE DE CÁLCULO COFINS</label >
                            <input type="text" class="form-control ValoresItens" name="COFINS_vBC[]" id="COFINS_vBC" />
                        </div>
                        <div class="col-md-3" >
                            <label class="col-form-label" >ALÍQUOTA DO COFINS</label >
                            <input type="text" class="form-control ValoresItens" name="COFINS_pCOFINS[]" id="COFINS_pCOFINS" />
                        </div>
                        <div class="col-md-3" >
                            <label class="col-form-label" >VAL. COFINS</label >
                            <input type="text" class="form-control ValoresItens" name="COFINS_vCOFINS[]" id="COFINS_vCOFINS" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3" >
                            <label class="col-form-label" >Nº Item Pedido</label >
                            <input class="form-control" name="nItemPed[]" id="nItemPed" />
                        </div>
                        <div class="col-md-9" >
                            <label class="col-form-label" >INF. ADC. PRODUTO</label >
                            <textarea class="form-control" name="infAdProd[]" id="infAdProd" ></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body >

</html >
