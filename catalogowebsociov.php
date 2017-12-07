<?php
session_start(); 
if (!isset($_SESSION["caleauth"])) { 

	session_destroy();
		echo '<script type="text/javascript"> function redireccionar(){  window.location.href="../../index.php"; } setTimeout ("redireccionar()", 1); </script>';
}

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
		<link href="themes/css/jquery.fancybox.min.css" rel="stylesheet"/>

		<!-- scripts -->
		 <script src="./themes/js/jquery-1.10.2.min.js"></script>
    	<script src="bootstrap/js/bootstrap.min.js"></script>
    	<script src="themes/js/jstree.min.js"></script>				
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
				
				<!-- <div class="form-group">
				  <label for="buscar">Buscar:</label>
				  <input id="buscar" class="search-input" type="text" style="height: 30px;font-family:Arial, FontAwesome"  placeholder="&#xf002;" />
				</div> -->

				<div class="form-group">
				  <label for="logo">Logo:</label>
				   <select id="logo">
					  <option value="calesan">CALESAN</option>
					  <option value="propio">PROPIO</option>
					</select>
					<!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Con precio:
				   	<select id="conprecio" style="width: 55px">
					  <option value="no">No</option>
					  <option value="si">Si</option>
					</select>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; --><br>
					
				   	
				</div>

				<div id="cofiguracioncatalogo" class="hidden">

					<hr>
					<h4>Configuración del Catálogo</h4>
					<table>
						<tr>
							<td>¿Con precio?:</td>
							<td>
								<select id="conprecio" style="width: 55px">
						  			<option value="no" selected>No</option>
						  			<option value="si">Si</option>
								</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</td>
							<td class="factordiv hidden">Factor:</td>
							<td class="factordiv hidden"><input type="number" name="factor" id="factor" value="1" style="width: 55px"> %</td>
						</tr>
					</table>
				   		
						
				   	
						
				   	<hr>
					
					
				
				</div>
				<!-- caja de filtro del arbol -->



				<div class="btn-group">
					<!-- <button id="btnTodos" class="btn btn-default">Seleccionar todos</button> -->
					<button id="btnLimpiar" class="btn btn-default">Limpiar Selección</button>
				</div>

				

					

					<form class="hidden" action="tienda/imprimircatalogosociov.php" method="post">
						<input type="text" name="itemsImprimir" id="itemsImprimir" value="">
						<input type="text" name="valorFactor" id="valorFactor" value="1">
						<input type="text" name="valorLogo" id="valorLogo" value="calesan">
						<input type="text" name="valorConprecio" id="valorConprecio" value="no">
						
					
					</form>

					<button type="submit" id="imprimirSeleccion" class="btn btn-danger">Imprimir</button>
					<a type="button" id="ayudabtn" class="btn btn-primary" href="themes/images/ayudacatalogo/img1.png" data-fancybox="images-single">Ayuda Catalogo</a>
				
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
						<a href="#"><img alt="" data-fancybox src="themes/images/clients/1.png"></a>
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


<!-- GALERIA DE AYUDA -->
<div style="display: none;">
  
  <a href="themes/images/ayudacatalogo/img2.png" data-fancybox="images-single"
     data-thumb="themes/images/ayudacatalogo/img2.png"></a>
    <a href="themes/images/ayudacatalogo/img3.png" data-fancybox="images-single"
     data-thumb="themes/images/ayudacatalogo/img3.png"></a>
    <a href="themes/images/ayudacatalogo/img4.png" data-fancybox="images-single"
     data-thumb="themes/images/ayudacatalogo/img4.png"></a>
    <a href="themes/images/ayudacatalogo/img5.png" data-fancybox="images-single"
     data-thumb="themes/images/ayudacatalogo/img5.png"></a>
    <a href="themes/images/ayudacatalogo/img6.png" data-fancybox="images-single"
     data-thumb="themes/images/ayudacatalogo/img6.png"></a>
    <a href="themes/images/ayudacatalogo/img7.png" data-fancybox="images-single"
     data-thumb="themes/images/ayudacatalogo/img7.png"></a>
  

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

			$(function() {
			    $(window).scroll(function() {
			        //console.log('scrolling ', $(window).scrollTop(), $(document).height());
			        if($(window).scrollTop() >= 100 && $(window).scrollTop() <= ($(document).height() - 500)) {
			            $('#iraprod').fadeIn();
			        } else {
			            $('#iraprod').fadeOut();
			        }
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
	$("#valorFactor").val($("#factor").val());
	$("#valorLogo").val($("#logo").val());
	$("#valorConprecio").val($("#conprecio").val());
	
	$("form").submit()


				
});

$("#logo").change(function(){
    //alert("Valor Cambiado a: " + $("#logo").val());

    if ($("#logo").val() == "propio") {
    	$("#cofiguracioncatalogo").removeClass("hidden");
    	$("#conprecio").val("no");
    	$("#factor").val("1");


    } 
    else {

    }
});

$("#conprecio").change(function(){
    //alert("Valor Cambiado a: " + $("#logo").val());

    if ($("#conprecio").val() == "si") {
    	$(".factordiv").removeClass("hidden");
    	$("#factor").val("1");


    } 
    else {
    	$(".factordiv").addClass("hidden");
    	$("#factor").val("1");

    }
});

$("[data-fancybox]").fancybox({
		// Options will go here
			});	

    



		</script>
    </body>
</html>