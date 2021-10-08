<!--Editor 
Editor: Ronald Tadeu
Site do Editor: http://registrosweb.com.br
-->
<!DOCTYPE HTML>
<html>
<head>
<title>ArmariosCriar</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Capitalist Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- font files -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<!-- /font files -->
<!-- css files -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/mini-logo-anglo.png" >
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>assets/css/jQuery.lightninBox.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>assets/css/pogo-slider.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lightbox.css">
<!-- /css files -->
<!-- js files -->
<script src="<?php echo base_url(); ?>assets/js/modernizr.custom.js"></script>
<script src="http://code.jquery.com/jquery-1.7.min.js"></script>
<script>
    jQuery("document").ready(function ($) {

        var nav = $('.nav-container');

        $(window).scroll(function () {
            if ($(this).scrollTop() > 136) {
                nav.addClass("f-nav");
            } else {
                nav.removeClass("f-nav");
            }
        });

    });
</script>
<script type="text/javascript">
   function Mudarestado(el) {
        var display = document.getElementById(el).style.display;
        if(display == "block")
            document.getElementById(el).style.display = 'none';
        else
            document.getElementById(el).style.display = 'block';
    }
</script>
<!-- /js files -->
</head>
<body>
<!-- top bar -->
        <div class="top-bar">
            <div class="container">
                <ul class="top-contacts">
                    <li class="top-unhover">
                        <button type="button" class="btn btn-default" onclick="Mudarestado('minhaDiv')"><span class="fa fa-phone-square" aria-hidden="true"></span> Telefone</button>
                    </li>
                    <li class="top-unhover"><div style="display:none;" id="minhaDiv"><p><span class="fa fa-phone-square" aria-hidden="true"></span> (031) 3497-0679</p></div></li>
                    <li class="top-hover"><p><span class="fa fa-envelope" aria-hidden="true"></span> <a href="mailto:support@company.com"> criar@armarioscriar.com.br</a></p></li>
                </ul>
                <ul class="top-links">
                    <li class="top-hover"><p><span aria-hidden="true"></span> <a style=" text-decoration:none; list-style:none; color:#fff; font-size:150%;">Nossas Redes Sociais</a></p></li>
                    <li><a href="https://www.facebook.com/CriarArmarios/"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/armarioscriar/"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="https://twitter.com/armarioscriar"><i class="fa fa-twitter"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>		
        </div>
        <!-- /top bar -->
        <!-- navigation section -->
        <div class="navbar-wrapper" >
            <div class="nav-container" >
                <nav class="navbar navbar-inverse navbar-static-top cl-effect-4">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <img src="<?php echo base_url(); ?>assets/images/logo-anglo.png" style="width:200px;" />
                        </div>
                        <div id="navbar" class="navbar-collapse collapse" id="menu_fixo">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="#">INÍCIO</a></li>
                                <li><a href="#criar">A CRIAR</a></li>
                                <li><a href="#work">AMBIENTES</a></li>
                                <li><a href="#proj">PROJETOS</a></li>
                                <li><a href="#testimonial">MEIO AMBIENTE</a></li>
                                <li><a href="#contato">CONTATO</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- /navigation section -->
        <!-- banner section -->
        <div class="pogoSlider" id="js-main-slider">
			<?php for ($g = 0; $g < count($ListaBanner); $g++) { ?>
				<div class="pogoSlider-slide" data-transition="shrinkReveal" data-duration="1000">
				         <img class="baner" style="width:100%;" src="<?php echo base_url(); ?>uploads/<?php echo $ListaBanner[$g]->image; ?>" class="img-responsive" alt="">
					<div class="pogoSlider-slide-element">
						<h3><?php echo $ListaBanner[$g]->titulo; ?></h3>
					</div>		
				</div>
			<?php } ?>
        </div>
        <!-- /banner section -->
        <div class="agileits"></div>
        <!-- services section -->
        <section class="service-w3ls" id="criar"> 
            <div class="container">
                 <div class=" col-md-12 wlcm-center-agile">
                     <h3 class="text-center slideanim"><span><img style="width:3%;" src="<?php echo base_url();?>assets/images/icon_conteudo.png" /></span>&nbspA CRIAR</h3>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <h2>
                                    MISSÃO:
                                </h2>
                                <p>
                                    Desenvolver e executar projetos com o mais elevado padrão de qualidade, seguindo as tendências mundial, sem esquecer as particularidades dos nossos clientes. Nossas ações são baseadas nos preceitos éticos de gestão e responsabilidade social corporativa e ecológica.
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h2>
                                    VISÃO:
                                </h2>
                                <p>
                                    Revolucionar a indústria moveleira, quebrando paradigmas com gestão diferenciada e moderna, visão humana em conjunto a ética e rentabilidade, desenvolvimento sustentável, criando laço de confiança com nossos clientes, funcionários, fornecedores e a sociedade como um todo.
                                </p>
                            </div>
                            <div class="col-md-4">
                                <h2>
                                    VALORES:
                                </h2>
                                <p>
                                    Ética, busca de excelência no relacionamento com nossos clientes e funcionários. Qualidade, criatividade, honestidade, comprometimento e dedicação com nossos valores.
                                </p>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <br/>
                </div>
            </div>
        </section>
        <!-- /services section -->
        <div class="agileinfo"></div>
        <!-- divider section -->
        <section class="divider slideanim" id="proj">
            <div class="container">
                <div class="col-md-5 about-info-w3 projeto">
                    <h3 class="text-center slideanim" style="color:#fff; font-size:45px; text-align:left;"> <span class="glyphicon glyphicon-briefcase"></span> PROJETOS</h3>
                    <p style="color:#fff; font-size:20px; text-align:left;">Os nossos projetos são totalmente personalizados e sob medida, com a finalidade de atender as necessidades, desejos e estilo de cada um de nossos clientes. 
                        PROJETOS Nossos projetistas estão antenados com as novas tendências de decoração mundial.</p>
                </div>
                <div class="col-md-7 about-img-w3-agileits">
                    <img class="img-responsive" src="<?php echo base_url(); ?>assets/images/foto.jpg" alt="image" style="width:700px" /> 
                    <!--//responsive-tabs-->		
                </div>
            </div>
        </section>
        <!-- /divider section -->
        <div class="wthree"></div>
        <!-- Meio ambiente -->
        <section class="test" id="testimonial">
            <div class="container">
                <h3 class="text-center slideanim"><span class="glyphicon glyphicon-tree-deciduous"></span>RESPONSABILIDADE SOCIAL E ECOLÓGICA</h3>
                <p class="text-center slideanim">Usando como matéria prima somente produtos ecologicamente corretos, descartando de forma adequada os dejetos industriais. A Armários Criar mantem parcerias com artesãos doando sobras de MDF para confecção de artesanato.</p>
                <center>
                    <img src="<?php echo base_url(); ?>assets/images/eco.png" style="width: 200px;" class="img-responsive" alt=""/>
                </center>
            </div>	
        </section>
        <!-- //Meio ambiente -->
        <!-- Produtos -->
        <section class="work" id="work">
            <h3 class="text-center slideanim"><span class="glyphicon glyphicon-th"> </span> NOSSOS PRODUTOS</h3>
            <p class="text-center slideanim">Essas imagens são exemplos de alguns dos nossos produtos.</p>
            <div class="gallery-grids">
                            <div class="tabbable" id="tabs-624930">
                                <ul class="nav nav-tabs">
                                        <?php for ($i = 0; $i < count($Lista); $i++) { ?>
                                        <li <?php if ($i == 0) { ?> class="active" <?php } ?> >
                                            <a href="#div<?php echo $i; ?>" data-toggle="tab"><?php echo $Lista[$i]->titulo; ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <div class="tab-content">
                                    <?php for ($i = 0; $i < count($Lista); $i++) { ?>
                                        <div <?php if ($i == 0) { ?> class="tab-pane active" <?php } else { echo 'class="tab-pane"'; }?> id="div<?php echo $i; ?>">
                                                <?php for ($g = 0; $g < count($ListaImgGaleria); $g++) { if ($ListaImgGaleria[$g]->id_galeria == $Lista[$i]->id) { ?>
                                                <div class="col-md-3 port-grids  view view-fourth">
                                                    <a style="width:800px; height:400px;" class="example-image-link" href="<?php echo base_url(); ?>uploads/<?php echo $ListaImgGaleria[$g]->image; ?>" data-lightbox="example-set" data-title="">
                                                        <img style="width:400px; height:200px; padding-bottom:10px;"src="<?php echo base_url(); ?>uploads/<?php echo $ListaImgGaleria[$g]->image; ?>" class="img-responsive" alt=""/>	
                                                    </a>
                                                </div>
                                            <?php } }?>
                                        </div>
                                    <?php } ?>
                                    <div class="clearfix"> </div>	
                                    <script src="<?php echo base_url(); ?>/assets/js/lightbox-plus-jquery.min.js"></script>
                                </div>
                            </div>
                        </div>	
            </div>	
        </section>

        <!-- /portfolio section -->
        <div class="w3layout"></div>
        <!-- testimonial section -->
        <div class="se-slope blog" id="contato">
            <article class="se-content">
                <!-- Start Fourth Section  | Demo 3 -->
                <div class="container">
                    <h3 class="text-center slideanim" style="color:black; font-size:30px;"><span class="glyphicon glyphicon-earphone"> </span> CONTATO</h3>
                    <br/>
                    <div class="fourth-section-area">
                        <center><h3 class="title">Mande-nos um e-mail</h3></center>
                        <!-- start single effect -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">

                                    <form enctype="multipart/form-data" action="<?php echo base_url();?>index_controle/EnviarEmail" method="post">
                                        <div class="form-group">
                                            <div class="col-md-6">
	                                            <label for="Inputnome">
	                                                Nome:
	                                            </label>
	                                            <input name="nom" class="form-control" id="Inputnome" type="text" required="requerido" />
                                        	</div>
                                        	<div class="col-md-6">
	                                            <label for="Inputnome">
	                                                telefone:
	                                            </label>
	                                            <input type="tel" name="tel" class="form-control" id="txttelefone" required="requerido" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" />
                                        	</div>
                                        </div>
                                        <div class="form-group">
											<div class="col-md-6">
	                                            <label for="Inputemail">
	                                                Email address:
	                                            </label>
	                                            <input  name="ema"class="form-control" id="Inputemail" required="requerido" type="email" />
                                            </div>
                                            <div class="col-md-6">
	                                            <label for="Inputassunto">
                                                assunto:
                                            </label>
                                            <input name="sub" class="form-control" id="Inputassunto" required="requerido" type="text" />
                                            </div>
                                        </div>
                                        <div class="form-group">
											<div class="col-md-12">
                                            <label for="Inputtxt">
                                                Escreva seu texto:
                                            </label>
                                            <br/>
                                            <textarea name="Mes" class="wpcf7-form-control form-control  wpcf7-textarea wpcf7-validates-as-required" cols="100" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="g-recaptcha" data-sitekey="6LfybXQUAAAAANg6X7CNaZxTg1m8ayHzfRm9pMLJ"></div>
                                        </div>   
                                        <button type="submit" class="btn btn-default ">
                                            Enviar
                                        </button>
                                        <script src='https://www.google.com/recaptcha/api.js'></script>
                                    </form>
                                    <br/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>	
            </article>
        </div>
        <!-- /testimonial section -->
        <!-- Contato -->
        <section class="subs slideanim">
            <div class="container">
                <div class="col-lg-6 col-md-6 subs-w3ls1 slideanim">
                    <h3 class="title">Localização</h3>
                            <p></p>
                            <p class="sub"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span> Av. Cristiano Machado, 8995 - São Bernardo Belo Horizonte - MG, 31775-630 </p>
                            <p class="sub"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> seg-sex 08h00-18h00 | Sáb 08h00-12h00 | Dom Fechado</p>
                            <p class="add"><span>Telefone :</span>(031) 3497-0679 </p>
                            <p class="add"><span>Email :</span> sac@armarioscriar.com.br | criar@armarioscriar.com.br</p>

                </div>
                <div class="clearfix"></div>
            </div>
        </section>
        <!-- /Contato -->
        <!-- map section -->
        <div class="map slideanim">
            <iframe class="googlemaps" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3753.494482747971!2d-43.94887278508721!3d-19.819019686666028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa68ff69cb11703%3A0xb658b2dcc5fae14e!2sAv.+Cristiano+Machado+-+Vila+Cloris%2C+Belo+Horizonte+-+MG%2C+31775-630!5e0!3m2!1spt-BR!2sbr!4v1492463069740" style="border:0" allowfullscreen></iframe>
        </div>
        <!-- /map section -->
        <!-- footer section -->
        <div class="footer">
			<center>
				<div class="container">
					<p>Todos os direitos Reservados a ArmariosCriar | Editado por <a href="http://registrosweb.com.br/">RegistrosWeb</a></p>
					<p><a href="<?php echo base_url(); ?>login_controle" class="btn btn-default" style="color:black;" >Área do administrador</a></p>
				</div>
			</center>
        </div>
        <!-- /footer section -->
        <a href="#0" class="cd-top">Top</a>
        <!-- js files -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/SmoothScroll.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/top.js"></script> 
        <script src="<?php echo base_url(); ?>assets/js/jQuery.lightninBox.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
        <script type="text/javascript">
            $(".lightninBox").lightninBox();
        </script>
        <script type="text/javascript">$("#txttelefone").mask("(99) 9999-99999");</script>
        <script>
            $(document).ready(function () {
                // Add smooth scrolling to all links in navbar + footer link
                $(".navbar li a").on('click', function (event) {

                    // Make sure this.hash has a value before overriding default behavior
                    if (this.hash !== "") {

                        // Store hash
                        var hash = this.hash;

                        // Using jQuery's animate() method to add smooth page scroll
                        // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                        $('html, body').animate({
                            scrollTop: $(hash).offset().top
                        }, 900, function () {

                            // Add hash (#) to URL when done scrolling (default click behavior)
                            window.location.hash = hash;
                        });
                    } // End if
                });
            })
        </script>
        <script>
            $(window).scroll(function () {
                $(".slideanim").each(function () {
                    var pos = $(this).offset().top;

                    var winTop = $(window).scrollTop();
                    if (pos < winTop + 600) {
                        $(this).addClass("slide");
                    }
                });
            });
        </script>	
        <script src="<?php echo base_url(); ?>assets/js/jquery.pogo-slider.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
        <!-- /js files -->
        <style>
	.f-nav{
            border-bottom:solid black;
            position:fixed; 
            left: 0; 
            top: 0; 
            width: 100%;
        } /* this make our menu fixed top */
        </style>
</body>
</html>