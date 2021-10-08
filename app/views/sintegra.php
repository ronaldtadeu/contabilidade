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
    </style>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin-datatables.min.js"></script>
    <!-- Jquery datapicker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/Calendario/jquery-ui.css">
    <script src="<?php echo base_url(); ?>assets/Calendario/jquery-1.12.4.js"></script>
    <script src="<?php echo base_url(); ?>assets/Calendario/jquery-ui.js"></script>
    <script>
    $(function() {
        $('.select2').select2();

        $(".datepicker").datepicker();
        $.datepicker.regional['pt-BR'] = {
            closeText: 'Fechar',
            prevText: '&#x3c;Anterior',
            nextText: 'Pr&oacute;ximo&#x3e;',
            currentText: 'Hoje',
            monthNames: ['Janeiro', 'Fevereiro', 'Mar&ccedil;o', 'Abril', 'Maio', 'Junho',
                'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'
            ],
            monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
                'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'
            ],
            dayNames: ['Domingo', 'Segunda-feira', 'Ter&ccedil;a-feira', 'Quarta-feira', 'Quinta-feira',
                'Sexta-feira', 'Sabado'
            ],
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <style>
    input[type="file"] {
        display: none;
    }

    .UploadFile {
        border: 1px solid #ccc;
        display: inline-block;
        padding: 6px 12px;
        cursor: pointer;
    }

    .fa-times-circle {
        color: red;
    }

    .fa-check-circle {
        color: green;
    }
    </style>
    <script>
    $(document).ready(function() {
        $('#file').on('change', function(e) {
            var file = $(this).val().split('\\');
            file = file[file.length - 1];
            var extensao = file.split('.');
            extensao = extensao[1];

            if (extensao.toUpperCase() == 'TXT') {
                $("#statusFile").removeClass("fa-times-circle").addClass("fa-check-circle");
                $("#nameFile").text(file);
            } else {
                $("#statusFile").removeClass("fa-check-circle").addClass("fa-times-circle");
                $("#nameFile").text('Arquivo com extensão inválida');
                $('#file').val('');
            }
        });

        $('#limpaFile').on('click', function() {
            LimpaInputFile();
        });
    });

    function LimpaInputFile() {
        $('#file').val('');
        $("#statusFile").removeClass("fa-check-circle").addClass("fa-times-circle");
        $("#nameFile").text('Não incluído');
    }
    </script>
</head>

<body class="fixed-nav sticky-footer bg-blue" id="page-top">
    <!-- Navigation-->
    <?php $data = array('CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf", $logEmpr));
			$this->load->view("menu_nav", $data); ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <?php echo $this->session->flashdata('sucesso'); ?>
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Cadastros</a>
                </li>
                <li class="breadcrumb-item active">Tabela</li>
            </ol>
            <!-- CADASTRO DE CFOP -->
            <div class="card mb-3">
                <div class="card-header">
                    <span style="font-size: 20px; "><i class="fa fa-barcode"></i> SINTEGRA</span>
                </div>
                <div class="card-body">
                    <form id="FinalizaSintegra" action="<?php echo base_url(); ?>livros_controle/gera_sintegra"
                        method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-2">
                                    <label class="col-form-label">Período inicial</label>
                                    <input type="text" class="form-control datepicker" value="" name="per_ini"
                                        id="per_ini" onkeyup="mascaraData();" />
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Período final</label>
                                    <input type="text" class="form-control datepicker" value="" name="per_fin"
                                        id="per_fin" />
                                </div>
                                <div class="col-md-3">
                                    <label class="col-form-label">CNPJ</label>
                                    <select class="form-control select2" id="cpf_cnpj_emp_lf" name="cnpj_cpf" >
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
                                <div class="col-md-2">
                                    <label class="col-form-label">Insc. Estadual</label>
                                    <input readonly type="text" class="form-control"
                                        value="<?php echo $data['CarregaEmpr']->insc_est_emp_lf; ?>"
                                        id="insc_est_emp_lf" />
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label">UF</label>
                                    <input readonly type="text" class="form-control"
                                        value="<?php echo $data['CarregaEmpr']->uf_emp_lf; ?>" id="uf_emp_lf" />
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label">Fax</label>
                                    <input readonly type="text" class="form-control"
                                        value="<?php echo $data['CarregaEmpr']->fax_emp_lf; ?>" id="fax_emp_lf" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label class="col-form-label"> Estrutura do arquivo eletrônico entregue </label>
                                    <select class="form-control select2" name="cod_est_arq_ele_ent"
                                        id="cod_est_arq_ele_ent">
                                        <option value="1">1 - Estrutura conforme Convênio ICMS 57/95, na versão
                                            estabelecida pelo Convênio ICMS 31/99 e com as alterações promovidas até o
                                            Convênio ICMS 30/02.</option>
                                        <option value="2">2 - Estrutura conforme Convênio ICMS 57/95, na versão
                                            estabelecida pelo Convênio ICMS 69/02 e com as alterações promovidas pelo
                                            Convênio ICMS 142/02.</option>
                                        <option value="3" selected>3 - Estrutura conforme Convênio ICMS 57/95, com as
                                            alterações promovidas pelo Convênio ICMS 76/03.</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label"> Natureza das operações informadas </label>
                                    <select class="form-control select2" name="cod_nat_ope_int" id="cod_nat_ope_int">
                                        <option value="1">1 - Interestaduais - somente operações sujeitas ao regime de
                                            Substituição Tributária.</option>
                                        <option value="2">2 - Interestaduais - somente operações sujeitas ao regime de
                                            Substituição Tributária.</option>
                                        <option value="3" selected>3 - Totalidade das operações do informante.</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label">Finalidade do arquivo eletrônico </label>
                                    <select class="form-control select2" name="cod_fin_arq_ele" id="cod_fin_arq_ele">
                                        <option value="1">1 - Normal.</option>
                                        <option value="2">2 - Retificação total de arquivo: substituição total de
                                            informações prestadas pelo contribuinte referentes a este período.</option>
                                        <option value="3">3 - Desfazimento: arquivo de informação referente a
                                            operações/prestações não efetivadas (neste caso, o arquivo deverá conter,
                                            além dos registros tipo 10 e tipo 90, apenas os registros referentes às
                                            operações/prestações não efetivadas).</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-1">
                                    <label class="col-form-label"> CEP </label>
                                    <input readonly type="text" class="form-control"
                                        value="<?php echo $data['CarregaEmpr']->cep_emp_lf; ?>" id="cep_emp_lf" />
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label"> Logradouro </label>
                                    <input readonly type="text" class="form-control"
                                        value="<?php echo $data['CarregaEmpr']->end_emp_lf; ?>" id="end_emp_lf" />
                                </div>
                                <div class="col-md-1">
                                    <label class="col-form-label"> Nº </label>
                                    <input readonly type="text" class="form-control"
                                        value="<?php echo $data['CarregaEmpr']->numero_emp_lf; ?>" id="numero_emp_lf" />
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label"> Complemento </label>
                                    <input readonly type="text" class="form-control"
                                        value="<?php echo $data['CarregaEmpr']->compl_emp_lf; ?>" id="compl_emp_lf" />
                                </div>
                                <div class="col-md-4">
                                    <label class="col-form-label"> Bairro </label>
                                    <input readonly type="text" class="form-control"
                                        value="<?php echo $data['CarregaEmpr']->bairro_emp_lf; ?>" id="bairro_emp_lf" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label class="col-form-label"> Representante </label>
                                    <input type="text" class="form-control"
                                        value="<?php echo $data['CarregaEmpr']->nome_contador_emp_lf; ?>"
                                        id="representante" name="representante" />
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label"> Telefone </label>
                                    <input type="text" class="form-control"
                                        value="<?php echo $data['CarregaEmpr']->fone_contador_emp_lf; ?>"
                                        id="tel_representante" name="tel_representante" />
                                </div>
                                <div class="col-md-2">
                                    <label class="col-form-label"> Emitente </label>
                                    <select class="form-control" id="emitente" name="emitente">
                                        <option value="P">P - Próprio</option>
                                        <option value="T">T - Terceiros</option>
                                    </select>
                                </div>
                            </div>
                            <br />
                            <div class="form-row">
                                <div class="col-md-12">
                                    <label class="UploadFile">
                                        INCLUIR ARQUIVO <b>OPCIONAL</b>: ECF Anexo VII
                                        <input type="file" class="form-control" name="userfile" id="file" />
                                        &nbsp;
                                        <i id="statusFile" class="fa fa-times-circle"></i>
                                        <span id="nameFile">Não incluído</span>
                                    </label>
                                    <small id="limpaFile" style="cursor: pointer;">Limpar</small>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12">
                                    &nbsp;
                                </div>
                                <div class="col-auto">
                                    <button type="button"
                                        onclick=" if($('#per_ini').val() && $('#per_fin').val()) $('#FinalizaSintegra').submit(); else alert('Preencha os campos período!');"
                                        class="btn btn-success block-content gs"> Gerar </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
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
    </div>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
    <script type="text/javascript">
    $(function() {

        $(".Update").click(function() {
            $.ajax({
                url: "<?php echo base_url(); ?>livros_controle/cadastroCFOP",
                type: 'POST',
                dataType: 'json',
                data: {
                    id: $(this).data("id")
                },
                success: function(result) {
                    console.log(result);
                    $("#id_cfop").val(result.id_cfop);
                    $("#CFOP_cfop").val(result.CFOP_cfop);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });

    function Exclusao(id) {
        $("#deletar").prop("href", "<?php echo base_url();?>livros_controle/deletarCFOP/" + id);
    }

    function somenteNumeros(num) {
        var er = /[^ 0 and 9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
            campo.value = "";
        }
    }

    var options = {
        onKeyPress: function(cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'];
            $('.cpfOuCnpj').mask((cpf.length > 14) ? masks[1] : masks[0], op);
        }
    }

    $('.cpfOuCnpj').val().length > 11 ? $('.cpfOuCnpj').mask('00.000.000/0000-00', options) : $('.cpfOuCnpj').mask(
        '000.000.000-00#', options);
    </script>
</body>

</html>