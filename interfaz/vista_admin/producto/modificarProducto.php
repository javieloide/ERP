<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset= "utf-8" >
    <meta name= "viewport" content= "width=device-width, initial-scale=1, shrink-to-fit=no" >
    <meta name="author" content="José Javier Acosta Blasco">


    <!-- Bootstrap CSS en la web-->

    <link rel= "stylesheet" href= "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity= "sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin= "anonymous" >
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 	
    <title>Modificar un producto</title>
</head>
<body>
<h1>Filtro de un Producto </h1>
<?php
    require_once '../../pojos/Producto.php';
    require_once '../../persistencia/Productos.php';
    require_once '../../pojos/FamiliaProducto.php';
    require_once '../../persistencia/FamiliasProductos.php';
    
    $tFamilia = FamiliasProductos::singletonFamiliasProductos();
    $todasFamilias = $tFamilia->getFamiliasProductosTodos();
    
    $tProducto = Productos::singletonProductos();
    $todosProductos = $tProducto->getProductosTodos();
?>
<form name="formularioFiltro" method="POST" action="../vista_admin/IndexAdmin.php?principal=producto/modificarProducto.php">
    <div class="form-group"> 
        <label for="nombre" class="control-label">CodigoBarras:</label>

            <select id="myselect" name="codigo" class="custom-select">
                <?php 
                    foreach ($todosProductos as $f) {
                        $codigoBarras=$f->getCodigoBarras();
                        echo '<option value="'.$codigoBarras.'">'.$codigoBarras.'</option>';

                    }
                        echo '<option id="seleccionado" value="'.$codigoBarras.'" selected>...</option>';
                ?>
            </select>
    </div> 

    <div class="form-row">
        <div class="form-group col-md-4 text-right ">
            <button type="submit" id="buscar" name="buscar" class="btn btn-primary">Buscar</button>
        </div>

        <div class="form-group col-md-4 text-left">
            <button type="reset" name="cerrar" class="btn btn-secondary">Cancelar</button>
        </div>
    </div>
</form>

<?php


//if (isset($_POST['buscar'])) {
if(isset($_POST["buscar"])){

if($_POST['codigo']!=null){
    $tabla=$tProducto->getProductoByCodigo($_POST['codigo']);
    
} else {
    $tabla = array();
}

?>

<?php
    if(empty($tabla)) {
        echo "<div class="."'alert alert-danger'"." role="."'alert'".">
                ADVERTENCIA ---- ¡Ese codigo introducido no pertenece a ningun producto!
              </div>";
    } else {
  
		//$tFamilia = FamiliasProductos::singletonFamiliasProductos();
        //$todasFamilias = $tFamilia->getFamiliasProductosTodos();
?>
        <div class="container-fluid" id="contenedorPrincipal">

        <div class="row">
            <div class="col-xs-12">
                <center><h2>Formulario de modificacion de un producto</h2></center>
            </div>
        </div>

        <!-- Este div está centrado con color de fondo azul claro y con una altura vh=100-->
        <div class="row bg-light align-items-center vh-100">
        <div class="col-sm-8">
        <form class="form-horizontal" name="formularioProductos"  
            action="../vista_admin/IndexAdmin.php?principal=producto/modificarProducto.php"
            method="POST" enctype="multipart/form-data">

        <div class="form-group"> 
            <label for="nombre" class="control-label">Familia:</label>

            <select name="familia" class="custom-select">
                <?php 
                    foreach ($todasFamilias as $f) {
                        $idFamilia=$f->getIdFamilia();

                        $nombreFamilia=$f->getNombre();

                        echo '<option value="'.$idFamilia.'">'.$nombreFamilia.'</option>';

                }
                    echo '<option value="'.$idFamilia.'">'.$nombreFamilia.'</option>';
                ?>
            </select>
        </div> 

        <div class="form-group"> 
            <label for="descripcion" class="control-label">Descripción:</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value='<?php echo $tabla[0]->getDescripcion() ?>'>
        </div>
        <div class="form-group"> 
            <label for="pvp" class="control-label">PVP:</label>
            <input type="text" class="form-control" id="pvp" name="pvp" value='<?php echo $tabla[0]->getPvp() ?>'>
        </div>

        <div class="form-group"> 
            <label for="pCoste" class="control-label">Precio de Coste:</label>
            <input type="text" class="form-control" id="pCoste" name="pCoste" value='<?php echo $tabla[0]->getPrecioCoste() ?>'>
        </div>  
        <div class="form-group"> 
            <label for="iva" class="control-label">Tipo de IVA:</label>
            <input type="text" class="form-control"  name="iva" value='<?php echo $tabla[0]->getTipoIva() ?>'>
        </div>
        <div class="form-group"> 
            <label for="foto" class="control-label">Foto del producto:</label>
            <input type="file" class="form-control" id="foto" name="foto" value='<?php echo $tabla[0]->getRutaFoto() ?>'>
        </div>

        <div class="form-group"> 
            <label for="stockMinimo" class="control-label">Stock Mínimo:</label>
            <input type="text" class="form-control"  name="stockMinimo" value='<?php echo $tabla[0]->getStockMinimo() ?>'>
        </div>
        <div class="form-group"> 
            <label for="stockMaximo" class="control-label">Stock Máximo:</label>
            <input type="text" class="form-control"  name="stockMaximo" value='<?php echo $tabla[0]->getStockMaximo() ?>'>
        </div>
        <div class="form-group"> 
            <label for="stockActual" class="control-label">Stock Actual:</label>
            <input type="text" class="form-control"  name="stockActual" value='<?php echo $tabla[0]->getStockActual() ?>'>
            </div>
        <div class="form-group"> 
            <input type="text" class="form-control"  name="codigoBarras" value='<?php echo $tabla[0]->getCodigoBarras() ?>' hidden>
        </div>
        <div class="form-group"> 
            <label for="idProveedor" class="control-label">Proveedor:</label>
            <input type="text" class="form-control"  name="idProveedor" value='<?php echo $tabla[0]->getIdProveedor() ?>'>
        </div>   


        <div class="form-group"> 
            <button type="submit" name="modificar" class="btn btn-primary">Enviar</button>
            <button type="reset" name="limpiar" class="btn btn-danger">Limpiar</button>
        </div>     

        </form>
        </div> <!-- div class row-->
        </div>
        </div>
    <?php  
    
    }

}

