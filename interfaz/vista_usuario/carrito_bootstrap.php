<!DOCTYPE html>
<html lang="es">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Plantilla ERP DAM2 IES Castelar</title>

  


  <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

<?php

    include_once ('rutas.php');
    require_once POJOS. "/Producto.php";
    require_once PERSISTENCIA. "/Productos.php";

    require_once POJOS. "/Cliente.php";
    require_once PERSISTENCIA. "/Clientes.php";

    require_once POJOS. "/Pedido.php";
    require_once PERSISTENCIA. "/Pedidos.php";

    require_once POJOS. "/LineaPedido.php";
    require_once PERSISTENCIA. "/LineasPedidos.php";

    //ob_start();
    @session_start();
    if(isset($_POST['borrar'])){
        foreach ($_SESSION['cesta'] as $key => $c) {
            if($c['idProducto']==$_POST['idProducto']){
                unset($_SESSION['cesta'][$key]);
            }
        }
    }

    else{



          $idProducto=$_POST['idProducto'];
          $unidades=$_POST['unidades'];
          $descripcion=$_POST['descripcion'];
          $pvp=$_POST['pvp'];
          $tipoIva=$_POST['tipoIva'];
          $fotoProducto=$_POST['rutaFoto'];


          $detalleProducto=new LineaPedido(0, 0, 
                  $idProducto,$unidades, $descripcion,$pvp,$tipoIva,1);



          //voy a buscar el producto en la cesta.
          //Si ya está, incremento con el número de unidades que vengan del catálogo
          //Si no está, simplemente lo inserto en la cesta y en el array de fotos
          //Esto lo dejo para que lo hagan los alumnos
          

          /**Detecto ahora la pulsación F5 para que no cargue varias veces
          el mismo producto en la cesta*/

          $pulsacionF5 = $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'] .
          print_r($_POST, true);

          if ($_SESSION['ultimaPeticion'] == $pulsacionF5) {
            echo 'Has pulsado F5';
          } else {
            $_SESSION['ultimaPeticion'] = $pulsacionF5;
            $pr=serialize($detalleProducto);
            array_push($_SESSION['cesta'], $pr);
            array_push($_SESSION['fotos'], $fotoProducto);
          }


          //array_push($_SESSION['cesta'], serialize($detalleProducto));
          //array_push($_SESSION['fotos'], $fotoProducto);
          $cesta=$_SESSION['cesta'];
          $fotos=$_SESSION['fotos'];
          
      }
//echo "<h5>Productos actualmente en tu cesta:</h5><br><br>";
?>


    <table class="table table-bordered table-hover">
      <thead thead-light>
        <tr>
          <th scope="col">Referencia</th>
          <th scope="col">Unidades</th>
          <th scope="col">Descripción</th>
          <th scope="col">PVP</th>
          <th scope="col">IVA</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Foto</th>
        </tr>
      </thead>
      
      <tbody>

    <?php

        $baseImponible=0; 

        $ivaTotal=0;
        //Investigar el align que en html5 no funciona
        $i=0;
        foreach ($cesta as $detalle)
        {
            $detalleProducto=unserialize($detalle);
            $subtotal= $detalleProducto->getPvp() *
                    $detalleProducto->getUnidades();

            
            echo "<tr>"
                . "<td>".$detalleProducto->getIdProducto(). "</td>"
                . "<td align='right'>".$detalleProducto->getUnidades(). "</td>"
                . "<td>".$detalleProducto->getDescripcion(). "</td>"
                . "<td align='right'>".number_format($detalleProducto->getPvp(),2). " €". "</td>"
                . "<td align='right'>".$detalleProducto->getTipoIva(). "</td>"
                . "<td align='right'>".number_format($subtotal,2). " €". "</td>"
                . "<td><img style='height: 15%'; src='interfaz/". $fotos[$i] . "'". "</td>"
              ."</tr>";
            $i++;
            $baseImponible+=$subtotal;
            $ivaTotal+=$subtotal*$detalleProducto->getTipoIva()/100;
            $totalCompra=$baseImponible+$ivaTotal;
            
        }
   
    ?>

    </tbody>
    
    </table>


    <table class="table table-bordered table-striped">
      <thead thead-light>
        <tr>
          <th scope="col">Base Imponible</th>
          <td> <?php echo number_format($baseImponible,2)." €"; ?>
          <th scope="col">IVA</th>
          <td> <?php echo number_format($ivaTotal,2)." €"; ?>
          <th scope="col">Total Pedido</th>
          <th> <?php echo number_format($totalCompra,2)." €"; ?>
        </tr>
      </thead>
    </table>

    <table class="bordered">
      <tr>
          <td>
              <form method="post" action="indexInicial.php?principal=interfaz/vista_usuario/catalogo_productos_carrito.php">
      
                  <button type="submit" class="btn btn-success">Seguir comprando</button>
      
              </form>
          </td>
          <td>
              <form method="post" action="indexInicial.php?principal=interfaz/vista_usuario/generarPedido.php">
                  <button type="submit" class="btn btn-success">Procesar Pedido</button>
              </form>
          </td>
      </tr>
    </table>

    <!-- PAYPAL -->
    <?php
    include('paypal/config.php');
    $productName = "Producto demostración";
    $currency = "EUR";
    $productPrice = $totalCompra;
    $productId = $idProducto;
    $orderNumber = "000";
    ?>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstraptheme.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
    <div class="container">
        <table class="table">
            <tr>
                <td style="width:150px"><?php include 'paypal/paypalCheckout.php'; ?></td>
            </tr>
        </table>
    </div>
    </body>
    </html>


   

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>











