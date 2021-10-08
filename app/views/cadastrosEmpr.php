<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"
        type="text/css">
    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">
    <style>
    .bg-blue {
        background-color: #053E69;
    }
    
    .filiais {
        margin-top: 15px;
    }

    .filiais input[type="text"] {
        border: gray 1px solid;
        padding: 0 0 0 5px;
        border-radius: 5px;
    }
    </style>
    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <!-- Adicionando Javascript -->
    <script>
    $(document).ready(function() {

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        }

        //Quando o campo cep perde o foco.
        $("#cep").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#rua").val(dados.logradouro);
                            $("#bairro").val(dados.bairro);
                            $("#cidade").val(dados.localidade);
                            $("#uf").val(dados.uf);
                            $("#ibge").val(dados.ibge);
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

        $("#AddFilial").on('click', function() {
            var html = '<div class="row" ><div class="col-md-3" >';
            html += '<div class="input-group mb-3">';
            html += '<div class="input-group-prepend">';
            html += '<span class="input-group-text cnpjFilial" id="basic-addon1">' + $('.cpf_cnpj_emp_lf').val().substr(0, 10) + '/ </span>';
            html += '</div>';
            html += '<input type="text" class="form-control CNPJ_filial" name="CNPJ_filial[]" placeholder="Filial" aria-label="Filial" aria-describedby="basic-addon1" />';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-md-2" >';
            html += '<div class="input-group mb-3">';
            html += '<div class="input-group-prepend">';
            html += '<span class="input-group-text" id="basic-addon2">CEP</span>';
            html += '</div>';
            html += '<input type="text" class="form-control" name="CEP_filial[]" placeholder="CEP" aria-label="CEP" aria-describedby="basic-addon2" />    ';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-md-4" >';
            html += '<div class="input-group mb-3">';
            html += '<div class="input-group-prepend">';
            html += '<span class="input-group-text" id="basic-addon3">Fantasia</span>';
            html += '</div>';
            html += '<input type="text" class="form-control" name="fantasia_filial[]" placeholder="Fantasia" aria-label="Fantasia" aria-describedby="basic-addon3" />';
            html += '</div>';
            html += '</div>';
			html += '<div class="col-md-2" >';
            html += '<div class="input-group mb-3">';
            html += '<div class="input-group-prepend">';
            html += '<span class="input-group-text" id="basic-addon3">IE</span>';
            html += '</div>';
            html += '<input type="text" class="form-control" name="inscricao_estadual_filial[]" placeholder="Inscrição Estadual" aria-label="Inscrição Estadual" aria-describedby="basic-addon3" />';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-md-1" ><button type="button" class="btn btn-danger center" onclick="$(this).parent().parent().remove();" ><i class="fa fa-minus-circle" ></i></button></div>';
            html += '</div>';

            $(".filiais").append(html);

        });
    });
    </script>
</head>

