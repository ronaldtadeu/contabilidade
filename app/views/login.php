<html lang="br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Contabilidade | Login</title>
         <!-- Custom fonts for this template-->
        <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
        <style>
            @charset "UTF-8";
            /* CSS Document */
            body {
                width:100px;
                height:100px;
                background: -webkit-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* Chrome 10+, Saf5.1+ */
                background:    -moz-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* FF3.6+ */
                background:     -ms-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* IE10 */
                background:      -o-linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* Opera 11.10+ */
                background:         linear-gradient(90deg, #16222A 10%, #3A6073 90%); /* W3C */
                font-family: 'Raleway', sans-serif;
            }

            p {
                color:#CCC;
            }

            .spacing {
                padding-top:7px;
                padding-bottom:7px;
            }
            .middlePage {
                width: 690px;
                height: 500px;
                position: absolute;
                top:0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
            }

            .logo {
                color:#CCC;
            }
        </style>
    </head>
    <body>
        <div class="middlePage">
            <div class="page-header">
                <div style="color:red; font-size:25px;" class="erro"><?php echo validation_errors(); ?></div>
                <h1 class="logo">Escrituração Fiscal<small> Login</small></h1>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Por favor, preencha os campos.</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5" >
                            <a href="http://registrosweb.com.br/"><img style="width:100%;" src="<?php echo base_url();?>assets/images/logo.png" /></a>
                        </div>
                        <div class="col-md-7" style="border-left:1px solid #ccc;height:160px">
                            <form class="form-horizontal" action="<?php echo base_url('login_controle/login'); ?>"  method="post">
                                <fieldset>
                                    <label>Usuario:</label>
                                    <input id="textinput" name="usuario" type="text" placeholder="Insira o usuario..." class="form-control input-md">
                                    <br/>
                                     <label>Senha:</label>
                                     <input id="textinput" name="senha" type="password" placeholder="Insira a senha..." class="form-control input-md">
                                    <br/>
                                    <button id="singlebutton" name="singlebutton" class="btn btn-success btn-sm pull-right">Logar <i class="fa fa-arrow-right"></i></button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <br/>
                </div>
            </div>
        </div>
    </body>
</html>
