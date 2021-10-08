<!DOCTYPE html>
<html lang="en">
    <body class="fixed-nav sticky-footer bg-blue" id="page-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-blue fixed-top"  id="mainNav">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">ESCRITURAÇÃO FISCAL</a>
            <a class="navbar-brand" style="color:greenyellow;"><span style="color:#fff;">EMPRESA LOGADA:</span> <?php echo (isset($CarregaEmpr->nome_emp_lf)) ? $CarregaEmpr->nome_emp_lf : "Não selecionada"; ?></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                        <a class="nav-link" href="<?php echo base_url(); ?>livros_controle/TrocaEmpresa">
                            <i class="fa fa-fw fa fa-exchange"></i>
                            <span class="nav-link-text">Trocar de Empresa</span>
                        </a>
                    </li>

                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-plus-circle"></i>
                            <span class="nav-link-text">Cadastros</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents">
                            <li>
                                <a href="<?php echo base_url();?>livros_controle/empr/">EMPRESA</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>livros_controle/tabelaPessoas/">PESSOAS</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>livros_controle/Produtos/">PRODUTOS</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>livros_controle/CFOP/">CFOP</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>livros_controle/SerieD/">NOTA FISCAL SERIE D</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>livros_controle/tabelaXmls/">NF-e INCLUIDAS</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>livros_controle/importXml/">IMPORTAR NOTA FISCAL</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa fa-print"></i>
                            <span class="nav-link-text">Relatorios</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents2">
                            <li>
                                <a href="<?php echo base_url();?>relatorios_controle/RelatorioOP_interestaduais">OPERAÇÕES INTERESTADUAIS</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>relatorios_controle/RelatorioEntradaSaida">ENTRADAS / SAÍDAS</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>relatorios_controle/RelatorioLivroEntrada">LIVRO DE ENTRADA / SAÍDA</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents3" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa fa-user"></i>
                            <span class="nav-link-text">Ações com Usuario</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents3">
                            <li>
                                <a href="<?php echo base_url();?>livros_controle/contas/">Cadastros de Login</a>
                            </li>
                        </ul>
                    </li>
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="SINTEGRA" >
						<a class="nav-link" href="<?php echo base_url(); ?>livros_controle/SINTEGRA" >
                            <i class="fa fa-fw fa fa-barcode"></i>
                            <span class="nav-link-text">SINTEGRA</span>
                        </a>
					</li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-fw fa-bell"></i>
                            <span class="d-lg-none">NOVAS ALERTAS
                                <span class="badge badge-pill badge-warning">6 New</span>
                            </span>
                            <span class="indicator text-warning d-none d-lg-block">
                                <i class="fa fa-fw fa-circle"></i>
                            </span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">New Alerts:</h6>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <span class="text-success">
                                    <strong>
                                        <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                                </span>
                                <span class="small float-right text-muted">11:21 AM</span>
                                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <span class="text-danger">
                                    <strong>
                                        <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
                                </span>
                                <span class="small float-right text-muted">11:21 AM</span>
                                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">
                                <span class="text-success">
                                    <strong>
                                        <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
                                </span>
                                <span class="small float-right text-muted">11:21 AM</span>
                                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item small" href="#">View all alerts</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0 mr-lg-2">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Search for...">
                                <span class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="modal fade" id="modal-relatorio-860587" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" id="Tamanho" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myModalLabel" style="color:#1E90FF;">
                                        <!--Titulo é introduzido via js-->
                                    </h5>
                                    <button class="close" type="button" data-dismiss="modal">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="FormRel" enctype="multipart/form-data"  method="POST" action="<?php echo base_url(); ?>livros_controle/cad_eve">
                                        <!--Relatorio Diario, Razão, Livro Caixa-->
                                        <div id="DivCampos" class="">
                                            <div class="col-md-12">
                                                <h1 style="font-size:15px; margin-left:-1.5%;">Diario <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <label for="exampleInputEmail1">Conta Inicial</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="exampleInputEmail1">Conta Final</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <!--Segunda Parte-->
                                            <div class="col-md-12">
                                                <h1 style="font-size:15px; margin-left:-1.5%;">Periodo <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <label for="exampleInputEmail1">Inicial</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="exampleInputEmail1">Final</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <!--Terceira Parte-->
                                            <div class="col-md-12">
                                                <h1 style="font-size:15px; margin-left:-1.5%;">Totais <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <select class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                            <option value="1">Diarios</option>
                                                            <option selected="" value="2">Mensais</option>
                                                            <option value="3">Acumulados</option>
                                                            <option value="4">Nenhum</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <!--Quarta Parte-->
                                            <div class="col-md-12">
                                                <h1 style="font-size:15px; margin-left:-1.5%;">Grupo Contabil <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <select class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                            <option value="1">Diarios</option>
                                                            <option value="2">Mensais</option>
                                                            <option value="3">Acumulados</option>
                                                            <option value="4">Nenhum</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <!--Quinta Parte-->
                                            <div class="col-md-12" id="divInput3">
                                                <strong><label>Emitir conta com saldo zero?</label></strong>
                                                <div style="background-color:#DCDCDC; float:right; margin-right:6em;">
                                                    <label>Sim</label>
                                                    <input type="checkbox" name="vehicle1" value="Bike">
                                                    <label>Não</label>
                                                    <input type="checkbox" name="vehicle1" checked="true" value="Bike">
                                                </div>
                                                <hr>
                                            </div>
                                            <!--sexta Parte-->
                                            <div class="col-md-12">
                                                <h1 style="font-size:15px; margin-left:-1.5%;">Emitir numero do lançamento? <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <select class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                            <option value="1">Sim</option>
                                                            <option value="2">Não</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <!--setima Parte-->
                                            <div class="col-md-12">
                                                <h1 style="font-size:15px; margin-left:-1.5%;">Diversos <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <label for="exampleInputEmail1">Conta Inicial</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary btn-block" >Incluir <span><i class="fa fa-check-circle" style="color:greenyellow;"></i></span></button>
                                            </div>
                                        </div>
                                        <!--Relatorio Balancete e Balanço-->
                                        <div id="DivCampos2" class="">
                                            <div class="form-group" >
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <h1 style="font-size:15px;">Diario <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                                    </div>
                                                    <div class="col-md-6" style="border-left: 1px solid #DCDCDC;">
                                                        <h1 style="font-size:15px;">Período <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                                    </div>
                                                    <div class="col-md-3" style="">
                                                        <label for="exampleInputEmail1">Conta Inicial</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Conta Final</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                    <div class="col-md-3" style="border-left: 1px solid #DCDCDC;">
                                                        <label for="exampleInputEmail1">Inicial</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Final</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <!--Segunda Parte-->
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="col-md-12">
                                                            <h1 style="font-size:15px;">Modelo <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                                <option value="1">Diarios</option>
                                                                <option selected="" value="2">Mensais</option>
                                                                <option value="3">Acumulados</option>
                                                                <option value="4">Nenhum</option>
                                                            </select>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <label for="exampleInputEmail1">Grupo Contabil</label>
                                                            <select class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                                <option value="1">Diarios</option>
                                                                <option selected="" value="2">Mensais</option>
                                                                <option value="3">Acumulados</option>
                                                                <option value="4">Nenhum</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" style="border-left: 1px solid #DCDCDC;">
                                                        <div class="col-md-12" >
                                                            <h1 style="font-size:15px;">Contas <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="checkbox" name="vehicle1" value="Bike">
                                                            <strong><label>Titulo </label></strong>
                                                            <div style="float:right; ">
                                                                <strong><label> Com Movimento: </label></strong>
                                                                <div style="background-color:#DCDCDC; float:right; margin-left:1.3em;">
                                                                    <label>Sim</label>
                                                                    <input type="checkbox" name="vehicle1" value="Bike">
                                                                    <label>Não</label>
                                                                    <input type="checkbox" checked="true" name="vehicle1" value="Bike">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <input type="checkbox" name="vehicle1" value="Bike">
                                                            <strong><label>Anali.</label></strong>
                                                            <div style="float:right; ">
                                                                <strong><label>Com Movimento: </label></strong>
                                                                <div style="background-color:#DCDCDC; float:right; margin-left:1.3em;">
                                                                    <label>Sim</label>
                                                                    <input type="checkbox" name="vehicle1" value="Bike">
                                                                    <label>Não</label>
                                                                    <input type="checkbox" checked="true" name="vehicle1" value="Bike">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                             <!--Terceira Parte-->
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="col-md-12">
                                                            <h1 style="font-size:15px;">Dados da Empresa <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="exampleInputEmail1">Titular da Empresa ou seu Repres.legal</label>
                                                            <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <label for="exampleInputEmail1">Contador/tecnico em Contabilidade+CRC</label>
                                                            <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                        </div>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-6" style="border-left: 1px solid #DCDCDC;">
                                                        <div class="col-md-12" >
                                                            <h1 style="font-size:15px;">Diversos <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <strong><label>Emitir conta com saldo zero?</label></strong>
                                                            <div style="background-color:#DCDCDC; float:right;">
                                                                <label>Sim</label>
                                                                <input type="checkbox" name="vehicle1" value="Bike">
                                                                <label>Não</label>
                                                                <input type="checkbox" name="vehicle1" value="Bike">
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <div>
                                                                <strong><label>Data: </label></strong>
                                                                <input class="form-control" type="text" name="vehicle1" value="Bike"/>
                                                            </div>
                                                            <div>
                                                                <strong><label>Num.Inicial: </label></strong>
                                                                <input class="form-control" type="text" name="vehicle1" value="Bike"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="divInput" class="col-md-6">
                                                        <strong><label for="exampleInputEmail1">Numero da Folha de verificação</label></strong>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                    <div class="col-md-6" id="divInput2" style="width:50%;">
                                                        <strong><label for="exampleInputEmail1">Valor do Resultado do Balanço</label></strong>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary btn-block" >Incluir <span><i class="fa fa-check-circle" style="color:greenyellow;"></i></span></button>
                                            </div>
                                        </div>
                                        <!--Relatorio Termo Abertura-->
                                        <div id="DivCampos3" class="">
                                            <div class="form-group" >
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <h1 style="font-size:15px;">Diario <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                                    </div>
                                                    <div class="col-md-6" style="border-left: 1px solid #DCDCDC;">
                                                        <h1 style="font-size:15px;">Período <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                                    </div>
                                                    <div class="col-md-3" style="">
                                                        <label for="exampleInputEmail1">Conta Inicial</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Conta Final</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                    <div class="col-md-3" style="border-left: 1px solid #DCDCDC;">
                                                        <label for="exampleInputEmail1">Inicial</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Final</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <!--Terceira Parte-->
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <div class="col-md-12">
                                                            <h1 style="font-size:15px;">Modelo <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <select class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                                <option value="1">Diarios</option>
                                                                <option selected="" value="2">Mensais</option>
                                                                <option value="3">Acumulados</option>
                                                                <option value="4">Nenhum</option>
                                                            </select>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <label for="exampleInputEmail1">Grupo Contabil</label>
                                                            <select class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                                <option value="1">Diarios</option>
                                                                <option selected="" value="2">Mensais</option>
                                                                <option value="3">Acumulados</option>
                                                                <option value="4">Nenhum</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" style="border-left: 1px solid #DCDCDC;">
                                                        <div class="col-md-12" >
                                                            <h1 style="font-size:15px;">Contas <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <input type="checkbox" name="vehicle1" value="Bike">
                                                            <strong><label>Titulo </label></strong>
                                                            <div style="float:right; ">
                                                                <strong><label> Com Movimento: </label></strong>
                                                                <div style="background-color:#DCDCDC; float:right; margin-left:1.3em;">
                                                                    <label>Sim</label>
                                                                    <input type="checkbox" name="vehicle1" value="Bike">
                                                                    <label>Não</label>
                                                                    <input type="checkbox" name="vehicle1" value="Bike">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="col-md-12">
                                                            <input type="checkbox" name="vehicle1" value="Bike">
                                                            <strong><label>Anali.</label></strong>
                                                            <div style="float:right; ">
                                                                <strong><label>Com Movimento: </label></strong>
                                                                <div style="background-color:#DCDCDC; float:right; margin-left:1.3em;">
                                                                    <label>Sim</label>
                                                                    <input type="checkbox" name="vehicle1" value="Bike">
                                                                    <label>Não</label>
                                                                    <input type="checkbox" name="vehicle1" value="Bike">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <!--Quarta Parte-->
                                            <div class="col-md-12">
                                                <h1 style="font-size:15px; margin-left:-1.5%;">Grupo Contabil <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <select class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                            <option value="1">Diarios</option>
                                                            <option value="2">Mensais</option>
                                                            <option value="3">Acumulados</option>
                                                            <option value="4">Nenhum</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <!--Quinta Parte-->
                                            <div class="col-md-12">
                                                <h1 style="font-size:15px; margin-left:-1.5%;">Emitir numero do lançamento? <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <select class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                            <option value="1">Sim</option>
                                                            <option value="2">Não</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <!--Quinta Parte-->
                                            <div class="col-md-12">
                                                <h1 style="font-size:15px; margin-left:-1.5%;">Diversos <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <label for="exampleInputEmail1">Conta Inicial</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary btn-block" >Incluir <span><i class="fa fa-check-circle" style="color:greenyellow;"></i></span></button>
                                            </div>
                                        </div>
                                        <!--Conferencia dos Lancadmentos-->
                                        <div id="DivCampos4" class="">
                                            <div class="col-md-12">
                                                <h1 style="font-size:15px; margin-left:-1.5%;">Diario <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <label for="exampleInputEmail1">Lanc. Inicial</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="exampleInputEmail1">Lanc. Final</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <!--Segunda Parte-->
                                            <div class="col-md-12">
                                                <h1 style="font-size:15px; margin-left:-1.5%;">Conta <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <label for="exampleInputEmail1">Cont. Inicial</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="exampleInputEmail1">Cont. Final</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <!--Terceira Parte-->
                                            <div class="col-md-12">
                                                <h1 style="font-size:15px; margin-left:-1.5%;">Periodo <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-6">
                                                        <label for="exampleInputEmail1">Inicial</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="exampleInputEmail1">Final</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <!--Terceira Parte-->
                                            <div class="col-md-12">
                                                <h1 style="font-size:15px; margin-left:-1.5%;">Lote <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <!--Quarta Parte-->
                                            <div class="col-md-12">
                                                <h1 style="font-size:15px; margin-left:-1.5%;">Grupo Contabil <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <select class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                            <option value="1">Diarios</option>
                                                            <option value="2">Mensais</option>
                                                            <option value="3">Acumulados</option>
                                                            <option value="4">Nenhum</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <!--Quinta Parte-->
                                            <div class="col-md-12">
                                                <h1 style="font-size:15px; margin-left:-1.5%;">Diversos <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <label for="exampleInputEmail1">Numeração inical do diario</label>
                                                        <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary btn-block" >Incluir <span><i class="fa fa-check-circle" style="color:greenyellow;"></i></span></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">
                                        Sair
                                    </button>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
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
                        <a class="btn btn-danger" href="<?php echo base_url(); ?>login_controle/logout/1">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>
