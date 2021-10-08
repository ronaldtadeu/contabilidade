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
    </head>
        <body class="fixed-nav sticky-footer bg-blue" id="page-top">
        <!-- Navigation-->
        <?php $data = array('CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf",$logEmpr)); $this->load->view("menu_nav",$data);?>
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
              <!-- Example DataTables Card-->
              <div class="card mb-3">
                <div class="card-header">
                    <div style="font-size:140%;">
                      <i class="fa fa-table"></i> Tabela de empresas </div>
                  </div>
                <div class="card-body">
                  <div class="table-responsive">
                      <div class="adc_mais">
                          <a class="btn btn-success" href="<?php echo base_url();?>livros_controle/cadastroEmpr">Adicionar <span class="fa fa-plus-circle"></span></a>
                    </div>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>NOME</th>
                          <th>ATIVIDADE</th>
                          <th>CPF/CNPJ</th>
                          <th>Ações</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>ID</th>
                          <th>NOME</th>
                          <th>ATIVIDADE</th>
                          <th>CPF/CNPJ</th>
                          <th>Ações</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php foreach ($lista as $regis) {
                          switch ($regis->ind_ati_emp_lf) {
                            case '1a':
                                $atividade = "Industrial ou equiparado a industrial";
                              break;
                            case '2a':
                                $atividade = "Outros";
                              break;
                          }
                        ?>
                        <tr>
                          <td><?php echo $regis->id_emp_lf;?></td>
                          <td><?php echo $regis->nome_emp_lf;?></td>
                          <td><?php echo $atividade;?></td>
                          <td><?php echo $regis->cpf_cnpj_emp_lf;?></td>
                          <td style="width:18%;">
                            <?php if($logEmpr == 0){ ?>
                              <center>
                              <a class="fa fa-sign-in btn btn-primary" style="color:#fff;" href="<?php echo base_url();?>login_controle/loginEmprIn/<?php echo $regis->id_emp_lf;?>/<?php echo $id_login;?>"></a>
                            </center>
                            <?php }else{ ?>
                              <a class="fa fa-pencil btn btn-success" style="color:#fff;" href="<?php echo base_url();?>livros_controle/Editempr/<?php echo $regis->id_emp_lf?>"></a>
                              <a class="fa fa-trash btn btn-danger" id="btn-exclui"  onclick="Exclusao(<?php echo $regis->id_emp_lf;?>);" style="color:#fff;" id="modal-306054" href="#modal-container-1" role="button" data-toggle="modal" ></a>
                              <a class="fa fa-eye btn btn-primary" style="color:#fff;" id="modal-306054" href="#modal-ver-<?php echo $regis->id_emp_lf;?>" role="button" class="btn" data-toggle="modal" ></a>
                            <?php }?>
                          </td>
                        </tr>
                        <?php }?>
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
            <?php foreach ($lista as $modal) { ?>
            <div class="modal fade" id="modal-ver-<?php echo $modal->id_emp_lf;?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style=" margin-left:-92%;width:90em;">
                        <div>
                            <div class="alert alert-info alert-dismissable">
                                <center>
                                    <h4>
                                        Informações complementares
                                    </h4>
                                </center>
    			                  </div>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-responsive-lg">
                                            <thead>
                                                    <tr>
                                                       <th>
                                                          ID
                                                        </th>
                                                        <th>
                                                          Razão
                                                        </th>
                                                        <th>
                                                          Fantasia
                                                        </th>
                                                        <th>
                                                          Unidade Federal(UF)
                                                        </th>
                                                        <th>
                                                          Codigo Muncipal
                                                        </th>
                                                        <th>
                                                          Cep
                                                        </th>
                                                        <th>
                                                          Numero
                                                        </th>
                                                        <th>
                                                          Endereço
                                                        </th>
                                                        <th>
                                                          Bairro
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="table-responsive-lg table-light" id="cad_empr">
                                                    <td><?php echo $modal->id_emp_lf;?></td>
                                                    <td><?php echo $modal->nome_emp_lf;?></td>
                                                    <td><?php echo $modal->fantasia_emp_lf;?></td>
                                                    <td><?php echo $modal->uf_emp_lf;?></td>
                                                    <td><?php echo $modal->cod_mun_emp_lf;?></td>
                                                    <td><?php echo $modal->cep_emp_lf;?></td>
                                                    <td><?php echo $modal->numero_emp_lf;?></td>
                                                    <td><?php echo $modal->end_emp_lf;?></td>
                                                    <td><?php echo $modal->bairro_emp_lf;?></td>
                                                </tbody>
                                                <thead>
                                                        <tr>
                                                          <th>
                                                            Complemento
                                                          </th>
                                                          <th>
                                                            Telefone
                                                          </th>
                                                          <th>
                                                            Fax
                                                          </th>
                                                          <th>
                                                            Email
                                                          </th>
                                                          <th>
                                                            Perfil da Empresa
                                                          </th>
                                                          <th>
                                                            Atividade da Empresa
                                                          </th>
                                                          <th>
                                                            Estadual
                                                          </th>
                                                          <th>
                                                            Municipal
                                                          </th>
                                                          <th>
                                                            Suframa
                                                          </th>
                                                          <th>
                                                            Cpf/Cnpj
                                                          </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="table-responsive-lg table-light" id="cad_empr">
                                                          <td><?php echo $modal->compl_emp_lf;?></td>
                                                          <td><?php echo $modal->fone_emp_lf;?></td>
                                                          <td><?php echo $modal->fax_emp_lf;?></td>
                                                          <td><?php echo $modal->email_emp_lf;?></td>
                                                          <td><?php echo $modal->ind_perfil_emp_lf;?></td>
                                                          <td><?php echo $modal->ind_ati_emp_lf;?></td>
                                                          <td><?php echo $modal->insc_est_emp_lf;?></td>
                                                          <td><?php echo $modal->insc_mun_emp_lf;?></td>
                                                          <td><?php echo $modal->suframa_emp_lf;?></td>
                                                          <td><?php echo $modal->cpf_cnpj_emp_lf;?></td>
                                                    </tbody>
                                            </table>
                                            <table class="table table-bordered table-responsive-lg">
                                                      <thead>
                                                              <tr>
                                                                <th>
                                                                  Nome do contador
                                                                </th>
                                                                <th>
                                                                  Crc
                                                                </th>
                                                                <th>
                                                                  Cep
                                                                </th>
                                                                <th>
                                                                  Endereço
                                                                </th>
                                                                <th>
                                                                  Numero
                                                                </th>
                                                                <th>
                                                                  Complemento
                                                                </th>
                                                              </tr>
                                                     </thead>
                                                  <tbody class="table-responsive-lg table-light" id="cad_empr">
                                                      <td><?php echo $modal->nome_contador_emp_lf;?></td>
                                                      <td><?php echo $modal->crc_contador_emp_lf;?></td>
                                                      <td><?php echo $modal->cep_contador_emp_lf;?></td>
                                                      <td><?php echo $modal->end_contador_emp_lf;?></td>
                                                      <td><?php echo $modal->numero_contador_emp_lf;?></td>
                                                      <td><?php echo $modal->compl_contador_emp_lf;?></td>
                                                  </tbody>
                                                  <thead>
                                                          <tr>
                                                            <th>
                                                              Bairro
                                                            </th>
                                                            <th>
                                                              Telefone
                                                            </th>
                                                            <th>
                                                              Fax
                                                            </th>
                                                            <th>
                                                              email
                                                            </th>
                                                            <th>
                                                              Codigo Municipal
                                                            </th>
                                                            <th>
                                                              Cpf/Cnpj
                                                            </th>
                                                          </tr>
                                                  </thead>
                                              <tbody class="table-responsive-lg table-light" id="cad_empr">
                                                <td><?php echo $modal->bairro_contador_emp_lf;?></td>
                                                <td><?php echo $modal->fone_contador_emp_lf;?></td>
                                                <td><?php echo $modal->faxo_contador_emp_lf;?></td>
                                                <td><?php echo $modal->email_contador_emp_lf;?></td>
                                                <td><?php echo $modal->cod_mun_contador_emp_lf;?></td>
                                                <td><?php echo $modal->cpf_cnpj_contador_emp_lf;?></td>
                                              </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                fechar
                            </button>
                        </div>
                    </div>

                </div>

            </div>
          <?php } ?>
            <script type="text/javascript" >
                function Exclusao(id) {
                    $("#deletar").prop("href", "<?php echo base_url();?>livros_controle/deletarEmpr/"+id+"");
                }
            </script>
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
        </div>
    </body>

</html>
