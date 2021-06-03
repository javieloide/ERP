 <?php 
 session_start(); 
 $_SESSION['user'] = "anonimo";
?>
 <!doctype html> 
 <html lang= "es" > 
 <head> 
 	<meta charset= "utf-8" > 
 	<meta name= "viewport" content= "width=device-width, initial-scale=1, shrink-to-fit=no" > 
    <meta name="author" content="Jose Javier Acosta">
    
 	<!-- Bootstrap CSS en la web--> 

 	 <link rel= "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity= "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin= "anonymous" > 
     <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="estilos.css">

  <!--  <link href="css/bootstrap.min.css" rel="stylesheet">
-->
 	<title> Plantilla para la vista de clientes del ERP IES Castelar 2020</title> 
 </head> 


 <body>
 <!--
 





-->
 <?php

 //Espacio reservado para la conexión a las
 //distitnas tablas de la base de datos, según necesidad

    require_once "persistencia/FamiliasProductos.php";
    require_once "pojos/FamiliaProducto.php";
    require_once 'pojos/Usuario.php';
    require_once 'persistencia/Usuarios.php';
    $tUsuario = Usuarios::singletonUsuarios();
    $tFamilia=FamiliasProductos::singletonFamiliasProductos();
    $familias=$tFamilia->getFamiliasProductosTodos();

    //var_dump($familias);











 ?>


 	<div class="container"> <!--contenedor principal-->

 	








<nav class="navbar navbar-expand-md navbar-dark bg-primary">
    


    <a class="navbar-brand pb-2" href="#">IES Castlelar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">

            <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Administración </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="interfaz/vista_admin/IndexAdmin.php">Vista Administrador</a></li>
                </ul>
            </li>-->

            <li class="nav-item">
                <a class="nav-link" href="IndexInicial.php?principal=informativas/inicio.php">Servicios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="IndexInicial.php?principal=informativas/inicio.php">Ofertas</a>
            </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Productos </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li><a class="dropdown-item" href="IndexInicial.php?principal=interfaz/vista_usuario/catalogoProductosCarrito.php">Ver todos <span class="badge">
                                <!--Mostrar número de productos-->
                            </span></a></a></li>
                    
                    <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="IndexInicial.php?principal=informativas/inicio.php">Categorías</a>
                        <ul class="dropdown-menu">
                            <!--
                            Ahora montamos el bucle para sacar la NOMBRE de cada
                            familia y generar una opción de menú con cada una
                            -->
                            <?php  
    foreach ($familias as $fila) {
        ?>
        <li>

        <a class="dropdown-item" href="IndexInicial.php?principal=informativas/inicio.php"> <?php echo $fila->getNombre();
        ?>
            
        </a>
        </li>
  <?php      
    }
?>    
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="IndexInicial.php?principal=informativas/garantia.html">Garantía</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="IndexInicial.php?principal=informativas/nuestrosEmpleados.php">Nuestros Empleados</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="IndexInicial.php?principal=informativas/nuestrosAlmacenes.php">Nuestros almacenes</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Mi cuenta </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php if(!isset($_SESSION['idCliente'])) {?>
                    <li><a class="dropdown-item" href="IndexInicial.php?principal=interfaz/vista_usuario/registro.php">Iniciar Sesión</a></li>
                    <?php }
                    else {
                    ?>
                    
                    <li class="dropdown-submenu">
                        <a class="dropdown-item dropdown-toggle" href="IndexInicial.php?principal=informativas/inicio.php">Mis pedidos</a>
                        <ul class="dropdown-menu">
                            <li>
                            <a class="dropdown-item" href="IndexInicial.php?principal=interfaz/vista_usuario/pedidosPendientesServir.php">Pedidos pendientes de servir</a>
                            </li>
                            <li>
                            <a class="dropdown-item" href="IndexInicial.php?principal=interfaz/vista_usuario/pedidosServidos.php">Pedidos servidos</a>
                            </li>
                            <li>
                            <a class="dropdown-item" href="IndexInicial.php?principal=interfaz/vista_usuario/facturasCliente.php">Mis facturas</a>
                            </li>
                        </ul>    
                    
                    </li>
                    

                    <li><a class="dropdown-item" href="IndexInicial.php?principal=informativas/inicio.php">Mis Listas de la compra</a></li>
                    <li><a class="dropdown-item" href="IndexInicial.php?principal=interfaz/vista_usuario/cerrarSesion.php">Cerrar sesion</a></li>
                    <?php }?>
                </ul>
            </li>
            
        </ul>
        
        <h3><?php 
                    if(isset($_SESSION['idCliente'])) {
                        if($_SESSION['user'] != "anonimo"){
                            $idCliente = $_SESSION['idCliente'];
                            $u = $tUsuario->getUsuarioById($idCliente);
                            if(!empty($u)){
                                echo $u[0]->getLogin();
                            }   
                        }
                       
                    }
                    
                    ?>
                </h3>
    </div>
    
</nav>














  
    
<!--Vamos a programar ahora la parte por debajo de las barras de navegación

Empezaremos por un contenedor que tendrá dos div's: uno que defina la parte izquierda, y otro que se encargue de la parte derecha
-->
 	
<div class="container">
 		
    <div class="row">
    <!------------------------Parte izquierda de la pantalla (aside)     ------------------>
     		<div class="col-lg-3">
     				<!--Elementos sueltos del menú lateral-->

    			 <div class= "dropdown menu" > 
    			 	<a class= "dropdown-item" href= "IndexInicial.php?principal=informativas/inicio.php" > Inicio </a>
    			 	<a class= "dropdown-item" href= "IndexInicial.php?principal=informativas/contacta.php" > Contacta </a> 
    			 	<a class= "dropdown-item" href= "IndexInicial.php?principal=informativas/dondeEstamos.html" > Dónde estamos </a> 
    			 	<div class= "dropdown-divider" ></div> 
    			 	<a class= "dropdown-item" href= "IndexInicial.php?principal=informativas/acercade.php" > Acerca de nosotros </a> 
    			 </div> 
  		
     		</div>
     		 		
    <!------------------------Parte derecha de la pantalla (section)     ------------------>

            <div class="col-lg-9">
            	<!--Parte derecha de la pantalla-->
                <?php 

                  require_once('rutas.php');



                if (isset($_GET['principal'])){
                        require_once $_GET['principal'];

                    }
                    else{
                  
                        //Sólo entra por aquí cuando el usr
                        //entra la primera vez en la web
                        //landing page
                        //require_once "carrusel02.php";
                        require_once "informativas/inicio.php";




                    }
                ?>

            	
            </div>


    </div>
</div>


<!--por último, colocaremos la parte del footer-->


<footer class="py-3 bg-info">
    <div class="container">
      <p class="m-0 text-center text-white">(c) Acosta Blasco 2020</p>
      <p class="m-0 text-right text-dark">IES Castelar(Badajoz)</p>
    </div>
    
</footer>

 	<!-- Optional JavaScript --> 
 	<!-- jQuery first, then Popper.js, then Bootstrap JS --> 


 	<script src= "https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity= "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin= "anonymous" ></script>
 	<script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity= "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin= "anonymous" ></script> <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity= "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin= "anonymous" ></script> 
 </div> <!--contenedor principal-->

 

 </body> 
 
</html> 