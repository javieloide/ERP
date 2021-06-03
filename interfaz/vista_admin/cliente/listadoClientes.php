<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Listado de Clientes con Bootstrap</title>


	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 	
</head>
<body>







<?php
    require_once('rutasAdmin.php');
	$tCliente = Clientes::singletonClientes();
	$tabla=$tCliente->getClientesTodos();

	?>

<table style= "font-size:12px;" class="table table-hover table-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Login</th>
      <th scope="col">Nombre</th>
      <th scope="col">Primer Apellido</th>
      <th scope="col">Segundo Apellido</th>
      <th scope="col">NIF</th>
      <th scope="col">Varón</th>
      <th scope="col">Núm Cuenta</th>
      <th scope="col">Cómo nos conoció</th>
      <th scope="col">Estado</th>

    </tr>
  </thead>
  <tbody>
    <?php 

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


	echo "</table>";

?>
  </tbody>
</table>
	

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
