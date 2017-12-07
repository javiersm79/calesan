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
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
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
				<div id="shopcarm" class="span1">
					<a href="cotizar.php">
						<div style="position: absolute; top: 70px; right: 35px"><img src="themes/images/shoppingcart.png" width="70" height="70"> </div>
						<div style="position: absolute; top: 70px; right: 35px"><label id="cartnum" class="badge badge-warning"><?php echo $numeroarticulos; ?></label></div>
					</a>
				</div>
			</div>
		</div>	
		<div id="wrapper" class="container">
			<section class="navbar main-menu">

			</section>

			<section class="header_text">

				<h1 style="background-color:#eeeeee; padding:10px;">Solicitud de Cotización</h1>
			<!-- 	<p class="lead">Seleccione la categoria de productos.</p> -->

			</section>
			<section id="seccionprimaria" class="main-content">
				
<div id="listaproductos">																	
<!-- ************************************************************************************************************* -->




<!-- ************************************************************************************************************* -->								
			<div class="row">
				<div class="span12">		
		<?php 
		if (isset($_SESSION['items']))
		{
			foreach($_SESSION['items'] as $idgrupo=>$grupo)
			{
				echo '<table class="table table-striped table-hover table-bordered">';
				echo '<tbody>';
		?>				
		    <tr>
			<th colspan="4" ><h4><?=$idgrupo ?></h4></th>
			</tr>
            <tr>
                <th>Codigo</th>
                <th>Descripción</th>
				
                <th>Cant.</th>
                <th class='show-on-mobile'>Acci.</th>
                <th class='hide-on-mobile'>Acciones</th>

            </tr>
			<?php 
			foreach($grupo as $indicador=>$articulo)
			{
				$consulta = "SELECT * FROM maestraproducto "; 
				$consulta.= "WHERE id = '$articulo[id]'  "; 
				$recibeCampo = mysqli_query($link, $consulta); 
				$filas = mysqli_fetch_array($recibeCampo); 
				echo "<tr>";
				echo "<td>$filas[codigo]</td>";
				echo "<td style='width: 50%'>$filas[medida] $filas[unidadmedida] <br> ".str_replace("?","<br>",$filas["informadicional"])."</td>";
				
				/*$descripcionprod= explode(", ", $filas["descripcionprod"]);
				$columnas = array_reverse($descripcionprod);
				foreach ($columnas as $value)
					{
						echo "<th>$value</th>";
					}*/
				echo "<td id='cant$articulo[id]'>$articulo[cantidad]</td>";
				//$cantsumar = $_SESSION['items'][$grupo][$posicion]["cantidad"];
				//$cantsumar = $articulo['cantidad'] + 1;
				echo "<td class='form-inline hide-on-mobile'>";
				

				/*

				echo "<button type='button' type='button' class='btn btn-xs btn-success' title='Sumar' onclick='sumarProducto($indicador, \"".$filas['descripcionproducto']."\", $articulo[id])'>+</button>";
		


				if ($articulo["cantidad"] == 1)
				{
					$cantrestar = 0;
					//echo "<button id='restar$articulo[id]' type='button' type='button' class='btn btn-xs btn-danger' title='Restar' onclick='restarProducto($indicador, $idgrupo, $articulo[id], $cantrestar)'>-</button>";
					echo "<button id='restar$articulo[id]' type='button' type='button' class='btn btn-xs btn-danger' title='Restar' onclick='restarProducto($indicador, \"".$filas['descripcionproducto']."\", $articulo[id])' disabled>-</button>";
					
				}
				else
				{
					$cantrestar = $articulo['cantidad'] - 1;
					echo "<button id='restar$articulo[id]' type='button' type='button' class='btn btn-xs btn-danger' title='Restar' onclick='restarProducto($indicador, \"".$filas['descripcionproducto']."\", $articulo[id])'>-</button>";
				}
				*/
				
				echo "<input class='' id='cantNew$articulo[id]f' type='number' ><button type='button' type='button' class='btn btn-xs' title='Actualizar' onclick='actualizarCantidadf($indicador, \"".$filas['descripcionproducto']."\", $articulo[cantidad],$articulo[id])'>Actualizar</button><button type='button' type='button' class='btn btn-xs' title='Eliminar' onclick='deleteProducto($indicador, \"".$filas['descripcionproducto']."\", $articulo[cantidad])'>Eliminar</button></td>";

				//echo "<td class='show-on-mobile' id='cantNewMobile$articulo[id]'><img type='button' src='themes/images/refresh.png' onclick='alert(\"hola\")'></td>";
				
				echo "<td class='show-on-mobile' id='cantNewMobile$articulo[id]'><img type='button' src='themes/images/refresh.png' onclick='actualizarProducto($articulo[id])'></td>";


				echo "<div id='modal$articulo[id]' class='modal'> <div class='modal-content'><span class='close'>&times;</span><label>".$filas['descripcionproducto']."</label>Cantidad:<input class='' id='cantNew$articulo[id]m' type='number' ><button type='button' type='button' class='btn btn-xs' title='Actualizar' onclick='actualizarCantidadm($indicador, \"".$filas['descripcionproducto']."\", $articulo[cantidad],$articulo[id]);'>Actualizar</button><button type='button' type='button' class='btn btn-xs' title='Eliminar' onclick='deleteProducto($indicador, \"".$filas['descripcionproducto']."\", $articulo[cantidad])'>Eliminar</button></td></div></div>";
				/*echo "<input class='' id='cantidad$articulo[id]' type='number' style='width: 20%'>";

				echo "<button type='button' type='button' class='btn btn-xs' title='Eliminar' onclick='actualizarCantidad($indicador, \"".$filas['descripcionproducto']."\", $articulo[cantidad])'>Actualizar</button>";  
				echo "<button type='button' type='button' class='btn btn-xs' title='Eliminar' onclick='deleteProducto($indicador, \"".$filas['descripcionproducto']."\", $articulo[cantidad])'>Eliminar</button></td>";  */
				
				//echo $indicador.": ID:".$articulo["id"]." "."cantidad:".$articulo["cantidad"]."<br>";
			}

			?>
			 <tr>
<!--                 <td>Awesome2 Product2</td>
                <td><input type="number" value="5" size="5" style="width: 70px;"></td>
                <td>£250.00</td>
                <td>£250.00</td> -->
            </tr>

        </tbody>
    </table>
		<?php 			

	//echo "<br>";
 	//echo "En este grupo ($key) existen: "."<br>";

		
		
			}//fin del foreach principal 
		}//fin de la condicion que valida si el carrito esa vacio 
		else
		{
			echo "<h4 class='alert alert-info'>Aún no hay  productos seleccionados para cotizar</h4>";
		}
 	
 	if (isset($_SESSION['rut']))
		{
			$consulta = "SELECT * FROM clientes "; 
			$consulta.= "WHERE rut = '$_SESSION[rut]'  "; 
			$recibeCampo = mysqli_query($link, $consulta); 
			$cliente = mysqli_fetch_array($recibeCampo);
			$nombree = $cliente['nombre'];
			$rute = $_SESSION['rut'];
			//print_r($cliente);
			//echo $consulta;




		}

 
