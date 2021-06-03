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
<h1>Filtro de un cliente </h1>

<form name="formularioFiltro" method="POST" action="../vista_admin/IndexAdmin.php?principal=cliente/filtroCliente.php">
    <div class="form-group row">
        <label for="nif" class="form-label">NIF</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nif"
                   name="nif" placeholder="Teclea el nif a buscar">
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

require_once '../../pojos/Cliente.php';
require_once '../../persistencia/Clientes.php';

require_once '../../pojos/DireccionesCliente.php';
require_once '../../persistencia/DireccionesClientes.php';

if (isset($_POST['buscar'])) { //si se ha pulsado el botón de guardar

    $tCliente = Clientes::singletonClientes();

    if($_POST['nif']!=null){
        $tabla=$tCliente->getClienteByNif($_POST['nif']);
    } else {
        $tabla = array();
    }

?>

<?php
if(empty($tabla)) {
    echo "<div class="."'alert alert-danger'"." role="."'alert'".">
            ADVERTENCIA ---- ¡Ese nif no existe!
           </div>";
} else {
    echo "
	<table style= " . "'font-size:12px'; " . "class=" . "'table table-hover table-sm'" . ">
		<thead class=" . "'thead-dark'" . ">
			<tr>
				<th scope=" . "col" . ">Código</th>
				<th scope=" . "col" . ">Login</th>
				<th scope=" . "col" . ">Nombre</th>
				<th scope=" . "col" . ">Primer Apellido</th>
				<th scope=" . "col" . ">Segundo Apellido</th>
				<th scope=" . "col" . ">NIF</th>
				<th scope=" . "col" . ">Varón</th>
				<th scope=" . "col" . ">Núm Cuenta</th>
				<th scope=" . "col" . ">Cómo nos conoció</th>
				<th scope=" . "col" . ">Estado</th>
			</tr>
		</thead>
		<tbody>
		";
}
?>
	<?php
		//aquí llega el $tablaClientes de la persistencia en forma de $tabla
        if($_POST['nif']!=null){
            foreach ($tabla as $c) {

                echo "<tr>";
                echo "<td>". $c->getIdCliente(). "</td>";
                echo "<td>". $c->getIdUsuario(). "</td>";
                echo "<td>". $c->getNombre(). "</td>";
                echo "<td>". $c->getApellido1(). "</td>";
                echo "<td>". $c->getApellido2(). "</td>";
                echo "<td>". $c->getNif(). "</td>";
                echo "<td>". $c->getVaron(). "</td>";
                echo "<td>". $c->getNumCta(). "</td>";
                echo "<td>". $c->getComoNosConocio(). "</td>";
                echo "<td>". $c->getActivo(). "</td>";
                echo "<tr>";
            }
            echo "</tbody>";
            echo "</table>";
        }

}

    ?>