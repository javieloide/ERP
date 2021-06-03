<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Listado de Productos con Bootstrap</title>


	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 	
</head>
<body>







<?php  
	require_once '../../pojos/Producto.php';
	require_once '../../persistencia/Productos.php';


	$tProducto = Productos::singletonProductos();
	$tabla=$tProducto->getProductosTodos();

	?>

		  
		



<table style= "font-size:12px;" class="table table-hover table-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id_producto</th>
      <th scope="col">id_familia</th>
      <th scope="col">precio_coste</th>
      <th scope="col">pvp</th>
      <th scope="col">descripcion</th>
      <th scope="col">codigo_barras</th>
      <th scope="col">id_proveedor</th>
      <th scope="col">stock_actual</th>
      <th scope="col">stock_minimo</th>
      <th scope="col">stock_maximo</th>
      <th scope="col">foto</th>


    </tr>
  </thead>
  <tbody>
    <?php 
		foreach ($tabla as $c) {
			echo "<tr>";
				echo "<td>". $c->getIdProducto(). "</td>";
				echo "<td>". $c->getIdFamilia(). "</td>";
				echo "<td>". $c->getPrecioCoste(). "</td>";
				echo "<td>". $c->getPvp(). "</td>";
				echo "<td>". $c->getDescripcion(). "</td>";
				echo "<td>". $c->getCodigoBarras(). "</td>";
				echo "<td>". $c->getIdProveedor (). "</td>";
				echo "<td>". $c->getStockActual(). "</td>";
				echo "<td>". $c->getStockMinimo(). "</td>";
				echo "<td>". $c->getStockMaximo(). "</td>";
				echo "<td><img src='../../interfaz/".$c->getRutaFoto()."' width=50 height=50></td>";
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