?>
				</div>
			</div><!-- Fin del ROW capa de los producto -->
</div>
				<div class="row">
					<div class="span3">		
						<label><h4 style="background-color:#eeeeee; padding:5px; text-align: center;">Datos de Contacto</h4></label>
						<label>Nombre</label> <input class="span3" id="nombrec" placeholder="Nombre" type="text" required>
						<!-- <label>RUT</label><input class="span3" id="rutc" placeholder="RUT" type="text" required> -->
						<label>Email</label> <input class="span3" id="emailc" placeholder="Email" type="text" required> 
						<label>Telefono</label> <input class="span3" id="telefonoc" placeholder="Telefono" type="text" required> 
					</div>
					<div class="span4">
						<label><h4 style="background-color:#eeeeee; padding:5px; text-align: center;">Datos de la Empresa</h4></label>
						<label>Nombre</label> <input class="span4" id="nombree" placeholder="Nombre" type="text" value="<?=$nombree; ?>" required>
						<label>RUT</label><input class="span4" id="rute" placeholder="RUT" type="text" value="<?=$rute; ?>" required>

					</div>
			
					<div class="span5">
					<label>&nbsp;</label>
						<label>Notas</label> 
						<textarea class="input-xlarge span5" id="notas" name="notas" rows="8" ></textarea>
						<button type='button' type='button' class='btn btn-xs btn-info' title='Cotizar' onclick='enviarEmail()'>Solicitar Cotización</button>
					</div>
				</div>
<!--             <tr>
                <th colspan="3"><span class="pull-right">Sub Total</span></th>
                <th>£250.00</th>
            </tr>
            <tr>
                <th colspan="3"><span class="pull-right">VAT 20%</span></th>
                <th>£50.00</th>
            </tr>
            <tr>
                <th colspan="3"><span class="pull-right">Total</span></th>
                <th>£300.00</th>
            </tr> -->






<!-- ************************************************************************************************************* -->								
				
					<br/>
						
									
				
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
			loadMenu("cotizacion");

function actualizarProducto(id)
{
	var modal = document.getElementById('modal'+id);
	// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 

    modal.style.display = "block";


// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



}




		
		</script>
    </body>
</html>