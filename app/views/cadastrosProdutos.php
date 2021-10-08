<html lang="en" >

    <head >
        <meta charset="utf-8" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
        <meta name="description" content="" >
        <meta name="author" content="" >
        <title >Escrituração Fiscal</title >
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

            @media only screen and (min-width: 600px) {
                .margem {
                    margin-left: -10em;
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
            <div class="FORMULARIO" id="cad_empr">
                <div class="container">
                    <div class="card card-register mx-auto">
                        <div class="card-header">Cadastro de Produtos <a class="btn btn-success" style="color:#fff; float:right;" href="<?php echo base_url(); ?>livros_controle/Produtos/">voltar</a></div>
                        <div class="card-body">
                            <form enctype="multipart/form-data"  method="POST" action="<?php echo base_url(); ?>livros_controle/cad_Produtos/">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <label for="codid_nvoProds" >Código</label>
                                            <input class="form-control" id="codid_nvoProds" name="codid_nvoProds" type="text" aria-describedby="nameHelp" placeholder="Insira o Código..." value="<?php echo ($id) ? $Produto->codid_nvoProds : ""; ?>" />
                                            <input id="id_nvoProds" name="id_nvoProds" value="<?php echo $id; ?>" type="hidden" />
                                        </div>
                                        <div class="col-md-5">
                                            <label for="Nome_nvoProds" >Nome</label>
                                            <input class="form-control" id="Nome_nvoProds" name="Nome_nvoProds" type="text" aria-describedby="nameHelp" placeholder="Insira o Nome..." value="<?php echo ($id) ? $Produto->Nome_nvoProds : ""; ?>" />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="CFOPestad_nvoProds" >CFOP</label>
                                            <input class="form-control" id="CFOPestad_nvoProds" name="CFOPestad_nvoProds" type="text" aria-describedby="nameHelp" placeholder="Insira o CFOP..." value="<?php echo ($id) ? $Produto->CFOPestad_nvoProds : ""; ?>" />
                                        </div>
                                      </div>
                                </div>
                                <div class="col-md-2">
                                    <button  class="btn btn-primary btn-block" type="submit" >Incluir <span><i class="fa fa-check-circle" style="color:greenyellow;"></i></span></button>
                                </div>
                            </form>
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
            <!-- Core plugin JavaScript-->
            <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js" ></script >
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js" ></script >
            <!-- Page level plugin JavaScript-->
            <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js" ></script >
            <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.js" ></script >
            <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.js" ></script >
            <script src="<?php echo base_url(); ?>assets/js/jquery.maskMoney.min.js" type="text/javascript" ></script >
            <!-- Custom scripts for all pages-->
            <script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js" ></script >
            <!-- Custom scripts for this page-->
            <script src="<?php echo base_url(); ?>assets/js/sb-admin-datatables.min.js" ></script >
            <script src="<?php echo base_url(); ?>assets/js/sb-admin-charts.min.js" ></script >
            <script language="javascript" >
                function carr() {
                    document.getElementById("saida").style.color = "#33ccff";
                    document.getElementById("submit_grup").disabled = true;
                    document.getElementById('saida').innerHTML = 'Um momento, processando...';
                }

                function lancCampSubmit() {
                    document.getElementById("hist_desc").disabled = false;
                    document.getElementById("descCent").disabled = false;
                    document.getElementById("desc_debit").disabled = false;
                    document.getElementById("desc_credit").disabled = false;
                }

                function lancCampOnload() {
                    document.getElementById("hist_desc").disabled = true;
                    document.getElementById("descCent").disabled = true;
                    document.getElementById("desc_debit").disabled = true;
                    document.getElementById("desc_credit").disabled = true;
                }
            </script >
            <script language="javascript" >
                function verificaDuplicata(valor, id_empr) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>livros_controle/CarregaGrup',
                        type: 'POST',
                        dataType: 'json',
                        data: {grup_grup: valor, tabela: "cad_grup", id_empr: id_empr},
                        success: function (result) {
                            if (result.id_grup) {
                                document.getElementById("saida").style.color = "red";
                                document.getElementById('saida').innerHTML = 'Grupo informado já existe';
                                document.getElementById("submit_grup").disabled = true;
                            } else {
                                document.getElementById("saida").style.color = "green";
                                document.getElementById('saida').innerHTML = 'Grupo permitido';
                                document.getElementById("submit_grup").disabled = false;
                            }
                        }
                    });
                }
            </script >
            <script language="javascript" >
                function InserirPlan(valor, id1, id2, desc_cod) {
                    var valorDaDiv = $('#cod_id' + valor).text();
                    var valorDaDiv2 = $('#des_cod' + valor).text();
                    if (valorDaDiv == valor) {
                        $('#' + id1).val(valor);
                        $('#' + id2).val(valorDaDiv2);
                    }
                }

                function InserirHist(valor, desc_cod) {
                    var valorDaDiv = $('#cod_hist_id' + valor).text();
                    var valorDaDiv2 = $('#des_hist_cod' + valor).text();
                    if (valorDaDiv == valor) {
                        $('#cod_hist').val(valor);
                        $('#hist_desc').val(valorDaDiv2);
                    }
                }

                function InserirCentCusto(valor, desc_cod) {
                    var valorDaDiv = $('#cod_cent_id' + valor).text();
                    var valorDaDiv2 = $('#des_cent_cod' + valor).text();
                    if (valorDaDiv == valor) {
                        $('#cod_cent').val(valor);
                        $('#descCent').val(valorDaDiv2);
                    }
                }

                function InserirEve(valor, desc_cod) {
                    var valorDaDiv = $('#cod_eve_id' + valor).text();
                    var valorDaDiv2 = $('#des_eve_cod' + valor).text();
                    if (valorDaDiv == valor) {
                        $('#cod_eve').val(valor);
                        $('#descEve').val(valorDaDiv2);
                    }
                }

                function CarregaPlanCont1(valor, id_empr) {

                    $.ajax({
                        url: '<?php echo base_url(); ?>livros_controle/CarregaJava/id_plan',
                        type: 'POST',
                        dataType: 'json',
                        data: {id: valor, tabela: "cad_plan"},
                        success: function (result) {
                            if (id_empr == result.id_cod_empr && valor == result.id_plan) {
                                $("#desc_debit").val(result.desc_plan);
                            } else {
                                $("#desc_debit").val('Nenhum Registro Encontrado');
                            }
                        }
                    });
                }

                function CarregaPlanCont2(valor, id_empr) {

                    $.ajax({
                        url: '<?php echo base_url(); ?>livros_controle/CarregaJava/id_plan',
                        type: 'POST',
                        dataType: 'json',
                        data: {id: valor, tabela: "cad_plan"},
                        success: function (result) {
                            if (id_empr == result.id_cod_empr && valor == result.id_plan) {
                                $("#desc_credit").val(result.desc_plan);
                            } else {
                                $("#desc_credit").val('Nenhum Registro Encontrado');
                            }
                        }
                    });
                }

                function CarregaHistorico(valor, id_empr) {

                    $.ajax({
                        url: '<?php echo base_url(); ?>livros_controle/CarregaJava/id_hist',
                        type: 'POST',
                        dataType: 'json',
                        data: {id: valor, tabela: "cad_hist"},
                        success: function (result) {
                            if (id_empr == result.id_cod_empr && valor == result.id_hist) {
                                $("#hist_desc").val(result.desc_hist);
                                document.getElementById("submit_grup").disabled = false;
                            } else {
                                $("#hist_desc").val('Nenhum Registro Encontrado');
                                document.getElementById("submit_grup").disabled = true;
                            }
                        }
                    });
                }

                function CarregaCentCust(valor, id_empr) {

                    $.ajax({
                        url: '<?php echo base_url(); ?>livros_controle/CarregaJava/id_cent',
                        type: 'POST',
                        dataType: 'json',
                        data: {id: valor, tabela: "cad_cent"},
                        success: function (result) {
                            if (id_empr == result.id_cod_empr && valor == result.id_cent) {
                                $("#descCent").val(result.desc_cent);
                                document.getElementById("submit_grup").disabled = false;
                            } else {
                                $("#descCent").val('Nenhum Registro Encontrado');
                                document.getElementById("submit_grup").disabled = true;
                            }
                        }
                    });
                }

                function CarregaEventoJs(valor, id_empr) {

                    $.ajax({
                        url: '<?php echo base_url(); ?>livros_controle/CarregaJava/id_eve',
                        type: 'POST',
                        dataType: 'json',
                        data: {id: valor, tabela: "cad_evento"},
                        success: function (result) {
                            if (id_empr == result.id_cod_empr && valor == result.id_eve) {
                                $("#descEve").val(result.desc_eve);
                                document.getElementById("submit_grup").disabled = false;
                            } else {
                                $("#descEve").val('Nenhum Registro Encontrado');
                                document.getElementById("submit_grup").disabled = true;
                            }
                        }
                    });
                }
            </script >

            <script language="javascript" >
                function mascaraData(campo, e) {
                    var kC = (document.all) ? event.keyCode : e.keyCode;
                    var data = campo.value;

                    if (kC != 8 && kC != 46) {
                        if (data.length == 2) {
                            campo.value = data += '/';
                        } else if (data.length == 5) {
                            campo.value = data += '/';
                        } else
                            campo.value = data;
                    }
                }
            </script >
            <script language="javascript" >
                function data(valor, id_empr) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>livros_controle/CarregaConfig',
                        type: 'POST',
                        dataType: 'json',
                        data: {id_empr: id_empr, tabela: "cad_config"},
                        success: function (result) {
                            if (id_empr == result.id_cod_empr) {
                                $("#num_dia").val(result.num_diario);
                                $("#emis_dat").val(result.emis_dat_hora);
                                $("#mud_fol").val(result.mud_grup);
                                $("#data_inicial").val(result.per_inicial);
                                $("#data_final").val(result.per_final);
                                $("#FormBV2").attr('action', "<?php echo base_url(); ?>livros_controle/edit_config/" + id_empr + "/" + valor);
                            } else {
                                $("#num_dia").val('');
                                $("#emis_dat").val('0');
                                $("#mud_fol").val('0');
                                $("#data_inicial").val('');
                                $("#data_final").val('');
                                $("#FormBV2").attr('action', "<?php echo base_url(); ?>livros_controle/cad_config/" + id_empr);
                            }
                        }
                    });
                }
            </script >
            <script language="javascript" >
                function periodo_cad(valor, id_empr) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>livros_controle/grup_grup',
                        type: 'POST',
                        dataType: 'json',
                        data: {grup_grup: valor, tabela: "cad_grup"},
                        success: function (result) {
                            if (id_empr == result.id_cod_empr && valor == result.grup_grup) {
                                $("#masc").val(result.masc_grup);
                                $("#resu").val(result.res_grup);
                                $("#class").mask(result.masc_grup);
                            } else {
                                $("#masc").val('sem registro');
                                $("#resu").val('sem registro');
                                $("#class").val('sem registro');
                            }
                        }
                    });
                }
            </script >
            <script >
                function somenteNumeros(num) {
                    var er = /[^ 0 and 9.]/;
                    er.lastIndex = 0;
                    var campo = num;
                    if (er.test(campo.value)) {
                        campo.value = "";
                    }
                }
            </script >
            <script type="text/javascript" >
                function carregaDados(valor, id_empr) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>livros_controle/CarregaGrup',
                        type: 'POST',
                        dataType: 'json',
                        data: {grup_grup: valor, tabela: "cad_grup", id_empr: id_empr},
                        success: function (result) {
                            if (valor == result.grup_grup) {
                                $("#masc").val(result.masc_grup);
                                $("#resu").val(result.res_grup);
                                $("#class").mask(result.masc_grup);
                            } else {
                                $("#masc").val('sem registro');
                                $("#resu").val('sem registro');
                                $("#class").val('sem registro');
                            }
                        }
                    });
                }


            </script >
            <script type="text/javascript" >
                function editHist() {
                    if ($("#hist_desc").hasClass("desativa")) {
                        document.getElementById("hist_desc").disabled = false;
                        document.getElementById("cod_hist").disabled = true;
                        $("#hist_desc").removeClass("desativa")
                        $("#btnHist").addClass("disabled")
                        $("#cod_hist").val('');
                    } else {
                        document.getElementById("hist_desc").disabled = true;
                        document.getElementById("cod_hist").disabled = false;
                        $("#btnHist").removeClass("disabled")
                        $("#hist_desc").val('');
                        $("#hist_desc").addClass("desativa")
                    }
                }


            </script >
            <script >
                function ComparaData(valor, id_empr) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>livros_controle/CarregaJava/id_config',
                        type: 'POST',
                        dataType: 'json',
                        data: {id: 1, tabela: "cad_config"},
                        success: function (result) {

                            var datasplit = valor.split('/');
                            var dataPost = datasplit[2] + "-" + datasplit[1] + "-" + datasplit[0];
                            var perInisplit = result.per_inicial.split('/');
                            var perIni = perInisplit[2] + "-" + perInisplit[1] + "-" + perInisplit[0];
                            var perFinsplit = result.per_final.split('/');
                            var perFin = perFinsplit[2] + "-" + perFinsplit[1] + "-" + perFinsplit[0];

                            if (id_empr == result.id_cod_empr && (dataPost >= perIni && dataPost <= perFin)) {
                                document.getElementById("saida").style.color = "green";
                                document.getElementById('saida').innerHTML = 'Periodo Contabil aceito!';
                                document.getElementById("submit_grup").disabled = false;
                            } else {
                                document.getElementById("saida").style.color = "red";
                                document.getElementById('saida').innerHTML = 'Valor fora do Periodo Contabil';
                                document.getElementById("submit_grup").disabled = true;
                            }
                        }
                    });
                }
            </script >
            <script >
                document.getElementById("select").addEventListener("change", myFunction);

                function myFunction() {
                    var $select = $('#select option:selected').val();
                    if ($select == "1") {
                        var $busca = $('#busca');
                        $('#busca').mask('999.999.999-99');
                    }
                    if ($select == "2") {
                        var $busca = $('#busca');
                        $('#busca').mask('99.999.999/9999-99');
                    }
                    if ($select == "cei") {
                        var $busca = $('#busca');
                        $('#busca').mask('99.999.99999/99');
                    }
                }
            </script >
            <script >
                document.getElementById("selectContador").addEventListener("change", myFunction);

                function myFunction() {
                    var $select = $('#select option:selected').val();
                    if ($select == "1c") {
                        var $busca = $('#busca');
                        $('#busca').mask('999.999.999-99');
                    }
                    if ($select == "2c") {
                        var $busca = $('#busca');
                        $('#busca').mask('99.999.999/9999-99');
                    }
                    if ($select == "cei") {
                        var $busca = $('#busca');
                        $('#busca').mask('99.999.99999/99');
                    }
                }
            </script >
        </div >
    </body >

</html >
