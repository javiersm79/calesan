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
//$categoria = $ctlCategoria->listarPorCodigo($_GET['categoria'], $link);
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
	//$subcategorias= $ctlSubCategoria->listarOrdenActivos($_GET['subcategoria'], $_GET['categoria'], $link);
	//$subcategorias= $ctlSubCategoria->listarNombreActivos($_GET['subcategoria'], $_GET['categoria'], $link);
	//$subcategorias= $ctlSubCategoria->listarCodigoActivos($_GET['subcategoria'], $_GET['categoria'], $link);
	//echo $subcategorias->getNombre();
}
else{
	//$subcategorias= $ctlSubCategoria->listarCategoriasActivos($_GET['categoria'], $link);
	//echo "Categoria";
	//$consulta = "SELECT * FROM subcategoria where categoria=".$_GET['categoria']." and estado like 'activo'"; 
}


//$sc = count($subcategorias);
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
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>
		<link href="themes/css/jquery.fancybox.min.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<script src="themes/js/jquery.fancybox.min.js"></script>
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
.backprod {
	    position: fixed;
	    right: 20px;
	    bottom: 70px;
	    height: 30px;
	    width: 30px;
	    margin: 0;
	    padding: 0;
	    display: none;
	}


.imageBox {
            position: relative;
            float: left;
        }
        .imageBox .hoverImg {
            position: absolute;
            left: 0;
            top: 0;
            display: none;
        }
        .imageBox:hover .hoverImg {
            display: block;
        }
@media (max-width: 767px){	
.centrado {
	
	margin-left: 25%;
	margin-right: auto 
	}
}
</style>
	</head>
    <body>
    <div id="iraprod" class="backprod"><img style="cursor:pointer" src="themes/images/back.png" width="32" height="32" onclick="window.location.assign('https://www.calesan.cl/')"></div>	
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
				

			</section>
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span9">
								<div id="familiaProducto">
									<?php 
										
											if($_GET["busqueda"] <> null) {
												$consulta = "Select * From maestraproducto where CONCAT(codigo, ' ', descripcionproducto) like '%$_GET[busqueda]%' AND inactivo = 0"; 

											}
											else{
												//$consulta = "SELECT * FROM maestraproducto where ordencategoria = $_GET[categoria] and descripsubcategoria like '".$subcategorias[0]->getNombre()."' and inactivo = 0 order by `descripcionproducto`,`ordenproducto`"; 
												$consulta = "SELECT * FROM maestraproducto where inactivo = 0 and estadosupercat='Activo' and estadocat='Activo' and estadosubcat='Activo' ORDER BY ordenproducto LIMIT 50"; 

											}
											//echo $consulta;
											$recibeCampos = mysqli_query($link, $consulta); 
											$g = 0;
											$grupo=array();
											if(mysqli_num_rows($recibeCampos) == 0) { echo "<h2>SIN RESULTADOS PARA LA BUSQUEDA INGRESADA</h2>";
												}else{ 
												while($filas = mysqli_fetch_array($recibeCampos)) { 
													$grupo[$g]["id"]=$filas['id'];
													$grupo[$g]["codigo"]=$filas['codigo'];
													$grupo[$g]["unidadventa"]=$filas['unidadventa'];
													$grupo[$g]["ordenproducto"]=$filas['ordenproducto'];
													$grupo[$g]["descripcategoria"]=$filas['descripcategoria'];
													$grupo[$g]["descripsubcategoria"]=$filas['descripsubcategoria'];
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
									<br><br>
												<h3 style="background-color: #dbdbdb;width: 100%; text-align: center">
													<?=$grupo[$i]["descripcategoria"]?> 
													<br> 
													<?=$grupo[$i]["descripsubcategoria"]?>
												</h3>
												<div class="centrado imageBox hide-on-mobile">
													 <div class="imageInn">	
														<a href="themes/images/productos/<?=$grupo[$i]['foto'] ?>" data-fancybox data-caption="<?=$grupo[$i]['descripcionproducto'] ?>" >
														<img src="themes/images/productos/<?=$grupo[$i]['foto'] ?>"  border="1" align="center" width="150" height="150" />
														</a>
													
 
														

									<?php 
												if ($grupo[$i]['fichatec']<>"") 
													{
														echo "<a href='themes/fichatec/".$grupo[$i]['fichatec']."' target='blank'><img src='themes/images/productos/descarga_pdf.png' width='90' height='60'  /></a>";

													}
												else
												 	{echo "";} ?>

													</div><br/>
												   	<div class="hoverImg">
												        <img src="themes/images/zoom.png" width="32" height="32">
												    </div>
											    </div>
												<br/>


												<div class="col-xs">
													<table class="table table-striped" >
														<thead style='text-align:center'>
														 <tr>
														 	<th colspan=7 >
														 	</th>
														 </tr>
														  <tr class="bg-light-blue-active color-palette" >
															<th colspan=7><h3><?=$grupo[$i]["descripcionproducto"]?></h3>
																
															</th>
															
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
																	echo "<tr style='outline: thin solid'>";
																		echo "<td>".$grupo[$i]["codigo"]."</td>";
																		echo "<td style='text-align:center'>".$grupo[$i]["unidadventa"]."</td>";
																		echo "<td style='text-align:center'>".$grupo[$i]["medida"]."</td>";
																		echo "<td style='text-align:center'>".$grupo[$i]["unidadmedida"]."</td>";
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
																				echo "<tr style='outline: thin solid'>";
																					echo "<td>".$grupo[$i+1]["codigo"]."</td>";
																					echo "<td style='text-align:center'>".$grupo[$i+1]["unidadventa"]."</td>";
																					echo "<td style='text-align:center'>".$grupo[$i+1]["medida"]."</td>";
																					echo "<td style='text-align:center'>".$grupo[$i+1]["unidadmedida"]."</td>";
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

										
									?>	
										

								</div>
								
								
							</div>					
							
						</div>
						<br/>
						
					</div>				
				</div>
			</section>
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
			
			$(function() {
			    $(window).scroll(function() {
			        console.log('scrolling ', $(window).scrollTop(), $(document).height());
			        if($(window).scrollTop() >= 100 && $(window).scrollTop() <= ($(document).height() - 500)) {
			            $('#iraprod').fadeIn();
			        } else {
			            $('#iraprod').fadeOut();
			        }
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
					
			$("[data-fancybox]").fancybox({
		// Options will go here
			});		
			
		</script>
    </body>
</html>