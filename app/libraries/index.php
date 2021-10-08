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
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>assets/css/jQuery.lightninBox.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>assets/css/pogo-slider.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lightbox.css">
<!-- /css files -->
<!-- js files -->
<script src="<?php echo base_url(); ?>assets/js/modernizr.custom.js"></script>
<!-- /js files -->
</head>
<body>
<!-- top bar -->
        <div class="top-bar">
            <div class="container">
                <ul class="top-contacts">
                    <li class="top-unhover"><p><span class="fa fa-phone-square" aria-hidden="true"></span> (031) 3497-0679</p></li>
                    <li class="top-hover"><p><span class="fa fa-envelope" aria-hidden="true"></span> <a href="mailto:support@company.com"> sac@armarioscriar.com.br | criar@armarioscriar.com.br</a></p></li>
                </ul>
                <ul class="top-links">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>		
        </div>
        <!-- /top bar -->
        <!-- navigation section -->
        <div class="navbar-wrapper">
            <div class="container">
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
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="#">Home</a></li>
                                <li><a href="#proj">Projetos</a></li>
                                <li><a href="#testimonial">Meio Ambiente</a></li>
                                <li><a href="#work">Produtos</a></li>
                                <li><a href="#contact">Contact</a></li>
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
        <section class="service-w3ls" id="service"> 
            <div class="container">
                <div class=" col-md-6 wlcm-left-agile">
                    <h3 class="text-center slideanim">Empresa</h3>
                    <p>A Armários Criar atua no segmento de indústria e comércio de armários planejados e ao longo dos anos vem se aprimorando para atender cada vez melhor as exigências de seu público consumidor. Dedica-se ao ramo de marcenaria a aproximadamente duas décadas e vem conquistando seu espaço na cidade de Belo Horizonte e grande Bh com uma administração totalmente focada na satisfação de seus clientes.</p>
                </div>
                <div class=" col-md-6 wlcm-right-agileits">
                    <h3 class="text-center slideanim">Respeito ao Cliente</h3>

                    <div class="wlcm-right-agileits">
                        <p>A Armários Criar busca a total satisfação dos clientes com pesquisas pós venda, para aprimoramento, dos nossos serviços. Com um exclusivo departamento de assistência técnica eficiente e permanente.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- /services section -->
        <div class="agileinfo"></div>
        <!-- divider section -->
        <section class="divider slideanim" id="proj">
            <div class="container">
                <div class="col-md-5 about-info-w3 projeto">
                    <h3 class="text-center slideanim" style="color:#fff; font-size:45px; text-align:left;">PROJETOS</h3>
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
                <h3 class="text-center slideanim">RESPONSABILIDADE SOCIAL E ECOLÓGICA</h3>
                <p class="text-center slideanim">Usando como matéria prima somente produtos ecologicamente corretos, descartando de forma adequada os dejetos industriais. A Armários Criar mantem parcerias com artesãos doando sobras de MDF para confecção de artesanato.</p>
                <center>
                    <img src="<?php echo base_url(); ?>assets/images/eco.png" style="width: 200px;" class="img-responsive" alt=""/>
                </center>
            </div>	
        </section>
        <!-- //Meio ambiente -->
        <!-- Produtos -->
        <section class="work" id="work">
            <h3 class="text-center slideanim">NOSSOS PRODUTOS</h3>
            <p class="text-center slideanim">Essas imagens são exemplos de alguns dos nossos produtos.</p>
            <div class="gallery-grids">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs cl-effect-4 slideanim" role="tablist">
						<?php for ($i = 0; $i < count($Lista); $i++) { ?>
							<li <?php if ($i == 0) { ?> class="active" <?php } ?>  role="presentation" >
								<a href="#div<?php echo $i; ?>" role="tab" id="trade-tab" data-toggle="tab" aria-controls="trade"><?php echo $Lista[$i]->titulo; ?></a>
							</li>
						<?php } ?>
                    </ul>
                    <div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<?php for ($i = 0; $i < count($Lista); $i++) { ?>
                                        <div <?php if ($i == 0) { ?> class="tab-pane active" <?php
                                                                     } else {
                                                                         echo 'class="tab-pane"';
                                                                     }
                                                                     ?> id="div<?php echo $i; ?>">
    <?php for ($g = 0; $g < count($ListaImgGaleria); $g++) {
        if ($ListaImgGaleria[$g]->id_galeria == $Lista[$i]->id) {
            ?>
                                                    <div class="col-md-3 port-grids  view view-fourth">
                                                        <a style="width:800px; height:400px;" class="example-image-link" href="<?php echo base_url(); ?>uploads/<?php echo $ListaImgGaleria[$g]->image; ?>" data-lightbox="example-set" data-title="">
                                                            <img style="width:400px; height:200px;"src="<?php echo base_url(); ?>uploads/<?php echo $ListaImgGaleria[$g]->image; ?>" class="img-responsive" alt=""/>	
                                                        </a>
                                                    </div>
        <?php }
    }
    ?>
                                        </div>
<?php } ?>
				<div role="tabpanel" class="tab-pane fade" id="business" aria-labelledby="business-tab">
					<div class="tab_img">
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids slideanim">
							<a href="images/work4.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="3">
								<img src="images/work4.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Business</h5>
									<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids slideanim">
							<a href="images/work11.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="3">
								<img src="images/work11.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Business</h5>
									<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids slideanim">
							<a href="images/work12.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="3">
								<img src="images/work12.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Business</h5>
									<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
								</div>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>	
				</div>
				<div role="tabpanel" class="tab-pane fade" id="finance" aria-labelledby="finance-tab">
					<div class="tab_img">
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids slideanim">
							<a href="images/work2.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="4">
								<img src="images/work2.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Finance</h5>
									<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids slideanim">
							<a href="images/work7.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="4">
								<img src="images/work7.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Finance</h5>
									<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids slideanim">
							<a href="images/work8.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="4">
								<img src="images/work8.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Finance</h5>
									<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
								</div>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>	
				</div>
				<div role="tabpanel" class="tab-pane fade" id="economics" aria-labelledby="economics-tab">
					<div class="tab_img">
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids slideanim">
							<a href="images/work1.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="5">
								<img src="images/work1.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Economics</h5>
									<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids slideanim">
							<a href="images/work3.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="5">
								<img src="images/work3.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Economics</h5>
									<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids slideanim">
							<a href="images/work5.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="5">
								<img src="images/work5.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Economics</h5>
									<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids slideanim">
							<a href="images/work6.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="5">
								<img src="images/work6.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Economics</h5>
									<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-6 portfolio-grids slideanim">
							<a href="images/work12.jpg" class="b-link-stripe b-animate-go lightninBox" data-lb-group="5">
								<img src="images/work12.jpg" class="img-responsive zoom-img" alt="w3ls"/>
								<div class="b-wrapper">
									<i class="fa fa-search-plus" aria-hidden="true"></i>
									<h5>Economics</h5>
									<p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
								</div>
							</a>
						</div>
						<div class="clearfix"> </div>
					</div>	
				</div>
			</div>
                </div>
            </div>	
        </section>

        <!-- /portfolio section -->
        <div class="w3layout"></div>
        <!-- testimonial section -->
        <div class="se-slope blog" id="blog">
            <article class="se-content">
                <!-- Start Fourth Section  | Demo 3 -->
                <div class="container">
                    <div class="fourth-section-area">
                        <center><h3 class="title">Fale Conosco<br><span> Mande-nos um e-mail </span></h3></center>
                        <!-- start single effect -->
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">

                                    <form role="form">
                                        <div class="form-group">

                                            <label for="Inputnome">
                                                Nome:
                                            </label>
                                            <input class="form-control" id="Inputnome" type="text" />
                                        </div>
                                        <div class="form-group">

                                            <label for="Inputemail">
                                                Email address:
                                            </label>
                                            <input class="form-control" id="Inputemail" type="email" />
                                        </div>
                                        <div class="form-group">

                                            <label for="Inputassunto">
                                                assunto:
                                            </label>
                                            <input class="form-control" id="Inputassunto" type="text" />
                                        </div>
                                        <div class="form-group">

                                            <label for="Inputtxt">
                                                Escreva seu texto:
                                            </label>
                                            <br/>
                                            <textarea name="mensagem" class="wpcf7-form-control  wpcf7-textarea wpcf7-validates-as-required" cols="100" rows="5"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-default ">
                                            Submit
                                        </button>
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
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/SmoothScroll.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/top.js"></script> 
        <script src="<?php echo base_url(); ?>assets/js/jQuery.lightninBox.js"></script>
        <script type="text/javascript">
            $(".lightninBox").lightninBox();
        </script>
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
</body>
</html>