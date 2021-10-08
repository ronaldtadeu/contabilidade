<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <title>Area do administrador</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Net Banking Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- bootstrap-css -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <!--// bootstrap-css -->
        <!-- css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" media="all" />
        <!--// css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css" type="text/css" media="all">
        <link href="<?php echo base_url(); ?>assets/css/owl.theme.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cm-overlay.css" />
        <!-- font-awesome icons -->
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet"> 
        <!-- //font-awesome icons -->
        <!-- font -->
        <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <!-- //font -->
        <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    </head>
    <body>
        <nav id="menu">
            <ul>
                <li><a style="font-size:30px;" >TELAS</a></li>
                <li><a href="<?php echo base_url(); ?>admin_controle" >Principal</a></li>
                <li><a href="<?php echo base_url(); ?>admin_controle/banners" >Banners</a></li>
                <li><a href="<?php echo base_url(); ?>admin_controle/Galerias" >Galerias</a></li>
                <li><a href="<?php echo base_url(); ?>admin_controle/contas">Usuarios</a></li>
                <li><a href="<?php echo base_url(); ?>login_controle/logout"><span style="color:#fff;" class="glyphicon glyphicon-log-out"> </span> Logout</a></li>
            </ul>
        </nav>
        <br/>
        <br/>
        <br/>
        <?php $this->load->view($pagina); ?>
        <style>
            *{
                color:black;
            }
            #menu ul {
                padding:20px;
                margin-top:-20px;
                background-color:black;
                list-style:none;
                
            }
            #menu ul li { display: inline; }
            #menu li{
                margin-right:10px;
            }
              #menu a{
                color:#fff;
                text-decoration:none; 
            }
           
        </style>
    </body>
</html>
