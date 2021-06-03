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
	<title>Alta de una Familia</title>
</head>
<body>
	<h1>Formulario de alta de una Familia </h1>
<form name="formularioAlta" method="POST" action="../vista_admin/IndexAdmin.php?principal=familia/altaFamilias.php">
  <div class="form-group row">
    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputEmail3" 
      name="nombre" placeholder="Teclea tu nombre">
    </div>
  </div>
  <div class="form-group row">
    <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="inputEmail3" 
      name="descripcion" placeholder="Teclea la descripcion">
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
	require_once '../../pojos/FamiliaProducto.php';
	require_once '../../persistencia/FamiliasProductos.php';

	if (isset($_POST['alta'])) { //si se ha pulsado el botón de guardar
		
		$tFamilia = FamiliasProductos::singletonFamiliasProductos();
    //Voy a la tabla y veo cuántos clientes hay con el mismo
    //código postal del que voy a insertar
    // a ese número le sumo 1 y el resultado será el nuevo código.
	 
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $activo = 1;
    $idFamilia = "000".($tFamilia->getNumeroFamilia()+1);
  
    $f = new FamiliaProducto(0, $idFamilia, $nombre, $descripcion, $activo);
    
    $insertado = $tFamilia->addUnaFamilia($f);
    if (!$insertado) {
      echo "<div class="."'alert alert-danger'"." role="."'danger'".">
        Error al insertar la Familia 
       </div>";
    } else {
      //insertamos un modal de bootstrap 
      echo "<div class="."'alert alert-success'"." role="."'success'".">
       Familia insertada correctamente
       </div>";
   }

}

?>


<script src= "https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity= "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin= "anonymous" ></script>
 	<script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity= "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin= "anonymous" ></script> <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity= "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin= "anonymous" ></script> 
</body>


</html>