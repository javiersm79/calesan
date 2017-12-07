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
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">  
		<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
		
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
			</div>
		</div>	
		<div id="wrapper" class="container">
			<section class="navbar main-menu">

			</section>
<!-- 
			<section class="header_text">

				<h1 style="background-color:#eeeeee; padding:10px;">Productos</h1>
				<p class="lead">Seleccione la categoria de productos.</p>

			</section> -->
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
	
								<ul class="thumbnails">
									<?php  
									$link = mysqli_connect("localhost", "root", "1234jj");
									mysqli_select_db($link, "calesan_bd");
									mysqli_set_charset($link,"utf8");

										$consulta = "SELECT * FROM categoria WHERE estado = 'activo' and estadosupercat =  'activo' GROUP BY codigo order by orden"; 
										/*$consulta = "SELECT * FROM categoria WHERE estado = 'activo' and orden > 0"; */
										$recibeCampos = mysqli_query($link, $consulta); 
										$i = 0; 
										if(mysqli_num_rows($recibeCampos) == 0) { 
														}else{ 
											while($filas = mysqli_fetch_array($recibeCampos)) { 
												$categorias[$i]["id"]=$filas['id'];
												$categorias[$i]["nombre"]=$filas['nombre'];
												$i++;
									?>	
												<li class="span2">
													<div class="product-box" style="border-color: black;">
													
														<p><a href="subcategoria.php?categoria=<?=$filas['codigo'];?>"><img src="themes/images/categorias/<?=$filas['imagen']?>"  /></a></p>
														<a class="nombrecat" href="subcategoria.php?categoria=<?=$filas['codigo'];?>" class="title"><?=$filas['nombre'];?></a><br/>
													
													</div> 
													 
												</li>
									<?php  
											}
										} 

									?>							
									

								</ul>

							</div>						
						</div>
						<br/>
						
					</div>				
				</div>
			</section>
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
				<span>Copyright 2013 bootstrappage template  All right reserved.</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script src="themes/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
					loadMenu("productos");
				});
			});
		</script>
    </body>
</html>