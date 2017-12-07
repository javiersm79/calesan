<?php 
session_start(); 
if (isset($_SESSION['numitems']))
	{
		$numeroarticulos = $_SESSION['numitems'];

	}
else
	{
		$numeroarticulos = 0;
		$_SESSION['numitems'] = 0;
	}
?>
<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>CALESAN</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
		<!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span12">
					<!-- <form method="POST" class="search_form">
						<input type="text" class="input-block-level search-query" Placeholder="eg. cable de acero 1.44mm">
					</form> -->
					<a href="index.php" class="logo pull-left"><img src="themes/images/banner1.png" class="site_logo" alt=""></a>
					<!-- <a href="index.html" class="logo pull-left"><img src="themes/images/logoCalesan.png" class="site_logo" alt=""></a>-->
				</div>
			</div>
			<div class="row">
				<div id="menuMain" class="span11">
				
				
				</div>
				<div id="shopcar" class="span1">
					<a href="cotizar.php">
						<div style="position: absolute; top: 170px;"><img src="themes/images/shoppingcart.png" width="70" height="70"> </div>
						<div style="position: absolute; top: 170px;"><label id="cartnum" class="badge badge-warning"><?php  echo $numeroarticulos; ?></label></div>
					</a>
				</div>
			</div>
		</div>
		<div id="wrapper" class="container">

			<section id="seccionprimaria" class="main-content">				
				<div class="row" >				
					<div class="span3">
						<div>
							<h5>Puede contactarnos a través de:</h5>
							<p>
								<strong>Telefono 1:</strong>&nbsp;(+56) 2 2773 2357<br>
								<strong>Telefono 2:</strong>&nbsp;(+56) 2 2773 4543<br>	
								<strong>Email:</strong>&nbsp;<a href="mailto:ventas@calesan.cl">ventas@calesan.cl</a>									
							</p>
							<br/>
							<!-- <h5>SECONDARY OFFICE IN VIETNAM</h5>
							<p><strong>Phone:</strong>&nbsp;(113) 023-1125<br>
							<strong>Fax:</strong>&nbsp;+04 (113) 023-1145<br>
							<strong>Email:</strong>&nbsp;<a href="#">vietcuong_it@yahoo.com</a>					
							</p> -->
						</div>
					</div>
					<div class="span7">
						<div class="row">
							<div class="span3">		
								<label><h4 style="background-color:#eeeeee; padding:5px; text-align: center;">Datos de Contacto</h4></label>
								<label>Nombre</label> <input class="span3" id="nombrec" placeholder="Nombre" type="text" required>
								<label>Email</label> <input class="span3" id="emailc" placeholder="Email" type="text" required> 
								<label>Telefono</label> <input class="span3" id="telefonoc" placeholder="Telefono" type="text" required> 
							</div>
							<div class="span3">
								<label><h4 style="background-color:#eeeeee; padding:5px; text-align: center;">Datos de la Empresa</h4></label>
								<label>Nombre</label> <input class="span4" id="nombree" placeholder="Nombre" type="text" required>
								<label>RUT</label><input class="span4" id="rute" placeholder="RUT" type="text" required>
								<label>Notas</label> 
								<textarea class="input-xlarge span5" id="notas" name="notas" rows="8" ></textarea>
								<button type='button' type='button' class='btn btn-xs btn-info' title='Cotizar' onclick='enviarEmailContacto()'>Enviar</button>
							</div>

						</div>
					</div>				
				</div>
			</section>			
			<!-- <section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="./index.html">Homepage</a></li>  
							<li><a href="./about.html">About Us</a></li>
							<li><a href="./contact.html">Contac Us</a></li>
							<li><a href="./cart.html">Your Cart</a></li>
							<li><a href="./register.html">Login</a></li>							
						</ul>					
					</div>
					<div class="span4">
						<h4>My Account</h4>
						<ul class="nav">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order History</a></li>
							<li><a href="#">Wish List</a></li>
							<li><a href="#">Newsletter</a></li>
						</ul>
					</div>
					<div class="span5">
						<p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. the  Lorem Ipsum has been the industry's standard dummy text ever since the you.</p>
						<br/>
						<span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
					</div>					
				</div>	
			</section>
			<section id="copyright">
				<span>Copyright 2013 bootstrappage template  All right reserved.</span>
			</section> -->
			<section class="our_client">
				<h4 class="title"><span class="text">Nuestras Marcas</span></h4>
				<div class="row" style="margin-left: 200px">		
					<div class="span2">
						<img alt=""  src="themes/images/clients/crosby.png">
					</div>
					<div class="span2">
						<img alt="" width="100px" height="100px" src="themes/images/clients/mustang.png">
					</div>	
					<div class="span2">
						<img alt="" width="100px" height="100px" src="themes/images/clients/shenli.jpg">
					</div>	
					<div class="span2">
						<img alt="" width="100px" height="100px" src="themes/images/clients/mech.png">
					</div>	
				</div>
			</section>
			<section id="copyright">
				<span>Copyright 2017 CALESAN S.A.C.I.</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>	
<script type="text/javascript">
loadMenu("contactenos");
</script>		
    </body>
</html>