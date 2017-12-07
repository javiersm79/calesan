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
						<div style="position: absolute; top: 170px;"><label id="cartnum" class="badge badge-warning"><?php echo $numeroarticulos; ?></label></div>
					</a>
				</div>
				<div id="shopcarm" class="span1">
					<a href="cotizar.php">
						<div style="position: absolute; top: 70px; right: 35px"><img src="themes/images/shoppingcart.png" width="70" height="70"> </div>
						<div style="position: absolute; top: 70px; right: 35px"><label id="cartnum" class="badge badge-warning"><?php echo $numeroarticulos; ?></label></div>
					</a>
				</div>
			</div>
		</div>	
		<div id="wrapper" class="container">

			<section class="main-content">				
				<div class="row">				
					<div class="span1">
						<div>

						</div>
					</div>
					<div class="span9">
						<div class="box box-solid">
							<div class="box-header with-border">
								<h3 class="box-title">La Empresa</h3>
							</div>
							<div class="box-body">
								<blockquote>
								<p style="text-align: justify;"><strong>"CALESAN S.A.C.I.”</strong>
									Fundada en el año 1974 con el objeto de incursionar en el naciente mercado de las importaciones.<br/>Sus socios fundadores fueron los señores <em style="color:red">don Salvador Calera G.</em> y <em style="color:red">don Laudelino Sánchez G</em>.  De la unión de ambos apellidos surgió la sigla o nombre de fantasía <em style="color:red">CALE(RA) y SAN(CHEZ).</em>, ó sea <em style="color:red">CALESAN</em>.  
									En el año 1976, lamentablemente falleció el señor Sánchez, modificándose la sociedad al año siguiente en su razón social como: <em style="color:red">SALVADOR CALERA Y CÍA. LTDA.</em>, pero manteniéndose el nombre de fantasía.  En 1990 la empresa vuelve a tener una modificación estatutaria,  pasando a ser una Sociedad Anónima Comercial e Industrial de carácter cerrado.
									Se conservó su nombre de fantasía, generando con éste su última y vigente razón social: <em style="color:red">ESTABLECIMIENTOS "CALESAN" S.A.C.I.</em>, en forma  reducida <em style="color:red">"CALESAN" S.A.C.I.</em>
								</p>
								</blockquote>
							</div>
						</div>
					</div>				
				</div>
				<div class="row">
					<div class="span1">
						<div>

						</div>
					</div>
					
					<div class="span9">
						<h3>Organización:</h3>
						<table  class="table table-striped table-bordered table-hover">
						<tbody><tr>
						<td  ><p>&nbsp;&nbsp;CARLOS CALERA G. </p></td>
						<td ><div align="left">Gerente  General:&nbsp; <a href="mailto:ccalera@calesan.cl">ccalera@calesan.cl</a></div></td>
						</tr>
						<tr>
						<td >&nbsp;&nbsp;RUBEN ROJAS F.</td>
						<td><div align="left">Gerente de Ventas:&nbsp; <a href="mailto:rrojas@calesan.cl">rrojas@calesan.cl</a></div></td>
						</tr>
						<tr>
						<td >&nbsp;&nbsp;ALEJANDRO BESOAIN</td>
						<td ><div align="left">Gerente de Ventas Grandes Tiendas: <a href="mailto:ventas@calesan.cl">ventas@calesan.cl</a> &nbsp;</div></td>
						</tr>
						<tr>
						<td >&nbsp;&nbsp;JESSICA COSSIO&nbsp;&nbsp;&nbsp;&nbsp; </td>
						<td ><p align="left">Contador General y Jefe de Crédito y  Cobranzas: <a href="mailto:contabilidad@calesan.cl">contabilidad@calesan.cl</a></p></td>
						</tr>
						<tr>
						<td >&nbsp;&nbsp;CLAUDIO MONDACA</td>
						<td ><div align="left">Jefe Importaciones y Compras Nacionales: <a href="mailto:compras@calesan.cl">compras@calesan.cl</a></div></td>
						</tr>
						<tr>
						<td >&nbsp;&nbsp;ELCIRA PAVEZ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td>
						<td ><div align="left">Atención clientes, pedidos, despachos.</div></td>
						</tr>
						<tr>
						<td >&nbsp;&nbsp;CARMEN CÁRCAMO</td>
						<td ><div align="left">Facturación</div></td>
						</tr>
						<tr>
						<td >&nbsp;&nbsp;JUDITH ALARCON&nbsp; </td>
						<td ><p align="left">Asistente de  Gerencia y Cobranzas. Cobranzas, Giro de Letras, listado de cobranzas. </p></td>
						</tr>
						<tr>
						<td >&nbsp;&nbsp;ALEJANDRO FUENTES</td>
						<td ><div align="left">Jefe de bodega, despachos, embalajes.</div></td>
						</tr>
						</tbody></table>
						<p>&nbsp;</p></td>
						<td width="19"><br>
						<br></td>
						</tr>
						</tbody></table>
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
			</section> -->
			<section class="our_client show-on-mobile ">
				<h4 class="title"><span class="text">Nuestras Marcas</span></h4>
				<div class="images">		
					
						
						<img alt=""  width="50px" height="50px" src="themes/images/clients/crosby.png">
						&nbsp; &nbsp;
						<img alt="" width="50px" height="50px" src="themes/images/clients/mustang.png">
						&nbsp; &nbsp;
						<img alt="" width="50px" height="50px" src="themes/images/clients/shenli.jpg">
						&nbsp; &nbsp;
						<img alt="" width="50px" height="50px" src="themes/images/clients/mech.png">
					
					
				</div>
			</section>
			<section class="our_client hide-on-mobile">
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
				<span>Copyright 2017 Macrolab 2017.</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>	
<script type="text/javascript">
loadMenu("empresa");
</script>		
    </body>
</html>