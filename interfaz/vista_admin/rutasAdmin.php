

<?php 

/*
Las rutas en php hay que definirlas en el archivo php.ini en la variable 
include_path
Para nuestro caso, yo he configurado esa variable así:
include_path = ".;C:\xampp\htdocs\ERP2021"
para que este archivo d rutas.php se pueda llamar desde cualquier sitio de la aplicación

*/

	require_once('../../pojos/Cliente.php');
	require_once('../../persistencia/Clientes.php');
	require_once("../../pojos/DireccionesCliente.php");
	require_once("../../persistencia/DireccionesClientes.php");
	/*
	@define('GESTIONPEDIDOS',ROOT_PATH.'/gestionPedidos');

	@define('GESTIONEMPLEADOS',ROOT_PATH.'/gestionEmpleados');
	define('GESTIONPRODUCTOS',ROOT_PATH.'/gestionProductos');*/

/* Este archivo hay que dejarlo en el htdocs (directorio raiz dl servidor)
 y luego cuando se necesite incluir, por ejemplo los archivos Cliente.php y Clientes.php 
en algún archivo, hay que hacer:


include (POJOS . "Cliente.php");
include (PERSISTENCIA . "Clientes.php");

*/
?>

