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
$link = mysqli_connect("localhost", "calesan", "Z4RKB9YrUv");
mysqli_select_db($link, "calesan_bd");
mysqli_set_charset($link,"utf8");

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
		<link rel="stylesheet" href="./themes/css/proton.css" />
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />


		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		 <script src="./themes/js/jquery-1.10.2.min.js"></script>
    	<script src="bootstrap/js/bootstrap.min.js"></script>
    	<script src="themes/js/jstree.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<!--[if lt IE 9]>			
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="js/respond.min.js"></script>
		<![endif]-->
		<style type="text/css">
			
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
						<div style="position: absolute; top: 170px;"><label id="cartnum" class="badge badge-warning"><?php echo $numeroarticulos; ?></label></div>
					</a>
				</div>
			</div>
		</div>	
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				
			</section>

			<section class="header_text">

				<h2 style="background-color:#eeeeee; padding:10px;">Imprimir Catálogo</h2>
			<!-- 	<p class="lead">Seleccione la categoria de productos.</p> -->

			</section>
			<section id="seccionprimaria" class="main-content">
				<!-- <button id="btnCreate">ADD</button> -->
				
				
				<!-- caja de filtro del arbol -->
				Buscar:
	            <input class="search-input" type="text" style="height: 30px;font-family:Arial, FontAwesome"  placeholder="&#xf002;" />
	            <!-- fin de caja de filtro del arbol -->
				<br>
	            <!-- caja de botones de accion del arbol -->

				<div class="btn-group">
					<button id="btnTodos" class="btn btn-default">Seleccionar todos</button>
					<button id="btnLimpiar" class="btn btn-default">Limpiar Selección</button>
				</div>

				
					<form class="hidden" action="tienda/imprimircatalogosocio.php" method="post">
						<input type="text" name="itemsImprimir" id="itemsImprimir" value="AAA">
					
					</form>
					<button type="submit" id="imprimirSeleccion" class="btn btn-danger">Imprimir</button>
				
	            <!-- fin de botones de accion del arbol -->





            	<div id="arbolimpresion" style="margin-top:20px;" class="proton"></div>
            	<pre><div id="dataarbol" style="margin-top:20px;" class="proton"></div></pre>

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
					loadMenu("cotizacion");
					cargarArbol ();


				});
			});






function cargarArbol () {
				
				$.ajax({

				url:"tienda/cargarcatalogo.php",

				type:'POST',

				contentType:false,

				data:"",

				processData:false,

				cache:false})
				.done(function(res) {
					//$( "#dataarbol" ).html( res.trim());
					/*******************************************************/

 					var categoria = JSON.parse(res);
					$('#arbolimpresion').jstree({
						'plugins': ["wholerow", "checkbox", "search"],
						'core': {
						    'data': categoria,
						    'themes': {
						        'name': 'proton',
						        'responsive': true
						    }
						},
						"search": {

            "case_insensitive": true,
            "show_only_matches" : true


        }
					});
					/*******************************************************/
					$('#arbolimpresion').on("changed.jstree", function (e, data) {
					  //console.log($(this).jstree());
					  //$( "#dataarbol" ).html(JSON.stringify(data.selected));
					  //$( "#datatop" ).html(JSON.stringify($('#arbolimpresion').jstree("selected", true)));
					  //$( "#databotom" ).html(JSON.stringify(data.selected));
						//$('#arbolimpresion').jstree("selected");
					  //$( "#dataarbol" ).html(JSON.stringify($(this).jstree().get_bottom_checked()));
					  $( "#itemsImprimir" ).val(JSON.stringify($(this).jstree().get_bottom_checked()));

					});
				}); // Fin del .don ajax

  };

$( "#btnTodos" ).click(function() {
	  $('#arbolimpresion').jstree().check_all();
});

$( "#btnLimpiar" ).click(function() {
	  $('#arbolimpresion').jstree().uncheck_all();
});


$(".search-input").keyup(function() {

    var searchString = $(this).val();
    //console.log(searchString);
    $('#arbolimpresion').jstree('search', searchString);
});

$( "#imprimirSeleccion" ).click(function() {
	$("form").submit()
	/*var data = new FormData();
	data.append('itemsImprimir',JSON.stringify($('#arbolimpresion').jstree().get_bottom_checked()));
	$.ajax({

				url:"tienda/imprimircatalogo.php",

				type:'POST',

				contentType:false,

				data:data,

				processData:false,

				cache:false})
				.done(function(res) {
					
					
					  $( "#dataarbol" ).html("Respuesta de imprimir: <br>"+res);
					  

				}); // Fin del .don ajax  

*/

				
});












    



		</script>
    </body>
</html>