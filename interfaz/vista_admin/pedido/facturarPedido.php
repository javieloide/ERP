
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
 	
</head>
<body>
<h2>Facturar pedido</h2>
<!--Sería conveniente utilizar AJAX en este script para recargar-->
<form name="formularioFiltro" method="POST" action="../vista_admin/IndexAdmin.php?principal=pedido/facturarPedido.php">
	
<div class="form-group"> 
                    <h3>codigo pedido:</h3>   
                    <select name="codigo" class="custom-select" onchange="this.form.submit()">
						<?php
							require_once '../../pojos/Pedido.php';
							require_once '../../persistencia/Pedidos.php';
						
							require_once '../../pojos/LineaPedido.php';
							require_once '../../persistencia/LineasPedidos.php';
						
							$tPedido = Pedidos::singletonPedidos();
							$todosPedidos = $tPedido->getPedidosNoFacturados();
							
                            foreach ($todosPedidos as $p) {
                                	echo '<option value="'.$p->getIdPedido().'">'.$p->getIdPedido().'</option>';
                            }
                                echo '<option id="seleccionado" value="'.$p->getIdPedido().'" selected>...</option>';
                        ?>
					</select>			
</div>

</form>	


<?php


@session_start();

if (isset($_POST["codigo"])) {
   if($tPedido->facturarPedido($_POST["codigo"])){
    $_SESSION['idPedido']=$_POST['codigo'];
    echo "<form name='formulario' method='post' action='../vista_admin/pedido/imprimirPedidoPDF.php'>
                                     <input type='submit' class='btn btn-primary' name='pdf' value='Imprimir Pedido'>
         </form>";
   } 
  
  }
?>
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>