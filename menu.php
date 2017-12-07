<style type="text/css">
.flexContainer {
    display: flex;
    height: 100%;
}

.inputField {
    flex: 1;
}
</style>
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


<div class="navbar">
	<div class="navbar-inner">

		<div class="account pull-left" style="height: 50px">
			<ul class="user-menu">				
				<li id="index"><a href="index.php">Inicio</a></li>
				<li id="empresa"><a href="empresa.php">Empresa</a></li>
				<?php 
				if (isset($_SESSION["caleauth"]) and ($_SESSION["caleauth"] == "socioautorizado" or $_SESSION["caleauth"] == "adminautorizado" or $_SESSION["caleauth"] == "operadorautorizado")) 
				{
					echo '<li id="catalogowebsociov"><a href="catalogoweb.php">Descargar Catálogo</a></li>';
				}
				else
				{
					echo '<li id="catalogoweb"><a href="catalogowebvisitante.php">Descargar Catálogo</a></li>';

				}

					

				?>
				
				<!-- <li id="cotizacion"><a href="cotizar.php">Cotización</a></li> -->
				<li id="ubicacion"><a href="ubicacion.php">Ubicación</a></li>
				<li id="contactenos"><a href="contactenos.php">Contáctenos</a></li>
				<li>
	                <!-- <input type="text" class="form-control"  placeholder="Buscar..." > -->
	                <form action="busqueda.php" type="get">
	                	<div class="flexContainer">
					    <input type="text" class="inputField" name="busqueda">
					    <button type="submit" style="height: 30px" onclick="buscarProducto">Buscar</button>
						</div>
					</form>
	             </li>					
			</ul>	
		</div>

<?php if (isset($_SESSION["caleauth"]) and $_SESSION["caleauth"] == "socioautorizado") { 

?>
		<div class="account pull-right">
			<ul class="user-menu">
				
				
				<li id="misdatos"><a href="administracion/pages/misdatos.php">Mis datos</a></li>	
				<li id="salir"><a href="#" onclick="logoutSocio();">Salir</a></li>	
			</ul>
		</div>
<?php 
}
else if (isset($_SESSION["caleauth"]) and $_SESSION["caleauth"] == "operadorautorizado") { 

?>
		<div class="account pull-right">
			<ul class="user-menu">
				
				
				<li id="misdatos"><a href="administracion/pages/operador.php">Operador</a></li>	
				<li id="salir"><a href="#" onclick="logoutSocio();">Salir</a></li>	
			</ul>
		</div>
<?php 
}

else if (isset($_SESSION["caleauth"]) and $_SESSION["caleauth"] == "adminautorizado")
{
 ?>
		<div class="account pull-right">
			<ul class="user-menu">
				<li id="admin"><a href="administracion/pages/misdatosadm.php" target="blank">Administracion</a></li>
<!-- 				<li id="catalogoweb"><a href="catalogoweb.php">Imprimir Catalogo</a></li>
				<li id="catalogoweb"><a href="catalogowebsocio.php">Catalogo (Socio saltos)</a></li>
				<li id="catalogoweb"><a href="catalogowebsocioh.php">Catalogo (Socio Horiz)</a></li> 
				<li id="catalogoweb"><a href="catalogowebsociov.php">Catalogo</a></li>-->
				<li id="salir"><a href="#" onclick="logoutSocio();">Salir</a></li>	
			</ul>

		</div>

<?php 
}
else
{
 ?>
 
 		<div class="account pull-right">
			<ul class="user-menu">
				<!--  -->
				<li class="dropdown" id="menuLogin">
				<a class="dropdown-toggle" href="#" data-toggle="dropdown" id="navLogin">Iniciar Sesión</a>
				<div class="dropdown-menu" style="padding:17px;">
				  <form class="form" id="formLogin"> 
					<p>Ingrese su RUT <small>(sin puntos)</small> y Clave</p>
					<input name="rut" id="rut" type="text" placeholder="RUT" value=""> 
					<input name="password" id="password" type="password" placeholder="Password"><br>
					<button type="button" id="btnLogin" class="btn" onclick="loginSocio()">Login</button><br><br>
					<div id="loginMsg" class="alert alert-danger hidden" role="alert"></div>
				  </form>
				</div>
			  </li>
<!-- 			  <li>
 					<a href="cotizar.php">
						<div style="position: absolute; top: 170px;"><img src="themes/images/shoppingcart.png" width="70" height="70"> </div>
						<div style="position: absolute; top: 170px;"><label id="cartnum" class="badge badge-warning"><?php echo $numeroarticulos; ?></label></div>
					</a>
				
			  </li> -->
			</ul>
		</div>
<?php } ?>		

 
	</div>
</div>
<div class="account pull-right">
<h4>Telefono: (+56) 2 2773 2357 / Email: ventas@calesan.cl</h4>

</div>