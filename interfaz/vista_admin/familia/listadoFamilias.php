<?php
require_once '../../pojos/FamiliaProducto.php';
require_once '../../persistencia/FamiliasProductos.php';

	$tFamilia = FamiliasProductos::singletonFamiliasProductos();
	$tabla=$tFamilia->getFamiliasProductosTodos();
	//echo "<h1>Productos de la tienda</h1><br><br>";

	?>
	
	<table class="table table-hover table-sm">
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

?>