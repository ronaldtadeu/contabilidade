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
    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"
        type="text/css">
    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">
    <style>
    .bg-blue {
        background-color: #053E69;
    }

    .files input {
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        padding: 120px 0px 85px 0%;
        text-align: center !important;
        margin: 0;
        width: 100% !important;
    }

    .files input:focus {
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
        transition: outline-offset .15s ease-in-out, background-color .15s linear;
        border: 1px solid #92b0b3;
    }

    .files {
        position: relative
    }

    .files:after {
        pointer-events: none;
        position: absolute;
        top: 60px;
        left: 0;
        width: 50px;
        right: 0;
        height: 56px;
        content: "";
        background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
        display: block;
        margin: 0 auto;
        background-size: 100%;
        background-repeat: no-repeat;
    }

    .color input {
        background-color: #f1f1f1;
    }

    .files:before {
        position: absolute;
        bottom: 10px;
        left: 0;
        pointer-events: none;
        width: 100%;
        right: 0;
        height: 57px;
        content: "ou arraste o arquivo para a caixa. ";
        display: block;
        margin: 0 auto;
        color: #2ea591;
        font-weight: 600;
        text-transform: capitalize;
        text-align: center;
    }

    .status_lancamento_naolanc {
        background-color: #FF5454;
        color: white;
    }

    .status_lancamento_lanc {
        background-color: #57A13A;
        color: white;
    }
    </style>
    <script language="Javascript">
    function confirmacao(id) {
        var resposta = confirm("Você realmente deseja remover esse registro?");

        if (resposta == true) {
            window.location.href = "remover.php?id=" + id;
        }
    }
    </script>
</head>

