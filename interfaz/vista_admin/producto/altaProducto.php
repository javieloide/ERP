<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Alta de Productos con Bootstrap</title>


	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 	
</head>
<body>


<?php
@session_start(); 
require_once '../../pojos/Producto.php';
require_once '../../persistencia/Productos.php';
require_once '../../pojos/FamiliaProducto.php';
require_once '../../persistencia/FamiliasProductos.php';

//print_r($_POST);
#if (isset($_POST['submit']) lo podemos sustituir tb x filter_input
$submit = filter_input(INPUT_POST, 'submit');

if (isset($submit)) {

	$tProducto = Productos::singletonProductos();

	//aislamos las variables que vienen del formulario
	$familia = filter_input(INPUT_POST, 'familia');

	$nombre = filter_input(INPUT_POST, 'nombre');

	$nombreOriginal = $_FILES['foto']['name'];
	//echo "<br>El nombre de la images es: $nombreOriginal<br>";
	$posPunto = strpos($nombreOriginal, ".") + 1;
	$extensionOriginal = substr($nombreOriginal, $posPunto, 3);

	$tipo = $_FILES['foto']['type'];
	$tamanio = $_FILES['foto']['size'];

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

	if ($error == 0) {
		echo "Se ha producido un error en la subida" . "<br>";
	} else {
	       	$idProducto = $codigoFormateado;
	       	$descripcion = $nombre;
	       	$rutaFoto = $nombreNuevo;
	       	$pvp = filter_input(INPUT_POST, 'pvp');
	       	$precioCoste = filter_input(INPUT_POST, 'pCoste');
	       	$tipoIva = filter_input(INPUT_POST, 'iva');
	       	$codigoBarras = filter_input(INPUT_POST, 'codigoBarras');
	       	$idProveedor = filter_input(INPUT_POST, 'idProveedor');
	       	$stockActual = filter_input(INPUT_POST, 'stockActual');
	       	$stockMinimo = filter_input(INPUT_POST, 'stockMinimo');
	       	$stockMaximo = filter_input(INPUT_POST, 'stockMaximo');
	       	$codigoBarras=filter_input(INPUT_POST, 'codigoBarras');
	       	$activo = 1;
	       	$p = new Producto(0, $idProducto, $familia, $tipoIva, $precioCoste, $pvp, $descripcion,
		       		$codigoBarras, $idProveedor, $stockActual, $stockMinimo, $stockMaximo,
		       		$rutaFoto, $activo);

	       	$insertado = $tProducto->addUnProducto($p);
	       	if ($insertado) {
				echo "<div class="."'alert alert-success'"." role="."'success'".">
				Producto insertado correctamente
		</div>";
	       	} else {
				echo "<div class="."'alert alert-danger'"." role="."'danger'".">
				EL producto no se ha insertado correctamente
		</div>";
	       	}
       }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alta de un producto</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>


	<div class="container-fluid" id="contenedorPrincipal">

		<div class="row">
			<div class="col-xs-12">
				<center><h2>Formulario de alta de productos</h2></center>
			</div>
		</div>

	<?php 
		$tFamilia = FamiliasProductos::singletonFamiliasProductos();
		$todasFamilias = $tFamilia->getFamiliasProductosTodos();
	?>
<!-- Este div está centrado con color de fondo azul claro y con una altura vh=100-->
<div class="row bg-light align-items-center vh-100">
	<div class="col-sm-8">
		<form class="form-horizontal" name="formularioProductos"  
			action="../vista_admin/IndexAdmin.php?principal=producto/altaProducto.php"
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
				?>
			</select>
		</div> 

		<div class="form-group"> 
			<label for="descripcion" class="control-label">Descripción:</label>
			<input type="text" class="form-control" id="descripcion" name="nombre" placeholder="Nombre del producto">
		</div>
		<div class="form-group"> 
			<label for="pvp" class="control-label">PVP:</label>
			<input type="text" class="form-control" id="pvp" name="pvp" placeholder="Precio venta al público">
		</div>

		<div class="form-group"> 
			<label for="pCoste" class="control-label">Precio de Coste:</label>
			<input type="text" class="form-control" id="pCoste" name="pCoste" placeholder="Precio de coste">
		</div>  
		<div class="form-group"> 
			<label for="iva" class="control-label">Tipo de IVA:</label>
			<input type="text" class="form-control"  name="iva" placeholder="IVA en tanto por ciento">
		</div>
		<div class="form-group"> 
			<label for="foto" class="control-label">Foto del producto:</label>
			<input type="file" class="form-control" id="foto" name="foto" placeholder="Localiza una foto">
		</div>

		<div class="form-group"> 
			<label for="stockMinimo" class="control-label">Stock Mínimo:</label>
			<input type="text" class="form-control"  name="stockMinimo" placeholder="Stock Mínimo">
		</div>
		<div class="form-group"> 
			<label for="stockMaximo" class="control-label">Stock Máximo:</label>
			<input type="text" class="form-control"  name="stockMaximo" placeholder="Stock Máximo">
		</div>
		<div class="form-group"> 
			<label for="stockActual" class="control-label">Stock Actual:</label>
			<input type="text" class="form-control"  name="stockActual" placeholder="Stock Actual">
			</div>
		<div class="form-group"> 
			<label for="codigoBarras" class="control-label">Código de barras:</label>
			<input type="text" class="form-control"  name="codigoBarras" placeholder="Código de barras">
		</div>
		<div class="form-group"> 
			<label for="idProveedor" class="control-label">Proveedor:</label>
			<input type="text" class="form-control"  name="idProveedor" placeholder="Referencia del proveedor">
		</div>   


		<div class="form-group"> 
			<button type="submit" name="submit" class="btn btn-primary">Enviar</button>
			<button type="reset" name="limpiar" class="btn btn-danger">Limpiar</button>
		</div>     

	</form>
	</div> <!-- div class row-->
</div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>