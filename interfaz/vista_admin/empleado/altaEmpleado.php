<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Alta de Empleados</title>


	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
     <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
 	
</head>
<body>


<?php
@session_start(); 
require_once '../../pojos/Departamento.php';
require_once '../../persistencia/Departamentos.php';
require_once '../../pojos/Empleado.php';
require_once '../../persistencia/Empleados.php';


//print_r($_POST);
#if (isset($_POST['submit']) lo podemos sustituir tb x filter_input
$submit = filter_input(INPUT_POST, 'submit');

if (isset($submit)) {

	$tEmpleado = Empleados::singletonEmpleados();

	//aislamos las variables que vienen del formulario

	$nombre = filter_input(INPUT_POST, 'nombre');

	$apellido1 = filter_input(INPUT_POST, 'apellido1');

	$apellido2 = filter_input(INPUT_POST, 'apellido2');

	$numCta = filter_input(INPUT_POST, 'numCta');

	$movil = filter_input(INPUT_POST, 'movil');

	$localidad = filter_input(INPUT_POST, 'localidad');

	$codPostal = filter_input(INPUT_POST, 'codPostal');

	$provincia = filter_input(INPUT_POST, 'provincia');
	   	$activo = 1;


	$nif = filter_input(INPUT_POST, 'nif');

	$direccion = filter_input(INPUT_POST, 'direccion');

	$pais = filter_input(INPUT_POST, 'pais');

	$idDepartamento=filter_input(INPUT_POST, 'idDepartamento');


 	$codigo=$tEmpleado->getNumeroEmpleados()+1;


   //ahora tengo que concatenarlo con el codPostal
    $idEmpleado='0'.$codigo;
    $idUsuario=$idEmpleado;

	    
	       	$p = new Empleado(0, $idEmpleado, $idUsuario, $nombre, $apellido1, $apellido2, $numCta, $movil, $localidad, $codPostal, $provincia, $activo, $idDepartamento, $nif, $direccion, $pais);

	       	$insertado = $tEmpleado->addUnEmpleado($p);
	       	if ($insertado) {
				echo "<div class="."'alert alert-success'"." role="."'success'".">
				Empleado insertado correctamente
		   	</div>";
	       	} else {
				echo "<div class="."'alert alert-danger'"." role="."'danger'".">
				Error al insertar el Empleado 
		   	</div>";
	       	}
       
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Alta de un empleado</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>


	<div class="container-fluid" id="contenedorPrincipal">

		<div class="row">
			<div class="col-xs-12">
				<center><h2>Formulario de alta de empleados</h2></center>
			</div>
		</div>

	<?php 
    $tDepartamento = Departamentos::singletonDepartamentos();
		$todosDepartamentos = $tDepartamento->getDepartamentosTodos();
	?>
<!-- Este div está centrado con color de fondo azul claro y con una altura vh=100-->
<div class="row bg-light align-items-center vh-100">
	<div class="col-sm-8">
		<form class="form-horizontal" name="formularioEmpleados"
			action="../vista_admin/IndexAdmin.php?principal=empleado/altaEmpleado.php"
			method="POST" enctype="multipart/form-data">

		<div class="form-group"> 
			<label for="nombre" class="control-label">Departamento:</label>

			<select name="idDepartamento" class="custom-select">
				<?php 
					foreach ($todosDepartamentos as $f) {
						$idFamilia=$f->getIdDepartamento();

						$nombreFamilia=$f->getNombre();

						echo '<option value="'.$idFamilia.'">'.$nombreFamilia.'</option>';

				}
				?>
			</select>
		</div> 

		<div class="form-group"> 
			<label for="descripcion" class="control-label">Nombre:</label>
			<input type="text" class="form-control" id="descripcion" name="nombre" placeholder="nombre">
		</div>
		<div class="form-group"> 
			<label for="pvp" class="control-label">Apellido1:</label>
			<input type="text" class="form-control" id="pvp" name="apellido1" placeholder="apellido1">
		</div>

		<div class="form-group"> 
			<label for="pCoste" class="control-label">Apellido2:</label>
			<input type="text" class="form-control" id="pCoste" name="apellido2" placeholder="apellido2">
		</div>  
		<div class="form-group"> 
			<label for="iva" class="control-label">numCta:</label>
			<input type="text" class="form-control"  name="numCta" placeholder="numero de cuenta">
		</div>
		<div class="form-group"> 
			<label for="foto" class="control-label">movil:</label>
			<input type="text" class="form-control" id="foto" name="movil" placeholder="movil">
		</div>

		<div class="form-group"> 
			<label for="stockMinimo" class="control-label">localidad:</label>
			<input type="text" class="form-control"  name="localidad" placeholder="localidad">
		</div>
		<div class="form-group"> 
			<label for="stockMaximo" class="control-label">codigo postal:</label>
			<input type="text" class="form-control"  name="codPostal" placeholder="codigo postal">
		</div>
		<div class="form-group"> 
			<label for="stockActual" class="control-label">provincia:</label>
			<input type="text" class="form-control"  name="provincia" placeholder="provincia">
			</div>
		<div class="form-group"> 
			<label for="codigoBarras" class="control-label">nif:</label>
			<input type="text" class="form-control"  name="nif" placeholder="nif">
		</div>
		<div class="form-group"> 
			<label for="idProveedor" class="control-label">Direccion:</label>
			<input type="text" class="form-control"  name="direccion" placeholder="direccion">
		</div>   

	<div class="form-group"> 
			<label for="idProveedor" class="control-label">pais:</label>
			<input type="text" class="form-control"  name="pais" placeholder="pais">
		</div>

		<div class="form-group"> 
			<button type="submit" name="submit" class="btn btn-primary">Guardar</button>
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