<?php 
include("administracion/pages/API/global.php");
include("administracion/pages/API/funciones.php");
include("administracion/pages/controladores/ControladorCategoria.php");
include("administracion/pages/controladores/ControladorSubCategoria.php");
include("administracion/pages/modelo/Categoria.php");
include("administracion/pages/modelo/SubCategoria.php");
$ctlCategoria = new ControladorCategoria();
$ctlSubCategoria = new ControladorSubCategoria();
$link = startDB();
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

mysqli_set_charset($link,"utf8");

//$categoria = $ctlCategoria->listarPorId($_GET['categoria'], $link);
$categoria = $ctlCategoria->listarPorOrden($_GET['categoria'], $link);
/* $consulta = "SELECT * FROM categoria where id=".$_GET['categoria'];
$recibeCampos = mysqli_query($link, $consulta); 
$c = 0;
if(mysqli_num_rows($recibeCampos) == 0) { 
	}else{ 
	while($filas = mysqli_fetch_array($recibeCampos)) { 
		$categoria[$c]["id"]=$filas['id'];
		$categoria[$c]["nombre"]=$filas['nombre'];
		$c++;
	}
}  */

$sc = 0;
if(isset($_GET["subcategoria"])) {
	//$consulta = "SELECT * FROM subcategoria where id=".$_GET['subcategoria']." and estado like 'activo'"; 
	$subcategorias= $ctlSubCategoria->listarOrdenActivos($_GET['subcategoria'], $_GET['categoria'], $link);
	//echo $subcategorias->getNombre();
}
else{
	$subcategorias= $ctlSubCategoria->listarCategoriasActivos($_GET['categoria'], $link);
	//echo "Categoria";
	//$consulta = "SELECT * FROM subcategoria where categoria=".$_GET['categoria']." and estado like 'activo'"; 
}


$sc = count($subcategorias);
//var_dump($subcategorias);
?>
<!DOCTYPE html>  
<html lang="es">
	<head>
		<meta charset='utf-8'>
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
<style type="text/css">
.centrado {
	display: block;
	margin-left: 40%;
	margin-right: auto 
	}
