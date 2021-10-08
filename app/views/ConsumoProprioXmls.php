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
                <!-- Breadcrumbs-->
                <ol class="breadcrumb" >
                    <li class="breadcrumb-item" >
                        <a href="#" >Cadastros</a >
                    </li >
                    <li class="breadcrumb-item" ><a href="#" >Tabela</a ></li >
                    <li class="breadcrumb-item active" >Produtos</li >
                </ol >
                <!-- Example DataTables Card-->
                <div class="card mb-3" >
                    <div class="card-header" >
                        <div style="font-size:140%;" >
                            <i class="fa fa-table" ></i > Relatório
                            <a href="<?php echo base_url(); ?>livros_controle/tabelaXmls" class="btn btn-primary" style="float: right;" >Voltar</a>
                        </div>
                    </div >
                    <div class="card-body" >
                        <div class="table-responsive" >
                            <table class="table table-bordered" >
                                <thead >
                                    <tr >
                                        <th >
                                            COD.
                                        </th >
                                        <th >
                                            DESC.
                                        </th >
                                        <th >
                                            NCM.
                                        </th >
                                        <th >
                                            CFOP.
                                        </th >
                                        <th >
                                            CFOP Ajust.
                                        </th >
                                        <th >
                                            UNID.
                                        </th >
                                        <th >
                                            QUANT.
                                        </th >
                                        <th >
                                            VALOR UNIT.
                                        </th >
                                        <th >
                                            VALOR TOT
                                        </th >
                                        <th align="center" >CONSUMO PRÓPRIO</th >
                                    </tr >
                                </thead >
                                <tbody >
									<?php foreach ($produtosXML as $prd) { ?>
                                        <tr >
                                            <td >
												<?php echo $prd->cProd; ?>
                                            </td >
                                            <td >
												<?php echo $prd->xProd; ?>
                                            </td >
                                            <td >
												<?php echo $prd->NCM; ?>
                                            </td >
                                            <td >
												<?php echo $prd->CFOP; ?>
                                            </td >
                                            <td class="<?php echo $prd->id_prod_lf; ?>" onclick="AlteraCFOP('<?php echo $prd->cfop_ajust; ?>', '<?php echo $prd->id_prod_lf; ?>');" >
												<?php echo $prd->cfop_ajust; ?>
                                            </td >
                                            <td >
												<?php echo $prd->uCom; ?>
                                            </td >
                                            <td >
												<?php echo $prd->qCom; ?>
                                            </td >
                                            <td >
												<?php echo $prd->vUnCom; ?>
                                            </td >
                                            <td >
												<?php echo $prd->vProd; ?>
                                            </td >
                                            <td align="center" ><input type="checkbox" <?php if($prd->consumo_proprio == 1) echo "checked"; ?> onclick="ConsumoProprio('<?php echo $prd->id_prod_lf; ?>', '<?php echo $prd->consumo_proprio; ?>');" /></td>
                                        </tr >
									<?php } ?>
                                </tbody >
                            </table >
                        </div >
                    </div >
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
        </div >
        <script>

            function AlteraCFOP(CFOP, idPROD){
                if(!$('.id_prod'+ idPROD).length) {
                    //$('.' + idPROD).html('<input onblur="DesfazInput(' + idPROD + ')" onkeyup="SalvarCFOP(' + idPROD + ')" class="id_prod' + idPROD + '" name="icfop_ajust" value="' + $('.' + idPROD).html().trim() + '" />');
                    // $('.id_prod'+ idPROD).focus();
                    $('.' + idPROD).html(selectCFOP($('.' + idPROD).html().trim(), idPROD));
                    $('.id_prod'+ idPROD).val(CFOP);
                }
            }

            function selectCFOP(CFOP, idPROD){
                var html  = '<select class="id_prod' + idPROD + '" onchange="SalvarCFOP(' + idPROD + ')" >';
                    html += '<option value="" ></option>';
                    <?php foreach($CFOPs as $cfop){ ?>
                    html += '<option><?php echo $cfop->CFOP_cfop; ?></option>';
                    <?php } ?>
                    html += '</select>';

                return html;

            }

            function DesfazInput(idPROD){
                $('.' + idPROD).html($('.id_prod'+ idPROD).val());
                $('.id_prod'+ idPROD).remove();
            }

            function SalvarCFOP(id_prod) {
                $.ajax({
                    url: '<?php echo base_url(); ?>livros_controle/SalvarCFOP',
                    type: 'POST',
                    dataType: 'json',
                    data: {id: id_prod, valorAtual: $('.id_prod'+ id_prod).val()},
                    success: function (result){
                        $('.'+ id_prod).css("background", "#ebfaeb");
                        DesfazInput(id_prod);
                    },
                    error: function (){
                        $('.'+ id_prod).css("background", "#ffe6e6");
                    }
                });
            }

            function ConsumoProprio(id, valorAtual) {
                $.ajax({
                    url: '<?php echo base_url(); ?>livros_controle/ConsumoProprioJson',
                    type: 'POST',
                    dataType: 'json',
                    data: {id: id, valorAtual: valorAtual},
                    success: function (result){
                        location.reload();
                    }
                });
            }

        </script>
    </body >
</html >