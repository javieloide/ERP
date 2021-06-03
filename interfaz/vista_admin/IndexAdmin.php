 <?php 
 ob_start();
 @session_start();

 //Plantilla para la vista del administrador
//Iconos de la web https://icon-icons.com/
/***
Vamos a suponer que el usuario se loguea correctamente antes de entrar aquí, y en ese 
formulario de login se establece una variable de sesión $_SESSION['user']="admin"

Como en principio, no tenemos ese formulario de login, vamos a establecer de forma manual
esa variable de sessión, pero hay que tenerlo en cuenta para cuando avancemos el desarrollo
***/
$_SESSION['user']="06";
?>

 <!doctype html> 
 <html lang= "es" > 
 <head> <!-- Required meta tags --> 
 	<meta charset= "utf-8" > 
 	<meta name= "viewport" content= "width=device-width, initial-scale=1" > 
    <meta name="author" content="José Javier Acosta Blasco">
 	



  
 	<!-- Bootstrap CSS en la web--> 

 	<link rel= "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity= "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin= "anonymous" > 
     <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 	
 	<link rel="stylesheet" href="../../estilos.css">

  <!--  OJO!! Si la ruta a la hoja de estilos no está bien, la barra de navegación
    se queda pillada y no funciona
-->
 	<title> Plantilla para la vista del Admin del ERP IES Castelar</title> 
 </head> 


 <body style="background-color: #F8F9CE"> 
 	<div class="container"> <!--contenedor principal-->

 	
<!-----------barra con submenús, pero hace uso de una hoja de estilos externa (estilos.css)

https://www.codeply.com/go/ji5ijk6yJ4/bootstrap-4-dropdown-submenu-on-hover-(navbar)
	------->
<nav class="navbar navbar-expand-md navbar-dark bg-success">
    
    <a class="navbar-brand " href="IndexAdmin.php?principal=../../informativas/inicio.php">IES Castelar</a>
    
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarClientes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Clientes </a>
                <ul class="dropdown-menu" aria-labelledby="navbarClientes">
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=cliente/altaCliente.php">Añadir Cliente</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=cliente/modificarCliente.php">Editar/Modificar datos y direcciones</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=cliente/filtroCliente.php">Filtros de Clientes</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=cliente/listadoClientes.php">Listado</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDepartamentos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Departamentos </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDepartamentos">
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=departamento/altaDepartamento.php">Añadir Departamento</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarEmpleados" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Empleados </a>
                <ul class="dropdown-menu" aria-labelledby="navbarEmpleados">
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=empleado/altaEmpleado.php">Añadir Empleado</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=empleado/modificarEmpleado.php">Editar/Modificar datos y direcciones</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=empleado/filtroEmpleado.php">Filtros de Empleados</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=empleado/listadoEmpleados.php">Listado</a></li>
                </ul>
            </li>
			<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarFamilias" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Familias </a>
                <ul class="dropdown-menu" aria-labelledby="navbarFamilias">
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=familia/altaFamilias.php">Añadir Familia</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=familia/modificarFamilia.php">Editar/Modificar</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=familia/filtrosFamilias.php">Filtros de Familias</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=familia/listadoFamilias.php">Listado Pedidos/Facturas de una familia</a></li>
                </ul>
            </li>
			<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarProductos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Productos </a>
                <ul class="dropdown-menu" aria-labelledby="navbarProductos">
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=producto/altaProducto.php">Añadir Producto</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=producto/modificarProducto.php">Editar/Modificar datos</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=producto/filtroProducto.php">Filtros de Productos</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=producto/listadoProductos.php">Listado de Productos</a></li>
                </ul>
            </li>
			<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarPedidos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Pedidos </a>
                <ul class="dropdown-menu" aria-labelledby="navbarPedidos">
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=pedido/listadoPedidos.php">Todos</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=pedido/listadoPedidosEntreFechas.php">Listado entre fechas</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=pedido/listadoPedidosPorCliente.php">Listado por cliente</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=pedido/facturarPedido.php">Facturar Pedido</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=pedido/listadoPedidosEmpleadoEmpaqueta.php">Listado por empleado que empaqueta</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=pedido/listadoPedidosPorEmpresaTransporte.php">Listado por empresa de transporte</a></li>
                    
                </ul>
            </li>
		
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarUsuarios" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Usuarios/Roles </a>
                <ul class="dropdown-menu" aria-labelledby="navbarUsuarios">
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=usuario/altaUsuario.php">Alta Usuario</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=usuario/bajaUsuario.php">Baja Usuario</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=rol/modificarRol.php">Modificación/Edición - Rol</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=usuario/modificarUsuario.php">Modificación/Edición - Usuario</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=rol/altaRol.php">Añadir nuevo rol</a></li>
                    <li><a class="dropdown-item" href="IndexAdmin.php?principal=rol/bajaRol.php">Baja rol</a></li>
                </ul>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="IndexAdmin.php?principal=cerrarSesion.php">Cerrar Sesión</a>
            </li>
           
        </ul>
    </div>
