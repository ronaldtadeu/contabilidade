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
    </head>
    <?php
    if ($pagina == 1) {
        $link = "empr";
    } elseif ($pagina == 2) {
        $link = "filial";
    } elseif ($pagina == 3) {
        $link = "hist";
    } elseif ($pagina == 4) {
        $link = "plan";
    } elseif ($pagina == 5) {
        $link = "cent";
    } elseif ($pagina == 6) {
        $link = "grup";
    } elseif ($pagina == 7) {
        $link = "moed";
    }
    ?>
    <body class="fixed-nav sticky-footer bg-blue" id="page-top">
        <!-- Navigation-->
         <nav class="navbar navbar-expand-lg navbar-dark bg-blue fixed-top"  id="mainNav">
            <a class="navbar-brand" href="index.html">SISTEMA DE CONTABILIDADE</a>
            &nbsp; 
            &nbsp; 
            <a style="color:#fff;">|</a>
            &nbsp; 
            &nbsp; 
            <a class="navbar-brand" style="color:#dc3545;">NECESSITA LOGAR EM UMA EMPRESA!</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                        <a class="nav-link">
                            <i class="fa fa-fw fa-ban" style="color:#dc3545;"></i>
                            <span class="nav-link-text" style="cursor:auto; color:#fff;"> Botões desabilitados</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                        <a class="nav-link" style="background-color:#cccccc; cursor:default; color:#fff;">
                            <i class="fa fa-fw fa-area-chart"></i>
                            <span class="nav-link-text">Trocar de Empresa</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed disabled" style="background-color:#cccccc;" data-toggle="collapse" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Cadastros</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents">
                            <li>
                                <a href="<?php echo base_url();?>contabi_controle/empr">Empresa</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>contabi_controle/filial">Filial</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>contabi_controle/hist">Historicos</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>contabi_controle/plan">Plano de Contas</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>contabi_controle/cent">Centro de Custo</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>contabi_controle/grup">Grupos Contabeis</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url();?>contabi_controle/contas">Usuários</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                        <a class="nav-link" style="background-color:#cccccc; cursor:default; color:#fff;">
                            <i class="fa fa-fw fa-area-chart"></i>
                            <span class="nav-link-text">Lançamento</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                        <a class="nav-link nav-link-collapse collapsed disabled" style="background-color:#cccccc;" data-toggle="collapse" data-parent="#exampleAccordion">
                            <i class="fa fa-fw fa-wrench"></i>
                            <span class="nav-link-text">Relatorios Contabeis</span>
                        </a>
                        <ul class="sidenav-second-level collapse" id="collapseComponents1">
                            <li>
                                <a href="navbar.html">Diario</a>
                            </li>
                            <li>
                                <a href="cards.html">Razão</a>
                            </li>
                            <li>
                                <a href="cards.html">livro Caixa</a>
                            </li><li>
                                <a href="cards.html">Balancet</a>
                            </li>
                            <li>
                                <a href="cards.html">Balanço</a>
                            </li>
                            <li>
                                <a href="cards.html">Termo Abertura/Encerramento</a>
                            </li>
                            <li>
                                <a href="cards.html">Conferencia dos Lançamentos</a>
                            </li>
                        </ul>
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
        <div class="content-wrapper">
        <?php echo $this->session->flashdata('sucesso'); ?>
            <!--CAD EMPRESA-->
            <div <?php if($pagina == 1){?> class="FORMULARIO" <?php } else{ ?> class="FORMULARIO inativo" <?php } ?> id="cad_empr">
                <div class="container">
                    <div class="card card-register mx-auto">
                        <div class="card-header">Cadastro de Empresa <a class="btn btn-success" style="color:#fff; float:right;" href="<?php echo base_url();?>contabi_controle/login_empr">&#8630 voltar</a></div>
                        <div class="card-body">
                            <form enctype="multipart/form-data"  method="POST" action="<?php echo base_url(); ?>contabi_controle/cad_empresa_login">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <label for="exampleInputName">Codigo</label>
                                            <input class="form-control" id="exampleInputName" name="cod_empr" type="text" aria-describedby="nameHelp" placeholder="Insira o codigo...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputName">Razão</label>
                                            <input class="form-control" id="exampleInputName" name="raz_empr" type="text" aria-describedby="nameHelp" placeholder="Insira a razão...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputLastName">Fantasia</label>
                                            <input class="form-control" id="exampleInputLastName" name="fan_empr" type="text" aria-describedby="nameHelp" placeholder="Insira o nome fantasia...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputLastName">Endereço</label>
                                            <input class="form-control" id="exampleInputLastName" name="end_empr" type="text" aria-describedby="nameHelp" placeholder="Insira o endereço...">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="exampleInputLastName">Bairro</label>
                                            <input class="form-control" id="exampleInputLastName" name="bai_empr" type="text" aria-describedby="nameHelp" placeholder="Insira o bairro...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputLastName">Cidade</label>
                                            <input class="form-control" id="exampleInputLastName" name="cid_empr" type="text" aria-describedby="nameHelp" placeholder="Insira a cidade...">
                                        </div>
                                        <div class="col-md-1">
                                            <label for="exampleInputLastName">estado</label>
                                            <select class="form-control" id="exampleInputLastName" name="est__empr" aria-describedby="nameHelp">
                                                <option value="">Selecione uma opção</option>
                                                <option>MG</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleInputLastName">Cep</label>
                                            <input class="form-control" id="exampleInputLastName" name="cep_empr" type="text" aria-describedby="nameHelp" placeholder="Insira o cep...">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleInputLastName">Telefone</label>
                                            <input class="form-control" id="exampleInputLastName" name="tel_empr" type="text" aria-describedby="nameHelp" placeholder="Insira o telefone...">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleInputLastName">Complemento</label>
                                            <input class="form-control" id="exampleInputLastName" name="comp_empr" type="text" aria-describedby="nameHelp" placeholder="Insira algum complemento...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h1 style="font-size:15px; margin-left:-1.5%;">Inscrições <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                </div>    
                                <hr/>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estadual</label>
                                    <input class="form-control" id="exampleInputEmail1" name="estd_empr" type="text" aria-describedby="emailHelp" placeholder="Insira o Numero...">
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label for="exampleInputEmail1">Identificação da empresa</label>
                                            <br/>
                                            <select class="form-control" id="select" style="width:100px;" title="Escolha..." name="select"> 
                                                <option value="">Escolha...</option> 
                                                <option value="cpf">CPF</option>
                                                <option value="cnpj">CNPJ</option>
                                                <option value="cei">CEI</option>
                                            </select> 
                                            <input class="form-control" type="text" id="busca" class="form-control" name="ide_empr"   placeholder="Digite aqui..." name="busca" style="width:250px; float:left;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button  class="btn btn-primary btn-block" type="submit" >Incluir <span><i class="fa fa-check-circle" style="color:greenyellow;"></i></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
            <!--CAD FILIA-->
            <div <?php if($pagina == 2){?> class="FORMULARIO" <?php } else{ ?> class="FORMULARIO inativo" <?php } ?> id="cad_empr">
                <div class="container">
                    <div class="card card-register mx-auto">
                        <div class="card-header">Cadastro de Filial <a class="btn btn-success" style="color:#fff; float:right;" href="<?php echo base_url();?>contabi_controle/filial">&#8630 voltar</a></div>
                        <div class="card-body">
                            <form enctype="multipart/form-data"  method="POST" action="<?php echo base_url(); ?>contabi_controle/cad_filial">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <label for="exampleInputName">Codigo</label>
                                            <input class="form-control" id="exampleInputName" name="cod_filial"  type="text" aria-describedby="nameHelp" placeholder="Insira o codigo...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputName">Razão</label>
                                            <input class="form-control" id="exampleInputName" name="raz_filial"  type="text" aria-describedby="nameHelp" placeholder="Insira a razão...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputLastName">Fantasia</label>
                                            <input class="form-control" id="exampleInputLastName" name="fan_filial"  type="text" aria-describedby="nameHelp" placeholder="Insira o nome fantasia...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputLastName">Endereço</label>
                                            <input class="form-control" id="exampleInputLastName" name="end_filial"  type="text" aria-describedby="nameHelp" placeholder="Insira o endereço...">
                                        </div>
                                        <div class="col-md-5">
                                            <label for="exampleInputLastName">Bairro</label>
                                            <input class="form-control" id="exampleInputLastName" name="bai_filial"  type="text" aria-describedby="nameHelp" placeholder="Insira o bairro...">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputLastName">Cidade</label>
                                            <input class="form-control" id="exampleInputLastName" name="cid_filial"  type="text" aria-describedby="nameHelp" placeholder="Insira a cidade...">
                                        </div>
                                        <div class="col-md-1">
                                            <label for="exampleInputLastName">estado</label>
                                            <select class="form-control" id="exampleInputLastName" name="est_filial"  aria-describedby="nameHelp">
                                                <option>MG</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleInputLastName">Cep</label>
                                            <input class="form-control" id="exampleInputLastName" name="cep_filial"  type="text" aria-describedby="nameHelp" placeholder="Insira o cep...">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleInputLastName">Telefone</label>
                                            <input class="form-control" id="exampleInputLastName" name="tel_filial"  type="text" aria-describedby="nameHelp" placeholder="Insira o telefone...">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="exampleInputLastName">Complemento</label>
                                            <input class="form-control" id="exampleInputLastName" name="comp_filial"  type="text" aria-describedby="nameHelp" placeholder="Insira algum complemento...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h1 style="font-size:15px; margin-left:-1.5%;">Inscrições <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                </div>    
                                <hr/>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Estadual</label>
                                    <input class="form-control" id="exampleInputEmail1" name="estd_filial"  type="text" aria-describedby="emailHelp" placeholder="Insira o Numero...">
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label for="exampleInputEmail1">Identificação da empresa</label>
                                            <br/>
                                            <select class="form-control" id="select" style="width:100px;" title="Escolha..." name="select"> 
                                                <option value="">Escolha...</option> 
                                                <option value="cpf">CPF</option>
                                                <option value="cnpj">CNPJ</option>
                                                <option value="cei">CEI</option>
                                            </select> 
                                            <input class="form-control" type="text" id="busca" class="form-control" name="ide_filial"   placeholder="Digite aqui..." name="busca" style="width:250px; float:left;">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit"  class="btn btn-primary btn-block" >Incluir <span><i class="fa fa-check-circle" style="color:greenyellow;"></i></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
             <!--CAD GRUPO CONTABIL-->
            <div <?php if($pagina == 6){?> class="FORMULARIO" <?php } else{ ?> class="FORMULARIO inativo" <?php } ?> id="cad_grup">
                <div class="container">
                    <div class="card card-register mx-auto">
                        <div class="card-header">Cadastro de Grupos Contabeis<a class="btn btn-success" style="color:#fff; float:right;" href="<?php echo base_url();?>contabi_controle/grup">&#8630 voltar</a></div>
                        <div class="card-body">
                            <form enctype="multipart/form-data"  method="POST" action="<?php echo base_url(); ?>contabi_controle/cad_grup">
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <label for="exampleInputEmail1">Grupo(1 a 9)</label>
                                            <input class="form-control" id="exampleInputPassword1" name="grup_grup" type="text" placeholder="insira o grupo...">
                                        </div>
                                        <div class="col-md-8">
                                            <label for="exampleInputEmail1">Mascara</label>
                                            <input class="form-control" id="exampleInputPassword1" name="masc_grup" type="text" placeholder="Ex.Da Mascara: 1.1.1.11.001">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Tipo Conta</label>
                                            <select class="form-control" id="exampleInputLastName" name="tip_grup" aria-describedby="nameHelp">
                                                <option value="">Selecione uma opção</option>
                                                <option>Contabil</option>
                                                <option>Gerencial</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="exampleInputEmail1">Resultado</label>
                                            <select class="form-control" id="exampleInputLastName" name="res_grup" aria-describedby="nameHelp">
                                                <option value="">Selecione uma opção</option>
                                                <option value="devedor">Devedor</option>
                                                <option value="credor">Credor</option>
                                                <option value="outros">Outros</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit"  class="btn btn-primary btn-block" >Incluir <span><i class="fa fa-check-circle" style="color:greenyellow;"></i></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
            <!--CAD HISTORICO-->
            <div <?php if($pagina == 3){?> class="FORMULARIO" <?php } else{ ?> class="FORMULARIO inativo" <?php } ?> id="cad_hist">
                <div class="container">
                    <div class="card card-register mx-auto">
                        <div class="card-header">Cadastro de Historico<a class="btn btn-success" style="color:#fff; float:right;" href="<?php echo base_url();?>contabi_controle/hist">&#8630 voltar</a></div>
                        <div class="card-body">
                            <form enctype="multipart/form-data"  method="POST" action="<?php echo base_url(); ?>contabi_controle/cad_hist">
                                <div class="col-md-12">
                                    <h1 style="font-size:15px; margin-left:-1.5%;">historicos <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                </div>    
                                <hr/>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Codigo</label>
                                    <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" name="cod_hist" placeholder="Insira o codigo...">
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label for="exampleInputEmail1">Descrição</label>
                                            <input class="form-control" id="exampleInputPassword1" type="text" name="desc_hist" placeholder="insira a descrição...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary btn-block" >Incluir <span><i class="fa fa-check-circle" style="color:greenyellow;"></i></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
            <!--CAD CENTRO DE CUSTO-->
            <div <?php if($pagina == 5){?> class="FORMULARIO" <?php } else{ ?> class="FORMULARIO inativo" <?php } ?> id="cad_cent">
                <div class="container">
                    <div class="card card-register mx-auto">
                        <div class="card-header">Cadastro de Centro de Custo<a class="btn btn-success" style="color:#fff; float:right;" href="<?php echo base_url();?>contabi_controle/cent">&#8630 voltar</a></div>
                        <div class="card-body">
                            <form enctype="multipart/form-data"  method="POST" action="<?php echo base_url(); ?>contabi_controle/cad_cent">
                                <div class="col-md-12">
                                    <h1 style="font-size:15px; margin-left:-1.5%;">historicos <span><i class="fa fa-angle-double-down" style="color:#235880; font-size:20px;"></i></span></h1>
                                </div>    
                                <hr/>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Codigo</label>
                                    <input class="form-control" id="exampleInputEmail1" name="cod_cent" type="text" aria-describedby="emailHelp" placeholder="Insira o codigo...">
                                </div>
                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <label for="exampleInputEmail1">Descrição</label>
                                            <input class="form-control" id="exampleInputPassword1" name="desc_cent" type="text" placeholder="insira a descrição...">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary btn-block" >Incluir <span><i class="fa fa-check-circle" style="color:greenyellow;"></i></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>    
            <!--CAD PLANO DE CONTAS -->
            <div <?php if($pagina == 4){?> class="FORMULARIO" <?php } else{ ?> class="FORMULARIO inativo" <?php } ?> id="cad_plan">
                <div class="container">
                    <div class="card card-register mx-auto">
                        <div class="card-header">Cadastro de Plano de Conta<a class="btn btn-success" style="color:#fff; float:right;" href="<?php echo base_url();?>contabi_controle/plan">&#8630 voltar</a></div>
                        <div class="card-body">
                            <form enctype="multipart/form-data"  method="POST" action="<?php echo base_url(); ?>contabi_controle/cad_plan">
                                <div class="form-row">
                                    <div class="col-md-3">
                                        <label for="exampleInputName">Codigo</label>
                                        <input class="form-control" id="exampleInputName" name="cod_plan"  type="text" aria-describedby="nameHelp" placeholder="Insira o codigo...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputName">Tipo da Conta</label>
                                        <input class="form-control" id="exampleInputName" name="tip_plan" type="text" aria-describedby="nameHelp" placeholder="Insira o tipo de conta...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputLastName">Grupo(1 a 9)</label>
                                        <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Insira o grupo...">
                                        <br/>
                                        <input class="form-control" id="exampleInputLastName" name="grup_plan" type="text" aria-describedby="nameHelp" disabled>
                                        <hr>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputLastName">Classificação</label>
                                        <input class="form-control" id="exampleInputLastName" name="clas_plan" type="text" aria-describedby="nameHelp" placeholder="Insira a classificação...">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="exampleInputLastName">Descrição</label>
                                        <input class="form-control" id="exampleInputLastName" name="desc_plan" type="text" aria-describedby="nameHelp" placeholder="Insira a descrição...">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleInputLastName">Conta</label>
                                        <select class="form-control" id="exampleInputLastName" name="con_plan" aria-describedby="nameHelp">
                                            <option>MG</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="exampleInputLastName">Resultado</label>
                                        <select class="form-control" id="exampleInputLastName" name="res_plan" aria-describedby="nameHelp">
                                            <option>MG</option>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="exampleInputLastName">C.de custo</label>
                                        <select class="form-control" id="exampleInputLastName" name="cent_plan" aria-describedby="nameHelp">
                                            <option>MG</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputLastName">Conta referencial</label>
                                        <input class="form-control" id="exampleInputLastName" name="cont_plan" type="text" aria-describedby="nameHelp" placeholder="Insira a conta referencial...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputLastName">Conta p. DRE</label>
                                        <input class="form-control" id="exampleInputLastName" name="c_dre_plan" type="text" aria-describedby="nameHelp" placeholder="Insira a conta p.DRE...">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputLastName">Conta Enc.Exec</label>
                                        <input class="form-control" id="exampleInputLastName" name="c_exec_plan" type="text" aria-describedby="nameHelp" placeholder="Insira a conta Enc.Exec...">
                                    </div>
                                </div>
                                <br/>
                                <div class="col-md-2">
                                    <button  type="submit" class="btn btn-primary btn-block" >Incluir <span><i class="fa fa-check-circle" style="color:greenyellow;"></i></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
            <br/>
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
            <script src="<?php echo base_url();?>assets/vendor/chart.js/Chart.min.js"></script>
            <script src="<?php echo base_url();?>assets/vendor/datatables/jquery.dataTables.js"></script>
            <script src="<?php echo base_url();?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
            <!-- Custom scripts for all pages-->
            <script src="<?php echo base_url();?>assets/js/sb-admin.min.js"></script>
            <!-- Custom scripts for this page-->
            <script src="<?php echo base_url();?>assets/js/sb-admin-datatables.min.js"></script>
            <script src="<?php echo base_url();?>assets/js/sb-admin-charts.min.js"></script>
            <script>
                var ctx = document.getElementById("myChart").getContext('2d');
                var myChart = new Chart(ctx, {
                  type: 'pie',
                  data: {
                    labels: ["Green", "Blue", "Black"],
                    datasets: [{
                      backgroundColor: [
                        "#2ecc71",
                        "#e74c3c",
                        "#34495e"
                      ],
                      data: [12, 19,  7]
                    }]
                  }
                });
            </script>
            <script>
                document.getElementById("select").addEventListener("change", myFunction);
                function myFunction(){
                        var $select = $('#select option:selected').val();
                  if( $select == "cpf"){
                  var $busca = $('#busca');
                  $('#busca').mask('999.999.999-99');
                  }
                   if( $select == "cnpj"){
                  var $busca = $('#busca');
                  $('#busca').mask('99.999.999/9999-99');
                  }
                   if( $select == "cei"){
                  var $busca = $('#busca');
                  $('#busca').mask('99.999.99999/99');
                  }
                }
            </script>
        </div>
    </body>

</html>
