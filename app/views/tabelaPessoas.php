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
        <!-- Adicionando Javascript -->
        <script type="text/javascript" >

            $(document).ready(function() {

                function limpa_formulário_cep() {
                    // Limpa valores do formulário de cep.
                    $(".xLgr_pessoas_lf").val("");
                    $(".xBairro_pessoas_lf").val("");
                    $(".UF_pessoas_lf").val("");
                }

                //Quando o campo cep perde o foco.
                $(".CEP_pessoas_lf").blur(function() {

                    //Nova variável "cep" somente com dígitos.
                    var cep = $(this).val().replace(/\D/g, '');

                    //Verifica se campo cep possui valor informado.
                    if (cep != "") {

                        //Expressão regular para validar o CEP.
                        var validacep = /^[0-9]{8}$/;

                        //Valida o formato do CEP.
                        if(validacep.test(cep)) {

                            //Preenche os campos com "..." enquanto consulta webservice.
                            $(".xLgr_pessoas_lf").val("...");
                            $(".xBairro_pessoas_lf").val("...");
                            $(".UF_pessoas_lf").val("...");

                            //Consulta o webservice viacep.com.br/
                            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                                if (!("erro" in dados)) {
                                    //Atualiza os campos com os valores da consulta.
                                    $(".xLgr_pessoas_lf").val(dados.logradouro);
                                    $(".xBairro_pessoas_lf").val(dados.bairro);
                                    $(".UF_pessoas_lf").val(dados.uf);
                                } //end if.
                                else {
                                    //CEP pesquisado não foi encontrado.
                                    limpa_formulário_cep();
                                    alert("CEP não encontrado.");
                                }
                            });
                        } //end if.
                        else {
                            //cep é inválido.
                            limpa_formulário_cep();
                            alert("Formato de CEP inválido.");
                        }
                    } //end if.
                    else {
                        //cep sem valor, limpa formulário.
                        limpa_formulário_cep();
                    }
                });
            });

        </script>
        <script >
            function attRegistros(id_pss) {
                $.ajax({
                    url: "<?php echo base_url(); ?>livros_controle/CarregaAtualizaPessoa",
                    type: 'POST',
                    dataType: 'json',
                    data: {id_pss: id_pss},
                    success: function (result) {
                        $('.id_pessoas_lfs').attr('readonly', true).val(result.id_pessoas_lfs);
                        $('.opc_simples_lf').val(result.opc_simples_lf);
                        $('.CNPJ_pessoas_lf').val(result.CNPJ_pessoas_lf);
                        $('.xNome_pessoas_lf').val(result.xNome_pessoas_lf);
                        $('.xFant_pessoas_lf').val(result.xFant_pessoas_lf);
                        $('.xLgr_pessoas_lf').val(result.xLgr_pessoas_lf);
                        $('.nro_pessoas_lf').val(result.nro_pessoas_lf);
                        $('.xBairro_pessoas_lf').val(result.xBairro_pessoas_lf);
                        $('.cMun_pessoas_lf').val(result.cMun_pessoas_lf);
                        $('.xMun_pessoas_lf').val(result.xMun_pessoas_lf);
                        $('.UF_pessoas_lf').val(result.UF_pessoas_lf);
                        $('.CEP_pessoas_lf').val(result.CEP_pessoas_lf);
                        $('.cPais_pessoas_lf').val(result.cPais_pessoas_lf);
                        $('.xPais_pessoas_lf').val(result.xPais_pessoas_lf);
                        $('.fone_pessoas_lf').val(result.fone_pessoas_lf);
                        $('.indIEDest_pessoas_lf').val(result.indIEDest_pessoas_lf);
                        $('.IE_pessoas_lf').val(result.IE_pessoas_lf);
                    },
                    error: function (result) {
                        alert('Erro ao requisitar página!');
                    }
                });
            }

            function AddRegistro() {

                $('.id_pessoas_lfs').attr('readonly', true).val('');
                $('.opc_simples_lf').val('');
                $('.CNPJ_pessoas_lf').val('');
                $('.xNome_pessoas_lf').val('');
                $('.xFant_pessoas_lf').val('');
                $('.xLgr_pessoas_lf').val('');
                $('.nro_pessoas_lf').val('');
                $('.xBairro_pessoas_lf').val('');
                $('.cMun_pessoas_lf').val('');
                $('.xMun_pessoas_lf').val('');
                $('.UF_pessoas_lf').val('');
                $('.CEP_pessoas_lf').val('');
                $('.cPais_pessoas_lf').val('');
                $('.xPais_pessoas_lf').val('');
                $('.fone_pessoas_lf').val('');
				$('.indIEDest_pessoas_lf').val('');
				$('.IE_pessoas_lf').val('');

            }

        </script >
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
    </head >
    <body class="fixed-nav sticky-footer bg-blue" id="page-top" >
        <!-- Navigation-->
		<?php $data = array('CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf", $id_empr));
			$this->load->view("menu_nav", $data); ?>
        <div class="content-wrapper" >
            <div class="container-fluid" >
				<?php echo $this->session->flashdata('sucesso'); ?>
                <!-- Breadcrumbs-->
                <ol class="breadcrumb" >
                    <li class="breadcrumb-item" >
                        <a href="#" >Cadastros</a >
                    </li >
                    <li class="breadcrumb-item active" >Tabela</li >
                </ol >
                <!-- Example DataTables Card-->
                <div class="card mb-3" >
                    <div class="card-header" >
                        <div style="font-size:140%;" >
                            <i class="fa fa-table" ></i > Tabela de Pessoas
                        </div >
                    </div >
                    <div class="card-body" >
                        <div class="table-responsive" >
                            <div class="adc_mais" >
                                <a class="btn btn-success" onclick="AddRegistro()" href="#modal-ver" role="button" data-toggle="modal" >Adicionar <span class="fa fa-plus-circle" ></span ></a >
                            </div >
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                <thead >
                                    <tr >
                                        <th >ID</th >
                                        <th >CNPJ</th >
                                        <th >NOME</th >
                                        <th >CEP</th >
                                        <th >UF</th >
                                        <th >BAIRRO</th >
                                        <th >LOGRADOURO</th >
                                        <th >Nº</th >
                                        <th >TELEFONE</th >
                                        <th >AÇÕES</th >
                                    </tr >
                                </thead >
                                <tfoot >
                                    <tr >
                                        <th >ID</th >
                                        <th >CNPJ</th >
                                        <th >NOME</th >
                                        <th >CEP</th >
                                        <th >UF</th >
                                        <th >BAIRRO</th >
                                        <th >LOGRADOURO</th >
                                        <th >Nº</th >
                                        <th >TELEFONE</th >
                                        <th >AÇÕES</th >
                                    </tr >
                                </tfoot >
								<?php
									function mascaraCNPJ_CPF($cnpj_cpf) {
										if (strlen($cnpj_cpf) > 11) {

											$mask = substr($cnpj_cpf, 0, 2) . ".";
											$mask .= substr($cnpj_cpf, 2, 3) . ".";
											$mask .= substr($cnpj_cpf, 5, 3) . "/";
											$mask .= substr($cnpj_cpf, 8, 4) . "-";
											$mask .= substr($cnpj_cpf, 12, 2);

										} else {

											$mask = substr($cnpj_cpf, 0, 3) . ".";
											$mask .= substr($cnpj_cpf, 3, 3) . ".";
											$mask .= substr($cnpj_cpf, 6, 3) . "-";
											$mask .= substr($cnpj_cpf, 9, 2);

										}

										return $mask;

									}

								?>
                                <tbody >
									<?php foreach ($pessoas as $pessoa) { ?>
                                        <tr >
                                            <td ><?php echo $pessoa->id_pessoas_lfs; ?></td >
                                            <td ><?php echo mascaraCNPJ_CPF($pessoa->CNPJ_pessoas_lf); ?></td >
                                            <td ><?php echo $pessoa->xNome_pessoas_lf; ?></td >
                                            <td ><?php echo $pessoa->CEP_pessoas_lf; ?></td >
                                            <td ><?php echo $pessoa->UF_pessoas_lf; ?></td >
                                            <td ><?php echo $pessoa->xBairro_pessoas_lf; ?></td >
                                            <td ><?php echo $pessoa->xLgr_pessoas_lf; ?></td >
                                            <td ><?php echo $pessoa->nro_pessoas_lf; ?></td >
                                            <td ><?php echo $pessoa->fone_pessoas_lf; ?></td >
                                            <td style="width: 7%;" >
                                                <a id="attRegistros" onclick="attRegistros('<?php echo $pessoa->id_pessoas_lfs; ?>');" class="fa fa-pencil btn btn-success" style="color:#fff;" href="#modal-ver" role="button" data-toggle="modal" ></a >
                                                <a class="fa fa-trash btn btn-danger" id="btn-exclui" style="color:#fff;" href="#modal-container-1" role="button" data-toggle="modal" ></a >
                                            </td >
                                        </tr >
									<?php } ?>
                                </tbody >
                            </table >
                        </div >
                    </div >
                    <div class="card-footer small text-muted" >Ultima vez Atualizado 19/04/2018 ás 17:05</div >
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
            <!-- Visualizar mais -->
            <div class="modal fade" tabindex="-1" role="dialog" id="modal-ver" >
                <div class="modal-dialog modal-lg" role="document" >
                    <div class="modal-content" >
                        <div class="modal-header" >
                            <h4 class="modal-title" >Dados Pessoa</h4 >
                        </div >
                        <form method="post" action="<?php echo base_url(); ?>livros_controle/atualizaPessoa" id="attPessoas" >
                            <div class="modal-body" >
                                <div class="form-group" >
                                    <div class="form-row" >
                                        <div class="col-md-2" >
                                            <label class="col-form-label" >ID</label >
                                            <input type="text" class="form-control id_pessoas_lfs" id="ID" name="id_pessoas_lfs" />
                                        </div >
                                        <div class="col-md-8" >
                                            <label class="col-form-label" >Nome Fantasia</label >
                                            <input type="text" class="form-control xFant_pessoas_lf" id="Nome_Fantasia" name="xFant_pessoas_lf" />
                                        </div >
                                        <div class="col-md-2" >
                                            <label class="col-form-label" >Optante Simples</label >
                                            <select type="text" class="form-control opc_simples_lf" id="opc_simples" name="opc_simples_lf" >
                                                <option value="N" >Não</option>
                                                <option value="S" >Sim</option>
                                            </select>
                                        </div >
                                    </div >
                                    <div class="form-row" >
                                        <div class="col-md-6" >
                                            <label class="col-form-label" >Nome</label >
                                            <input type="text" class="form-control xNome_pessoas_lf" id="Nome" name="xNome_pessoas_lf" />
                                        </div >
                                        <div class="col-md-6" >
                                            <label class="col-form-label" >CNPJ</label >
                                            <input type="text" class="form-control CNPJ_pessoas_lf" id="CNPJ" name="CNPJ_pessoas_lf" />
                                        </div >
                                    </div >
                                    <div class="form-row" >
                                        <div class="col-md-2" >
                                            <label class="col-form-label" >Nº País</label >
                                            <input type="text" class="form-control cPais_pessoas_lf" id="cPais" name="cPais_pessoas_lf" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >País</label >
                                            <input type="text" class="form-control xPais_pessoas_lf" id="xPais" name="xPais_pessoas_lf" onkeyup="this.value = this.value.toUpperCase();" />
                                        </div >
                                        <div class="col-md-2" >
                                            <label class="col-form-label" >Nº Município</label >
                                            <input type="text" class="form-control cMun_pessoas_lf" id="cMun" name="cMun_pessoas_lf" />
                                        </div >
                                        <div class="col-md-4" >
                                            <label class="col-form-label" >Município</label >
                                            <input type="text" class="form-control xMun_pessoas_lf" id="xMun" name="xMun_pessoas_lf" />
                                        </div >
                                    </div >
                                    <div class="form-row" >
                                        <div class="col-md-3" >
                                            <label class="col-form-label" >CEP</label >
                                            <input type="text" class="form-control CEP_pessoas_lf" id="CEP" name="CEP_pessoas_lf" />
                                        </div >
                                        <div class="col-md-3" >
                                            <label class="col-form-label" >UF</label >
                                            <select class="form-control UF_pessoas_lf" id="UF" name="UF_pessoas_lf" >
												<?php foreach ($estados as $item) { ?>
                                                    <option value="<?php echo $item->sigla; ?>" ><?php echo $item->sigla . " - " . $item->nome; ?></option >
												<?php } ?>
                                            </select >
                                        </div >
                                        <div class="col-md-6" >
                                            <label class="col-form-label" >Bairro</label >
                                            <input type="text" class="form-control xBairro_pessoas_lf" id="Bairro" name="xBairro_pessoas_lf" />
                                        </div >
                                    </div >
                                    <div class="form-row" >
                                        <div class="col-md-6" >
                                            <label class="col-form-label" >Logradouro</label >
                                            <input type="text" class="form-control xLgr_pessoas_lf" id="Logradouro" name="xLgr_pessoas_lf" />
                                        </div >
                                        <div class="col-md-3" >
                                            <label class="col-form-label" >Nº</label >
                                            <input type="text" class="form-control nro_pessoas_lf" id="Numero" name="nro_pessoas_lf" />
                                        </div >
                                        <div class="col-md-3" >
                                            <label class="col-form-label" >Telefone</label >
                                            <input type="text" class="form-control fone_pessoas_lf" id="Telefone" name="fone_pessoas_lf" />
                                        </div >
                                    </div >
                                    <div class="form-row" >
										<div class="col-md-6" >
											<label class="col-form-label" >Indicador da IE (Destinatário)</label >
                                            <select class="form-control indIEDest_pessoas_lf" id="indIEDest" name="indIEDest_pessoas_lf" >
												<option value="1" >1 - Contribuinte ICMS (informar a IE do destinatário)</option>
												<option value="2" >2 - Contribuinte isento de Inscrição no cadastro de Contribuintes do ICMS</option>
												<option value="9" >9 - Não Contribuinte, que pode ou não possuir Inscrição Estadual no Cadastro de Contribuintes do ICMS</option>
											</select>
										</div >
										<div class="col-md-6" >
											<label class="col-form-label" >Inscrição Estadual</label >
                                            <input type="text" class="form-control IE_pessoas_lf" id="IE" name="IE_pessoas_lf" />
										</div >
									</div >
                                </div >
                            </div >
                            <div class="modal-footer" >
                                <button type="button" class="btn btn-default" data-dismiss="modal" >Fechar</button >
                                <button type="submit" class="btn btn-primary" >Salvar mudanças</button >
                            </div >
                        </form >
                    </div ><!-- /.modal-content -->
                </div ><!-- /.modal-dialog -->
            </div ><!-- /.modal -->
        </div >
    </body >

</html >