</nav>













  
    
<!--Vamos a programar ahora la parte por debajo de las barras de navegación

Empezaremos por un contenedor que tendrá dos div's, aunque podríamos dejar sólo un div ya que el efecto con dos div's se mostró en la plantilla del usuario cliente. Además, a efectos prácticos, el administrador quizás deberíamos dejarle más espacio en la pantalla, o bien, en ese aside de la izquierda, ponerle otras herramientas de administración. Es obvio que no necesita las informativas.

En cualquier caso, dejo debajo de IES Castelar, un enlace a la "landing page" para que se vea el efecto de llamar al carrusel, que tiene su truco con las rutasAdmin.php. 
Sin ese archivo de rutas, no funcionaría tal como pretendemos.
-->
 	
<div class="container">
 		
    <div class="row">
    <!------------------------Parte izquierda de la pantalla (aside)     ------------------>
     		<div class="col-lg-3">
     				<!--Elementos sueltos del menú lateral-->

    			 <div class= "dropdown menu" > 
    			 	<a class= "dropdown-item" href= "IndexAdmin.php?principal=../../informativas/inicio.php" > Inicio </a> 
    			 	<a class= "dropdown-item" href= "IndexAdmin.php?principal=../../informativas/contacta.php" > Contacta </a> 
    			 	<a class= "dropdown-item" href= "IndexAdmin.php?principal=../../informativas/dondeEstamos.html" > Dónde estamos </a> 
    			 	<div class= "dropdown-divider" ></div> 
    			 	<a class= "dropdown-item" href= "IndexAdmin.php?principal=../../informativas/acercade.php" > Acerca de nosotros </a> 
    			 </div> 
  		
     		</div>
     		 		
    <!------------------------Parte derecha de la pantalla (section)     ------------------>

            <div class="col-lg-9">
            	<!--Parte derecha de la pantalla-->
                <?php 

                  include  ("rutasAdmin.php");
                  /*la diferencia con require es que si no está archivo, include sólo da un warning, pero sigue require aborta la ejecución require_once, si ya está incluido, no lo incluye otra vez require, lo incluye siempre*/

                    
                    if (isset($_GET['principal'])){
                        
                        require_once $_GET['principal'];
                    }
                    else{
                        require_once "../../informativas/inicio.php";
                    }
                ?>

            	
            </div>


    </div>
</div>


<!--por último, colocaremos la parte del footer-->


<footer class="py-3 bg-success">
    <div class="container">

      <p class="m-0 text-center text-white">Acosta Blasco 2020</p>
      
    </div>

    
</footer>
</div> <!--contenedor principal-->


 	<!-- Optional JavaScript --> 
 	<!-- jQuery first, then Popper.js, then Bootstrap JS --> 


 	<script src= "https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity= "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin= "anonymous" ></script>
 	<script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity= "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin= "anonymous" ></script> 
    <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity= "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin= "anonymous" ></script> 
 


 </body> 
</html> 