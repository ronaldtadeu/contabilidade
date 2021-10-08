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
    <title>Escrituração fiscal</title>
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script>
    $(function() {
        $('.select2').select2({
            placeholder: "Selecione uma opção",
            allowClear: true
        });
    });

    function AlteraSituacaoNFe(campo, id_xml) {
        $.ajax({
            url: '<?php echo base_url(); ?>livros_controle/AlteraSituacaoNFe',
            type: 'POST',
            dataType: 'json',
            data: {
                campo: campo.val(),
                id_xml: id_xml
            },
            success: function(result) {
                alert('Registro de ID ' + id_xml + ', alterado com sucesso!');
            },
            error: function() {
                alert('Erro ao alterar situação!')
            }
        });
    }

    function AlteraAntecipacao(campo, id_xml) {
        $.ajax({
            url: '<?php echo base_url(); ?>livros_controle/AlteraAntecipacao',
            type: 'POST',
            dataType: 'json',
            data: {
                campo: campo.val(),
                id_xml: id_xml
            },
            success: function(result) {
                alert('Registro de ID ' + id_xml + ', alterado com sucesso!');
            },
            error: function() {
                alert('Erro ao alterar situação!');
            }
        });
    }

    var ArqAtt = 0;
    var porcent = 0;
    var lastId_p = 0;

    function SyncDadosNota(lastId = 0, TotalList = 0, unico = false) {
        $('.loading_p').css('display', 'block');

        $.ajax({
            url: "<?php echo base_url(); ?>livros_controle/SyncDadosNota",
            type: 'POST',
            data: {
                lastId: lastId,
                unico: unico
            },
            dataType: 'json',
            success: function(res) {
                lastId_p = res['lastId'];
                ArqAtt += res['count'];
                porcent = (Math.ceil((ArqAtt / TotalList) * 100));

                $("#CountArq").text(porcent + "%");

                if (res['bool']) {
                    SyncDadosNota(lastId_p, TotalList, unico);
                } else {
                    if(res['error'].length > 0) {
                        var msgErr = "Os seguintes 'ID' das notas obteram os erros: \n\n";
                        $.each(res['error'], function() {
                            console.log(this);
                            msgErr += "ID: " + this.id + ", Descrição: " + this.erro + "\n";
                        });
                        
                        alert(msgErr);
                    }

                    alert('Dados das notas atualizados com sucesso!');

                    $('.loading_p').css('display', 'none');
                    ArqAtt = 0;
                    porcent = 0;
                    lastId_p = 0;
                }
            },
            error: function() {
                if (lastId_p == 0 || !lastId_p) {
                    alert('Erro! Concluídos: ' + porcent + '%');
                    $('.loading_p').css('display', 'none');
                    ArqAtt = 0;
                    porcent = 0;
                    $("#CountArq").text(porcent + "%");
                } else
                    SyncDadosNota((parseInt(lastId_p) + 1), TotalList, unico);
            }
        });
    }
    </script>
    <style>
    .loading_p {
        top: 0px;
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgba(240, 240, 240, .6);
        z-index: 200;
        display: none;
    }

    .loading_p img {
        width: 55px;
    }

    .loading_p span {
        text-align: center;
        top: 20vw;
        left: 40vw;
        position: absolute;
        font-weight: bolder;
    }
    </style>
</head>

