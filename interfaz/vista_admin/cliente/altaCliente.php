<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset= "utf-8" > 
 	<meta name= "viewport" content= "width=device-width, initial-scale=1, shrink-to-fit=no" > 
    <meta name="author" content="José Antonio Guijarro">
 	
 
 	<!-- Bootstrap CSS en la web--> 

 	<link rel= "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity= "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin= "anonymous" > 
   <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 	
 	<link rel="stylesheet" href="estilos.css">
	<title>Alta de un cliente</title>
</head>
<body>
	<h1>Formulario de alta de un cliente </h1>

<form name="formularioAlta" method="POST" action="../vista_admin/IndexAdmin.php?principal=cliente/altaCliente.php">
  <div class="form-group row">
    <label for="nombreCliente" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputEmail3" 
      name="nombre" placeholder="Teclea tu nombre">
    </div>
  </div>
  <div class="form-group row">
    <label for="nombreCliente" class="col-sm-2 col-form-label">Primer Apellido</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputEmail3" 
      name="apellido1" placeholder="Teclea tu primer apellido">
    </div>
  </div>

  <div class="form-group row">
    <label for="nombreCliente" class="col-sm-2 col-form-label">Segundo Apellido</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputEmail3" 
      name="apellido2" placeholder="Teclea tu segundo apellido">
    </div>
  </div>

  <div class="form-group row">
    <label for="nombreCliente" class="col-sm-2 col-form-label">Dirección</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputEmail3" 
      name="direccion" placeholder="Teclea tu dirección">
    </div>
  </div>

  <div class="form-group row">
    <label for="nombreCliente" class="col-sm-2 col-form-label">Localidad</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputEmail3" 
      name="localidad" placeholder="Teclea tu localidad">
    </div>
  </div>
  <div class="form-group row">
    <label for="nombreCliente" class="col-sm-2 col-form-label">Código Postal</label>
    <!--Hago el input del codPostal más corto y limito la entrada a 5 chars-->
    <div class="col-sm-3">
      <input type="text" maxlength="5" class="form-control" id="inputEmail3" 
      name="codPostal" placeholder="Teclea el Código Postal">
    </div>
  </div>

  <div class="form-group row">
    <label for="nombreCliente" class="col-sm-2 col-form-label">Provincia</label>
    <div class="col-sm-4">
      <select name="provincia" class="form-control form-control-lg">
                <option value="Almeria">Almería</option>
                <option value="Badajoz">Badajoz</option>
                <option value="Caceres">Cáceres</option>
                <option value="Madrid">Madrid</option>
                
                
            </select> 
    </div>
  </div>

  <div class="form-group row">
    <label for="nombreCliente" class="col-sm-2 col-form-label">País</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputEmail3" 
      name="pais" placeholder="Teclea tu pais">
    </div>
  </div>
  <div class="form-group row">
    <label for="nombreCliente" class="col-sm-2 col-form-label">NIF</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputEmail3" 
      name="nif" placeholder="Teclea tu nif">
    </div>
  </div>
  <div class="form-group row">
    <label for="nombreCliente" class="col-sm-2 col-form-label">Número de Cuenta</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputEmail3" 
      name="numCta" placeholder="Teclea tu Número de cuenta">
    </div>
  </div>


  
  <div class="form-row">
    <!--ahora voy a colocar los dos botones centrados.
      Para ello hago dos columnas y un botón lo pongo alineado a la derecha
      de la primera columna, y el segundo lo pongo alineado a la izqda-->
    <div class="form-group col-md-4 text-right ">
        <button type="submit" name="alta" class="btn btn-primary">Guardar</button>
    </div>
  
    <div class="form-group col-md-4 text-left">
       <button type="reset" name="cerrar" class="btn btn-secondary">Cancelar</button>
    </div>
  </div>
</form>
	
	<?php
    require_once('rutasAdmin.php');

    if (isset($_POST['alta'])) { //si se ha pulsado el botón de guardar
		

		$tCliente = Clientes::singletonClientes();

		$codPostal=$_POST['codPostal'];
    //Voy a la tabla y veo cuántos clientes hay con el mismo
    //código postal del que voy a insertar
    // a ese número le sumo 1 y el resultado será el nuevo código.
		
		$codigo=$tCliente->getNumeroClienteMismoCodPostal($codPostal)+1;
		

//Vamos a preparar el código para que tenga 4 posiciones
		$codigoString=(string)$codigo;
		$numCaracteres= strlen($codigo); 
    $resta=4-$numCaracteres; //esto es el número de ceros que voy a añadir
    for ($i=1;$i<=$resta;$i++){
    	$codigoString='0'.$codigoString;

    }

   //ahora tengo que concatenarlo con el codPostal
    $idCliente=$codPostal . $codigoString;

    

    $idUsuario = $idCliente;
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $nif = $_POST['nif'];
    $varon = 0;
    $numCta = $_POST['numCta'];
    $comoNosConocio = "Por Internet";

	//Campos de la tabla DireccionesClientes
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];
    $codPostal = $_POST['codPostal'];
    $provincia = $_POST['provincia'];
    $pais = $_POST['pais'];
//El campo activo va a ser true en ambas tablas
    $activo = 1;


//Instancia a la clase Cliente
      $c = new Cliente(0, $idCliente, $idUsuario, $nombre,
    	$apellido1, $apellido2, $nif, 1, $numCta,$comoNosConocio,
    	0);

//Instancia a la clase DireccionesCliente
    $dc = new DireccionesCliente(0, $idCliente, $idUsuario,$direccion,$codPostal, $localidad, $provincia, $pais, $activo);

    
    $insertado = $tCliente->addUnCliente($c);
    if (!$insertado) {
    	echo "<div class="."'alert alert-danger'"." role="."'danger'".">
                    No se ha insertado correctamente el cliente
            </div>";
    } else {
      //insertamos un modal de bootstrap 
      echo "<div class="."'alert alert-success'"." role="."'success'".">
              Se ha insertado correctamente el cliente
            </div>";
   }

    $tDireccionesCliente = DireccionesClientes::singletonDireccionesClientes();
    
    $insertado = $tDireccionesCliente->addUnaDireccionCliente($dc);
    if (!$insertado) {
    	echo "<div class="."'alert alert-danger'"." role="."'danger'".">
                    No se ha insertado correctamente las direcciones del cliente
            </div>";
    } else {
      echo "<div class="."'alert alert-success'"." role="."'success'".">
              Se ha insertado correctamente sus direcciones
            </div>";
    }

}

?>


<script src= "https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity= "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin= "anonymous" ></script>
 	<script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity= "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin= "anonymous" ></script> <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity= "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin= "anonymous" ></script> 
</body>


</html>