if (isset($_POST['modificar'])) { //si se ha pulsado el botón de guardar
    

        if($_POST['codigoBarras']!=null){
            $tabla=$tProducto->getProductoByCodigo($_POST['codigoBarras']);
        } else {
            $tabla = array();
        }
        if(!empty($tabla)){
        $nombreOriginal = $_FILES['foto']['name'];
        $posPunto = strpos($nombreOriginal, ".") + 1;
        $extensionOriginal = substr($nombreOriginal, $posPunto, 3);

        $tipo = $_FILES['foto']['type'];
        $tamanio = $_FILES['foto']['size'];
        $familia = $_POST['familia'];
        //Algoritmo para guardar el código de producto formateado según alguna formúla
        //echo "La familia es: $familia<br>";
        $id = $tProducto->getUltimoProductoFamilia($familia) + 1; //Averiguamos cuál es el id del último producto según la familia que entra

        $codigoString = (string) $id; //600007
        
        $numCaracteres = strlen($codigoString);
        $resta = 5 - $numCaracteres;
        for ($i = 1; $i <= $resta; $i++) {
            $codigoString = '0' . $codigoString;
        }
        $codigoFormateado = $familia . $codigoString;
            
        $nombreNuevo = "fotos/productos/pro_" . $codigoFormateado . "." . $extensionOriginal;
        $error = move_uploaded_file($_FILES['foto']['tmp_name'], '../../interfaz/'.$nombreNuevo);
        
        $id_producto =  $codigoFormateado;
        $descripcion = $_POST['descripcion'];
        $rutaFoto = $nombreNuevo;
        $pvp = $_POST['pvp'];
        $precioCoste = $_POST['pCoste'];
        $tipoIva = $_POST['iva'];
        $idProveedor = $_POST['idProveedor'];
        $stockActual = $_POST['stockActual'];
        $stockMinimo = $_POST['stockMinimo'];
        $stockMaximo = $_POST['stockMaximo'];
        $codigoBarras = $_POST['codigoBarras'];
        $activo = 1;
        $p = new Producto(0, $id_producto, $familia, $tipoIva, $precioCoste, $pvp, $descripcion,
                $codigoBarras, $idProveedor, $stockActual, $stockMinimo, $stockMaximo,
                $rutaFoto, $activo);
      
        $update = $tProducto->updateProducto($p);
        if ($update) {
            echo "<br><br><h1>Producto actualizado correctamente</h1>";
        } else {
            echo "<br><br><h1>Error en la actualizacion del producto</h1>";
        }
    }
}

?>
</body>
