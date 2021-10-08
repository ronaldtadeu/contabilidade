<!DOCTYPE html>
<html lang="en" >

    <head >
        <meta charset="utf-8" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
        <meta name="description" content="" >
        <meta name="author" content="" >
        <title >SB Admin - Start Bootstrap Template</title >
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
		<?php $data = array('CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf", $logEmpr));
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
                <!-- CADASTRO DE CFOP -->
                <div class="card mb-3" >
                    <div class="card-header" >
                        <span style="font-size: 20px; "><i class="fa fa-pencil" ></i> Cadastro de CFOP</span>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url(); ?>livros_controle/cad_CFOP" method="post" >
                            <div class="form-group" >
                                <div class="form-row" >
                                    <div class="col-md-2" >
                                        <label class="col-form-label" >ID</label>
                                        <input type="text" class="form-control" value="" readonly name="id_cfop" id="id_cfop" />
                                    </div>
                                    <div class="col-md-3" >
                                        <label class="col-form-label" >CFOP</label>
                                        <input type="text" class="form-control" value="" name="CFOP_cfop" id="CFOP_cfop" />
                                    </div>
                                    <div class="col-auto text-center" >
                                        <label class="col-form-label col-md-12" >&nbsp;</label>
                                        <button type="submit" class="btn btn-success block-content" >Finalizar</button>
                                    </div>
                                    <div class="col-auto text-center" >
                                        <label class="col-form-label col-md-12" >&nbsp;</label>
                                        <button type="button" class="btn btn-danger" onclick=" $('#id_cfop').val(''); $('#CFOP_cfop').val(''); ">Cancelar</button >
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Example DataTables Card-->
                <div class="card mb-3" >
                    <div class="card-header" >
                        <div style="font-size:140%;" >
                            <i class="fa fa-table" ></i > Tabela de cadastro
                        </div >
                    </div >
                    <div class="card-body" >
                        <div class="table-responsive" >
                            <div class="adc_mais" >
                                <a class="btn btn-success" href="<?php echo base_url(); ?>livros_controle/cadastroCFOP" >Adicionar
                                    <span class="fa fa-plus-circle" ></span ></a >
                            </div >
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
                                <thead >
                                    <tr >
                                        <th >ID</th >
                                        <th >CFOP</th >
                                        <th >AÇÕES</th >
                                    </tr >
                                </thead >
                                <tfoot >
                                    <tr >
                                        <th >ID</th >
                                        <th >CFOP</th >
                                        <th >AÇÕES</th >
                                    </tr >
                                </tfoot >
                                <tbody >
									<?php foreach ($lista as $regis) { ?>
                                        <tr >
                                            <td ><?php echo $regis->id_cfop; ?></td >
                                            <td ><?php echo $regis->CFOP_cfop; ?></td >
                                            <td style="width:18%; text-align: center;" >
                                                <a class="fa fa-pencil btn btn-success Update" style="color:#fff;" data-id="<?php echo $regis->id_cfop; ?>" ></a >
                                                <a class="fa fa-trash btn btn-danger" id="btn-exclui" onclick="Exclusao(<?php echo $regis->id_cfop; ?>);" style="color:#fff;" id="modal-306054" href="#modal-container-1" role="button" data-toggle="modal" ></a >
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
            <!--MODAL EXCLUIR-->
            <div class="container-fluid" >
                <div class="row" >
                    <div class="col-md-12" >
                        <div class="modal fade" id="modal-container-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                            <div class="modal-dialog" role="document" >
                                <div class="modal-content" >
                                    <div class="modal-header" >
                                        <div style="margin-left:13%;" class="alert alert-danger alert-dismissable" >
                                            <h4 >
                                                Alerta!
                                            </h4 >
                                            <strong >Exclusão</strong > de registro está em andamento!
                                        </div >
                                    </div >
                                    <div class="modal-body" >
                                        Se você continuar a realizar essa ação, você irá apagar o registro do banco de dados.
                                        <strong >Essa é uma ação sem retorno!</strong >
                                    </div >
                                    <div class="modal-footer" >

                                        <a class="btn btn-danger" id="deletar" style="color:#fff;" >
                                            Continuar mesmo assim
                                        </a >
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal" >
                                            Cancelar
                                        </button >
                                    </div >
                                </div >

                            </div >

                        </div >

                    </div >
                </div >
            </div >
            <script type="text/javascript" >
                $(function () {
                    $(".Update").click(function () {
                        $.ajax({
                            url: "<?php echo base_url(); ?>livros_controle/cadastroCFOP",
                            type: 'POST',
                            dataType: 'json',
                            data: {id: $(this).data("id")},
                            success: function (result) {
                                console.log(result);
                                $("#id_cfop").val(result.id_cfop);
                                $("#CFOP_cfop").val(result.CFOP_cfop);
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    });
                });

                function Exclusao(id) {
                    $("#deletar").prop("href", "<?php echo base_url();?>livros_controle/deletarCFOP/" + id);
                }
            </script >
        </div >
    </body >

</html >
