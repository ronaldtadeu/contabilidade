<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Escrituração fiscal</title>
        <!-- Bootstrap core CSS-->
        <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">
        <style>
            .bg-blue{
            background-color:#053E69;
            }
        </style>
        <script language="Javascript">
            function confirmacao(id) {
                 var resposta = confirm("Você realmente deseja remover esse registro?");

                 if (resposta == true) {
                      window.location.href = "remover.php?id="+id;
                 }
            }

        </script>
    </head>
    <body class="fixed-nav sticky-footer bg-blue" id="page-top">
        <!-- Navigation-->
        <?php $this->load->view("menu_nav");?>
        <div class="content-wrapper">
            <div class="container-fluid">
              <!-- Breadcrumbs-->
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Cadastros</a>
                </li>
                <li class="breadcrumb-item active">Tabela</li>
              </ol>
              <!-- Example DataTables Card-->
              <div class="card mb-3">
                <div class="card-header">
                    <div style="font-size:140%;">
                      <i class="fa fa-table"></i> Tabela de cadastro </div>
                  </div>
                <div class="card-body">
                  <div class="table-responsive">
                      <div class="adc_mais">
                          <a class="btn btn-success" href="">Adicionar <span class="fa fa-plus-circle"></span></a>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>TESTE</th>
                          <th>TESTE</th>
                          <th>Ações</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>ID</th>
                          <th>TESTE</th>
                          <th>TESTE</th>
                          <th>Ações</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <tr>
                          <td>conteudo</td>
                          <td>conteudo</td>
                          <td>conteudo</td>
                          <td style="width:18%;">
                              <a class="fa fa-pencil btn btn-success" style="color:#fff;" ></a>
                              <a class="fa fa-trash btn btn-danger" id="btn-exclui" style="color:#fff;" id="modal-306054" href="#modal-container-1" role="button" data-toggle="modal" ></a>
                               <a class="fa fa-eye btn btn-primary" style="color:#fff;" id="modal-306054" href="#modal-ver" role="button" class="btn" data-toggle="modal" ></a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-footer small text-muted">Ultima vez Atualizado 19/04/2018 ás 17:05</div>
              </div>
            </div>
            <!-- /.container-fluid-->
            <!-- /.content-wrapper-->
            <footer class="sticky-footer">
              <div class="container">
                <div class="text-center">
                    <small style="font-size:18px;">Todos os Direitos Reservados e Projetado por <strong><a href="http://registrosweb.com.br" style="color:#0066cc; font-size:15px;">Registros Web</a></strong></small>
                </div>
              </div>
            </footer>
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
              <i class="fa fa-angle-up"></i>
            </a>
            <!--MODAL EXCLUIR-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="modal fade" id="modal-container-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                        Se você continuar a realizar essa ação, você irá apagar o registro do banco de dados.
                                        <strong>Essa é uma ação sem retorno!</strong>
                                    </div>
                                    <div class="modal-footer">

                                        <a class="btn btn-danger" style="color:#fff;" href="<?php echo base_url();?>livros_controle/deletar/">
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
            <!--MODAL VER MAIS-->
            <div id="modal_v">
                <?php $this->load->view("modal");?>
            </div>
            <!-- Bootstrap core JavaScript-->
            <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
            <!-- Core plugin JavaScript-->
            <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>
            <!-- Page level plugin JavaScript-->
            <script src="<?php echo base_url();?>assets/vendor/datatables/jquery.dataTables.js"></script>
            <script src="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
            <!-- Custom scripts for all pages-->
            <script src="<?php echo base_url();?>assets/js/sb-admin.min.js"></script>
            <!-- Custom scripts for this page-->
            <script src="<?php echo base_url();?>assets/js/sb-admin-datatables.min.js"></script>

            <script type="text/javascript" >
                function VerificaExclusao(id, id_tab, id_bd) {
                  alert();
                  $.ajax({
                           url: '<?php echo base_url(); ?>livros_controle/VerificaExclusao',
                           type: 'POST',
                           dataType: 'json',
                           data: {id_tab: id, tabela: "lancamentos", id_lanc: id_bd},
                           success: function (result) {

                               if (id_empr == result.id_cod_em && result.) ) {
                                   $("#btn-exclui").addClass("disabled")
                               } else {
                                   $("#btn-exclui").addClass("ativo")
                               }
                           }
                       });
                }


            </script>

            <script>

                function CarregaRegistro(id, Modal, tabela, PrimaryKey){
                    $.ajax({
                        url: "<?php echo base_url(); ?>livros_controle/CarregaRegistro",
                        dataType: 'json',
                        type: 'POST',
                        data: {id: id, tabela: tabela, PrimaryKey: PrimaryKey},
                        success: function (result) {
                            var html = "";
                        if(Modal == 1){
                            html += "<tr>";
                            html += "<td>"+result.id_empr+"</td>";
                            html += "<td>"+result.cod_empr+"</td>";
                            html += "<td>"+result.raz_empr+"</td>";
                            html += "<td>"+result.fan_empr+"</td>";
                            html += "<td>"+result.est_empr+"</td>";
                            html += "<td>"+result.cid_empr+"</td>";
                            html += "<td>"+result.bai_empr+"</td>";
                            html += "<td>"+result.end_empr+"</td>";
                            html += "</tr>";
                            $("#cad_empr").empty().html(html);
                        }

                        if(Modal == 2){
                            html += "<tr>";
                            html += "<td>"+result.id_filial+"</td>";
                            html += "<td>"+result.cod_filial+"</td>";
                            html += "<td>"+result.raz_filial+"</td>";
                            html += "<td>"+result.fan_filial+"</td>";
                            html += "<td>"+result.est_filial+"</td>";
                            html += "<td>"+result.cid_filial+"</td>";
                            html += "<td>"+result.bai_filial+"</td>";
                            html += "<td>"+result.end_filial+"</td>";
                            html += "</tr>";
                            $("#cad_filial").empty().html(html);
                        }

                        if(Modal == 3){
                            html += "<tr>";
                            html += "<td>"+result.id_hist+"</td>";
                            html += "<td>"+result.cod_hist+"</td>";
                            html += "<td>"+result.desc_hist+"</td>";
                            html += "</tr>";
                            $("#HistoricoModal").empty().html(html);
                        }

                        if(Modal == 4){
                            html += "<tr>";
                            html += "<td>"+result.id_plan+"</td>";
                            html += "<td>"+result.cod_plan+"</td>";
                            html += "<td>"+result.tip_plan+"</td>";
                            html += "<td>"+result.grup_plan+"</td>";
                            html += "<td>"+result.clas_plan+"</td>";
                            html += "<td>"+result.desc_plan+"</td>";
                            html += "<td>"+result.cont_plan+"</td>";
                            html += "<td>"+result.cent_plan+"</td>";
                            html += "</tr>";
                            $("#cad_plan").empty().html(html);
                        }

                        if(Modal == 5){
                            html += "<tr>";
                            html += "<td>"+result.id_cent+"</td>";
                            html += "<td>"+result.desc_cent+"</td>";
                            html += "</tr>";
                            $("#cad_cent").empty().html(html);
                        }

                        if(Modal == 6){
                            html += "<tr>";
                            html += "<td>"+result.id_grup+"</td>";
                            html += "<td>"+result.grup_grup+"</td>";
                            html += "<td>"+result.masc_grup+"</td>";
                            html += "<td>"+result.tip_grup+"</td>";
                            html += "<td>"+result.res_grup+"</td>";
                            html += "</tr>";
                            $("#cad_grup").empty().html(html);
                        }

                        if(Modal == 7){
                            html += "<tr>";
                            html += "<td>"+result.id_cent+"</td>";
                            html += "<td>"+result.cod_cent+"</td>";
                            html += "<td>"+result.dec_cent+"</td>";
                            html += "</tr>";
                            $("#cad_moed").empty().html(html);
                        }

                        },
                        error: function (error) {
                            alert("erro");
                        }
                    });
                }

            </script>
        </div>
    </body>

</html>