<body class="fixed-nav sticky-footer bg-blue" id="page-top">
    <!-- Navigation-->
    <?php $data = array('CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf", $id_empr));
			$this->load->view("menu_nav", $data); ?>
    <div class="content-wrapper">
        <?php echo $this->session->flashdata('sucesso'); ?>
        <!--CAD EMPRESA-->
        <div class="FORMULARIO" id="cad_empr">
            <div class="container">
                <div class="card card-register mx-auto">
                    <div class="card-header">Cadastro de Empresa
                        <a class="btn btn-success" style="color:#fff; float:right;"
                            href="<?php echo base_url(); ?>livros_controle/empr/">voltar</a>
                    </div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="POST"
                            action="<?php echo base_url(); ?>livros_controle/cad_empr/">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <h1 style="font-size:15px; margin-left:-1.5%;">Dados da Empresa
                                        <span><i class="fa fa-angle-double-down"
                                                style="color:#235880; font-size:20px;"></i></span>
                                    </h1>
                                </div>
                                <hr />
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Razão</label>
                                        <input class="form-control" id="exampleInputName" name="nome_emp_lf" type="text"
                                            aria-describedby="nameHelp" placeholder="Insira a razão...">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Fantasia</label>
                                        <input class="form-control" id="exampleInputLastName" name="fantasia_emp_lf"
                                            type="text" aria-describedby="nameHelp"
                                            placeholder="Insira o nome fantasia...">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <label class="col-form-label">Unidade Federal(UF)</label>
                                        <select class="form-control" id="uf" name="uf_emp_lf"
                                            aria-describedby="nameHelp">
                                            <option value="">Selecione uma opção</option>
                                            <?php foreach ($estados as $est) { ?>
                                            <option value="<?php echo $est->sigla; ?>">
                                                <?php echo $est->codigo_ibge . " - " . $est->sigla . " - " . $est->nome; ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label">Codigo do Municipio</label>
                                        <input class="form-control" id="exampleInputLastName" name="cod_mun_emp_lf"
                                            type="text" aria-describedby="nameHelp" placeholder="Insira a cidade...">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label">CEP</label>
                                        <input class="form-control" id="cep" name="cep_emp_lf" type="text"
                                            aria-describedby="nameHelp" placeholder="Insira o cep...">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="col-form-label">Bairro</label>
                                        <input class="form-control" id="bairro" name="bairro_emp_lf" type="text"
                                            aria-describedby="nameHelp" placeholder="Insira o bairro...">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-5">
                                        <label class="col-form-label">Endereço</label>
                                        <input class="form-control" id="rua" name="end_emp_lf" type="text"
                                            aria-describedby="nameHelp" placeholder="Insira o endereço...">
                                    </div>
                                    <div class="col-md-1">
                                        <label class="col-form-label">Número</label>
                                        <input class="form-control" id="numero" name="numero_emp_lf" type="text"
                                            aria-describedby="nameHelp" placeholder="Insira o endereço...">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label">Complemento</label>
                                        <input class="form-control" id="complemento" name="compl_emp_lf" type="text"
                                            aria-describedby="nameHelp" placeholder="Insira algum complemento...">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label">Telefone</label>
                                        <input class="form-control" id="exampleInputLastName" name="fone_emp_lf"
                                            type="text" aria-describedby="nameHelp" placeholder="Insira o telefone...">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label">Fax</label>
                                        <input class="form-control" id="exampleInputLastName" name="fax_emp_lf"
                                            type="text" aria-describedby="nameHelp" placeholder="Insira o telefone...">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Email</label>
                                        <input class="form-control" id="exampleInputLastName" name="email_emp_lf"
                                            type="text" aria-describedby="nameHelp" placeholder="Insira o telefone...">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label">Perfil da Empresa</label>
                                        <select class="form-control" id="exampleInputLastName" name="ind_perfil_emp_lf"
                                            aria-describedby="nameHelp">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1p">Perfil A</option>
                                            <option value="2p">Perfil B</option>
                                            <option value="3p">Perfil C</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label">Atividade da Empresa</label>
                                        <select class="form-control" id="exampleInputLastName" name="ind_ati_emp_lf"
                                            aria-describedby="nameHelp">
                                            <option value="">Selecione uma opção</option>
                                            <option value="1a">Industrial ou equiparado a industrial</option>
                                            <option value="2a">Outros</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label">Optante pelo simples</label>
                                        <select class="form-control" name="opt_simples_lf">
                                            <option value="0">Não</option>
                                            <option value="1">Sim</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h1 style="font-size:15px; margin-left:-1.5%;">Inscrições
                                    <span><i class="fa fa-angle-double-down"
                                            style="color:#235880; font-size:20px;"></i></span>
                                </h1>
                            </div>
                            <hr />
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label class="col-form-label">Estadual</label>
                                        <input class="form-control" name="insc_est_emp_lf" type="text"
                                            aria-describedby="emailHelp" placeholder="Insira o Numero...">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">Municipal</label>
                                        <input class="form-control" name="insc_mun_emp_lf" type="text"
                                            aria-describedby="emailHelp" placeholder="Insira o Numero...">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">Suframa</label>
                                        <input class="form-control" name="suframa_emp_lf" type="text"
                                            aria-describedby="emailHelp" placeholder="Insira o Numero...">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-2">
                                        <label class="col-form-label">Tipo insc.</label>
                                        <select class="form-control select" id="select" title="Escolha..."
                                            name="tipo_insc_emp_lf">
                                            <option value="">Escolha...</option>
                                            <option value="1">CPF</option>
                                            <option value="2">CNPJ</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label">&nbsp;</label>
                                        <input onkeyup="$('.cnpjFilial').html($(this).val().substr(0, 10) + '/');"
                                            class="form-control cpf_cnpj_emp_lf" type="text" id="busca"
                                            name="cpf_cnpj_emp_lf" placeholder="Digite aqui..." required />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h1 style="font-size:15px; margin-left:-1.5%;">Filiais
                                    <span><i class="fa fa-angle-double-down"
                                            style="color:#235880; font-size:20px;"></i></span>
                                    <small style="color: red; font-weight: bold;"> (MATRIZ JÁ INCLUSA) </small>
                                </h1>
                            </div>
                            <hr />

                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <button id="AddFilial" type="button" class="btn btn-success btn-sm"><i
                                                class="fa fa-plus-circle"></i> Incluir nova</button>
                                    </div>
                                </div>
                                
                                <div class="form-row filiais">
                                    <!-- Adição de novas filiais aqui -->
                                </div>
                            </div>

                            <div class="col-md-12">
                                <h1 style="font-size:15px; margin-left:-1.5%;">Dados do Contador
                                    <span><i class="fa fa-angle-double-down"
                                            style="color:#235880; font-size:20px;"></i></span>
                                </h1>
                            </div>
                            <hr />
                            <div class="form-group">
                                <div class="form-row" >
                                    <div class="col-md-4">
                                        <label class="col-form-label">Nome do contador</label>
                                        <input class="form-control" id="exampleInputEmail1" name="nome_contador_emp_lf"
                                            type="text" aria-describedby="emailHelp" placeholder="Insira o Nome...">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">Crc</label>
                                        <input class="form-control" name="crc_contador_emp_lf" type="text"
                                            aria-describedby="emailHelp" placeholder="Insira o Crc...">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">email</label>
                                        <input class="form-control" name="email_contador_emp_lf" type="text"
                                            aria-describedby="emailHelp" placeholder="Insira o Email...">
                                    </div>
                                </div>
                                <div class="form-row" >
                                    <div class="col-md-2">
                                        <label class="col-form-label">Codigo do Municipio</label>
                                        <input class="form-control" name="cod_mun_contador_emp_lf" type="text"
                                            aria-describedby="emailHelp" placeholder="Insira o Cod. Municipal...">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label">CEP</label>
                                        <input class="form-control" name="cep_contador_emp_lf" type="text"
                                            aria-describedby="emailHelp" placeholder="Insira o Cep...">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">Bairro</label>
                                        <input class="form-control" name="bairro_contador_emp_lf" type="text"
                                            aria-describedby="emailHelp" placeholder="Insira o Bairro...">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">Endereço</label>
                                        <input class="form-control" name="end_contador_emp_lf" type="text"
                                            aria-describedby="emailHelp" placeholder="Insira o Endereço...">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-2">
                                        <label class="col-form-label">Número</label>
                                        <input class="form-control" name="numero_contador_emp_lf" type="text"
                                            aria-describedby="emailHelp" placeholder="Insira o Numero...">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label">Complemento</label>
                                        <input class="form-control" name="compl_contador_emp_lf" type="text"
                                            aria-describedby="emailHelp" placeholder="Insira o Complemento...">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">Telefone</label>
                                        <input class="form-control" name="fone_contador_emp_lf" type="text"
                                            aria-describedby="emailHelp" placeholder="Insira o Telefone...">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">Fax</label>
                                        <input class="form-control" name="faxo_contador_emp_lf" type="text"
                                            aria-describedby="emailHelp" placeholder="Insira o Fax...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-2">
                                            <label class="col-form-label">Tipo insc.</label>
                                            <select class="form-control selectContador" id="selectContador"
                                                title="Escolha..." name="tipo_insc_contador_lf">
                                                <option value="">Escolha...</option>
                                                <option value="1">CPF</option>
                                                <option value="2">CNPJ</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="col-form-label">&nbsp;</label>
                                            <input class="form-control" type="text" id="buscaC" class="form-control"
                                                name="cpf_cnpj_contador_emp_lf" placeholder="Digite aqui...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-2">
                                        <button class="btn btn-primary btn-block" type="submit">Salvar
                                            <span><i class="fa fa-check-circle" style="color:greenyellow;"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br />
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small style="font-size:18px;">Todos os Direitos Reservados e Projetado por
                        <strong><a href="http://registrosweb.com.br" style="color:#0066cc; font-size:15px;">Registros
                                Web</a></strong>
                    </small>
                </div>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- Bootstrap core JavaScript-->
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"
            integrity="sha256-8WqyJLuWKRBVhxXIL1jBDD7SDxU936oZkCnxQbWwJVw=" crossorigin="anonymous"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="<?php echo base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>
        <!-- Custom scripts for this page-->
        <script src="<?php echo base_url(); ?>assets/js/sb-admin-datatables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/sb-admin-charts.min.js"></script>
        <script language="javascript">
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

        function data(valor, id_empr) {
            $.ajax({
                url: '<?php echo base_url(); ?>livros_controle/CarregaConfig',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_empr: id_empr,
                    tabela: "cad_config"
                },
                success: function(result) {
                    if (id_empr == result.id_cod_empr) {
                        $("#num_dia").val(result.num_diario);
                        $("#emis_dat").val(result.emis_dat_hora);
                        $("#mud_fol").val(result.mud_grup);
                        $("#data_inicial").val(result.per_inicial);
                        $("#data_final").val(result.per_final);
                        $("#FormBV2").attr('action',
                            "<?php echo base_url(); ?>livros_controle/edit_config/" + id_empr + "/" +
                            valor);
                    } else {
                        $("#num_dia").val('');
                        $("#emis_dat").val('0');
                        $("#mud_fol").val('0');
                        $("#data_inicial").val('');
                        $("#data_final").val('');
                        $("#FormBV2").attr('action',
                            "<?php echo base_url(); ?>livros_controle/cad_config/" + id_empr);
                    }
                }
            });
        }

        function somenteNumeros(num) {
            var er = /[^ 0 and 9.]/;
            er.lastIndex = 0;
            var campo = num;
            if (er.test(campo.value)) {
                campo.value = "";
            }
        }

        $(".CNPJ_filial").on('keyup', function(){
            $(this).mask('9999-99');
        });
        
        $(".select").on('change', function() {
            var $select = $(this).val();
            var busca = $('#busca').val('');

            if ($select == "1") {
                busca.mask('999.999.999-99');
            }
            if ($select == "2") {
                busca.mask('99.999.999/9999-99');
            }
            if ($select == "cei") {
                busca.mask('99.999.99999/99');
            }
        });

        $(".selectContador").on('change', function() {
            var $select = $(this).val();
            var busca = $('#buscaC').val('');

            if ($select == "1") {
                busca.mask('999.999.999-99');
            }
            if ($select == "2") {
                busca.mask('99.999.999/9999-99');
            }
            if ($select == "cei") {
                busca.mask('99.999.99999/99');
            }
        });
        </script>
    </div>
</body>

</html>