<body class="fixed-nav sticky-footer bg-blue" id="page-top">
    <!-- Navigation-->
    <?php $data = array('CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf",$id_empr)); $this->load->view("menu_nav",$data);?>
    <div class="content-wrapper">
        <div class="container">
            <div class="card card-register mx-auto">
                <div class="card-header">upload das notas fiscais (XML).<a class="btn btn-success"
                        style="color:#fff; float:right;" href="<?php echo base_url();?>contabi_controle/index">
                        voltar</a></div>
                <br />
                <div class="col-md-12">
                    <div class="row">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" id="#" enctype="multipart/form-data"
                                        action="<?php echo base_url();?>livros_controle/cad_xml">
                                        <br />
                                        <div class="form-group files">
                                            <input type="file" name="userfile[]" id="file" class="form-control"
                                                multiple />
                                        </div>
                                        <br />
                                        <button class="btn btn-primary" type="submit">cadastrar</button>
                                        <br />
                                        <br />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
            </div>
        </div>
        <?php
                  //$arqvxml = simplexml_load_file(base_url().'assets/xmls/2019-01-29_13:41:53.xml');
                ?>
        <br />
        <div class="container">
            <?php echo $this->session->flashdata('sucesso'); ?>
            <?php echo $this->session->flashdata('erro'); ?>
            <div class="card card-register mx-auto">
                <div class="card-header">
                    <div style="font-size:140%;">
                        <i class="fa fa-table"></i> Notas Fiscais
                        <button class="btn btn-info" style="float: right;" onclick="IncluirNFeTotais()">INCLUIR
                            TODAS</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Lancada</th>
                                    <th>ID</th>
                                    <th>NOME</th>
                                    <th>STATUS</th>
                                    <th>AÇÕES</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Lancada</th>
                                    <th>ID</th>
                                    <th>NOME</th>
                                    <th>STATUS</th>
                                    <th>AÇÕES</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($lista as $xml){ if($xml->lancada_xml == 1){ $url = base_url()."livros_controle/inclusaoXml/".$xml->caminho_nom_xml."/".$xml->id_xml; $status = "status_lancamento_naolanc"; $icon = "fa fa-times"; $btn = "primary"; $desbilita = "disabled";}else{$status = "status_lancamento_lanc"; $url = ""; $btn = "secondary"; $icon = "fa fa-check";}?>
                                <tr class="<?php echo $status;?>">
                                    <td ><?php echo $xml->lancada_xml;?></td>
                                    <td><?php echo $xml->id_xml;?></td>
                                    <td><?php echo $xml->nom_xml;?></td>
                                    <td>
                                      <p style="display: none;"><?php echo $xml->lancada_xml;?></p>
                                        <center><i class="<?php echo $icon; ?>" style="font-size:1.8em;"></i></center>
                                    </td>
                                    <td style="width:18%;">
                                        <a class="btn btn-<?php echo $btn; ?>" style="color:#fff;"
                                            <?php if($xml->lancada_xml == 1){ ?>href="<?php echo $url; ?>"
                                            <?php } ?>>incluir Nfe</a>
                                        <a <?php if($xml->lancada_xml == 1){?>class="fa fa-trash btn btn-danger"
                                            <?php }else{?>class="fa fa-trash btn btn-secondary" <?php }?>
                                            id="btn-exclui" onclick="Exclusao(<?php echo $xml->id_xml;?>);"
                                            style="color:#fff;" id="modal-306054"
                                            <?php if($xml->lancada_xml == 1){?>href="#modal-container-1" <?php }?>
                                            role="button" data-toggle="modal"></a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--MODAL EXCLUIR-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal fade" id="modal-container-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <div style="margin-left:13%;" class="alert alert-danger alert-dismissable">
                                        <h4>
                                            Alerta!
                                        </h4>
                                        <strong>Exclusão</strong> de registro está em andamento!
                                    </div>
                                </div>
                                <div class="modal-body">
                                    Se você continuar a realizar essa ação, você irá apagar o registro do banco de
                                    dados.
                                    <strong>Essa é uma ação sem retorno!</strong>
                                </div>
                                <div class="modal-footer">

                                    <a class="btn btn-danger" id="deletar" style="color:#fff;">
                                        Continuar mesmo assim
                                    </a>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                        Cancelar
                                    </button>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <br />
        <!-- /.container-fluid-->
        <!-- /.content-wrapper-->
        <footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small style="font-size:18px;">Todos os Direitos Reservados e Projetado por <strong><a
                                href="http://registrosweb.com.br" style="color:#0066cc; font-size:15px;">Registros
                                Web</a></strong></small>
                </div>
            </div>
        </footer>
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fa fa-angle-up"></i>
        </a>
        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
        <!-- Page level plugin JavaScript-->
        <script src="<?php echo base_url();?>assets/vendor/datatables/jquery.dataTables.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url();?>assets/js/sb-admin.min.js"></script>
        <!-- Custom scripts for this page-->
        <script src="<?php echo base_url();?>assets/js/sb-admin-datatables.min.js">
        </script>
        <script type="text/javascript">
          $(document).ready(function(){
              $("#dataTable2").DataTable({
                "columnDefs": [
                    {
                        "targets": [ 0 ],
                        "visible": false,
                        "searchable": false
                    }
                ],
                "order": [[ 0, "asc" ]]
              })
          });

        function IncluirNFeTotais() {
            document.location = '<?php echo base_url(); ?>livros_controle/IncluirNFeTotais';
        }

        function carregaDados(id) {
            $.ajax({
                url: '<?php echo base_url(); ?>contabi_controle/CarregaRegistroUsuario',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id,
                    tabela: "cad_login"
                },
                success: function(result) {
                    $("#usuario").val(result.usuario);
                    $("#senha").val(result.senha);
                    $("#NovoRegistro").removeClass("disabled");
                    $("#FormBV").attr('action', "<?php echo base_url(); ?>admin_controle/AtualizaUsuario/" +
                        id);
                }

            });
        }
        </script>
        <script>
        function nomeXml(nome) {
            alert(nome);
            $('#nome_Xml').val(nome)
            attr('action', "<?php echo base_url(); ?>admin_controle/AtualizaUsuario/" + id);
        }
        </script>
        <script type="text/javascript">
            $(function() {
                $.each($(".arquivo")[0].files, function(i, file) {
                    data.append("arquivo[]", file);
                });
            });

        $(document).ready(function() {
            $('#save').on('click', function() {
                var fileInputs = $('.file_input');
                var formData = new FormData();
                $.each(fileInputs, function(i, fileInput) {
                    if (fileInput.files.length > 0) {
                        $.each(fileInput.files, function(k, file) {
                            formData.append('images[]', file);
                        });
                    }
                });
                $.ajax({
                    method: 'post',
                    url: "/multi_uploader/process",
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                    }
                });
            });
        });
        </script>
        <script type="text/javascript">
        function Exclusao(id, caminho) {
            $("#deletar").prop("href", "<?php echo base_url();?>livros_controle/deletarXml/" + id + "/" +
                "<?php echo $xml->caminho_nom_xml;?>");
        }
        </script>
    </div>
</body>

</html>