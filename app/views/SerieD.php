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
<html lang="en" >
    <head >
        <meta charset="utf-8" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
        <meta name="description" content="" >
        <meta name="author" content="" >
        <title >SB Admin - RegistrosWeb</title >
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
        <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js" ></script>
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js" ></script>
        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js" ></script>
        <!-- Page level plugin JavaScript-->
        <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.js" ></script>
        <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.js" ></script>
        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js" ></script>
        <!-- Custom scripts for this page-->
        <script src="<?php echo base_url(); ?>assets/js/sb-admin-datatables.min.js" ></script>
        <!-- Jquery datapicker -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/Calendario/jquery-ui.css">
		<script src="<?php echo base_url(); ?>assets/Calendario/jquery-ui.js"></script>
		<script>
            $(function() {
                $( ".datepicker" ).datepicker();
                $.datepicker.regional['pt-BR'] = {
                    closeText: 'Fechar',
                    prevText: '&#x3c;Anterior',
                    nextText: 'Pr&oacute;ximo&#x3e;',
                    currentText: 'Hoje',
                    monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho',
                        'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun',
                        'Jul','Ago','Set','Out','Nov','Dez'],
                    dayNames: ['Domingo','Segunda-feira','Ter&ccedil;a-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sabado'],
                    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                    dayNamesMin: ['Dom','Seg','Ter','Qua','Qui','Sex','Sab'],
                    weekHeader: 'Sm',
                    dateFormat: 'dd/mm/yy',
                    firstDay: 0,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: ''
                };
                $.datepicker.setDefaults($.datepicker.regional['pt-BR']);

                $('.Numeric').on('keyup', function(k){
                    $(this).val(this.value.replace(/\D/g, ''));
                });

                $('.baseICMS, .aliqICMS').on('input keydown keyup mousedown mouseup select contextmenu drop', function (){
                    var sepDec = '.';

                    var baseICMS = $('.baseICMS').val();
                    var aliqICMS = $('.aliqICMS').val();
                    var val = ((baseICMS * aliqICMS)/100);
                        
                    $('.valICMS').val(number_format(val, 2, '.', ''));
                });

                function number_format(number, decimals, dec_point, thousands_sep) {
                    // Strip all characters but numerical ones.
                    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
                    var n = !isFinite(+number) ? 0 : +number,
                        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                        s = '',
                        toFixedFix = function (n, prec) {
                            var k = Math.pow(10, prec);
                            return '' + Math.round(n * k) / k;
                        };
                    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                    if (s[0].length > 3) {
                        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                    }
                    if ((s[1] || '').length < prec) {
                        s[1] = s[1] || '';
                        s[1] += new Array(prec - s[1].length + 1).join('0');
                    }
                    return s.join(dec);
                }

                $('.moeda').on('input keydown keyup mousedown mouseup select contextmenu drop', function (k) {
                        //Inicia Variaveis
                        var val, dec, tho, sepDec = '.';
                        //Revome o ponto dos centavos
                        val = $(this).val().replace(sepDec, '');
                        //Retira os '0' a esquerda. exp.: 01.00 > 1.00
                        if(val.substr(0, 1) == 0) val = val.substr(1, val.length);
                        //Separa os centavos
                        dec = val.substr(-2, 2);
                        //Preenche com '0' caso decimais sejam de uma casa
                        if(dec.length < 2) dec = '0' + dec;
                        //Separa o valor dos inteiros
                        tho = val.substr(0, val.length-2);
                        //Incluie '0' caso não tenha inteiros ainda. exp.:  .00 > 0.00
                        if(tho.length == 0 || tho == 0) tho = 0;
                        //Inclui o '.' entre decimais e inteiros
                        var result = tho + sepDec + dec;
                        //Caso não tenha valor inclui 0.00
                        $(this).val(val ? result : '0'+ sepDec +'00');
                });

                $.fn.inputFilter = function(inputFilter) {
                    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                        if (inputFilter(this.value)) {
                            this.oldValue = this.value;
                            this.oldSelectionStart = this.selectionStart;
                            this.oldSelectionEnd = this.selectionEnd;
                        } else if (this.hasOwnProperty("oldValue")) {
                            this.value = this.oldValue;
                            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                        } else {
                            this.value = "";
                        }
                    });
                };

                $('.moeda').inputFilter(function(value) { return /^-?\d*[.,]?\d{0,2}$/.test(value); });

            });
		</script>
    </head >
    <body class="fixed-nav sticky-footer bg-blue" id="page-top" >
        <!-- Navigation-->
        <?php 
            $data = array('CarregaEmpr' => $this->admin_model->CarregaInfoEmpLogada("tab_emp_lf", $logEmpr));
            $this->load->view("menu_nav", $data);
        ?>
        <div class="content-wrapper" >
            <div class="container-fluid" >
			<?php echo $this->session->flashdata('msg'); ?>
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
                        <span style="font-size: 20px;"><i class="fa fa-pencil" ></i> Cadastro de Nota Fiscal Serie D</span>
                    </div>
                    <div class="card-body">
                        <form id="cadSerieD" action="<?php echo base_url(); ?>livros_controle/cadSerieD" method="post" >
                            <div class="form-group" >
                                <div class="form-row" >
                                    <div class="col-md-2" >
                                        <label class="col-form-label" >ID</label>
                                        <input type="text" class="form-control" value="" readonly name="id_tb_sd" id="id_tb_sd" />
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label">Filial</label>
                                        <select class="form-control select2" id="cnpj_cpf" name="cnpj_cpf" >
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
                                    <div class="col-md-1" >
                                        <label class="col-form-label" >Modelo</label>
                                        <input type="text" class="form-control" value="02" name="modelo" id="modelo" />
                                    </div>
                                    <div class="col-md-1" >
                                        <label class="col-form-label" >Serie</label>
                                        <input type="text" class="form-control" value="D" name="serie" id="serie" />
                                    </div>
                                    <div class="col-md-1" >
                                        <label class="col-form-label" >Sub Serie</label>
                                        <input type="text" class="form-control" value="D" name="subSerie" id="subSerie" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" >
                                <div class="form-row" >
                                    <div class="col-md-2" >
                                        <label class="col-form-label" >Data Emissão</label>
                                        <input type="text" class="form-control datepicker" value="" name="dtEmissao" id="dtEmissao" required />
                                    </div>
                                    <div class="col-md-2" >
                                        <label class="col-form-label" >Número Inicial</label>
                                        <input type="text" class="form-control Numeric" value="" name="numInicial" id="numInicial" />
                                    </div>
                                    <div class="col-md-2" >
                                        <label class="col-form-label" >Número Final</label>
                                        <input type="text" class="form-control Numeric" value="" name="numFinal" id="numFinal" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" >
                                <div class="form-row" >
                                    <div class="col-md-2" >
                                        <label class="col-form-label" >Valor Total</label>
                                        <input type="text" class="form-control moeda" value="" name="valorTotal" id="valorTotal" />
                                    </div>
                                    <div class="col-md-2" >
                                        <label class="col-form-label" >Base ICMS</label>
                                        <input type="text" class="form-control moeda baseICMS" value="" name="baseICMS" id="baseICMS" />
                                    </div>
                                    <div class="col-md-2" >
                                        <label class="col-form-label" >Alíquota (%)</label>
                                        <input type="text" class="form-control moeda aliqICMS" value="18.00" name="aliqICMS" id="aliqICMS" />
                                    </div>
                                    <div class="col-md-2" >
                                        <label class="col-form-label" >Valor ICMS</label>
                                        <input type="text" class="form-control moeda valICMS" value="" name="valICMS" id="valICMS" />
                                    </div>
                                    <div class="col-md-2" >
                                        <label class="col-form-label" >Base Isenta ou não Tributada</label>
                                        <input type="text" class="form-control moeda" value="" name="baseIsentaNaoTributada" id="baseIsentaNaoTributada" />
                                    </div>
                                    <div class="col-md-2" >
                                        <label class="col-form-label" >Outras</label>
                                        <input type="text" class="form-control moeda" value="" name="outrosVal" id="outrosVal" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" >
                                <div class="form-row" >
                                    <div class="col-auto text-left" >
                                        <button type="submit" class="btn btn-success block-content" >Finalizar</button>
                                    </div>
                                    <div class="col-auto text-center" >
                                        <button type="button" class="btn btn-danger" onclick="$('input').val(''); $('select').prop('selectedIndex', 0);">Cancelar</button >
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
                                        <th>Empresa</th>
                                        <th >Model - Serie - Sub Serie</th >
                                        <th >Data Emissão</th >
                                        <th >Número Inicial - Número Final</th >
                                        <th >AÇÕES</th >
                                    </tr >
                                </thead >
                                <tfoot >
                                    <tr >
                                        <th >ID</th >
                                        <th>Empresa</th>
                                        <th >Model - Serie - Sub Serie</th >
                                        <th >Data Emissão</th >
                                        <th >Número Inicial - Número Final</th >
                                        <th >AÇÕES</th >
                                    </tr >
                                </tfoot >
                                <tbody >
									<?php foreach ($lista as $regis) { ?>
                                        <tr >
                                            <td ><?php echo $regis->id_tb_sd; ?></td >
                                            <td ><?php echo mask($regis->cnpj_cpf); ?></td >
                                            <td ><?php echo $regis->modelo . ' - ' . $regis->serie . ' - ' . $regis->subSerie; ?></td >
                                            <td ><?php echo implode('/', array_reverse(explode('-', $regis->dtEmissao))); ?></td >
                                            <td ><?php echo $regis->numInicial . ' - ' . $regis->numFinal; ?></td >
                                            <td style="width:18%; text-align: center;" >
                                                <a class="fa fa-pencil btn btn-success Update" onclick="Update($(this))" style="color:#fff;" data-id="<?php echo $regis->id_tb_sd; ?>" ></a >
                                                <a class="fa fa-trash btn btn-danger" id="btn-exclui" onclick="Exclusao(<?php echo $regis->id_tb_sd; ?>);" style="color:#fff;" id="modal-306054" href="#modal-container-1" role="button" data-toggle="modal" ></a >
                                            </td >
                                        </tr >
                                        
                                        <!-- <td ><?php echo $regis->valorTotal; ?></td >
                                        <td ><?php echo $regis->baseICMS; ?></td >
                                        <td ><?php echo $regis->aliqICMS; ?></td >
                                        <td ><?php echo $regis->valICMS; ?></td >
                                        <td ><?php echo $regis->baseIsentaNaoTributada; ?></td >
                                        <td ><?php echo $regis->outrosVal; ?></td > -->
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
                function Update(nwthis) {
					$.ajax({
						url: "<?php echo base_url(); ?>livros_controle/CarregaSerieD",
						type: 'POST',
						dataType: 'json',
						data: {id: nwthis.data("id")},
						success: function (result) {
							$.each(result, function(idx, obj) {
								if(idx == 'dtEmissao') {
									var strDT = obj.split('-');
									$('#' + idx).val(strDT[2] + '/' + strDT[1] + '/' + strDT[0]);
								} else
									$('#' + idx).val(obj);
							});
						},
						error: function (error) {
							console.log(error);
						}
					});
				}

                function myFunction(item, index) {
                    document.getElementById("demo").innerHTML += index + ":" + item + "<br>";
                } 

                function Exclusao(id) {
                    $("#deletar").prop("href", "<?php echo base_url();?>livros_controle/deletarSerieD/" + id);
                }
            </script>
        </div >
    </body >

</html >
