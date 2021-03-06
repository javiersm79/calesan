<?php 
session_start(); 
 ?>
<nav class="menu">
    		<ul class="active">				
				<li id="index"><a href="index.php">Inicio</a></li>
				<li id="empresa"><a href="empresa.php">Empresa</a></li>
				<li id="ubicacion"><a href="ubicacion.php">Ubicación</a></li>
                <li id="contactenos"><a href="contactenos.php">Contáctenos</a></li> 

                <?php if (!isset($_SESSION["caleauth"])){
                    echo '<li id="login"><a href="login.php">Iniciar Sesión</a></li>';
                }
                else
                {
                    echo '<li id="salir"><a href="#" onclick="logoutSocio();">Cerrar Sesión</a></li>';
                }



                

                ?>            
								
				
			</ul>
    <a class="toggle-nav" href="#">&#9776;</a>


</nav>
<!-- <div id="shopcar" style="display:inline-block; float:right;">
	<a href="checkout.html">
		<div ><img src="themes/images/shoppingcart.png" width="70" height="70"> </div>
		<div style="position: absolute; top:right;"><span id="cartnum" class="badge badge-warning">12</span></div>
	</a>
</div> -->

<style type="text/css">
/*----- Toggle Button -----*/
.toggle-nav {
    display:none;
}
 
/*----- Menu -----*/
@media screen and (min-width: 860px) {
    .menu {
        width:97%;
        padding:10px 18px;
        box-shadow:0px 1px 1px rgba(0,0,0,0.15);
        border-radius:3px;
        background:##dddddd;
        margin: auto;

    }
}

.menu ul {
    display:inline-block;
}
 
.menu li {
    margin:0px 50px 0px 0px;
    float:left;
    font-size:15px;
}
 
.menu li:last-child {
    margin-right:0px;
}
 
.menu a {
    text-shadow:0px 1px 0px rgba(0,0,0,0.5);
    color:#777;
    transition:color linear 0.15s;
}
 
.menu a:hover, .menu .current-item a {
    text-decoration:none;
    color:#660000;
}
 

 
/*----- Responsive -----*/
@media screen and (max-width: 1150px) {
    .wrap {
        width:100%;
    }
}
 

 
@media screen and (max-width: 860px) {
    .menu {
        position:relative;
        display:inline-block;
		width:70%;
    }

    .menu ul.active {
        display:none;
    }
 
    .menu ul {
		z-index: 77777777;
        width:100%;
        position:absolute;
        top:120%;
        left:0px;
        padding:10px 18px;
        box-shadow:0px 1px 1px rgba(0,0,0,0.15);
        border-radius:3px;
        background:#dddddd;
    }
 
    .menu ul:after {
        width:0px;
        height:0px;
        position:absolute;
        top:0%;
        left:22px;
        content:'';
        transform:translate(0%, -100%);
        border-left:7px solid transparent;
        border-right:7px solid transparent;
        border-bottom:7px solid #303030;
    }
 
    .menu li {
        margin:5px 0px 5px 0px;
        float:none;
        display:block;
    }
 
    .menu a {
        display:block;
    }
 
    .toggle-nav {
        padding:20px;
        float:left;
        display:inline-block;
        box-shadow:0px 1px 1px rgba(0,0,0,0.15);
        border-radius:3px;
        background:#dddddd;
        text-shadow:0px 1px 0px rgba(0,0,0,0.5);
        color:#777;
        font-size:20px;
        transition:color linear 0.15s;
    }
 
    .toggle-nav:hover, .toggle-nav.active {
        text-decoration:none;
        color:#535362;
		
    }

}
</style>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('.toggle-nav').click(function(e) {
        jQuery(this).toggleClass('active');
        jQuery('.menu ul').toggleClass('active');
 
        e.preventDefault();
    });
});
</script>