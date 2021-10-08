<?php include "Header.php"; ?>

   <!-- Start Main Content -->
	 <div class="main">	 
	 	<div class="contact about-desc">
   		<div class="container">
   			<div class="row">
   				<div class="col-md-8 contact_left">
   					<h2>Sobre o contato</h2>
   					
   			   <ul class="contact_info">
<!--
      <li><i class="fa fa-map-marker"></i><span>Lorem ipsum dolor sit amet, consectetuer <br>adipiscing elit, sed diam nonummy nibh euismod</span><div class="clear"></div></li>
-->
                                <li><i class="fa fa-phone"></i><span>Telefone: (31)3495-2599 | (31)3234-4725</span><div class="clear"></div></li>
			  	<li><i class="fa fa-envelope"></i><span class="msg"><a href="mailto:comercial@registrosweb.com.br">comercial@registrosweb.com.br </a></span><div class="clear"></div></li>
			   </ul>
   				</div>
   				<div class="col-md-4">
   					<div class="contact_right">
   				<div class="contact-form_grid">
                   <form id="Form" method="post" action="app/enviar.php">
                        <input name="userName" type="text" class="textbox" value="Seu nome" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Seu nome';}">
                        <input name="userEmail" type="text" class="textbox" value="Seu email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Seu email';}">
                        <textarea name="userMsg" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Mensagem';}">Mensagem</textarea>
						<div class="g-recaptcha" data-sitekey="6LcJzxgUAAAAAKko4-J0s6YQ2MNah4RYRiD84xCg"></div><br />
					 <input class="btn btn-primary" onclick="var recaptcha = $('.g-recaptcha-response').val(); if(recaptcha){ $('#Form').submit(); } else { alert('Confirme que você não é um robô.'); } " type="button" value="Enviar">
				   </form>
			      </div>
   			     </div>
   				</div>
   			</div>
   		</div>
   	</div>
   	
   </div>
   <!-- End Main Content -->

<?php include "footer.php"; ?>