</style>
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
			<section class="navbar main-menu">

			</section>

			<section class="header_text">

				<!-- <h1 style="background-color:#eeeeee; padding:10px;">Sub Categoria para <?//$categoria[0]["nombre"]?></h1>  -->
				<h1 style="background-color:#eeeeee; padding:10px;">Sub Categoria para <?=$categoria->getNombre()?></h1> 
				<p class="lead">Seleccione la subcategoria del producto.</p><br/>

			</section>
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span9">
							<h2 class="alert alert-danger" style="text-align:center">
							<?php  if ($sc == 0) {echo "NO SE HAN CREADO SUBCATEGORIAS";} 
							else 
							{ 
								if  (isset($_GET["subcategoria"]))
								{
									echo $subcategorias->getNombre();
								}
								else
								{
									echo $subcategorias[0]->getNombre();
								}
							}?>	
							</h2><br/>
							</div>
						</div>
						
						<div class="row">
							<div class="span9">
								<div id="familiaProducto">
									<?php 
										if ($sc > 0){
											if(isset($_GET["subcategoria"])) {
												$consulta = "SELECT * FROM maestraproducto where ordencategoria = $_GET[categoria] and ordensubcategoria=$_GET[subcategoria] and inactivo = 0 order by `descripcionproducto`,`ordenproducto`"; 

											}
											else{
												$consulta = "SELECT * FROM maestraproducto where ordencategoria = $_GET[categoria] and ordensubcategoria=".$subcategorias[0]->getOrden()." and inactivo = 0 order by `descripcionproducto`,`ordenproducto`"; 

											}
											//echo $consulta;
											$recibeCampos = mysqli_query($link, $consulta); 
											$g = 0; 
											if(mysqli_num_rows($recibeCampos) == 0) { 
												}else{ 
												while($filas = mysqli_fetch_array($recibeCampos)) { 
													$grupo[$g]["id"]=$filas['id'];
													$grupo[$g]["codigo"]=$filas['codigo'];
													$grupo[$g]["unidadventa"]=$filas['unidadventa'];
													$grupo[$g]["ordenproducto"]=$filas['ordenproducto'];
													$grupo[$g]["precioventa"]=$filas['precioventa'];
													$grupo[$g]["descripcionproducto"]=$filas['descripcionproducto'];
													$grupo[$g]["medida"]=$filas['medida'];
													$grupo[$g]["unidadmedida"]=$filas['unidadmedida'];
													$grupo[$g]["informadicional"]=$filas['informadicional'];
													$grupo[$g]["foto"]=$filas['foto'];
													$grupo[$g]["fichatec"]=$filas['fichatec'];
													//$grupo[$g]["descripcionlist"]=$filas['descripcionlist'];
													$g++;
												}
											}
										
										$descripcionproducto = "";
										for($i=0; $i<=count($grupo) - 1; $i++) {
										$descripcionproducto = $grupo[$i]["descripcionproducto"];
											
														
										?>	
										
												<div class="span9 offset4 centrado"><img src="themes/images/productos/<?=$grupo[$i]['foto'] ?>"  border="1" align="center" width="150" height="150" />&nbsp;&nbsp;
												<?php 
												if ($grupo[$i]['fichatec']<>"") 
													{
														echo "<a href='themes/fichatec/".$grupo[$i]['fichatec']."' ><img src='themes/images/productos/descarga_pdf.png' width='90' height='60' /></a>";

													}
												else
												 	{echo "";} ?>

												</div><br/>


												<div class="col-xs">
													<table class="table table-striped">
														<thead>
														  <tr class="bg-light-blue-active color-palette" >
															<th colspan=7><h3><?=$descripcionproducto?></h3></th>
														  </tr>
														  <tr>
															<th>Codigo</th>
															<!-- <th>Unidad de Venta/Despacho Mínimo/Empaque Fábrica</th> -->
															<th>Unidad de Venta</th>
															<th>Medida</th>
															<th>Unidad de Medida</th>
															<th>Información Adicional</th>
															
															<?php if (isset($_SESSION["caleauth"]) and ($_SESSION["caleauth"] == "socioautorizado" or  $_SESSION["caleauth"] == "adminautorizado")){ 

															?>
															<th>Precio</th>
															<?php 
															}
															?>
															 
															<th>Acciones</th>
														  </tr>
														</thead>
														<tbody>
														
															<?php
																	echo "<tr>";
																		echo "<td>".$grupo[$i]["codigo"]."</td>";
																		echo "<td>".$grupo[$i]["unidadventa"]."</td>";
																		echo "<td>".$grupo[$i]["medida"]."</td>";
																		echo "<td>".$grupo[$i]["unidadmedida"]."</td>";
																		/*echo "<td>".$grupo[$i]["informadicional"]."</td>";*/
																		echo "<td>".str_replace("?","<br>",$grupo[$i]["informadicional"])."</td>";
																		if (isset($_SESSION["caleauth"]) and ($_SESSION["caleauth"] == "socioautorizado" or  $_SESSION["caleauth"] == "adminautorizado")){
												 					    echo "<td>".number_format($grupo[$i]["precioventa"], 0, ",", ".")."</td>";

																		}

																		echo '<td>';
																		echo '<div class="btn-group btn-group-xs" role="group" aria-label="...">';
																		echo "<button type=button type=button class='btn btn-xs' title='Cotizar' onclick='addProducto(".$grupo[$i]['id'].",\"".$grupo[$i]['descripcionproducto']."\")'>Cotizar</button>";
																		/*echo '<button type="button" type="button" class="btn btn-xs" title="Detalle" onclick="ver()">Detalle</button>';*/
																		echo '</div>';
																		echo '</td>';
																	echo "</tr>";




																if ($i+1 < count($grupo)-1) {
																	//echo "i siguiente:".($i+1)."<br>total: ".count($grupo);
																		while($grupo[$i+1]["descripcionproducto"] == $descripcionproducto)
																/*while(($grupo[$i+1]["descripcionproducto"] == $descripcionproducto) and ($i+1 == count($grupo)))*/
																			{
																				echo "<tr>";
																					echo "<td>".$grupo[$i+1]["codigo"]."</td>";
																					echo "<td>".$grupo[$i+1]["unidadventa"]."</td>";
																					echo "<td>".$grupo[$i+1]["medida"]."</td>";
																					echo "<td>".$grupo[$i+1]["unidadmedida"]."</td>";
																					/*echo "<td>".$grupo[$i+1]["informadicional"]."</td>";*/

																					echo "<td>".str_replace("?","<br>",$grupo[$i+1]["informadicional"])."</td>";



																					if (isset($_SESSION["caleauth"]) and ($_SESSION["caleauth"] == "socioautorizado" or  $_SESSION["caleauth"] == "adminautorizado")){
																					  echo "<td>".$grupo[$i+1]["precioventa"]."</td>";

																					}
																					echo '<td>';
																					echo '<div class="btn-group btn-group-xs" role="group" aria-label="...">';
																					echo "<button type=button type=button class='btn btn-xs' title='Cotizar' onclick='addProducto(".$grupo[$i+1]['id'].",\"".$grupo[$i+1]['descripcionproducto']."\")'>Cotizar</button>";
																					/*echo '<button type="button" type="button" class="btn btn-xs" title="Detalle" onclick="ver()">Detalle</button>';*/
																					echo '</div>';
																					echo '</td>';
																				echo "</tr>";
																				$i++;
																				//echo "i siguiente:".($i+1)."<br>total: ".count($grupo);
																				if ($i+1 == count($grupo)){break;}
																				//if ($i+1 == count($grupo)){break;}
																				//$descripcionproducto = $grupo[$i]["descripcionproducto"];
																				/*if ($grupo[$i]["descripcionproducto"] == $descripcionproducto) {
																					i--;
																				}
																				else {
																					i++;
																				}*/
																					


																			}
																		
																	}// if del i siguiente
																
																

		
																
																
														
														?>	
													  
													</tbody>
												</table>
											</div>								

							
									<?php


										} // Fin de for de los grupo
										//print_r($grupo);
									} // fin de la condicion si no hay subcategorias
										
									?>	
										

								</div>
								
								
							</div>					
							<div class="span3">
								<div class="block">	
									<ul class="nav nav-list">
										<li class="nav-header">SUB CATEGORIAS</li>
										<?php 
											$menusubc = $ctlSubCategoria->listarCategoriasActivos($_GET['categoria'], $link);
											foreach ($menusubc as $k) {
											 //Fin foreach 
										?>	
											<li><a href="subcategoria.php?categoria=<?=$_GET['categoria'];?>&subcategoria=<?=$k->getOrden();?>"><?=$k->getNombre()?></a></li>

										<?php  
												}
											//} 

										?>	
									</ul>
									<br/>

								</div>

							</div>						
						</div>
						<br/>
						
					</div>				
				</div>
			</section>
			<section class="our_client">
				<h4 class="title"><span class="text">Nuestras Marcas</span></h4>
				<div class="row">					
					<div class="span2">
						<a href="#"><img alt="" src=""></a>
					</div>				
					<div class="span2">
						<a href="#"><img alt="" src="themes/images/clients/1.png"></a>
					</div>
					<div class="span2">
						<a href="#"><img alt="" src="themes/images/clients/2.png"></a>
					</div>
					<div class="span2">
						<a href="#"><img alt="" src="themes/images/clients/3.png"></a>
					</div>
					<div class="span2">
						<a href="#"><img alt="" src="themes/images/clients/4.png"></a>
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
			
			/* function addProducto(iditem, idgrupo)
			{
				var data = new FormData();

				data.append('iditem',iditem);
				data.append('idgrupo',idgrupo);
				$.ajax({

				url:"tienda/agregarItem.php",

				type:'POST',

				contentType:false,

				data:data,

				processData:false,

				cache:false})
				.done(function(res) {
					//$( "#loginMsg" ).html( res.trim()).removeClass("hidden");
					//alert( res.trim());
					 //console.log(res);
					 $( "#cartnum" ).html( res.trim());
				}); 
			}	 */		
					
			
		</script>
    </body>
</html>