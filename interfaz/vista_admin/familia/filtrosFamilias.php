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
</head>
<body>
<h1>Filtro de una Familia </h1>

<form name="formularioAlta" method="POST" action="../vista_admin/IndexAdmin.php?principal=familia/filtrosFamilias.php">
    <div class="form-group row">
        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nombre"
                   name="nombre" placeholder="Teclea el nombre a buscar">
        </div>
	</div>
	
	<div class="form-group row">
        <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="descripcion"
                   name="descripcion" placeholder="Teclea el descripcion a buscar">
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

if (isset($_POST['buscar'])) { //si se ha pulsado el botón de guardar

    $tFamilia = FamiliasProductos::singletonFamiliasProductos();
    $tabla=$tFamilia->getFiltFamilia($_POST['nombre'], $_POST['descripcion']);
	?>

<?php

?>
	<table style= "font-size:12px; "class="table table-hover table-sm">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Código</th>
				<th scope="col">Nombre</th>
				<th scope="col">Descripción</th>
				<th scope="col">Estado</th>
			</tr>
		</thead>
		<tbody>
	<?php
		//aquí llega el $tablaClientes de la persistencia en forma de $tabla

		foreach ($tabla as $c) {

			echo "<tr>";
				echo "<td>". $c->getIdFamilia(). "</td>";
				echo "<td>". $c->getNombre(). "</td>";
				echo "<td>". $c->getDescripcion(). "</td>";
				echo "<td>". $c->getActivo(). "</td>";
			echo "<tr>";
		}
		echo "</tbody>";
	echo "</table>";
}

	?>