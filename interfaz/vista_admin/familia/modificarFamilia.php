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
	<title>Modificar una Familia</title>
</head>
<body>
	<h1>Modificación de una Familia </h1>

<form name="formularioAlta" method="POST" action="../vista_admin/IndexAdmin.php?principal=familia/modificarFamilia.php">
    <div class="form-group row">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-8">
        <input type="text" class="form-control" id="inputEmail3" 
        name="nombre" placeholder="Teclea el nombre">
        </div>
    </div>

  <div class="form-row">
    <div class="form-group col-md-4 text-right ">
        <button type="submit" name="buscar" class="btn btn-primary">Buscar</button>
    </div>
    <div class="form-group col-md-4 text-left">
       <button type="reset" name="cerrar" class="btn btn-secondary">Cancelar</button>
    </div>
  </div>
</form>
	
<?php
    require_once '../../pojos/FamiliaProducto.php';
    require_once '../../persistencia/FamiliasProductos.php';
    $tFamilia = FamiliasProductos::singletonFamiliasProductos();
    $familias = $tFamilia->getFamiliasProductosTodos();

	if (isset($_POST['buscar'])) { //si se ha pulsado el botón de guardar
	    if(empty($_POST['nombre'])){
	        echo "<div class="."'alert alert-danger'"." role="."'danger'".">
                    Debes introducir un nombre valido
            </div>";
        } else {
        $tabla = $tFamilia->getNombreFamilia($_POST['nombre']);
        }

	if(!empty($tabla)){
    ?>

        <form name="formularioAlta" method="POST" action="IndexAdmin.php?principal=modificarFamilia.php">
            <div class="form-group row">
                <div class="col-sm-8">
                    <input type="hidden" class="form-control" id="inputEmail3" name="nombre" value='<?php echo $tabla[0]->getNombre() ?>'>
                </div>
            </div>

            <div class="form-group row">
                <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3"
                           name="descripcion" value='<?php echo $tabla[0]->getDescripcion() ?>'>
                </div>
            </div>

            <div class="form-row">
                <!--ahora voy a colocar los dos botones centrados.
                  Para ello hago dos columnas y un botón lo pongo alineado a la derecha
                  de la primera columna, y el segundo lo pongo alineado a la izqda-->
                <div class="form-group col-md-4 text-right ">
                    <button type="submit" name="modificar" class="btn btn-primary">Modificar</button>
                </div>

                <div class="form-group col-md-4 text-left">
                    <button type="reset" name="cerrar" class="btn btn-secondary">Cancelar</button>
                </div>

            </div>
        </form>
    <?php
    }
    }
        if (isset($_POST['modificar'])) {
            $tabla = $tFamilia->getFamiliaByIdFamilia();
            $familia = new FamiliaProducto(0, $tabla[0]->getIdFamilia(), $_POST['nombre'], $_POST['descripcion'], 1);
            $insertado = $tFamilia->updateFamilia($familia);
            if (!$insertado) {
                echo "<div class="."'alert alert-danger'"." role="."'danger'".">
                    Error al intentar actualizar la familia
            </div>";
            } else {
                echo "<div class="."'alert alert-success'"." role="."'success'".">
                    Familia actualizada correctamente
            </div>";
            }
        }


    ?>
<script src= "https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity= "sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin= "anonymous" ></script>
 	<script src= "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity= "sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin= "anonymous" ></script> <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity= "sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin= "anonymous" ></script> 
</body>
</html>