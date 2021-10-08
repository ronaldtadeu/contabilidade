<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>SB Admin - Start Bootstrap Template</title>
        <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
        <!-- Bootstrap core CSS-->
        <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"
            type="text/css">
        <!-- Custom styles for this template-->
        <link href="<?php echo base_url();?>assets/css/sb-admin.css" rel="stylesheet">
        <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <link href="<?php echo base_url();?>assets/css/estilo_importaxml.css" rel="stylesheet">
        <script src="<?php echo base_url();?>assets/js/importaxml.js"></script>
        <script>

        // Função para a exclusão de NFCe ainda não incluidas
        function showSelectedValues(iexc = 0) {
            id_xml_excluir = $("input[name=check_individual]:checked").eq(iexc);
            
            $.ajax({
                url: "<?php echo base_url();?>livros_controle/deletarXmlJason/",
                dataType: "json",
                type: "POST",
                data: {id: id_xml_excluir.val(), caminho: id_xml_excluir.data( "caminho" )},
                complete: function () {
                    iexc++;

                    if($("input[name=check_individual]:checked").eq(iexc).val() != undefined){
                        if(iexc == 1){
                            modalLoading(2);
                        }else{
                            modalLoading(1);
                        }
                        showSelectedValues(iexc);
                     }else {
                        modalLoading(3);
                        $(".eliminado").remove();
                        alert("Registros Eliminados com sucesso!");
                        //Incluir aqui o script para add um tr no body falando que não existe registro na tabela
                    }
                },
                success: function (res) {
                    if(res == 1){
                        id_xml_excluir.parent().parent().addClass('eliminado');
                    }else{

                    }
                }
            });
        }

        function modalLoading(estado){
            if(estado == 1){

            }else if(estado == 2){
                $('#Carregamento').modal('show');
            }else{
                $('#Carregamento').modal('hide');
            }
        }

        $(document).ready(function(){  
            
            $("#selectAll").click(function(){
                $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
            });
            
                var lista = 0;
                $.ajax({
                        url: '<?php echo base_url();?>livros_controle/listaNFEnaoinclusa',
                        type:'post',
                        dataType: 'json',
                        success: function(result) {

                            $(result).each(function() {
                                var html = "<tr>";
                                    html += "<td><input data-caminho='"+ result[lista].caminho_nom_xml +"' name='check_individual' class='check_individual ck"+ result[lista].id_xml +"' type='checkbox' value='"+ result[lista].id_xml +"' /></td>";
                                    html += "<td>"+ result[lista].id_xml +"</td>";
                                    html += "<td>"+ result[lista].nom_xml +"</td>";
                                    html += "</tr>";

                                $("#tabelalog").append(html);
                                lista++;
                            });


                        }
                });
        });
        </script>
    </head>
    <body class="fixed-nav sticky-footer bg-blue" id="page-top">
        <!-- Navigation-->
        <?php $data = array('CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf",$id_empr)); $this->load->view("menu_nav",$data);?>
        <form name="fileUpload" id="fileUpload" method="POST" action="javascript:void(0);" enctype="multipart/form-data">
            <div class="content-wrapper">
                <div class="container">
                    <div class="card card-register mx-auto">
                        <div class="card-header">upload das notas fiscais (XML).<a class="btn btn-success"
                            style="color:#fff; float:right;" href="<?php echo base_url();?>contabi_controle/index">
                            voltar</a>
                        </div>
                        <br />
                        <div class="col-md-12">
                            <div class="row">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="upload_box">
                                                <div class="file_browser files">
                                                    <input type="file" name="multiple_files[]" id="_multiple_files" class="hide_broswe"  accept=".xml" multiple />
                                                </div>
                                            </div>
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
                            <div  style="font-size:140%;">
                                <i class="fa fa-table"></i> Notas Fiscais
                                <div class="file_upload" style="float: right;"><input type="submit" value="Incluir Todas" class="btn btn-info upload_button" /> </a>
                                <a data-toggle="modal" data-target="#modalnfeNinfluidas" style="color:#fff;" class="btn btn-warning">LOG <i class="fa fa-eye"></i></a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-2">
                                        <p id="total_progress">
                                            S/Arquivo
                                        </p>
                                    </div>
                                    <div style="margin-top:4px;" class="col-md-10">
                                        <div class="progress">
                                            <div class="progress-bar">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr class="topo">
                                            <th>Tipo</th>
                                            <th>Informações</th>
                                            <th>Ação/Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="file_boxes">
                                        <tr class="corpo">
                                            <td valign="top" colspan="5" style="text-align:center;" >Nenhum arquivo Adicionado!</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <span id="removed_files"></span>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <div class="modal fade" id="modalnfeNinfluidas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" style="width: 1050px; margin: auto;" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h5 style="margin-top:10px;" class="modal-title" id="exampleModalLabel">Lista de NF-e não inclusas</h5>
                                    </div>
                                    <div style="text-align:center;" class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Ações Globais</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a class='fa fa-download  btn btn-primary' onclick="document.location = '<?php echo base_url(); ?>livros_controle/IncluirNFeTotais', $('#Carregamento').modal('show');" style='color:#fff;'></a>  
                                                <a class='fa fa-trash btn btn-danger' onclick="showSelectedValues();" id='btn-exclui' style='color:#fff;'></a>
                                            </div>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th><input id="selectAll" class="check-todos" type="checkbox" value="" /></th>
                                            <th>ID </th>
                                            <th>NOME</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabelalog">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
                        </div>
                        </div>
                    </div>
                </div>
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
                <!-- MODAL ENVIO TERMINADO -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="modal fade" id="EnvioConcluido" role="dialog" aria-labelledby="myModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div style="text-align:center;" class="modal-header">
                                            <div class="alert alert-success alert-dismissable">
                                                <strong> Alerta!</strong> Todos os Itens passaram pela etapa com sucesso!
                                            </div>
                                        </div>
                                        <div style="text-align:center;" class="modal-body">
                                        Os registros passsaram pela etapa de Inclusão do Sistema. <strong>Atenção! verifique o log e veja se houve erros em sua inclusão!</strong>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Sair
                                            </button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                   <!-- MODAL LOADING -->
                   <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="modal fade" id="Carregamento" role="dialog" aria-labelledby="myModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div style="text-align:center;" class="modal-body">
                                            <h1>Processando...</h1>
                                            <img src="<?php echo base_url();?>assets/file_icons/carrega.gif"/>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
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
            </div>
        </form>
    </body>
</html>