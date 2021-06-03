<!DOCTYPE html>
<html>
<head>
	<title>Listado de pedidos</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 	
    <style>
        #img{
            float: left;
			margin-left: 20px;
			margin-top: 60px;
        }
        #datos {
            font-size: 10px;
            font-family:verdana;
            text-decoration:none;
        }
		#caja{
			margin-left: 300px;
		}

    </style>
</head>
<body>

<!--Sería conveniente utilizar AJAX en este script para recargar-->

<?php	
@session_start();
require_once '../../pojos/Pedido.php';
require_once '../../persistencia/Pedidos.php';

require_once '../../pojos/LineaPedido.php';
require_once '../../persistencia/LineasPedidos.php';

$tp = Pedidos::singletonPedidos();
$tablaPedidos = $tp->getPedidosTodos();

$tlp = LineasPedidos::singletonLineasPedidos();



 	echo "<div class= 'accordion' id= 'accordionExample' >";

	$i=1;
	
	echo "<br><center><h1>Listado de pedidos</h1></center><br>"; 
	
 	foreach ($tablaPedidos as $p){
 		$tablaLineasPedidos = $tlp->getLineasUnPedido($p->getIdPedido());
	 		echo "<div class= 'card' >";
			
		 	echo "<div id='datos' class= 'card-header' id= 'heading$i'> 
			 			<h5 class= 'mb-0' > 
			 				<button class= 'btn btn-link' type= 'button' data-toggle= 'collapse' data-target= '#collapse$i' aria-expanded= 'false' 		aria-controls= 'collapse$i'"." >" .
                                "<img id='img' width='28%' src='../fotos/general/". "carrito-pedido.png". "'>".
								"<div id='caja'>
								<br><br>Número: ". $p->getIdPedido()."<br><br>".
			 					"Fecha: ". $p->getFechaPedido()."<br><br>".
			 					"Cliente: ".$p->getIdCliente()."<br><br>".
								"Fecha Pago: ". $p->getFechaPago(). 
								"</div>
							 </button>
			 			</h5> 

		 			</div>";
		 			

		 		echo "<div id= 'collapse$i'    class= 'collapse toggle' aria-labelledby= 'heading$i' data-parent= '#accordionExample' > 
		 				<div class= 'card-body' >";
		 				//pintamos la cabecera de la tabla
		 				echo "<table class='table table-hover'>
					            <thead>
								<tr class='table-primary'>
									<td>Referencia</td>
									<td>Unidades</td>
									<td>Descripcion</td>
									<td>PVP</td>
									
									<td>IVA</td>
									<td>Subtotal</td>
					                <td>Foto</td>
								</tr>
					            </thead>";
					     //y ahora, montamos un bucle para pintar cada línea de la tabla. En cada línea va un producto.
		 				foreach ($tablaLineasPedidos as $lp){
		 					pintarTablaLineasPedido($lp);
		 					
		 				};
		 				echo "</table>";
		 				echo "</div> 
		 		</div>";
			echo "</div>";
			$i++;
	 	
	}

echo "</div> ";



function pintarTablaLineasPedido($lp){
	require_once '../../pojos/Producto.php';
	require_once '../../persistencia/Productos.php';
	$tProducto = Productos::singletonProductos();
	$producto = $tProducto->getProductoByIdProducto($lp->getIdProducto());
	echo "<tr class='table-secondary'>";
	echo "<td>" . $lp->getIdProducto() . "</td>";
	echo "<td>" . $lp->getUnidades() . "</td>";
	echo "<td>" . $lp->getDescripcion() . "</td>";
	echo "<td>" . $lp->getPvp() . "</td>";
	echo "<td>" . $lp->getTipoIva() . "</td>";
	$subtotal=$lp->getUnidades()*$lp->getPvp();
	echo "<td style='text-align:right'>" . number_format($subtotal,2)." €" . "</td>";
	//a continuación averiguar cómo podemos poner aquí la 
	//foto de cada producto del pedido.
	//De momento pongo una cualquiera.
	foreach ($producto as $p){
		$rutaFoto = $p->getRutaFoto();
	echo "<td>". "<img width='28%' src='../$rutaFoto' class='img-thumbnail'></td>";
	}
	echo " </tr>";

}
?>







    




<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>