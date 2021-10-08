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
          <?php $data = array('CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf",$id_empr)); $this->load->view("menu_nav",$data);?>
        <div class="content-wrapper">
             <div class="container">
                    <div class="card card-register mx-auto">
                        <div class="card-header">Cadastro de Usuários <a class="btn btn-success" style="color:#fff; float:right;" href="<?php echo base_url();?>livros_controle/index">&#8630 voltar</a></div>
                        <div class="col-md-12" style="margin-bottom: 10px;">
                            <div class="row">
                                <form id="FormBV" enctype="multipart/form-data" role="form" method="POST" action="<?php echo base_url(); ?>livros_controle/CriaUsuario">
                                    <div class="col-md-6 formulario">
                                        <div class="form-group" >
                                            <label style="font-size:20px;" for="Nome">Usuario: </label>
                                            <br/>
                                            <input id="usuario" name="usuario" style="width:290px;height:40px;">
                                        </div>
                                        <div class="form-group" >
                                            <label style="font-size:20px;" for="Nome">Senha: </label>
                                            <br/>
                                            <input type="password" id="senha" name="senha" style="width:290px;height:40px;">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-9">
                                                <button class="btn" type="submit">Cadastro</button>
                                            </div>
                                            <div class="col-md-3">
                                                <button class="btn disabled" disabled id="NovoRegistro" type="button" onclick="
                                                $('#usuario').val('');
                                                $('#senha').val('');
                                                $('#NovoRegistro').attr('disabled', true);
                                                location.reload();" >
                                                 Novo Cadastro
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-header">Cadastros</div>
                        <table class="table table-bordered" style=" width: 100%; margin: 15px 0 0 0; " >
                            <thead>
                                <tr>
                                    <th align="center" >ID</th>
                                    <th>Usuario</th>
                                    <th align="center" style="width: 15%;">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Lista as $registro) {  $id = $registro->id_login; ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $registro->usuario; ?></td>
                                        <td align="center" >
                                            <a style="cursor: pointer; color:#000;" onclick="carregaDados(<?php echo $id; ?>)" ><i class="fa fa-pencil btn btn-primary" style="color:#fff;"></i></a>
                                            &nbsp;
                                            <a style="cursor: pointer; color:#000" onclick="window.location = '<?php echo base_url(); ?>livros_controle/DeletarUsuario/<?php echo $id; ?>'" ><i class="fa fa-trash btn btn btn-danger" style="color:#fff;"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <br/>
                        <br/>
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
            <!-- Logout Modal-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Quer mesmo deslogar?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Click em Logout se realmente deseja deslogar.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">cancelar</button>
                            <a class="btn btn-danger" href="<?php echo base_url(); ?>login_controle/logout">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
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
            <script src="<?php echo base_url();?>assets/js/sb-admin-datatables.min.js"></script>
            <script type="text/javascript" >
                function carregaDados(id) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>livros_controle/CarregaRegistroUsuario',
                        type: 'POST',
                        dataType: 'json',
                        data: {id: id, tabela: "cad_login"},
                        success: function (result) {
                            $("#usuario").val(result.usuario);
                            $("#senha").val(result.senha);
                            $("#NovoRegistro").removeClass("disabled").attr('disabled', false);
                            $("#FormBV").attr('action', "<?php echo base_url(); ?>livros_controle/AtualizaUsuario/" + id);
                        }

                    });
                }
            </script>
        </div>



    </body>

</html>