<body class="fixed-nav sticky-footer bg-blue" id="page-top">
    <!-- Navigation-->
    <?php 
        $data = array('CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf", $id_empr)); 
        $this->load->view("menu_nav", $data);?>
    <div class="content-wrapper">
        <!-- CARREGANDO -->
        <div class="loading_p">
            <span>
                <img src="<?php echo base_url(); ?>assets/images/loading.gif">
                <br />
                Carregando <b id="CountArq">0%</b>
            </span>
        </div>

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
                    <div style="font-size: 140%;">
                        <i class="fa fa-table"></i> Tabela de cadastro
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <div class="col-sm-4" >
                            <label for="cnpj_cpf">Filial: &nbsp;</label>
                            <select class="select2" id="cnpj_cpf" style="width: 20vw;">
                                <optgroup label="Matriz" >
                                    <option value="<?php echo $data['CarregaEmpr']->cpf_cnpj_emp_lf; ?>" <?php echo ($filialSelected == $data['CarregaEmpr']->cpf_cnpj_emp_lf) ? "selected" : ""; ?> ><?php echo mask($data['CarregaEmpr']->cpf_cnpj_emp_lf); ?> - <?php echo $data['CarregaEmpr']->fantasia_emp_lf; ?></option>
                                </optgroup>
                                <optgroup label="Filiais" >
                                <?php foreach($filiais as $filial) { ?>
                                    <option value="<?php echo $filial->CNPJ_filial; ?>" <?php echo ($filialSelected == $filial->CNPJ_filial) ? "selected" : ""; ?> ><?php echo mask($filial->CNPJ_filial); ?> - <?php echo $filial->fantasia_filial; ?></option>
                                <?php } ?>
                                </optgroup>
                            </select>
                            <button class="btn btn-success btn-sm" onclick="window.location = '<?php echo base_url(); ?>livros_controle/tabelaXmls/' + $('#cnpj_cpf').val();" ><i class="fa fa-search" ></i></button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div class="adc_mais" style="margin-left: 30vw;" >
                            <a class="btn btn-success"
                                href="<?php echo base_url(); ?>livros_controle/cadastrosXml"><span
                                    class="fa fa-plus-circle"></span> Adicionar </a>
                            <a class="btn btn-warning" onclick="SyncDadosNota(0, <?php echo count($ListaXmls); ?>)"><i
                                    class="fa fa fa-refresh"></i> Sincronizar Dados NF-e </a>
                        </div>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tomador / Destinatário</th>
                                    <th>Data</th>
                                    <th>Tipo</th>
                                    <th>Nº NFe</th>
                                    <th>Cod. Antecipação</th>
                                    <th>Situação</th>
                                    <th>AÇÕES</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Tomador / Destinatário</th>
                                    <th>Data</th>
                                    <th>Tipo</th>
                                    <th>Nº NFe</th>
                                    <th>Cod. Antecipação</th>
                                    <th>Situação</th>
                                    <th>AÇÕES</th>
                                </tr>
                            </tfoot>
                            <tbody class="status_lancamento_naolanc">
                                <?php foreach ($ListaXmls as $xml){ ?>
                                <tr>
                                    <td><?php echo $xml->id_xml;?></td>
                                    <td><?php echo $xml->xNome_pessoas_lf != '0' ? $xml->xNome_pessoas_lf : "Nota do consumidor";?></td>
                                    <td><span style="display: none;" ><?php echo $xml->dhEmi_nfe;?></span> <?php echo implode('/', array_reverse(explode('-', $xml->dhEmi_nfe)));?></td>
                                    <td><?php echo $xml->tipo_nota == 'E' ? "Entrada" : ($xml->tipo_nota == 'S' ? "Saída" : "");?></td>
                                    <td><?php echo $xml->nNF_nfe;?></td>
                                    <td style="width:13%;">
                                        <select class="form-control select2" style="width: 300px;"
                                            onchange="AlteraAntecipacao($(this), <?php echo $xml->id_xml; ?>);">
                                            <option></option>
                                            <option value="1"
                                                <?php if($xml->cod_antecipacao == 1) { echo "selected"; } ?>>Pagamento
                                                de substituição tributária efetuada pelo destinatário, quando não
                                                efetuada ou efetuada a menor pelo substituto.</option>
                                            <option value="2"
                                                <?php if($xml->cod_antecipacao == 2) { echo "selected"; } ?>>Antecipação
                                                tributária efetuada pelo destinatário apenas com complementação do
                                                diferencial de alíquota</option>
                                            <option value="4"
                                                <?php if($xml->cod_antecipacao == 4) { echo "selected"; } ?>>Antecipação
                                                tributária com MVA (Margem de Valor Agregado), efetuada pelo
                                                destinatário, encerrando a fase de tributação.</option>
                                            <option value="5"
                                                <?php if($xml->cod_antecipacao == 5) { echo "selected"; } ?>>
                                                Substituição tributária interna motivada por regime especial de
                                                tributação.</option>
                                            <option value="6"
                                                <?php if($xml->cod_antecipacao == 6) { echo "selected"; } ?>>ICMS pago
                                                na importação.</option>
                                            <option value=" "
                                                <?php if($xml->cod_antecipacao == " ") { echo "selected"; } ?>>
                                                Substituição Tributária informada pelo substituto ou pelo substituído
                                                que não incorra em nenhuma das situações anteriores.</option>
                                        </select>
                                    </td>
                                    <td style="width:13%;">
                                        <select class="form-control select2" style="width: 300px;"
                                            onchange="AlteraSituacaoNFe($(this), <?php echo $xml->id_xml; ?>);">
                                            <option value="N" <?php if($xml->situacao == 'N') { echo "selected"; } ?>>N
                                                - Documento Fiscal Normal</option>
                                            <option value="S" <?php if($xml->situacao == 'S') { echo "selected"; } ?>>S
                                                - Documento Fiscal Cancelado</option>
                                            <option value="E" <?php if($xml->situacao == 'E') { echo "selected"; } ?>>E
                                                - Lançamento Extemporâneo de Documento Fiscal Normal</option>
                                            <option value="X" <?php if($xml->situacao == 'X') { echo "selected"; } ?>>X
                                                - Lançamento Extemporâneo de Documento Fiscal Cancelado</option>
                                            <option value="2" <?php if($xml->situacao == '2') { echo "selected"; } ?>>2
                                                - Documento com uso denegado - exclusivamente para uso dos emitentes de
                                                Nota Fiscal Eletrônica, modelo 55, Conhecimento de Transporte
                                                Eletrônico, modelo 57 e Conhecimento de Transporte Eletrônico para
                                                Outros Serviços, modelo 67</option>
                                            <option value="4" <?php if($xml->situacao == '4') { echo "selected"; } ?>>4
                                                - Documento com uso inutilizado - exclusivamente para uso dos emitentes
                                                de Nota Fiscal Eletrônica, modelo 55, Conhecimento de Transporte
                                                Eletrônico, modelo 57 e Conhecimento de Transporte Eletrônico para
                                                Outros Serviços, modelo 67</option>
                                        </select>
                                    </td>
                                    <td style="width:15%;">
                                        <a class="fa fa-eye btn btn-info" style="color:#fff;"
                                            href="<?php echo base_url();?>livros_controle/VerNfe/<?php echo $xml->id_xml;?>"></a>
                                        <a class="fa fa-trash btn btn-danger" id="btn-exclui"
                                            onclick="Exclusao(<?php echo $xml->id_xml;?>);" style="color:#fff;"
                                            id="modal-306054" href="#modal-container-1" role="button"
                                            data-toggle="modal"></a>
                                        <a class="fa fa-archive btn btn-success" title="Produtos: Consumo próprio"
                                            href="<?php echo base_url();?>livros_controle/ConsumoProprio/<?php echo $xml->id_xml;?>"></a>
                                        <a class="fa fa-refresh btn btn-warning" title="Sincronizar arquivo"
                                            onclick="SyncDadosNota(<?php echo $xml->id_xml;?>, <?php echo count($ListaXmls); ?>, true)"></a>
                                    </td>
                                </tr>
                                <?php } ?>
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

        <script type="text/javascript">
        function Exclusao(id) {
            $("#deletar").prop("href", "<?php echo base_url();?>livros_controle/deletarXmlLancado/" + id + "");
        }

        function VerificaExclusao(id, id_tab, id_bd) {
            $.ajax({
                url: '<?php echo base_url(); ?>livros_controle/VerificaExclusao',
                type: 'POST',
                dataType: 'json',
                data: {
                    id_tab: id,
                    tabela: "lancamentos",
                    id_lanc: id_bd
                },
                success: function(result) {
                    if (id_empr == result.id_cod_em) {
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